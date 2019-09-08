<?PHP
session_start();
header("content-type:text/html;charset=utf-8");
@$username = @$_SESSION["username"];
?>
<html>
<meta charset="utf-8">
<head>
    <title>富士山苹果页面</title>
    <style type="text/css">
        *{margin:0px;padding:0px;}
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        a {
            display: block;
            color: #757575;
            text-decoration: none;
        }
        a:hover {
            color: white;
        }
        h1{display: inline-block;}
        h2{
            font-size:30px;
            text-align:left;
            color:#ff0036;
            margin-bottom:20px;
        }
        header
        {
            position:absolute;
            width:100%;
            height:50px;
            background-color:rgba(51,51,51,0.3);
            z-index:998;
        }
        .goods{font-size:14px;
            color: #FF0036;
            vertical-align: top;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        .price{
            background-image: url(10.png);
            color: #FF0036;
            font-size: 24px;
            padding-bottom:15px;
        }
        .post
        {
            margin-left:50px;
            margin-left:50px;
            color:#333;
            font-family: tahoma,arial,\5FAE\8F6F\96C5\9ED1,sans-serif;
            font-size:12px;
        }
        .info
        {
            margin:5px 20px 5px 0;
            border-top:1px #999999 dashed;
            border-bottom:1px #999999 dashed;
        }
        .info p
        {
            display: inline-block;
            font: 12px/1.5 tahoma,arial,"\5b8b\4f53";
            /*-ms-overflow-style: scrollbar;*/
            color: #999999;
        }
        .info span
        {
            line-height: 50px;
            color: #FF0036;
            font-weight: 700;
            margin-left: 3px;
            font-size: 10px;
        }
        .introduce
        {
            width: 100%;
            margin-top:75px;
            border-top:1px silver solid;
            text-align: center;
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
        input[type='text']{
            padding: 3px 2px 0 3px;
            line-height: 26px;
            font-size: 12px;
            margin: 0;
            height: 26px;
            border: 1px solid #a7a6ac;
            width: 43px;
            background-position: -406px -41px;
            color: #666;
            font:12px/1.5 tahoma,arial,"\5b8b\4f53";
            outline:none;
        }
        input[type='submit'] {
            background-color: #ff0036;
            border: 1px solid #ff0036;
            color: #fff;
            cursor: pointer;
            height: 38px;
            width: 180px;
            line-height: 38px;
            text-align: center;
            font-size: 16px;
            background: #ff0036 url("photo/cart.png") no-repeat 25px;
            margin-left: 5px;
            outline:none;
        }
        input[type='submit']:hover{
            background-color:rgba(255,0,54,0.8);
            border: 1px solid rgba(0,0,0,0.1);
        }
        .welcome{
            font-size:50px;
            margin-top:45px;
            position:absolute;
            text-align:left;
            width:100%;
            font-family:sweet;
            color:#FF891F;
            border-bottom:1px rgba(0,0,0,0.1) solid;
        }
        .button{
            background-color: white;
            border: 1px solid #ACB4BE;
            color: #536277;
            display: inline-block;
            font-size:20px;
            text-align:center;
            text-decoration:none;
            vertical-align:top;
            margin-top:11px;
            outline:none;
            padding:0 5px;
            cursor:pointer;
        }
        .check{
            line-height: 30px;
            font-size: 10px;
            color: #838383;
            display: inline-block;
            margin-top:10px;
            text-align: center;
        }
    </style>
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){
            var t = $("#text_box");
            $('#min').attr('disabled',true);
            $("#add").click(function(){
                t.val(parseInt(t.val())+1)
                if (parseInt(t.val())!=1){
                    $('#min').attr('disabled',false);
                }
            })
            $("#min").click(function(){
                t.val(parseInt(t.val())-1);
                if (parseInt(t.val())==1){
                    $('#min').attr('disabled',true);
                }
            })
        });
        window.onload=function() {
            var a = document.getElementById("amount").innerHTML;
            // var introduce = document.getElementById("introduce");
            // introduce.innerHTML = ;
            // var title = document.getElementById("title");
            // title.innerHTML = ;
            if (a == "0") {
                document.getElementById("submit").disabled="true";
                document.getElementById("submit").style.cursor="not-allowed";
                document.getElementById("submit").style.backgroundColor="gray";
                document.getElementById("submit").style.border="none";
            }

        }
    </script>
