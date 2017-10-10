<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>网站管理员登陆</title>
<style type="text/css">
body {
	letter-spacing:1px; font-size:12px; height:630px; margin-left: 0px; margin-top: 0px; margin-right: 0px;
	margin-bottom: 0px; background-color: #1d3647; background:url(resources/images/login_bg.gif) repeat-x;
}
.log_top{ 
	height:42px; font-family:"微软雅黑"; color:#75b7e7; text-align:center; line-height:42px; 
}
.log_center{ 
	height:408px; padding-top:160px; background:url(resources/images/log_bg_cen.png) no-repeat 45% 0px; width:1000px; margin:0px auto;
}
.log_dibu{ 
	height:20px;font-family:"微软雅黑"; color:#75b7e7; font-size:9px; text-align:center; line-height:20px;
}
.table1{
	font-family:"微软雅黑"; font-size:12px; color:#666; text-align:left
}
.log_center_left{
	width:500px; text-align:right; border:0px solid #000; float:left
}
.log_center_right{
	width:360px; text-align:left; padding-left:100px; border:0px solid #000; float:left
}
</style>
<script type="text/javascript" src="resources/js/jquery-1.8.2.js"></script>

<script type="text/javascript">
function changeCaptcha() {
	$("#captcha").attr("src", "modules/common/verifyCode.php?" + new Date().getTime());
}
function onLogin() {
	var $txt = $("#userName");
	if (!checkNull($txt, '用户名不能为空！')) {
		return false;
	}
	
	$txt = $("#userPwd");
	if (!checkNull($txt, '密码不能为空！')) {
		return false;
	}
	
	$txt = $("#checkCode");
	if (!checkNull($txt, '验证码不能为空！')) {
		return false;
	}
	if (!/^\d{4}$/.test($txt.val())) {
		$txt.focus();
		alert("请输入4位数字验证码！");
		return false;
	}
}

function checkNull($txt, tip) {
	var v = $.trim($txt.val());
	$txt.val(v);
	if (v) {
		return true;
	}
	$txt.focus();
	alert(tip);
	return false;
}

function setFocus() {
	var $txt = $("#userName");
	if(!$.trim($txt.val())) {
	  $txt.focus();
	} else {
	  $txt.select();
	}
}

</script>
</head>
<body>
<div class="log_top">东浩网站管理系统v1.0</div>
<div class="log_center">
	<div class="log_center_left">
		<table width="400" height="200" border="0" cellpadding="0" cellspacing="0" class="table1">
			<tr>
					<td width="8%">&nbsp;</td>
					<td height="25" colspan="2"  ><img src="resources/images/logo.png" width="279" height="68" /></td>
			</tr>
			<tr>
					<td width="8%">&nbsp;</td>
					<td height="25" colspan="2"  >1. 地区商家信息网门户站建立的首选方案...</td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td height="25" colspan="2"  >2.一站通式的整合方式，方便用户使用...</td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td height="25" colspan="2"  >3.强大的后台系统，管理内容易如反掌...</td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td width="200" height="40"><img src="resources/images/icon-demo.gif" width="16" height="16">使用说明</td>
					<td width="200"><img src="resources/images/icon-login-seaver.gif" width="16" height="16" />在线客服</td>
			</tr>
		</table>
	</div>
	<div class="log_center_right">
		<form name=login onSubmit="return onLogin();" action="doLogin.php" method="post">
		<table width="400" height="200" border="0" cellpadding="0" cellspacing="0" class="table1">
			<tr>
				<td height="38" colspan="3" style="font-size:15px; color:#000">
					登陆信息网后台管理
				</td>
			</tr>
			<tr>
				<td width="66" height="38">
					<span class="login_txt">管理员：&nbsp;&nbsp; </span>
				</td>
				<td height="38" colspan="2">
					<input name="userName"  value="" size="20" id="userName" autocomplete="off" onfocus="this.select();"/>
				</td>
			</tr>
			<tr>
				<td height="35">
					<span class="login_txt"> 密 码： &nbsp;&nbsp; </span>
				</td>
				<td height="35" colspan="2">
					<input type="password" size="20" name="userPwd" id="userPwd" autocomplete="off" onfocus="this.select();"/>
					<img src="resources/images/luck.gif" width="19" height="18"> 
				</td>
			</tr>
			<tr>
				<td height="35">
					<span class="login_txt">验证码：</span>
				</td>
				<td width="74" height="35">
					<input name="checkCode" type="text" value="" maxlength="4" size="10" id="checkCode" autocomplete="off" onFocus="this.select();"/>
				</td>
				<td width="260" height="35">
					<img src="modules/common/verifyCode.php" style="cursor:pointer" id="captcha" onClick="changeCaptcha()"/>
				</td>
			</tr>
			<tr>
				<td height="35" >&nbsp;</td>
				<td height="35" >
					<input name="submit" type="submit" class="button" id="submit" value="登 陆"/>
				</td>
				<td>
					<input name="cs" type="reset" class="button" id="cs" value="重 置"/>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<div class="log_dibu">copyright © 2009-2015 www.donhonet.com</div>
<script type="text/javascript">
	setFocus();
</script>
</body>
</html>