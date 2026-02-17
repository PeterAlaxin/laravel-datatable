# Changelog

All notable changes to this project will be documented in this file.

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
