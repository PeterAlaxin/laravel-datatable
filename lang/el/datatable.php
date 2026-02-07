<?php

return [
    // TextFilter operators
    'contains' => 'Περιέχει',
    'starts_with' => 'Ξεκινά με',
    'ends_with' => 'Τελειώνει με',
    'equals' => 'Ίσο με',
    'not_equals' => 'Διαφορετικό από',
    'not_contains' => 'Δεν περιέχει',
    'is_empty' => 'Είναι κενό',
    'is_not_empty' => 'Δεν είναι κενό',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Μεταξύ',
    'approximately' => '~ (περίπου 5%)',

    // DateFilter operators
    'before' => 'Πριν',
    'after' => 'Μετά',
    'today' => 'Σήμερα',
    'yesterday' => 'Χθες',
    'this_week' => 'Αυτή την εβδομάδα',
    'last_week' => 'Προηγούμενη εβδομάδα',
    'this_month' => 'Αυτόν τον μήνα',
    'last_month' => 'Προηγούμενο μήνα',
    'this_year' => 'Φέτος',

    // BooleanFilter operators
    'is_true' => 'Ναι',
    'is_false' => 'Όχι',
    'is_null' => 'Δεν έχει οριστεί',

    // SelectFilter operators
    'is' => 'Είναι',
    'is_not' => 'Δεν είναι',
    'is_one_of' => 'Είναι ένα από',
    'is_none_of' => 'Δεν είναι κανένα από',

    // TagFilter operators
    'tag_in' => 'Περιέχει',
    'tag_not_in' => 'Δεν περιέχει',

    // BooleanColumn defaults
    'yes' => 'Ναι',
    'no' => 'Όχι',

    // UI - Search & Toolbar
    'search' => 'Αναζήτηση...',
    'saved_filters' => 'Αποθηκευμένα φίλτρα',
    'clear_filter' => 'Καθαρισμός φίλτρου',
    'filter' => 'Φίλτρο',
    'refresh' => 'Ανανέωση',
    'export_csv' => 'Εξαγωγή σε CSV',
    'column_settings' => 'Ρυθμίσεις στηλών',

    // UI - Empty state
    'no_records' => 'Δεν υπάρχουν εγγραφές',
    'no_records_try_filter' => 'Δοκιμάστε να προσαρμόσετε το φίλτρο ή την αναζήτηση.',
    'no_records_empty' => 'Δεν υπάρχουν εγγραφές στον πίνακα.',

    // UI - Pagination
    'showing' => 'Εμφάνιση :from - :to από :total',

    // UI - Filter builder
    'filters_title' => 'Φίλτρα',
    'active_filters' => 'Ενεργά φίλτρα',
    'add_filter' => 'Προσθήκη φίλτρου',
    'column' => 'Στήλη',
    'condition' => 'Συνθήκη',
    'select_column' => 'Επιλέξτε στήλη...',
    'select_condition' => 'Επιλέξτε συνθήκη...',
    'value' => 'Τιμή',
    'from' => 'Από',
    'to' => 'Έως',
    'enter_value' => 'Εισάγετε τιμή...',
    'select' => 'Επιλέξτε...',
    'save_filter' => 'Αποθήκευση φίλτρου',
    'filter_name' => 'Όνομα φίλτρου...',
    'close' => 'Κλείσιμο',

    // UI - Column settings
    'column_settings_title' => 'Ρυθμίσεις στηλών',
    'column_settings_hint' => 'Σύρετε τις στήλες για αλλαγή σειράς. Κάντε κλικ στο μάτι για απόκρυψη/εμφάνιση.',
    'hide' => 'Απόκρυψη',
    'show' => 'Εμφάνιση',
    'show_sum' => 'Εμφάνιση αθροίσματος',

    // UI - Saved filters
    'delete_filter' => 'Διαγραφή φίλτρου',
    'confirm_delete_filter' => 'Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το φίλτρο;',
    'delete' => 'Διαγραφή',

    // Validation & notifications
    'filter_name_required' => 'Το όνομα φίλτρου είναι υποχρεωτικό.',
    'filter_name_max' => 'Το όνομα φίλτρου δεν μπορεί να υπερβαίνει τους 100 χαρακτήρες.',
    'no_filters_to_save' => 'Δεν υπάρχουν ενεργά φίλτρα για αποθήκευση.',
    'filter_updated' => 'Το φίλτρο ενημερώθηκε.',
    'filter_saved' => 'Το φίλτρο αποθηκεύτηκε.',
    'filter_deleted' => 'Το φίλτρο διαγράφηκε.',
];
