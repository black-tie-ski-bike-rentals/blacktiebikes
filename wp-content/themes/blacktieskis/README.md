# blacktiebikes-theme

Custom WordPress theme for blacktiebikes.com. Theme name: `blacktieskis` (inherited from original ski rental build — do not rename).

Live site: blacktiebikes.com

## What This Repo Tracks

This repo is the theme folder itself — the repo root is `wp-content/themes/blacktieskis/`. It tracks only theme files.

It does not track WordPress core, uploads, plugins, or the database.

## Local Dev Setup

1. Install Local by Flywheel
2. Create a local WordPress site
3. Clone this repo directly into `wp-content/themes/blacktieskis/` inside that site
4. Import a current database (ask the team for a `.sql` dump)
5. Activate the `blacktieskis` theme in WP Admin → Appearance → Themes

## Branch Strategy

| Branch | Purpose |
|--------|---------|
| `main` | Mirrors WP Engine production (`blacktiesummer`) |
| `staging` | Mirrors WP Engine staging (`blacktiebikstg`) |
| `ww-{ticket}-description` | Per-ticket work, branched off `main` |

## Deployment

WP Engine git push remotes are configured on this repo:

```
git push origin staging              # GitHub
git push wpengine-staging            # WP Engine staging

git push origin main                 # GitHub
git push wpengine-production         # WP Engine production (requires confirmation)
```

WP Engine handles path mapping automatically — files push to the correct theme directory on their end.

## Environment Reference

| Environment | WP Engine Name | URL |
|-------------|---------------|-----|
| Local | blacktiebikes-sent | https://blacktiebikes-sent.local |
| Staging | blacktiebikstg | https://blacktiebikstg.wpenginepowered.com |
| Production | blacktiesummer | https://www.blacktiebikes.com |

**Theme name:** `blacktieskis` — inherited from the original ski rental site. All function prefixes, text domains, and internal references use `blacktieskis_` throughout the codebase. Do not rename.

**WP Engine:** Environment names are permanent and cannot be changed. The staging name (`blacktiebikstg`) contains a typo and predates this project.

## Key Files

- `stylesheets/custom.css` — all new CSS goes here (not `app.css`, which is a compiled bundle)
- `javascripts/custom.js` — all new JS goes here (not `app.js`, which is a minified webpack bundle)
- `_dev-docs/` — Jira ticket specs and dev reference docs
- `CLAUDE.md` — workflow notes for Claude Code

## Known Issues

Pre-existing bugs inherited from the original build. None are regressions. Do not fix unless explicitly ticketed.

**Actively affecting live users** — Broken contact form: reCAPTCHA guard commented out in `inc/helper.php`, causing the mail handler to always return a JSON error response.

**Security** — No nonce on AJAX star rating handler (`inc/ajax-action.php`), vulnerable to CSRF.

**Performance** — `flush_rewrite_rules()` called on every page load in `inc/custom-post-type.php`.

**Deprecated** — `query_posts()` used in `inc/template.php` and `template-parts/page/content-reviews_section.php`.

**Fragile** — Hardcoded Telluride redirect in `header.php` and `functions.php` (defunct URL, hardcoded post ID and menu item ID).

**Cleanup** — Orphaned ski site content in `content-3col_section.php`; debug IP block in `content-locations_map.php`.

**Hard to fix** — `resport` typo (load-bearing throughout codebase); no build tooling.