</head>
<body>
<header>
    <div style="float:left;margin-top:15px;margin-left:15px" class = "font">商城首页 Shopping Index</div>
    <div style="float: right;"><a href="shop.php" style="margin-top:15px;margin-right:100px">返回首页</a></div>
</header>
<marquee class="welcome" scrollamount = "20" onmouseover ="this.stop()" onmouseout ="this.start()">
    <?php
    @$SName=$_GET["SName"];
    echo "你好".$username."&nbsp;".$SName."欢迎你😄";
    ?>
</marquee>
<?php
@$gid=$_GET["gid"];
@$name=$_GET["name"];

include ("DBDA.class.php");
$db = new DBDA();
$sql = "select * from goods where name Like '%$name%'";
$arr = $db->Query($sql);
    foreach ($arr as $v) {
        echo "
    <p style='height:150px '></p>
<div class = 'hello' style='position: relative;'>
    <div style='margin-left: 200px;display: inline-block;'><img src = '$v[10]' alt='出错了！' style='width: 450px;height: 450px;'></div>
    <div style='display: inline-block;vertical-align: top;width:500px;position: absolute;margin-left: 18px;padding-right:50px;border-right: 1px #999999 dotted;'>
        <h1 style='font-size: 16px;display: inline-block;width:500px'>$v[9]</h1>
        <p class='goods'>$v[8]</p>
        <div class='price'>
            <p style='font-size: 13px;color: #999999;padding-top: 5px;display: inline-block;font-weight: normal;'>&nbsp;&nbsp;价格:</p><span style='margin-left: 50px;margin-top:5px; font-weight: bolder;'>￥$v[2]</span>
            <p style='height: 15px'>
            <p style='font-size: 13px;color: #999999;padding-top: 5px;display: inline-block;font-weight: normal;'>&nbsp;&nbsp;本店活动:</p><span style='margin-left:25px;color: #b5621b;font-size: 13px;'>包邮</span>
        </div>
        <p style='font-size: 12px;color: #999999;margin-top:15px;display: inline-block'>&nbsp;&nbsp;运费：</p><span class = 'post'>快递：0.00</span>
        <div class='info'>
            <p style='margin-left: 50px'>月销量</p> <span style='border-right:1px #999999 dashed;padding-right: 50px;height: 100px '>1298</span>
            <p style='margin-left: 50px'>点击量</p><span style='border-right:1px #999999 dashed;padding-right: 50px'>2488</span>
            <p style='margin-left: 50px'>积分</p><span style=''>50</span>
        </div>
        <div>
            <form action='deal.php' method='post'>
                <p style='line-height: 30px;font-size: 10px;color: #838383;display: inline-block;margin-top:10px;text-align: center'>&nbsp;
                类型:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;暂无</p>             
                <br>
                <p style='line-height: 30px;font-size: 10px;color: #838383;display: inline-block;margin-top:10px;margin-right:25px;text-align: center'>&nbsp;&nbsp;数量</p>
                <button id='min' class='button' type='button' value='-'>-</button>
                <input type='text' value='1' name='amount' class='amount' id='text_box' pattern='^[1-9]\d*$'> 
                <button id='add' class='button' type='button' value='+'>+</button>   
                <p class='check' style='margin-left:25px'>库存：</p><p class='check' id='amount'>$v[4]</p>
                <input type='hidden' name='gid' value='$v[0]'>
                <input type='hidden' name='name' value='$v[1]'>
                <input type='hidden' name='price' value='$v[2]'>
                <input type='hidden' name='SID' value='$v[6]'>
                <input type='hidden' name='SName' value='$v[7]'>
                <input type='hidden' name='discount' value='$v[8]'>
                <input type='hidden' name='stock' value='$v[4]'><br><br>
                <input type='submit' name='submit' id='submit' value='加入购物车'>
            </form>
        </div>
    </div>
</div>
<div class='introduce'>
    <div style='width:790px;display: inline-block;text-align: center;margin:0 auto;padding-top:30px;'>
        <h2>商品详情</h2>
        <img src='$v[11]' alt='出错了！'>
    </div>
</div>
    ";
    }
?>
</body>
</html>
