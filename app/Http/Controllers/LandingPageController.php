<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        try {
            $this->authorize('read landing page');

            $data = LandingPage::first();

            return view('pages.landing-page.index', compact('data'));
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // If user is not authorized
            abort(403, 'You do not have permission to view this page.');
        } catch (\Throwable $e) {
            // Log any other errors
            Log::error('LandingPage index error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect back with a friendly error message
            return redirect()->back()->withErrors(['general_error' => 'Unable to load landing page data. Please try again later.']);
        }
    }


    public function storeOrUpdate(Request $request)
    {
        // Validation rules
        $rules = [
            'hero_heading' => 'required|string|max:255',
            'hero_sd' => 'nullable|string',
            'hero_slider_images.*' => 'nullable|file|image|max:10240',
            'hero_image_alt' => 'nullable|string|max:255',
            'content_heading' => 'required|string|max:255',
            'content_description' => 'nullable|string',
            'content_slider_images.*' => 'nullable|file|image|max:10240',
            'content_image_alt' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ];


        $validated = $request->validate($rules);

        try {
            DB::beginTransaction();

            // Fetch first entry or create new
            $landingPage = LandingPage::first();

            if (!$landingPage) {
                $this->authorize('create landing page');
                $landingPage = new LandingPage();
                $landingPage->created_by = auth()->id();
            } else {
                $this->authorize('write landing page');
                $landingPage->updated_by = auth()->id();
            }

            // Fill normal fields
            $landingPage->fill($request->except([
                'hero_slider_images',
                'content_slider_images'
            ]));

            // Handle Hero Slider Images
            if ($request->hasFile('hero_slider_images')) {
                $existingHeroImages = $landingPage->hero_slider_images;
                $existingHeroImages = is_array($existingHeroImages) ? $existingHeroImages : [];
                $landingPage->hero_slider_images = $this->uploadMultipleImages(
                    $existingHeroImages,
                    $request->file('hero_slider_images'),
                    'landing-page/hero-slider'
                );
            }

            // Handle Content Slider Images
            if ($request->hasFile('content_slider_images')) {
                $existingContentImages = $landingPage->content_slider_images;
                $existingContentImages = is_array($existingContentImages) ? $existingContentImages : [];
                $landingPage->content_slider_images = $this->uploadMultipleImages(
                    $existingContentImages,
                    $request->file('content_slider_images'),
                    'landing-page/content-slider'
                );
            }

            $landingPage->save();

            DB::commit();

            $message = $landingPage->wasRecentlyCreated ? 'Landing page created successfully.' : 'Landing page updated successfully.';
            return redirect()->back()->with('success', $message);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // If user is not authorized
            abort(403, 'You do not have permission to view this page.');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('LandingPage storeOrUpdate error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['general_error' => 'Something went wrong. Please try again or contact support.']);
        }
    }

    public function removeSliderImage(Request $request)
    {
        $this->authorize('delete landing page');

        $request->validate([
            'landing_page_id' => 'required|integer|exists:landing_pages,id',
            'image'           => 'required|string',
            'column'          => 'required|string',
            'path'            => 'required|string', // path of the file relative to storage/app/public
        ]);

        try {
            $landingPage = LandingPage::findOrFail($request->landing_page_id);
            $column = $request->column;
            $imageToRemove = $request->image;
            $path = rtrim($request->path, '/') . '/'; // ensure trailing slash

            // Get existing images as array
            $images = $landingPage->{$column};
            if (!is_array($images)) {
                $images = json_decode($images, true) ?? [];
            }

            // Remove the image from array
            $images = array_filter($images, function ($img) use ($imageToRemove) {
                return $img !== $imageToRemove;
            });

            // Update the column in DB
            $landingPage->{$column} = array_values($images); // reindex array
            $landingPage->save();

            // Delete file from storage
            if (Storage::disk('public')->exists($path . $imageToRemove)) {
                Storage::disk('public')->delete($path . $imageToRemove);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image removed successfully.'
            ]);
        } catch (\Throwable $e) {
            Log::error('removeSliderImage error: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while removing the image.'
            ]);
        }
    }
}
