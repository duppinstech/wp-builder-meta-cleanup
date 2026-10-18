# Architectural decisions

Append-only log. Format: `## YYYY-MM-DD — Title`, then **Context** / **Decision** / **Consequences**. Owner waivers of High findings are recorded here too.

## 2026-04-24 — Delete only when the owning stack is inactive

**Context:** Page builders, themes, and companion plugins store data as postmeta and options. Deleting those rows while the owner is still active would break the site. Initial release v2.0.0 (`89f1376`).

**Decision:** Cleanup is offered only when `Builder_Meta_Cleanup_Service::is_target_active()` is false for that target. Active stacks are skipped.

**Consequences:** This is not a general database optimizer. New targets have to keep the same guard (`INTENT.md`, `PROJECT_MEMORY.md`).

## 2026-04-24 — Updates come from GitHub Releases

**Context:** The plugin is not distributed only through WordPress.org. Commit `de732ca` added `includes/class-updater.php`. There is no `composer.json` and no npm package.

**Decision:** The updater reads GitHub `releases/latest` by default. Option `builder_meta_cleanup_update_source` may be `github`, `wordpress`, or `both`. Classes are loaded with `require_once` from `builder-meta-cleanup.php`.

**Consequences:** Sites on the GitHub source see an update only when a GitHub Release exists (`PROJECT_MEMORY.md`). No package install step.

## 2026-05-04 — Targets live in a PHP registry

**Context:** v2.2.0 (`ee5b541`) added the tabbed Tools screen, preset plugin targets, and `PROJECT_MEMORY.md`.

**Decision:** Stack definitions live in `Builder_Meta_Cleanup_Service::get_targets()` and `includes/data-plugin-cruft-targets.php`. `builder_meta_cleanup_targets` can replace or extend that list. The screen is a Tools submenu, not a top-level menu.

**Consequences:** A new stack is a registry entry, not a new module. See `CONTRIBUTING.md`.

## 2026-05-27 — Summary bulk delete can only narrow the inactive set

**Context:** v2.3.1 (`a819953`) made Summary the default tab and added one checkbox per inactive stack.

**Decision:** `delete_all_for_inactive()` takes an optional target-id allowlist. The Tools POST handler checks posted ids against the live registry and runs `is_target_active()` again before deleting.

**Consequences:** Unchecked stacks are skipped. The request cannot add an active stack. WP-CLI `clean-orphans` passes no allowlist and still deletes every inactive target (`CHANGELOG.md`).
