// rating.js
jQuery(document).ready(function($) {
    // Handle mouse hover on rating stars
    $('.star-rating .star').hover(function() {
        var rating = $(this).index() + 1; // Get the rating (index + 1)
        $('#rating-tooltip').text('Rating: ' + rating + '/5'); // Set the text
        $('#rating-tooltip').css({
            top: $(this).offset().top - 30, // Position above the star
            left: $(this).offset().left + 10 // Slightly shift to the right
        }).fadeIn(200); // Show the tooltip
    }, function() {
        $('#rating-tooltip').fadeOut(200); // Hide the tooltip when the mouse leaves
    });
});