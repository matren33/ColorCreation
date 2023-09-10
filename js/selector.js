$(document).ready(function() {
    var catalogueRadio = $('#Catalogue');
    var personnelRadio = $('#Personnel');
    var choixCatalogueContainer = $('#choix-catalogue-container');
    var slidersContainer = $('#sliders-container');
    
    // Cachez initialement le conteneur "choix-catalogue" car "Catalogue" est sélectionné par défaut
    choixCatalogueContainer.hide();
    
    // Ajoutez des gestionnaires d'événements aux boutons radio
    catalogueRadio.on('change', function() {
        if (catalogueRadio.is(':checked')) {
            choixCatalogueContainer.show();
            slidersContainer.hide();
        }
    });
    
    personnelRadio.on('change', function() {
        if (personnelRadio.is(':checked')) {
            choixCatalogueContainer.hide();
            slidersContainer.show();
        }
    });
    
    // Assurez-vous que l'état initial correspond à la sélection actuelle
    if (catalogueRadio.is(':checked')) {
        choixCatalogueContainer.show();
        slidersContainer.hide();
    } else {
        choixCatalogueContainer.hide();
        slidersContainer.show();
    }
});
