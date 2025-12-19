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
        Schema::create('location_pages', function (Blueprint $table) {
            $table->id();
            // ===== Hero Section =====
            $table->string('hero_title');
            $table->text('hero_subtitle')->nullable();

            // ===== Areas We Serve Section =====
            $table->string('areas_title');
            $table->text('areas_description')->nullable();

            // ===== Major Cities Section =====
            $table->string('cities_section_title')->nullable();

            // How We Serve
            $table->string('serve_heading')->nullable();
            $table->longText('serve_description')->nullable();
            
            // Contact Us
            $table->text('contact_us_description')->nullable();

            // Form Desc
            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();

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
        Schema::dropIfExists('location_pages');
    }
};
