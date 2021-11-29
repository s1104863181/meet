//alert($)
function reflash(){
	var change = document.getElementById('captcha_img');
	check.src="yanz.php?r=<?php echo rand(); ?>";
}
$(document).ready(function(){//页面加载完成再加载脚本
 
   /*点击登录按钮后做的事件处理*/
	$('input[name="jsb_register"]').click(function(event){
		var $name = $('input[name="name"]');
		var $num = $('input[name="num"]'); 
		var $vx = $('input[name="vx"]');
		var $photoFile = $('input[name="photoFile"]');
		var $yanz=$('input[name="captcha"');
		
		var $text2 = $(".text2");
        
 
		var _name = $.trim($name.val());//去掉字符串多余空格
		var _num = $.trim($num.val());
		var _meet = $.trim($vx.val());
		var _yanz = $.trim($yanz.val());
 
		if(_name == ''){
			$text2.text('请输入姓名');
			$name.focus();
			return;
		}
 
		
		if(_num == ""){
            $text2.text('请输入电话');
			$num.focus();
			return;
		}
 
		if(_meet == ''){
			$text2.text('请输入会议编码');
			$meet.focus();
			return;
		}
 
		if(_yanz == ""){
           $text2.text("请输入验证码");
           $confirmPassword.focus();
           return;
		}
 
		
		if (_photoFile == "") {
			$text2.text("请选择一个图片文件");
			$photoFile.focus();
			return;
		}
		
 
 
});
 
});
