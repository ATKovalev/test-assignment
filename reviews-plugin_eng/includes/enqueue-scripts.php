<?php
// Enqueue styles and scripts
function reviews_enqueue_scripts() {
    // Enqueue the Masonry library
    wp_enqueue_script('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js', array('jquery'), null, true);
    
    // Enqueue styles
    wp_enqueue_style('reviews-style', plugin_dir_url(__FILE__) . '../reviews.css');

    // Enqueue review scripts
    wp_enqueue_script('load-reviews', plugin_dir_url(__FILE__) . '../js/load-reviews.js', array('jquery', 'masonry'), null, true);
    wp_enqueue_script('review-form', plugin_dir_url(__FILE__) . '../js/review-form.js', array('jquery'), null, true);
    wp_enqueue_script('delete-review', plugin_dir_url(__FILE__) . '../js/delete-review.js', array('jquery'), null, true);
    wp_enqueue_script('rating', plugin_dir_url(__FILE__) . '../js/rating.js', array('jquery'), null, true);
    wp_enqueue_script('responsive', plugin_dir_url(__FILE__) . '../js/responsive.js', array('jquery'), null, true);
    
    // Localize the script to pass AJAX data
    wp_localize_script('load-reviews', 'reviews_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('reviews_nonce') // Add nonce
    ]);
}
add_action('wp_enqueue_scripts', 'reviews_enqueue_scripts');