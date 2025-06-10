# Simple HubSpot Forms Integration WordPress Plugin

A lightweight WordPress plugin that allows you to easily embed HubSpot forms into your WordPress pages and posts using shortcodes.

This plugin can replace the [official HubSpot plugin](https://wordpress.org/plugins/leadin/) if you want something more lightweight. It'll work with the same shortcodes, just deactivate the official plugin and activate this one. There are no HubSpot integrations other than embedding a form.

## Installation

1. Download the plugin files
2. Upload the `hubspot-forms` folder to your `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

## Usage

Use the shortcode `[hubspot]` in your posts or pages to embed a HubSpot form. The shortcode accepts two parameters:

- `id` (required): The HubSpot Form ID
- `portal` (required): Your HubSpot Portal ID

### Example

```
[hubspot portal="12345678" id="nrd5c5e0-6f2f-46b1-95d7-aacb3975e9df"]
```

### Finding Your Form and Portal IDs

1. In HubSpot, navigate to Marketing → Forms
2. Find your form, but don't click on it
3. Click the "Actions" button
4. In the embed code, you'll find both your Portal ID and Form ID

## Features

- Simple shortcode implementation
- Respects HubSpot cookies
- Unique container IDs for multiple forms on the same page
- Secure output with WordPress escaping functions

## Requirements

- WordPress 4.0 or higher
- Active HubSpot account

## License

This plugin is licensed under GPL v2 or later.
