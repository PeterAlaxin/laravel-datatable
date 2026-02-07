<?php

return [
    // TextFilter operators
    'contains' => 'Inneholder',
    'starts_with' => 'Begynner med',
    'ends_with' => 'Slutter med',
    'equals' => 'Er lik',
    'not_equals' => 'Er ikke lik',
    'not_contains' => 'Inneholder ikke',
    'is_empty' => 'Er tom',
    'is_not_empty' => 'Er ikke tom',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Mellom',
    'approximately' => '~ (omtrent 5%)',

    // DateFilter operators
    'before' => 'Før',
    'after' => 'Etter',
    'today' => 'I dag',
    'yesterday' => 'I går',
    'this_week' => 'Denne uken',
    'last_week' => 'Forrige uke',
    'this_month' => 'Denne måneden',
    'last_month' => 'Forrige måned',
    'this_year' => 'Dette året',

    // BooleanFilter operators
    'is_true' => 'Ja',
    'is_false' => 'Nei',
    'is_null' => 'Ikke angitt',

    // SelectFilter operators
    'is' => 'Er',
    'is_not' => 'Er ikke',
    'is_one_of' => 'Er en av',
    'is_none_of' => 'Er ingen av',

    // TagFilter operators
    'tag_in' => 'Inneholder',
    'tag_not_in' => 'Inneholder ikke',

    // BooleanColumn defaults
    'yes' => 'Ja',
    'no' => 'Nei',

    // UI - Search & Toolbar
    'search' => 'Søk...',
    'saved_filters' => 'Lagrede filtre',
    'clear_filter' => 'Tøm filter',
    'filter' => 'Filter',
    'refresh' => 'Oppdater',
    'export_csv' => 'Eksporter til CSV',
    'column_settings' => 'Kolonneinnstillinger',

    // UI - Empty state
    'no_records' => 'Ingen poster',
    'no_records_try_filter' => 'Prøv å justere filteret eller søket ditt.',
    'no_records_empty' => 'Det er ingen poster i tabellen.',

    // UI - Pagination
    'showing' => 'Viser :from - :to av :total',

    // UI - Filter builder
    'filters_title' => 'Filtre',
    'active_filters' => 'Aktive filtre',
    'add_filter' => 'Legg til filter',
    'column' => 'Kolonne',
    'condition' => 'Betingelse',
    'select_column' => 'Velg kolonne...',
    'select_condition' => 'Velg betingelse...',
    'value' => 'Verdi',
    'from' => 'Fra',
    'to' => 'Til',
    'enter_value' => 'Skriv inn verdi...',
    'select' => 'Velg...',
    'save_filter' => 'Lagre filter',
    'filter_name' => 'Filternavn...',
    'close' => 'Lukk',

    // UI - Column settings
    'column_settings_title' => 'Kolonneinnstillinger',
    'column_settings_hint' => 'Dra kolonner for å endre rekkefølge. Klikk på øyet for å skjule/vise.',
    'hide' => 'Skjul',
    'show' => 'Vis',
    'show_sum' => 'Vis sum',

    // UI - Saved filters
    'delete_filter' => 'Slett filter',
    'confirm_delete_filter' => 'Er du sikker på at du vil slette dette filteret?',
    'delete' => 'Slett',

    // Validation & notifications
    'filter_name_required' => 'Filternavn er påkrevd.',
    'filter_name_max' => 'Filternavn kan være maks 100 tegn.',
    'no_filters_to_save' => 'Ingen aktive filtre å lagre.',
    'filter_updated' => 'Filteret er oppdatert.',
    'filter_saved' => 'Filteret er lagret.',
    'filter_deleted' => 'Filteret er slettet.',
];
