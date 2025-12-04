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
        Schema::table('repair_services', function (Blueprint $table) {
            // After repair_service_heading
            $table->text('repair_service_short_description')->nullable()
                ->after('repair_service_heading');

            // After x_ray_heading
            $table->text('x_ray_short_description')->nullable()
                ->after('x_ray_heading');

            // After c_arm_heading
            $table->text('c_arm_short_description')->nullable()
                ->after('c_arm_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repair_services', function (Blueprint $table) {
            $table->dropColumn([
                'repair_service_short_description',
                'x_ray_short_description',
                'c_arm_short_description',
            ]);
        });
    }
};
