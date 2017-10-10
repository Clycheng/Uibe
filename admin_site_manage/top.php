<?
include_once("../core/common/globalFilter.php");
include_once("modules/common/session.php");
?>
<html>
<head>
  <title>头部</title>
  <link href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  <script src="resources/js/open_left.js" type="text/javascript" charset="UTF-8"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script language="javascript1.2">
			function showsubmenu(sid) {
				var whichEl = eval("submenu" + sid);
				var menuTitle = eval("menuTitle" + sid);
				if (whichEl.style.display == "none"){
					eval("submenu" + sid + ".style.display=\"\";");
				}else{
					eval("submenu" + sid + ".style.display=\"none\";");
				}
			}
			function logout() {
	      if (confirm("您确定要退出控制面板吗？"))
	        top.location = "logout.php";
	      return false;
	    }
	</script>
  <script language="javascript" src="resources/js/date.js" charset="UTF-8"></script>
  <link href="resources/css/skin.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" onLoad="showTime()">
	<div class="adm_top">
		<div class="adm_top_logo">
		  <img alt="东浩联创" src="/admin_site_manage/resources/images/logo_bg.png"/>
		</div>
    <div class="adm_top_center">
      <span>网站后台管理系统 </span>v1.0
    </div>
    <div class="adm_top_wel">
      欢迎 <span style="color:red;"> <?=$_SESSION["s_userName"]?> </span> 登陆到网站后台管理系统
    </div>
    <div class="adm_top_cat">
      
      <div style="float:left;">
        <div style="float:left;padding-left: 10px;">
          <a href="../" target="_blank">
          <span class="ui-icon ui-icon-home" style="float:left"></span>&nbsp;首页
          </a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="javascript:void(0);" style="cursor:pointer" onClick="switchBar(this)"><span class="ui-icon ui-icon-transferthick-e-w" style="float:left"></span>&nbsp;隐/显</a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="javascript:history.go(-1);" target="_parent">
            <span class="ui-icon ui-icon-arrowthick-1-w" style="float:left"></span>&nbsp;后退
          </a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="javascript:history.go(1);" target="_parent">
            <span class="ui-icon ui-icon-arrowthick-1-e" style="float:left"></span>&nbsp;前进
          </a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="javascript:window.parent.location.reload();" target="_parent">
            <span class="ui-icon ui-icon-refresh" style="float:left"></span>&nbsp;刷新
          </a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="http://www.donhonet.com" target="_blank">
            <span class="ui-icon ui-icon-person" style="float:left"></span>&nbsp;支持
          </a>
        </div>
        <div style="float:left;padding-left: 10px;">
          <a href="javascript:void(0);" target="_self" onClick="logout(); " style="color:#25538c">
            <span class="ui-icon ui-icon-circle-close" style="float:left"></span>&nbsp;退出
          </a>
        </div>
      </div>
      
    </div>
    
	</div>

</body>
</html>
