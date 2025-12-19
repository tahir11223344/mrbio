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
        Schema::table('serving_cities', function (Blueprint $table) {
            $table->string('area_name')->after('city_name')->nullable();
            $table->boolean('show_on_header')->default(1)->after('area_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('serving_cities', function (Blueprint $table) {
            $table->dropColumn('area_name');
            $table->dropColumn('show_on_header');
        });
    }
};
