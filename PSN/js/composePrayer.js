function ShowCompose(){
    var box = document.getElementById('compose-prayer');
    var overlay = document.getElementById('overlay');
    var button = document.getElementById('startprayer');
    var close = document.getElementById('closebutton');
    var body = document.body;
    // body.setAttribute('style', 'overflow:hidden');
    button.removeAttribute('onclick');
    $(box).fadeIn();
    $(overlay).fadeIn();
    close.setAttribute('onclick','CloseCompose()');
}

function CloseCompose(){
    var box = document.getElementById('compose-prayer');
    var overlay = document.getElementById('overlay');
    var button = document.getElementById('startprayer');
    var close = document.getElementById('closebutton');
    var body = document.body;
    // body.setAttribute('style', 'overflow:scroll');
    close.removeAttribute('onclick');
    $(box).fadeOut();
    $(overlay).fadeOut()
    button.setAttribute('onclick','ShowCompose()');
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            if(input.files[0].size >= 500000){
                $('#upload-size-error')
                .attr('style','display:block');
                $('#uploadpreview')
                .attr('style','display:none');
            }else{
                $('#uploadpreview')
                .attr('src', e.target.result)
                .attr('style','display:block');
                $('#uploadbutton').html('Change Picture');
                $('#upload-size-error')
                .attr('style','display:none');
            };
        }
        reader.readAsDataURL(input.files[0]);
    }
}