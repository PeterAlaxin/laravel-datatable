<?php

return [
    // TextFilter operators
    'contains' => 'Indeholder',
    'starts_with' => 'Begynder med',
    'ends_with' => 'Slutter med',
    'equals' => 'Er lig med',
    'not_equals' => 'Er ikke lig med',
    'not_contains' => 'Indeholder ikke',
    'is_empty' => 'Er tom',
    'is_not_empty' => 'Er ikke tom',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Mellem',
    'approximately' => '~ (cirka 5%)',

    // DateFilter operators
    'before' => 'Før',
    'after' => 'Efter',
    'today' => 'I dag',
    'yesterday' => 'I går',
    'this_week' => 'Denne uge',
    'last_week' => 'Sidste uge',
    'this_month' => 'Denne måned',
    'last_month' => 'Sidste måned',
    'this_year' => 'Dette år',

    // BooleanFilter operators
    'is_true' => 'Ja',
    'is_false' => 'Nej',
    'is_null' => 'Ikke angivet',

    // SelectFilter operators
    'is' => 'Er',
    'is_not' => 'Er ikke',
    'is_one_of' => 'Er en af',
    'is_none_of' => 'Er ingen af',

    // TagFilter operators
    'tag_in' => 'Indeholder',
    'tag_not_in' => 'Indeholder ikke',

    // BooleanColumn defaults
    'yes' => 'Ja',
    'no' => 'Nej',

    // UI - Search & Toolbar
    'search' => 'Søg...',
    'saved_filters' => 'Gemte filtre',
    'clear_filter' => 'Ryd filter',
    'filter' => 'Filter',
    'refresh' => 'Opdater',
    'export_csv' => 'Eksporter til CSV',
    'column_settings' => 'Kolonneindstillinger',

    // UI - Empty state
    'no_records' => 'Ingen poster',
    'no_records_try_filter' => 'Prøv at justere dit filter eller din søgning.',
    'no_records_empty' => 'Der er ingen poster i tabellen.',

    // UI - Pagination
    'showing' => 'Viser :from - :to af :total',

    // UI - Filter builder
    'filters_title' => 'Filtre',
    'active_filters' => 'Aktive filtre',
    'add_filter' => 'Tilføj filter',
    'column' => 'Kolonne',
    'condition' => 'Betingelse',
    'select_column' => 'Vælg kolonne...',
    'select_condition' => 'Vælg betingelse...',
    'value' => 'Værdi',
    'from' => 'Fra',
    'to' => 'Til',
    'enter_value' => 'Indtast værdi...',
    'select' => 'Vælg...',
    'save_filter' => 'Gem filter',
    'filter_name' => 'Filternavn...',
    'close' => 'Luk',

    // UI - Column settings
    'column_settings_title' => 'Kolonneindstillinger',
    'column_settings_hint' => 'Træk kolonner for at ændre rækkefølge. Klik på øjet for at skjule/vise.',
    'hide' => 'Skjul',
    'show' => 'Vis',
    'show_sum' => 'Vis sum',

    // UI - Saved filters
    'delete_filter' => 'Slet filter',
    'confirm_delete_filter' => 'Er du sikker på, at du vil slette dette filter?',
    'delete' => 'Slet',

    // Validation & notifications
    'filter_name_required' => 'Filternavn er påkrævet.',
    'filter_name_max' => 'Filternavn må højst være 100 tegn.',
    'no_filters_to_save' => 'Ingen aktive filtre at gemme.',
    'filter_updated' => 'Filtret er opdateret.',
    'filter_saved' => 'Filtret er gemt.',
    'filter_deleted' => 'Filtret er slettet.',
];
