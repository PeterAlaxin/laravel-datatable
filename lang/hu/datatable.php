<?php

return [
    // TextFilter operators
    'contains' => 'Tartalmazza',
    'starts_with' => 'Ezzel kezdődik',
    'ends_with' => 'Ezzel végződik',
    'equals' => 'Egyenlő',
    'not_equals' => 'Nem egyenlő',
    'not_contains' => 'Nem tartalmazza',
    'is_empty' => 'Üres',
    'is_not_empty' => 'Nem üres',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Között',
    'approximately' => '~ (körülbelül 5%)',

    // DateFilter operators
    'before' => 'Előtt',
    'after' => 'Után',
    'today' => 'Ma',
    'yesterday' => 'Tegnap',
    'this_week' => 'Ezen a héten',
    'last_week' => 'Múlt héten',
    'this_month' => 'Ebben a hónapban',
    'last_month' => 'Múlt hónapban',
    'this_year' => 'Ebben az évben',

    // BooleanFilter operators
    'is_true' => 'Igen',
    'is_false' => 'Nem',
    'is_null' => 'Nincs beállítva',

    // SelectFilter operators
    'is' => 'Egyenlő',
    'is_not' => 'Nem egyenlő',
    'is_one_of' => 'Ezek egyike',
    'is_none_of' => 'Ezek egyike sem',

    // TagFilter operators
    'tag_in' => 'Tartalmazza',
    'tag_not_in' => 'Nem tartalmazza',

    // BooleanColumn defaults
    'yes' => 'Igen',
    'no' => 'Nem',

    // UI - Search & Toolbar
    'search' => 'Keresés...',
    'saved_filters' => 'Mentett szűrők',
    'clear_filter' => 'Szűrő törlése',
    'filter' => 'Szűrő',
    'refresh' => 'Frissítés',
    'export_csv' => 'Exportálás CSV-be',
    'column_settings' => 'Oszlop beállítások',

    // UI - Empty state
    'no_records' => 'Nincs találat',
    'no_records_try_filter' => 'Próbálja módosítani a szűrőt vagy a keresést.',
    'no_records_empty' => 'Nincsenek rekordok a táblázatban.',

    // UI - Pagination
    'showing' => ':from - :to megjelenítése, összesen :total',

    // UI - Filter builder
    'filters_title' => 'Szűrők',
    'active_filters' => 'Aktív szűrők',
    'add_filter' => 'Szűrő hozzáadása',
    'column' => 'Oszlop',
    'condition' => 'Feltétel',
    'select_column' => 'Válasszon oszlopot...',
    'select_condition' => 'Válasszon feltételt...',
    'value' => 'Érték',
    'from' => 'Ettől',
    'to' => 'Eddig',
    'enter_value' => 'Adja meg az értéket...',
    'select' => 'Válasszon...',
    'save_filter' => 'Szűrő mentése',
    'filter_name' => 'Szűrő neve...',
    'close' => 'Bezárás',

    // UI - Column settings
    'column_settings_title' => 'Oszlop beállítások',
    'column_settings_hint' => 'Húzza az oszlopokat a sorrend módosításához. Kattintson a szemre az elrejtéshez/megjelenítéshez.',
    'hide' => 'Elrejtés',
    'show' => 'Megjelenítés',
    'show_sum' => 'Összeg megjelenítése',

    // UI - Saved filters
    'delete_filter' => 'Szűrő törlése',
    'confirm_delete_filter' => 'Biztosan törölni szeretné ezt a szűrőt?',
    'delete' => 'Törlés',

    // Validation & notifications
    'filter_name_required' => 'A szűrő neve kötelező.',
    'filter_name_max' => 'A szűrő neve legfeljebb 100 karakter lehet.',
    'no_filters_to_save' => 'Nincs mentendő aktív szűrő.',
    'filter_updated' => 'A szűrő frissítve.',
    'filter_saved' => 'A szűrő mentve.',
    'filter_deleted' => 'A szűrő törölve.',
];
