<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = \"login.php\";</script>";
    exit;
}
else{
    @$username = $_SESSION["username"];
    @$balance = $_SESSION["balance"];
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看购物车</title>
    <style>
        body
        {
            margin:0
        }
        a{
            text-decoration:none;
            color:#3c3c3c;
        }
        clean{
            color:#36c;
        }
        a:hover
        {
            color:white;
        }
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:999;
        }
        header div a{color:#757575}
        .video{
            width: 100%;
            height:100%;
            overflow: hidden;
            position: relative;
        }
        .video video{
            z-index:-999;
            height:1000px;
            min-width:848px;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            opacity:0.5;
        }
        section{
            width:1200px;
            height: 550px;
            margin: 40px auto;
            overflow-y:scroll;
        }
        section::-webkit-scrollbar {
            display: none;
        }
        .goods
        {
            display: inline-block;
            height: 24px;
            line-height: 24px;
            text-align: center;
            border-bottom: 3px solid #b2d1ff;
            font-size: 12px;
            margin-left: 1px;
            vertical-align: bottom;
        }
        h2
        {
            line-height: 25px;
            color: #333;
            font-weight: 700;
            font-size: 25px;
            margin-bottom: 50px;
            margin-top: 60px;
        }
        .photo
        {
            width:64px;
            height:64px;
            margin:0 auto;
        }
        .photo img
        {
            width:64px;
            height:64px;
        }
        p
        {
            text-align: center;
            margin:0px;
            font-size:15px;
        }
        p:hover
        {
            color:orange;
            cursor:pointer;
        }
        .take
        {
            width:100%;
            clear:both;
            margin-top:10px;
            border-top:5px orange solid;
            border-bottom:5px orange solid;
        }
        .take img
        {
            margin-top:15px;
            margin-right:10px;
            float:right;
            transition:all 1s ease 0s;
            border-radius:70px;
        }
        .take img:hover{
            -webkit-transform:rotate(30deg) scale(0.8);
            border-radius: 0;
        }
        h1
        {
            font-size:75px;
            line-height:75px;
            color:#fff;
            animation:light 2s linear 0s infinite alternate;
            margin-top:23px;
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
        .goods
        {
            display: inline-block;
            height: 24px;
            line-height: 24px;
            text-align: center;
            border-bottom: 3px solid #b2d1ff;
            font-size: 12px;
            margin-left: 1px;
            vertical-align: bottom;
        }
        .buy
        {
            color:#3c3c3c;
            width: 120px;
            padding: 10px 0;
            display: inline-block;
            vertical-align:top;
            font: 12px/1.5 tahoma,arial,"b8bf53";
            text-align:center;
            margin-left:1px;
        }
        .order{
            display: inline-block;
            border: 1px solid #f40;
            text-align:right;
            float:right;
            margin-right:40px;
            margin-top:70px;
        }
        .order-shadow{
            border: 3px solid #fff0e8;
            min-width: 230px;
            padding: 10px 10px 10px 20px;
        }
        .next{
            display: inline-block;
            width: 182px;
            height: 39px;
            position: relative;
            vertical-align: middle;
            line-height: 39px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            background: #f40;
            color: #fff;
        }
        .clean{
            display: inline-block;
            margin-right:50px;
            margin-top:2px;
            color:#36c;
        }
        .clean:hover{
            color:#757575;
        }
    </style>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "index.mp4"></video>
    <header>
        <div style="float:left;margin-top:15px;margin-left:15px" class = "font">商城首页 Shopping Index</div>
        <div style="float: right;margin-top:15px;"><a href="cancel.php" style="margin-top:15px;margin-right:100px">注销</a></div>
        <div style="float: right;margin-top:15px;"><a href="shop.php" style="margin-top:15px;margin-right:25px">返回首页</a></div>
        <div style="float: right;margin-top:15px;"><a href="shop.php" style="margin-top:15px;margin-right:25px">你好！<?PHP echo $username?></a></div>
    </header>
    <section>
        <?php
        if(!empty($_SESSION["spcar"]))
        {
            $arr = array();
            $arr = $_SESSION["spcar"];
        }
        include ('DBDA.class.php');
        $db = new DBDA();
        if(!empty($arr)){
            echo "
        <h2>确认订单信息</h2>
        <div style='position:relative;margin-bottom:100px;'>
            <div style='color: #6c6c6c;position:absolute'>
            <div class = 'goods'style='width:255px'>店铺商品</div>
            <div class = 'goods'style='width:255px'>优惠方式</div>
            <div class = 'goods'style='width:120px'>单价</div>
            <div class = 'goods'style='width:120px'>数量</div>
            <div class = 'goods'style='width:120px'>小计</div> 
            <div class = 'goods'style='width:255px'>操作</div>     
            <br>
            </div> 
            </div>
        ";
            foreach ($arr as $v)
            {
                global $db;
                $sql = "select * from goods WHERE gid= '{$v[0]}'";
                $att = $db->query($sql);
                foreach ($att as $a)
                {

                    $subtotal = $a[2]*$v[1];
                    echo "   
                    <span style='font-family:sweet'>店铺：$a[7]</span>              
                    <div style = 'border-top:1px dotted #80b2ff;border-bottom: 1px dotted #80b2ff;margin-bottom:35px;width:1160px'>              
           <div class = 'buy' style='width:255px;text-align:left'title='$v[2]'><img src='$a[3]' width='64' height='64' alt='error'>
           <a href='goodsshow.php?gid=$v[0]&name=$v[2]&SName=$a[7]'>
           <p style='display:inline-block;vertical-align:top'>$v[2]</p></a></div>
           <div class = 'buy' style='width:255px'>$a[8]</div>
           <div class = 'buy' style='width:120px'>$v[3]</div>
           <div class = 'buy' style='width:120px'>$v[1]</div>
           <div class = 'buy' style='width:120px'>$subtotal</div>                                   
           <div class = 'buy' style='width:255px'>
           ";
                    if($v[1] > 1 && $v[1] < $a[4])
                    {
                        echo "<a href='delete.php?gid={$a[0]}&action=delete' style='font-size:15px'><span style='margin-right:20px'>删除</span></a> 
                               <a href='delete.php?gid={$a[0]}' style='font-size:15px'><span style='margin-right:20px'>移除</span></a>
                               <a href='action.php?gid=$a[0]&name=$a[1]&price=$a[2]&SID=$a[6]&stock=$a[4]&action=goodsshow' style='font-size:15px'><span style=''>增加</span>
                               </a> 
                                ";
                    }
                    elseif($v[1] == 1){
                        echo "<a href='delete.php?gid={$a[0]}' style='font-size:15px'><span style='margin-right:50px'>移除</span></a>
                               <a href='action.php?gid=$a[0]&name=$a[1]&price=$a[2]&SID=$a[6]&stock=$a[4]&action=goodsshow' style='font-size:15px'><span>增加</span>
                               </a> 
                               ";
                    }
                    elseif($v[1] == $a[4]){
                        echo "<a href='delete.php?gid={$a[0]}' style='font-size:15px'><span style='margin-right:50px'>移除</span></a>
                               <a href='delete.php?gid={$a[0]}&action=delete' style='font-size:15px'><span>删除</span></a>
                                <p><b style='color:red'>！</b>商品库存为<b style='color:red'> $a[4]</b></p>
                               ";
                    }
           echo"
                </div>  
                </div>
                  ";
                }
            }

            $totalprice=0;
            foreach($arr as $k)
            {
                $k[0];
                $k[1];
                $sql1="select price from goods where gid='{$k[0]}'";
                $total=$db->Query($sql1);
                foreach($total as $n)
                {
                    $totalprice = $totalprice + $n[0]*$k[1];
                }
            }
        }
        elseif(empty($arr))
        {
            echo "<script>window.location.href = 'add.php';</script>";
        }
        ?>
        <div class="order" style="">
            <div class="order-shadow">
                <div>
                    <span style="font-weight:700;color:#333;font-size:12px;line-height:1.5em">实付款(含运费):</span>
                    <span style="font-size: 26px;margin-right:4px;color:#999;font-family:verdana,arial;">￥</span>
                    <span style="color: #f40;font:700 26px tahoma;">
            <?php
            $_SESSION["totalprice"] = @$totalprice;
            echo @$totalprice;
            ?>
                    </span>
                </div>
                <div style="margin-top:10px">
                    <span style="font-weight:700;color:#333;font-size:12px;line-height:1.5em">买家：</span>
                    <span style="font-weight:700;color:#333;font-size:12px;line-height:1.5em">
                         <?php
                         echo $username;
                         ?>
                    </span>
                    <span style="font-weight:700;color:#333;font-size:12px;line-height:1.5em;margin-left:15px">账户余额：</span>
                    <span style="font-size: 12px;color:#999;font-family:verdana,arial;">￥</span>
                    <span style="color:#333;font-size:12px;line-height:1.5em">
                        <?php
                        echo $balance;
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div style="text-align:right;margin-top:195px;margin-right:40px">
            <a href="delete.php?action=remove">
                <div class="clean">清空购物车</div>
            </a>
            <a href="payinfo.php" class="next" >提交订单</a>
        </div>
    </section>
</div>
<!--<div class = "take">-->
<!--    <div style = "display:inline-block"><marquee behavior="scroll" scrollamount = "50" onmouseover ="this.stop()" onmouseout = "this.start()">-->
<!--            <h1 style = "width:1400px">提示:点击右侧按钮进行购买    ☞   下周二将有更多商家与本商城合作，欢迎下次光临😄 </h1></marquee></div>-->
<!--    <a href="payinfo.php"><img src = "buy.png" title = "点击购买"></a>-->
<!---->
<!--</div>-->
</body>
</html>
