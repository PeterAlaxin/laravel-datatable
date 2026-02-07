<?php

return [
    // TextFilter operators
    'contains' => 'Sisältää',
    'starts_with' => 'Alkaa',
    'ends_with' => 'Päättyy',
    'equals' => 'On yhtä kuin',
    'not_equals' => 'Ei ole yhtä kuin',
    'not_contains' => 'Ei sisällä',
    'is_empty' => 'On tyhjä',
    'is_not_empty' => 'Ei ole tyhjä',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Välillä',
    'approximately' => '~ (noin 5%)',

    // DateFilter operators
    'before' => 'Ennen',
    'after' => 'Jälkeen',
    'today' => 'Tänään',
    'yesterday' => 'Eilen',
    'this_week' => 'Tällä viikolla',
    'last_week' => 'Viime viikolla',
    'this_month' => 'Tässä kuussa',
    'last_month' => 'Viime kuussa',
    'this_year' => 'Tänä vuonna',

    // BooleanFilter operators
    'is_true' => 'Kyllä',
    'is_false' => 'Ei',
    'is_null' => 'Ei asetettu',

    // SelectFilter operators
    'is' => 'On',
    'is_not' => 'Ei ole',
    'is_one_of' => 'On yksi seuraavista',
    'is_none_of' => 'Ei ole mikään seuraavista',

    // TagFilter operators
    'tag_in' => 'Sisältää',
    'tag_not_in' => 'Ei sisällä',

    // BooleanColumn defaults
    'yes' => 'Kyllä',
    'no' => 'Ei',

    // UI - Search & Toolbar
    'search' => 'Hae...',
    'saved_filters' => 'Tallennetut suodattimet',
    'clear_filter' => 'Tyhjennä suodatin',
    'filter' => 'Suodatin',
    'refresh' => 'Päivitä',
    'export_csv' => 'Vie CSV-muotoon',
    'column_settings' => 'Sarakkeiden asetukset',

    // UI - Empty state
    'no_records' => 'Ei tietueita',
    'no_records_try_filter' => 'Kokeile säätää suodatinta tai hakua.',
    'no_records_empty' => 'Taulukossa ei ole tietueita.',

    // UI - Pagination
    'showing' => 'Näytetään :from - :to / :total',

    // UI - Filter builder
    'filters_title' => 'Suodattimet',
    'active_filters' => 'Aktiiviset suodattimet',
    'add_filter' => 'Lisää suodatin',
    'column' => 'Sarake',
    'condition' => 'Ehto',
    'select_column' => 'Valitse sarake...',
    'select_condition' => 'Valitse ehto...',
    'value' => 'Arvo',
    'from' => 'Alkaen',
    'to' => 'Asti',
    'enter_value' => 'Syötä arvo...',
    'select' => 'Valitse...',
    'save_filter' => 'Tallenna suodatin',
    'filter_name' => 'Suodattimen nimi...',
    'close' => 'Sulje',

    // UI - Column settings
    'column_settings_title' => 'Sarakkeiden asetukset',
    'column_settings_hint' => 'Vedä sarakkeita järjestyksen muuttamiseksi. Napsauta silmää piilottaaksesi/näyttääksesi.',
    'hide' => 'Piilota',
    'show' => 'Näytä',
    'show_sum' => 'Näytä summa',

    // UI - Saved filters
    'delete_filter' => 'Poista suodatin',
    'confirm_delete_filter' => 'Haluatko varmasti poistaa tämän suodattimen?',
    'delete' => 'Poista',

    // Validation & notifications
    'filter_name_required' => 'Suodattimen nimi on pakollinen.',
    'filter_name_max' => 'Suodattimen nimi voi olla enintään 100 merkkiä.',
    'no_filters_to_save' => 'Ei aktiivisia suodattimia tallennettavaksi.',
    'filter_updated' => 'Suodatin päivitetty.',
    'filter_saved' => 'Suodatin tallennettu.',
    'filter_deleted' => 'Suodatin poistettu.',
];
