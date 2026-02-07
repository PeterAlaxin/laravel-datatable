<?php

return [
    // TextFilter operators
    'contains' => 'Enthält',
    'starts_with' => 'Beginnt mit',
    'ends_with' => 'Endet mit',
    'equals' => 'Gleich',
    'not_equals' => 'Ungleich',
    'not_contains' => 'Enthält nicht',
    'is_empty' => 'Ist leer',
    'is_not_empty' => 'Ist nicht leer',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => '≥',
    'less_than' => '<',
    'less_or_equal' => '≤',
    'between' => 'Zwischen',
    'approximately' => '~ (ungefähr 5%)',

    // DateFilter operators
    'before' => 'Vor',
    'after' => 'Nach',
    'today' => 'Heute',
    'yesterday' => 'Gestern',
    'this_week' => 'Diese Woche',
    'last_week' => 'Letzte Woche',
    'this_month' => 'Dieser Monat',
    'last_month' => 'Letzter Monat',
    'this_year' => 'Dieses Jahr',

    // BooleanFilter operators
    'is_true' => 'Ja',
    'is_false' => 'Nein',
    'is_null' => 'Nicht gesetzt',

    // SelectFilter operators
    'is' => 'Ist',
    'is_not' => 'Ist nicht',
    'is_one_of' => 'Ist eines von',
    'is_none_of' => 'Ist keines von',

    // TagFilter operators
    'tag_in' => 'Enthält',
    'tag_not_in' => 'Enthält nicht',

    // BooleanColumn defaults
    'yes' => 'Ja',
    'no' => 'Nein',

    // UI - Search & Toolbar
    'search' => 'Suchen...',
    'saved_filters' => 'Gespeicherte Filter',
    'clear_filter' => 'Filter löschen',
    'filter' => 'Filter',
    'refresh' => 'Aktualisieren',
    'export_csv' => 'Als CSV exportieren',
    'column_settings' => 'Spalteneinstellungen',

    // UI - Empty state
    'no_records' => 'Keine Einträge',
    'no_records_try_filter' => 'Versuchen Sie, den Filter oder die Suche anzupassen.',
    'no_records_empty' => 'Es gibt keine Einträge in der Tabelle.',

    // UI - Pagination
    'showing' => 'Zeige :from - :to von :total',

    // UI - Filter builder
    'filters_title' => 'Filter',
    'active_filters' => 'Aktive Filter',
    'add_filter' => 'Filter hinzufügen',
    'column' => 'Spalte',
    'condition' => 'Bedingung',
    'select_column' => 'Spalte auswählen...',
    'select_condition' => 'Bedingung auswählen...',
    'value' => 'Wert',
    'from' => 'Von',
    'to' => 'Bis',
    'enter_value' => 'Wert eingeben...',
    'select' => 'Auswählen...',
    'save_filter' => 'Filter speichern',
    'filter_name' => 'Filtername...',
    'close' => 'Schließen',

    // UI - Column settings
    'column_settings_title' => 'Spalteneinstellungen',
    'column_settings_hint' => 'Spalten ziehen, um die Reihenfolge zu ändern. Klicken Sie auf das Auge zum Ein-/Ausblenden.',
    'hide' => 'Ausblenden',
    'show' => 'Anzeigen',
    'show_sum' => 'Summe anzeigen',

    // UI - Saved filters
    'delete_filter' => 'Filter löschen',
    'confirm_delete_filter' => 'Sind Sie sicher, dass Sie diesen Filter löschen möchten?',
    'delete' => 'Löschen',

    // Validation & notifications
    'filter_name_required' => 'Filtername ist erforderlich.',
    'filter_name_max' => 'Filtername darf maximal 100 Zeichen haben.',
    'no_filters_to_save' => 'Keine aktiven Filter zum Speichern.',
    'filter_updated' => 'Filter wurde aktualisiert.',
    'filter_saved' => 'Filter wurde gespeichert.',
    'filter_deleted' => 'Filter wurde gelöscht.',
];
