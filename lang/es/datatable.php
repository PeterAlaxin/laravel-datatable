<?php

return [
    // TextFilter operators
    'contains' => 'Contiene',
    'starts_with' => 'Empieza con',
    'ends_with' => 'Termina con',
    'equals' => 'Igual a',
    'not_equals' => 'Diferente de',
    'not_contains' => 'No contiene',
    'is_empty' => 'Está vacío',
    'is_not_empty' => 'No está vacío',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Entre',
    'approximately' => '~ (aproximadamente 5%)',

    // DateFilter operators
    'before' => 'Antes de',
    'after' => 'Después de',
    'today' => 'Hoy',
    'yesterday' => 'Ayer',
    'this_week' => 'Esta semana',
    'last_week' => 'La semana pasada',
    'this_month' => 'Este mes',
    'last_month' => 'El mes pasado',
    'this_year' => 'Este año',

    // BooleanFilter operators
    'is_true' => 'Sí',
    'is_false' => 'No',
    'is_null' => 'No definido',

    // SelectFilter operators
    'is' => 'Es',
    'is_not' => 'No es',
    'is_one_of' => 'Es uno de',
    'is_none_of' => 'No es ninguno de',

    // TagFilter operators
    'tag_in' => 'Contiene',
    'tag_not_in' => 'No contiene',

    // BooleanColumn defaults
    'yes' => 'Sí',
    'no' => 'No',

    // UI - Search & Toolbar
    'search' => 'Buscar...',
    'saved_filters' => 'Filtros guardados',
    'clear_filter' => 'Limpiar filtro',
    'filter' => 'Filtro',
    'refresh' => 'Actualizar',
    'export_csv' => 'Exportar a CSV',
    'column_settings' => 'Configuración de columnas',

    // UI - Empty state
    'no_records' => 'Sin registros',
    'no_records_try_filter' => 'Intente ajustar su filtro o búsqueda.',
    'no_records_empty' => 'No hay registros en la tabla.',

    // UI - Pagination
    'showing' => 'Mostrando :from - :to de :total',

    // UI - Filter builder
    'filters_title' => 'Filtros',
    'active_filters' => 'Filtros activos',
    'add_filter' => 'Añadir filtro',
    'column' => 'Columna',
    'condition' => 'Condición',
    'select_column' => 'Seleccionar columna...',
    'select_condition' => 'Seleccionar condición...',
    'value' => 'Valor',
    'from' => 'Desde',
    'to' => 'Hasta',
    'enter_value' => 'Introducir valor...',
    'select' => 'Seleccionar...',
    'save_filter' => 'Guardar filtro',
    'filter_name' => 'Nombre del filtro...',
    'close' => 'Cerrar',

    // UI - Column settings
    'column_settings_title' => 'Configuración de columnas',
    'column_settings_hint' => 'Arrastre las columnas para cambiar el orden. Haga clic en el ojo para ocultar/mostrar.',
    'hide' => 'Ocultar',
    'show' => 'Mostrar',
    'show_sum' => 'Mostrar suma',

    // UI - Saved filters
    'delete_filter' => 'Eliminar filtro',
    'confirm_delete_filter' => '¿Está seguro de que desea eliminar este filtro?',
    'delete' => 'Eliminar',

    // Validation & notifications
    'filter_name_required' => 'El nombre del filtro es obligatorio.',
    'filter_name_max' => 'El nombre del filtro no puede tener más de 100 caracteres.',
    'no_filters_to_save' => 'No hay filtros activos para guardar.',
    'filter_updated' => 'El filtro ha sido actualizado.',
    'filter_saved' => 'El filtro ha sido guardado.',
    'filter_deleted' => 'El filtro ha sido eliminado.',
];
