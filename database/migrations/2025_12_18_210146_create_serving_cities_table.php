<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('serving_cities', function (Blueprint $table) {
            $table->id();
             // ===== Hero Section =====
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('slug')->nullable();

            // City
            $table->string('city_name')->nullable();
            $table->string('city_image')->nullable();
            $table->string('city_image_alt')->nullable();

           // Content Section
            $table->text('content_title')->nullable();
            $table->json('gallery_images')->nullable();  // Gallery = JSON
            $table->string('image_alt')->nullable();
            $table->longText('content_description')->nullable();

            // How We Serve
            $table->string('serve_heading')->nullable();
            $table->longText('serve_description')->nullable();

            // Status
            $table->boolean('is_active')->default(true);
            
            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Audit Fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serving_cities');
    }
};
