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
        Schema::create('biomed_services', function (Blueprint $table) {
            $table->id();
             // Hero section (blue top part)
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Intro heading + description (left side)
            $table->string('intro_heading')->nullable();
            $table->longText('intro_text')->nullable();
            $table->string('intro_image_1')->nullable();
            $table->string('intro_image_1_alt')->nullable();
            $table->string('intro_image_2')->nullable();
            $table->string('intro_image_2_alt')->nullable();

            $table->string('product_heading')->nullable();

            $table->string('banner_heading')->nullable();
            $table->text('banner_text')->nullable();

            $table->string('service_heading')->nullable();
            $table->text('service_sd')->nullable();

            $table->json('service_cards')->nullable();
            $table->json('service_images')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

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
        Schema::dropIfExists('biomed_services');
    }
};
