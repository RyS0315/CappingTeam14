<?php
    header("Content-type: text/css; charset: UTF-8");
    $theme = [
        'Light'=>['background'=>'#efe9ef',
                  'text'=>'rgba(0,0,0,.65)',
                  'boxcolor'=>'#f3e1ff',
                  'link'=>'#a415df',
                  'feed'=>'#ffffff',
                  'menuborder'=>'rgba(0,0,0,.3)',
                  'boldcolor'=>'#000000',
                  'buttoncolor'=>'#a415df',
                  'buttonhover'=>'#8405af',
                  'buttontext'=>'#f3e1ff',
                  'commentbox'=>'#fbfbfb'],
        'Dark' =>['background'=>'#140026', 
                  'text'=>'rgba(255,255,255,.65)',
                  'boxcolor'=>'#1b0036',
                  'link'=>'rgba(200,0,200,.65)',
                  'feed'=>'#550006',
                  'menuborder'=>'#111111',
                  'boldcolor'=>'#ffffff',
                  'buttoncolor'=>'#e132ef',
                  'buttonhover'=>'#b100bb',
                  'buttontext'=>'#ffffff',
                  'commentbox'=>'#320942'],
        'Gold'=>['background'=>'#f3c812',
                  'text'=>'rgba(0,0,0,.65)',
                  'boxcolor'=>'#ffff00',
                  'link'=>'#a415df',
                  'feed'=>'#ffff00',
                  'menuborder'=>'rgba(0,0,0,.3)',
                  'boldcolor'=>'#000000',
                  'buttoncolor'=>'#a415df',
                  'buttonhover'=>'#8405af',
                  'buttontext'=>'#f3e1ff',
                  'commentbox'=>'#fbfb90'],
    ];
    $chosen='Light';
    $backgroundcolor = $theme[$chosen]['background'];
    $boxcolor = $theme[$chosen]['boxcolor'];
    $textcolor = $theme[$chosen]['text'];
    $linkcolor = $theme[$chosen]['link'];
    $feedcolor = $theme[$chosen]['feed'];
    $menuborder = $theme[$chosen]['menuborder'];
    $boldcolor = $theme[$chosen]['boldcolor'];
    $buttoncolor = $theme[$chosen]['buttoncolor'];
    $buttonhover = $theme[$chosen]['buttonhover'];
    $commentcolor = $theme[$chosen]['commentbox'];
    $buttontext = $theme[$chosen]['buttontext'];
