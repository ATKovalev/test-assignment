<?php
// Register custom post type
function reviews_register_post_type() {
    register_post_type('reviews', [
        'labels' => [
            'name' => 'Reviews',
            'singular_name' => 'Review',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-format-status',
    ]);
}
add_action('init', 'reviews_register_post_type');