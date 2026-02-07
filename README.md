# Laravel DataTable

Reusable DataTable component for Laravel + Livewire with filters, exports, and column settings.

## Requirements

- PHP 8.2+
- Laravel 11.0+
- Livewire 4.0+

## Installation

```bash
composer require peteralaxin/laravel-datatable
```

Publish migrations and run them:

```bash
php artisan vendor:publish --tag=datatable-migrations
php artisan migrate
```

Optionally publish config, views, or translations:

```bash
php artisan vendor:publish --tag=datatable-config
php artisan vendor:publish --tag=datatable-views
php artisan vendor:publish --tag=datatable-lang
```

## Quick Start

Create a Livewire component that extends `BaseDataTable`:

```php
<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use PeterAlaxin\DataTable\BaseDataTable;
use PeterAlaxin\DataTable\Columns\TextColumn;
use PeterAlaxin\DataTable\Columns\NumberColumn;
use PeterAlaxin\DataTable\Columns\MoneyColumn;
use PeterAlaxin\DataTable\Columns\BooleanColumn;
use PeterAlaxin\DataTable\Filters\TextFilter;
use PeterAlaxin\DataTable\Filters\BooleanFilter;

class ProductTable extends BaseDataTable
{
    public function getTableIdentifier(): string
    {
        return 'products';
    }

    protected function defineColumns(): array
    {
        return [
            TextColumn::make('name', 'Name')->searchable(),
            TextColumn::make('sku', 'SKU'),
            MoneyColumn::make('price', 'Price')->summable(),
            NumberColumn::make('stock', 'Stock'),
            BooleanColumn::make('is_active', 'Active'),
        ];
    }

    protected function defineFilters(): array
    {
        return [
            TextFilter::make('name', 'Name'),
            BooleanFilter::make('is_active', 'Active'),
        ];
    }

    protected function baseQuery(): Builder
    {
        return Product::query();
    }
}
```

Use the component in a Blade template:

```blade
<livewire:product-table />
```

## Column Types

### TextColumn

Basic text display with optional truncation.

```php
TextColumn::make('name', 'Name')
    ->searchable()
    ->limit(50)
```

### NumberColumn

Formatted numbers. Right-aligned and summable by default.

```php
NumberColumn::make('quantity')
    ->decimals(2)
    ->separators(',', ' ')
```

### MoneyColumn

Currency values. Extends NumberColumn with currency display.

```php
MoneyColumn::make('price', 'Price')
    ->currency('EUR')

// Or dynamic currency per row:
MoneyColumn::make('price')
    ->currencyFromColumn('currency_code')
```

### BooleanColumn

True/false display as icons or labels.

```php
BooleanColumn::make('is_active', 'Active')

// With custom labels:
BooleanColumn::make('is_active')
    ->labels('Enabled', 'Disabled')
    ->useLabels()

// With custom icons:
BooleanColumn::make('verified')
    ->icons('circle-check', 'circle-x')
```

### DateColumn

Formatted dates. Default format from config (`d.m.Y`).

```php
DateColumn::make('created_at')
    ->dateFormat('Y-m-d')
```

### DateTimeColumn

Extends DateColumn. Default format from config (`d.m.Y H:i`).

```php
DateTimeColumn::make('updated_at')
```

### EnumColumn

Color-coded badges for enum/status values.

```php
EnumColumn::make('status', 'Status')
    ->options([
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived',
    ])
    ->colors([
        'draft' => 'secondary',
        'published' => 'success',
        'archived' => 'danger',
    ])
```

### RelationColumn

Related model data using dot notation.

```php
RelationColumn::make('author.name', 'Author')
    ->searchable()
```

## Column Features

All column types share these methods:

