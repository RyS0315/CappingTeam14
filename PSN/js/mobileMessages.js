function mobileMessage() {
    var flag = true;
    if(flag) {
        //If the search user bar is hidden
        $('.message-feed').hide();
        $('.messages-user-setting-box').show();
        flag = false;
    } else {
        $('.message-feed').show();
        $('.messages-user-setting-box').hide();
        flag = true;
    }
}
