---
paths:
  - "builder-meta-cleanup.php"
  - "includes/**/*.php"
---

# API conventions (REST, AJAX, admin-post, hooks)

## REST
- Register in `rest_api_init` under a `builder-meta-cleanup/v1`-style namespace. Every route has a real `permission_callback`; never `__return_true` on routes that write.
- Validate and sanitize every argument with `args` → `sanitize_callback` / `validate_callback`. Return `WP_REST_Response` or `WP_Error`; never `echo`.

## admin-ajax
- Actions are prefixed: `wp_ajax_builder_meta_cleanup_*`.
- First lines of the handler: `check_ajax_referer()`, then the capability check. Respond with `wp_send_json_success()` / `wp_send_json_error()`.

## admin-post
- `admin_post_builder_meta_cleanup_*` handlers call `check_admin_referer()` **and** `current_user_can()` before reading `$_POST` or `$_FILES`, and finish with `wp_safe_redirect()` then `exit`.

## Outbound HTTP
- `wp_remote_get()` / `wp_remote_post()` with a timeout; cache responses in transients where sensible. Keys come from settings; never log them.

## Hooks we expose
- New hooks are prefixed `builder_meta_cleanup_`, documented with a docblock, and listed here. Renaming or removing a public hook is a breaking change; deprecate first.
- The plugin fires no `do_action`. Filters it fires:
  - `builder_meta_cleanup_plugin_paths` — adjust a target's plugin file paths (`includes/class-service.php`).
  - `builder_meta_cleanup_targets` — replace or extend the full target registry.
  - `builder_meta_cleanup_is_target_active` — edge case for whether a target is active.
  - `builder_meta_cleanup_is_target_installed` — edge case for whether a target is installed.
  - `builder_meta_cleanup_github_repo` — `owner/repo` the updater reads (`includes/class-updater.php`). Default `oduppinsjr/wp-builder-meta-cleanup`.
  - `builder_meta_cleanup_wporg_slug` — WordPress.org slug. Default `builder-meta-cleanup`.
  - `builder_meta_cleanup_github_http_args` — arguments passed to the GitHub `wp_remote_get()`.
