<?php

return [
    // TextFilter operators
    'contains' => 'Conține',
    'starts_with' => 'Începe cu',
    'ends_with' => 'Se termină cu',
    'equals' => 'Este egal cu',
    'not_equals' => 'Nu este egal cu',
    'not_contains' => 'Nu conține',
    'is_empty' => 'Este gol',
    'is_not_empty' => 'Nu este gol',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Între',
    'approximately' => '~ (aproximativ 5%)',

    // DateFilter operators
    'before' => 'Înainte de',
    'after' => 'După',
    'today' => 'Astăzi',
    'yesterday' => 'Ieri',
    'this_week' => 'Săptămâna aceasta',
    'last_week' => 'Săptămâna trecută',
    'this_month' => 'Luna aceasta',
    'last_month' => 'Luna trecută',
    'this_year' => 'Anul acesta',

    // BooleanFilter operators
    'is_true' => 'Da',
    'is_false' => 'Nu',
    'is_null' => 'Nesetat',

    // SelectFilter operators
    'is' => 'Este',
    'is_not' => 'Nu este',
    'is_one_of' => 'Este unul dintre',
    'is_none_of' => 'Nu este niciunul dintre',

    // TagFilter operators
    'tag_in' => 'Conține',
    'tag_not_in' => 'Nu conține',

    // BooleanColumn defaults
    'yes' => 'Da',
    'no' => 'Nu',

    // UI - Search & Toolbar
    'search' => 'Caută...',
    'saved_filters' => 'Filtre salvate',
    'clear_filter' => 'Șterge filtrul',
    'filter' => 'Filtru',
    'refresh' => 'Reîmprospătează',
    'export_csv' => 'Exportă în CSV',
    'column_settings' => 'Setări coloane',

    // UI - Empty state
    'no_records' => 'Nu există înregistrări',
    'no_records_try_filter' => 'Încercați să ajustați filtrul sau căutarea.',
    'no_records_empty' => 'Nu există înregistrări în tabel.',

    // UI - Pagination
    'showing' => 'Se afișează :from - :to din :total',

    // UI - Filter builder
    'filters_title' => 'Filtre',
    'active_filters' => 'Filtre active',
    'add_filter' => 'Adaugă filtru',
    'column' => 'Coloană',
    'condition' => 'Condiție',
    'select_column' => 'Selectează coloana...',
    'select_condition' => 'Selectează condiția...',
    'value' => 'Valoare',
    'from' => 'De la',
    'to' => 'Până la',
    'enter_value' => 'Introduceți valoarea...',
    'select' => 'Selectează...',
    'save_filter' => 'Salvează filtrul',
    'filter_name' => 'Numele filtrului...',
    'close' => 'Închide',

    // UI - Column settings
    'column_settings_title' => 'Setări coloane',
    'column_settings_hint' => 'Trageți coloanele pentru a schimba ordinea. Faceți clic pe ochi pentru a ascunde/afișa.',
    'hide' => 'Ascunde',
    'show' => 'Afișează',
    'show_sum' => 'Afișează suma',

    // UI - Saved filters
    'delete_filter' => 'Șterge filtrul',
    'confirm_delete_filter' => 'Sigur doriți să ștergeți acest filtru?',
    'delete' => 'Șterge',

    // Validation & notifications
    'filter_name_required' => 'Numele filtrului este obligatoriu.',
    'filter_name_max' => 'Numele filtrului nu poate avea mai mult de 100 de caractere.',
    'no_filters_to_save' => 'Nu există filtre active de salvat.',
    'filter_updated' => 'Filtrul a fost actualizat.',
    'filter_saved' => 'Filtrul a fost salvat.',
    'filter_deleted' => 'Filtrul a fost șters.',
];
