<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
?>
<?php
header("content-type:text/html;charset=utf-8");
$conn=mysqli_connect('localhost','root','') or die("连接失败");
mysqli_select_db($conn,'final') or die('选择数据库失败');
mysqli_query($conn,'set names utf8');

@$username = $_SESSION["username"];
if(isset($_POST["submit1"])) {
    @$recharge = $_POST["recharge"];
    if ($recharge == 0) {
        echo "<script>alert('充值金额不能为零');history.go(-1)</script>";
    }
    else {
    $sql1 = "update user set balance = balance + '$recharge' WHERE username = '$username'";
    $result = mysqli_query($conn, $sql1);
    if ($result) {
        echo "<script>alert('充值成功');window.location.href = 'shop.php';</script>";
    } else {
        echo "<script>alert('充值失败');history.go(-1)</script>";
    }
}
}
?>