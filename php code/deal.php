<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/30
 * Time: 19:39
 */
session_start();
header("content-type:text/html;charset=utf-8");
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}

if(isset($_POST["submit"])) {
    @$amount = $_POST['amount'];
    @$gid = $_POST["gid"];
    @$name = $_POST['name'];
    @$price = $_POST["price"];
    @$SID = $_POST["SID"];
    @$SName = $_POST["SName"];
    @$stock = $_POST["stock"];
    @$discount = $_POST["discount"];
    @$info = "购买数量超出该商品库存！商品  ".$name.   "  库存仅为$stock";
}

if(empty($_SESSION["spcar"]))
{
    if($amount <= $stock) {
        $arr = array(array($gid, $amount, $name, $price, $SID, $discount));
        $_SESSION["spcar"] = $arr;
        header("location:spcar.php");
    }
    else{
        echo "<meta charset='UTF-8'>";
        echo"<script>alert('$info');window.location.href = 'goodsshow.php?gid=$gid&name=$name&SName=$SName';</script>";
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
        if($amount > $stock){
            echo "<meta charset='UTF-8'>";
            echo"<script>alert('$info');window.location.href = 'goodsshow.php?gid=$gid&name=$name&SName=$SName';</script>";
            exit;
        }
        for($i=0;$i<count($arr);$i++)
        {
            if($arr[$i][0] == $gid && $amount <= $stock )
            {
                $arr[$i][1] = $amount;
            }
        }
        $_SESSION["spcar"] = $arr;
        header("location:spcar.php");
    }
    else
    {
        if($amount <= $stock) {
            $other = array($gid,$amount,$name,$price,$SID,$discount);
            $arr[] = $other;
            $_SESSION["spcar"]=$arr;
            header("location:spcar.php");
        }
        else{
            echo "<meta charset='UTF-8'>";
            echo"<script>alert('$info');window.location.href = 'goodsshow.php?gid=$gid&name=$name&SName=$SName';</script>";
        }
    }

}
?>