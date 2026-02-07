<?php

return [
    // TextFilter operators
    'contains' => 'İçerir',
    'starts_with' => 'İle başlar',
    'ends_with' => 'İle biter',
    'equals' => 'Eşittir',
    'not_equals' => 'Eşit değildir',
    'not_contains' => 'İçermez',
    'is_empty' => 'Boş',
    'is_not_empty' => 'Boş değil',

    // NumberFilter operators
    'greater_than' => '>',
    'greater_or_equal' => "\u{2265}",
    'less_than' => '<',
    'less_or_equal' => "\u{2264}",
    'between' => 'Arasında',
    'approximately' => '~ (yaklaşık %5)',

    // DateFilter operators
    'before' => 'Önce',
    'after' => 'Sonra',
    'today' => 'Bugün',
    'yesterday' => 'Dün',
    'this_week' => 'Bu hafta',
    'last_week' => 'Geçen hafta',
    'this_month' => 'Bu ay',
    'last_month' => 'Geçen ay',
    'this_year' => 'Bu yıl',

    // BooleanFilter operators
    'is_true' => 'Evet',
    'is_false' => 'Hayır',
    'is_null' => 'Belirlenmemiş',

    // SelectFilter operators
    'is' => 'Eşittir',
    'is_not' => 'Eşit değildir',
    'is_one_of' => 'Bunlardan biri',
    'is_none_of' => 'Bunlardan hiçbiri',

    // TagFilter operators
    'tag_in' => 'İçerir',
    'tag_not_in' => 'İçermez',

    // BooleanColumn defaults
    'yes' => 'Evet',
    'no' => 'Hayır',

    // UI - Search & Toolbar
    'search' => 'Ara...',
    'saved_filters' => 'Kayıtlı filtreler',
    'clear_filter' => 'Filtreyi temizle',
    'filter' => 'Filtre',
    'refresh' => 'Yenile',
    'export_csv' => 'CSV olarak dışa aktar',
    'column_settings' => 'Sütun ayarları',

    // UI - Empty state
    'no_records' => 'Kayıt yok',
    'no_records_try_filter' => 'Filtrenizi veya aramanızı ayarlamayı deneyin.',
    'no_records_empty' => 'Tabloda kayıt bulunmamaktadır.',

    // UI - Pagination
    'showing' => ':total kayıttan :from - :to arası gösteriliyor',

    // UI - Filter builder
    'filters_title' => 'Filtreler',
    'active_filters' => 'Aktif filtreler',
    'add_filter' => 'Filtre ekle',
    'column' => 'Sütun',
    'condition' => 'Koşul',
    'select_column' => 'Sütun seçin...',
    'select_condition' => 'Koşul seçin...',
    'value' => 'Değer',
    'from' => 'Başlangıç',
    'to' => 'Bitiş',
    'enter_value' => 'Değer girin...',
    'select' => 'Seçin...',
    'save_filter' => 'Filtreyi kaydet',
    'filter_name' => 'Filtre adı...',
    'close' => 'Kapat',

    // UI - Column settings
    'column_settings_title' => 'Sütun ayarları',
    'column_settings_hint' => 'Sırayı değiştirmek için sütunları sürükleyin. Gizlemek/göstermek için göz simgesine tıklayın.',
    'hide' => 'Gizle',
    'show' => 'Göster',
    'show_sum' => 'Toplamı göster',

    // UI - Saved filters
    'delete_filter' => 'Filtreyi sil',
    'confirm_delete_filter' => 'Bu filtreyi silmek istediğinizden emin misiniz?',
    'delete' => 'Sil',

    // Validation & notifications
    'filter_name_required' => 'Filtre adı gereklidir.',
    'filter_name_max' => 'Filtre adı en fazla 100 karakter olabilir.',
    'no_filters_to_save' => 'Kaydedilecek aktif filtre yok.',
    'filter_updated' => 'Filtre güncellendi.',
    'filter_saved' => 'Filtre kaydedildi.',
    'filter_deleted' => 'Filtre silindi.',
];
