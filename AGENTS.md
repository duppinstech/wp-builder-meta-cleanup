# Agent notes — Builder Meta Cleanup

WordPress plugin (PHP 7.4+, WordPress 6.0+). No Composer or npm. Repo map and release checklist: [PROJECT_MEMORY.md](PROJECT_MEMORY.md). Ownership, intent, and plan: [OWNERSHIP.md](OWNERSHIP.md), [INTENT.md](INTENT.md), [PLAN.md](PLAN.md).

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

The zip is gitignored. Do not commit it.

## Conventions

- PHP indent is tabs. Text domain is `builder-meta-cleanup`. License is GPL-2.0-or-later.
- Match the style of the file you edit. User-facing strings use WordPress translation functions.
- New stacks go through `builder_meta_cleanup_targets` or the existing registry. See [CONTRIBUTING.md](CONTRIBUTING.md).
- Versions follow SemVer. Bump steps live in PROJECT_MEMORY.md. Do not bump a version unless the task is a release.
- Commit subjects: `Release vX.Y.Z: …` for releases; `fix:`, `feat:`, `docs:`, `ci:`, or `chore:` otherwise.

## Do not touch

- Do not weaken inactive-stack checks or widen delete patterns unless that is the task. Cleanup deletes database rows.
- Do not rewrite LICENSE, LICENSE.md, CHANGELOG.md, or SECURITY.md.
- Do not commit `.env` files, `CLAUDE.local.md`, `.claude/settings.local.json`, zips, or secrets.
- Do not push, tag, or create a GitHub Release unless the maintainer asked.
