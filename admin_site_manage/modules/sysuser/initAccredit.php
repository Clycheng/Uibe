<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "accredit") {
		$sysUserManager = ManagerFactory::getSysUserManager();
		$sysUser = $sysUserManager->GetSysUserByUserId($uId);
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
  
  <link href="/admin_site_manage/resources/ztree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/admin_site_manage/resources/ztree/js/jquery.ztree.core-3.5.min.js"></script>
	<script type="text/javascript" src="/admin_site_manage/resources/ztree/js/jquery.ztree.excheck-3.5.min.js"></script>
	
	<script type="text/javascript">
	<!--
		var setting = {
			check: {
				enable: true
			},
			data: {
				simpleData: {
					enable: true
				}
			}
		};
		var zNodes =[
			<? MenuUtil::channelTree("0", $sysUser->rights,$sysUser->catrights) ?>			
		];
		
		$(document).ready(function(){
			$.fn.zTree.init($("#channelTree"), setting, zNodes);
		});
		//-->
		
		function accredit() {
			var zTree = $.fn.zTree.getZTreeObj("channelTree");
			var nodes = zTree.getCheckedNodes();
			var rights = "";
			var catrights = "";
			for (var i=0, l=nodes.length; i<l; i++) {
				var id = nodes[i].id;
				if (id.indexOf('cat_') != -1) {
					catrights += id.substr(4) + ",";
				} else {
					rights += id + ",";
				}
			}
			if (rights.lastIndexOf(",") != -1) {
				rights = rights.substr(0, rights.lastIndexOf(","));
			}
			if (catrights.lastIndexOf(",") != -1) {
				catrights = catrights.substr(0, catrights.lastIndexOf(","));
			}
			$("#rights").val(rights);
			$("#catrights").val(catrights);
			$("#accreditForm").submit();
		}
	</script>
	
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
        <div id="tabs">
           <ul>
              <li><a href="#tabs-1">用户操作</a></li>
           </ul>
           <div class="tabs-spacer"></div>
           <div id="tabs-1">

						<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
							<tr class="ui-widget-header">
								<td height="25" colspan="2" align="center">
									权限/操作
								</td>
							</tr>
							<tr>
								<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
									<span>后台权限：</span>
								</td>
								<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
									
									<ul id="channelTree" class="ztree"></ul>
								</td>
							</tr>
											
							<tr>
								<td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
									<input type="button" name="btn_submit" id="btn_submit" value="确认" onClick="accredit()"/>
									&nbsp;&nbsp;
									<input name="fanhui" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
								</td>
							</tr>
						</table>
					</div>
			  </div>
				 
				<form action="accredit.php" method="post" name="accreditForm" id="accreditForm">
					<input type="hidden" name="action" value="edit"/>
					<input type="hidden" name="uId" value="<?=$uId?>"/>
					<input type="hidden" name="rights" id="rights" value=""/>
					<input type="hidden" name="catrights" id="catrights" value=""/>			
				</form>
	   </div>
	 </div>
</body>
<?
	}
?>

</html>