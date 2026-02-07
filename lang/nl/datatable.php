<?php

return [
    // TextFilter operators
    'contains' => 'Bevat',
    'starts_with' => 'Begint met',
    'ends_with' => 'Eindigt met',
    'equals' => 'Is gelijk aan',
    'not_equals' => 'Is niet gelijk aan',
    'not_contains' => 'Bevat niet',
    'is_empty' => 'Is leeg',
    'is_not_empty' => 'Is niet leeg',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Tussen',
    'approximately' => '~ (ongeveer 5%)',

    // DateFilter operators
    'before' => 'Voor',
    'after' => 'Na',
    'today' => 'Vandaag',
    'yesterday' => 'Gisteren',
    'this_week' => 'Deze week',
    'last_week' => 'Vorige week',
    'this_month' => 'Deze maand',
    'last_month' => 'Vorige maand',
    'this_year' => 'Dit jaar',

    // BooleanFilter operators
    'is_true' => 'Ja',
    'is_false' => 'Nee',
    'is_null' => 'Niet ingesteld',

    // SelectFilter operators
    'is' => 'Is',
    'is_not' => 'Is niet',
    'is_one_of' => 'Is een van',
    'is_none_of' => 'Is geen van',

    // TagFilter operators
    'tag_in' => 'Bevat',
    'tag_not_in' => 'Bevat niet',

    // BooleanColumn defaults
    'yes' => 'Ja',
    'no' => 'Nee',

    // UI - Search & Toolbar
    'search' => 'Zoeken...',
    'saved_filters' => 'Opgeslagen filters',
    'clear_filter' => 'Filter wissen',
    'filter' => 'Filter',
    'refresh' => 'Vernieuwen',
    'export_csv' => 'Exporteren naar CSV',
    'column_settings' => 'Kolominstellingen',

    // UI - Empty state
    'no_records' => 'Geen records',
    'no_records_try_filter' => 'Probeer uw filter of zoekopdracht aan te passen.',
    'no_records_empty' => 'Er zijn geen records in de tabel.',

    // UI - Pagination
    'showing' => 'Weergave :from - :to van :total',

    // UI - Filter builder
    'filters_title' => 'Filters',
    'active_filters' => 'Actieve filters',
    'add_filter' => 'Filter toevoegen',
    'column' => 'Kolom',
    'condition' => 'Voorwaarde',
    'select_column' => 'Selecteer kolom...',
    'select_condition' => 'Selecteer voorwaarde...',
    'value' => 'Waarde',
    'from' => 'Van',
    'to' => 'Tot',
    'enter_value' => 'Voer waarde in...',
    'select' => 'Selecteer...',
    'save_filter' => 'Filter opslaan',
    'filter_name' => 'Filternaam...',
    'close' => 'Sluiten',

    // UI - Column settings
    'column_settings_title' => 'Kolominstellingen',
    'column_settings_hint' => 'Sleep kolommen om de volgorde te wijzigen. Klik op het oog om te verbergen/tonen.',
    'hide' => 'Verbergen',
    'show' => 'Tonen',
    'show_sum' => 'Som tonen',

    // UI - Saved filters
    'delete_filter' => 'Filter verwijderen',
    'confirm_delete_filter' => 'Weet u zeker dat u dit filter wilt verwijderen?',
    'delete' => 'Verwijderen',

    // Validation & notifications
    'filter_name_required' => 'Filternaam is verplicht.',
    'filter_name_max' => 'Filternaam mag maximaal 100 tekens bevatten.',
    'no_filters_to_save' => 'Geen actieve filters om op te slaan.',
    'filter_updated' => 'Filter is bijgewerkt.',
    'filter_saved' => 'Filter is opgeslagen.',
    'filter_deleted' => 'Filter is verwijderd.',
];
