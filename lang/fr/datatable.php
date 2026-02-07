<?php

return [
    // TextFilter operators
    'contains' => 'Contient',
    'starts_with' => 'Commence par',
    'ends_with' => 'Se termine par',
    'equals' => 'Égal à',
    'not_equals' => 'Différent de',
    'not_contains' => 'Ne contient pas',
    'is_empty' => 'Est vide',
    'is_not_empty' => 'N\'est pas vide',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Entre',
    'approximately' => '~ (environ 5%)',

    // DateFilter operators
    'before' => 'Avant',
    'after' => 'Après',
    'today' => 'Aujourd\'hui',
    'yesterday' => 'Hier',
    'this_week' => 'Cette semaine',
    'last_week' => 'La semaine dernière',
    'this_month' => 'Ce mois-ci',
    'last_month' => 'Le mois dernier',
    'this_year' => 'Cette année',

    // BooleanFilter operators
    'is_true' => 'Oui',
    'is_false' => 'Non',
    'is_null' => 'Non défini',

    // SelectFilter operators
    'is' => 'Est',
    'is_not' => 'N\'est pas',
    'is_one_of' => 'Est l\'un de',
    'is_none_of' => 'N\'est aucun de',

    // TagFilter operators
    'tag_in' => 'Contient',
    'tag_not_in' => 'Ne contient pas',

    // BooleanColumn defaults
    'yes' => 'Oui',
    'no' => 'Non',

    // UI - Search & Toolbar
    'search' => 'Rechercher...',
    'saved_filters' => 'Filtres enregistrés',
    'clear_filter' => 'Effacer le filtre',
    'filter' => 'Filtre',
    'refresh' => 'Actualiser',
    'export_csv' => 'Exporter en CSV',
    'column_settings' => 'Paramètres des colonnes',

    // UI - Empty state
    'no_records' => 'Aucun enregistrement',
    'no_records_try_filter' => 'Essayez d\'ajuster votre filtre ou votre recherche.',
    'no_records_empty' => 'Il n\'y a aucun enregistrement dans le tableau.',

    // UI - Pagination
    'showing' => 'Affichage :from - :to sur :total',

    // UI - Filter builder
    'filters_title' => 'Filtres',
    'active_filters' => 'Filtres actifs',
    'add_filter' => 'Ajouter un filtre',
    'column' => 'Colonne',
    'condition' => 'Condition',
    'select_column' => 'Sélectionner une colonne...',
    'select_condition' => 'Sélectionner une condition...',
    'value' => 'Valeur',
    'from' => 'De',
    'to' => 'À',
    'enter_value' => 'Entrez une valeur...',
    'select' => 'Sélectionner...',
    'save_filter' => 'Enregistrer le filtre',
    'filter_name' => 'Nom du filtre...',
    'close' => 'Fermer',

    // UI - Column settings
    'column_settings_title' => 'Paramètres des colonnes',
    'column_settings_hint' => 'Faites glisser les colonnes pour changer l\'ordre. Cliquez sur l\'œil pour masquer/afficher.',
    'hide' => 'Masquer',
    'show' => 'Afficher',
    'show_sum' => 'Afficher la somme',

    // UI - Saved filters
    'delete_filter' => 'Supprimer le filtre',
    'confirm_delete_filter' => 'Êtes-vous sûr de vouloir supprimer ce filtre ?',
    'delete' => 'Supprimer',

    // Validation & notifications
    'filter_name_required' => 'Le nom du filtre est obligatoire.',
    'filter_name_max' => 'Le nom du filtre ne peut pas dépasser 100 caractères.',
    'no_filters_to_save' => 'Aucun filtre actif à enregistrer.',
    'filter_updated' => 'Le filtre a été mis à jour.',
    'filter_saved' => 'Le filtre a été enregistré.',
    'filter_deleted' => 'Le filtre a été supprimé.',
];
