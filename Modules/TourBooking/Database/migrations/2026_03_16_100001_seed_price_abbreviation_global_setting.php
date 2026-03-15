<?php

use Illuminate\Database\Migrations\Migration;
use Modules\GlobalSetting\App\Models\GlobalSetting;

return new class extends Migration
{
    /**
     * Seed default price abbreviation global setting.
     */
    public function up(): void
    {
        if (!GlobalSetting::where('key', 'price_abbreviation')->exists()) {
            GlobalSetting::insert([
                'key'        => 'price_abbreviation',
                'value'      => 'none',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        GlobalSetting::where('key', 'price_abbreviation')->delete();
    }
};
