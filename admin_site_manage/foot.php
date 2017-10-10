<?
include_once("../core/common/globalFilter.php");
include_once("modules/common/session.php");
?>
<html>
  <head>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css"/>
	  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
	  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	  
	  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  </head>
<body>

	<div class="demo-description" align="center">
	  <p style="color:#333">
	  技术支持:<a href="http://www.donhonet.com" target="_blank">www.donhonet.com</a> &nbsp;&nbsp;
	  PHP版本版本信息:5.2.17&nbsp;&nbsp;
	  当前的IP:<?=$_SERVER['REMOTE_ADDR']?>
	  </p>
	</div>

</body>
</html>