<?php
session_start();
header("content-type:text/html;charset=utf-8");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>搜索结果</title>
    <style type="text/css">
        body
        {
            margin: 0;
            padding: 0;
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
        section{
            width:1120px;
            height:550px;
            margin: 40px auto;
            margin-bottom:5px;
            overflow-y:scroll;
        }
        section::-webkit-scrollbar {
            display: none;
        }
        .top{
            float: right;
            position: relative;
            width: 190px;
            height: 34px;
            border: 1px solid #ccc;
            margin-right: 32px;
            text-align: center;
            line-height: 34px;
            border-radius: 4px;
            transition: all .3s linear;
            -moz-transition: all .3s linear;
            -webkit-transition: all .3s linear;
            background-color:orange;
            top:15px;
        }
        .top a{
            color: #d00;
        }
        .top:hover{
            width: 210px;
            color: #fff;
            font-weight: bold;
            background-color: #d00;
            border-radius: 6px;
        }
        .top:hover a{
            color: #fff;
        }
        .top:hover span{
            background-color: #fff;
            color: #d00;
        }
        .top:hover .star{
            right:150px;
            top: 0;
            font-size: 14px;
            color: #ff0;
            transform: rotate(1080deg);
            z-index:0;
        }
        .top span{
            position: absolute;
            top:2px;
            right: 40px;
            width: 18px;
            height: 18px;
            font-weight: bold;
            border-radius: 9px;
            line-height: 18px;
            text-align: center;
            font-size: 12px
            color: #fff;
        }
        .star{
            color: #fff;
            font-size: 48px;
            font-style: normal;
            position: absolute;
            right:530px;
            top:186px;
            transform: rotate(60deg);
            transition: all .3s ease;
            position:absolute;
            z-index:-1;
        }
        .on{
            background-color: #e00;
        }
        .list{
            margin: 20px 20px;
            padding: 36px 0;
            list-style: none;
        }
        a{
            display: block;
            color: #757575;
            text-decoration: none;
        }
        a:hover
        {
            color:white;
        }
        .list li{
            float: left;
            height: 246px;
            width: 234px;
            padding: 10px 0 20px;
            margin-right:12px;
            margin-top: 20px;
            border: 3px solid #ccc;
            -webkit-transition: all .2s linear;
            transition: all .2s linear;
        }
        .list li:hover{
            box-shadow: 7px 4px 5px #aaa;
        }
        .figure{
            width: 150px;
            height: 150px;
            margin: 0 auto 18px;
        }
        .title{
            color: #222;
            font-size: 14px;
            font-weight: normal;
            text-align: center;
        }
        .price{
            margin: 0 10px 10px;
            text-align: center;
            color: #ff6700;
        }
        .cart{
            margin: 0 15px 5px;
            text-align: center;
        }
        .cart a{
            color: #a34;
            width: 190px;
            height: 24px;
            border-radius: 4px;
            margin: 0 8px 5px;
            text-align: center;
        }
        .cart a:hover{
            color: #eee;
            box-shadow: 0 2px 1px #333,0 2px 1px #666;
            background-color: #ccc;
            background-image: linear-gradient(#33a6b8,#0089a7)
        }
        .num{
            text-align: center;
            color: #ff6700;
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:998;
        }
        #information{
            position:absolute;
            z-index:999;
            top:42px;
            right:50px;
            display:none;
            background:rgba(255,255,255,0.8);
            border:1px #ccc dashed;
            border-radius:5px;
        }
        .none
        {
            border:none;
            background:rgba(255,255,255,0.0);
            width:95px;
            font-size:15px;
        }
        form p
        {
            margin:10px 5px;
        }
        form p:hover
        {
            color:orange;
        }
        .fpage
        {
            font-family:sweet;
            font-size:18px;
            text-align: center;
        }
        .go{
            font-family:sweet;
            border-radius:9px;
            background-color:rgba(255,255,255,0.5);
            color:#3c3c3c;
            margin-left:10px;
        }
        .go:hover{
            color:black;
            background-color:rgba(255,255,255,0.9);
        }
        .video .fpage a{display:inline}
        .submit1
        {
            background:rgba(255,255,255,0.5);
            outline:none;
            border:none;
        }
        .btn
        {
            color: #d9eef7;
            border: solid 1px #d2729e;
            background: -webkit-gradient(linear, left top, left bottom, from(#feb1d3), to(#f171ab));
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
            background: #ba4b58;
            background: -webkit-gradient(linear, left top, left bottom, from(#cf5d6a), to(#a53845));
            background: -moz-linear-gradient(top, #cf5d6a, #a53845);
        }
        span
        {
            font-size:10px;
            color:red;
            margin:0 5px;
            white-space:nowrap;
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
        .hidden{display:none}
        .personal
        {
            display: inline-block;
            cursor: pointer;
        }
        .personal:hover{background:rgba(255,255,255,0.8)}
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        .p1{
            color:black;
            font-size:18px;
            font-family:sweet;
        }
        b{
            font-family:sweet;
        }
        .search
        {
            display: inline-block;
            text-align: left;
            height: 40px;
            width: 335px;
            font-size: 14px;
            margin-left: 100px;
            margin-top: 4px;
            border-radius: 15px;
            box-shadow: 0 2px 8px 0 rgba(90,90,90,.1);
            background-color: rgba(255,255,255,.2);
        }
        .i-location
        {
            margin: 0 185px 0 20px;
            border: 0 none;
            background: rgba(255,255,255,0);
            padding: 5px;
            13px: ;
            width: 277px;
            height: 30px;
            color: #999;
            line-height: 20px;
            font-size: 14px;
            outline: none;
            width: 195px;
            height: 100%;
            font: 16px/1.5 PingFangSC-Regular,Tahoma,'Microsoft Yahei',sans-serif;
        }
        .btn2
        {
            display: block;
            width: 106px;
            height: 40px;
            position: absolute;
            background: linear-gradient(to right,#ff850b 0,#ff5945 100%);
            top: 5px;
            left: 650px;
            border: none;
            outline: none;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
        }
        .search .btn2 span
        {
            color: #fff;
            font-size: 16px;
            line-height: 40px;
        }
        .photo
        {
            width:96px;
            height:96px;
            display:inline-block;
            vertical-align:middle;
            text-align: center;
            margin-left:50px;
            margin-right:50px;
            padding-bottom:15px;
        }
        .cartword
        {
            font-size:53px;
            width:100%;
            margin:175px auto;
            color:#757575;
        }
    </style>
    <script type= "text/javascript">
        window.onload = function()
        {
            var oDiv1 = document.getElementById('check');
            var oDiv2 = document.getElementById('information');
            var timer = null;
            oDiv2.onmouseover = oDiv1.onmouseover = function()
            {
                clearTimeout(timer);
                oDiv2.style.display = 'block';
            }
            oDiv2.onmouseout = oDiv1.onmouseout = function()
            {
                timer = setTimeout(function () {
                    oDiv2.style.display = 'none';
                },200);
            }
        }
        function showDiv(str) {
            var divs = [];
            for(var i = 0;i < 2;i++) {
                divs[i] = document.getElementById("div" + i);
                divs[i].style.display = "none";
            }
            document.getElementById(str).style.display = "block";
        }
    </script>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "index.mp4"></video>
    <header>
        <div style="float:left;margin-top:15px;margin-left:15px" class = "font">商城首页 Shopping Index</div>
        <div class="search">
            <form action = "search.php" method="get">
                <input type ="text" class = "i-location" placeholder = "搜索商品" name = "key" value="<?PHP echo $_GET["key"]?>">
                <button type = "submit" class = "btn2"><span>搜索</span></button>
            </form>
        </div>
        <?php
        if(!empty($_SESSION["username"])){
            @$a = $_SESSION["username"];
            echo"
                <div style='float: right;margin-right:100px'><a href='cancel.php' style='margin-top:15px;'>注销</a></div>
                <div style='float: right;margin-right:50px;'><a href='shop.php' style='margin-top:15px;'>返回首页</a></div>
        <div style='float: right;margin-right:25px'><a href='#' id = 'check' style='margin-top:15px;'>个人账户</a></div>
        <div style='float: right;margin-right:25px;'><a href='#' style='margin-top:15px;'>你好！$a</a></div>        
                ";
        }
        else
        {  echo"
               <div style='float: right;margin-right:50px;'><a href='shop.php' style='margin-top:15px;'>返回首页</a></div>
                <div style='float: right;margin-right:50px'><a href='login.php' style='margin-top:15px;'>登录</a></div>";
        }
        ?>


    </header>
    <section>
        <div class='top'>
            <a href="spcar.php">我的购物车</a></span>
            <em class='star'>★</em>
        </div>
        <ul class="list" style="margin-left:8%;margin-top:20px">
            <?php
            /**
             * Created by PhpStorm.
             * User: Administrator
             * Date: 2018/5/16
             * Time: 14:53
             */
            include ("DBDA.class.php");
            $db = new DBDA();
            $tj1 = " 1=1 ";
            if(!empty($_GET["key"]))//获取提交的关键字
            {
                $tj1 = " name like '%{$_GET['key']}%'";
            }


            $sall = "select count(*) from goods where {$tj1}";//把条件拼接到语句中
            $total = $db->StrQuery($sall);

            include("page.class.php");
            $page = new page($total,8);

            $sql = "select * from goods where {$tj1} ".$page->limit;//这里也要加上搜索条件
            $attr = $db->Query($sql);
            if(!$attr){
                echo"
                <div class = 'cartword'>
                     <div class = 'photo'><img width='95px' src='photo/regret.png'></div>没有符合相关搜索条件的商品
                     </div>
                ";
            }
            else{
                foreach ($attr as $v)
                {
                    echo "
<li>
        <div class='figure'>
        <a href='#'><img src='$v[3]' width='150' height='150' alt='error'></a>
        </div>
    <h3 class='title'>
        <a href='#'>$v[1]</a>
    </h3>
    <p class='price' style='cursor:pointer'><span class='num'>￥$v[2](库存:$v[4]) 商家:$v[5]</span></p>
    <p class='cart'><a href='action.php?gid=$v[0]&name=$v[1]&price=$v[2]' onclick=alert('已放入购物车中')>一键加入购物车</a></p>
    </li>
    ";
                }
            }
            ?>
        </ul>
    </section>
    <?php
    echo $page->fpage();
    ?>
    <div id = "information">
        <?php
        @$username = $_SESSION["username"];
        $conn=mysqli_connect('localhost','root','') or die("连接失败");
        mysqli_select_db($conn,'final') or die('选择数据库失败');
        mysqli_query($conn,'set names utf8');

        $sql = "select * from user where username = '$username'";
        $result2=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result2);

        ?>
        <div style="padding-left:25px;"><div onclick="showDiv('div0');" class="personal" style="display: inline-block;cursor: pointer">订单信息</div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div onclick="showDiv('div1');" class="personal">账户信息</div></div>
        <div id="div0">
            <form action="account.php" method="post">
                <p>账户名 : <input type="text" class="none"  value="<?php echo @$row['username']?>" disabled></p>
                <p>余额 : <input type="text"class = "none" name="balance" value="<?php echo @$row['balance']?>" disabled></p>
                <p>充值金额 : ￥<input type="text" name="recharge" class = "submit1" style = "width:100px;" placeholder="请输入充值金额" pattern="\d{1,7}$"  required></p>
                <p style="margin-left:50px;margin-bottom:15px"><input type="submit" name="submit1" class = "btn" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class = "btn"></p>
                <span>* 注意：充值金额只能为1到7位的正整数</span>
                <p style="text-align:center;cursor:pointer;">注册就送1百万购买金额</p>
            </form>
        </div>
        <div id="div1" class="hidden" >
            <table width="100%" border="1"cellspacing="0" cellpadding="0" id="table-1">
                <thead>
                <th>订单号</th>
                <th>时间</th>
                <th>商品名称</th>
                <th>数量</th>
                <th>单价</th>
                <th>小计</th>
                <th>状态</th>
                </thead>
                <?php
                $ids=$_SESSION["username"];
                $db = new DBDA();
                $sql3 = "select * from order_g WHERE username = '".$ids."' AND  status = '进行中'" ;
                $arr = $db->Query($sql3);
                foreach ($arr as $v) {
                    global $db;
                    $sql4 = "select * from detail WHERE OID = '{$v[0]}'";
                    $totalprice = $v[4];
                    $att = $db->query($sql4);
                    $temp = null;
                    $temp2 = null;
                    foreach ($att as $a) {
                        if ($temp != $a[1]) {
                            $temp = $a[1];
                            echo
                            "<tr>
                     <td>{$a[1]}</td>
                    ";
                        } else {
                            echo " <td></td>";
                        }
                        if ($temp2 != $v[1]) {
                            $temp2 = $v[1];
                            echo "<td>$v[1]</td>";
                        }else{
                            echo " <td></td>";
                        }
                        echo "
                      <td>{$a[2]}</td>";
//        }
                        echo "
                       <td>{$a[3]}</td><!--单价-->
                       <td>{$a[4]}</td>
                        <td>{$a[6]}</td>
                        <td>{$a[7]}</td>
                      
                        
                 </tr> 
                
                 ";
                    }
                    echo"<tr>总价：$totalprice</tr>";
                }

                ?>
            </table>
        </div>

    </div>
</body>
</html>
