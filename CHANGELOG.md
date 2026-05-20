# Changelog

All notable changes to this project will be documented in this file.

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
