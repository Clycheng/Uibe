<? include_once("modules/common/session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">
<title>网站后台管理系统v1.0</title>
<style>
.fff{overflow-y:auto;scrollbar-face-color: #ededed; scrollbar-shadow-color: #c5c5c5; scrollbar-highlight-color: #c5c5c5; scrollbar-3dlight-color: #FFFFFF; scrollbar-darkshadow-color: #FFFFFF; scrollbar-track-color: #e2e2e2; scrollbar-arrow-color: #D2E5F4}
</style>
</head>
<frameset rows="56,*" cols="*" frameborder="no" border="1" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset id=frame2 cols="220,*" frameborder="no" border="0" framespacing="0">
    <frame src="left.php" name="leftFrame" scrolling-x="no"  noresize="noresize" id="leftFrame" title="leftFrame" class="fff">
    <frame src="modules/welcome.php" name="main" id="main" title="mainFrame"/>
  </frameset>
</frameset>
<noframes>
<body onbeforeunload="history.go(0)">
</body>
</noframes>

</html>
