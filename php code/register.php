<?php
session_start();
?>
<html>
<head>
    <title>注册页面</title>
    <style type="text/css">
        body
        {
            margin:0;
        }
        td{
            color: white;
        }
        a{
            text-decoration:none;
            color:#ccc;
        }
        a:hover
        {
            text-decoration:underline;
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
        .register
        {
            border:red solid 3px;
            border-radius:5px;
            width:825px;
            margin: 8% auto;
            animation:light 1s linear 0s infinite alternate;
            overflow-y:scroll;
        }
        .register::-webkit-scrollbar {
            display: none;
        }
        form{height:280px;}
        @keyframes light{
            from{
                box-shadow: 0px 0px 10px 2px green;
            }
            to{
                box-shadow: 0px 0px 30px 12px red;
            }
        }
        h1
        {
            margin:0;
            text-align:center;
            color:red;
            animation:light1 2s linear 0s infinite alternate;
        }
        @keyframes light1{
            from{
                text-shadow: 0 0 50px #fff,
                0 0 10px #fff,
                0 0 10px #fff,
                0 0 70px #ff00de,
                0 0 70px #ff00de;
            }
            to{
                text-shadow: 0 0 50px #fff,
                0 0 10px #fff,
                0 0 100px #008000,
                0 0 100px #008000,
                0 0 170px #008000;
            }
        }
        .error
        {
            color:#ccc;
        }
        h4
        {
            color:red;
            text-align:center;
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
    <script>
        function test(str){
            if(str == 1){
                document.getElementById("a").style.display = "table-row";
                document.getElementById("a").required;
                document.getElementById("b").style.display = "table-row";
                document.getElementById("b").required;
                document.getElementById("c").style.display = "table-row";
                document.getElementById("c").required;
                document.getElementById("d").style.display = "table-row";
                document.getElementById("d").required;
                document.getElementById("e").style.display = "table-row";
                document.getElementById("e").required;
            } else {
                document.getElementById("a").style.display = "none";
                document.getElementById("b").style.display = "none";
                document.getElementById("c").style.display = "none";
                document.getElementById("d").style.display = "none";
                document.getElementById("e").style.display = "none";
            }
        }
    </script>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "top.webm"></video>
    <div class = register>
        <h1>注册页面</h1>
        <br>
        <h4>注：*必填字段</h4>
        <form action="register.php" method="post">
            <table border="0" width="100%" style="padding-bottom:40px">
                <tr>
                    <td width="18%">
                    <td width="15%">账号<span class="error">*</span><br></td>
                    <td width="32%">
                        <input type="text" name="username" placeholder="账号不能为空" class = "text" required>
                    </td>
                    <td><span class="error">账号不可以为空</span></td>
                </tr>
                <tr>
                    <td>
                    <td>密码<span class="error">*</span><br></td>
                    <td><input type="password" name="password" placeholder="请输入合法密码" class = "text" maxlength="16" required></td>
                    <td>
                        <span class="error">①密码不可以为空</span>
                        <span class="error">②必须包含字母、数字两种的6~16位组合</span>
                        <span class="error">③不能包括空格</span>
                    </td>
                </tr>
                <tr>
                    <td>
                    <td>再次确认密码<span class="error">*</span><br></td>
                    <td><input type="password" name="confirmpassword" placeholder="请再次确认密码" class = "text" required></td>
                    <td><span class="error">两次密码必须相同</span></td>
                </tr>
                <tr style="height:5px">
                <tr>
                    <td>
                    <td>用户类型<span class="error">*</span><br></td>
                    <td>
                        <label for="user" class="radio" style="margin-left:7px">
                            <span class="radio-bg"></span>
                            <input type="radio" name="type" id="user" value="user" checked="checked" onclick="test(0)"/> 买家
                            <span class="radio-on"></span>
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="seller" class="radio">
                            <span class="radio-bg"></span>
                            <input type="radio" name="type" id="seller" value="seller" onclick="test(1)"/> 商家
                            <span class="radio-on"></span>
                        </label>
                    </td>
                    <td><span class="error">决定该账号的登录类型</span></td>
                </tr>
               <tr style="display: none;" id="a">
                    <td>
                    <td>真实姓名<span class="error">*</span><br></td>
                    <td><input type="text" name="sellername" placeholder="填写真实姓名且不能为空" class = "text" ></td>
                    <td><span class="error">必须填写有效证件的真实姓名</span></td>
                </tr>
                <tr style="display: none;" id="b">
                    <td>
                    <td>店铺名字<span class="error">*</span><br></td>
                    <td><input type="text" name="SName" placeholder="不能为空" class = "text" ></td>
                    <td><span class="error">请为贵店命名</span></td>
                </tr>
                <tr style="display: none;" id="c">
                    <td>
                    <td>年龄<span class="error">*</span><br></td>
                    <td><input type="text" name="age" placeholder="不能为空" class = "text" pattern="^(1[89]|[2-8]\d|90)$" ></td>
                    <td><span class="error">必须符合有效证件上的年龄且申报年龄介于18~90岁之间</span></td>
                </tr>
                <tr style="display: none;" id="d">
                    <td>
                    <td>手机号码<span class="error">*</span><br></td>
                    <td><input type="tel" name="telephone" placeholder="不能为空" class = "text" pattern="^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$" ></td>
                    <td><span class="error">请填写有效电话号码以便客服与您联系</span></td>
                </tr>
                <tr style="display: none;" id="e">
                    <td>
                    <td>店铺地址<span class="error">*</span><br></td>
                    <td><input type="text" name="address" placeholder="不能为空" class = "text" ></td>
                    <td><span class="error">请填写有效联系地址以便客服与您联系</span></td>
                </tr>
                <tr style="height:15px"></tr>
                <tr>
                    <td>
                    <td>
                    <td width="200">
                        &nbsp;&nbsp;<input type="submit" name="submit" class = "btn" value="确定">&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="reset" class = "btn" value="重置" onclick="test(0)">
                    </td>
                    <td>
                        <div>
                        <a href="login.php">点击返回</a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/5/31
 * Time: 16:19
 */
//数据库连接
$conn=mysqli_connect('localhost','root','') or die("连接失败");
mysqli_select_db($conn,'final') or die('选择数据库失败');
mysqli_query($conn,'set names utf8');

@$username = $_POST['username'];
@$password = $_POST['password'];
@$confirmpassword = $_POST['confirmpassword'];
@$type = $_POST['type'];

//构建检查密码合法性的功能函数
function check($password,$confirmpassword)
{
    $checkpassword=preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/',$password);
    if(!$checkpassword)
    {
        echo"<script>alert('您的密码格式不正确！');</script>";
        exit;
    }
    if($password != $confirmpassword)
    {
        echo"<script>alert('两次输入的密码不相同，请重试');</script>";
        exit;
    }
}

function inspect($sellername,$SName,$age,$telephone,$address)
{
    if(empty($sellername)||empty($SName)||empty($age)||empty($telephone)||empty($address))
    {
        echo"<script>alert('必填字段不能为空！');history.back(-1);</script>";
        exit;
    }
}


if(isset($_POST['submit'])) {
    check($password, $confirmpassword);
    if ($type == "user") {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "<script>alert('此账户已经存在！')</script>";
            exit;
        } else {
                $sql1 = "INSERT INTO user VALUES('$username','$password','1000000')";
                $result1 = mysqli_query($conn, $sql1);
                if ($result1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['type'] = $type;
                    echo "<script>window.location.href = 'register1.php';</script>";
                } else {
                    echo "<script>alert('注册失败！请重试')</script>";
                    exit;
                }
            }
    }
    elseif ($type == "seller") {
        @$sellername = $_POST["sellername"];
        @$SName = $_POST["SName"];
        @$age = $_POST["age"];
        @$telephone = $_POST["telephone"];
        @$address = $_POST["address"];

        inspect($sellername,$SName,$age,$telephone,$address);
        $sql2 = "SELECT * FROM seller WHERE username = '$username' OR SName = '$SName'";
        $result2 = mysqli_query($conn, $sql2);
        $row1 = mysqli_fetch_assoc($result2);
        if ($row1) {
            echo "<script>alert('此账户或店铺名已经存在！')</script>";
            exit;
        } else {
            $sql3 = "INSERT INTO seller VALUES('','$sellername','$username','$password','$SName','$age','$telephone','$address')";
            $result3 = mysqli_query($conn, $sql3);
            if ($result3) {
                $_SESSION['username'] = $username;
                $_SESSION['type'] = $type;
                echo "<script>window.location.href = 'register1.php';</script>";
            } else {
                echo "<script>alert('注册失败！请重试')</script>";
                exit;
            }
        }
    }
}
?>

