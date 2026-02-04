<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ServingCity;
use App\Models\LocationPage;
use App\Models\RepairServiceSubPage;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap
     */
    public function index()
    {
        $urls = [];

        // Static pages
        $staticPages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => route('biomed-services'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('rental-services'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('about-us'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('location'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('contact-us'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('privacy'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => route('terms'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => route('disclaimer'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => route('blogs'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('faqs'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('repair'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('feedback'), 'priority' => '0.6', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => $page['url'],
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority'],
            ];
        }

        // Location pages
        try {
            $locations = LocationPage::get();
            $servingCities = ServingCity::where('is_active', true)->orderBy('area_name', 'asc')->get();
            foreach ($servingCities as $servingCity) {
                $urls[] = [
                    'loc' => route('location.detail', ['slug' => $servingCity->slug]),
                    'lastmod' => $servingCity->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        } catch (\Exception $e) {
            \Log::warning('Sitemap: Error fetching location pages', ['error' => $e->getMessage()]);
        }

        // Blog pages
        $blogs = Blog::where('is_active', true)->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => route('blog.detail', ['slug' => $blog->slug]),
                'lastmod' => $blog->updated_at->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];
        }

        // Repair service pages - Repairing Services
        $repairingServices = RepairServiceSubPage::where('page_category', 'repair-service')
            ->where('is_active', true)
            ->get();
        foreach ($repairingServices as $service) {
            $urls[] = [
                'loc' => route('repair.service.repairing', ['slug' => $service->slug]),
                'lastmod' => $service->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // Repair service pages - X-Ray Repairing
        $xrayServices = RepairServiceSubPage::where('page_category', 'x-ray-repairing')
            ->where('is_active', true)
            ->get();
        foreach ($xrayServices as $service) {
            $urls[] = [
                'loc' => route('repair.service.xray', ['slug' => $service->slug]),
                'lastmod' => $service->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // Repair service pages - C-Arm Repairing
        $carmServices = RepairServiceSubPage::where('page_category', 'c-arm-repairing')
            ->where('is_active', true)
            ->get();
        foreach ($carmServices as $service) {
            $urls[] = [
                'loc' => route('repair.service.carm', ['slug' => $service->slug]),
                'lastmod' => $service->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        return response()->view('sitemap', ['urls' => $urls], 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }
}
