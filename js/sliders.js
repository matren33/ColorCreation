$(document).ready(function() {
    // Sélectionnez tous les éléments de type range avec la classe "slider"
    var sliders = $('.slider');
    
    // Pour chaque slider, ajoutez un gestionnaire d'événements "input"
    sliders.each(function() {
        var slider = $(this);
        var output = slider.nextAll('.slider-value').first(); // Sélectionnez le premier élément .slider-value après le slider
                
        // Gestionnaire d'événements pour l'événement "input" du slider
        slider.on('input', function() {
            // Mettez à jour le contenu de l'élément output avec la valeur du slider
            output.text(slider.val());
        });
    });
});