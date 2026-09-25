<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Get a setting value by key directly from database without cache.
     */
    function setting(?string $key = null, ?string $default = null): mixed
    {
        if ($key === null) {
            try {
                return Setting::pluck('value', 'key')->all();
            } catch (Throwable $e) {
                return [];
            }
        }

        try {
            return Setting::getValue($key, $default);
        } catch (Throwable $e) {
            return $default;
        }
    }
}
