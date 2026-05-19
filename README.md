# Black Tie Bikes — WordPress Site

Custom WordPress theme for blacktiebikes.com — ski and bike rentals across multiple resort locations.

## What This Repo Tracks

Rooted at `app/public/` — the WordPress web root. Tracks the active custom theme (`wp-content/themes/blacktieskis/`), `.htaccess`, `robots.txt`, and site-level assets. Does not track WordPress core, uploads, plugins, or the database.

## Environments

| Environment | WP Engine | URL |
|---|---|---|
| Local | blacktiebikes-sent | https://blacktiebikes-sent.local |
| Staging | blacktiebikstg | https://blacktiebikstg.wpenginepowered.com |
| Production | blacktiesummer | https://www.blacktiebikes.com |

## Branch Strategy

- Branch per ticket off `main`: `git checkout -b ww-XX-description main`
- Merge into `main` only after hitting prod

## Local Dev Setup

1. Install Local by Flywheel
2. Clone into a new Local site's `app/public/` directory
3. Import the database separately
4. Activate the `blacktieskis` theme in WP Admin → Appearance → Themes

## Theme Docs

See `wp-content/themes/blacktieskis/README.md`.
