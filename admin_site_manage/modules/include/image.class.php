<?php
class Image{
	var $allowType = array('.jpg','.png','.gif','.jpeg','.wmv','.mp3','.mp4','.doc','.txt','.rar');  //允许上传的类型
	var $allowSize = 9000000000;				//允许上传的最大值
	var $img = null;	//图片属性
	var $uploadPath;	//上传地址
	var $imgType;		//上传图像的类型
	var $imgName;		//文件名称
	var $root = manage;	//站点跟路径
	
	function Image( $input , $uploadPath){
		global $_SERVER,$_FILES;
		$this->img = $_FILES[$input];			//获取本地上传的信息
		$this->root = $_SERVER['DOCUMENT_ROOT'];
		//$this->root = substr(dirname(__FILE__),0,-7);
		$this->uploadPath = $uploadPath;		//要存入的文件夹地址
		$this->imgType = strtolower(strrchr($this->img[name],".")); //上传文件的类型
		$this->imgName =date("Ymd").rand(100000,999999).$this->imgType;		//上传文件的名字
	}
	
	function upload(){
		if(!$this->img[name]) 
			return false; //判断是否有上传内容
		if(!in_array($this->imgType,$this->allowType))  
			$this->Err("您的类型不正确，请上穿'".implode(",",$this->allowType)."'");
		if($this->img[size] > $this->allowSize) 		
			$this->Err("上传的大小不应该超过500k");
		if(!is_dir($this->root."/".$this->uploadPath))	
			$this->CreateDir($this->root."/".$this->uploadPath );	//创建文件夹
		if( move_uploaded_file( $this->img[tmp_name] , $this->root."/".$this->uploadPath ."/".$this->imgName) ){
			return true;
		}else{
			$this->Err("上传失败请重试");
		}
	}
	
	
	
	function getImgPath(){
		//返回大图图片路径
		return $this->uploadPath."/".$this->imgName;
	}
	function CreateDir($dir, $mode = 0777)
	{
		if (is_dir($dir) || @mkdir($dir,$mode)) return TRUE;
		if (!$this->CreateDir(dirname($dir),$mode)) return FALSE;//用递归创建多层目录
		return mkdir($dir,$mode);
	}
	function Err( $msg ){
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
		echo "<script language='javascript'>"
			."\n alert(\"".$msg."\");"
			."\n window.history.go(-1);"
			."\n </script>";
		exit;	
	}
}










class CImage
{
    var $src_image;
    var $width;
    var $height;
    var $image_type;
    var $img;
    var $src_x;
    var $src_y;
    var $xfilelj;
	var $filea;
	
    function __construct($image_file)
    {
        $info=GetImageSize($image_file);
        $this->src_image=$image_file;
        $this->width=$info[0];
        $this->height=$info[1];
        
        switch($info[2])
        {
            case 1:
                $this->image_type="gif";
                break;
            case 2:
                $this->image_type="jpeg";
                break;
            case 3:
                $this->image_type="png";
                break;
			case 4:
                $this->image_type="wmv";
                break;
            default:
                return false;
                echo("Unsurport Image type.");
                break;
        }    //swith end
        //echo "ok";
        $new_function='ImageCreateFrom'.ucfirst($this->image_type);
        $this->img=$new_function($this->src_image);
        $this->src_x=ImageSX($this->img);
        $this->src_y=ImageSY($this->img);
    }
    function thumb($image_dist,$x)        //$x为新图的限制边的尺寸
    {        
        $src_x=ImageSX($this->img);
        $src_y=ImageSY($this->img);
        $scale=min($x/$src_x,$x/$src_y);
    
        if($scale<1)
        {
            $new_x=floor($scale*$src_x);
            $new_y=floor($scale*$src_y);
            $img_tmp=ImageCreateTrueColor($new_x,$new_y);    //set the size of Canvas for the new Image
            ImageCopyResampled($img_tmp,$this->img,0,0,0,0,$new_x,$new_y,$src_x,$src_y);    //Resampled
            ImageDestroy($this->img);
            $new_function="Image".ucfirst($this->image_type);
			imagejpeg($newim, "../../admin/thr_plpic/".$xfilej, 100);//加个100可以更清晰

            return $new_function($img_tmp,$image_dist);
        }
    }    //  thumb end
    
