$(document).ready(function() {
    var catalogueRadio = $('#Catalogue');
    var personnelRadio = $('#Personnel');
    var choixCatalogueContainer = $('#choix-catalogue-container');
    var slidersContainer = $('#sliders-container');
    
    choixCatalogueContainer.hide();
    

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
    
    if (catalogueRadio.is(':checked')) {
        choixCatalogueContainer.show();
        slidersContainer.hide();
    } else {
        choixCatalogueContainer.hide();
        slidersContainer.show();
    }
});
