<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = \"login.php\";</script>";
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>请添加购物车</title>
    <style>
        body
        {
            margin:0;
        }
        a
        {
            text-decoration:none;
            color:#757575;
        }
        a:hover{color:white}
        .video
        {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }
        .video video
        {
            z-index: -999;
            width: 100%;
            min-width: 848px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:998;
            top:0;
        }
        .font
        {
            font:bold 20px/100% "微软雅黑","Lucida Sans";
            animation:light 2s linear 0s infinite alternate;
            color:#FFF;
        }
        .cart
        {
            margin-top:275px;
            margin-left:150px;
            font-size:65px;
        }
        .cart a{
            color:#fff;
            animation:light 2s linear 0s infinite alternate;
        }
        .photo
        {
            width:96px;
            height:96px;
            display:inline-block;
            vertical-align:middle;
            margin-right:150px;
            padding-bottom:15px;
        }
        @-webkit-keyframes light {
            from{
                text-shadow:0 0 50px #fff,
                0 0 10px #fff,
                0 0 10px #fff,
                0 0 70px #ff00de,
                0 0 70px #ff00de;
            }
            to{
                text-shadow:0 0 50px #fff,
                0 0 10px #fff,
                0 0 100px #008000,
                0 0 100px #008000,
                0 0 170px #008000;
            }
        }
    </style>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "index.mp4"></video>
    <div class = "cart">
        <a href= "shop.php"><div class = "photo"><img src="spcar.ico"></div>购物车为空，请先添加购物车！</a>
    </div>
    <header>
        <div style="float:left;margin-top:15px;margin-left:15px" class = "font">商城首页 Shopping Index</div>
        <?php
        if(!empty($_SESSION["username"])){
            @$a = $_SESSION["username"];
            echo"
                <div style='float: right;margin-right:100px;margin-top:15px'><a href='cancel.php' style='margin-top:15px;'>注销</a></div>
                <div style='float: right;margin-right:50px;margin-top:15px'><a href='shop.php' style='margin-top:15px;'>返回首页</a></div>
                <div style='float: right;margin-right:25px;margin-top:15px'><a href='check.php' style='margin-top:15px;'>订单详情</a></div>
        <div style='float: right;margin-right:25px;margin-top:15px'><a href='#' style='margin-top:15px;'>你好！$a</a></div>       
                ";
        }
        else
        {  echo"
                <div style='float: right;margin-right:100px'><a href='login.php' style='margin-top:15px;'>登录</a></div>";
        }
        ?>
    </header>
</div>
</body>
</html>