	function fileimage($filelj,$x,$filea){
	 $xfilelj = substr($filelj,22,10);
	 $this->xfilelj = $xfilelj;
	 $this->filea = $filea;
	 //echo $xfilelj; exit;
	 $image=$filelj;//图片路径
	  $img=getimagesize($image);//载入图片的函数   得到图片的信息
/*	  var_dump($img);//可以打印出数组，查看载入图片的信息
	  exit;
*/	  switch($img[2]){//判断图片的类型
	   case 1:
		$im=@imagecreatefromgif($image);//载入图片，创建新图片
	   break;
	   case 2:
		$im=@imagecreatefromjpeg($image);
	   break;
	   case 3:
		$im=@imagecreatefrompng($image);
	   break;
	  }
	  $width_y_y=$img[0];
	  $height_y_y=$img[1];
	  //得出高的比例   原图高\(原图宽\要求宽)
	  if($width_y_y>$x){
	   $width=$x;
	   $height=round($height_y_y/($width_y_y/$x));
	  }else if($height_y_y>$x){
	   $width=round($width_y_y/($height_y_y/$x));
	   $height=$x;
	  }
	  if($width_y_y>$x || $height_y_y>$x){//如果图片宽度大于600或高度大于600才执行以下程序
	  $newim=imagecreatetruecolor($width,$height); //剪切图片第一步，建立新图像 x就是宽 ，y就是高//图片大小
	  imagecopyresampled($newim,$im,0,0,0,0,$width,$height,$width_y_y,$height_y_y);//这个函数不失真
	  //剪切图片第二步，开始，，，新图像，原始图像，x-y剪切的时候从什么地方开始对齐，x-y从什么地方开始缩略，宽-高新图片的宽和高,宽-高旧图片的宽和高
	  //imagecopy($newim,$in,100,175,0,0,100,25);
	  //header("Content-type: image/jpeg");//定义要输出的类型
	  imagejpeg($newim, "../../".$filea."/".$this->xfilelj, 100);//加个100可以更清晰
	  }
	}
	function x_getImgPath(){
			return $this->filea."/".$this->xfilelj;
	}
	
	
	
	
	
	
	
    function image_press($image_dist,$str,$font="simkai.ttf")    //给图片生成文字水印
    {        
        $str=iconv("GB2312","utf-8",$str);            
        $blue=ImageColorAllocate($this->img,90,255,255);
        $white=ImageColorAllocate($this->img,255,0,0);
        ImageTTFText($this->img,20,0,$this->src_x/2/2,$this->src_y-80,$white,$font,$str);
        $new_function="Image".ucfirst($this->image_type);
        return $new_function($this->img,$image_dist);        
    }

    function rotate($image_dist,$angle)
    {
        $img_tmp=null;
        $new_function="Image".ucfirst($this->image_type);
        if(($angle!=90)&&($angle!=180)&&($angle!=270))
        {
            echo("Un-valid angle on calling CImage::rotate(\$image_dist,\$angle) .<p>The valid angle must be 90 or 180 or 270.");
            return false;
        }

        if(($angle==90)||($angle==270)) 
        {
            $img_tmp=ImageCreateTrueColor($this->src_y,$this->src_x);
        }
        else
        {
            $img_tmp=ImageCreateTrueColor($this->src_x,$this->src_y);
        }
        
        switch($angle)
        {
            case 90:
                for($i=0;$i<$this->src_x;$i++)
                {
                    for($j=0;$j<$this->src_y;$j++)
                    {
                        @ImageSetPixel($img_tmp,$this->src_y-$j-1,$i,ImageColorAt($this->img,$i,$j));    
                    }
                }    
                return $new_function($img_tmp,$image_dist);
                break;

            case 180:
                for($i=0;$i<$this->src_x;$i++)
                {
                    for($j=0;$j<$this->src_y;$j++)
                    {
                        ImageSetPixel($img_tmp,$this->src_x-$i-1,$this->src_y-$j-1,ImageColorAt($this->img,$i,$j));    
                    }
                }
                return $new_function($img_tmp,$image_dist);
                break;

            case 270:
                for($i=0;$i<$this->src_x;$i++)
                {
                    for($j=0;$j<$this->src_y;$j++)
                    {
                        ImageSetPixel($img_tmp,$j,$this->src_x-$i-1,ImageColorAt($this->img,$i,$j));    
                    }
                }
                return $new_function($img_tmp,$image_dist);
                break;
        }    //end switch
        
    }        //end rotate
    
   function rotate_h($image_dist)
    {
        $new_function="Image".ucfirst($this->image_type);
        $img_tmp=ImageCreateTrueColor($this->src_x,$this->src_y);
        ImageCopyResampled($img_tmp,$this->img,0,0,$this->src_x-1,0,$this->src_x,$this->src_y,-$this->src_x,$this->src_y);    //水平翻转
        return    $new_function($img_tmp,$image_dist);    
    }
    
    function rotate_v($image_dist)
    {
		$new_function="Image".ucfirst($this->image_type);
		$img_tmp=ImageCreateTrueColor($this->src_x,$this->src_y);
		ImageCopyResampled($img_tmp,$this->img,0,0,0,$this->src_y-1,$this->src_x,$this->src_y,$this->src_x,-$this->src_y);
		return $new_function($img_tmp,$image_dist);
    }    
}







?>
