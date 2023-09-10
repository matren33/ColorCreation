$(document).ready(function() {
    var sliders = $('.slider');
    
    var colorPreview = $('#color-preview');

    function updateColorPreview() {
        var red = $('#slider-red').val();
        var green = $('#slider-green').val();
        var blue = $('#slider-blue').val();
        var color = 'rgb(' + red + ',' + green + ',' + blue + ')';
        colorPreview.css('background-color', color);
    }

    sliders.each(function() {
        var slider = $(this);
        slider.on('input', function() {
            updateColorPreview();
        });
    });

    updateColorPreview();
});