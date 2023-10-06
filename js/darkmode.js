$(document).ready(function() {
    var body = $('body');
    var darkModeButton = $('#darkmode-button');
    darkModeButton.text('Mode clair');
    var isDarkMode = true;
    
    function enableDarkMode() {
        body.addClass('dark-mode');
        darkModeButton.text('Mode clair');
        isDarkMode = true;
    }
    
    function disableDarkMode() {
        body.removeClass('dark-mode');
        darkModeButton.text('Mode sombre');
        isDarkMode = false;
    }
    
    darkModeButton.on('click', function() {
        if (isDarkMode) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });
});
