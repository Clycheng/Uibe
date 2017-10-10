<?php
//ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.SERVER_ROOT);
@header("Content-type: text/html; charset=utf-8");
@date_default_timezone_set('PRC'); 
//define('ROOT',$_SERVER['DOCUMENT_ROOT']."/");//."/"
//echo dirname(__FILE__)."/";
//exit;

//开启错误日志功能
//ini_set("log_errors", "On");
//ini_set("error_log", "D:/wamp/logs/".$destination."/".date('d').".log");//设置保存错误日志的地址

$root = substr(dirname(__FILE__),0,-7);
$ROOT =  dirname(__FILE__)."/";
require_once $ROOT."database.php";
require_once $ROOT."config.inc.php";
require_once $ROOT."js.php";
require_once $ROOT."page.class1.php";
require_once $ROOT."image.class.php";
require_once $ROOT."file.class.php";
require_once $ROOT."index.class.php";
require_once $ROOT."fso.class.php";
require_once $ROOT."liwqbj.class.php";
require_once $ROOT."cut_str.php";
require_once $ROOT."function.php";

//实例化的class();
$db = new Database($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd,$cfg_dbname);
$js = new JS();
$liwqbj =  new liwqbjtt();
$lwq = new liwqbjindex();


//简便的调用get，post，cookie，session的值；
if($_REQUEST){
	foreach($_REQUEST as $key=>$val){
		@$$key = addslashes($val);
	}
}


//防sql注入GET方法	
if(is_array($_GET)) 
	{ 
		foreach($_GET as $key=>$value) 
		{ 
			if($value != "")
			{
				$liwqbj->liwqbj_check($value);
			}
		} 
	} 
	
$dDesign="技术支持：东浩联创";
function hqkm($cansu) {
	if($cansu!=""){
		$hqzsxlsql= "select *  from seacrh where id=".$cansu;
		$hqzsxlrus=mysql_query($hqzsxlsql);	
		$hqzsxlrs=@mysql_fetch_object($hqzsxlrus);
		return $hqzsxlrs->zititle;
	}
}
function hqppname($cansu) {
	if ($cansu!="") {
		$hqzsxlsql= "select *  from news_zilei where id=".$cansu;
		$hqzsxlrus=mysql_query($hqzsxlsql);	
		$hqzsxlrs=@mysql_fetch_object($hqzsxlrus);
		return $hqzsxlrs->zititle;
	}
}
function hqnj($cansu) {
	if($cansu!=""){
		$hqzsxlsql= "select *  from news_zilei where id=".$cansu;
		$hqzsxlrus=mysql_query($hqzsxlsql);	
		$hqzsxlrs=@mysql_fetch_object($hqzsxlrus);
		return $hqzsxlrs->zititle;
	}
}
function hqbb($cansu)	{
	if ($cansu != "") {
		$hqzsxlsql= "select *  from seacrh where id=".$cansu;
		$hqzsxlrus=mysql_query($hqzsxlsql);	
		$hqzsxlrs=mysql_fetch_object($hqzsxlrus);
		return $hqzsxlrs->zititle;
	} else {
		return $cansu;	
	}
}
function hqsj($cansu)	{
	if ($cansu!="") {
		$hqzsxlsql= "select *  from seacrh where id=".$cansu;
		$hqzsxlrus=mysql_query($hqzsxlsql);	
		$hqzsxlrs=mysql_fetch_object($hqzsxlrus);
		return $hqzsxlrs->zititle;
	} else {
		return $cansu;	
	}
}

?>
