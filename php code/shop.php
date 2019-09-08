<?php
session_start();
header("content-type:text/html;charset=utf-8");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商城主页</title>
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
            height: 600px;
            margin: 40px auto;
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
        #buy{
            position:absolute;
            z-index:999;
            top:42px;
            right:170px;
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
        p
        {
            margin:10px 5px;
        }
        p:hover
        {
            color:orange;
        }
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
        .hidden{
            display:none;
            padding:20px;
        }
        .personal
        {
            display: inline-block;
            cursor: pointer;
        }
        .personal:hover{color:orange}
        nav
        {
            position: absolute;
            top: 50px;
        }
        .all{
            width:190px;
            height:44px;
            line-height:44px;
            background:#b1191a;
            padding:0 10px;
        }
        .all a{
            color:white;
            font-size:16px;
        }
        ul,li{
            list-style-type:none;
            padding: 0;
            margin:0;
            border: none;
            font-family: "Microsoft YaHei", "微软雅黑", "SimSun", "宋体";
            font-size: 14px;
        }
        .nav_item{
            width:190px;
            height:31px;
            line-height:31px;
            color:white;
            background-color:rgba(0,0,0,0.1);
            padding:0 10px;
        }
        .jt{
            color:white;
            float:right;
            width:12px;
            padding-top:10px;
            font: 13px consolas;
        }
        .nav_item a{color:white;}
        .nav_item .sub_menu .leftmenu dl dt a{color:#b61d1d}
        .type{display:inline}
        .sub_menu{
            display:none;
            width:590px;
            position:absolute;
            left:211px;
            top:44px;
            background-color:white;
            box-shadow: 7px 4px 5px #aaa;
        }
        .nav_item:hover .sub_menu{display:block;}
        .nav_item:hover {
            background:white;
        }
        .nav_item:hover .type{
            color:#b61d1d;
        }
        .leftmenu{
            width: 550px;
            overflow:hidden;
            float:left;
        }
        .leftmenu dl{
            overflow:hidden;
            display:block;
            margin: 20px 0;
        }
        .leftmenu dl dt{
            float:left;
            font-weight:bold;
            color:#737373;
            padding:0 8px;
        }
        .leftmenu dl  dd  a{
            color: #737373;
            float:left;
            height:20px;
            line-height:20px;
            padding:0 10px;
            border-left: 1px solid #e0e0e0;
            font-size:12px;
            margin-top:5px;
        }
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        table {
            border-collapse: collapse;
            font-family:sweet;
            cursor:pointer;
        }
        th,td {
            padding: .65em;
        }
        th,td {
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        tbody tr:hover {
            background:rgba(0,0,0,0.1);
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #333;
        }
        .text
        {
            background-color:rgba(0,0,0,0.1) ;
            border:none;
            border-radius:8px;
            outline:none;
            color:#757575;
            padding:10px;
            margin:5px;
            font-size:17px;
        }
        textarea{
            outline:none;
            resize:none;
            font-size:20px;
            overflow-y:hidden;
            margin:5px 10px 0 15px;
        }
        #information #div1 form .btn{
            background:rgba(0,0,0,0.3);
            border:none;
        }
        #information #div1 form .btn:hover{
            background:rgba(0,0,0,0.5);
        }
    </style>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
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
    <script>
        window.onload = function()
        {
            var oDiv1 = document.getElementById('check');
            var oDiv2 = document.getElementById('information');
            var oDiv3 = document.getElementById('detail');
            var oDiv4 = document.getElementById('buy');
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
                },500);
            }
            oDiv4.onmouseover = oDiv3.onmouseover = function()
            {
                clearTimeout(timer);
                oDiv4.style.display = 'block';
            }
            oDiv4.onmouseout = oDiv3.onmouseout = function()
            {
                timer = setTimeout(function () {
                    oDiv4.style.display = 'none';
                },500);
            }
        }
            function showDiv(str) {
                var divs = [];
                for(var i = 0;i < 3;i++) {
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
        <?php
            if(!empty($_SESSION["username"])){
                @$a = $_SESSION["username"];
                echo"
                <div style='float: right;margin-right:100px'><a href='cancel.php' style='margin-top:15px;'>注销</a></div>
                <div style='float: right;margin-right:50px'><a href='check.php' style='margin-top:15px;'>订单详情</a></div>
        <div style='float: right;margin-right:25px'><a href='#' id = 'check' style='margin-top:15px;'>个人账户</a></div>
        <div style='float: right;margin-right:25px;'><a href='#' style='margin-top:15px;'>你好！$a</a></div>       
                ";
            }
            else
                {  echo"
                <div style='float: right;margin-right:100px'><a href='login.php' style='margin-top:15px;'>登录</a></div>";
                }
        ?>
        <div class="search">
        <form action = "search.php" method="get">
            <input type ="text" class = "i-location" placeholder = "搜索商品" name = "key">
            <button type = "submit" class = "btn2"><span>搜索</span></button>
        </form>
        </div>

    </header>
    <nav>
        <div class="all">
            <a href="shop.php">全部商品分类</a>
        </div>
        <ul>
            <li class="nav_item"><a href="shop.php?kind=家用电器" class = "type">家用电器</a><span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <!--1-->
                        <dl>
                            <dt><a href="#">大型家电</a></dt>
                            <dd>
                                <a href="#">平板电视</a>
                                <a href="#">空调</a>
                                <a href="#">冰箱</a>
                                <a href="#">洗衣机</a>
                                <a href="#">家庭影院</a>
                                <a href="#">DVD</a>
                                <a href="#">迷你音响</a>
                                <a href="#">烟机/灶具</a>
                                <a href="#"> 热水器</a>
                                <a href="#">消毒柜/洗碗机</a>
                                <a href="#">冷柜/冰吧</a>
                                <a href="#">酒柜</a>
                                <a href="#">家电配件</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">生活电器</a></dt>
                            <dd>
                                <a href="#">电风扇</a>
                                <a href="#">冷风扇</a>
                                <a href="#">净化器</a>
                                <a href="#">加湿器</a>
                                <a href="#">扫地机器人</a>
                                <a href="#">吸尘器</a>
                                <a href="#">挂烫机/熨斗</a>
                                <a href="#">插座</a>
                                <a href="#"> 电话机</a>
                                <a href="#">清洁机</a>
                                <a href="#">除湿机</a>
                                <a href="#">干衣机</a>
                                <a href="#">收录/音机</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">厨房电器</a></dt>
                            <dd>
                                <a href="#">电压力锅</a>
                                <a href="#">空调</a>
                                <a href="#">冰箱</a>
                                <a href="#">洗衣机</a>
                                <a href="#">家庭影院</a>
                                <a href="#">DVD</a>
                                <a href="#">迷你音响</a>
                                <a href="#">烟机/灶具</a>
                                <a href="#"> 热水器</a>
                                <a href="#">消毒柜/洗碗机</a>
                                <a href="#">冷柜/冰吧</a>
                                <a href="#">酒柜</a>
                                <a href="#">家电配件</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">个护健康</a></dt>
                            <dd>
                                <a href="#" >平板电视</a>
                                <a class="test" href="#">空调</a>
                                <a href="#">冰箱</a>
                                <a href="#">洗衣机</a>
                                <a href="#">家庭影院</a>
                                <a href="#">DVD</a>
                                <a href="#">迷你音响</a>
                                <a href="#">烟机/灶具</a>
                                <a href="#"> 热水器</a>
                                <a href="#">消毒柜/洗碗机</a>
                                <a href="#">冷柜/冰吧</a>
                                <a href="#">酒柜</a>
                                <a href="#">家电配件</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">五金家装</a></dt>
                            <dd>
                                <a href="#">平板电视</a>
                                <a href="#">空调</a>
                                <a href="#">冰箱</a>
                                <a href="#">洗衣机</a>
                                <a href="#">家庭影院</a>
                                <a href="#">DVD</a>
                                <a href="#">迷你音响</a>
                                <a href="#">烟机/灶具</a>
                                <a href="#"> 热水器</a>
                                <a href="#">消毒柜/洗碗机</a>
                                <a href="#">冷柜/冰吧</a>
                                <a href="#">酒柜</a>
                                <a href="#">家电配件</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=手机" class = "type">手机</a> &nbsp;&nbsp;<a href="shop.php?kind=数码" class = "type">数码</a> <span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt><a href="#">手机通讯及配件</a></dt>
                            <dd>
                                <a href="#" >手机</a>
                                <a href="#">游戏手机</a>
                                <a href="#">老人手机</a>
                                <a href="#">手机维修</a>
                                <a href="#">手机壳</a>
                                <a href="#">贴膜</a>
                                <a href="#">移动电源</a>
                                <a href="#">创意配件</a>
                                <a href="#">手机饰品</a>
                                <a href="#">拍照配件</a>
                                <a href="#">数据线</a>
                                <a href="#">充电线</a>
                                <a href="#">手机耳机</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt style="margin-left:70px"><a href="#">数码</a></dt>
                            <dd>
                                <a href="#">数码相机</a>
                                <a href="#">单反相机</a>
                                <a href="#">拍立得</a>
                                <a href="#">加湿器</a>
                                <a href="#">镜头附件</a>
                                <a href="#">摄像机</a>
                                <a href="#">数码配件</a>
                                <a href="#">智能手环</a>
                                <a href="#">电子词典</a>
                                <a href="#">智能机器人</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=电脑" class = "type">电脑</a> &nbsp;&nbsp; <span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt><a href="#">电脑整机</a></dt>
                            <dd>
                                <a href="#">笔记本</a>
                                <a href="#">游戏本</a>
                                <a href="#">平板电脑</a>
                                <a href="#">台式机</a>
                                <a href="#">一体机</a>
                                <a href="#">服务器</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">电脑配件</a></dt>
                            <dd>
                                <a href="#">显示器</a>
                                <a href="#">CPU</a>
                                <a href="#">主板</a>
                                <a href="#">显卡</a>
                                <a href="#">SSD固态硬盘</a>
                                <a href="#">内存</a>
                                <a href="#">硬盘</a>
                                <a href="#">机箱</a>
                                <a href="#">电源</a>
                                <a href="#">散热器</a>
                                <a href="#">刻录机</a>
                                <a href="#">外设产品</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">办公设备</a></dt>
                            <dd>
                                <a href="#">投影机</a>
                                <a href="#">收音机</a>
                                <a href="#">拍立得</a>
                                <a href="#">多功能一体机</a>
                                <a href="#">验钞机</a>
                                <a href="#">安防监控</a>
                                <a href="#">办公家具</a>
                                <a href="#">扫描设备</a>
                                <a href="#">考勤门禁</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt style="margin-left:28px"><a href="#">文具</a></dt>
                            <dd>
                                <a href="#">笔类</a>
                                <a href="#">文件收纳</a>
                                <a href="#">计算器</a>
                                <a href="#">画具画材</a>
                                <a href="#">财会用品</a>
                                <a href="#">本册/便签</a>
                                <a href="#">耗材</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=其他服饰" class = "type">男装</a> &nbsp;&nbsp;<a href="shop.php?kind=其他服饰" class = "type">女装</a> &nbsp;&nbsp;<a href="shop.php?kind=其他服饰" class = "type">其他服饰</a><span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt style="margin-left:28px"><a href="#">男装</a></dt>
                            <dd>
                                <a href="#">当季热卖</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt style="margin-left:28px"><a href="#">女装</a></dt>
                            <dd>
                                <a href="#">当季热卖</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">其他服饰</a></dt>
                            <dd>
                                <a href="#">COSPLAY</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=个护化状" class = "type">个护化妆</a><span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt><a href="#">香水彩妆</a></dt>
                            <dd>
                                <a href="#">香水</a>
                                <a href="#">口红/唇膏</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="rightmenu">
                        <dl>
                            <dd>
                                <a href="#">
                                    aa
                                </a>
                            </dd>
                            <dd>
                                <a href="#">
                                    aa
                                </a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=鞋靴" class = "type">鞋靴</a> &nbsp;&nbsp; &nbsp;&nbsp;<a href="shop.php?kind=钟表" class = "type">钟表</a><span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt><a href="#">男鞋</a></dt>
                            <dd>
                                <a href="#">运动鞋</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">女鞋</a></dt>
                            <dd>
                                <a href="#">高跟鞋</a>
                                <a href="#">凉鞋</a>
                                <a href="#">休闲鞋</a>
                                <a href="#">女靴</a>
                                <a href="#">帆布鞋</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">箱包</a></dt>
                            <dd>
                                <a href="#">男士钱包</a>
                                <a href="#">女士钱包</a>
                                <a href="#">双肩包</a>
                                <a href="#">单肩包</a>
                                <a href="#">手提包</a>
                                <a href="#">商务公文包</a>
                                <a href="#">登山包</a>
                                <a href="#">旅行配件</a>
                                <a href="#">拉杆箱</a>
                                <a href="#">胸包</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">钟表</a></dt>
                            <dd>
                                <a href="#">国表</a>
                                <a href="#">卡地亚</a>
                                <a href="#">劳力士</a>
                                <a href="#">欧米茄</a>
                                <a href="#">欧美表</a>
                                <a href="#">日韩表</a>
                                <a href="#">儿童手表</a>
                                <a href="#">智能手表</a>
                                <a href="#">闹钟</a>
                                <a href="#">挂钟</a>
                                <a href="#">座钟</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
            <li class="nav_item"><a href="shop.php?kind=食品饮料" class = "type">食品饮料 </a> &nbsp;&nbsp;<a href="shop.php?kind=酒类" class = "type">酒类</a> &nbsp;&nbsp;<span class="jt">&gt;</span>
                <div class="sub_menu">
                    <div class="leftmenu">
                        <dl>
                            <dt><a href="#">新鲜水果</a></dt>
                            <dd>
                                <a href='goodsshow.php?gid=1&name=富士山苹果'>水果</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">休闲食品</a></dt>
                            <dd>
                                <a href="#">巧克力</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">中外名酒</a></dt>
                            <dd>
                                <a href="#">白酒</a>
                                <a href="#">葡萄酒</a>
                                <a href="#">洋酒</a>
                                <a href="#">啤酒</a>
                                <a href="#">鸡尾酒</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt><a href="#">进口食品</a></dt>
                            <dd>
                                <a href="#">牛奶</a>
                                <a href="#">饼干</a>
                                <a href="#">蛋糕</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <section>
        <div class='top'>
            <a href="spcar.php">我的购物车</a></span>
            <em class='star'>★</em>
        </div>
        <ul class="list" style="margin-left:8%;margin-top:0">
            <?php
            /**
             * Created by PhpStorm.
             * User: Administrator
             * Date: 2018/5/16
             * Time: 14:53
             */
            include ("DBDA.class.php");
            $db = new DBDA();
            @$kind = $_GET["kind"];
            if($kind){
                $sql = "select * from goods WHERE kind = '$kind'";
                $arr = $db->Query($sql);
                foreach ($arr as $v)
                {
                    echo "
<li>
        <div class='figure'>
        <a href='goodsshow.php?gid={$v[0]}&name={$v[1]}&SName=$v[7]'><img src='$v[3]' width='150' height='150' alt='error'></a>
        </div>
    <h3 class='title'>
        <a href='#'>$v[1] $kind</a>
    </h3>
    <p class='price' style='cursor:pointer'><span class='num'>￥$v[2](库存:$v[4]) 商家:$v[5]</span></p>
    <p class='cart'><a href='action.php?gid=$v[0]&name=$v[1]&price=$v[2]&SID=$v[6]&stock=$v[4]'>一键放入购物车</a></p>
    </li>
    ";
                }
            }
            else{
                $sql = "select * from goods";
                $arr = $db->Query($sql);
                foreach ($arr as $v)
                {
                    echo "
<li>
        <div class='figure'>
        <a href='goodsshow.php?gid={$v[0]}&name={$v[1]}&SName=$v[7]'><img src='$v[3]' width='150' height='150' alt='error'></a>
        </div>
    <h3 class='title'>
        <a href='#'>$v[1] $kind</a>
    </h3>
    <p class='price' style='cursor:pointer'><span class='num'>￥$v[2](库存:$v[4]) 商家:$v[5]</span></p>
    <p class='cart'><a href='action.php?gid=$v[0]&name=$v[1]&price=$v[2]&SID=$v[6]&stock=$v[4]'>一键放入购物车</a></p>
    </li>
    ";
                }
            }


            ?>
        </ul>
    </section>
    <div id = "information">
        <?php
        @$username = $_SESSION["username"];
        $conn=mysqli_connect('localhost','root','') or die("连接失败");
        mysqli_select_db($conn,'final') or die('选择数据库失败');
        mysqli_query($conn,'set names utf8');

        $sql = "select * from user where username = '$username'";
        $result2=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result2);
        $_SESSION["balance"] = $row['balance'];
        ?>
        <div style="padding:1px 25px;margin-top:5px;text-align:center">
            <div onclick="showDiv('div0');" class="personal" >账户信息</div>
            <div onclick="showDiv('div1');" class="personal" style="margin-left:25px;">商家联系</div>
            <div onclick="showDiv('div2');" class="personal" style="margin-left:25px">查看留言</div>
        </div>
        <div id="div0">
        <form action="account.php" method="post">
            <p>账户名 : <input type="text" class="none"  value="<?php echo @$row['username']?>" disabled></p>
            <p>余额 : <input type="text"class = "none" name="balance" value="<?php echo @$row['balance']?>" disabled></p>
            <p>充值金额 : ￥<input type="text" name="recharge" class = "submit1" style = "width:100px;" placeholder="请输入充值金额"
                              pattern="^(([0-9]\d{0,9})|0)(\.\d{1,2})?$"  required></p>
            <p style="margin-left:50px;margin-bottom:15px"><input type="submit" name="submit1" class = "btn" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class = "btn"></p>
            <span>* 注意：充值金额为1~7位之间(不能为零)，可带两位小数的数字</span>
            <p style="text-align:center;cursor:pointer;">注册就送1百万购买金额</p>
        </form>
        </div>
        <div id="div1" class="hidden" style="padding:0">
            <form action="communication.php" method="post" autocomplete="off">
                <p>接收人 <input type="text" name="receiver" value="" class="text" style="margin-left:32px" required></p>
                <p>所属店铺 <input type="text" name="r_store" value="" class="text" style="margin-left:15px" required></p>
                <p style="vertical-align:top;display:inline-block;margin:0 2px 10px 5px">信息内容</p>
                <textarea name="content" maxlength="100" oncontextmenu="window.event.returnValue=false" cols="29" rows="5" placeholder="字数限定一百" required></textarea>
                <br><br>
                <p style="width:75px;display:inline-block;"></p>
                <input type="submit" class="btn" value="发送">
                <p style="width:25px;display:inline-block;"></p>
                <input type="reset" class="btn" value="重置">
                <input type="hidden" name="action" value="买家">
            </form>
        </div>
        <div id="div2" class="hidden" >
            <?php
                $sql1 = "select * from communication WHERE receiver = '$username'";
                $information = $db->query($sql1);
                if(!empty($information)) {
                        echo "
                        <table>
                        <thead>
                        <tr>
                        <th>发送时间</th>
                        <th>发送人</th>
                        <th>店铺名称</th>
                        <th>信息内容</th>
                        <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>                                           
                        ";
                    foreach ($information as $k) {
                        echo "
                        <tr>
                            <td>$k[1]</td>
                            <td style='word-break:break-all;width:100px'>$k[2]</td>
                            <td style='word-break:break-all;width:100px'>$k[5]</td>
                            <td style='word-break:break-all;width:210px'>$k[4]</td>
                            <td><a href='communication.php?behavior=deletecontent&id=$k[0]'>删除</a></td>
                        </tr>                       
                    ";
                    }
                }
                else{
                    echo "<p style='text-align:center;font-family:sweet'>你暂时还没有留言哦！</p>";
                }
            ?>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>
