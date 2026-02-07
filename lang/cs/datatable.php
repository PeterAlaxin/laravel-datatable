<?php

return [
    // TextFilter operators
    'contains' => 'Obsahuje',
    'starts_with' => 'Začíná na',
    'ends_with' => 'Končí na',
    'equals' => 'Rovná se',
    'not_equals' => 'Nerovná se',
    'not_contains' => 'Neobsahuje',
    'is_empty' => 'Je prázdné',
    'is_not_empty' => 'Není prázdné',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Mezi',
    'approximately' => '~ (přibližně 5%)',

    // DateFilter operators
    'before' => 'Před',
    'after' => 'Po',
    'today' => 'Dnes',
    'yesterday' => 'Včera',
    'this_week' => 'Tento týden',
    'last_week' => 'Minulý týden',
    'this_month' => 'Tento měsíc',
    'last_month' => 'Minulý měsíc',
    'this_year' => 'Tento rok',

    // BooleanFilter operators
    'is_true' => 'Ano',
    'is_false' => 'Ne',
    'is_null' => 'Nenastaveno',

    // SelectFilter operators
    'is' => 'Je',
    'is_not' => 'Není',
    'is_one_of' => 'Je jeden z',
    'is_none_of' => 'Není žádný z',

    // TagFilter operators
    'tag_in' => 'Obsahuje',
    'tag_not_in' => 'Neobsahuje',

    // BooleanColumn defaults
    'yes' => 'Ano',
    'no' => 'Ne',

    // UI - Search & Toolbar
    'search' => 'Hledat...',
    'saved_filters' => 'Uložené filtry',
    'clear_filter' => 'Zrušit filtr',
    'filter' => 'Filtr',
    'refresh' => 'Obnovit',
    'export_csv' => 'Export do CSV',
    'column_settings' => 'Nastavení sloupců',

    // UI - Empty state
    'no_records' => 'Žádné záznamy',
    'no_records_try_filter' => 'Zkuste upravit filtr nebo vyhledávání.',
    'no_records_empty' => 'V tabulce nejsou žádné záznamy.',

    // UI - Pagination
    'showing' => 'Zobrazeno :from - :to z :total',

    // UI - Filter builder
    'filters_title' => 'Filtry',
    'active_filters' => 'Aktivní filtry',
    'add_filter' => 'Přidat filtr',
    'column' => 'Sloupec',
    'condition' => 'Podmínka',
    'select_column' => 'Vyberte sloupec...',
    'select_condition' => 'Vyberte podmínku...',
    'value' => 'Hodnota',
    'from' => 'Od',
    'to' => 'Do',
    'enter_value' => 'Zadejte hodnotu...',
    'select' => 'Vyberte...',
    'save_filter' => 'Uložit filtr',
    'filter_name' => 'Název filtru...',
    'close' => 'Zavřít',

    // UI - Column settings
    'column_settings_title' => 'Nastavení sloupců',
    'column_settings_hint' => 'Přetažením změníte pořadí. Kliknutím na oko skryjete/zobrazíte.',
    'hide' => 'Skrýt',
    'show' => 'Zobrazit',
    'show_sum' => 'Zobrazit součet',

    // UI - Saved filters
    'delete_filter' => 'Smazat filtr',
    'confirm_delete_filter' => 'Opravdu chcete smazat tento filtr?',
    'delete' => 'Smazat',

    // Validation & notifications
    'filter_name_required' => 'Název filtru je povinný.',
    'filter_name_max' => 'Název filtru může mít maximálně 100 znaků.',
    'no_filters_to_save' => 'Žádné aktivní filtry k uložení.',
    'filter_updated' => 'Filtr byl aktualizován.',
    'filter_saved' => 'Filtr byl uložen.',
    'filter_deleted' => 'Filtr byl smazán.',
];
