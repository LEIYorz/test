<?php
session_start();
header("content-type:text/html;charset=utf-8");
if(!empty($_SESSION["username"]))
{
    echo "<script>alert('您已登录！');window.location.href = \"shop.php\";</script>";
    exit;
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录页面</title>
    <style>
        body{
            margin:0;
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
        .login{
            border: #999 solid 3px;
            border-radius:16px;
            width: 650px;
            margin-top:225px;
            position: absolute;
            /*left:auto;*/
            right:15px;
            margin-right:0;
            top:0;
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:998;
        }
        .font
        {
            font:bold 20px/100% "微软雅黑","Lucida Sans";
            animation:light 2s linear 0s infinite alternate;
            color:#FFF;
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
        h1{
            margin:0;
            text-align:center;
            color: red
        }
        a{
            text-decoration:none;
            color:#ccc;
        }
        .show{
            color:white;
            position:absolute;
            font-size: 100px;
            left:55px;
            top:225px;
        }
        .show1{
            color:white;
            position:absolute;
            left:235px;
            top:425px;
        }
        .text
        {
            background-color:rgba(255,255,255,0.1) ;
            border:none;
            border-radius:15px;
            outline:none;
            color:#fff;
            padding:10px;
            margin:5px;
            font-size:17px;
        }
        td
        {
            color:#f4f4f4;
        }
        .btn
        {
            color: #d9eef7;
            border: solid 1px #0076a3;
            background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
            cursor:pointer;
            outline:none;
            margin: 0 2px;
            text-align: center;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.3);
            box-shadow: 10px 10px 50px rgba(0,0,0,.2);
            border-radius:8px;
        }
        .btn:hover
        {
            background: #007ead;
            background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
            background: -moz-linear-gradient(top, #0095cc, #00678e);
        }
        .radio{
            display: inline-block;
            position: relative;
            line-height: 18px;
            margin-right: 10px;
            cursor: pointer;
        }
        .radio input{
            display: none;
        }
        .radio .radio-bg{
            display: inline-block;
            height: 18px;
            width: 18px;
            margin-right: 5px;
            padding: 0;
            background-color: #45bcb8;
            border-radius: 100%;
            vertical-align: top;
            box-shadow: 0 1px 15px rgba(0, 0, 0, 0.1) inset, 0 1px 4px rgba(0, 0, 0, 0.1) inset, 1px -1px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .radio .radio-on{
            display: none;
        }
        .radio input:checked + span.radio-on{
            width: 10px;
            height: 10px;
            position: absolute;
            border-radius: 100%;
            background: #FFFFFF;
            top: 4px;
            left: 4px;
            box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.3), 0 0 1px rgba(255, 255, 255, 0.4) inset;
            background-image: linear-gradient(#ffffff 0, #e7e7e7 100%);
            transform: scale(0, 0);
            transition: all 0.2s ease;
            transform: scale(1, 1);
            display: inline-block;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #333;
        }
    </style>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "top.webm"></video>
    <header>
        <div style="float:left;margin-top:15px;margin-left:15px"><a href="shop.php" class="font" title="点击跳转商城首页">商城首页 Shopping Index</a></div>
    </header>
        <h1 class = "show">购 &nbsp;&nbsp;物&nbsp;&nbsp;中&nbsp;&nbsp;心 </h1>
        <h1 class = "show1">由 &nbsp;&nbsp;此 &nbsp;&nbsp;开 &nbsp;&nbsp;始</h1>
    <div class = login>
        <form action="login.php" method="post" style="margin-top:10px;margin-bottom:0">
            <h1 style = "padding-left:28px ">登录页面</h1>
            <br>
            <table border="0" width="100%">
                <tr>
                    <td width="20%">
                    <td>账号</td>
                    <td width = "40%"><input type="text" name="username" placeholder="请输入账号" class = "text" required></td>
                </tr>
                <tr>
                    <td>
                    <td>密码</td>
                    <td><input type="password" name="password" placeholder="请输入密码" class = "text" required></td>
                </tr>
                <tr>
                    <td>
                    <td>验证码</td>
                    <td><input type="text" name="text" maxlength = "4" class = "text" placeholder="不区别大小写" required>
                    </td>
                    <td>
                        <img src="Code.php" align="absmiddle" style="cursor:pointer" title = "点击刷新"onClick="this.src='Code.php?'+Math.random();" alt="看不清，换一张" >
                    </td>
                </tr>
                <tr style="height:8px;"></tr>
                <tr>
                    <td>
                    <td>用户类型</td>
                    <td>
                        <label for="user" class="radio" style="margin-left:7px">
                            <span class="radio-bg"></span>
                            <input type="radio" name="type" id="user" value="user" checked="checked"/> 用户
                            <span class="radio-on"></span>
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="seller" class="radio">
                            <span class="radio-bg"></span>
                            <input type="radio" name="type" id="seller" value="seller"/> 商家
                            <span class="radio-on"></span>
                        </label>
                    </td>
                </tr>
                <tr style="height:10px;"></tr>
                <tr>
                    <td colspan="3" height = "50px">
                        <div style = "float: right ">
                        <input type="submit" name="submit" class = "btn" value="登录">&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="reset" class = "btn" value="重置">
                        </div>
                    </td>
                    <td style="padding-left:50px"><a href="register.php">免费注册</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include("DBDA.class.php");//导入数据库
$db = new DBDA();//新建数据库连接
@$username = $_POST["username"];
@$password = $_POST["password"];
@$type = $_POST['type'];
if($type=="user")
{
    $sql = "select password from user WHERE username = '$username' AND password= '$password'";
    $arr = $db->Query($sql);
    if (!$arr) {
        echo "<script>alert('账号、密码或用户类型错误！');</script>";
        return;
    }elseif(strtolower($_POST['text']) != strtolower($_SESSION["code"])) {
        echo "<script>alert('验证码输入错误！请重试');</script>";
        return;
    }else{
        $_SESSION['username'] = $username;
        echo "<script> window.location.href = 'shop.php';</script>";
    }
}
else if($type=="seller")
{
    $sql = "select password from seller WHERE username = '$username' AND password= '$password'";
    $arr = $db->Query($sql);
    if (!$arr) {
        echo "<script>alert('账号、密码或用户类型错误！');</script>";
        return;
    }elseif(strtolower($_POST['text']) != strtolower($_SESSION["code"])) {
        echo "<script>alert('验证码输入错误！请重试');</script>";
        return;
    }else{
        $_SESSION['username'] = $username;
        $sql1 = "select * from seller WHERE username = '$username'";
        $seller = $db->Query($sql1);
        $_SESSION["sellername"] = $seller[0][1];
        $_SESSION["SID"] = $seller[0][0];
        echo "<script> window.location.href = 'manage.php?action=1';</script>";
    }
}
?>
</body>
</html>