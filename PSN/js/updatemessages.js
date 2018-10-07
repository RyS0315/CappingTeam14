function scrollBottom(){
    console.log('it got here');
    elmnt = document.getElementById('msg-convo');
    console.log(elmnt);
    console.log(elmnt.scrollHeight);
    elmnt.scrollTop = elmnt.scrollHeight;
    console.log(elmnt.scrollTop);
}