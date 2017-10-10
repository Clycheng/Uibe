<? 
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");	
?>
<html>
<head>
  <link href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link href="/resources/kindeditor/themes/default/default.css" rel="stylesheet">
  <script charset="utf-8" src="/resources/kindeditor/kindeditor-min.js"></script>
  <script charset="utf-8" src="/resources/kindeditor/lang/zh_CN.js"></script>
  <script charset="utf-8" src="/resources/DatePicker/WdatePicker.js" type="text/javascript"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  
  <script>
  $(function() {
    $( "#main-contain-tabs" ).tabs();
    $( "#tabs" ).tabs();
    $( "#btn_submit" ).button();
    $( "#btn_return" ).button();
  });
  </script>
</head>

<body>
    <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1">管理员</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：用户管理 &gt; <a href="list.php">管理员</a>
        </div>
        <?
          if ($_SESSION["err_msg"] != null) {
        ?>
        <div class="ui-widget" id="tip">
          <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
            <strong>提示:</strong> <?=$_SESSION["err_msg"]?> </p>
          </div>
        </div>
        <script type="text/javascript">
        $("#tip").click(function() {
          $(this).animate({
            opacity: "hide"
          }, "slow");
        });
        setTimeout('$("#tip").click()',3000);
        </script>
        <?
          $_SESSION["err_msg"] = null;
          }
        ?>
        <form action="add.php" method="post" name="form1" id="form1">
          <div id="tabs">
            <ul>
              <li><a href="#tabs-1">基本信息</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">
	
	
							<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
								<tr class="ui-widget-header">
									<td height="25" colspan="2" align="center">
										添加管理员
									</td>
								</tr>
								<tr>
									<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
										<span>用户名：</span>
									</td>
									<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
										<input name="action" type="hidden" value="add"/>
										<input name="userName" type="text" id="userName" class="text ui-widget-content ui-corner-all"/>
									</td>
								</tr>
								
								<tr>
									<td height="25" align="right" bgcolor="#FFFFFF">
										<span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
									</td>
									<td height="25" align="left" bgcolor="#FFFFFF">
										<input name="userPwd" type="password" id="userPwd" class="text ui-widget-content ui-corner-all"/>
									</td>
								</tr>
								
								<tr>
									<td height="25" align="right" bgcolor="#FFFFFF">
										<span>备&nbsp;&nbsp;&nbsp;&nbsp;注：</span>
									</td>
									<td height="25" align="left" bgcolor="#FFFFFF">
										<textarea name="remark" id="remark" class="textarea ui-widget-content ui-corner-all"></textarea>
									</td>
								</tr>
								
								<tr>
									<td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
										<input type="Submit" name="btn_submit" id="btn_submit" value="添加"/>
										&nbsp;&nbsp;
										<input name="fanhui" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
									</td>
								</tr>
							</table>
						</div>
						
				  </div>
		    </form>
	   </div>
	</div>
</body>
</html>