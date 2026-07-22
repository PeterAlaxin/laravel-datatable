# Changelog

All notable changes to this project will be documented in this file.

## [v1.6.0] - 2026-07-22

### Added
- `toolbarActions()` method on the `WithDataTable` trait — adds custom global buttons to the header toolbar (independent of row selection), e.g. "Create", "Import" or a bulk sync. Supports link (`url`), Livewire method (`method`), optional confirmation modal (`confirm`), icon (resolved via `dticon()`) and Tabler `color`.

## [v1.5.0] - 2026-07-20

### Added
- `dticon()` helper and configurable icon presets — logical icon names used across the views are resolved to CSS classes via the selected preset. Ships `tabler` (default) and `fontawesome` presets, configurable through `icons` / `icon_presets` in `config/datatable.php` (or the `DATATABLE_ICONS` env var).
- `ui` config option (`tabler` default, `adminlte`) — the `adminlte` mode loads a CSS compatibility layer that maps the Tabler classes used by the package onto Bootstrap 5, plus a self-contained Bootstrap 5 confirm modal. Configurable via the `DATATABLE_UI` env var.
- Tabler-like sortable header styling with explicit sort-direction icons and compact square row-action buttons.

### Changed
- Default `pagination_view` is now `livewire::bootstrap` (Livewire 4).

## [v1.4.0] - 2026-05-20

### Added
- `searchUsing()` method on `Column` for custom global search logic — accepts a `Closure(Builder, string)` and is wrapped in `orWhere()` so the body can freely use `where` / `whereHas` / `whereRaw` while still combining as OR with sibling searchable columns. Useful for JSON fields, complex/nested relations, fulltext search, multi-column logical groups.

## [v1.3.0] - 2026-05-04

### Added
- Laravel 13 support (`laravel/framework: ^13.0`)
- `orchestra/testbench` constraint extended to `^10.0` (Laravel 12) and `^11.0` (Laravel 13)

## [v1.2.0] - 2026-02-17

### Added
- `queryUsing()` method on `SelectFilter` for custom query logic, allowing full control over the filter query
- 16 new translations: Czech (`cs`), Danish (`da`), Greek (`el`), Spanish (`es`), Finnish (`fi`), French (`fr`), Hungarian (`hu`), Italian (`it`), Dutch (`nl`), Norwegian (`no`), Polish (`pl`), Portuguese (`pt`), Romanian (`ro`), Swedish (`sv`), Turkish (`tr`), Ukrainian (`uk`)

### Fixed
- Filter operator translations now respect the current Laravel locale (previously cached in constructor and not updated on locale change)

## [v1.1.0] - 2026-02-17

### Added
- Initial release
- DataTable component with Livewire integration
- Column types: Text, Number, Money, Boolean, Date, DateTime, Enum, Relation
- Filter types: Text, Number, Date, Boolean, Select, Tag
- Saved filters per user and table
- Column settings with drag-and-drop reorder
- CSV export
- Row actions and bulk actions
- Row click URL
- German (`de`) translation
- English (`en`) and Slovak (`sk`) translations
