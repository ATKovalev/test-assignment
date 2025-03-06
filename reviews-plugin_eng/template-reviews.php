<?php
/**
 * Template Name: Reviews
 */

get_header(); ?>

<div class="reviews-container">
    <h1>Reviews</h1>

    <!-- Display reviews -->
    <div class="reviews-list masonry">
        <?php echo do_shortcode('[reviews]'); ?>
    </div>

    <!-- Block for adding a review -->
    <div class="add-review-form" id="add-review-form" style="display: none;">
        <div class="close-button" id="close-button">&times;</div> <!-- Close button -->
        <form id="review-form">
            <label for="author_name">Author's Name:</label>
            <input type="text" id="author_name" name="author_name" required>

            <label for="review-content">Review Text:</label>
            <textarea id="review-content" name="review-content" required></textarea>

            <label for="rating">Rating:</label>
            <div class="star-rating" id="rating">
                <input type="radio" name="rating" value="1" id="star1" />
                <label for="star1" class="star">&#9733;</label>
                <input type="radio" name="rating" value="2" id="star2" />
                <label for="star2" class="star">&#9733;</label>
                <input type="radio" name="rating" value="3" id="star3" />
                <label for="star3" class="star">&#9733;</label>
                <input type="radio" name="rating" value="4" id="star4" />
                <label for="star4" class="star">&#9733;</label>
                <input type="radio" name="rating" value="5" id="star5" />
                <label for="star5" class="star">&#9733;</label>
                <div id="rating-tooltip" style="display:none; position:absolute; background-color:#fff; border:1px solid #ccc; padding:5px; z-index:1000;"></div>
            </div>

            <button type="submit">Submit Review</button>
        </form>
    </div>

    <?php if (is_user_logged_in()) : ?>
        <div class="add-review-toggle" id="add-review-toggle-button">
            <span>Add Review</span>
        </div>
    <?php else : ?>
        <div class="add-review-toggle" id="login-toggle-button">
            <span>Please log in to add a review</span>
        </div>
        <div id="login-form" style="display: none;">
            <div class="close-button" id="close-login-button">&times;</div> <!-- Close button -->
            <?php
            // Use the built-in WordPress function to display the login form
            wp_login_form(array(
                'redirect' => get_permalink(), // Redirect after login
                'label_username' => 'Username',
                'label_password' => 'Password',
                'label_remember' => 'Remember Me',
                'label_log_in' => 'Log In',
                'remember' => true,
            ));
            ?>
        </div>
    <?php endif; ?>
</div>

<div id="loader" style="display:none;">
    <div class="popup">
        <div class="preloader">
            <div class="spinner"></div>
            <p>Loading, please wait...</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>