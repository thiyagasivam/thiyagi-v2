# AGENTS.md

Instructions for AI coding agents working in this repository.

## Project overview
Thiyagi Tools (thiyagi.com) is a plain PHP website of 500+ standalone calculator/converter/generator tool pages. There is no framework, build step, or bundler — pages are server-rendered PHP files served directly by Apache/XAMPP.

## Stack
- PHP (no framework), included via `header.php` / `footer.php`
- Tailwind CSS via CDN (`cdn.tailwindcss.com`) — no local Tailwind build
- Font Awesome via CDN
- `package.json` only lists `@fortawesome/fontawesome-free` as a reference dependency; it is not used in a build pipeline

## Page structure convention
Every tool page follows this pattern:
```php
<?php include 'header.php'; ?>
<title>Page Title</title>
<meta name="description" content="...">
<meta name="keywords" content="...">
<!DOCTYPE html>
<html lang="en">
... page content ...
<?php include 'footer.php'; ?>
```
- `<title>` and `<meta>` tags are placed before `<!DOCTYPE html>` (existing site convention — keep it consistent with other files rather than "fixing" it).
- `header.php` outputs the canonical URL, nav, and analytics/ad scripts; `footer.php` outputs the site footer and includes `page_sharing.php`.

## Naming conventions
- Converter pages are named `<from-unit>-to-<to-unit>.php` (e.g. `cm-to-inch.php`, `kg-to-lbs.php`).
- Category hub pages use `<category>-converter.php` or `<category>-calculator.php` (e.g. `length-converter.php`, `emi-calculator.php`).
- Grouped content lives in subfolders: `holiday/`, `service-center/`, `electricity-board/`, `rto-details/`.

## Routing
- `.htaccess` strips the `.php` extension from URLs for root-level files and rewrites `sitemap.xml` to `sitemap.php`.
- Folder-based sections (`holiday/`, `service-center/`, `electricity-board/`, `rto-details/`) have explicit `RewriteRule`s in `.htaccess` — add a matching rule when adding new pages under those folders.

## Sitemap
- `sitemap.php` auto-scans the repo for `.php`/`.html` files and lists them in `sitemap.xml`, excluding `$excludedFolders` and `$excludedPages` defined at the top of the file.
- When adding internal utility/admin/one-off scripts that should not be publicly indexed, add them to `$excludedPages` in [sitemap.php](sitemap.php).

## AI crawlers / LLM discovery
- [robots.txt](robots.txt) explicitly allows major AI crawlers (GPTBot, ClaudeBot, PerplexityBot, Google-Extended, etc.).
- [llms.txt](llms.txt) provides an LLM-friendly summary of the site's tool categories. Update it when adding a major new tool category or hub page — no need to list every individual converter page (link to `sitemap.xml` for the full list instead).

## Validating changes
- There is no test suite or build step. Validate PHP changes with `php -l <file>` for syntax errors.
- This is a live production site (XAMPP/Apache) — avoid destructive file operations and don't remove existing pages without being asked.
