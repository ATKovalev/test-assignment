<?php
// Function to copy the page template to the active theme folder
function reviews_copy_template() {
    // Path to the template file in the plugin folder
    $template_file = plugin_dir_path(__FILE__) . '../template-reviews.php';
    
    // Path to the active theme folder
    $theme_file = get_template_directory() . '/template-reviews.php';

    // Check if the template file exists in the theme folder
    if (!file_exists($theme_file)) {
        // Copy the template file to the active theme folder
        copy($template_file, $theme_file);
    }
}