<?php
/**
 * Plugin Name: Reviews
 * Description: A plugin for managing reviews.
 * Version: 2.1
 * Author: Alex
 */

// Protection against direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include functionality files
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/post-type.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
require_once plugin_dir_path(__FILE__) . 'includes/ajax-handlers.php';
require_once plugin_dir_path(__FILE__) . 'includes/template-handler.php'; // Include the file for template handling
require_once plugin_dir_path(__FILE__) . 'includes/page-handler.php'; // Include the file for page handling

// Create a page with a template upon plugin activation
register_activation_hook(__FILE__, 'reviews_create_page');