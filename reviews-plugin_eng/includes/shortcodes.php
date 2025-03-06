<?php
// Register shortcode for displaying reviews
function reviews_shortcode() {
    ob_start();
    $args = [
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ];
    $reviews = new WP_Query($args);
    if ($reviews->have_posts()) {
        echo '<div class="reviews-list">';
        while ($reviews->have_posts()) {
            $reviews->the_post();
            $author_name = get_post_meta(get_the_ID(), 'author_name', true);
            $rating = get_post_meta(get_the_ID(), 'rating', true);
            ?>
            <div class="review" id="review-<?php the_ID(); ?>">
                <div class="review-header">
                    <h3><?php the_title(); ?></h3>
                    <div class="author-rating">
                        <strong>Review from: <?php echo esc_html($author_name); ?></strong>
                        <span class="star-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="star" style="color: <?php echo ($i <= $rating) ? 'gold' : '#ccc'; ?>;">&#9733;</span>
                            <?php endfor; ?>
                        </span>
                    </div>
                </div>
                <div><?php the_content(); ?></div>
                <?php if (current_user_can('manage_options')): ?>
                    <button class="delete-review" data-id="<?php the_ID(); ?>" style="color: red; cursor: pointer;">🗑️ Delete</button>
                <?php endif; ?>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'No reviews.';
    }
    return ob_get_clean();
}
add_shortcode('reviews', 'reviews_shortcode');