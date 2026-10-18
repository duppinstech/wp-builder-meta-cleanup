---
paths:
  - "tests/**"
  - "includes/**/*.php"
  - "builder-meta-cleanup.php"
---

# Testing standard

## Minimum (every change)
1. `php -l` passes on every changed PHP file (the PostToolUse hook does this).
2. Manual smoke test on a WordPress site with `WP_DEBUG` on:
   - The plugin activates without notices or errors.
   - **Tools → Builder Meta Cleanup** (`tools.php?page=builder-meta-cleanup`) opens on **Summary**.
   - **Themes & frameworks**, **Page builders**, **Plugins**, and **About & tools** render.
   - An inactive stack shows counts and offers delete. An active stack is skipped and delete stays blocked.
   - **About & tools** saves the update source: GitHub, WordPress.org, or both.
   - There is no front-end output.
3. If you touched the updater, test **Dashboard → Updates → Check Again** against a draft release. The zip root folder must be `builder-meta-cleanup/`.

## Automated tests
`tests/lint.php` runs `php -l` on PHP files outside `.git`, `vendor`, and `node_modules`. `tests/smoke.php` checks the plugin header and does not load WordPress.

```bash
php tests/lint.php
php tests/smoke.php
```

- There is no PHPUnit suite, Brain Monkey, or wp-phpunit.
- `.github/workflows/ci.yml` and `release.yml` run both commands on PHP 7.4.

## Priority test targets
- `Builder_Meta_Cleanup_Service::delete_meta_like()`, `delete_options_like()`, `delete_option_by_name()`, and `delete_all_for_inactive()` — these delete database rows.
- `Builder_Meta_Cleanup_Service::is_target_active()` — the guard that must stay closed for an active stack.
- `Builder_Meta_Cleanup_Admin::render_page()` — Tools POST: nonce `builder_meta_cleanup_action`, capability `manage_options`, then deletes.
- `Builder_Meta_Cleanup_Updater::get_github_payload()` and `inject_update()` — remote HTTP and the update object WordPress installs.
- `Builder_Meta_Cleanup_CLI::handle()` — the same deletes over WP-CLI.
