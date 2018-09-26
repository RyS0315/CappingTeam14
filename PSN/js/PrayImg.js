function center_img(element) {
    var h = element.clientHeight;
    console.log(h);
    if(h >= 450){
        var margin = h - 450;
        var offset = margin / -2;
        element.style.top = offset +"px";
    }
}

function showLargeImg(img){
    var overlay = document.getElementById('overlay');
    var body = document.getElementById('imglarge-body');
    var close = document.getElementById('closelargeimg');
    img.removeAttribute('onclick');
    $(overlay).fadeIn();
    $(body).fadeIn();
    $('#imglarge').attr('src', img.src);
    close.setAttribute('onclick','CloseLargeImg('+img+')');
}