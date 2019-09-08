<?php
session_start();
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
else{
    $name = $_SESSION["username"];
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>注册成功</title>
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
<h1>恭喜你注册成功！</h1>
<p>正在加载页面，请稍后……</p>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/3
 * Time: 10:52
 */
$type = $_SESSION["type"];
if($type == "user")
{
    header("Refresh:2;url=shop.php");
}
elseif($type == "seller")
{
    $conn=mysqli_connect('localhost','root','') or die("连接失败");
    mysqli_select_db($conn,'final') or die('选择数据库失败');
    mysqli_query($conn,'set names utf8');
    $sql = "SELECT SID FROM seller WHERE username = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $SID = $row["SID"];
    $_SESSION["SID"] = $SID;
    header("Refresh:2;url=manage.php?action=1");
}
?>