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
        Schema::table('offer_cards', function (Blueprint $table) {
            $table->json('feature_texts')->nullable()->after('feature_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offer_cards', function (Blueprint $table) {
            $table->dropColumn('feature_texts');
        });
    }
};
