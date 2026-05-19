# Black Tie Bikes — Theme

Custom WordPress theme (`blacktieskis`) for blacktiebikes.com — a ski and bike rental company with multiple resort locations.

## Environments

| Environment | WP Engine | URL |
|---|---|---|
| Local | blacktiebikes-sent | https://blacktiebikes-sent.local |
| Staging | blacktiebikstg | https://blacktiebikstg.wpenginepowered.com |
| Production | blacktiesummer | https://www.blacktiebikes.com |

## Stack

WordPress + ACF Flexible Content, Bootstrap 4.6, GSAP/ScrollMagic, Slick carousel, Google Maps API v3.

## Key Files

- `stylesheets/custom.css` — all new CSS goes here (never edit `app.css`)
- `javascripts/custom.js` — all new JS goes here (never edit `app.js`)
- `inc/helper.php` — theme setup, ACF config, utility functions
- `inc/template.php` — nav, map data, footer output
- `template-parts/page/` — ACF flexible content section templates

## Dev Notes

- Code flows up: local → staging → prod
- Prod deploys on Tuesdays and Wednesdays only
- Branch per ticket off `main`: `git checkout -b ww-XX-description main`
- Push to staging: `git push wpengine-staging your-branch:main`
- Push to prod: `git push wpengine-production main`
