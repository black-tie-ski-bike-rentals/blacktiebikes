# Black Tie Ski — Theme Reference

**Date:** May 2026  
**Theme:** `blacktieskis`  
**Original author:** Carbon8 Team (based on Underscores starter theme)  
**Environment:** Local by Flywheel (local dev)

---

## What This Site Is

A custom WordPress theme for **Black Tie Ski**, a ski and bike rental company operating across multiple resort locations in the US. The site is heavily content-managed — location data, resort listings, reviews, contact forms, and global settings are all controlled through the WordPress admin via **Advanced Custom Fields (ACF)**.

---

## Tech Stack

| Layer | Technology |
|---|---|
| CMS | WordPress |
| Content management | Advanced Custom Fields (ACF) with Options Pages |
| Forms | Contact Form 7 (CF7) |
| CSS framework | Bootstrap 4.6 |
| Animation | GSAP 2.1.3 (TweenMax, TimelineMax, Draggable, ScrollTo) |
| Scroll animation | ScrollMagic |
| Carousel | Slick (version unverifiable from bundle) |
| Form validation | Parsley.js (version unverifiable from bundle) |
| Maps | Google Maps API v3 |
| jQuery | 3.1.0 (loaded from theme, not WordPress core) |
| Fonts | Google Fonts (Open Sans, Poppins, Reenie Beanie) |
| Icons | IcoMoon (custom icon font) |
| PWA | Service Worker (`sw.js`) |

---

## File Structure

```
blacktieskis/
├── functions.php               # Entry point — loads all inc/ files
├── header.php                  # <head>, opening body, navigation
├── footer.php                  # Footer, popups, JS loading
├── style.css                   # WordPress theme header (metadata only)
├── index.php / page.php / single.php / archive.php / 404.php
│
├── inc/
│   ├── helper.php              # Theme setup, ACF config, utility functions
│   ├── template.php            # Navigation, map data, footer, ratings output
│   ├── enqueue.php             # Registers CSS (Google Fonts, app.css, custom.css, print.css)
│   ├── custom-post-type.php    # "Resort" CPT + "State/Location" taxonomy
│   ├── ajax-action.php         # AJAX: star rating handler
│   ├── api-helpers.php         # External API utilities
│   ├── custom-query.php        # WP_Query helpers
│   ├── custom-paginate.php     # Pagination
│   ├── nav-walker.php          # Custom Bootstrap nav walker
│   ├── schema-markup.php       # JSON-LD structured data
│   ├── shortcode.php           # Custom shortcodes
│   └── remove-tags.php         # Filters to strip unwanted WP output
│
├── template-parts/
│   ├── includes/menu-header.php        # Site header / nav markup
│   └── page/                           # ACF flexible content section templates
│       ├── content-hero_image_section.php
│       ├── content-banner_image_section.php
│       ├── content-product_section.php
│       ├── content-3col_section.php
│       ├── content-4col_section.php
│       ├── content-about_section.php
│       ├── content-reviews_section.php
│       ├── content-tabs_section.php
│       ├── content-team_section.php
│       ├── content-steps_15.php
│       ├── content-locations_map.php
│       ├── content-cta_and_footer.php
│       └── content-cta_bottom.php
│
├── javascripts/
│   ├── app.js                  # Webpack bundle (Bootstrap + GSAP + Slick + Parsley + ScrollMagic)
│   ├── custom.js               # Click-only dropdown toggle (added in this project)
│   ├── location.js             # Custom Google Maps integration
│   └── ddapp.js                # Orphaned webpack bundle copy — pre-git backup, not loaded anywhere
│
├── js/
│   ├── jquery-3.1.0.min.js     # jQuery (loaded directly, not via WP)
│   ├── cf7.js                  # Contact Form 7 customizations
│   └── jquery.fancybox.js      # Lightbox (unclear if active)
│
├── stylesheets/
│   ├── app.css                 # Compiled bundle (Bootstrap + Slick + all custom CSS)
│   └── print.css               # Print styles
│
├── images/                     # Theme images and SVG icons
├── fonts/                      # IcoMoon icon font files
└── languages/                  # i18n .pot file
```

---

## How JavaScript Loads

The theme **bypasses WordPress's standard `wp_enqueue_scripts` system** for JavaScript. Instead, `footer.php` uses a lightweight async script loader (`$script`) to chain-load scripts manually:

```
jquery-3.1.0.min.js  (from /js/)
  → javascripts/app.js  (the webpack bundle)
    → javascripts/custom.js  (dropdown toggle — loads in parallel with cf7.js)
    → js/cf7.js  (CF7 overrides)
```

CSS is loaded the normal WordPress way via `inc/enqueue.php`.

---

## The `app.js` Situation

`app.js` is a **webpack-compiled bundle** (~530KB). It contains Bootstrap, GSAP, ScrollMagic, Slick, and Parsley all concatenated and minified into a single file. **The original source files (SCSS partials, JS modules, `package.json`, `webpack.config.js`) no longer exist in this repo** — only the compiled output was ever committed.