?>
/*************** COMMON ******************/
    html{
        font-size:16px;
    }

    body{
        margin:0px;
        background-color:<?php echo $backgroundcolor ?>;
    }
    ::placeholder{
        color:rgba(0,0,0,.4);
    }

    p{
        color:<?php echo $textcolor?>;
        margin-block-start: 0px;
        margin-block-end: 0em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    h3{
        margin-block-start: 0em;
        margin-block-end: 0em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    input{
        margin-bottom:10px;
        width:50%;
        height:35px;
        border-color:rgb(0,0,0,.15);
        border-radius:5px;
        text-indent: 5px;
        font-size:16px;
    }

    select{
        margin-bottom:10px;
        width:70%;
        height:35px;
        border-color:rgb(0,0,0,.15);
        border-radius:5px;
        text-indent: 5px; 
    }

    textarea {
        resize: none;
        overflow: hidden;
        min-height: 35px;
        width:95%;
        border-color:#1DA1F2;
        font-size:16px;
        border-radius:7px;
        text-indent: 5px;
    }

    form {
        margin-bottom: 0em;
    }

    textarea:focus{
        outline: none;
    }

    .error{
        color:#b31b1b;
    }

    a{
        text-decoration: none;
    }

    a:hover{
        text-decoration: underline;
    }

    ul{
        padding:0px;
        display: flex;
    }

    #header-profile-menu-list{
        display:block;
    }

    li{
        list-style-type:none;
    }

    .hidden{
        display:none;
    }

    .logo-box{
        width:20%;
    }

    .logo{
        height:46px;
        width:46px;
        border-radius:50%;
        border-color:<?php echo $boxcolor ?>;
    }

    .logo-li{
        transform: translateY(-29%);
        margin:auto;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    label{
        width:auto;
        height:auto;
        padding:7px;
        border-radius:100px;
        border-style:solid;
        border-width:1px;
        border-color:<?php echo $boldcolor?>;
        background-color:<?php echo $buttoncolor?>;
        color:<?php echo $buttontext?>;
        display:inline-block;
        font-weight:bold;
    }

    label:hover{
        cursor:pointer;
        background-color:<?php echo $buttonhover ?>;
    }

    .overlay{
        position:fixed;
        height:calc(100% + 20px);
        width:100%;
        background-color:rgba(0,0,0,.6);
        z-index:99;
        overflow-y:scroll;
    }

    .close{
        height:30px;
        width:30px;
        position:absolute;
        right:25px;
        top:10px;
    }

    .close:hover{
        cursor:pointer;
    }

    ::-webkit-scrollbar {
        width: 15px;
    }
    
    ::-webkit-scrollbar-track {
        transform:translateX(-5px);
    }
    
    ::-webkit-scrollbar-thumb {
        background: #cccccc; 
        border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #999999;
        cursor:pointer;
    }
/*************** HEADER ******************/
    .header{
        height:50px;
        width:100%;
        border-bottom-style:solid;
        border-bottom-width:1px;
        border-bottom-color:<?php echo $menuborder?>;
        background-color:<?php echo $boxcolor ?>;
        position:fixed;
        z-index:50;
    }
    
    .header-box{
        width:93%;
        margin:auto;
        display:flex;
        height:calc(100% - 16px);
    }

    .header-link-box{
        width:40%;
    }
    
    .header-link>a{
        color:<?php echo $textcolor ?>;
        text-decoration:none;
        font-size:16px;
        text-align: center;
        display:inline-block;
        height:100%;
        width: calc(100% + 40px);
        transform: translateX(-20px);
    }
    
    .header-link{
        height:100%;
        width:auto;
        border-bottom-style:solid;
        border-bottom-color: <?php echo $linkcolor ?>;
        border-bottom-width: 1px;
        padding-right:20px;
        padding-left:20px;
    }
    
    .header-link:hover{
        height:calc(100% - 2px);
        border-bottom-width:3px;
        border-bottom-color: <?php echo $linkcolor ?>;
    }
    
    .active{
        height:calc(100% - 2px);
        border-bottom-width:3px;
        border-bottom-color: <?php echo $linkcolor?>;
    }
    
    .active a{
        color:<?php echo $linkcolor ?>;
    }
    
    .header-link:hover a{
        color:<?php echo $linkcolor?>;
    }

    .header-profile-pic{
        width:40%;
        transform: translateY(-35%);
    }

    #header-profile-pic-link:hover{
        cursor:pointer;
        border-width:3px;
        border-color:<?php echo $linkcolor ?>;
    }

    #header-profile-pic-link{
        margin-left:50%;
        margin-top:-13px;
    }

    .index-profile-pic{
        border-radius: 50%;
        height: 45px;
        width: 45px;
        border-color: <?php echo $boxcolor?>;
        color: #fff;
        margin:auto;
    }

    .index-profile-pic:hover{
    }

    #header-profile-menu{
        height:auto;
        width:200px;
        position:fixed;
        margin-top:50px;
        margin-left:73%;
        background-color:<?php echo $feedcolor?>;
        border-radius:5px;
        border-color:<?php echo $menuborder ?>;
        border-width:1px;
        border-style:solid;
    }


    .header-profile-menu-name{
        display:block;
        height:calc(25% - 10px);
        width:100%;
        padding-top:10px;
        margin-block-start: 0em;
        margin-block-end: 0em;
        border-bottom-color:<?php echo $menuborder ?>;
        border-bottom-width:1px;
        border-bottom-style:solid;
    }
    
    .header-profile-menu-name:hover{
        background-color:<?php echo $backgroundcolor ?>;
    }
    
    .header-profile-menu-name-name>a{
        color:<?php echo $boldcolor ?>;
        font-weight:bold;
        text-decoration:none;
        font-size:22px;
        display:inline-block;
        height:100%;
        width:100%;
        padding-left:10px;
        width:calc(100% - 10px);
    }
    
    .header-profile-menu-name-name{
        height:40%;
    }
    
    .header-profile-menu-name-username{
        height:60%;
    }
    
    .header-profile-menu-name-username>a{
        padding-bottom:10px;
        color:<?php echo $textcolor ?>;
        text-decoration:none;
        font-size:16px;
        padding-left:20px;
        width:calc(100% - 20px);
        display:inline-block;
        height:100%;
    }

    .header-profile-menu-settings{
        display:block;
        height:auto;
        margin-block-start: 0em;
        margin-block-end: 0em;
        border-bottom-color:<?php echo $menuborder ?>;
        border-bottom-width:1px;
        border-bottom-style:solid;
    }

    .header-profile-menu-list-item:hover{
        background-color:<?php echo $backgroundcolor?>;
    }

    .header-profile-menu-list-item>a{
        color:<?php echo $textcolor ?>;
        text-decoration:none;
        font-size:16px;
        padding-left:10px;
        width:calc(100% - 10px);
        display:inline-block;
        padding-top:10px;
        height:calc(100% - 10px);
    }

    .header-profile-menu-list-item{
        height:40px;
    }

    .header-profile-menu-logout{
        display:block;
        height:auto;
        margin-block-start: 0em;
        margin-block-end: 0em;
    }

    #sort-compose{
        margin-left:3%;
        margin-top:-6px;
    }

