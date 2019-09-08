<?php
session_start();
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <style type="text/css">
        .display
        {
            border:2px red dotted;
            width:980px;
        }
    </style>
</head>
<body>
<?php
@$gid = $_GET["gid"];
@$action = $_GET["action"];
@$identity = $_POST["identity"];
@$name = $_GET["name"];
@$OID = $_GET["OID"];
include ("DBDA.class.php");
$db = new DBDA();

if($action == "确定上架") {
    @$introduce = $_GET["introduce"];
    @$price = $_GET["price"];
    @$picture = $_GET["picture"];
    @$spicture = $_GET["picture_one"];
    @$tpicture = $_GET["picture_two"];
    @$amount = $_GET["amount"];
    @$SID = $_GET["SID"];
    @$seller = $_GET["seller"];
    @$SName = $_GET["SName"];
    @$discount = $_GET["discount"];
    @$kind = $_GET["kind"];
    @$info = "商品  ".$name.   "  上架成功!";
    $fpicture = "goods/$picture";
    $s_picture = "photo/$spicture";
    $t_picture = "photo/$tpicture";

    $sql3 = "insert into goods VALUES ('','$name','$price','$fpicture','$amount','$seller','$SID','$SName','$discount','$introduce','$s_picture','$t_picture','$kind')";
    $db->query($sql3,0);
    echo "<script>alert('$info');history.back(-1);</script>";
    }
elseif($action == "taking"){
    $sql1 = "update detail set status = '商品等待揽件' WHERE `name` =  '".$name."' AND OID = $OID";
    $db->query($sql1,0);
    echo "<script>alert('处理成功，已通知买家');history.back(-1);</script>";
}
elseif($action == "delete"){
    $info1 = "商品  ".$name.   "  下架成功";
    $sql5 = "Delete from goods WHERE GID = '$gid'";
    $db->query($sql5,0);
    echo "<script>alert('$info1');history.back(-1);</script>";
}
elseif($action == "确定更换"){
    @$cgid = $_GET["cgid"];
    @$cname = $_GET["cname"];
    @$oname = $_GET["oname"];
    @$cprice = $_GET["cprice"];
    @$cphoto = $_GET["cphoto"];
    @$c_sphoto = $_GET["csphoto"];
    @$c_tphoto = $_GET["ctphoto"];
    @$camount = $_GET["camount"];
    @$rphoto = $_GET["rphoto"];
    @$r_sphoto = $_GET["rsphoto"];
    @$r_tphoto = $_GET["rtphoto"];
    @$rkind = $_GET["rkind"];
    @$tip = "商品  ".$oname.   "  信息更改成功!";
    if(!empty($cphoto)){
        $exphoto = "goods/$cphoto";
    }else{
        $exphoto = $rphoto;
    }
    if(!empty($c_sphoto)){
        $exsphoto = "photo/$c_sphoto";
    }else{
        $exsphoto = $r_sphoto;
    }
    if(!empty($c_tphoto)){
        $extphoto = "photo/$c_tphoto";
    }else{
        $extphoto = $r_tphoto;
    }
    $sql4 = "update goods set `name` = '$cname',price = '$cprice',picture = '$exphoto',amount = '$camount',second_picture = '$exsphoto',third_picture = '$extphoto',kind = '$rkind' WHERE GID = '".$cgid."'";
    $db->query($sql4,0);
    echo "<script>alert('$tip');window.location.href='manage.php?action=2';</script>";
}
elseif($identity == "卖家"){
    $receiver = $_POST["receiver"];
    $message = $_POST["message"];
    $sender = $_SESSION["sellername"];
    $store = $_POST["store"];
    $time = time();
    $time = date("Y-m-d h:i:s ", $time);

    if($receiver != "客服") {
        $sql6 = "select * from user WHERE username = '" . $receiver . "'";
        $arr = $db->Query($sql6);
        if (!$arr && empty($arr)) {
            echo "<script>alert('只能与已注册的用户或者客服联系哦！');history.back(-1);</script>";
        }
        else{
            $sql7 = "insert into communication VALUES ('null','$time','$sender','$receiver','$message','$store')";
            $arr = $db->query($sql7, 0);
            if ($arr && !empty($arr)) {
                echo "<script>alert('信息发送成功!');window.location.href='manage.php?action=5';</script>";
            } else {
                echo "<script>alert('信息发送失败!');history.back(-1);</script>";
            }
        }
    }
    else{
        $sql8 = "insert into communication VALUES ('null','$time','$sender','客服','$message','1')";
        $db->Query($sql8,0);
        echo "<script>alert('信息发送成功！');window.location.href='manage.php?action=5';</script>";
    }
}
elseif($action == "deletemessage"){
    $id = $_GET["id"];
    $sql9 = "Delete from communication WHERE id = '$id'";
    $db->Query($sql9,0);
    echo "<script>alert('信息删除成功！');window.location.href='manage.php?action=5';</script>";
}
else{
    if(isset($_POST["change"])) {
        $SName = $_POST["SName"];
        $sellername = $_POST["sellername"];
        $age = $_POST["age"];
        $telephone = $_POST["telephone"];
        $address = $_POST["address"];
        $SID = $_POST["SID"];

        $sql2 = "update seller set SName = '$SName',sellername = '$sellername',age = '$age',telephone = '$telephone',address = '$address' WHERE SID =  '".$SID."'";
        $db->query($sql2,0);
        $sql10 = "update goods set SName = '$SName',seller = '$sellername' WHERE SID =  '".$SID."'";
        $db->query($sql10,0);
        echo "<script>alert('店铺信息已更改成功');window.location.href='manage.php?action=1';</script>";


    }
}
?>

</body>
</html>