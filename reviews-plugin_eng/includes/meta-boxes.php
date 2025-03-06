<?php
// Register meta boxes
function reviews_add_meta_boxes() {
    add_meta_box('reviews_meta_box', 'Additional Data', 'reviews_meta_box_callback', 'reviews', 'normal', 'high');
}
add_action('add_meta_boxes', 'reviews_add_meta_boxes');

function reviews_meta_box_callback($post) {
    $author_name = get_post_meta($post->ID, 'author_name', true);
    $rating = get_post_meta($post->ID, 'rating', true);
    ?>
    <label for="author_name">Author's Name:</label>
    <input type="text" id="author_name" name="author_name" value="<?php echo esc_attr($author_name); ?>" />
    <br>
    <label for="rating">Rating:</label>
    <select id="rating" name="rating">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?></option>
        <?php endfor; ?>
    </select>
    <?php
}

function reviews_save_meta_box_data($post_id) {
    if (array_key_exists('author_name', $_POST)) {
        update_post_meta($post_id, 'author_name', sanitize_text_field($_POST['author_name']));
    }
    if (array_key_exists('rating', $_POST)) {
        update_post_meta($post_id, 'rating', intval($_POST['rating']));
    }
}
add_action('save_post', 'reviews_save_meta_box_data');