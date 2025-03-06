// load-reviews.js
jQuery(document).ready(function($) {
    // Function to load reviews
    function loadReviews() {
        $('#loader').show(); // Show the popup with the preloader
        $.ajax({
            url: reviews_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'get_reviews'
            },
            success: function(response) {
                $('.reviews-list').html(response); // Update the list of reviews
                
                // Initialize Masonry after loading reviews
                $('.reviews-list').masonry('destroy'); // Destroy the previous initialization
                $('.reviews-list').masonry({
                    itemSelector: '.review',
                    columnWidth: '.review',
                    percentPosition: true
                });

                // After initializing Masonry, call the function to set the width
                adjustReviewWidth();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error loading reviews:', textStatus, errorThrown); // Log the error
            },
            complete: function() {
                $('#loader').hide(); // Hide the popup after the request is complete
            }
        });
    }

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

    // Call the function on page load
    loadReviews();
});