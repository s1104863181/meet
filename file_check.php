<?php 
//1.处理文件信息
    $fileArr = @$_FILES["photoFile"];//input标签中的name
 
    //将文件信息保存在变量中
     $num = @$_POST['num'];
    $name = @$fileArr['name'];//文件名
    $type = @$fileArr["type"];//文件类型
    $tmp_name = @$fileArr["tmp_name"];//文件临时存储位置的文件名
    $error = @$fileArr["error"];//文件的错误信息
    $size = @$fileArr["size"];//文件的大小
    
//2.新建存储文件的目录
    $filePath = "uploads"; 
    function createDir($filePath){
    	if(!file_exists($filePath)){ 
			$res = mkdir($filePath); 
			if($res){
				 echo "创建成功"; 
			}
		} 
	} 
	createDir($filePath);
	
	//因为要上传的文件为图片，所以此时设置允许的后缀名如下，如果其他文件则修改为txt等后缀 
	$allowExt=["image/png","image/jpeg","image/gif"];
	include('index.php'); 

//3.判断文件是否上传成功

    if($error===UPLOAD_ERR_OK){//UPLOAD_ERR_OK==0,上传成功
         if(!in_array($type,$allowExt)){//如果类型不在数组中
             exit("非法类型文件");
 
         }
         //判断后缀正确但不是图片的文件
         if(!getimagesize($tmp_name)){
             exit("不是真正的一张图片");
         }  
         
         $ext = pathinfo($name)["extension"];//获取文件后缀 
         $uniname = $num.".".$ext;//生成一个唯一的文件名 
         $destination = $filePath."/".$uniname;
 
//4.move_uploaded_file将上传的文件移动到新位置。 若成功,则返回 true,否则返回 false
         $res = move_uploaded_file($tmp_name,$destination);
         
         if($res){//上传成功 
             //把图片服务器连接传出去：拼接出一个图片的src 
             $server = @$_SERVER["HTTP_ORIGIN"]; 
             $rootDir = pathinfo($_SERVER["REQUEST_URI"])["dirname"];  
             $imgPath = $server.$rootDir."/".$destination; //图片的src
            //echo "<img src='{$imgPath}'>";//输出图片
            $_SESSION['imgPath'] = $imgPath;
         }
         else{
 
             echo "<script type='text/javascript'>alert('上传失败!');location='register.html';</script>";
         }
    }
    else{//上传失败，给出错误提示
         switch ($error) {
             case UPLOAD_ERR_INI_SIZE://1
                 die("上传的文件超过了PHP配置中upload_max_file大小的最大值");//die();结束程序
                 break;
             case UPLOAD_ERR_FORM_SIZE://2
                 die("上传的文件超过了HTML表单中隐藏域MAX_FILE_SIZE中value选项指定的值");
                 break;
             case UPLOAD_ERR_NO_TMP_DIR://6
                 die("没有找不到临时文件夹");
                 break;
             case UPLOAD_ERR_CANT_WRITE://7
                 die("文件写入失败");
                 break;
             case UPLOAD_ERR_EXTENSION://8 
                 die("php文件上传扩展没有打开");
                 break;
             case UPLOAD_ERR_PARTIAL://3 
                 die("文件只有部分被上传");
                 break;
             default:
                 break;
         }
    }
?>
