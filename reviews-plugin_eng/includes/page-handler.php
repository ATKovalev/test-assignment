<?php
// Function to create a page with a template upon plugin activation
function reviews_create_page() {
    // Copy the page template to the active theme folder
    reviews_copy_template();

    // Check if the page already exists
    $page_title = 'Reviews';
    $page_check = get_page_by_path($page_title);

    // If the page does not exist, create it
    if (!isset($page_check->ID)) {
        $page_id = wp_insert_post(array(
            'post_title' => $page_title,
            'post_content' => '', // Leave content empty as we are using a shortcode
            'post_status' => 'publish',
            'post_type' => 'page',
        ));

        // Set the template for the page
        if (!is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', 'template-reviews.php');
        }
    }
}