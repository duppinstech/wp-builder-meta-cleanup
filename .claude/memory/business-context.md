# Business context

_Committed. If the repo is public, keep only public-safe facts here: published tiers and list prices, positioning, cost drivers. Private numbers go in the "Business (private)" section of the gitignored `CLAUDE.local.md`._

Read by `finance-reviewer`, `marketing-reviewer`, `legal-reviewer` and `product-reviewer`. Items marked _TBD_ are open questions for Odell. Agents must not fill them in by guessing.

## Product and positioning
- **Product:** Builder Meta Cleanup, by Duppins Technology (https://duppinstech.com).
- **Audience:** Public. Anyone using page builders in WordPress. Switching page builders often leaves the previous builder's data in the database, including postmeta on pages. The plugin removes that leftover bloat.
- **Positioning:** Shows whether known page builders, themes, and companion plugins are installed or active, and deletes matching postmeta and allowlisted `wp_options` rows only when that owner is inactive (`INTENT.md`, `README.md`). It does not remove shortcodes or HTML inside `post_content`.
- **Built for (client):** product work. Free public plugin. No client is named in `OWNERSHIP.md`.

## Tiers
| Tier | What's included | Price | Distribution |
|---|---|---|---|
| Core | Inactive-stack cleanup of postmeta and allowlisted options, the Tools screen, WP-CLI, and the GitHub updater | Free | GitHub Releases. Optional WordPress.org source in the updater. Directory upload is a maintainer step (`PLAN.md`). |

## Cost drivers
- No paid or metered API. The updater calls the public GitHub Releases API with no token, and WordPress.org `plugins_api` when that source is selected.
- **Hosting:** none.
- **Support time:** _TBD (Odell)_
