    function ShowMenu(){
        var menu = document.getElementById('header-profile-menu');
        var button = document.getElementById('header-profile-pic-link');
        button.removeAttribute('onclick');
        $(menu).fadeIn();
        button.setAttribute('onclick','CloseMenu()');
    }

    function CloseMenu(){
        var menu = document.getElementById('header-profile-menu');
        var button = document.getElementById('header-profile-pic-link');
        button.removeAttribute('onclick');
        $(menu).fadeOut();
        button.setAttribute('onclick','ShowMenu()');
    }

