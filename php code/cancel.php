<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/19
 * Time: 13:15
 */
session_start();
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = \"login.php\";</script>";
    exit;
}
else{
    session_destroy();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>注销成功</title>
    <style>
        body
        {
            margin:0;
        }
        h1
        {
            color:red;
            text-align:center;
            margin:15% auto 0 auto;
            font-size:75px;
        }
        p
        {
            text-align:center;
            color:white;
        }
        .video{
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }
        .video video{
            z-index: -999;
            width: 100%;
            min-width: 848px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "top.webm"></video>
    <h1>注销成功</h1>
    <p>3秒后返回登录页面，请稍后……</p>
</div>
</body>
</html>
<?php
header("Refresh:3;url=login.php");
?>
