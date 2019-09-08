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
@$gid = $_GET["gid"];
@$arr = $_SESSION["spcar"];
@$ids = $_GET["ids"];
@$action = $_GET["action"];
if($action == "delete")
{
    foreach ($arr as $key=>$v)
    {
        if($v[0]==$gid)
        {
            if($v[1]>1){
                $arr[$key][1]-=1;
            }
            else{
                unset($arr[$key]);
            }
        }
    }
    $_SESSION["spcar"] = $arr;
}
elseif($action == "remove")
{
    unset($_SESSION['spcar']);
    echo "<script>alert('购物车已清空，请点击确认键返回商城');window.location.href='shop.php';</script>";
    exit;
}
elseif($action == "confirm"){
    include("DBDA.class.php");
    $db = new DBDA();
    $sql1 = "update detail set  status = '快递已签收' WHERE ids = '$ids'";
    $db->query($sql1,0);
    header('Location:check.php');
    exit;
}
else{
    foreach ($arr as $key => $v) {
        if ($v[0] == $gid) {
            unset($arr[$key]);
        }
    }
    $_SESSION["spcar"] = $arr;
}
header("location:spcar.php");
?>