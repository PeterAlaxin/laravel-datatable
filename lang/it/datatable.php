<?php

return [
    // TextFilter operators
    'contains' => 'Contiene',
    'starts_with' => 'Inizia con',
    'ends_with' => 'Finisce con',
    'equals' => 'Uguale a',
    'not_equals' => 'Diverso da',
    'not_contains' => 'Non contiene',
    'is_empty' => 'È vuoto',
    'is_not_empty' => 'Non è vuoto',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Tra',
    'approximately' => '~ (circa 5%)',

    // DateFilter operators
    'before' => 'Prima di',
    'after' => 'Dopo',
    'today' => 'Oggi',
    'yesterday' => 'Ieri',
    'this_week' => 'Questa settimana',
    'last_week' => 'La settimana scorsa',
    'this_month' => 'Questo mese',
    'last_month' => 'Il mese scorso',
    'this_year' => 'Quest\'anno',

    // BooleanFilter operators
    'is_true' => 'Sì',
    'is_false' => 'No',
    'is_null' => 'Non impostato',

    // SelectFilter operators
    'is' => 'È',
    'is_not' => 'Non è',
    'is_one_of' => 'È uno di',
    'is_none_of' => 'Non è nessuno di',

    // TagFilter operators
    'tag_in' => 'Contiene',
    'tag_not_in' => 'Non contiene',

    // BooleanColumn defaults
    'yes' => 'Sì',
    'no' => 'No',

    // UI - Search & Toolbar
    'search' => 'Cerca...',
    'saved_filters' => 'Filtri salvati',
    'clear_filter' => 'Cancella filtro',
    'filter' => 'Filtro',
    'refresh' => 'Aggiorna',
    'export_csv' => 'Esporta in CSV',
    'column_settings' => 'Impostazioni colonne',

    // UI - Empty state
    'no_records' => 'Nessun record',
    'no_records_try_filter' => 'Prova a modificare il filtro o la ricerca.',
    'no_records_empty' => 'Non ci sono record nella tabella.',

    // UI - Pagination
    'showing' => 'Visualizzazione :from - :to di :total',

    // UI - Filter builder
    'filters_title' => 'Filtri',
    'active_filters' => 'Filtri attivi',
    'add_filter' => 'Aggiungi filtro',
    'column' => 'Colonna',
    'condition' => 'Condizione',
    'select_column' => 'Seleziona colonna...',
    'select_condition' => 'Seleziona condizione...',
    'value' => 'Valore',
    'from' => 'Da',
    'to' => 'A',
    'enter_value' => 'Inserisci valore...',
    'select' => 'Seleziona...',
    'save_filter' => 'Salva filtro',
    'filter_name' => 'Nome del filtro...',
    'close' => 'Chiudi',

    // UI - Column settings
    'column_settings_title' => 'Impostazioni colonne',
    'column_settings_hint' => 'Trascina le colonne per cambiare l\'ordine. Clicca sull\'occhio per nascondere/mostrare.',
    'hide' => 'Nascondi',
    'show' => 'Mostra',
    'show_sum' => 'Mostra somma',

    // UI - Saved filters
    'delete_filter' => 'Elimina filtro',
    'confirm_delete_filter' => 'Sei sicuro di voler eliminare questo filtro?',
    'delete' => 'Elimina',

    // Validation & notifications
    'filter_name_required' => 'Il nome del filtro è obbligatorio.',
    'filter_name_max' => 'Il nome del filtro non può superare i 100 caratteri.',
    'no_filters_to_save' => 'Nessun filtro attivo da salvare.',
    'filter_updated' => 'Il filtro è stato aggiornato.',
    'filter_saved' => 'Il filtro è stato salvato.',
    'filter_deleted' => 'Il filtro è stato eliminato.',
];
