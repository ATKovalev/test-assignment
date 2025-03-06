// delete-review.js
jQuery(document).ready(function($) {
    // Handle click on the "Delete" button
    $('.reviews-list').on('click', '.delete-review', function() {
        var postId = $(this).data('id');
        var nonce = reviews_ajax.nonce; // Get nonce

        // Ensure that confirm is called only once
        if (confirm('Are you sure you want to delete this review?')) {
            $('#loader').show(); // Show the popup with the preloader before sending the request
            $.ajax({
                type: 'POST',
                url: reviews_ajax.ajax_url,
                data: {
                    action: 'delete_review',
                    post_id: postId,
                    nonce: nonce
                },
                success: function(response) {
                    if (response.success) {
                        showMessage(response.data.message, 'success'); // Success message
                    } else {
                        showMessage(response.data.message, 'error'); // Error message
                    }
                },
                error: function() {
                    showMessage('An error occurred. Please try again.', 'error'); // Error handling
                },
                complete: function() {
                    $('#loader').hide(); // Hide the popup after the request is complete
                    loadReviews(); // Refresh the list of reviews after the request is complete
                }
            });
        }
    });
});