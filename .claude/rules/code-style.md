---
paths:
  - "builder-meta-cleanup.php"
  - "index.php"
  - "includes/**/*.php"
  - "tests/**/*.php"
---

# Code style

## PHP
- Target **PHP 7.4**. For PHP 7.4 that means no `match`, enums, `readonly`, constructor promotion, `?->`, union types, or `str_contains` without a polyfill.
- WordPress Coding Standards: spaces inside parentheses, Yoda conditions for literals; match the file's array syntax and indentation. Don't reformat lines you didn't change.
- Prefix every global function, option, meta key, transient, hook and AJAX action with `builder_meta_cleanup_`. Text domain `builder-meta-cleanup` on every translatable string.
- Docblock on every public method and every hook the plugin fires.
- No namespace and no autoloader. `builder-meta-cleanup.php` requires each class. Classes are named `Builder_Meta_Cleanup_*`. `Builder_Meta_Cleanup_Admin` and `Builder_Meta_Cleanup_CLI` are `final` and expose `init()` / `register()` that only hooks WordPress. `Builder_Meta_Cleanup_GitHub_Updater` is the shared updater standard and is booted from the main file; do not change its behavior in this repo. There is no field library and no global `builder_meta_cleanup_*` function. Registry meta keys and option names belong to the stacks being cleaned; they are not given this prefix.

## JavaScript
- Data from PHP arrives through `wp_localize_script` or `wp_add_inline_script`; never inline secrets.
- This plugin has no JavaScript. No jQuery, no build step, and no `wp_enqueue_script`.

## CSS
- This plugin has no CSS files. Admin markup is PHP in `includes/class-admin.php`.
- Scope front-end CSS under a plugin wrapper or body class so it doesn't leak into themes or wp-admin.
- Don't edit vendored libraries (`*.min.*`, third-party bundles).

## Comments
- Explain *why*, not *what*.