/*************** LOGIN PAGE **************/
    .login-body{
        /* height:600px; */
        width:50%;
        margin: auto;
        padding-top:60px;
    }

    .login-form-box{
        /* margin:auto; */
        width:auto;
        height:330px;
        max-width:835px;
        border-style: solid;
        border-width:1px;
        border-color:rgba(0,0,0,.2);
        background-color:<?php echo $boxcolor?>;
    }

    .login-form-box-body{
        width:100%;
        background-color: #ffffff;
        padding-bottom:10px;
    }

    #login-form-inputs{
        margin:auto;
        width:50%;
        margin-top:10px;
    }

    .submit-button{
        width:auto;
        height:auto;
        padding:7px;
        border-radius:100px;
        border-style:solid;
        border-width:1px;
        border-color:<?php echo $boldcolor?>;
        background-color:<?php echo $buttoncolor?>;
        color:<?php echo $buttontext?>;
        padding-right:15px;
        padding-left:15px;
        font-weight:bold;
        display:inline-block;
    }

    .submit-button:hover{
        cursor:pointer;
        background-color:<?php echo $buttonhover ?>;
    }
/*************** NEW ACCOUNT *************/
    .newaccount-body{
        width:50%;
        margin: auto;
        padding-top:60px;
    }

    .newaccount-form-box{
        width:auto;
        height:700px;
        max-width:835px;
        border-style: solid;
        border-width:1px;
        border-color:rgba(0,0,0,.2);
        background-color:#ffffff;
        padding:25px 0px 0px 40px;
    }

/*************** INDEX *******************/
    .index-body{
        display:flex;
        width:93%;
        margin:auto;
        height:auto;
        padding-bottom:25px;
        padding-top:60px;  
    }

    .index-left-box{
        width:25%;
        display:block;
        max-height:600px;
        background-color: <?php echo $boxcolor ?>;
    }

    .index-center-box{
        width:52%;
        margin-left:15px;
        background-color:<?php echo $feedcolor ?>;
        margin-right:15px;
        height:auto;
    }

    .index-right-box{
        width:25%;
        background-color: <?php echo $boxcolor ?>;
        max-height:600px;
    }

    .compose-prayer{
      overflow: hidden;
      padding-top: 12%;
      position: relative;
      height:75px;
    }
    
    .compose-prayer iframe {
       border: 0;
       height: 100%;
       left: 0;
       position: absolute;
       top: 0;
       width: 100%;
    }

    .index-name{
        padding:0px;
        margin:0px;
        font-weight: bold;
        font-size:20px;
    }

    .index-username{
        padding: 0px 0px 0px 5px;
        margin:0px;
        font-size: 16px;
    }

    .index-left-stat-box{
        width:33%;
        display:block;
        padding-bottom:10px;
    }

    .trends-header{
        margin:10px 0px 0px 10px;
        font-size:22px;
        color:<?php echo $textcolor ?>;
    }
