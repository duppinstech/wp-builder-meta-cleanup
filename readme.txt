=== Builder Meta Cleanup ===
Contributors: oduppinsjr
Donate link: https://duppinstech.com
Tags: elementor, divi, database, postmeta, cleanup
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 2.3.4
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Shows which page builders and themes are active, and deletes leftover database rows only when they are inactive.

== Description ==

Builder Meta Cleanup is for a site that has moved off a page builder or theme and still has that product's data in the database.

It lists the stacks it knows, shows whether each one is installed and active, and deletes matching post meta and selected options only when that stack is not active. It does not change the content of your pages, including shortcodes.

The Tools screen covers themes and frameworks (including Astra, BeTheme, Impreza, and OceanWP), page builders (including Elementor, Divi, Beaver Builder, Bricks, SeedProd, Hello Elementor, and Fusion / Avada), and companion plugins such as Premium Addons, Essential Addons, and Ultimate Addons. The Plugins tab also lists other common plugins that can leave options or post meta behind.

* See row counts and choose what to delete.
* Cleanup stays off while that stack is still active.
* The same counts and deletes are available in WP-CLI as `wp builder-meta`.

= Support =

Support: [support@duppinstech.com](mailto:support@duppinstech.com). Made by [Duppins Technology](https://duppinstech.com).

== Installation ==

1. Download the plugin zip from the latest release.
2. In wp-admin, go to Plugins, Add New, Upload Plugin, choose the zip, and click Install Now.
3. Activate Builder Meta Cleanup.
4. Go to Tools, Builder Meta Cleanup.

= Updates =

New releases appear under Dashboard, Updates. Use Check again there to look for a release now.

== Frequently Asked Questions ==

= Will this delete shortcodes in post content? =

No. It only removes matching rows from post meta and the options you choose. Page content is unchanged.

= Why is cleanup disabled for an active stack? =

So you cannot delete data that the live theme or plugin still needs.

= Where do updates come from? =

GitHub Releases. Open Dashboard, Updates, and choose Check again to look for a new release.

== Screenshots ==

== Changelog ==

= 2.3.4 =
* Maintenance release. Cleanup behavior is unchanged.

= 2.3.3 =
* New theme targets: **Impreza (UpSolution)** — exact `usof_options_Impreza`, `theme_mods_Impreza/impreza`, plus LIKE patterns `usof_%` and `us_%`, plus `us_%` / `_us_%` postmeta — and **OceanWP** — exact `theme_mods_oceanwp` plus LIKE patterns `ocean_%`, `oceanwp_%`, `oewt_%`, plus `ocean_%` / `_ocean_%` postmeta. Cleanup is gated on the matching theme being inactive.

= 2.3.2 =
* New preset plugin target: **Unlimited Elements for Elementor** — exact option `addon_library_catalog` (autoloaded addon catalog cache, often 100KB+) plus `wp_options` LIKE patterns `addon_library_%` and `unlimited_elements_%`. Cleanup is gated on the plugin being inactive.

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

= 2.3.4 =
Maintenance release. Cleanup behavior is unchanged.

= 2.3.3 =
Adds Impreza (UpSolution) and OceanWP as theme targets, so their orphaned wp_options rows and postmeta can be swept when each theme is inactive.

= 2.3.2 =
Adds Unlimited Elements for Elementor as a preset target so its addon_library_catalog cache and related rows can be cleaned when the plugin is inactive.

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
