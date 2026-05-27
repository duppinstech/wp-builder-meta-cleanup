# Changelog

All notable changes to **Builder Meta Cleanup** are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.3.0] — 2026

### Added

- **Summary** tab: a site-wide breakdown of every cleanable postmeta / exact option / pattern option row across all inactive stacks, with totals (rows + bytes), per-stack detail, an explicit backup-confirmation checkbox that gates the action button, and a single "Delete N rows shown above" submit that runs the full cleanup in one pass.
- Master **Select all** checkbox in the header of each cleanup table (Postmeta, Exact options, Pattern options) on the Themes & frameworks, Page builders, and Plugins tabs. Toggling it selects / deselects every enabled child checkbox bound to the same form; indeterminate state is reflected when only some are checked.
- WP-CLI: `wp builder-meta summary` (read-only overview) and `wp builder-meta clean-orphans [--dry-run] [--yes]` (full cleanup, mirrors the Summary-tab button) for parity with the admin UI.
- Service helpers `Builder_Meta_Cleanup_Service::summary_for_inactive()` and `delete_all_for_inactive()` powering both the admin Summary tab and the new CLI commands.

### Safety

- The Summary "Run full cleanup" submit is double-gated: it is disabled until the user ticks the **"I have a current backup of this database and understand that this cannot be undone."** checkbox AND confirms a native browser `confirm()` dialog. Server side, the POST handler also re-checks the backup-confirmation field and re-checks `is_target_active()` per target before deleting anything, so a still-active stack can never be cleaned through the bulk path.

## [2.2.1] — 2026

### Added

- Astra: exact option `astra_docs_data` (cached help/docs payload) added to the allowlist.
- Astra: `options_like` patterns `astra_%` and `astra-%` covering Astra Sites / Starter Templates, Astra Pro, Astra Addons, and addon flag rows. Deletion is still blocked while the Astra theme is the active template/stylesheet.

## [2.2.0] — 2026

### Added

- Tabbed **Tools** screen: **Themes & frameworks**, **Page builders**, **Plugins**, **About & tools** (updates, notes, WP-CLI).
- Preset plugin targets for leftover **postmeta** / **wp_options** after uninstall (21 entries including **Magic Page** + 20 widely used plugins): see `includes/data-plugin-cruft-targets.php`.
- Filter `builder_meta_cleanup_plugin_paths` to adjust plugin main-file paths per target (e.g. Magic Page).
- Target fields `ui_tab` (`theme` \| `page_builder` \| `plugin`) and `plugin_paths` for generic active/installed detection.
- In-memory cache for `get_targets()` within a request.

### Changed

- Elementor companion addons use `plugin_paths` instead of hard-coded switch cases.

## [2.1.0] — 2026

### Added

- Fusion / Avada Builder: postmeta `meta_key LIKE '_fusion%'` and pattern-based `wp_options` rows matching `FS_%`.
- Elementor companion targets (independent of core Elementor active state): Premium Addons (`PA_%`), Essential Addons (`eael_%`), Ultimate Addons (`uael_%`) with install/active detection.
- Tools screen sections: **Page builders** vs **Companion plugins**, plus **Pattern-based wp_options** cleanup table.
- WP-CLI: `options-like-delete` with optional `--pattern` filter.

### Changed

- Target registry supports optional `category` (`builder` | `addon`) and `options_like` patterns (see `builder_meta_cleanup_targets` filter).

## [2.0.1]

### Changed

- Maintenance and documentation updates for plugin directory checks.

## [2.0.0]

### Added

- Initial public release: multi-builder detection, safe postmeta and allowlisted `wp_options` cleanup, WP-CLI commands (`counts`, `delete`, `option-counts`, `options-delete`).
- Core stacks: Elementor, Divi / Extra, Beaver Builder, Bricks, SeedProd, Hello Elementor, BeTheme / Muffin, Astra.

[Unreleased]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/compare/v2.3.0...HEAD
[2.3.0]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.3.0
[2.2.1]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.2.1
[2.2.0]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.2.0
[2.1.0]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.1.0
[2.0.1]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.0.1
[2.0.0]: https://github.com/oduppinsjr/wp-builder-meta-cleanup/releases/tag/v2.0.0
