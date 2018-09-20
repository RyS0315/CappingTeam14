function ShowCompose(){
    var box = document.getElementById('compose-prayer');
    var button = document.getElementById('startprayer');
    button.removeAttribute('onclick');
    $(box).fadeIn();
    button.setAttribute('onclick','CloseCompose()');
}

function CloseCompose(){
    var box = document.getElementById('compose-prayer');
    var button = document.getElementById('startprayer');
    button.removeAttribute('onclick');
    $(box).fadeOut();
    button.setAttribute('onclick','ShowCompose()');
}