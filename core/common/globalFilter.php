<?php
@header("Content-type: text/html; charset=utf-8");
@date_default_timezone_set('PRC'); 
$root = substr(dirname(__FILE__),0,-12);
include_once($root."/core/sysutil/managerFactory.class.php");
include_once($root."/core/util/auth.class.php");
include_once($root."/core/util/menuUtil.class.php");
include_once($root."/core/util/position.class.php");
include_once($root."/core/util/tool.class.php");
include_once($root."/core/util/jsUtil.php");
include_once($root."/core/util/page.class1.php");
include_once($root."/core/util/liwqbj.class.php");
include_once($root."/core/util/image.class.php");
include_once($root."/core/util/validator.class.php");
include_once($root."/core/common/constants.php");
$liwqbj =  new liwqbjtt();
//简便的调用get，post，cookie，session的值；
if($_REQUEST){
	foreach($_REQUEST as $key=>$val){
		@$$key = addslashes($val);
	}
}
//防sql注入GET方法	
if(is_array($_GET)) { 
	foreach($_GET as $key=>$value) { 
		if($value != "") {
			//echo $value;
			$liwqbj->liwqbj_check($value);
		}
	} 
}	
?>