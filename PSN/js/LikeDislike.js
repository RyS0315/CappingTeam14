function addLike(url, data, prayid){
    var like = document.getElementById("like--" +prayid);
    var dislike = document.getElementById("dislike--" +prayid);
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        success: function (data){
            // alert(data);
            if(like.classList.contains("up-down-active")){
                like.classList.remove("up-down-active");
            }else{
                like.classList.add("up-down-active");
                if(dislike.classList.contains("up-down-active")){
                    dislike.classList.remove("up-down-active");
                }
            }
        }
    });
}

function addDislike(url, data, prayid){
    var like = document.getElementById("like--" +prayid);
    var dislike = document.getElementById("dislike--" +prayid);
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        success: function (data) {
            // alert(data);
            if(dislike.classList.contains("up-down-active")){
                dislike.classList.remove("up-down-active");
            }else{
                dislike.classList.add("up-down-active");
                if(like.classList.contains("up-down-active")){
                    like.classList.remove("up-down-active");
                }
            }
        }
    });
}