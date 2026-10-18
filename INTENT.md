# Intent

Builder Meta Cleanup shows whether known page builders, themes, and companion plugins are installed or active, and deletes matching postmeta and allowlisted `wp_options` rows only when that owner is inactive. WP-CLI mirrors the admin actions.

This is a targeted cleanup tool for stacks in the registry. It is not a general database optimizer, and it does not delete rows for an active stack.

Target model and safety rules: [PROJECT_MEMORY.md](PROJECT_MEMORY.md).