```php
Column::make('key', 'Label')
    ->sortable()               // Enable sorting (default: true)
    ->searchable()             // Include in global search
    ->summable()               // Enable sum in footer
    ->hidden()                 // Hidden by default
    ->width(200)               // Column width in px
    ->alignRight()             // Right-align content
    ->alignCenter()            // Center-align content
    ->allowHtml()              // Render HTML in cell
    ->relation('category')     // Eager-load relation
    ->formatUsing(fn($value, $row) => strtoupper($value))
    ->hintUsing(fn($value, $row) => 'Additional info')
    ->linkUsing(fn($row) => route('items.show', $row))
    ->sortUsing(fn($query, $direction) => $query->orderBy('name', $direction))
    ->sumUsing(fn($rows) => $rows->sum('total'))
```

## Filter Types

### TextFilter

```php
TextFilter::make('name', 'Name')
```

Operators: contains, starts_with, ends_with, equals, not_equals, not_contains, is_empty, is_not_empty

### NumberFilter

```php
NumberFilter::make('price', 'Price')
    ->approximatePercent(10) // for "approximately" operator
```

Operators: equals, not_equals, greater_than, greater_or_equal, less_than, less_or_equal, between, approximately, is_empty, is_not_empty

### DateFilter

```php
DateFilter::make('created_at', 'Created')
```

Operators: equals, before, after, between, today, yesterday, this_week, last_week, this_month, last_month, this_year, is_empty, is_not_empty

### BooleanFilter

```php
BooleanFilter::make('is_active', 'Active')
```

Operators: is_true, is_false, is_null

### SelectFilter

```php
SelectFilter::make('status', 'Status')
    ->options(['draft' => 'Draft', 'published' => 'Published'])
    ->multiple()
```

Operators: equals, not_equals, in, not_in

### TagFilter

For many-to-many relationships.

```php
TagFilter::make('tags', 'Tags')
    ->options($tagOptions)
    ->tagRelation('tags')
    ->tagKey('tags.id')
```

Operators: in, not_in

### Relation Filtering

Any filter can target a related model:

```php
TextFilter::make('author_name', 'Author')
    ->relation('author')
```

## Features

### Saved Filters

Users can save their active filter combinations and reload them later. Saved filters are stored per user and per table.

### Column Settings

Users can toggle column visibility, reorder columns via drag-and-drop, and toggle sum display for numeric columns. Settings are persisted per user.

### CSV Export

Export the current view (respecting active filters and search) as a CSV file:

```php
// Available automatically via the export button in the UI
// Or override the filename:
public function getExportFilename(): string
{
    return 'my-products';
}
```

### Row Actions

```php
public function rowActions($row = null): array
{
    return [
        [
            'method' => 'edit',
            'label' => 'Edit',
            'icon' => 'pencil',
            'color' => 'primary',
        ],
        [
            'method' => 'delete',
            'label' => 'Delete',
            'icon' => 'trash',
            'color' => 'danger',
        ],
    ];
}
```

### Bulk Actions

```php
public function bulkActions(): array
{
    return [
        [
            'method' => 'bulkDelete',
            'label' => 'Delete Selected',
            'icon' => 'trash',
        ],
    ];
}
```

Selected row IDs are available in `$this->selectedRows`.

### Row Click URL

```php
public function getRowUrl(\Illuminate\Database\Eloquent\Model $row): ?string
{
    return route('products.show', $row);
}
```

### Settings Identifier

If multiple tables share column settings (e.g., same model, different filter context), override `getSettingsIdentifier()`:

```php
public function getSettingsIdentifier(): string
{
    return 'products'; // shared column settings
}

public function getTableIdentifier(): string
{
    return 'products-archived'; // unique filter settings
}
```

## Configuration

Publish the config file and adjust defaults:

```php
// config/datatable.php
return [
    'per_page_options' => [10, 25, 50, 100],
    'default_per_page' => 25,
    'date_format' => 'd.m.Y',
    'datetime_format' => 'd.m.Y H:i',
    'csv_separator' => ';',
    'number_decimal_separator' => ',',
    'number_thousands_separator' => ' ',
    'default_currency' => 'EUR',
];
```

## Translations

Available locales: English (`en`), Slovak (`sk`).

Publish and customize:

```bash
php artisan vendor:publish --tag=datatable-lang
```

## License

MIT
