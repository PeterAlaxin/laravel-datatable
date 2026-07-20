<?php

if (! function_exists('dticon')) {
    /**
     * Resolve a logical icon name to a full CSS class string based on the
     * configured icon preset (see config/datatable.php → icons / icon_presets).
     *
     * Example: dticon('search') → 'ti ti-search' (tabler) or
     *          'fas fa-magnifying-glass' (fontawesome).
     */
    function dticon(string $key): string
    {
        $preset = config('datatable.icons', 'tabler');
        $presets = config('datatable.icon_presets', []);
        $conf = $presets[$preset] ?? $presets['tabler'] ?? [
            'base' => 'ti',
            'name_prefix' => 'ti-',
            'map' => [],
        ];

        $name = $conf['map'][$key] ?? $key;

        return trim(($conf['base'] ?? '').' '.($conf['name_prefix'] ?? '').$name);
    }
}
