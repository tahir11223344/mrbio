<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, alter the column to include both old and new values temporarily
        DB::statement("ALTER TABLE equipment_categories MODIFY COLUMN show_on ENUM('sale', 'service', 'rental', 'both', 'none') DEFAULT 'both'");

        // Now update existing 'sale' values to 'service'
        DB::table('equipment_categories')
            ->where('show_on', 'sale')
            ->update(['show_on' => 'service']);

        // Finally, remove 'sale' from enum
        DB::statement("ALTER TABLE equipment_categories MODIFY COLUMN show_on ENUM('service', 'rental', 'both', 'none') DEFAULT 'both'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert 'service' back to 'sale'
        DB::table('equipment_categories')
            ->where('show_on', 'service')
            ->update(['show_on' => 'sale']);

        // Revert enum values
        DB::statement("ALTER TABLE equipment_categories MODIFY COLUMN show_on ENUM('sale', 'rental', 'both', 'none') DEFAULT 'both'");
    }
};
