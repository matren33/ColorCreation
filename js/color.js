$(document).ready(function() {
    // Select all sliders
    var sliders = $('.slider');
    // Select the element where you want to visualize the color
    var colorPreview = $('#color-preview');

    // Function to update the color preview
    function updateColorPreview() {
        var red = $('#slider-red').val();
        var green = $('#slider-green').val();
        var blue = $('#slider-blue').val();
        var color = 'rgb(' + red + ',' + green + ',' + blue + ')';
        colorPreview.css('background-color', color);
    }

    // Add an input event listener to each slider
    sliders.each(function() {
        var slider = $(this);
        slider.on('input', function() {
            updateColorPreview();
        });
    });

    // Initialize the color preview
    updateColorPreview();
});