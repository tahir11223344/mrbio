<?php

namespace App\Http\Controllers;

use App\DataTables\OffersDataTable;
use App\Models\Offer;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    use UploadImageTrait;

    public function index(OffersDataTable $dataTable)
    {
        $this->authorize('read offer');

        return $dataTable->render('pages.offers.index');
    }

    public function create()
    {
        $this->authorize('create offer');

        return view('pages.offers.create');
    }

    public function store(Request $request)
    {

        $this->authorize('create offer');

        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:offers,slug',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'is_active'         => 'required|in:0,1',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:300',
            'gallery_images.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:300',
            'image_alt'         => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $offer = new offer();
            $offer->title = $request->title;
            $offer->slug = Str::slug($request->slug);

            $offer->short_description = $request->short_description;
            $offer->description = $request->description;
            $offer->is_active = $request->is_active;

            // Thumbnail
            $offer->thumbnail = $this->uploadImage($request->file('thumbnail'), 'offers/thumbnails');

            // Gallery
            if ($request->hasFile('gallery_images')) {
                $gallery = [];
                foreach ($request->file('gallery_images') as $image) {
                    $gallery[] = $this->uploadImage($image, 'offers/gallery');
                }
                $offer->gallery_images = json_encode($gallery);
            }

            $offer->image_alt = $request->image_alt;
            // SEO
            $offer->meta_title = $request->meta_title;
            $offer->meta_keywords = $request->meta_keywords;
            $offer->meta_description = $request->meta_description;

            // Audit
            $offer->created_by = Auth::id();

            $offer->save();
            DB::commit();

            return redirect()->route('admin-offers.list')->with('success', 'Offer created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error
            Log::error('Offer Store Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Offer $offer)
    {
        $this->authorize('write offer');

        try {
            return view('pages.offers.create', [
                'data' => $offer, // blade me $data ke naam se access h
            ]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Offer Edit Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'offer_id' => $offer->id
            ]);

            // Redirect back with error message
            return redirect()->route('admin-offers.list')
                ->withErrors(['error' => 'Something went wrong while loading the offers. Please check the logs.']);
        }
    }

    public function update(Request $request, Offer $offer)
    {
        $this->authorize('write offer');

        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:offers,slug,' . $offer->id,
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'is_active'         => 'required|in:0,1',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:300',
            'gallery_images.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:300',
            'image_alt'         => 'nullable|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $offer->title = $request->title;
            $offer->slug = Str::slug($request->slug);

            $offer->short_description = $request->short_description;
            $offer->description = $request->description;
            $offer->is_active = $request->is_active;

            // Thumbnail image update
            $offer->thumbnail = $this->updateImage($request, 'thumbnail', 'offers/thumbnails', $offer->thumbnail);

            // Gallery images update (append new, keep old)
            $existingGallery = is_array($offer->gallery_images)
                ? $offer->gallery_images
                : json_decode($offer->gallery_images, true) ?? [];

            if ($request->hasFile('gallery_images')) {
                $existingGallery = $this->uploadMultipleImages($existingGallery, $request->file('gallery_images'), 'offers/gallery');
            }

            $offer->gallery_images = json_encode($existingGallery);

            $offer->image_alt = $request->image_alt;
            // SEO
            $offer->meta_title = $request->meta_title;
            $offer->meta_keywords = $request->meta_keywords;
            $offer->meta_description = $request->meta_description;

            // Audit
            $offer->updated_by = Auth::id();

            $offer->save();
            DB::commit();

            return redirect()->route('admin-offers.list')->with('success', 'Offer Updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error
            Log::error('Offer Store Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function removeGalleryImage(Request $request)
    {
        // Validate input
        $request->validate([
            'offer_id' => 'required|exists:offers,id',
            'image' => 'required|string',
        ]);

        // Find offer
        $offer = Offer::findOrFail($request->offer_id);

        // Decode existing gallery images
        $galleryImages = json_decode($offer->gallery_images, true) ?? [];

        if (!in_array($request->image, $galleryImages)) {
            return response()->json([
                'success' => false,
                'message' => 'Image not found in this offer.'
            ]);
        }

        // Remove image from array
        $galleryImages = array_filter($galleryImages, fn($img) => $img !== $request->image);

        // Save updated JSON
        $offer->gallery_images = json_encode(array_values($galleryImages));
        $offer->save();

        // Delete image from storage
        if (Storage::exists('public/offers/gallery/' . $request->image)) {
            Storage::delete('public/offers/gallery/' . $request->image);
        }

        // Return JSON with success message
        return response()->json([
            'success' => true,
            'message' => 'Image has been removed successfully.'
        ]);
    }

    public function destroy(Offer $offer)
    {
        $this->authorize('delete offer');

        DB::beginTransaction();

        try {
            $authId = Auth::id();

            if ($offer->trashed()) {
                // Soft delete scenario: just update deleted_by
                $offer->deleted_by = $authId;
                $offer->save();
            } else {
                // Hard delete: remove images
                // Delete Thumbnail
                if ($offer->thumbnail && Storage::disk('public')->exists('offers/thumbnails/' . $offer->thumbnail)) {
                    Storage::disk('public')->delete('offers/thumbnails/' . $offer->thumbnail);
                }

                // Delete Gallery Images
                if ($offer->gallery_images) {
                    $galleryImages = is_array($offer->gallery_images) ? $offer->gallery_images : json_decode($offer->gallery_images, true);
                    if ($galleryImages && count($galleryImages) > 0) {
                        foreach ($galleryImages as $image) {
                            if (Storage::disk('public')->exists('offers/gallery/' . $image)) {
                                Storage::disk('public')->delete('offers/gallery/' . $image);
                            }
                        }
                    }
                }

                // Set deleted_by for record and hard delete
                $offer->deleted_by = $authId;
                $offer->save();

                $offer->forceDelete(); // Hard delete
            }

            DB::commit();

            return redirect()->route('admin-offers.list')->with('success', 'Offer deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Offer Delete Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'offer_id' => $offer->id
            ]);

            return back()->withErrors(['error' => 'Failed to delete the offer: ' . $e->getMessage()]);
        }
    }
}
