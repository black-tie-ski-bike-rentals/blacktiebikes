# Black Tie Bikes — WordPress Site

Live site: blacktiebikes.com
Local environment: Local by Flywheel
Theme: blacktieskis (custom)

## What This Repo Tracks

This repo is rooted at `app/public/` — the WordPress web root. It tracks:

- `wp-content/themes/blacktieskis/` — the active custom theme
- `.htaccess`, `robots.txt`, site-level assets

It does not track WordPress core, uploads, plugins, or the database.

## Local Dev Setup

1. Install Local by Flywheel
2. Clone this repo into a new Local site's `app/public/` directory
3. Import the database separately (ask the team for a current `.sql` dump)
4. Activate the `blacktieskis` theme in WP Admin → Appearance → Themes

## Theme Docs

See `wp-content/themes/blacktieskis/README.md` for full theme documentation including file structure, JS loading, known issues, and development history.

## Branch Strategy

| Branch | Purpose |
|--------|---------|
| `main` | Stable baseline |
| `staging` | Pre-production integration |
| feature branches | Per-ticket work (e.g. `ww-19-header`) |

## ACF Local JSON

The `wp-content/themes/blacktieskis/acf-json/` folder exists in the repo but ACF local JSON is not yet active — field groups are currently stored in the database only. Once ACF local JSON is configured in `functions.php`, field group changes will be saved automatically to that folder. When it is enabled, commit the folder whenever field groups are added or modified so other environments stay in sync.

## Environment Reference

This project spans multiple environments with inconsistent naming inherited from the original build. The table below is the source of truth.

| Environment | Name | URL |
|-------------|------|-----|
| Local | `blacktiebikes-sent` | `https://blacktiebikes-sent.local` |
| Staging | `blacktiebikstg` | `https://blacktiebikstg.wpenginepowered.com` |
| Production | `blacktiesummer` | `https://www.blacktiebikes.com` |

**Theme:** The active theme is named `blacktieskis` — inherited from the original ski rental site at `blacktieskis.com`. This is intentional. Do not rename it. All function prefixes, text domains, and internal references use `blacktieskis_` throughout the codebase.

**WP Engine:** Environment names are permanent and cannot be changed. The staging environment name (`blacktiebikstg`) contains a typo and predates this project.

## Known Issues

Pre-existing bugs inherited from the original build. None are regressions. See `wp-content/themes/blacktieskis/README.md` for full details.

**Actively affecting live users** — Broken contact form: reCAPTCHA guard commented out in `inc/helper.php`, causing the mail handler to always return a JSON error response.

**Security** — No nonce on AJAX star rating handler (`inc/ajax-action.php`), vulnerable to CSRF.

**Performance** — `flush_rewrite_rules()` called on every page load in `inc/custom-post-type.php`.

**Deprecated** — `query_posts()` used in `inc/template.php` and `template-parts/page/content-reviews_section.php`.

**Fragile** — Hardcoded Telluride redirect in `header.php` and `functions.php` (defunct URL, hardcoded post ID and menu item ID).

**Cleanup** — Orphaned ski site content in `content-3col_section.php`; debug IP block in `content-locations_map.php`.

**Hard to fix** — `resport` typo (load-bearing throughout codebase); no build tooling.