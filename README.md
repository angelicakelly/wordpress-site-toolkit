# WordPress Site Toolkit

A small WordPress plugin that lets an administrator maintain a plain-text site maintenance checklist and display it on a page. It is a portfolio exercise inspired by my WordPress website development and maintenance work; it is not a client deliverable or a claim about a production deployment.

## Features

- Adds **Settings → Site Toolkit** with one item per line and a Save Changes button.
- Renders saved items as an HTML list with `[site_toolkit_checklist]`.
- Shows nothing on the front end until at least one item is saved.
- Uses `admin_menu` and `admin_init` action hooks, the Settings API, and a shortcode callback.
- Checks the administrator capability, sanitizes input, and escapes output. WordPress provides the settings form nonce through `settings_fields()`.

## Live Preview

[View the WordPress Site Toolkit demo](https://kellybuilderswfl.com/wordpress-site-toolkit-demo)

This portfolio demo is hosted on the Kelly Builders website with the company's permission. I manage the website and created this page to demonstrate how the plugin works. The plugin itself is an independent portfolio project; it was not originally developed for Kelly Builders.

## Installation and usage

1. Download this repository as a ZIP from **Code → Download ZIP** on GitHub.
2. In WordPress, go to **Plugins → Add New Plugin → Upload Plugin**, upload the ZIP, and activate **WordPress Site Toolkit**. Alternatively, copy the repository folder to `wp-content/plugins/wordpress-site-toolkit/` and activate it.
3. Open **Settings → Site Toolkit**. Enter one item per line, for example:

   ```text
   Check plugin updates
   Review contact form submissions
   Verify backup status
   ```

4. Add `[site_toolkit_checklist]` to a page or post, then preview it.

Requires WordPress 6.0+ and PHP 7.4+. No external packages, build step, or API keys are required. The checklist is publicly visible wherever the shortcode is placed, so use general site tasks rather than credentials or private notes.

## Structure

```text
wordpress-site-toolkit/
├── wordpress-site-toolkit.php  # Plugin header, hooks, settings page, shortcode
├── README.md                   # Installation and usage
└── LICENSE                     # GPL-3.0
```

## How I would explain it in an interview

“I built a focused WordPress plugin that lets an administrator edit a maintenance checklist and publish it with a shortcode. I used action hooks to register the admin page and option, a named callback for each responsibility, the Settings API for saving, sanitization when receiving text, and escaping when rendering HTML. It reflects the kind of practical WordPress maintenance work I have done, while the plugin itself is a new portfolio project.”

My background includes WordPress development and maintenance at [Spiro & Associates](https://www.linkedin.com/in/angiekellyweb/details/experience/?locale=en-US) and website/e-commerce work through Kelly Web Design. This repository demonstrates the implementation directly; it does not assert that this exact plugin was deployed for a client.

## Screenshots

Screenshots will be added after running the plugin on a WordPress site: (1) the **Settings → Site Toolkit** page with sample items, and (2) a page rendering the shortcode. No screenshots are included yet.

## License

GPL-3.0-or-later. See [LICENSE](LICENSE).
