$(document).ready(function() {

    var sliders = $('.slider');
    
    sliders.each(function() {
        var slider = $(this);
        var output = slider.nextAll('.slider-value').first(); 
                
        
        slider.on('input', function() {
            
            output.text(slider.val());
        });
    });
});