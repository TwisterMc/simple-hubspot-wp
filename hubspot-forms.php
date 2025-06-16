<?php
/**
 * Simple HubSpot Forms Integration
 *
 * @package           SimpleHubSpotForms
 * @author            Thomas McMahon
 * @copyright         2025 Thomas McMahon
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Simple HubSpot Forms Integration
 * Plugin URI:        https://github.com/TwisterMc/simple-hubspot-wp
 * Description:       Adds a shortcode to embed HubSpot forms on your WordPress site.
 * Version:           0.1.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Thomas McMahon
 * Author URI:        https://www.twistermc.com
 * Text Domain:       hubspot-forms
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the HubSpot form shortcode
 */
function hubspot_form_shortcode($atts) {
    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'id' => '', // Form ID attribute
            'portal' => '', // Portal ID attribute with default
        ),
        $atts,
        'hubspot'
    );

    // If no form ID is provided, return an error message
    if (empty($atts['id'])) {
        return 'Error: HubSpot form ID is required.';
    }

    // Generate a unique container ID for this form instance
    $container_id = 'hubspot-form-' . uniqid();

    // Create the form container and script
    $output = '<div id="' . esc_attr($container_id) . '" class="simple-hubspot-form">';
    $output .= '<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>';
    $output .= '<script>
        hbspt.forms.create({
            portalId: "' . esc_js($atts['portal']) . '",
            formId: "' . esc_js($atts['id']) . '",
            region: "na1",
            target: "#' . esc_js($container_id) . '"
        });
    </script></div>';

    return $output;
}

// Register the shortcode
add_shortcode('hubspot', 'hubspot_form_shortcode');
