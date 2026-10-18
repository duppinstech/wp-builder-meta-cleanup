# Plan

Current line is 2.3.x, declared in `builder-meta-cleanup.php`. Sites on GitHub updates follow GitHub Releases (`releases/latest`). Security fixes stay on latest 2.x ([SECURITY.md](SECURITY.md)).

## Now

- Keep deletes gated on an inactive owner.
- Add stacks through the registry, then follow the version checklist in [PROJECT_MEMORY.md](PROJECT_MEMORY.md).
- A `v*` tag runs `.github/workflows/release.yml` (lint, smoke test, plugin zip on the GitHub Release).

## Not in scope

- Deleting data for an active stack, or a general-purpose SQL cleaner.
- WordPress.org upload automation. Directory publishing stays a maintainer step.

The manual tag and `gh release create` commands in PROJECT_MEMORY.md describe the same release. Use either the workflow or those commands for a given tag, so the release is not published twice.