/*************** COMPOSE *****************/
    .compose-header{
        width:auto;
        margin:auto;
    }

    #startprayer{
        height:auto;
        background-color:<?php echo $buttoncolor ?>;
        color:<?php echo $buttontext?>;
        padding:6px;
        border-radius:100px;
        border-style:solid;
        border-color:<?php echo $textcolor?>;
        border-width:1px;
        font-size:16px;
        padding-right:15px;
        padding-left:15px;
        font-weight:bold;
    }

    #startprayer:hover{
        cursor:pointer;
        background-color:<?php echo $buttonhover ?>;
    }

    #compose-prayer{
        position:absolute;
        height:100%;
        width:100%;
        z-index:100;
    }

    .prayer-box{
        height:auto;
        width:50%;
        margin:auto;
        background-color:<?php echo $feedcolor?>;
        margin-top:60px;
        border-radius:5px;
    }

    #closebutton{
        height:30px;
        width:30px;
    }

    #closebutton:hover{
        cursor:pointer;
    }

    .close-button{
        transform:translate(-20px, 20px);
    }

    .compose-content-bottom{
        display:inline-flex;
        margin-block-start: 0em;
        margin-block-end: 0em;
        margin-top:25px;
        width:100%;
    }

    .compose-content{
        background-color:<?php echo $boxcolor?>;
        padding:50px;
        border-top-style:solid;
        border-top-color:#cccccc;
        border-top-width:1px;
        border-bottom-left-radius:5px;
        border-bottom-right-radius:5px;
    }

    #compose-area{
        min-height:100px;
        width:100%;
    }

    #submit-prayer{
        width:auto;
        height:auto;
        padding:7px;
        border-radius:100px;
        border-style:solid;
        border-width:1px;
        border-color:<?php echo $boldcolor?>;
        background-color:<?php echo $buttoncolor?>;
        color:<?php echo $buttontext?>;
        font-size:16px;
        font-weight:bold;
    }

    #submit-prayer:hover{
        cursor:pointer;
        background-color:<?php echo $buttonhover ?>;
    }

    .compose-img-upload{
       width:auto;
       margin-right:auto;
    }

    .compose-submit{
        width:auto;
    }

    #preview{
        margin-top:20px;
        width:100%;
        height:auto;
        margin-bottom:10px;
    }

    #uploadpreview{
        width:100%;
        border-radius:5px;
        border-style:solid;
        border-color:#000;
        border-width:1px;
    }

    #upload-size-error{
        color:#ff0000;
    }
/*************** PROFILE *****************/
    .profile-body{
        width:80%;
        margin:auto;
    }

    .profile-profile-pic{
        border-radius: 50%;
        height: 200px;
        width: 200px;
        border: 2px solid #fff;
        color: #fff;
        transform: translateY(-100px);
    }
/*************** USERSETTINGS ************/ 
    .usersettings-box{
        display:block;
        margin-block-start: 0em;
        margin-block-end: 0em;
    }

    .settings-link{
        border-color:<?php echo $menuborder ?>;
        border-style:solid;
        border-width:1px;
        height:60px;
        background-color: #fefefe;
        width:250px;
    }

    .settings-link>a{
        position:relative;
        color:<?php echo $textcolor ?>;
        text-decoration:none;
        font-size:20px;
        text-align: center;
        display:block;
        height: calc(100% - 21px);
        padding-top: 21px;
        width:100%;
    }

    .settings-link:hover{
        background-color:<?php echo $linkcolor ?>;
    }
    
    .current{
        background-color:<?php echo $linkcolor ?>;
    }
