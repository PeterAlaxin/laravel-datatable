<?php

return [
    // TextFilter operators
    'contains' => 'Innehåller',
    'starts_with' => 'Börjar med',
    'ends_with' => 'Slutar med',
    'equals' => 'Är lika med',
    'not_equals' => 'Är inte lika med',
    'not_contains' => 'Innehåller inte',
    'is_empty' => 'Är tom',
    'is_not_empty' => 'Är inte tom',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Mellan',
    'approximately' => '~ (ungefär 5%)',

    // DateFilter operators
    'before' => 'Före',
    'after' => 'Efter',
    'today' => 'Idag',
    'yesterday' => 'Igår',
    'this_week' => 'Denna vecka',
    'last_week' => 'Förra veckan',
    'this_month' => 'Denna månad',
    'last_month' => 'Förra månaden',
    'this_year' => 'Detta år',

    // BooleanFilter operators
    'is_true' => 'Ja',
    'is_false' => 'Nej',
    'is_null' => 'Ej angiven',

    // SelectFilter operators
    'is' => 'Är',
    'is_not' => 'Är inte',
    'is_one_of' => 'Är en av',
    'is_none_of' => 'Är ingen av',

    // TagFilter operators
    'tag_in' => 'Innehåller',
    'tag_not_in' => 'Innehåller inte',

    // BooleanColumn defaults
    'yes' => 'Ja',
    'no' => 'Nej',

    // UI - Search & Toolbar
    'search' => 'Sök...',
    'saved_filters' => 'Sparade filter',
    'clear_filter' => 'Rensa filter',
    'filter' => 'Filter',
    'refresh' => 'Uppdatera',
    'export_csv' => 'Exportera till CSV',
    'column_settings' => 'Kolumninställningar',

    // UI - Empty state
    'no_records' => 'Inga poster',
    'no_records_try_filter' => 'Försök justera ditt filter eller din sökning.',
    'no_records_empty' => 'Det finns inga poster i tabellen.',

    // UI - Pagination
    'showing' => 'Visar :from - :to av :total',

    // UI - Filter builder
    'filters_title' => 'Filter',
    'active_filters' => 'Aktiva filter',
    'add_filter' => 'Lägg till filter',
    'column' => 'Kolumn',
    'condition' => 'Villkor',
    'select_column' => 'Välj kolumn...',
    'select_condition' => 'Välj villkor...',
    'value' => 'Värde',
    'from' => 'Från',
    'to' => 'Till',
    'enter_value' => 'Ange värde...',
    'select' => 'Välj...',
    'save_filter' => 'Spara filter',
    'filter_name' => 'Filternamn...',
    'close' => 'Stäng',

    // UI - Column settings
    'column_settings_title' => 'Kolumninställningar',
    'column_settings_hint' => 'Dra kolumner för att ändra ordning. Klicka på ögat för att dölja/visa.',
    'hide' => 'Dölj',
    'show' => 'Visa',
    'show_sum' => 'Visa summa',

    // UI - Saved filters
    'delete_filter' => 'Ta bort filter',
    'confirm_delete_filter' => 'Är du säker på att du vill ta bort detta filter?',
    'delete' => 'Ta bort',

    // Validation & notifications
    'filter_name_required' => 'Filternamn krävs.',
    'filter_name_max' => 'Filternamn får vara högst 100 tecken.',
    'no_filters_to_save' => 'Inga aktiva filter att spara.',
    'filter_updated' => 'Filtret har uppdaterats.',
    'filter_saved' => 'Filtret har sparats.',
    'filter_deleted' => 'Filtret har tagits bort.',
];
