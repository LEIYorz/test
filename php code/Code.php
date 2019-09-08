<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23
 * Time: 15:43
 */
session_start();
$img = imagecreatetruecolor(75,25);
$black = imagecolorallocate($img,0x00,0x00,0x00);
$green = imagecolorallocate($img,0x00,0xFF,0x00);
$white = imagecolorallocate($img,0xFF,0xFF,0xFF);
imagefill($img,0,0,$black);//生成随机的验证码
$table = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = '';
for($i = 0;$i < 4;$i++)
{
    $code .= $table[mt_rand(0,62)];
}
    $_SESSION["code"] = $code;
imagestring($img,5,20,5,$code,$white);
//加入噪点干扰
for($i=0;$i<10;$i++)
{
    imagesetpixel($img,rand(0,75),rand(0,25),$green);
    imagesetpixel($img,rand(0,75),rand(0,25),$white);
}
for($i=0;$i<1;$i++)
{
    imagearc($img,rand(0,50),rand(0,20),25,5,0,180,$green);
    imagearc($img,rand(0,50),rand(0,20),25,5,0,180,$white);
}
//输出验证码
header("content-type:image/png");
imagepng($img);
imagedestroy($img);
?>
