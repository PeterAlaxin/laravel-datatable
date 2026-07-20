<?php

return [
    'per_page_options' => [10, 25, 50, 100],
    'default_per_page' => 25,

    /*
    |--------------------------------------------------------------------------
    | Pagination view
    |--------------------------------------------------------------------------
    | Livewire 4 poskytuje 'livewire::bootstrap' a 'livewire::simple-bootstrap'.
    */
    'pagination_view' => 'livewire::bootstrap',

    'date_format' => 'd.m.Y',
    'datetime_format' => 'd.m.Y H:i',
    'csv_separator' => ';',
    'number_decimal_separator' => ',',
    'number_thousands_separator' => ' ',
    'default_currency' => 'EUR',

    /*
    |--------------------------------------------------------------------------
    | UI theme
    |--------------------------------------------------------------------------
    | 'tabler'   — natívny vzhľad balíka (default)
    | 'adminlte' — načíta CSS kompatibilnú vrstvu (Tabler triedy → Bootstrap 5)
    */
    'ui' => env('DATATABLE_UI', 'tabler'),

    /*
    |--------------------------------------------------------------------------
    | Icon preset
    |--------------------------------------------------------------------------
    | Logické názvy ikon (napr. 'search', 'trash') sa cez helper dticon()
    | preložia na konkrétnu CSS triedu podľa zvoleného presetu.
    */
    'icons' => env('DATATABLE_ICONS', 'tabler'),

    'icon_presets' => [
        'tabler' => [
            'base' => 'ti',
            'name_prefix' => 'ti-',
            'map' => [],
        ],
        'fontawesome' => [
            'base' => 'fas',
            'name_prefix' => 'fa-',
            // Preklad Tabler názvov (použitých vo views) na Font Awesome 7 názvy.
            // Kľúče, ktoré tu nie sú, sa použijú priamo (fas fa-<key>).
            'map' => [
                'search' => 'magnifying-glass',
                'x' => 'xmark',
                'refresh' => 'arrows-rotate',
                'settings' => 'gear',
                'device-floppy' => 'floppy-disk',
                'eye-off' => 'eye-slash',
                'sum' => 'calculator',
                'database-off' => 'database',
                'filter-star' => 'star',
                'edit' => 'pen-to-square',
                'pencil' => 'pen-to-square',
            ],
        ],
    ],
];
