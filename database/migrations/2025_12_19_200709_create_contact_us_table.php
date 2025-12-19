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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            // Basic content
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Map iframe
            $table->longText('map_iframe')->nullable();

            // WHAT WE OFFER SECTION
            $table->string('offer_heading')->nullable();        // e.g. What We Offer
            $table->text('offer_description')->nullable();      // short text under heading
            $table->json('offers')->nullable();                 // all offer boxes + bullets

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Audit
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
        Schema::dropIfExists('contact_us');
    }
};