/*************** PRAYER FEED *************/
    .feed-content-header{
        margin-block-start: 0em;
        margin-block-end: 0em;
    }

    #deleteprayer{
        height:15px;
        width:15px;
    }

    #deleteprayer:hover{
        cursor:pointer;
    }

    .feed-content-name{
        width:87%;
    }

    .feed-container{
        border-bottom-style:solid;
        border-bottom-color:<?php echo $backgroundcolor ?>;
        border-bottom-width:2px;
        width:100%;
        height:auto;
    }
    
    .feed-box{
        padding:30px 20px 30px 20px;
        display:flex;
        border-bottom-style:solid;
        border-bottom-color:<?php echo $backgroundcolor ?>;
        border-bottom-width:1px;
    }
    
    .feed-profile-img-box{
        width:10%;
    }
    
    .feed-profile-img{
        height:46px;
        width:46px;
        border-radius:50%;
    }

    .feed-content-box{
        width:90%;
    }

    .feed-profile-link:hover{
        text-decoration:none;
    }

    .feed-profile-name{
        color:<?php echo $boldcolor?>;
        font-weight:bold;
        display:inline-block;
        font-size:22px;
        padding-bottom:5px;
    }

    .feed-profile-username{
        color:<?php echo $textcolor ?>;
        display:inline-block;
    }

    .feed-content{
        padding-top:5px;
        padding-bottom: 5px;
    }

    .feed-interact-menu{
        margin-block-end: 0em;
    }

    .feed-like{
        width:20%;
        display:inline-flex;
    }

    .like-button{
        width:20px;
        height:20px;
        border-radius:50%;

    }

    .feed-num-likes{
        color:<?php echo $textcolor ?>;
        padding-left:5px;
        font-size:16px;
    }


    .feed-img-box{
        width:90%;
        margin-top:10px;
        margin-bottom:5px;
        vertical-align: middle;
    }
    
    .feed-img{
        margin:auto;
        width:100%;
        position:relative;
    }
    
    .feed-img:hover{
        cursor:pointer;
    }
    
    .feed-img-container{
        max-height:400px;
        margin:auto;
        overflow:hidden;
        border-style:solid;
        border-color:<?php echo $boldcolor ?>;
        border-width:1px;
        border-radius:5px;
    }
    
    .imglarge-box{
        width:40%;
        margin:auto;
        margin-top:100px;
    }
    
    #imglarge{
        width:100%;
    }
    
    #imglarge-body{
        position:absolute;
        height:100%;
        width:100%;
        z-index:100;
    }

/*************** COMMENTS ****************/
    .feed-comment-box{
        width:80%;
        padding-left:10%;
        padding-right:10%;
        padding-bottom:20px;
        background-color:<?php echo $commentcolor ?>;
    }
    
    .post-comment{
        padding-top:20px;
        padding-bottom:20px
    }

    .comment-feed{
        display:flex;
        padding-bottom:20px;
        padding-top:20px;
        border-bottom-style:solid;
        border-bottom-color:<?php echo $backgroundcolor ?>;
        border-bottom-width:1px;
    }
    
    .comment{
        width:100%;
        margin-bottom:10px;
    }
    
    #submit-comment{
        height:auto;
        background-color:<?php echo $buttoncolor ?>;
        color:<?php echo $buttontext?>;
        padding:6px;
        border-radius:100px;
        border-style:solid;
        border-color:<?php echo $textcolor?>;
        border-width:1px;
        font-size:16px;
        padding-right:15px;
        padding-left:15px;
        font-weight:bold;
        
    }
    
    #submit-comment:hover{
        cursor:pointer;
        background-color:<?php echo $buttonhover ?>;
    }
    
    .comment-profile-name{
        color:<?php echo $boldcolor?>;
        font-weight:bold;
        display:inline-block;
        font-size:16px;
        padding-bottom:5px;
    }

    .comment-profile-username{
        color:<?php echo $textcolor ?>;
        display:inline-block;
        font-size:14px;
    }

    .comment-feed-content{
        padding-left:10px;
        width:85%;
    }

    .show-more{
        width:100%;
        height:50px;
    }

    .delete-comment-button{
        width:10px;
        height:10px;
    }

    .delete-comment-button:hover{
        cursor:pointer;
    }
