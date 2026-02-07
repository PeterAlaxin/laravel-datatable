<?php

return [
    // TextFilter operators
    'contains' => 'Містить',
    'starts_with' => 'Починається з',
    'ends_with' => 'Закінчується на',
    'equals' => 'Дорівнює',
    'not_equals' => 'Не дорівнює',
    'not_contains' => 'Не містить',
    'is_empty' => 'Порожнє',
    'is_not_empty' => 'Не порожнє',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Між',
    'approximately' => '~ (приблизно 5%)',

    // DateFilter operators
    'before' => 'До',
    'after' => 'Після',
    'today' => 'Сьогодні',
    'yesterday' => 'Вчора',
    'this_week' => 'Цього тижня',
    'last_week' => 'Минулого тижня',
    'this_month' => 'Цього місяця',
    'last_month' => 'Минулого місяця',
    'this_year' => 'Цього року',

    // BooleanFilter operators
    'is_true' => 'Так',
    'is_false' => 'Ні',
    'is_null' => 'Не встановлено',

    // SelectFilter operators
    'is' => 'Є',
    'is_not' => 'Не є',
    'is_one_of' => 'Є одним з',
    'is_none_of' => 'Не є жодним з',

    // TagFilter operators
    'tag_in' => 'Містить',
    'tag_not_in' => 'Не містить',

    // BooleanColumn defaults
    'yes' => 'Так',
    'no' => 'Ні',

    // UI - Search & Toolbar
    'search' => 'Пошук...',
    'saved_filters' => 'Збережені фільтри',
    'clear_filter' => 'Очистити фільтр',
    'filter' => 'Фільтр',
    'refresh' => 'Оновити',
    'export_csv' => 'Експорт у CSV',
    'column_settings' => 'Налаштування стовпців',

    // UI - Empty state
    'no_records' => 'Немає записів',
    'no_records_try_filter' => 'Спробуйте змінити фільтр або пошук.',
    'no_records_empty' => 'У таблиці немає записів.',

    // UI - Pagination
    'showing' => 'Показано :from - :to з :total',

    // UI - Filter builder
    'filters_title' => 'Фільтри',
    'active_filters' => 'Активні фільтри',
    'add_filter' => 'Додати фільтр',
    'column' => 'Стовпець',
    'condition' => 'Умова',
    'select_column' => 'Виберіть стовпець...',
    'select_condition' => 'Виберіть умову...',
    'value' => 'Значення',
    'from' => 'Від',
    'to' => 'До',
    'enter_value' => 'Введіть значення...',
    'select' => 'Виберіть...',
    'save_filter' => 'Зберегти фільтр',
    'filter_name' => 'Назва фільтра...',
    'close' => 'Закрити',

    // UI - Column settings
    'column_settings_title' => 'Налаштування стовпців',
    'column_settings_hint' => 'Перетягніть стовпці, щоб змінити порядок. Натисніть на око, щоб приховати/показати.',
    'hide' => 'Приховати',
    'show' => 'Показати',
    'show_sum' => 'Показати суму',

    // UI - Saved filters
    'delete_filter' => 'Видалити фільтр',
    'confirm_delete_filter' => 'Ви впевнені, що хочете видалити цей фільтр?',
    'delete' => 'Видалити',

    // Validation & notifications
    'filter_name_required' => 'Назва фільтра обов\'язкова.',
    'filter_name_max' => 'Назва фільтра не може перевищувати 100 символів.',
    'no_filters_to_save' => 'Немає активних фільтрів для збереження.',
    'filter_updated' => 'Фільтр оновлено.',
    'filter_saved' => 'Фільтр збережено.',
    'filter_deleted' => 'Фільтр видалено.',
];
