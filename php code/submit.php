<html>
<head>
    <meta charset="UTF-8">
    <title>提交页面</title>
</head>
<?php
session_start();
include ("DBDA.class.php");
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
?>
<body>
<?php

$db = new DBDA();
@$username = $_SESSION["username"];
@$totalprice = $_SESSION["totalprice"];
$sql = "select balance from user WHERE username = '$username'";
$left = $db->query($sql);
@$left[0][0];

@$recipients = $_POST["recipients"];
@$address = $_POST["r_address"];
@$express = $_POST["express"];
@$payway = $_POST["payway"];

//$ann=array();
if(!empty($_SESSION["spcar"])) {
    $ann = $_SESSION["spcar"];
}
else{
    header("Location:add.php");
    exit;
}


if($left[0][0]>=$totalprice || $payway == "支付宝"|| $payway == "微信")
{
    foreach($ann as $v)
    {
        $sql2 = "select `name`,amount from goods WHERE gid='{$v[0]}'";
        $number = $db->query($sql2);
        $number[0][1];
        if($number[0][1]<$v[1])
        {
            echo "<script>alert('{$number[0][0]} 库存不足');history.go(-1)</script>";
            exit;
        }
    }
    if($payway == "商城账户"){
        $sql3 = "update user set  balance = balance-{$totalprice} WHERE username = '$username'";
        $db->query($sql3,0);
    }
    foreach($ann as $v)
    {
        $sql4 = "update goods set amount = amount-{$v[1]} WHERE gid='{$v[0]}'";//商品
        $db->query($sql4,0);
    }

    $OID = date("YmdHis");
    $time = time();
    $time = date("Y-m-d h:i:sa ", $time);
    $sql6 = "insert into Order_G VALUES ('$OID','$time','$username','$recipients','$totalprice','$payway','$address')";
    $db->query($sql6, 0);


    foreach ($ann as $v) {
        $subtotal = $v[3]*$v[1];
        $sql7 = "insert into Detail VALUES ('NULL','$OID','$v[2]','{$v[1]}','$v[3]','$v[4]','$subtotal','商品等待出库')";
        $db->query($sql7, 0);
    }
    header("Location:success.php");
}
else
{
    header("Location:fail.php");
}
?>
</body>
</html>