This means: editing `app.js` directly is editing minified output, which is why the previous workflow was saving `.bk` files by hand.

---

## Content Architecture

Pages are built using **ACF Flexible Content** — the CMS user stacks modular sections (hero, product grid, reviews, map, etc.) and each section maps to a PHP template partial in `template-parts/page/`. There is no block editor (Gutenberg) — the page editor is intentionally disabled in `inc/helper.php`.

**Custom Post Type:** `bt_resport` (Resorts)  
**Custom Taxonomy:** `category_state_location` (State/Location grouping for the map)  
**Global settings** (logo, phone, social links, Google API key, reCAPTCHA keys, footer content) are managed via an ACF Options page.

---

## Recent Changes

1. **Initialized git** — the repo had no version control; all changes were being tracked manually via hand-saved backup files
2. **Committed the full codebase** as a baseline snapshot (`9a0c7be`)
3. **Deleted 15 backup files** — these are now redundant with git history (`41ef3d4`)
4. **Reverted `app.css`** to the pre-header-redesign baseline (`e3ce2dd`) — restores the scroll-animated transparent header as the starting point for new work

---

## History of Previous Developer Changes (from `.bk` files)

The initial commit included 14 backup files. Files named `*.laura_bk` were made by the current developer before switching to the `custom.css` approach — briefly following the same backup pattern before pivoting. The remaining files are from previous developers and reveal what was modified from the original theme.

### `menu-header.php` (from `menu-header_bk.php`)

The original header was ~23 lines: logo, `wp_nav_menu()` call, and a plain `<a>` pointing directly to `booknow.blacktieskis.com`. A previous developer:

- Added the full top bar (ACF `content_top_bar` field, Google Translate shortcode, desktop phone link, mobile call button image)
- Replaced the direct Book Now link with a JavaScript popup trigger — this is where the `boonowbutton` ID typo was introduced
- Cleared the logo `alt` attribute (was `"Black Tie Ski"`, now `""`)
- Added the COVID-19 popup div

### `template.php` (from `template_bk.php`) — root cause of the dropdown fragility

This is the most structurally significant change. The original theme used a **custom PHP menu builder** (`blacktieskis_main_menu()`) that manually walked `wp_get_nav_menu_items()` and built `<ul>` HTML by hand. A previous developer replaced it with WordPress's standard `wp_nav_menu()`.

This is why the site has **two dropdown systems**: `.sub-menu` (standard WP nav walker output) and `.main-menu-dropdown` (original theme CSS). The custom walker never generated `.sub-menu` — that class comes from the WP replacement. The theme's own CSS was written for the custom walker's HTML structure. When the swap happened, the dropdown markup changed and the CSS partially broke — which is why dropdown behavior was so fragile and required overriding both systems in `custom.css`.

### CSS backup files (`app_bk2.css`, `app_bk_3.css`, `app_bk_4.css`)

All three are ~200KB — full copies of `app.css` made at different points. Confirms the pattern: developers were editing `app.css` directly and saving manual backups before each session.

### `ddapp.js`

Another copy of the minified webpack bundle (GSAP 2.0.2). Likely a scratch backup made during a JS editing session. It was not removed with the other backup files and still exists in the repo — it is not loaded anywhere and can be safely deleted.

---

## Known Issues

### Bug — broken contact form handler (`inc/helper.php:414`)
A `die` statement sits outside its intended conditional block because the reCAPTCHA check that was supposed to wrap it got commented out. This means `wpcf7_change_mail_recipient` always terminates with a JSON error response, breaking form submissions that don't include a location field.

```php
// This runs unconditionally — kills the request
echo json_encode(array("status"=>0,"message"=>"invalid recaptcha")); die;
```

### Hardcoded IDs in `functions.php`
Menu item ID `42` and post ID `29175` are wired directly into the codebase, along with a hardcoded production URL (`btsr.flywheelsites.com`). These will silently break if content is reorganized.

### `flush_rewrite_rules()` on every request
Called inside both `init` hooks in `inc/custom-post-type.php`. This is a heavy operation that should only run on theme activation, not on every page load.

### `query_posts()` used in `inc/template.php`
`query_posts()` is a deprecated WordPress function that corrupts the main query. Should be replaced with a direct `WP_Query` instantiation.

### No nonce verification on AJAX handler (`inc/ajax-action.php`)
The star rating AJAX endpoint accepts `$_POST` data without verifying a nonce, leaving it open to cross-site request forgery.

### Typo baked into the codebase
"Resort" is misspelled as "resport" throughout — in the post type slug (`bt_resport`), function names (`blacktiekis_get_resport_datas`), variable names, and the taxonomy. This is load-bearing at this point (changing it would break URLs and database queries) but worth noting.

### No build tooling
There is no `package.json` or build config. Any changes to library versions (Bootstrap, GSAP, etc.) would require reconstructing the webpack source from scratch.

