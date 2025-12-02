<?php

namespace App\Http\Controllers;

use App\DataTables\BlogsDataTable;
use App\Models\Blog;
use App\Models\BlogMainPage;
use App\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    use UploadImageTrait;

    public function mainPage()
    {
        try {
            // Permission check
            $this->authorize('read blog main page');

            // Fetch main page data
            $data = BlogMainPage::first();

            if (!$data) {
                return redirect()
                    ->back()
                    ->with('error', 'Blog main page data not found.');
            }

            // Return view
            return view('pages.blog.main_page', compact('data'));
        } catch (\Throwable $e) {

            // Log detailed error
            Log::error('Blog Main Page Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            // Redirect back with user-friendly error
            return redirect()
                ->back()
                ->with('error', 'Something went wrong while loading the blog main page.');
        }
    }

    public function storeOrUpdate(Request $request)
    {

        // Validation rules
        $rules = [
            'heading' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ];

        $validated = $request->validate($rules);

        try {
            DB::beginTransaction();

            // Get first entry or create new
            $blog = BlogMainPage::first();

            if (!$blog) {
                // Permission check
                $this->authorize('create blog main page');
                // Create fresh entry
                $blog = new BlogMainPage();
                $blog->created_by = Auth::id(); // set created_by on create
            } else {
                $this->authorize('write blog main page');
                // Update existing entry
                $blog->updated_by = Auth::id(); // set updated_by on update
            }
            // Fill validated data 
            $blog->fill($request->all());


            $blog->save();

            DB::commit();

            return redirect()->back()->with('success', 'Blog details saved successfully.');
        } catch (\Throwable $e) {
            DB::rollBack();

            // Log the error
            Log::error('Blog store error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            // Return back with input and show error under the form
            return redirect()->back()
                ->withInput()
                ->withErrors(['general_error' => 'Something went wrong. Please try again or contact support.']);
        }
    }

    public function list(BlogsDataTable $dataTable)
    {
        return $dataTable->render('pages.blog.list');
    }

    public function create()
    {
        $this->authorize('create blogs');

        $categories = Category::where('status', true)->get();

        return view('pages.blog.create', compact('categories'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            // Use trait method
            $filename = $this->uploadImage($file, 'blog/ckeditor');

            if ($filename) {
                $url = asset('storage/blog/ckeditor/' . $filename);

                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $filename,
                    'url' => $url
                ]);
            }
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'File upload failed.']
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create blogs');
        DB::beginTransaction();

        try {

            // Validate data
            $validated = $request->validate([
                'title'            => 'required|string|max:255',
                'slug'             => 'required|string|max:255|unique:blogs,slug',
                'category_id'      => 'required|exists:categories,id',
                'is_active'        => 'nullable|in:0,1',
                'image'            => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt_text'   => 'nullable|string|max:255',
                'description'      => 'nullable|string',

                'meta_title'       => 'nullable|string|max:255',
                'meta_keywords'    => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
            ]);

            $validated['created_by'] = auth()->id();

            // ⬇ IMAGE UPLOAD USING TRAIT
            if ($request->hasFile('image')) {
                $validated['image'] = $this->uploadImage($request->file('image'), 'blog/images');
            }

            Blog::create($validated);

            DB::commit();

            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {

            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Blog Create Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again later.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            // Permission check
            $this->authorize('write blogs');

            // Fetch blog
            $blog = Blog::find($id);

            if (!$blog) {
                return redirect()
                    ->route('admin-blogs.list')
                    ->with('error', 'Blog not found.');
            }

            // Fetch categories
            $categories = Category::where('status', true)->orderBy('name')->get();

            // Return view
            return view('pages.blog.create', [
                'data' => $blog,
                'categories' => $categories
            ]);
        } catch (\Throwable $e) {

            // Log error
            Log::error('Blog Edit Error: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString()
            ]);

            // Redirect back with error message
            return redirect()
                ->route('admin-blogs.list')
                ->with('error', 'Something went wrong while loading the blog.');
        }
    }

    public function update(Request $request, $id)
    {
        // Permission check
        $this->authorize('write blogs');

        $blog = Blog::findOrFail($id);

        DB::beginTransaction();

        try {
            // Validation
            $validated = $request->validate([
                'title'            => 'required|string|max:255',
                'slug'             => "required|string|max:255|unique:blogs,slug,{$blog->id}",
                'category_id'      => 'required|exists:categories,id',
                'is_active'        => 'nullable|in:0,1',
                'image'            => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt_text'   => 'nullable|string|max:255',
                'description'      => 'nullable|string',

                'meta_title'       => 'nullable|string|max:255',
                'meta_keywords'    => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
            ]);

            $validated['updated_by'] = auth()->id();

            // ⬇ UPDATE IMAGE USING TRAIT
            $validated['image'] = $this->updateImage($request, 'image', 'blog/images', $blog->image);

            $blog->update($validated);

            DB::commit();

            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Blog Update Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong while updating.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Permission check
            $this->authorize('delete blogs');

            // Fetch blog
            $blog = Blog::find($id);

            if (!$blog) {
                return redirect()
                    ->route('admin-blogs.list')
                    ->with('error', 'Blog not found.');
            }

            // Store deleted_by (who deleted) before soft delete
            $blog->deleted_by = auth()->id();
            $blog->save();

            // Soft delete the blog
            $blog->delete();

            // Redirect with success message
            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog deleted successfully.');
        } catch (\Throwable $e) {

            // Log detailed error
            Log::error('Blog Delete Error: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString()
            ]);

            // Redirect back with user-friendly message
            return redirect()
                ->route('admin-blogs.list')
                ->with('error', 'Something went wrong while deleting the blog.');
        }
    }
}
