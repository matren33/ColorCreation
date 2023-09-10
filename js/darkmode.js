$(document).ready(function() {
    var body = $('body');
    var darkModeButton = $('#darkmode-button');
    darkModeButton.text('Mode clair');
    var isDarkMode = true; // Pour suivre l'état du mode sombre
    
    // Fonction pour activer le mode sombre
    function enableDarkMode() {
        body.addClass('dark-mode');
        darkModeButton.text('Mode clair');
        isDarkMode = true;
    }
    
    // Fonction pour désactiver le mode sombre
    function disableDarkMode() {
        body.removeClass('dark-mode');
        darkModeButton.text('Mode sombre');
        isDarkMode = false;
    }
    
    // Gestionnaire d'événements pour le clic sur le bouton "darkmode-button"
    darkModeButton.on('click', function() {
        if (isDarkMode) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });
});
