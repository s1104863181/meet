

<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type"content="text/html; charset=UTF-8"/>


<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript">




	</script>
	<title>会议注册与签到系统</title>
</head>

<body bgcolor="#COD9D9">

	<h1 align="center">会议注册面板</h1>
	<br>


	<h4 align="center">关于爱与和平的会议</h4>

<br>



<form action="register_check.php" method="post" enctype="multipart/form-data">
	<div style="text-align:center; vertical-align:middel;">

<input style="height: 60px;width: 300px;font-size:50px;" type="text" name="name" placeholder="姓名" >
<br>

<br>

<input style="height: 60px;width: 300px;font-size:50px;" type="text" name="num" placeholder="电话" >
<br><br>




<input style="height: 60px;width: 300px;font-size:50px;" type="text" name="vx" placeholder="会议编码">
<br><br>



<div id="hiddent"  style="display: none;"><?php echo $str ?></div>
<input style="height: 60px;width: 300px;font-size:50px;" type="text" name="captcha" id="yh" placeholder="验证码"/>

<br>
<br>

<img data-src="yanz.php" src="yanz.php"  height="30" width="100">
 <div class="form-group">
    <label for="photoFile">头像</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="10240000" id=""/>
    <input type="file" id="photoFile" name="photoFile">
  
  </div>


<br><br>

<input type="submit" value="提交" onclick="check()" style="height: 60px;width: 100px">








</div>
</form>
<br>
<br>
<br>
<br>

<br>
<p align="center">

请务必填写真实的手机号（会议编码请联系主办方）</p>
<p align="center">
<a href="mail to:1104863181@qq.com">联系我</a>;
</p>
<?php

header("content-type:text/html;charset=utf-8");


?>

</body>
<script src="jsb_register.js"></script>

</html>