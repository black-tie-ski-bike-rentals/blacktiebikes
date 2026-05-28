# blacktiebikes

WordPress site repo for blacktiebikes.com. Rooted at `app/public/` — the WordPress web root.

Live site: blacktiebikes.com

## What This Repo Tracks

Only `wp-content/themes/blacktieskis/`. Everything else — WordPress core, uploads, plugins, mu-plugins, cache, database — is gitignored.

## Local Dev Setup

1. Install Local by Flywheel
2. Clone this repo into a Local site's `app/public/` directory
3. Import a current database (ask the team for a `.sql` dump)
4. Activate the `blacktieskis` theme in WP Admin → Appearance → Themes

## Branch Strategy

| Branch | Purpose |
|--------|---------|
| `main` | Mirrors WP Engine production (`blacktiesummer`) |
| `staging` | Mirrors WP Engine staging (`blacktiebikstg`) |
| `ww-{ticket}-description` | Per-ticket work, branched off `main` |

## Deployment

```
# Staging
git push origin staging
git push wpengine-staging

# Production
git push origin main
git push wpengine-production    # triggers yes/no confirmation prompt
```

WP Engine deploys files to the web root as structured in the repo. The `.gitignore` ensures only theme files are tracked, so only theme files land on WP Engine.

## Environment Reference

| Environment | WP Engine Name | URL |
|-------------|---------------|-----|
| Local | blacktiebikes-sent | https://blacktiebikes-sent.local |
| Staging | blacktiebikstg | https://blacktiebikstg.wpenginepowered.com |
| Production | blacktiesummer | https://www.blacktiebikes.com |

**Theme:** `blacktieskis` — inherited from the original ski rental site. Do not rename. All function prefixes, text domains, and internal references use `blacktieskis_` throughout the codebase.

**WP Engine:** Environment names are permanent and cannot be changed. The staging name (`blacktiebikstg`) contains a typo and predates this project.

## Known Issues

Pre-existing bugs inherited from the original build. None are regressions. See `wp-content/themes/blacktieskis/CLAUDE.md` for the full list.

**Actively affecting live users** — Broken contact form: reCAPTCHA guard commented out in `inc/helper.php`.

**Security** — No nonce on AJAX star rating handler (`inc/ajax-action.php`), vulnerable to CSRF.

**Performance** — `flush_rewrite_rules()` called on every page load in `inc/custom-post-type.php`.

**Deprecated** — `query_posts()` used in `inc/template.php` and `template-parts/page/content-reviews_section.php`.

**Fragile** — Hardcoded Telluride redirect in `header.php` and `functions.php`.

**Hard to fix** — `resport` typo (load-bearing throughout codebase); no build tooling.
