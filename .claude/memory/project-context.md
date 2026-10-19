# Project context

_Shared, committed memory. Keep it factual and current. If the repo is public, so is this file._

- **Product:** Builder Meta Cleanup, a WordPress plugin. Owner: Odell Duppins / Duppins Technology.
- **Repo:** https://github.com/oduppinsjr/wp-builder-meta-cleanup (public)
- **Current release:** v2.3.4 (2026-10-18)
- **Distribution:** Default update source is GitHub Releases (`releases/latest`) via `includes/class-updater.php`. Optional WordPress.org through `plugins_api` when the source is `wordpress` or `both`. Directory publishing stays a maintainer step (`PLAN.md`).
- **Key dependencies:** None. No `composer.json` and no `package.json`.
- **Integrations:** GitHub REST `repos/{owner}/{repo}/releases/latest` with no token in the plugin. WordPress.org plugin information API when that update source is selected.
- **CI:** `php tests/lint.php` and `php tests/smoke.php` on PHP 7.4 (`.github/workflows/ci.yml`). `release.yml` runs the same checks on PHP 7.4 when a `v*` tag is pushed, then attaches the plugin zip to the GitHub Release.

## Review watchlist
Known items each department re-checks on every review until fixed. Remove lines when they're resolved.
- **Security:** none yet
- **Legal:** none yet
- **Finance:** none yet
- **Product:** none yet
- **Marketing:** none yet
- **Support:** none yet
- **Ops:** No `uninstall.php`. Option `builder_meta_cleanup_update_source` and site transients `builder_meta_cleanup_gh_release` and `builder_meta_cleanup_wporg_plugin` are not removed on uninstall.
- **UX:** none yet
