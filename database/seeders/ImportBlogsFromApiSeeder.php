<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportBlogsFromApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // API endpoint
        $apiUrl = 'http://mbmts.com/api/blogs/active';

        try {
            // Fetch data from API
            $response = Http::timeout(30)->get($apiUrl);

            if (!$response->successful()) {
                $this->command->error('API request failed with status: ' . $response->status());
                return;
            }

            $data = $response->json();

            if (!isset($data['data']) || !is_array($data['data'])) {
                $this->command->error('Invalid API response format');
                return;
            }

            $blogs = $data['data'];
            $imported = 0;
            $skipped = 0;

            foreach ($blogs as $blogData) {
                // Check if blog already exists by slug
                $existingBlog = Blog::where('slug', $blogData['slug'])->first();

                if ($existingBlog) {
                    $this->command->warn("Blog '{$blogData['title']}' (slug: {$blogData['slug']}) already exists - skipping");
                    $skipped++;
                    continue;
                }

                // Download feature image
                $featureImagePath = null;
                if (isset($blogData['feature_image_url']) && !empty($blogData['feature_image_url'])) {
                    $featureImagePath = $this->downloadImage(
                        $blogData['feature_image_url'],
                        'blog/images'
                    );
                }

                // Create blog
                Blog::create([
                    'category_id' => '5',
                    'title' => $blogData['title'] ?? 'Untitled',
                    'slug' => $blogData['slug'] ?? Str::slug($blogData['title'] ?? 'blog'),
                    'is_active' => $blogData['status'] ?? 1,
                    'image' => $featureImagePath,
                    'image_alt_text' => $blogData['alt_text'] ?? '',
                    'short_description' => $blogData['short_data'] ?? '',
                    'description' => $blogData['long_description'] ?? '',
                    'type' => 'featured',
                    'read_time' => rand(2, 3) . ' mins',
                    'meta_title' => $blogData['meta_title'] ?? '',
                    'meta_description' => $blogData['meta_description'] ?? '',
                    'meta_keywords' => '',
                    'created_by' => null,
                ]);

                $imported++;
                $this->command->info("Blog '{$blogData['title']}' imported successfully");
            }

            $this->command->info("\n✓ Import completed!");
            $this->command->info("Imported: {$imported}, Skipped: {$skipped}");
            
            // Show total blogs in database
            $totalBlogs = Blog::count();
            $this->command->info("Total blogs in database: {$totalBlogs}");

        } catch (\Exception $e) {
            $this->command->error('Error: ' . $e->getMessage());
        }
    }

    /**
     * Download image and save to storage
     * Same approach as UploadImageTrait
     */
    private function downloadImage($imageUrl, $directory): ?string
    {
        try {
            // Disable SSL verification for external URLs
            $response = Http::timeout(30)->withoutVerifying()->get($imageUrl);

            if (!$response->successful()) {
                $this->command->warn("Image download failed for URL: {$imageUrl} - Status: {$response->status()}");
                return null;
            }

            // Create directory if it doesn't exist
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            // Generate filename - same as UploadImageTrait
            $extension = $this->getImageExtension($imageUrl);
            $filename = time() . '_' . Str::random(10) . '.' . $extension;

            // Save image
            Storage::disk('public')->put(
                $directory . '/' . $filename,
                $response->body()
            );

            return $filename;

        } catch (\Exception $e) {
            $this->command->warn("Image download failed for URL: {$imageUrl} - Error: {$e->getMessage()}");
            return null;
        }
    }

    /**
     * Extract image extension from URL
     */
    private function getImageExtension($url): string
    {
        $path = parse_url($url, PHP_URL_PATH);
        $extension = pathinfo($path, PATHINFO_EXTENSION);

        return !empty($extension) ? $extension : 'jpg';
    }
}
