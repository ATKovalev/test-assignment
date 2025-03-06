// review-form.js
jQuery(document).ready(function($) {
    // Handle click on the "Add Review" button
    $('#add-review-toggle-button').on('click', function() {
        $('#add-review-form').slideDown(); // Show the form
        $(this).hide(); // Hide the "Add Review" button
    });

    // Handle click on the close button of the add review form
    $('.close-button').on('click', function() {
        $('#add-review-form').slideUp(); // Hide the form
        $('#add-review-toggle-button').show(); // Show the "Add Review" button
    });

    // Handle submission of the add review form
    $('#review-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form behavior

        var formData = $(this).serialize(); // Serialize the form data

        $('#loader').show(); // Show the popup with the preloader before sending the request
        $.ajax({
            type: 'POST',
            url: reviews_ajax.ajax_url,
            data: formData + '&action=add_review&nonce=' + reviews_ajax.nonce, // Add action and nonce
            success: function(response) {
                if (response.success) {
                    showMessage(response.data.message, 'success'); // Success message
                    $('#review-form')[0].reset(); // Reset the form
                    $('#add-review-form').slideUp(); // Hide the form after successful submission
                    $('#add-review-toggle-button').show(); // Show the "Add Review" button
                    loadReviews(); // Refresh the list of reviews after successful submission
                } else {
                    showMessage(response.data.message, 'error'); // Error message
                }
            },
            error: function() {
                showMessage('An error occurred. Please try again.', 'error'); // Error handling
            },
            complete: function() {
                $('#loader').hide(); // Hide the popup after the request is complete
            }
        });
    });
});