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
        Schema::create('repair_service_sub_pages', function (Blueprint $table) {
            $table->id();

            // Basic Page Info
            $table->string('page_category')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->boolean('is_active')->default(1);

            $table->text('short_description')->nullable();

            // Content Section
            $table->string('content_title')->nullable();
            $table->string('content_thumbnail')->nullable();
            $table->string('content_image_alt')->nullable();
            $table->json('gallery_images')->nullable();  // Gallery = JSON
            $table->longText('content_description')->nullable();

            // How We Serve
            $table->string('serve_heading')->nullable();
            $table->longText('serve_description')->nullable();

            // Benefits
            $table->string('benefits_heading')->nullable();
            $table->longText('benefits_description')->nullable();

            // Challenges
            $table->string('challenges_image')->nullable();
            $table->string('challenges_image_alt')->nullable();
            $table->longText('challenges_description')->nullable();

            // CTA Section
            $table->string('cta_thumbnail')->nullable();
            $table->string('cta_image_alt')->nullable();
            $table->longText('cta_description')->nullable();

            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Audit Fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            
            $table->timestamps();

            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_service_sub_pages');
    }
};
