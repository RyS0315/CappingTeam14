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

function addTag(inp){
    var tagval = inp.value;
    var dest = document.getElementById('cur-tags');
    var newdiv = document.createElement("DIV");
    newdiv.setAttribute('class', 'tag');
    newdiv.setAttribute('id', 'tag--'+tagval);
    var tagdesc = document.createElement('p');
    tagdesc.setAttribute('class', 'tag-desc');
    tagdesc.innerHTML = tagval;
    var hidinp = document.createElement("INPUT");
    hidinp.setAttribute('type', 'text');
    hidinp.setAttribute('class', 'hidden');
    hidinp.setAttribute('value', tagval);
    hidinp.setAttribute('name', 'tag--'+tagval);
    var droptag = document.createElement("img");
    droptag.setAttribute('class', 'drop-tag');
    droptag.setAttribute('src', 'images/icons/close.png');
    droptag.setAttribute('onclick', 'DropTag("'+tagval+'")')
    
    dest.appendChild(newdiv);
    newdiv.appendChild(tagdesc);
    newdiv.appendChild(hidinp);
    newdiv.appendChild(droptag);

    inp.value = '';
    console.log(hidinp);
    console.log(tagdesc);
    console.log(tagval);
}

function DropTag(val){
    var div = document.getElementById('tag--'+val);
    var pnode = document.getElementById('cur-tags')
    pnode.removeChild(div);

}