/*************** RELIGION MENU ***********/
    .sort-menu{
        font-size:24px;
        padding:20px;
        border-bottom-style:solid;
        border-bottom-color:<?php echo $backgroundcolor ?>;
        border-bottom-width:1px;
        margin-block-start: 0em;
        margin-block-end: 0em;
    }

    .religion-menu-header{
        display:block;
        color:<?php echo $textcolor?>;
    }

    .religion-menu-items{
        height:auto;
        width:200px;
        position:fixed;
        background-color:<?php echo $feedcolor ?>;
        border-radius:5px;
        border-color:<?php echo $menuborder ?>;
        border-width:1px;
        border-style:solid;
        display:none;
        z-index:20;
    }

    .religion-menu-header:hover ul{
        display:block;
    }

    .religion-menu-header:hover{
        cursor:pointer;
        color:<?php echo $linkcolor ?>;
    }

    .religion-menu-item{
        padding:10px;
        color:<?php echo $textcolor ?>;
    }

    .religion-menu-item:hover{
        background-color:<?php echo $backgroundcolor ?>;
        cursor:pointer;
    }
/*************** ACCOUNT SETTINGS ********/
    .account-settings-box{
        height:1000px;
        width:70%;
        background-color:<?php echo $feedcolor ?>;
        margin-left:25px;
        padding:20px;
    }
/*************** RELIGIONS ***************/
    .settings-religions-body{
        height:1000px;
        width:75%;
        background-color:<?php echo $feedcolor ?>;
        padding:20px;
        margin-left:25px;
    }
/*************** MESSAGES ****************/
    .messages-users{
        width:21%;
        background-color:<?php echo $feedcolor ?>;
        max-height:500px;
        border-color: rgba(0,0,0,.3);
        border-style: solid;
        border-width: 1px;
    }

    .messages-feed{
        width:50%;
        background-color:<?php echo $feedcolor?>;
        margin-left:50px;
        border-color: rgba(0,0,0,.3);
        border-style: solid;
        border-width: 1px;
    }

    .msg-user-name-box{
        padding-top:10px;
        padding-bottom:10px;
        border-bottom-color: rgba(0,0,0,.3);
        border-bottom-style: solid;
        border-bottom-width: 1px;
    }

    .msg-name{
        color:#000000;
        font-weight:bold;
        font-size:30px;
        margin:auto;
        display:table;
    }
    
    .msg-convo{
        overflow-y:scroll;
        display:grid;
        padding:10px;
        max-height:500px;
    }

    .compose-message{
        border-top-color: rgba(0,0,0,.3);
        border-top-style: solid;
        border-top-width: 1px;
        height:auto;
        padding:10px;
    }
    
    .compose-message>form{
        display:flex;
    }

    #msg{
        width:80%;
        margin-right:auto;
    }

    .message-preview{
        display:flex;
        padding:10px;
        border-bottom-color: rgba(0,0,0,.3);
        border-bottom-style: solid;
        border-bottom-width: 1px;
    }

    .message-preview:hover{
        background-color:<?php echo $backgroundcolor ?>;
        cursor:pointer;
    }

    .message-preview-content{
        margin-left:10px;
        width:75%;
    }

    .message-preview-msg{
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 100%;
        display: block;
        overflow: hidden;
    }

    .msg-container{
        min-height:50px;
        width:100%;
    }

    .msg-from-me{
        background-color:<?php echo $buttoncolor ?>;
        border-bottom-left-radius:20px;
        border-top-right-radius:20px;
        border-top-left-radius:20px;
        margin-bottom:10px;
        padding:10px;
        color:#ffffff;
        float:right;    
    }

    .msg-to-me{
        background-color:#cccccc;
        margin-bottom:10px;
        padding:10px;
        border-bottom-right-radius:20px;
        border-top-right-radius:20px;
        border-top-left-radius:20px;
        float:left;
    }

    .msg-content{
        max-width:200px;
    }

    .messages-default{
        height:600px;
    }
/*************** MEDIA QUERIES ***********/
    @media screen and (max-width:600px){
        .header{
            display:none;
        }
    }