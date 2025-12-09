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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('main_heading')->nullable();
            $table->longText('main_description')->nullable();
            $table->string('stats')->nullable();
            $table->text('stats_description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_1_alt')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_2_alt')->nullable();
            $table->string('value_section_heading')->nullable();
            $table->longText('value_section_description')->nullable();
            $table->string('value_section_image')->nullable();
            $table->string('value_section_image_alt')->nullable();
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
        Schema::dropIfExists('about_us');
    }
};
