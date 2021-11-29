<?php
 session_start();
 header("Content-type:text/html;charset=utf-8");
 $link = mysqli_connect("localhost", "cbtkxu161", "zVFTslxAlDGR", "test");
 if (!$link) {
 die("连接失败:".mysqli_connect_error());
 }
 
 $username = @$_POST['name'];
 $num = @$_POST['num'];
 $confirm = @$_POST['vx'];//会议编码
 $code = @$_POST['captcha'];//验证码

 
 $photoFile = @$_FILES['photoFile']['tmp_name'];//图片文件
/* $data['img'] =base64_encode(file_get_contents($_FILES['photoFile']['tmp_name']));*/
 //$data['img_type'] = @$_FILES['photoFile']['type'];
/* $image = mysql_real_escape_string(file_get_contents(@$_FILES['photoFile']['tmp_name']),"localhost"); //获取图片*/
 
 
include('file_check.php'); 
 
$imgPath = @$_SESSION['imgPath'];
 
 if($username == "" || $num == "" || $confirm == "" || $code == "" ||
 	$photoFile==""
 	)
 {
 echo "<script>alert('信息不能为空！重新填写');window.location.href='index.php'</script>";
 } elseif (strlen($username) < 1) {
 echo "<script>alert('请输入正确的名字！');window.location.href='index.php'</script>";
 //判断用户名长度
 }elseif(strlen($num) < 11){
 echo "<script>alert('请输入正确的电话号码！');window.location.href='index.php'</script>";
 //判断密码长度
 }
 elseif($code != $_SESSION['captcha']) {
 echo "<script>alert('验证码错误！重新填写');window.location.href='index.php'</script>";
 //判断验证码是否填写正确
 } elseif(mysqli_fetch_array(mysqli_query($link,"select * from $confirm where num = '$num'"))){
 echo "<script>alert('电话号码已经存在');window.location.href='index.php'</script>";
 }

 else{
 $sql= "insert into $confirm(id,name,num) values(null,'$username','$num')";
 //插入数据库
 if(!(mysqli_query($link,$sql))){
 echo "<script>alert('数据插入失败');window.location.href='index.php'</script>";
 }
 else{
 echo  "<script>alert('提交成功！请准时到场！');window.location.href='index.php'</script>";
 }
 
 
 }
 
?>


