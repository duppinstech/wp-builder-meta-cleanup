# Project context

_Shared, committed memory. Keep it factual and current. If the repo is public, so is this file._

- **Product:** Builder Meta Cleanup, a WordPress plugin. Owner: Odell Duppins / Duppins Technology.
- **Repo:** https://github.com/oduppinsjr/wp-builder-meta-cleanup (public)
- **Current release:** v2.3.4 (2026-10-18)
- **Distribution:** GitHub Releases via `includes/class-builder-meta-cleanup-github-updater.php` (standard v1.1.0). `Update URI` is the GitHub repository. Directory publishing stays a maintainer step (`PLAN.md`).
- **Key dependencies:** None. No `composer.json` and no `package.json`.
- **Integrations:** GitHub REST `repos/oduppinsjr/wp-builder-meta-cleanup/releases/latest` with no token in the plugin.
- **CI:** `php tests/lint.php`, `php tests/smoke.php`, and `bin/release-notes.sh` for the current version on PHP 7.4 (`.github/workflows/ci.yml`). `release.yml` runs the same checks when a `v*` tag is pushed, then attaches `wp-builder-meta-cleanup.zip` and the release notes.

## Review watchlist
Known items each department re-checks on every review until fixed. Remove lines when they're resolved.
- **Security:** none yet
- **Legal:** none yet
- **Finance:** none yet
- **Product:** none yet
- **Marketing:** none yet
- **Support:** none yet
- **Ops:** none yet
- **UX:** none yet
