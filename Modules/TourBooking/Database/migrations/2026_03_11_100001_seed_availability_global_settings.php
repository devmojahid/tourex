<?php

use Illuminate\Database\Migrations\Migration;
use Modules\GlobalSetting\App\Models\GlobalSetting;

return new class extends Migration
{
    /**
     * Seed default availability-related global settings.
     */
    public function up(): void
    {
        $defaults = [
            'availability_no_data_behavior'    => 'open',   // 'open' = allow all dates, 'closed' = block all
            'availability_show_spots'           => '1',     // '1' = show remaining spots, '0' = hide
            'availability_show_special_price'   => '1',     // '1' = show special price, '0' = hide
            'availability_require_search_dates' => '0',     // '1' = require dates in hero search
        ];

        foreach ($defaults as $key => $value) {
            if (!GlobalSetting::where('key', $key)->exists()) {
                GlobalSetting::insert(['key' => $key, 'value' => $value, 'created_at' => now(), 'updated_at' => now()]);
            }
        }
    }

    public function down(): void
    {
        $keys = [
            'availability_no_data_behavior',
            'availability_show_spots',
            'availability_show_special_price',
            'availability_require_search_dates',
        ];

        GlobalSetting::whereIn('key', $keys)->delete();
    }
};
