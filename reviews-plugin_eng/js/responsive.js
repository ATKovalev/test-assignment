// responsive.js
jQuery(document).ready(function($) {
    // Width of the review block
    function adjustReviewWidth() {
        // Remove previous width classes
        $('.review').removeClass('review-100 review-50 review-30');

        // Find the parent container
        var parentWidth = $('.reviews-list').parent().width(); // Get the width of the parent container

        // Set the class for reviews based on the width of the parent container
        if (parentWidth < 768) {
            $('.review').addClass('review-100'); // 100% width for containers less than 768px
        } else if (parentWidth >= 768 && parentWidth < 1024) {
            $('.review').addClass('review-50'); // 50% width for containers from 768px to 1024px
        } else {
            $('.review').addClass('review-30'); // 30% width for containers greater than 1024px
        }

        // Update the Masonry layout after adding classes
        $('.reviews-list').masonry('layout');
    }

    // Call the function on window resize
    $(window).resize(function() {
        adjustReviewWidth();
    });

    // Call the function to set the width of reviews on page load
    adjustReviewWidth();
});