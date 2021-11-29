<?php
 
session_start();
 
$captcha = '';//初始化验证码字符串
 
$image = imagecreatetruecolor(100, 30);//使用php函数生成一个100*30px的图片
 
$bgcolor = imagecolorallocate($image, 255, 255, 255);//图片背景色设置为白色
 
imagefill($image, 0, 0, $bgcolor);//将背景颜色填充致刚生成的图片中
 
//这里演示的验证码为4个字符
 
for ($i=0;$i<4;$i++) {
 
$fontsize = 6;//设置字体大小
 
$fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));//设置字体颜色，rgb属性在0~120间随机
 
$data = 'abcdefghijkmnpqrstuvwxyz23456789';//设置待选取的字符串，其中删去了l,1,0,o等用户难以辨别的字符
 
$fontcontent = substr($data,rand(0,strlen($data)),1);//从字符串中随机选取一个字符
 
$x=$i*25+rand(5,10);//当前字符的横坐标
 
$y=rand(5,10);//当前字符的纵坐标
 
imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);//将字符画在图片中
 
$captcha.=$fontcontent;//当前字符添加至验证码字符串
 
}
 
$_SESSION['captcha'] = $captcha;//循环完毕，将生成的验证码存入session
 
for($i=0;$i<200;$i++){
 
$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));//设置 点 的颜色
 
imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);//将点画入图片中
 
}
 
for($i=0;$i<3;$i++){
 
$linecolor = imagecolorallocate($image,rand(80,200),rand(80,200),rand(80,200));//设置线的颜色
 
imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);//将线画入图片中
 
}
 
header('content-type:image/png');//生成图片形式的http头，不可缺少
 
imagepng($image);//以png形式输出图片
 
imagedestroy($image);//销毁图片 开辟内存
