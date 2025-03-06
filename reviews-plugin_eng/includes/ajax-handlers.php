<?php
// AJAX handling for adding a review
function reviews_add_review() {
    check_ajax_referer('reviews_nonce', 'nonce');

    $author_name = sanitize_text_field($_POST['author_name']);
    $review_content = sanitize_textarea_field($_POST['review-content']);
    $rating = intval($_POST['rating']);

    if (empty($author_name) || empty($review_content) || $rating < 1 || $rating > 5) {
        wp_send_json_error(['message' => 'Please fill in all fields correctly.']);
    }

    $post_id = wp_insert_post([
        'post_title' => 'Review from ' . $author_name,
        'post_content' => $review_content,
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'meta_input' => [
            'author_name' => $author_name,
            'rating' => $rating,
        ],
    ]);

    if ($post_id) {
        wp_send_json_success(['message' => 'Review successfully added!']);
    } else {
        wp_send_json_error(['message' => 'Error adding review.']);
    }

    wp_die(); // End AJAX request
}
add_action('wp_ajax_add_review', 'reviews_add_review');
add_action('wp_ajax_nopriv_add_review', 'reviews_add_review');

// AJAX handling for deleting a review
function reviews_delete_review() {
    check_ajax_referer('reviews_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'You do not have permission to delete this review.']);
    }

    $post_id = intval($_POST['post_id']);
    if (wp_delete_post($post_id)) {
        wp_send_json_success(['message' => 'Review successfully deleted.']);
    } else {
        wp_send_json_error(['message' => 'Error deleting review.']);
    }

    wp_die(); // End AJAX request
}
add_action('wp_ajax_delete_review', 'reviews_delete_review');

// AJAX handling for getting reviews
function reviews_get_reviews() {
    $args = [
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];
    $reviews = new WP_Query($args);
    if ($reviews->have_posts()) {
        ob_start(); // Start output buffering
        while ($reviews->have_posts()) {
            $reviews->the_post();
            ?>
            <div class="review" id="review-<?php the_ID(); ?>">
                <h3><?php the_title(); ?></h3>
                <div><?php the_content(); ?></div>
                <p><strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'author_name', true)); ?></p>
                <p><strong>Rating:</strong>
                    <span class="star-rating">
                        <?php
                        $rating = get_post_meta(get_the_ID(), 'rating', true);
                        for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star" style="color: <?php echo ($i <= $rating) ? 'gold' : '#ccc'; ?>;">&#9733;</span>
                        <?php endfor; ?>
                    </span>
                </p>
                <?php if (current_user_can('manage_options')): ?>
                    <button class="delete-review" data-id="<?php the_ID(); ?>" style="color: red; cursor: pointer;">🗑️ Delete</button>
                <?php endif; ?>
            </div>
            <?php
        }
        wp_reset_postdata(); // Reset query data
        echo ob_get_clean(); // Return buffered output
    } else {
        echo 'No reviews.';
    }
    wp_die(); // End AJAX request
}
add_action('wp_ajax_get_reviews', 'reviews_get_reviews');
add_action('wp_ajax_nopriv_get_reviews', 'reviews_get_reviews');