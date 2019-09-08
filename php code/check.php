<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/13
 * Time: 21:14
 */
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
            opacity:0.8;
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:998;
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
        a{
            display: block;
            color: #757575;
            text-decoration: none;
        }
        a:hover
        {
            color:white;
        }
        section{
            width:1120px;
            height: 600px;
            margin: 70px auto;
            overflow-y:scroll;
        }
        section::-webkit-scrollbar {
            display: none;
        }
        table
        {
            text-align: center;
            font: 12px/1.5 tahoma,arial,"b8bf53";
            border-collapse: collapse;
            color:#3c3c3c;
            background-color:rgba(0,0,0,0.1);
            white-space:nowrap;
            margin-bottom:50px;
        }
        table a{color:#3c3c3c;}
        table a:hover{color:orange;}
        th,td {
            padding: .65em;
        }
        th {
            background: #555 none repeat scroll 0 0;
            border: 1px solid #777;
            color: #fff;
        }
        td {
            border: 1px solid #777;
        }
        tbody tr td:hover {
            background:rgba(0,0,0,0.1);
        }
        tbody tr:last-child td{
            border:none;
        }
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        .manage
        {
            color:black;
            display:inline-block;
        }
        .manage:hover{
            color:orange;
        }
        .photo
        {
            width:96px;
            height:96px;
            display:inline-block;
            vertical-align:middle;
            margin-left:px;
            margin-right:50px;
            padding-bottom:15px;
        }
        .cart
        {
            font-size:53px;
            width:100%;
            margin:175px auto;
        }
        .cart a{
            color:#fff;
            animation:light 2s linear 0s infinite alternate;
        }
        h2{
            line-height: 25px;
            color: #333;
            font-weight: 700;
            font-size: 25px;
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>
    <script src="js/jquery.min.js"></script>
    <script>
        jQuery.fn.rowspan = function(colIdx) { //封装的一个JQuery小插件
            return this.each(function(){
                var that;
                $('tr', this).each(function(row) {
                    $('td:eq('+colIdx+')', this).filter(':visible').each(function(col) {
                        if (that!=null && $(this).html() == $(that).html()) {
                            rowspan = $(that).attr("rowSpan");
                            if (rowspan == undefined) {
                                $(that).attr("rowSpan",1);
                                rowspan = $(that).attr("rowSpan"); }
                            rowspan = Number(rowspan)+1;
                            $(that).attr("rowSpan",rowspan);
                            $(this).hide();
                        } else {
                            that = this;
                        }
                    });
                });
            });
        }
        $(function() {
            $("#record").rowspan(0);
            $("#record").rowspan(1);
            $("#record").rowspan(2);
            $("#record").rowspan(3);
            $("#record").rowspan(4);
            $("#record").rowspan(8);
        });
    </script>
</head>
<body>
<div class = "video">
    <video autoplay = "autoplay" loop = "loop" src = "index.mp4"></video>
    <header>
        <div style="float:left;margin-top:15px;margin-left:15px" class = "font">商城首页 Shopping Index</div>
        <?php
        if(!empty($_SESSION["username"])){
            @$a = $_SESSION["username"];
            echo"
                <div style='float: right;margin-right:100px'><a href='cancel.php' style='margin-top:15px;'>注销</a></div>
                <div style='float: right;margin-right:50px'><a href='shop.php' style='margin-top:15px;'>返回首页</a></div>             
        <div style='float: right;margin-right:25px;'><a href='#' style='margin-top:15px;'>你好！$a</a></div>       
                ";
        }
        else
        {  echo"
                <div style='float: right;margin-right:100px'><a href='login.php' style='margin-top:15px;'>登录</a></div>";
        }
        ?>
    </header>
    <section>
            <?php
            $ids=$_SESSION["username"];
            include("DBDA.class.php");
            $db = new DBDA();
            $sql3 = "select * from order_g WHERE username = '".$ids."'" ;
            $arr = $db->Query($sql3);
            if(empty($arr)){
                echo "
                    <div class = 'cart'>
                     <a href= 'shop.php'><div class = 'photo'><img src='spcar.ico'></div>你现在还没有订单哦，去逛逛商城吧！</a>
                     </div>
                ";
            }
            else{
                echo"
                <h2>所有订单</h2>
                ";
            }
            foreach ($arr as $v) {
                global $db;
                $sql4 = "select * from detail WHERE OID = '{$v[0]}'";
                $totalprice = $v[4];
                $att = $db->query($sql4);
                echo "            
                <table width='100%'  border='0' cellspacing='0' cellpadding='0' id='record'>
                <thead>
                <th>订单号</th>
                <th>下单时间</th>
                <th>收件人</th>
                <th>收件地址</th>
                <th>商品名称</th>
                <th>数量</th>
                <th>单价</th>
                <th>小计</th>
                <th>状态</th>
                <th>操作</th>
                </thead>
                ";
                foreach ($att as $a) {
                    $sql = "select * from goods WHERE `name` = '$a[2]'";
                    $appear = $a[7];
                    $photo = $db->query($sql);
                    foreach ($photo as $k) {
                        echo "
                       <tr>
                     <td >{$a[1]}</td>
                      <td>$v[1]</td>
                      <td>$v[3]</td>
                      <td>$v[6]</td>
                       <td style='vertical-align:center'><img src='$k[3]' width = '64' height='64'>
                       <p>{$a[2]}</p>
                       </td>             
                       <td>{$a[3]}</td>
                       <td>{$a[4]}</td>
                        <td>{$a[6]}</td>
                        ";
                        if ($a[7] == "快递已签收") {
                            echo "<td style='font-weight:650;color:red'>{$a[7]}</td>
                                   <td><a href='#' class='manage' style='text-align:center'>售后服务</a></td>
                        </tr>                       
                        ";
                        }elseif($a[7] != "快递已签收"){
                            echo "<td style='font-weight:650;'>{$a[7]}</td>                         
                            <td style=''>
                        <a href='#' class='manage' 
                        onclick=\"window . confirm('快递签收之前确认收货可能会导致财货两失，确认收货吗?') ? this . href = 'delete.php?action=confirm&ids=$a[0]' : this . href = 'javascript:void()';\">
                        确认收货</a>
                        <a href='#' class='manage' style='margin-left:20px'>申请开票</a>
                        </td>     
                        </tr>                  
                            ";
                         }
                    }
                }

                echo "
                <tr><td colspan='10' style='color:black;font-size:20px;text-align:right;font-family:sweet;'>
                总价：$totalprice</td>
                </tr>                
                ";
            }
            ?>
        </table>
    </section>
</body>
</html>

