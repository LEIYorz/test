<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>加入购物车处理</title>
</head>
<?php
$gid = $_GET["gid"];
$name = $_GET["name"];
$price = $_GET["price"];
$SID = $_GET["SID"];
@$stock = $_GET["stock"];
@$action = $_GET["action"];
if(empty($_SESSION["spcar"]))
{
    if($stock == 0)
    {
        echo "<script>alert('添加失败！已超出商品库存');history.back(-1);</script>";
    }else {
        $arr = array(array($gid, 1, $name, $price, $SID));
        $_SESSION["spcar"] = $arr;
        echo "<script>alert('已放入购物车中');history.back(-1);</script>";
    }
}
else
{
    $arr = $_SESSION["spcar"];
    $happen = false;

    foreach ($arr as $v) {
        if ($v[0] == $gid)
        {
            $happen = true;
        }
    }
    if($happen)
    {
        for($i=0;$i<count($arr);$i++)
        {
            if(@$arr[$i][0] == $gid && @$arr[$i][1] < $stock)
            {
                $arr[$i][1] += 1;
            }
            elseif(@$arr[$i][0] == $gid && @$arr[$i][1] >= $stock){
                echo "<script>alert('添加失败！已超出商品库存');history.back(-1);</script>";
                exit;
            }
        }
        $_SESSION["spcar"] = $arr;
        if($action == "goodsshow")
        {
            echo "<script>window.location.href = 'spcar.php';</script>";
        }
        else{
            echo "<script>alert('已放入购物车中');history.back(-1);</script>";
        }
    }
    else
    {
        if($stock == 0){
            echo "<script>alert('添加失败！已超出商品库存');history.back(-1);</script>";
        }else{
            $other = array($gid,1,$name,$price,$SID);
            $arr[] = $other;
            $_SESSION["spcar"]=$arr;
            echo "<script>alert('已放入购物车中');history.back(-1);</script>";
        }
    }
}
?>
</html>
