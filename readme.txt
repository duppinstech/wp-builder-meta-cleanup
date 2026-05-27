=== Builder Meta Cleanup ===
Contributors: oduppinsjr
Donate link: https://duppinstech.com
Tags: elementor, divi, database, postmeta, cleanup
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 2.3.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Detect major page builders, show install/active state, and remove orphaned postmeta or allowlisted options only when each stack is inactive. Includes WP-CLI.

== Description ==

Builder Meta Cleanup helps after you migrate away from a page builder or theme framework. It lists common stacks (Elementor, Divi, Beaver Builder, Bricks, SeedProd, Hello Elementor, BeTheme, Astra, Fusion / Avada, plus Elementor companion plugins such as Premium Addons, Essential Addons, and Ultimate Addons), shows whether each is installed and active, and lets you delete matching **postmeta**, selected **wp_options** rows, or **wp_options** rows matching safe prefixes (for example PA_, FS_) only when that stack is **not** active—so you do not wipe data for a builder or addon you still use.

* **Tools screen** — row counts, badges, and checkboxes for safe cleanup.
* **WP-CLI** — `wp builder-meta counts`, `delete`, `option-counts`, `options-delete`.

Extend behavior with the `builder_meta_cleanup_targets` filter.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`, or install the zip from Releases.
2. Activate **Builder Meta Cleanup** through the Plugins menu.
3. Go to **Tools → Builder Meta Cleanup**.

== Frequently Asked Questions ==

= Will this delete shortcodes in post content? =

No. It only removes matching rows from `postmeta` (and selected `options` you choose). Post content is unchanged.

= Why is cleanup disabled for an “active” stack? =

So you cannot delete meta that the live theme or plugin still needs.

== Screenshots ==

1. Tools screen with install/active badges and cleanup controls.

== Changelog ==

= 2.3.1 =
* Summary tab is now the default landing tab and the first entry in the navigation.
* Per-stack breakdown table now has a checkbox per stack (all checked by default) plus a master Select-all in the header, so you can opt out of individual stacks before running the bulk cleanup. The submit button label and enabled state update live as you toggle stacks.

= 2.3.0 =
* New **Summary** tab with site-wide breakdown of every orphaned postmeta / option row across inactive stacks, a backup-confirmation gate, and a one-click "Delete N rows" full cleanup.
* Each cleanup table (postmeta, exact options, pattern options) on the Themes & frameworks, Page builders, and Plugins tabs now has a master "Select all" checkbox with indeterminate state.
* WP-CLI: `wp builder-meta summary` and `wp builder-meta clean-orphans [--dry-run] [--yes]` for parity with the new Summary tab.

= 2.2.1 =
* Astra: cover `astra_docs_data` plus `astra_%` and `astra-%` option families (Astra Sites / Starter Templates, Astra Pro, Astra Addons). Still gated on Astra theme being inactive.

= 2.2.0 =
* Admin UI: tabs — Themes & frameworks, Page builders, Plugins, About & tools (updates / notes / WP-CLI).
* Twenty preset “cruft” plugin targets (Slider Revolution, LayerSlider, WPBakery, Yoast SEO, AIOSEO, W3 TC, Wordfence, UpdraftPlus, WP Rocket, Jetpack, NextGEN, Gravity Forms, CF7, WPML, Polylang, Redirection, Really Simple SSL, TablePress, WPForms, Smush) plus Magic Page — via includes/data-plugin-cruft-targets.php.
* Targets support ui_tab and plugin_paths; builder_meta_cleanup_plugin_paths filter for paths (Magic Page).
* Registry caching for get_targets().

= 2.1.0 =
* Fusion / Avada Builder: postmeta `_fusion%` and pattern-based wp_options `FS_%`.
* Elementor companion plugins (separate from core Elementor): Premium Addons (`PA_%`), Essential Addons (`eael_%`), Ultimate Addons (`uael_%`) with install/active checks.
* Tools screen: “Page builders” vs “Companion plugins”, plus pattern-based options cleanup.
* WP-CLI: `options-like-delete`.

= 2.0.1 =
* Maintenance and documentation updates for plugin directory checks.

== Upgrade Notice ==

= 2.3.1 =
Summary tab is now the default and supports per-stack opt-out checkboxes so you can exclude individual stacks before running a full cleanup.

= 2.3.0 =
Adds a Summary tab with a one-click full cleanup for all inactive stacks, master Select-all on every cleanup table, and matching WP-CLI commands.

= 2.2.1 =
Astra cleanup now covers `astra_docs_data` and the broader `astra_%` / `astra-%` option families.

= 2.2.0 =
Tabbed Tools UI and preset targets for 20+ popular plugins plus Magic Page (see changelog).

= 2.1.0 =
Fusion / Avada support, Elementor addon plugins, and LIKE-based wp_options cleanup.

= 2.0.1 =
Maintenance release.
