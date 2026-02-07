<?php

return [
    // TextFilter operators
    'contains' => 'Obsahuje',
    'starts_with' => 'Začína na',
    'ends_with' => 'Končí na',
    'equals' => 'Rovná sa',
    'not_equals' => 'Nerovná sa',
    'not_contains' => 'Neobsahuje',
    'is_empty' => 'Je prázdne',
    'is_not_empty' => 'Nie je prázdne',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => '≥',
    'less_than' => '<',
    'less_or_equal' => '≤',
    'between' => 'Medzi',
    'approximately' => '~ (približne 5%)',

    // DateFilter operators
    'before' => 'Pred',
    'after' => 'Po',
    'today' => 'Dnes',
    'yesterday' => 'Včera',
    'this_week' => 'Tento týždeň',
    'last_week' => 'Minulý týždeň',
    'this_month' => 'Tento mesiac',
    'last_month' => 'Minulý mesiac',
    'this_year' => 'Tento rok',

    // BooleanFilter operators
    'is_true' => 'Áno',
    'is_false' => 'Nie',
    'is_null' => 'Nie je nastavené',

    // SelectFilter operators
    'is' => 'Je',
    'is_not' => 'Nie je',
    'is_one_of' => 'Je jedna z',
    'is_none_of' => 'Nie je ani jedna z',

    // TagFilter operators
    'tag_in' => 'Obsahuje',
    'tag_not_in' => 'Neobsahuje',

    // BooleanColumn defaults
    'yes' => 'Áno',
    'no' => 'Nie',

    // UI - Search & Toolbar
    'search' => 'Hľadať...',
    'saved_filters' => 'Uložené filtre',
    'clear_filter' => 'Zrušiť filter',
    'filter' => 'Filter',
    'refresh' => 'Obnoviť',
    'export_csv' => 'Exportovať do CSV',
    'column_settings' => 'Nastavenie stĺpcov',

    // UI - Empty state
    'no_records' => 'Žiadne záznamy',
    'no_records_try_filter' => 'Skúste upraviť filter alebo vyhľadávanie.',
    'no_records_empty' => 'V tabuľke nie sú žiadne záznamy.',

    // UI - Pagination
    'showing' => 'Zobrazuje sa :from - :to z :total',

    // UI - Filter builder
    'filters_title' => 'Filtre',
    'active_filters' => 'Aktívne filtre',
    'add_filter' => 'Pridať filter',
    'column' => 'Stĺpec',
    'condition' => 'Podmienka',
    'select_column' => 'Vyberte stĺpec...',
    'select_condition' => 'Vyberte podmienku...',
    'value' => 'Hodnota',
    'from' => 'Od',
    'to' => 'Do',
    'enter_value' => 'Zadajte hodnotu...',
    'select' => 'Vyberte...',
    'save_filter' => 'Uložiť filter',
    'filter_name' => 'Názov filtra...',
    'close' => 'Zavrieť',

    // UI - Column settings
    'column_settings_title' => 'Nastavenie stĺpcov',
    'column_settings_hint' => 'Pretiahnite stĺpce pre zmenu poradia. Kliknite na oko pre skrytie/zobrazenie.',
    'hide' => 'Skryť',
    'show' => 'Zobraziť',
    'show_sum' => 'Zobraziť súčet',

    // UI - Saved filters
    'delete_filter' => 'Odstrániť filter',
    'confirm_delete_filter' => 'Naozaj chcete odstrániť tento filter?',
    'delete' => 'Odstrániť',

    // Validation & notifications
    'filter_name_required' => 'Názov filtra je povinný.',
    'filter_name_max' => 'Názov filtra môže mať maximálne 100 znakov.',
    'no_filters_to_save' => 'Nie sú aktívne žiadne filtre na uloženie.',
    'filter_updated' => 'Filter bol aktualizovaný.',
    'filter_saved' => 'Filter bol uložený.',
    'filter_deleted' => 'Filter bol odstránený.',
];
