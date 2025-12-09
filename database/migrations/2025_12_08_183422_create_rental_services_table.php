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
        Schema::create('rental_services', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('main_heading')->nullable();
            $table->longText('main_description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('main_image_alt')->nullable();
            $table->string('equipment_heading')->nullable();
            $table->longText('equipment_list')->nullable();
            $table->string('why_rent_heading')->nullable();
            $table->longText('why_rent_list')->nullable();

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
        Schema::dropIfExists('rental_services');
    }
};
