<?php
/**
 * Plugin Name: Simple HubSpot Forms Integration
 * Description: Adds a shortcode to embed HubSpot forms on your WordPress site.
 * Version: 0.1.0
 * Author: Thomas McMahon
 * License: GPL v2 or later
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
