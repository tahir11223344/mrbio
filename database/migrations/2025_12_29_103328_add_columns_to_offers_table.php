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
        Schema::table('offers', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn([
                'serve_heading',
                'serve_description',
                'benefits_heading',
                'benefits_description',
                'challenges_image',
                'challenges_image_alt',
                'challenges_description',
                'cta_thumbnail',
                'cta_image_alt',
                'cta_description',
            ]);
        });
    }
};
