# Reviews Plugin

## Overview

The Reviews Plugin is a WordPress plugin designed to manage user reviews on a website. It allows users to submit reviews, view existing reviews, and manage them through a custom post type. The plugin includes AJAX functionality for a seamless user experience, responsive design, and a customizable review form.

## Features

- **Custom Post Type**: Registers a custom post type for reviews.
- **AJAX Functionality**: Allows users to add, delete, and fetch reviews without reloading the page.
- **Responsive Design**: Layout adjusts based on screen size to ensure a good user experience on all devices.
- **Star Rating System**: Users can rate their reviews using a star rating system.
- **Shortcode Support**: Provides a shortcode to display reviews on any page or post.

## File Structure
/reviews-plugin
    ├── reviews.php                // Main plugin file
    ├── includes
    │   ├── enqueue-scripts.php    // Enqueues styles and scripts
    │   ├── post-type.php           // Registers custom post type
    │   ├── meta-boxes.php          // Registers meta boxes for additional data
    │   ├── shortcodes.php          // Registers shortcodes for displaying reviews
    │   ├── ajax-handlers.php       // Handles AJAX requests for adding, deleting, and fetching reviews
    │   ├── template-handler.php     // Handles template-related functions
    │   └── page-handler.php        // Handles page creation on plugin activation
    ├── js
    │   ├── delete-review.js        // Handles review deletion
    │   ├── load-reviews.js         // Loads reviews via AJAX
    │   ├── rating.js               // Manages the star rating tooltip
    │   └── responsive.js           // Adjusts review width based on screen size
    ├── css
    │   └── reviews.css             // Styles for the reviews section
    └── template-reviews.php        // Template file for displaying reviews



## Installation

1. **Download the Plugin**: Download the plugin files and extract them.
2. **Upload to WordPress**: Upload the extracted folder to the `/wp-content/plugins/` directory.
3. **Activate the Plugin**: Go to the WordPress admin panel, navigate to the "Plugins" section, and activate the Reviews Plugin.
4. **Create Reviews Page**: Upon activation, the plugin will automatically create a page titled "Reviews" with the appropriate template.

## Usage

### Shortcode

To display the reviews on any page or post, use the following shortcode:
[reviews]

### Adding a Review

1. Click the "Add Review" button to display the review form.
2. Fill in the author's name, review content, and select a rating.
3. Click "Submit Review" to add the review.

### Deleting a Review

Users with the appropriate permissions can delete reviews by clicking the "Delete" button associated with each review.

## AJAX Functionality

The plugin uses AJAX for the following actions:

- **Adding a Review**: Submits the review form data to the server without reloading the page.
- **Deleting a Review**: Sends a request to delete a review and updates the UI accordingly.
- **Fetching Reviews**: Loads existing reviews from the server and displays them in the designated area.

### AJAX Endpoints

- **Add Review**: `admin-ajax.php?action=add_review`
- **Delete Review**: `admin-ajax.php?action=delete_review`
- **Get Reviews**: `admin-ajax.php?action=get_reviews`

## Responsive Design

The plugin includes a responsive design that adjusts the width of review blocks based on the parent container's width. The following classes are applied based on screen size:

- `review-100`: 100% width for screens less than 768px.
- `review-50`: 50% width for screens from 768px to 1024px.
- `review-30`: 30% width for screens greater than 1024px.

## Customization

### CSS

You can customize the appearance of the reviews section by modifying the `reviews.css` file.

### JavaScript

The behavior of the reviews can be customized by editing the JavaScript files located in the `js` directory.

## Troubleshooting

### Common Issues

1. **Reviews Not Displaying**:
   - Ensure that the shortcode `[reviews]` is correctly placed on the page where you want the reviews to appear.
   - Check if the custom post type "Reviews" has any entries. If there are no reviews, the list will be empty.

2. **AJAX Requests Failing**:
   - Open the browser's developer console (F12) and check for any JavaScript errors.
   - Ensure that the nonce is being correctly passed in the AJAX requests. If the nonce is invalid, the request will fail.
   - Verify that the AJAX URL is correctly set in the localized script.

3. **Styling Issues**:
   - If the reviews section does not appear as expected, check the `reviews.css` file for any custom styles that may be overriding the default styles.
   - Ensure that the CSS file is properly enqueued in the plugin.

4. **Responsive Design Not Working**:
   - Make sure that the JavaScript responsible for adjusting the review width is correctly included and that there are no JavaScript errors in the console.
   - Test the plugin on different screen sizes to ensure that the responsive classes are being applied correctly.

### Debugging Tips

- **Enable Debugging in WordPress**: To get more detailed error messages, enable debugging in your `wp-config.php` file by adding or modifying the following lines:
  ```php
  define('WP_DEBUG', true);
  define('WP_DEBUG_LOG', true);
  define('WP_DEBUG_DISPLAY', false);

  This will log errors to the `wp-content/debug.log` file.

- **Check Server Logs**: If you encounter server-related issues, check your server's error logs for any relevant messages.

## Future Enhancements

The following features could be considered for future updates to the Reviews Plugin:

- **Email Notifications**: Notify administrators when a new review is submitted.
- **Review Moderation**: Implement a moderation system where reviews need to be approved before being published.
- **User  Profiles**: Allow users to create profiles and manage their reviews.
- **Rating Statistics**: Provide an overview of average ratings and review counts for better insights.
- **Integration with Other Plugins**: Consider integrating with popular plugins like WooCommerce for product reviews.

## Contribution

If you would like to contribute to the development of the Reviews Plugin, please follow these steps:

1. **Fork the Repository**: Create a fork of the plugin repository on GitHub.
2. **Create a Branch**: Create a new branch for your feature or bug fix.
3. **Make Changes**: Implement your changes and ensure that they are well-documented.
4. **Submit a Pull Request**: Once your changes are complete, submit a pull request for review.

## License

The Reviews Plugin is licensed under the [GNU General Public License v2.0](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html). You are free to use, modify, and distribute the plugin as long as you adhere to the terms of the license.

## Support

For support and inquiries regarding the Reviews Plugin, please contact the developer or visit the plugin's support forum. You can also check the FAQ section for common questions and answers.