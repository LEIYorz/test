<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/17
 * Time: 12:53
 */
session_start();
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
@$content = $_POST["content"];
@$receiver = $_POST["receiver"];
@$sender = $_SESSION["username"];
@$action = $_POST["action"];
@$r_store = $_POST["r_store"];
@$direction = "send to $r_store";
@$behavior = $_GET["behavior"];
$time = time();
$time = date("Y-m-d h:i:s ", $time);

include ("DBDA.class.php");
$db = new DBDA();
if ($action == "买家") {
    $sql = "select * from seller WHERE sellername = '" . $receiver . "'AND SName = '$r_store'";
    $arr = $db->Query($sql);
    if (!$arr && empty($arr)) {
        echo "<meta charset='UTF-8'>";
        echo "<script>alert('只能与现有商家联系哦！');history.back(-1);</script>";
    } else {
        $sql1 = "insert into communication VALUES ('null','$time','$sender','$receiver','$content','$direction')";
        $arr = $db->query($sql1, 0);
        if ($arr && !empty($arr)) {
            echo "<meta charset='UTF-8'>";
            echo "<script>alert('信息发送成功!');history.back(-1);</script>";
        } else {
            echo "<meta charset='UTF-8'>";
            echo "<script>alert('信息发送失败!');history.back(-1);</script>";
        }
    }
}
elseif($behavior == "deletecontent"){
    $id = $_GET["id"];
    $sql2 = "Delete from communication WHERE id = '$id'";
    $db->Query($sql2,0);
    echo "<meta charset='UTF-8'>";
    echo "<script>alert('信息删除成功！');window.location.href='shop.php';</script>";
}
?>