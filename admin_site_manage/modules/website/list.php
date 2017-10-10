<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css"/>
  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  
  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
	<script>
	function confirmDel() {
		if(confirm("确定要删除吗？一旦删除不能恢复！")) {
			return true;
		} else {
			return false;
		}
	}

	function isDisabled(Id,Info) {
		if(confirm('是否确定设置此频道在后台'+Info+'？')) {
			$("[name=\"modifyForm\"]").find("input[name=wId]").val(Id);
			javascript:document.modifyForm.submit();
		}
	}
	</script>

</head>

<body>
  <div id="tabs">
     <ul>
        <li><a href="#tabs-1">站点管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
       <div style="padding:10px">
        <span class="ui-icon ui-icon-home" style="float:left"></span>
        当前位置：站点管理 
       </div>
        
        <?
          if ($_SESSION["success_msg"] != null) {
        ?>
        <div class="ui-widget" id="tip">
          <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px;padding: 0 .7em;">
            <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
            <?=$_SESSION["success_msg"]?> </p>
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
            $_SESSION["success_msg"] = null;
          }
        ?>
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
        
        <div id="table-header-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">
              <td width="55%" height="40" style="padding-left:13px"> 
                <strong>站点管理</strong>       
              </td>
              <td width="45%" align="right" height="40">
                <a href="initAdd.php" title="添加站点">
                  <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
                    <span class="ui-icon ui-icon-plus" style="float:left"></span>添加站点
                  </span>     
                </a>
              </td>
            </tr>
          </table>
        </div>
        <div id="table-body-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">
						
							<td width="4%" height="25" align="center">
								ID
							</td>
							<td width="32%" height="25" align="center">
								站点名称
							</td>
							<td width="31%" height="24" align="center">
								Url
							</td>
							<td width="8%" height="24" align="center">
								排序
							</td>
							<td width="11%" height="24" align="center">
								状态（点击设置）
							</td>
							<td width="14%" height="24" align="center">
								操作
							</td>
						</tr>
		
						<?
						$webConfigManager = ManagerFactory::getWebConfigManager();
						
						$pagesize = 10;		
						$total = $webConfigManager->GetWebConfigCount();
						if($total == ""){
							$result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
					  	$total = 1;
					  }
						$pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
				
						if($_GET["PB_page"] == ""){
							$_GET["PB_page"]= 1;
						}
						$webConfigs = $webConfigManager->GetWebConfigList($pagingbean->offset(), $pagesize);
						if ($webConfigs != null) {
							foreach($webConfigs as $row) {
						?>
						<tr>
							<td height="20" align="center" bgcolor="#FFFFFF">
								<?=$row->wId?>
							</td>
							<td height="20" align="center" bgcolor="#FFFFFF">
								<? echo $row->name?>
							</td>
							<td align="center" bgcolor="#FFFFFF"><?=$row->url?></td>
							<td align="center" bgcolor="#FFFFFF"><?=$row->seqNo?></td>
							<td align="center" bgcolor="#FFFFFF">
								<a href="javascript:void(0);" onClick="javascript:isDisabled('<?=$row->wId?>','<? Tool::convertNoIsDisabled($row->isDisabled)?>')">
									<? Tool::convertIsDisabled($row->isDisabled)?>
								</a>
							</td>
							<td align="center" bgcolor="#FFFFFF">
								<a href="initEdit.php?action=edit&wId=<?=$row->wId?>"> 
									<span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                    <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
                  </span>
								</a>
								&nbsp;
								<a href="del.php?action=del&wId=<?=$row->wId?>" onClick="return confirmDel();">
									<span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
                    <span class="ui-icon ui-icon-trash" style="float:left"></span>删除
                  </span>
								</a>
							</td>
						</tr>
						<? 
							}
						}
						 ?>
						</table>
					</div>
					<form id="modifyForm" name="modifyForm" action="modify.php" method="post">
						<input type="hidden" name="action" value="edit"/>
						<input type="hidden" name="oper" value="isDisabled"/>
						<input type="hidden" name="wId" value=""/>
					</form>
      </div>
      
   </div>
</body>
</html>