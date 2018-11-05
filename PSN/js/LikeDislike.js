function addLike(url, data, prayid){
    var like = document.getElementById("like--" +prayid);
    var dislike = document.getElementById("dislike--" +prayid);
    var likepic = document.getElementById("like-pic--" +prayid);
    var dislikepic = document.getElementById("dislike-pic--" +prayid);
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        success: function (data){
            // alert(data);
            if(like.classList.contains("up-down-active")){
                like.classList.remove("up-down-active");
                likepic.src = "images/icons/thumbs-up-grey.png";
            }else{
                like.classList.add("up-down-active");
                likepic.src ="images/icons/thumbs-up-purple.png";
                if(dislike.classList.contains("up-down-active")){
                    dislike.classList.remove("up-down-active");
                    dislikepic.src = "images/icons/thumbs-down-grey.png";
                }
            }
        }
    });
}

function addDislike(url, data, prayid){
    var like = document.getElementById("like--" +prayid);
    var dislike = document.getElementById("dislike--" +prayid);
    var likepic = document.getElementById("like-pic--" +prayid);
    var dislikepic = document.getElementById("dislike-pic--" +prayid);
    $.ajax({
        type: "POST",
        url: url,
        data: data, 
        success: function (data) {
            // alert(data);
            if(dislike.classList.contains("up-down-active")){
                dislike.classList.remove("up-down-active");
                dislikepic.src = "images/icons/thumbs-down-grey.png";
            }else{
                dislike.classList.add("up-down-active");
                dislikepic.src = "images/icons/thumbs-down-purple.png";
                if(like.classList.contains("up-down-active")){
                    like.classList.remove("up-down-active");
                    likepic.src = "images/icons/thumbs-up-grey.png";
                }
            }
        }
    });
}