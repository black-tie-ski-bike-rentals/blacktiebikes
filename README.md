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

## A Note on Naming

The theme folder and all code-level identifiers (`blacktieskis_` function prefix, `blacktieskis` text domain, etc.) are inherited from the original build for the ski rental site at blacktieskis.com. This project is for the bike rental site at blacktiebikes.com. Both are the same client — two separate domains, one shared codebase. The naming discrepancy is intentional and expected.

## Known Issues

Pre-existing bugs inherited from the original build. None are regressions — documented here for visibility.

**Hardcoded staging redirect** (`header.php:35`, `functions.php:46,59`)
The Telluride page (post ID `29175`) redirects to a defunct Flywheel staging URL (`btsr.flywheelsites.com`). The redirect is wired in two places: a `header()` call in `header.php` and a nav link filter in `functions.php` that also hardcodes menu item ID `42`. Both will silently break if post IDs or menu IDs change.

**Hotlinked images from blacktieskis.com** (`template-parts/page/content-3col_section.php:21,27,34`)
Three package images (Premium, Performance, Junior) are loaded directly from `//www.blacktieskis.com/images/`. If that domain moves or those files are removed, the images will break with no local fallback.

**reCAPTCHA check bypassed** (`inc/helper.php:383`)
The `if(verify_captcha_contact_form())` check is commented out, so all CF7 submissions bypass reCAPTCHA verification entirely. The form sends regardless of whether recaptcha passes or fails. The original else-branch `die` at line 414 is now unreachable dead code.

**No nonce verification on AJAX rating handler** (`inc/ajax-action.php:18-19`)
`$_POST['currentRate']` and `$_POST['currentPostID']` are read and written to the database with no nonce check and no sanitization, making the endpoint vulnerable to CSRF.

**`flush_rewrite_rules()` on every request** (`inc/custom-post-type.php:36,89`)
Called inside both `blacktieskis_create_taxonomies()` and `blacktieskis_create_post_type()`, which are hooked to `init` and run on every page load. This is an expensive operation that should only run on theme activation.

**`query_posts()` used** (`inc/template.php:177`, `template-parts/page/content-reviews_section.php:14`)
`query_posts()` is deprecated and corrupts the main WordPress query. Both instances should be replaced with `new WP_Query()`.
