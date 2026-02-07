<?php

return [
    // TextFilter operators
    'contains' => 'Zawiera',
    'starts_with' => 'Zaczyna się od',
    'ends_with' => 'Kończy się na',
    'equals' => 'Równa się',
    'not_equals' => 'Nie równa się',
    'not_contains' => 'Nie zawiera',
    'is_empty' => 'Jest puste',
    'is_not_empty' => 'Nie jest puste',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Pomiędzy',
    'approximately' => '~ (około 5%)',

    // DateFilter operators
    'before' => 'Przed',
    'after' => 'Po',
    'today' => 'Dzisiaj',
    'yesterday' => 'Wczoraj',
    'this_week' => 'Ten tydzień',
    'last_week' => 'Poprzedni tydzień',
    'this_month' => 'Ten miesiąc',
    'last_month' => 'Poprzedni miesiąc',
    'this_year' => 'Ten rok',

    // BooleanFilter operators
    'is_true' => 'Tak',
    'is_false' => 'Nie',
    'is_null' => 'Nie ustawiono',

    // SelectFilter operators
    'is' => 'Jest',
    'is_not' => 'Nie jest',
    'is_one_of' => 'Jest jednym z',
    'is_none_of' => 'Nie jest żadnym z',

    // TagFilter operators
    'tag_in' => 'Zawiera',
    'tag_not_in' => 'Nie zawiera',

    // BooleanColumn defaults
    'yes' => 'Tak',
    'no' => 'Nie',

    // UI - Search & Toolbar
    'search' => 'Szukaj...',
    'saved_filters' => 'Zapisane filtry',
    'clear_filter' => 'Wyczyść filtr',
    'filter' => 'Filtr',
    'refresh' => 'Odśwież',
    'export_csv' => 'Eksport do CSV',
    'column_settings' => 'Ustawienia kolumn',

    // UI - Empty state
    'no_records' => 'Brak rekordów',
    'no_records_try_filter' => 'Spróbuj dostosować filtr lub wyszukiwanie.',
    'no_records_empty' => 'W tabeli nie ma żadnych rekordów.',

    // UI - Pagination
    'showing' => 'Pokazano :from - :to z :total',

    // UI - Filter builder
    'filters_title' => 'Filtry',
    'active_filters' => 'Aktywne filtry',
    'add_filter' => 'Dodaj filtr',
    'column' => 'Kolumna',
    'condition' => 'Warunek',
    'select_column' => 'Wybierz kolumnę...',
    'select_condition' => 'Wybierz warunek...',
    'value' => 'Wartość',
    'from' => 'Od',
    'to' => 'Do',
    'enter_value' => 'Wprowadź wartość...',
    'select' => 'Wybierz...',
    'save_filter' => 'Zapisz filtr',
    'filter_name' => 'Nazwa filtru...',
    'close' => 'Zamknij',

    // UI - Column settings
    'column_settings_title' => 'Ustawienia kolumn',
    'column_settings_hint' => 'Przeciągnij kolumny, aby zmienić kolejność. Kliknij oko, aby ukryć/pokazać.',
    'hide' => 'Ukryj',
    'show' => 'Pokaż',
    'show_sum' => 'Pokaż sumę',

    // UI - Saved filters
    'delete_filter' => 'Usuń filtr',
    'confirm_delete_filter' => 'Czy na pewno chcesz usunąć ten filtr?',
    'delete' => 'Usuń',

    // Validation & notifications
    'filter_name_required' => 'Nazwa filtru jest wymagana.',
    'filter_name_max' => 'Nazwa filtru może mieć maksymalnie 100 znaków.',
    'no_filters_to_save' => 'Brak aktywnych filtrów do zapisania.',
    'filter_updated' => 'Filtr został zaktualizowany.',
    'filter_saved' => 'Filtr został zapisany.',
    'filter_deleted' => 'Filtr został usunięty.',
];
