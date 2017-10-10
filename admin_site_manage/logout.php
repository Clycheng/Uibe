<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<?php
include_once("../core/common/globalFilter.php");
include_once("modules/common/session.php");
unset($_SESSION["s_userName"]);
session_destroy();//销毁sessiong
if(strlen($_SESSION["s_userName"])<=""){
		JsUtil::Alert("已安全退出");
		JsUtil::Goto_("login.php");
//header("refresh:1;url=login.php;_blank");
//print('<div style=" text-align:center;margin-top:200px;">已退出，<br>自动跳转中...</div>');
}?>
