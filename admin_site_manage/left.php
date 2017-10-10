<?php
include_once("../core/common/globalFilter.php");
include_once("modules/common/session.php");
$sysUserManager = ManagerFactory::getSysUserManager();
$sysUser = $sysUserManager->GetSysUserByUserId($_SESSION["s_userId"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>管理页面</title>
	<script language=JavaScript>
		
		var he=document.documentElement.clientHeight-105
		document.write("<div id=tt style=height:"+he+";overflow:hidden>")
	
		function ExpandOrCollapse(c_Str,text) {
			if(document.getElementById(c_Str).style.display=='none') {
				document.getElementById(c_Str).style.display='block';
				document.getElementById(text).style.color='#FF9933';
				document.getElementById(text).style.cursor='pointer';
				document.getElementById(text).innerHTML='- 收缩';
			} else {
				document.getElementById(c_Str).style.display='none';
				document.getElementById(text).style.color='#669900';
				document.getElementById(text).style.cursor='pointer';
				document.getElementById(text).innerHTML="+ 展开";
			}
		}
	
		function showsubmenu(sid) {
			whichEl = eval("submenu" + sid);
			imgmenu = eval("imgmenu" + sid);
			if (whichEl.style.display == "none") {
				eval("submenu" + sid + ".style.display=\"\";");
				imgmenu.background="/admin_site_manage/resources/images/main_47.gif";
			} else {
				eval("submenu" + sid + ".style.display=\"none\";");
				imgmenu.background="/admin_site_manage/resources/images/main_48.gif";
			}
		}
	</script>
	
  <script src="/admin_site_manage/resources/js/prototype.lite.js" type="text/javascript" charset="UTF-8"></script>
  <script src="/admin_site_manage/resources/js/moo.fx.js" type="text/javascript" charset="UTF-8"></script>
  <script src="/admin_site_manage/resources/js/moo.fx.pack.js" type="text/javascript" charset="UTF-8"></script>
  <link href="/admin_site_manage/resources/css/skin.css" type="text/css" rel="stylesheet" charset="utf-8" />
  
</head>

<body style="background:url(/admin_site_manage/resources/images/left_body_bg.gif) repeat-y;">
<div class="user_admin">
	<div class="user_head">
	   <div class="user_head_core">
	     核心功能
	   </div>
	</div>
  <!--   
    <div class="user_inf">
    	<table width="110" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>欢迎您，<?=$_SESSION["s_userName"]?></td>
          </tr>
          <tr>
            <td >[<a style="color:#25538c">系统管理员，</a><a href="javascript:void(0);" target="_self" onClick="logout(); " style="color:#25538c">退出</a>]</td>
          </tr>
        </table>
    </div>
   -->
</div>

<div class="manage_type">
	<?
		if ($sysUser->isDefaultIn == 1) {
			MenuUtil::createChannelMenuHTML(true,"0",$sysUser->rights, $sysUser->catrights);
		} else {
			MenuUtil::createChannelMenuHTML(false,"0",$sysUser->rights, $sysUser->catrights);
		}
		
	?>
	 
  <h1 class="type">
    <a href="javascript:void(0)">当前网站基本信息</a> 
  </h1>
  <div>
    <img src="./resources/images/menu_topline.gif" width="188" height="5" />
  </div>
  <div style="text-align:center; line-height:19px; color:#333">
    <p style="color:#333">
      技术支持:<a href="http://www.donhonet.com" target="_blank">www.donhonet.com</a>
    </p>
    <p style="color:#333">PHP版本版本信息:5.2.17 </p>
    <p style="color:#333">当前的IP:<?=$_SERVER['REMOTE_ADDR']?></p>
  </div>
<!--类别结束-->
</div>

<script type="text/javascript">
	var contents = document.getElementsByClassName('content');
	var toggles = document.getElementsByClassName('type');
	var myAccordion = new fx.Accordion(
		toggles, contents, {opacity: true, duration: 400}
	);
	myAccordion.showThisHideOpen(contents[0]);
</script>
</body>
</html>