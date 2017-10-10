<?php
include_once("../../core/common/globalFilter.php");
include_once("common/session.php");
$webConfigManager = ManagerFactory::getWebConfigManager();
$config = $webConfigManager->GetWebConfigById(1);
?>
<html>
  <head>
  <link href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  <script>
  $(function() {
    $( "#main-contain-tabs" ).tabs();
  });
  </script>
</head>
<body>
  <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1">欢迎界面</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1">
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：首页 > 欢迎界面
        </div>
        
        <div  id="table-body-contain" class="ui-widget">
				  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
				    <tr>
	              <td height="40" colspan="4" align="center" bgcolor="#FFFFFF"> 
	                <strong>系统信息</strong>       
	              </td>
	            </tr>
				    <tr>
				      <td height="40" align="right" bgcolor="#FFFFFF">PHP版本：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">5.2.4</td>
				      <td height="40" align="right" bgcolor="#FFFFFF">ZEND版本：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">2.2.0</td>
				    </tr>
				    <tr>
				      <td height="40" width="131" align="right" bgcolor="#FFFFFF">当前域名：</td>
				      <td height="40" width="223" align="center" bgcolor="#FFFFFF"><?=$_SERVER['SERVER_NAME']?></td>
				      <td height="40" width="132" align="right" bgcolor="#FFFFFF"> WEB服务器版本：</td>
				      <td height="40" width="402" align="center" bgcolor="#FFFFFF">Apache/2.2.3 (Red Hat)</td>
				    </tr>
				    <tr>
				      <td height="40" align="right" bgcolor="#FFFFFF">上传文件大小限制：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">2M</td>
				      <td height="40" align="right" bgcolor="#FFFFFF">POST方法提交限制：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">8M</td>
				    </tr>
				    <tr>
				      <td height="40" width="131" align="right" bgcolor="#FFFFFF">脚本超时时间：</td>
				      <td height="40" width="223" align="center" bgcolor="#FFFFFF">200秒</td>
				      <td height="40" width="132" align="right" bgcolor="#FFFFFF">Session支持：</td>
				      <td height="40" width="402" align="center" bgcolor="#FFFFFF">支持<strong>√</strong></td>
				    </tr>
				    <tr>
				      <td height="40" align="right" bgcolor="#FFFFFF">MySQL 数据库：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">支持<strong>√</strong>(其它不支持)</td>
				      <td height="40" align="right" bgcolor="#FFFFFF">编码：</td>
				      <td height="40" align="center" bgcolor="#FFFFFF">utf-8</td>
				    </tr>
				    <tr>
				      <td height="40" width="131" align="right" bgcolor="#FFFFFF"> 当前IP：</td>
				      <td height="40" width="223" align="center" bgcolor="#FFFFFF"><?=$_SERVER['REMOTE_ADDR']?> </td>
				      <td height="40" width="132" align="right" bgcolor="#FFFFFF">操作平台：</td>
				      <td height="40" width="402" align="center" bgcolor="#FFFFFF">建议用IE8以上浏览器</td>
				    </tr>
				    <tr>
				      <td height="40" width="132" align="right" bgcolor="#FFFFFF">数据库版本</td>
				      <td height="40" width="402" align="center" bgcolor="#FFFFFF"><?=@mysql_get_server_info();?></td>
				      <td height="40" width="131" align="right" bgcolor="#FFFFFF"></td>
				      <td height="40" width="223" align="center" bgcolor="#FFFFFF"><? //round((@disk_free_space(".")/(1024*1024)),2)?></td>
				    </tr>
				    <tr>
	            <td height="40" colspan="4" align="center" bgcolor="#FFFFFF">
	
				        <div class="main_bqsy">版权所有：<?=$config->name?>  　 技术支持：东浩联创<br>
				        <script language="JavaScript">
				        document.write('您的显示器分辨率为:\n' + screen.width + '*' + screen.height + ' 像素');
				        </script>
				        </div>
	
	            </td>
	          </tr>
				  </table>
			  </div>
     </div>
  </div>
</body>
</html>