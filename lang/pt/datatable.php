<?php

return [
    // TextFilter operators
    'contains' => 'Contém',
    'starts_with' => 'Começa com',
    'ends_with' => 'Termina com',
    'equals' => 'Igual a',
    'not_equals' => 'Diferente de',
    'not_contains' => 'Não contém',
    'is_empty' => 'Está vazio',
    'is_not_empty' => 'Não está vazio',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Entre',
    'approximately' => '~ (aproximadamente 5%)',

    // DateFilter operators
    'before' => 'Antes de',
    'after' => 'Depois de',
    'today' => 'Hoje',
    'yesterday' => 'Ontem',
    'this_week' => 'Esta semana',
    'last_week' => 'Semana passada',
    'this_month' => 'Este mês',
    'last_month' => 'Mês passado',
    'this_year' => 'Este ano',

    // BooleanFilter operators
    'is_true' => 'Sim',
    'is_false' => 'Não',
    'is_null' => 'Não definido',

    // SelectFilter operators
    'is' => 'É',
    'is_not' => 'Não é',
    'is_one_of' => 'É um de',
    'is_none_of' => 'Não é nenhum de',

    // TagFilter operators
    'tag_in' => 'Contém',
    'tag_not_in' => 'Não contém',

    // BooleanColumn defaults
    'yes' => 'Sim',
    'no' => 'Não',

    // UI - Search & Toolbar
    'search' => 'Pesquisar...',
    'saved_filters' => 'Filtros salvos',
    'clear_filter' => 'Limpar filtro',
    'filter' => 'Filtro',
    'refresh' => 'Atualizar',
    'export_csv' => 'Exportar para CSV',
    'column_settings' => 'Configurações de colunas',

    // UI - Empty state
    'no_records' => 'Nenhum registro',
    'no_records_try_filter' => 'Tente ajustar seu filtro ou pesquisa.',
    'no_records_empty' => 'Não há registros na tabela.',

    // UI - Pagination
    'showing' => 'Exibindo :from - :to de :total',

    // UI - Filter builder
    'filters_title' => 'Filtros',
    'active_filters' => 'Filtros ativos',
    'add_filter' => 'Adicionar filtro',
    'column' => 'Coluna',
    'condition' => 'Condição',
    'select_column' => 'Selecionar coluna...',
    'select_condition' => 'Selecionar condição...',
    'value' => 'Valor',
    'from' => 'De',
    'to' => 'Até',
    'enter_value' => 'Digite o valor...',
    'select' => 'Selecionar...',
    'save_filter' => 'Salvar filtro',
    'filter_name' => 'Nome do filtro...',
    'close' => 'Fechar',

    // UI - Column settings
    'column_settings_title' => 'Configurações de colunas',
    'column_settings_hint' => 'Arraste as colunas para alterar a ordem. Clique no olho para ocultar/mostrar.',
    'hide' => 'Ocultar',
    'show' => 'Mostrar',
    'show_sum' => 'Mostrar soma',

    // UI - Saved filters
    'delete_filter' => 'Excluir filtro',
    'confirm_delete_filter' => 'Tem certeza de que deseja excluir este filtro?',
    'delete' => 'Excluir',

    // Validation & notifications
    'filter_name_required' => 'O nome do filtro é obrigatório.',
    'filter_name_max' => 'O nome do filtro não pode ter mais de 100 caracteres.',
    'no_filters_to_save' => 'Nenhum filtro ativo para salvar.',
    'filter_updated' => 'O filtro foi atualizado.',
    'filter_saved' => 'O filtro foi salvo.',
    'filter_deleted' => 'O filtro foi excluído.',
];
