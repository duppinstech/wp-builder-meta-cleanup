# Agent notes — Builder Meta Cleanup

WordPress plugin (PHP 7.4+, WordPress 6.0+). No Composer or npm. Repo map and release checklist: [PROJECT_MEMORY.md](PROJECT_MEMORY.md). Ownership, intent, and plan: [OWNERSHIP.md](OWNERSHIP.md), [INTENT.md](INTENT.md), [PLAN.md](PLAN.md).

## Plugin facts

- **Product:** Builder Meta Cleanup. Free public plugin. No Pro add-on.
- **Main file:** `builder-meta-cleanup.php`. **Slug:** `builder-meta-cleanup`.
- **Prefix:** `builder_meta_cleanup_` for hooks, options, transients, and the nonce. Classes `Builder_Meta_Cleanup_*`. Constants `BUILDER_META_CLEANUP_*`. No global functions.
- **Text domain:** `builder-meta-cleanup`.
- **Floor:** PHP 7.4+, WordPress 6.0+. Tested up to WordPress 6.7 (`README.md`).
- **License:** GPL-2.0-or-later.
- **Repo:** https://github.com/oduppinsjr/wp-builder-meta-cleanup (public).
- **Current version:** 2.3.4, declared in the plugin header and `BUILDER_META_CLEANUP_VERSION`.
- **Updater:** `includes/class-builder-meta-cleanup-github-updater.php` (`Builder_Meta_Cleanup_GitHub_Updater`, standard v1.1.0). GitHub Releases only. Booted at load. Disable with `BUILDER_META_CLEANUP_DISABLE_GITHUB_UPDATER`. Cache option `builder_meta_cleanup_github_release`.
- **Dependencies:** none.
- **Integrations:** unauthenticated GitHub Releases API (`api.github.com`).
- **Security-sensitive files:** `includes/class-service.php` (deletes rows), `includes/class-admin.php` (Tools POST), `includes/class-builder-meta-cleanup-github-updater.php` (remote HTTP and update injection), `includes/class-cli.php` (deletes).
- **Departments skipped:** none.

## What this is

For anyone using page builders in WordPress. Switching page builders often leaves the previous builder's data in the database, including postmeta on pages. Builder Meta Cleanup shows whether known page builders, themes, and companion plugins are installed or active, and deletes matching postmeta and allowlisted `wp_options` rows only when that owner is inactive.

It does not remove shortcodes or HTML inside `post_content`. It is not a general database optimizer, and it does not delete rows for an active stack. WP-CLI mirrors the admin actions.

## Architecture

- `builder-meta-cleanup.php` — header, version constants, requires the classes, boots the GitHub updater at load, starts admin on `plugins_loaded`, and registers WP-CLI when `WP_CLI` is defined.
- `includes/class-service.php` — target registry, install/active checks, and batched postmeta and `wp_options` deletes.
- `includes/data-plugin-cruft-targets.php` — preset plugin targets merged into the registry.
- `includes/class-admin.php` — Tools screen (`tools.php?page=builder-meta-cleanup`): Summary, Themes & frameworks, Page builders, Plugins, About & tools.
- `includes/class-builder-meta-cleanup-github-updater.php` — GitHub Releases updater (standard v1.1.0). Release asset `wp-builder-meta-cleanup.zip`.
- `uninstall.php` — deletes the updater cache and the previous update-source option.
- `includes/class-cli.php` — `wp builder-meta` commands for counts and deletes.
- `tests/` — `lint.php` (`php -l`) and `smoke.php` (plugin header only; does not load WordPress).
- `index.php` — empty file so directory listing stays closed.

## Commands

Install: copy this directory to `wp-content/plugins/builder-meta-cleanup/`, then activate **Builder Meta Cleanup**. There is no package install.

Lint:

```bash
php tests/lint.php
```

Test:

```bash
php tests/smoke.php
```

Build (zip root folder must be `builder-meta-cleanup/`):

```bash
git archive --format=zip --prefix=builder-meta-cleanup/ -o builder-meta-cleanup.zip HEAD
```

`bin/build-zip.sh` builds the same layout and applies `.distignore`. The zip is gitignored. Do not commit it.

## Conventions

- PHP indent is tabs. Text domain is `builder-meta-cleanup`. License is GPL-2.0-or-later.
- Match the style of the file you edit. User-facing strings use WordPress translation functions.
- New stacks go through `builder_meta_cleanup_targets` or the existing registry. See [CONTRIBUTING.md](CONTRIBUTING.md).
- Versions follow SemVer. Bump steps live in PROJECT_MEMORY.md. Do not bump a version unless the task is a release.
- Commit subjects: `Release vX.Y.Z: …` for releases; `fix:`, `feat:`, `docs:`, `ci:`, or `chore:` otherwise.

## Hard rules

- Do not weaken inactive-stack checks or widen delete patterns unless that is the task. Cleanup deletes database rows.
- Do not rewrite LICENSE, LICENSE.md, CHANGELOG.md, or SECURITY.md.
- Do not commit `.env` files, `CLAUDE.local.md`, `.claude/settings.local.json`, zips, or secrets.
- Do not push, tag, or create a GitHub Release unless the maintainer asked.

## Agents

| Agent | Use |
| --- | --- |
| `research` | WordPress, library, and third-party API behavior. Does not edit code. |
| `security-reviewer` | AJAX, REST, admin-post, uploads, rewrites, the updater, or `$_GET` / `$_POST` / `$_FILES` / `$_SERVER`. |
| `product-reviewer` | Scope against `INTENT.md` and `PLAN.md`, and the operator's path. |
| `ux-reviewer` | Admin screen accessibility, layout, and performance. This plugin has no front end. |
| `support-docs-reviewer` | CHANGELOG, README, `readme.txt`, admin copy, and i18n. |
| `legal-reviewer` | License, copyright, third-party terms, privacy. |
| `finance-reviewer` | Paid APIs, hosting, or a price. The plugin is free and has none of these today. |
| `marketing-reviewer` | Release-note highlights and public claims. |
| `release-ops-reviewer` | Ship safety: floor, zip contents, uninstall, rollback. |
| `test-writer` | Tests after a change. The harness is `tests/lint.php` and `tests/smoke.php`, not PHPUnit. |
