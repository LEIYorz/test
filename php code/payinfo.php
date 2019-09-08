<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/3
 * Time: 18:16
 */
session_start();
if(empty($_SESSION["username"]))
{
    echo "<script>alert('您还没有登录，请重新登陆用户');window.location.href = 'login.php';</script>";
    exit;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>订单确认</title>
    <style type="text/css">
        *{margin:0;padding: 0}
        body{
            font: 12px/1.5 tahoma,arial,Hiragino Sans GB,\5b8b\4f53;
            background: #eff0f1;
        }
        a{text-decoration: none}
        header
        {
            height: 50px;
            background-color: #fff;
            border-bottom: 1px solid #d7d8d8;
            box-shadow: 0 1px 1px #ddd;
            margin-bottom: 1px;
            position: relative;
        }
        .font
        {
            font:bold 20px/100% "微软雅黑","Lucida Sans";
            animation:light 2s linear 0s infinite alternate;
            color:#FFF;
        }
        @font-face {
            font-family: sweet;
            src: url("sweet.ttf");
        }
        form{
            padding-left:10px;
            font-size:13px;
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
        .title
        {
            font: normal 18px/26px Microsoft YaHei,SimSun;
            border-left: 1px solid gray;
            color: #1a1a1a;
            float: left;
            padding-left: 10px;
            margin-left: 50px;
            margin-top: 12px;
        }
        .account-id
        {
            font: 12px/1.5 tahoma,arial,Hiragino Sans GB,\5b8b\4f53;
            color:#333
        }
        em{
            color: #ff8208;
            font-weight: 700;
            font-size: 25px;
            font-style: normal;

        }
        footer
        {
            clear: both;
            margin: 0 auto;
            margin-top:50px;
            padding-left:450px;
            padding-bottom:30px;
        }
        .ui-button
        {
            height: 32px;
            color: #fff;
            border: 1px solid #0ae;
            background-color: #0ae;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            font-size: 14px;
            font-family: inherit;
            font-weight: 700;
            border-radius: 2px;
            padding: 0 20px;
            margin-top:20px;
        }
        input[type="text"]{
            width:230px;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #333;
        }
        .pass-form{position:relative;top:20px; width:100%;}
        .pass-form .pass-input{position:absolute;top:300px;height:75px;line-height:75px;font-size:14px;color:#000;opacity:0;box-shadow:none}
        .pass-form .pass-border-box{position:absolute;top:275px;font-size:0}
        .pass-form .pass-border-box .faguang{position:absolute;top:0;left:0;z-index:9;box-shadow:0 0 8px rgba(60,100,100,.6);width:75px;height:75px;background:#fff;opacity:0}
        .pass-form .pass-border-box .pass-border{display:inline-block;position:relative;z-index:10;width:75px;height:75px;border:solid 1px #dcdcdc;border-left:none;-webkit-box-sizing:border-box;box-sizing:border-box}
        .pass-form .pass-border-box .pass-border:first-child{border-left:solid 1px #dcdcdc}
        .pass-form .pass-border-box .pass-border i{display:block;margin:0 auto;margin-top:22px;width:20px;height:20px;border-radius:100%}
        </style>
    <script>
        function check_zh(obj){
            obj.value=obj.value.replace(/[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/g,'');
        }
        function appear() {
            document.getElementById("account").style.display = "block";
            document.getElementById("pay_info").style.height = "500px";
            document.getElementById("pay_account").required = true;
            document.getElementById("pass").required = true;
        }
        function disappear() {
            document.getElementById("account").style.display = "none";
            document.getElementById("pay_info").style.height = "350px";
            document.getElementById("pay_account").required = false;
            document.getElementById("pay_account").value = '';
            document.getElementById("pass").required = false;
            document.getElementById("pass").value = '';
        }
        </script>
</head>
<body ng-app="demo" ng-controller="pageCtrl">
<header>
    <div style="width:950px;height:100%;margin:0 auto;zoom:1;">
        <div style="float: left;"><img  style="position: absolute" src="logo.png">
            <div style="float:left;margin-top:15px;margin-left:75px" class = "font">商城</div>
            <div class = "title">我的收银台</div>
        </div>
        <div style="float: right;height: 100%;margin-top: 15px;margin-right: 100px">
            <span class="account-id" style="padding-right:15px">账户：<?PHP echo @$_SESSION["username"]?></span>
            <span class="account-id" style="border-left:1px solid black;padding-left: 20px">客服热线:1234567</span>
        </div>
    </div>
</header>
<div style="width: 950px;margin:0 auto;border-bottom:2px solid #999999;height:175px  ">
    <img src="QR.png" WIDTH="150" HEIGHT="150" STYLE="margin-top: 10px;float: left">
    <div style="float: right;margin:50px 50px auto 500px"><em><?php echo @$_SESSION["totalprice"]?></em>&nbsp;元</div>
</div>
    <div style="width: 950px;margin:0 auto;background: white;border-bottom:2px solid #999999;height: 350px" id="pay_info">
        <h1 style="font-weight: normal;padding:;border-bottom:1px dotted #1e1e1e">请填写物流信息</h1>
        <form action="submit.php" method="post" class="pass-form" name="pass_form" pass-form>
            <p style="height: 15px"></p>
            收件人： &nbsp;&nbsp;<input type="text" name ="recipients" required><p style="height: 20px"></p>
            收件地址：<input type="text" name = "r_address" required><p style="height: 20px"></p>
            选择物流：<select name="express">
                <option value="顺丰">顺丰</option>
                <option value="中通">中通</option>
                <option value="圆通">圆通</option>
                <option value="申通">申通</option>
                <option value="韵达">韵达</option>
                <option value="中国邮政">中国邮政</option>
            </select><p style="height: 50px"></p>
            支付方式:
            &nbsp;
            <img src="photo/Ali.png" style="position:absolute;top:160px">
            <input type="radio" name="payway" value="支付宝" style="margin-left:30px" onclick="appear()">支付宝&nbsp;&nbsp;
            <img src="photo/Wechat.png" style="position:absolute;top:160px">
            <input type="radio" name="payway" value="微信" style="margin-left:35px" onclick="appear()">微信
            <input type="radio" name="payway" value="商城账户" style="margin-left:15px" onclick="disappear()" checked>商城账户
            <p style="height: 20px"></p>
            <div id="account" style="display:none;">
            支付账号：<input type="text" id="pay_account" name="account_id" onkeyup="check_zh(this)"><p style="height: 20px"></p>
            <p>支付密码：</p>
            <label for="pass">
                <input class="pass-input Jpass" type="tel" name="pass" id="pass" autocomplete="off" ng-model="pass"  minlength="6" maxlength="6" />
                <div class="pass-border-box">
                    <span class="pass-border"><i>dot</i></span>
                    <span class="pass-border"><i>dot</i></span>
                    <span class="pass-border"><i>dot</i></span>
                    <span class="pass-border"><i>dot</i></span>
                    <span class="pass-border"><i>dot</i></span>
                    <span class="pass-border"><i>dot</i></span>
                    <div class="faguang Jfaguang"></div>
                </div>
            </label>
            <p style="margin-top:90px;color:#b2b2b2;">请输入六位数字支付密码</p>
            </div>
            <input type="submit" class="ui-button" name="submit" value="确定付款">
        </form>
    </div>
<footer><img src="cer.png"></footer>
<script src="js/angular.min.js"></script>
<script>
    //
    var app=angular.module('demo', []);
    app.controller('pageCtrl', function($scope, $interval, $http, $q){
        $scope.pass='';
    })
        .directive('passForm', function($http){
            return {
                restrict: 'EA',
                link: function(scope, ele, attr){
                    var inputDom=angular.element(ele[0].querySelector('.Jpass'));//密码框
                    var spanDoms=ele.find('span');//光标span
                    var faguang=angular.element(ele[0].querySelector('.Jfaguang'));//发光外框
                    var that=this;
                    inputDom.on('focus blur keyup', function(e){
                        e=e? e : window.event;
                        e.stopPropagation();

                        console.log('value len:'+this.value.length);
                        console.log(e.type);
                        if(e.type==='focus'){
                            var _currFocusInputLen=this.value.length===6? 5 : this.value.length;
                            spanDoms.eq(_currFocusInputLen).addClass('active');
                            faguang.css({left: _currFocusInputLen * 75+'px', opacity: 1});
                        }else if(e.type==='blur'){
                            var _currBlurInputLen = this.value.length;
                            spanDoms.eq(_currBlurInputLen).removeClass('active');
                            faguang.css({opacity: 0});
                        }else if(e.type==='keyup'){
                            //console.log(this.value);
                            //键盘上的数字键按下才可以输入
                            if(e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)){
                                var curInputLen = this.value.length;//输入的文本内容长度
                                for (var j = 0; j < 6; j++) {
                                    spanDoms.eq(j).removeClass('active');
                                    spanDoms.eq(curInputLen).addClass('active');
                                    spanDoms.eq(curInputLen - 1).next().find('i').css({backgroundColor: 'transparent'});
                                    spanDoms.eq(curInputLen - 1).find('i').css({backgroundColor: '#000'});
                                    faguang.css({
                                        left: curInputLen * 75 + 'px'
                                    });
                                }
                                if (curInputLen === 0) {
                                    spanDoms.find('i').css({backgroundColor: 'transparent'});
                                }
                                if (curInputLen === 6) {
                                    spanDoms.eq(5).addClass('active');
                                    faguang.css({
                                        left: '375px'
                                    });
                                    //直接发起密码验证
                                    var doSubmitCallback=function(){
                                        scope.pass='';
                                        spanDoms.find('i').css({backgroundColor: 'transparent'});
                                        spanDoms.removeClass('active').eq(0).addClass('active');
                                        faguang.css({
                                            left: '0'
                                        });
                                    };
                                }
                            }else{
                                this.value = this.value.replace(/\D/g,'');
                            }
                        }
                    });
                }
            }
        });
</script>
</body>
