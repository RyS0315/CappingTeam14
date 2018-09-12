<?php
    header("Content-type: text/css; charset: UTF-8");
    $theme = [
        'Light'=>['background'=>'#eeeeee',
                  'text'=>'rgba(0,0,0,.65)',
                  'boxcolor'=>'#feeefe',
                  'link'=>'rgba(200,0,200,.65)'],
        'Dark' =>['background'=>'#141d26', 
                  'text'=>'rgba(255,255,255,.65)',
                  'boxcolor'=>'#1b2836']
    ];
    $chosen='Light';
    $backgroundcolor = $theme[$chosen]['background'];
    $boxcolor = $theme[$chosen]['boxcolor'];
    $textcolor = $theme[$chosen]['text'];
    $linkcolor = $theme[$chosen]['link'];
?>
/*************** COMMON ******************/
    body{
        margin:0px;
        background-color:<?php echo $backgroundcolor ?>;
    }
    ::placeholder{
        color:rgba(0,0,0,.4);
    }

    p{
        color:<?php echo $textcolor?>;
    }

    input{
        margin-bottom:10px;
        width:70%;
        height:35px;
        border-color:rgb(0,0,0,.15);
        border-radius:5px;
        text-indent: 5px;
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
        min-height: 40px;
        max-height: 100px;
        width:95%;
        margin:2.5%;
        border-color:#1DA1F2;
        font-size:16px;
        border-radius:7px;
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
        padding-right:5px;
        padding-left:5px;
    }

    .hidden{
        display:none;
    }
/*************** HEADER ******************/
    .header{
        height:50px;
        width:100%;
        border-bottom-style:solid;
        border-bottom-width:1px;
        border-bottom-color:rgba(0,0,0,.5);
        background-color:<?php echo $boxcolor ?>;
        position:fixed;
    }
    
    .header-box{
        width:85%;
        margin:auto;
        display:flex;
        height:calc(100% - 16px);
    }
    
    .header-link>a{
        color:<?php echo $textcolor ?>;
        text-decoration:none;
        font-size:18px;
        text-align: center;
        display:inline-block;
        height:100%;
        width:100%;
    }
    
    .header-link{
        height:100%;
        width:100px;
        border-bottom-style:solid;
        border-bottom-color: <?php echo $linkcolor ?>;
        border-bottom-width: 1px;
    }
    
    .header-link:hover{
        height:calc(100% - 1px);
        border-bottom-width:3px;
        border-bottom-color: <?php echo $linkcolor ?>;
    }
    
    .active{
        height:calc(100% - 1px);
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
        padding-left:40%;
    }

    #header-profile-pic-link:hover{
        cursor:pointer;
    }

    .index-profile-pic{
        border-radius: 50%;
        height: 45px;
        width: 45px;
        border: 3px solid <?php echo $boxcolor?>;
        color: #fff;
        transform: translateY(-40%);
    }

    .index-profile-pic:hover{
        border-color:<?php echo $linkcolor ?>;
    }

    #header-profile-menu{
        height:250px;
        width:200px;
        position:fixed;
        margin-top:50px;
        margin-left:71%;
        background-color:#ffffff;
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
        background-color:#f5f8fa
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
        color:#ffffff;
        font-size: 1rem;
        margin-right:10px;
        background-color: #1da1f2;
        border-style:solid;
        border-width:2px 3px 2px 3px;
        border-left-color:rgba(0,0,0,.3);
        border-right-color:rgba(0,0,0,.3);
        border-top-color:rgba(0,0,0,.5);
        border-bottom-color:rgba(0,0,0,.5);
        border-radius: 10px;
    }

    .submit-button:hover{
        background-color:#006dbf;
        border-color:#006dbf;
        cursor:pointer;
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
        width:85%;
        margin:auto;
        height:auto;
        padding-bottom:25px;
        padding-top:60px;
        
    }

    .index-left-box{
        width:25%;
        display:block;
        height:600px;
        background-color: <?php echo $boxcolor ?>;
    }

    .index-profile-stats{
        margin-top:10px;
        height:auto;
        background-color: <?php echo $boxcolor ?>;
        width:85%;
        margin:auto;
    }

    .index-center-box{
        width:52%;
        margin-left:10px;
        background-color: #ffffff;
        margin-right:10px;
        height:2000px;
    }

    .index-right-box{
        width:25%;
        background-color: <?php echo $boxcolor ?>;
        height:auto;
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
