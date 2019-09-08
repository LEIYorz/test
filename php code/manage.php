<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/31
 * Time: 15:01
 */
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
else{
    @$e = $_SESSION["username"];
    @$f = $_SESSION["SID"];
    @$g = $_SESSION["sellername"];
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        *{margin:0;padding:0}
        body{font-family: Roboto,"Helvetica Neue",Helvetica,Tahoma,Arial,"PingFang SC","Microsoft YaHei";}
        a{text-decoration: none}
        .first
        {
            width:1190px;
            margin:0 auto;
            line-height: 35px;
            height: 35px;
            position: relative;
            z-index: 10000;
        }
        .first span{font-size: 12px;color: #8b8b8b;padding-right: 10px}
        .first a {text-decoration: none;font-size: 12px;color:#8b8b8b}
        .first a:hover{color:#999999}
        .second{float: right;margin-right:100px;l}
        .second span{font-size: 12px;color: #8b8b8b;padding-right: 20px;padding-left:20px; }
        .logo
        {
            height:50px;
            background:#008ae5;
            width:100%;
            margin-bottom: 15px;
            color:white;
            position: relative;
        }
        .font
        {
            font:bold 20px/100% "微软雅黑","Lucida Sans";
            animation:light 2s linear 0s infinite alternate;
            color:#FFF;
            display: inline-block;
            margin:12px 20px auto 200px;
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
        ul{width:330px;position:absolute}
        ul,li
        {
            display: inline-block;
            text-decoration: none;
            padding-right:50px;
            height:50px;
            line-height: 50px;
        }
        ul,li a{text-decoration: none;color: white;font-size: 14px}
        ul,li a:hover{color:rgba(255,255,255,0.3); }
        .page{
            position: absolute;
        }
        .message
        {
            float:left;
            border:1px solid #e0e0e0;
            width:187px;
            background: #fff;
            display: inline-block;
            margin-left: 50px;
        }
        .item
        {
            margin-top: 20px;
            padding:10px;
        }
        .item p {margin-bottom:10px;font-weight: 600}
        .message img{vertical-align: top;padding-top: 1px}
        .message a{color:#333;text-decoration: none;font-size:10px}
        .content
        {
            display: inline-block;
            margin-left:30px ;
            margin-bottom:20px ;
            position: absolute;
            border:1px #00adee solid;
            width: 420%;
            padding:25px 20px 25px 35px;
            height:580px;
            overflow-y:scroll;
        }
        .content::-webkit-scrollbar {
            display: none;
        }
        .content h1{font-weight: 500;font-size: 24px;color:#666;margin-bottom: 30px}
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
        .button2
        {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            align-self:right;
            float: right;
        }
        .buy
        {
            width:120px;color:#3c3c3c;width: 120px;
            padding: 10px 0;
            text-align: center;
            display: inline-block;
            vertical-align: middle;
            font: 12px/1.5 tahoma,arial,"b8bf53";
        }
        .manage
        {
            color:black;
            padding:10px;
        }
        .manage:hover{
            color:orange;
        }
        table
        {
            text-align: center;
            font: 12px/1.5 tahoma,arial,"b8bf53";
            border-collapse: collapse;
            color:#3c3c3c;
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
        tbody tr:hover {
            background:rgba(0,0,0,0.1);
        }
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        .store{
            font-size: 18px;
            font-family:sweet;
            line-height:18px;
            color:#FF891F;
        }
        input{
            outline:none;
            border:none;
            font-size:16px;
            margin-left:20px;
            font-family:sweet;
        }
        .hot
        {
            font-size:17px;
            line-height:17px;
            font-family:sweet;
            color:#3c3c3c;
        }
        .content h2 p {margin-top:8px}
        .content h2 p a{color:#3c3c3c;font-size:10px}
        .content h2 p a:hover{color:orange}
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=88);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 30%;
            left: 25%;
            width: 55%;
            padding: 20px;
            border: 10px solid orange;
            background-color: white;
            z-index:1002;
            overflow: auto;
        }
        form{font-family:sweet}
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #333;
        }
        textarea{
            outline:none;
            resize:none;
            font-size:20px;
            overflow-y:hidden;
            margin:20px 10px 0 21px;
            font-family:sweet;
        }
        .check{
            font-family:sweet;
            cursor:pointer;
            font-size:20px;
            width:100%;
        }
        .check .one,.two{
            padding: .65em;
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #ddd;
            border-style:solid none solid none;
            text-align: center;
        }
        .check .one{
            white-space:nowrap;
        }
    </style>

    <script type="text/javascript">
        $(function(){
        })
        function openDialog(){
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
            document.getElementById('fade').style.height='752px';
        }
        function openDialog1(){
            document.getElementById('lighting').style.display='block';
            document.getElementById('faded').style.display='block';
            document.getElementById("cover").style.overflow='hidden';
        }
        function closeDialog(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none'
        }
        function closeDialog1(){
            document.getElementById('lighting').style.display='none';
            document.getElementById('faded').style.display='none'
        }
        function show(){
            var input = document.getElementById("file");
            var file = input.files[0];
            if(!/image\/\w+/.test(file.type)){
                alert("文件必须为图片！");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                document.getElementById("img").innerHTML = '<img src="'+this.result+'" style="width:128px;height:128px;"/>'
            }
        }
        function a_show(){
            var input = document.getElementById("file");
            var file = input.files[0];
            if(!/image\/\w+/.test(file.type)){
                alert("文件必须为图片！");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                document.getElementById("img").innerHTML = '<img src="'+this.result+'" style="width:256px;height:256px;"/>'
            }
        }
        function appear(){
            var input = document.getElementById("firstfile");
            var file = input.files[0];
            if(!/image\/\w+/.test(file.type)){
                alert("文件必须为图片！");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                document.getElementById("firstshow").innerHTML = '<img src="'+this.result+'" style="width:128px;height:128px;"/>'
            }
        }

        function occur(){
            var input = document.getElementById("secondfile");
            var file = input.files[0];
            if(!/image\/\w+/.test(file.type)){
                alert("文件必须为图片！");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(){
                document.getElementById("secondshow").innerHTML = '<img src="'+this.result+'" style="width:128px;height:128px;"/>'
            }
        }
    </script>
</head>
<body>
<div id='fade' class='black_overlay'></div>
<div id='light' class='white_content' style = "top:15%">
    <h1 style='font-family:sweet;text-align:center'>商 品 信 息
        <a class='close' style='float:right' href = 'javascript:void(0)' title='点击关闭' onclick = 'closeDialog()'><img src='photo/close.png'></a>
    </h1>
    <?php
    $conn=mysqli_connect('localhost','root','') or die("连接失败");
    mysqli_select_db($conn,'final') or die('选择数据库失败');
    mysqli_query($conn,'set names utf8');
    $sql2 = "select * from seller where username = '$e'";
    $result2=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result2);
    echo "
    <form action='detail.php' action='get' autocomplete='on' style='margin-top:20px;'>
        商品介绍<input type='text'name='introduce' required style='width:650px'><br><br>
        商品优惠<input type='text'name='discount' required style='width:400px'><br><br>
        商品名称<input type='text'name='name'required width='350px'><br><br>
        商品单价<input type='text'name='price'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' required><br><br>
        商品种类<input type='text'name='kind'required width='350px'><br><br>
        商品图片<input type='file'name='picture'id='firstfile' onchange='appear()'required><br><br>
        上架库存<input type='text' name='amount'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' required><br><br>
        商品展示图片<input type='file' name='picture_one'required><br><br>
        商品详情图片<input type='file' name='picture_two'required><br><br>
        <input type='hidden' name='SID' value='$f'>
        <input type='hidden' name='seller' value='$row[sellername]'>
        <input type='hidden' name='SName' value='$row[SName]'>
        <input type='reset' name='reset' class='button2' style='margin-left:20px' value='重置'>
        <input type='submit' name='action' class='button2' value='确定上架'>
    </form>
    <div id='firstshow' style='float:right;display:inline-block;margin-top:-300px;margin-right:-175px'>
        <img src='photo/regret.png' style='width: 150px;height:150px;opacity:0'>
    </div>
    ";
    ?>
</div>
<div style="background-color:#f6f6f6;border-bottom: 1px solid #f0f0f0;position: relative">
    <div class = "first">
        <span style="border-right: 1px solid silver;">💻 卖家客户端</span>
        <span> <?php echo $e?>,</span><a href="cancel.php">退出</a>
        <div class="second">
            <span style="border-right: 1px solid silver"><a href ="#">商城活动</a></span><span><a href="#">联系客服</a></span>
        </div>
    </div>
</div>
<div class="logo">
    <div class="font">商城</div><span style="font-weight: bolder;font-size: 20px">卖 家 中 心 </span>
    <ul style="margin-left:50px;width:400px">
        <li><a href = "#">首页</a></li>
        <!--       <li><a href="#">基础设置</a></li>-->
<!--        <li><a href="#">物流发送</a> </li>-->
        <li><a href="manage.php?action=5">留言箱</a> </li>
</div>
</div>
<div class = "page">
    <div class = "message">
        <div style="font-size: 16px;font-weight: 600;padding:15px 20px;border-bottom:1px #e0e0e0 solid">我的店铺</div>
        <div class="item"><p><img src="store.png">我的店铺</p><a href="manage.php?action=1">店铺信息</a></div>
        <div class="item"><p><img src="baby.png">商品管理</p><a href="manage.php?action=2">发布商品</a></div>
        <div class="item"><p><img src="list.png">交易管理</p><a href="manage.php?action=3">订单管理</a>&nbsp;&nbsp;&nbsp;
            <a href="manage.php?action=4">历史订单</a>
        </div>
    </div>
        <?PHP
        @$action = $_GET["action"];
        @$username = $_SESSION["username"];
        @$type = $_SESSION["type"];
        $conn=mysqli_connect('localhost','root','') or die("连接失败");
        mysqli_select_db($conn,'final') or die('选择数据库失败');
        mysqli_query($conn,'set names utf8');
        $sql1 = "select * from seller where username = '$username'";
        $result1=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result1);

        if(@$action == 0) {
            @$cgid = $_GET["gid"];
            include('DBDA.class.php');
            $db = new DBDA();
            $sql = "select * from goods WHERE GID = $cgid";
            $arr = $db->Query($sql);

            foreach ($arr as $v) {
                echo "
            <div class ='content' style='overflow:hidden;width:950px;padding:25px 45px 60px 45px;'>
                   <h1 style='font-family:sweet;text-align:center;margin-bottom:50px;font-size:30px'>商 品 信 息</h1>
                   <form action='detail.php' action='get' autocomplete='on' enctype='multipart/form-data' style='font-size:23px'>
                商品介绍<input type='text'name='cintroduce' value='$v[9]' style='width:460px'><br><br>                             
                商品优惠<input type='text' name='cdiscount' value='$v[8]' style='width:400px'><br><br>
                商品名称<input type='text'name='cname' style='width:400px' value='$v[1]'><br><br>
                商品单价<input type='text'name='cprice' value='$v[2]'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' style='width:250px'><br><br>                
                商品图片<input type='file'name='cphoto' id='file' onchange='a_show()'style='width:250px'><br><br>         
                上架库存<input type='text' name='camount' value='$v[4]'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' style='width:250px'><br><br>
                商品展示图片<input type='file'name='csphoto' style='width:250px'><br><br>                             
                商品详情图片<input type='file' name='ctphoto' style='width:250px'><br><br>               
        <input type='hidden' name='SID' value='$f'>
        <input type='hidden' name='seller' value='$row[sellername]'>
        <input type='hidden' name='cgid' value='$v[0]'>
        <input type='hidden' name='oname' value='$v[1]'>
        <input type='hidden' name='rphoto' value='$v[3]'>
        <input type='hidden' name='rsphoto' value='$v[10]'>
        <input type='hidden' name='rtphoto' value='$v[11]'>
        <input type='hidden' name='SName'value='$row[SName]'>
        <input type='hidden' name='rkind' value='$v[12]'>

        <input type='reset' name='reset' class='button2' style='margin-left:20px' value='重置'>
        <input type='submit' name='action' class='button2' value='确定更换'>     
        </form>
        <div id='img' style='float:right;display:inline-block;margin-top:-450px;margin-right:-200px'>
        <img src='$v[3]' style='width: 256px;height:256px'>
        </div>  
        
            ";
            }
        }
        elseif(@$action == 1)
        {

            echo"
                <div class ='content' style='overflow:hidden;'>
               <h1 style='border-bottom:1px dotted #3c3c3c;padding-bottom:20px'>店铺信息</h1>
               <form action = 'detail.php' method = 'post'>
               <p class = 'store'>店铺名字&nbsp;&nbsp;&nbsp;<input type='text' name = 'SName'value='$row[SName]'></p><br>
               <p class = 'store'>我的名字&nbsp;&nbsp;&nbsp;<input type='text'name = 'sellername' value='$row[sellername]'></p><br>
               <p class = 'store'>年龄&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text'name = 'age' pattern='^(1[89]|[2-8]\d|90)$' value='$row[age]'></p><br>
               <p class = 'store'>电话号码&nbsp;&nbsp;&nbsp;<input type='text'name = 'telephone' value='$row[telephone]'></p><br>
               <p class = 'store'>联系地址&nbsp;&nbsp;&nbsp;<input type='text'name = 'address' value='$row[address]' style='width:500px;'></p>
               <input type='hidden' name='SID' value='$row[SID]'>  
               <input type= 'submit' class = 'button2' name='change' value='信息更改'>
               </form>
              <br>
               <div style='margin-top:60px;border:1px silver dashed;padding:35px 20px 15px 20px'>
               <h2 style='font-weight: 500;font-size: 24px;color: #666;margin-bottom: 30px;'>热门商品
               <p style='float:right;'><a href='#'>更多</a></p>
               </h2>
               <div style='display:inline-block;margin-left:25px;text-align:center'><img src='goods/1.png' width='128' height='128' alt='error'>
               <p class = 'hot'>小米手机</p>
               </div>
               <div style='display:inline-block;margin-left:45px;text-align:center'><img src='goods/2.png' width='128' height='128' alt='error'>
               <p class = 'hot'>富士山苹果</p>
               </div>
               <div style='display:inline-block;margin-left:45px;text-align:center'><img src='goods/3.png' width='128' height='128' alt='error'>
               <p class = 'hot'>徐福记巧克力</p>
               </div>
               <div style='display:inline-block;margin-left:45px;text-align:center'><img src='goods/4.png' width='128' height='128' alt='error'>
               <p class = 'hot'>COSPLAY柔道服</p>
               </div>
               <div style='display:inline-block;margin-left:45px;text-align:center'><img src='goods/5.png' width='128' height='128' alt='error'>
               <p class = 'hot' >ipad</p>
               </div>      
               </div>     
               </div>                  
            ";
        }
        elseif (@$action == 2) {
            include("DBDA.class.php");
            $db = new DBDA();
            $sql = "select * from goods WHERE SID = $row[SID]";
            $arr = $db->Query($sql);
            if(!empty($arr))
            {
                echo "
            <div class ='content' id='cover'>
            <div id='faded' class='black_overlay'></div>
            <div id='lighting' class='white_content' style='top:10%;left:20%'>
    <h1 style='font-family:sweet;text-align:center'>商 品 信 息
    <a class='close' style='float:right' href = 'javascript:void(0)' title='点击关闭' onclick = 'closeDialog1()'><img src='photo/close.png'></a>
    </h1>
    <form action='detail.php' action='get' autocomplete='on'>
        商品介绍<input type='text'name='introduce' required style='width:200px'><br><br>
        商品优惠<input type='text'name='discount' required style='width:200px'><br><br>
        商品名称<input type='text'name='name'required style='width:200px'><br><br>
        商品单价<input type='text'name='price'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' required><br><br>
        商品种类<input type='text'name='kind'required style='width:200px'><br><br>
        商品图片<input type='file' id='secondfile' onchange='occur()' name='picture'required><br><br>
        上架库存<input type='text' name='amount'pattern='(^[1-9]\d*(\.\d{1,2})?$)|(^[0]{1}(\.\d{1,2})?$)' required><br><br>
        商品展示图片<input type='file' name='picture_one'required><br><br>
        商品详情图片<input type='file' name='picture_two'required><br><br>
        <input type='hidden' name='SID' value='$f'>
        <input type='hidden' name='seller' value='$row[sellername]'>
        <input type='hidden' name='SName' value='$row[SName]'>
        
        <input type='reset' name='reset' class='button2' style='margin-left:20px' value='重置'>
        <input type='submit' name='action' class='button2' value='确定上架'>     
    </form>
    <div id='secondshow' style='float:right;display:inline-block;margin-top:-325px;margin-right:-200px'>
        <img src='photo/regret.png' style='width: 150px;height:150px;opacity:0'>
        </div>  
</div>
            <h1>发布商品</h1>
            <div style='position: absolute'>
            <div style='color: #6c6c6c;'>
            <div class = 'goods'style='width:120px'>商品ID</div>
            <div class = 'goods'style='width:255px'>店铺商品</div>
            <div class = 'goods'style='width:120px'>商品库存</div>
            <div class = 'goods'style='width:120px'>单价</div>
            <div class = 'goods'style='width:255px'>商品图片</div>   
            <div class = 'goods'style='width:100px'>操作</div>      
            <br>
            </div> 
            </div>
            <p style='height: 17px;'></p>           
            ";
            }
            else{
                echo "
<div class ='content'>
                <h1>发布商品</h1>
<div style='margin:50px;width:127px;display: inline-block'><img src='photo/goods.png'></div>
<div style='display: inline-block;'>
    <p style='display:inline-block;vertical-align:middle;margin-top:-200px;font-size:20px;font-family:sweet'>你还没有发布商品呢,赶快上架商品吧</p>
    <div style='display: inline-block;margin-left:-330px;vertical-align:top;margin-top:-50px;text-align:left'>
        <a href = 'JavaScript:void(0)' onclick = 'openDialog()' class = 'manage'>商品上架</a>
    </div>
</div>
</div>
                ";
                exit;
            }
            foreach ($arr as $v) {
                echo "
           <div style = 'border-top:1px dotted #80b2ff;border-bottom: 1px dotted #80b2ff;margin-top: 25px;width: 1000px;'>
           <div class = 'buy'>$v[0]</div>
           <div class = 'buy' style='width:255px'>$v[1]</div>
           ";
                if($v[4] != 0){
                echo"
           <div class = 'buy' style='width:120px'>$v[4]</div>
           ";
           }else{
                    echo"
           <div class = 'buy' style='width:120px'><b style='color:red'>$v[4]</b>
           <p style='color:red;font-weight:700;'>请尽快调整库存量或者下架该商品</p>  
           </div>         
           ";
                }
                echo"
           <div class = 'buy' style='width:120px'>$v[2]</div>
           <div class = 'buy' style='width:255px'><img src='$v[3]' width='64' height='64' alt='error'></div>
           <div class = 'buy' style='width:100px;margin-left: 5px'>
           <a style='color:#3c3c3c' href='detail.php?gid=$v[0]&name=$v[1]&action=delete' onMouseOver=\"this.style.color='#FFA500'\"
          onMouseOut=\"this.style.color='#3c3c3c'\">下架</a>
           <a style='color:#3c3c3c' href = 'manage.php?action=0&gid=$v[0]' class = 'manage'onMouseOver=\"this.style.color='#FFA500'\"
           onMouseOut=\"this.style.color='#3c3c3c'\">管理</a>             
           </div>
          </div>
    ";
            }
            echo "
                    <a href='JavaScript:void(0)' class='button2' onclick='openDialog1()' 
                    style='margin-top:30px;margin-right:0'>商品上架</a>
                    ";
            echo"</div>";
        }

        elseif (@$action == 3) {
            include ('DBDA.class.php');
            $db = new DBDA();
            $sql = "select * from detail WHERE SID = $f  and status != '快递已签收'" ;
            $arr = $db->Query($sql);
            if(!empty($arr))
            {
                echo"
            <div class ='content'>
            <h1>订单管理</h1>
            <table width='100%'  border='1'cellspacing='0' cellpadding='0' id='table1'>
        <thead>
            <th>所属订单号</th>
            <th>下单时间</th>
            <th>下单用户</th>
            <th>收件人</th>
            <th>收件地址</th>
            <th>商品名称</th>
            <th>数量</th>  
            <th>单价</th>        
            <th>总价</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        ";
            }
            else{
                echo "
<div class ='content'>
                <h1>订单管理</h1>
<div style='margin:50px;width:127px;display: inline-block'><img src='photo/list.png'></div>
<div style='display: inline-block;'>
    <p style='display:inline-block;vertical-align:middle;margin-top:-200px;font-size:20px;font-family:sweet'>你还没有订单呢,你可以：</p>
    <div style='display: inline-block;margin-left:-240px;vertical-align:top;margin-top:-50px;'>
        <a href = 'manage.php?action=2' class = 'manage'>发布商品</a><br><br>
        <a href = 'manage.php?action=4' class='manage'>查看历史订单</a>
    </div>
</div>
</div>
                ";
            }
            foreach ($arr as $v)
            {
                global $db;
                $sql = "select * from Order_G WHERE OID = $v[1]";
                $att = $db->query($sql);
                foreach ($att as $a)
                {
                    $sql = "select * from goods WHERE `name` = '$v[2]'";
                    $photo = $db->query($sql);
                    //echo $a[1];
                    foreach ($photo as $k) {
                        echo "                  
                     <tr>
                     <td >{$a[0]}</td>
                      <td>$a[1]</td>
                      <td>$a[2]</td>
                      <td>$a[3]</td>
                      <td>$a[6]</td>
                       <td style='vertical-align:center'><img src='$k[3]' width = '64' height='64'>
                       <p>{$v[2]}</p>
                       </td><!--单价-->               
                       <td>{$v[3]}</td>
                       <td>{$v[4]}</td>
                        <td>{$v[6]}</td>
                        <td style='font-weight:650;color:red'>{$v[7]}</td>  
                        ";
                        if($v[7] != '商品等待出库' && $v[7] != '快递已签收')
                        {
                            echo"
                            <td><a href='manage.php?action=5&buyer=$a[2]'>通知买家</a></td>                     
                            ";
                        }elseif($v[7] = '商品等待出库'){
                            echo"
                            <td><a href='detail.php?name=$v[2]&OID=$a[0]&action=taking'>接单</a>
                          <a href='manage.php?action=5'>通知买家</a></td>        
                            ";
                        }
                 echo "</tr>";

                 }
                    }
                }
            echo "</table>";
            echo "</div>";
        }
        elseif($action == 4) {
            include("DBDA.class.php");
            $db = new DBDA();
            $sql = "select * from detail WHERE SID='" . $f . "' and status = '快递已签收'";
            $arr = $db->Query($sql);
            if(!empty($arr)){
                echo "
            <div class ='content'>
            <h1>历史订单</h1>
            <table width='100%'  border='1'cellspacing='0' cellpadding='0' id='table1'>
        <thead>
            <th>所属订单号</th>
            <th>下单时间</th>
            <th>下单用户</th>
            <th>收件人</th>
            <th>收件地址</th>
            <th>商品名称</th>
            <th>数量</th>  
            <th>单价</th>        
            <th>总价</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
            ";
            }
            else
            {
                echo"
                 <div class ='content'>
                <h1>历史订单</h1>
<div style='margin:50px;width:127px;display: inline-block'><img src='photo/regret.png' style='width:128px;height:128px;opacity:0.5'></div>
<div style='display: inline-block;'>
    <p style='display:inline-block;vertical-align:middle;margin-top:-200px;font-size:20px;font-family:sweet'>暂时没有历史订单哦,加油吧！你还可以：</p>
    <div style='display: inline-block;margin-left:-375px;vertical-align:top;margin-top:-50px;'>
        <a href = 'manage.php?action=2' class = 'manage'>发布商品</a><br><br>
        <a href = 'manage.php?action=3' class='manage'>管理订单</a>
    </div>
</div>
</div>
                ";
            }
            foreach ($arr as $v) {
                global $db;
                $sql1 = "select * from order_g WHERE OID = '{$v[1]}'";
                $att = $db->query($sql1);
                foreach ($att as $a) {
                    $sql = "select * from goods WHERE `name` = '$v[2]'";
                    $photo = $db->query($sql);
                    foreach ($photo as $k) {
                        echo "
           <tr>
                     <td >{$a[0]}</td>
                      <td>$a[1]</td>
                      <td>$a[2]</td>
                      <td>$a[3]</td>
                      <td>$a[6]</td>
                       <td style='vertical-align:center'><img src='$k[3]' width = '64' height='64'>
                       <p>{$v[2]}</p>
                       </td><!--单价-->               
                       <td>{$v[3]}</td>
                       <td>{$v[4]}</td>
                        <td>{$v[6]}</td>
                        <td style='font-weight:650;color:orange'>{$v[7]}</td>   
                        <td>
            <a href='#'>售后服务</a></td>                
                 </tr>                       
";
                    }
                }
            }
            echo "</table>";
            echo "</div>";
        }
        elseif($action == 5) {
            @$buyer = $_GET["buyer"];
            echo "
                <div class='content' style='width:900px'>
                <h1>留言箱</h1>
                <div class='sender'>
                <h1 style='border-bottom:1px #f4f4f4 solid;padding-bottom:10px;font-size:17px'>发送信息</h1>
                <form action='detail.php' method='post'>
                 <p>接收人 <input type='text' name='receiver' value='$buyer' style='margin-left:32px;background-color:rgba(0,0,0,.1);
                 border-radius:9px;padding:10px;font-size:15px;'required></p>
                 <p style='vertical-align:top;margin-top:20px;display:inline-block;'>信息内容</p>
                 <textarea name='message' maxlength='200' oncontextmenu='window.event.returnValue=false' cols='29' rows='5' placeholder='字数限定两百' required></textarea>
                <br><br>
                <input type='reset' class='button2' style='float:left;margin:4px 75px 20px 85px;padding:10px 20px' value='重置'>
                <input type='submit' class='button2' style='float:left;padding:10px 20px' value='发送'>             
                <input type='hidden' name='identity' value='卖家'>
                <input type='hidden' name='store' value='$row[SName]'>
                </form>                  
                </div>            
                <div class='receiver' style='margin-top:100px'>
                 <h1 style='border-bottom:1px #A1A1A1 solid;padding-bottom:10px;font-size:17px'>查看信息</h1>
                ";
            include("DBDA.class.php");
            $db = new DBDA();
            $check_direction = "send to $row[SName]";
            $sql = "select * from communication WHERE receiver = '$g' AND direction = '$check_direction'" ;
            $information = $db->query($sql);
            if (!empty($information)) {
                echo "
                        <table class='check'>
                        <thead>
                        <tr>
                        <th class='one'>发送时间</th>
                        <th class='one'>发送人</th>
                        <th class='one'>信息内容</th>
                     <th class='one'>操作</th>
                        </tr>
                        </thead>
                        <tbody>                                           
                        ";
                foreach ($information as $k) {
                    echo "
                        <tr>
                            <td class='two'>$k[1]</td>
                            <td class='two'>$k[2]</td>
                            <td class='two'style='word-break:break-all;'>$k[4]</td>
                            <td class='two'><a href='detail.php?action=deletemessage&id=$k[0]'>删除</a></td>
                        </tr>                       
                    ";
                }
                echo "
            </tbody>
            </table>
            ";
            }else{
                echo "<p style='text-align:center;font-family:sweet;font-size:20px'>你暂时还没有留言哦！</p>";
            }
            echo "</div>";
        }
        ?>
</body>
</html>
