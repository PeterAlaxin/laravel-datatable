<?php

return [
    // TextFilter operators
    'contains' => 'Contains',
    'starts_with' => 'Starts with',
    'ends_with' => 'Ends with',
    'equals' => 'Equals',
    'not_equals' => 'Not equals',
    'not_contains' => 'Does not contain',
    'is_empty' => 'Is empty',
    'is_not_empty' => 'Is not empty',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Between',
    'approximately' => '~ (approximately 5%)',

    // DateFilter operators
    'before' => 'Before',
    'after' => 'After',
    'today' => 'Today',
    'yesterday' => 'Yesterday',
    'this_week' => 'This week',
    'last_week' => 'Last week',
    'this_month' => 'This month',
    'last_month' => 'Last month',
    'this_year' => 'This year',

    // BooleanFilter operators
    'is_true' => 'Yes',
    'is_false' => 'No',
    'is_null' => 'Not set',

    // SelectFilter operators
    'is' => 'Is',
    'is_not' => 'Is not',
    'is_one_of' => 'Is one of',
    'is_none_of' => 'Is none of',

    // TagFilter operators
    'tag_in' => 'Contains',
    'tag_not_in' => 'Does not contain',

    // BooleanColumn defaults
    'yes' => 'Yes',
    'no' => 'No',

    // UI - Search & Toolbar
    'search' => 'Search...',
    'saved_filters' => 'Saved filters',
    'clear_filter' => 'Clear filter',
    'filter' => 'Filter',
    'refresh' => 'Refresh',
    'export_csv' => 'Export to CSV',
    'column_settings' => 'Column settings',

    // UI - Empty state
    'no_records' => 'No records',
    'no_records_try_filter' => 'Try adjusting your filter or search.',
    'no_records_empty' => 'There are no records in the table.',

    // UI - Pagination
    'showing' => 'Showing :from - :to of :total',

    // UI - Filter builder
    'filters_title' => 'Filters',
    'active_filters' => 'Active filters',
    'add_filter' => 'Add filter',
    'column' => 'Column',
    'condition' => 'Condition',
    'select_column' => 'Select column...',
    'select_condition' => 'Select condition...',
    'value' => 'Value',
    'from' => 'From',
    'to' => 'To',
    'enter_value' => 'Enter value...',
    'select' => 'Select...',
    'save_filter' => 'Save filter',
    'filter_name' => 'Filter name...',
    'close' => 'Close',

    // UI - Column settings
    'column_settings_title' => 'Column settings',
    'column_settings_hint' => 'Drag columns to change order. Click the eye to hide/show.',
    'hide' => 'Hide',
    'show' => 'Show',
    'show_sum' => 'Show sum',

    // UI - Saved filters
    'delete_filter' => 'Delete filter',
    'confirm_delete_filter' => 'Are you sure you want to delete this filter?',
    'delete' => 'Delete',

    // Validation & notifications
    'filter_name_required' => 'Filter name is required.',
    'filter_name_max' => 'Filter name can be at most 100 characters.',
    'no_filters_to_save' => 'No active filters to save.',
    'filter_updated' => 'Filter was updated.',
    'filter_saved' => 'Filter was saved.',
    'filter_deleted' => 'Filter was deleted.',
];
