# Plan

Current line is 2.3.x, declared in `builder-meta-cleanup.php`. Sites on GitHub updates follow GitHub Releases (`releases/latest`). Security fixes stay on latest 2.x ([SECURITY.md](SECURITY.md)).

## Now

- Keep deletes gated on an inactive owner.
- Add stacks through the registry, then follow the version checklist in [PROJECT_MEMORY.md](PROJECT_MEMORY.md).

## Done

- A `v*` tag runs `.github/workflows/release.yml`. It checks the tag against the plugin version, lints, runs the smoke test, and publishes `wp-builder-meta-cleanup.zip` with notes from `bin/release-notes.sh`. Do not create that GitHub Release by hand. Shipped on v2.3.4 and v2.3.5.

## Not in scope

- Deleting data for an active stack, or a general-purpose SQL cleaner.
- WordPress.org upload automation. Directory publishing stays a maintainer step.
