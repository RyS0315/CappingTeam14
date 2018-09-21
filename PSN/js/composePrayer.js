function ShowCompose(){
    var box = document.getElementById('compose-prayer');
    var button = document.getElementById('startprayer');
    var close = document.getElementById('closebutton');
    button.removeAttribute('onclick');
    $(box).fadeIn();
    close.setAttribute('onclick','CloseCompose()');
}

function CloseCompose(){
    var box = document.getElementById('compose-prayer');
    var button = document.getElementById('startprayer');
    var close = document.getElementById('closebutton');
    close.removeAttribute('onclick');
    $(box).fadeOut();
    button.setAttribute('onclick','ShowCompose()');
}