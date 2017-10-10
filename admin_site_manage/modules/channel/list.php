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

	function isShow(Id,Info) {
		if(confirm('是否确定设置此频道在后台'+Info+'？')) {
			$("[name=\"modifyForm\"]").find("input[name=cId]").val(Id);
			javascript:document.modifyForm.submit();
		}
	}
	</script>

</head>

<body>
  <div id="tabs">
     <ul>
        <li><a href="#tabs-1">频道管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
       <div style="padding:10px">
        <span class="ui-icon ui-icon-home" style="float:left"></span>
        当前位置：<a href="list.php?parentId=0">频道管理</a> <?=Position::channel("../channel/list.php?parentId=",$parentId)?>
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
                <strong>频道管理</strong>       
              </td>
              <td width="45%" align="right" height="40">
                <a href="initAdd.php?parentId=<?=$_GET["parentId"]?>&path=<?=$_GET["path"]?>" title="添加资讯">
                  <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
                    <span class="ui-icon ui-icon-plus" style="float:left"></span>添加频道
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
								序号
							</td>
							<td width="52%" height="25" align="center">
								频道名称
							</td>
							<td width="11%" height="24" align="center">
								子频道数
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
						$channelManager = ManagerFactory::getChannelManager();
						$channels = $channelManager->GetChannelListByParentId($parentId);
						$index = 0;
						if ($channels != null) {
							foreach($channels as $row) {
								$index++;
								$childchannels =  $channelManager->GetChannelListByParentId($row->cId);
								$num = $channelManager->GetChannelCountByParentId($row->cId);
						?>
						<tr>
							<td height="20" align="center" bgcolor="#FFFFFF">
								<?=$index?>
							</td>
							<td height="20" align="center" bgcolor="#FFFFFF">
								<a href="list.php?parentId=<?=$row->cId?>&path=<?=$row->path?>" class="liw" title="点击进入添加下一级栏目">
								<? echo $row->name?>
								</a>
							</td>
							<td align="center" bgcolor="#FFFFFF"><?=$num?></td>
							<td align="center" bgcolor="#FFFFFF"><?=$row->seqNo?></td>
							<td align="center" bgcolor="#FFFFFF">
								<a href="javascript:void(0);" onClick="javascript:isShow('<?=$row->cId?>','<? Tool::convertNoIsShow($row->isShow)?>')">
									<? Tool::convertIsShow($row->isShow)?>
								</a>
							</td>
							<td align="center" bgcolor="#FFFFFF">
								<a href="initEdit.php?action=edit&cId=<?=$row->cId?>&parentId=<?=$parentId?>"> 
									<span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                    <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
                  </span>
								</a>
								&nbsp;
								<a href="del.php?action=del&cId=<?=$row->cId?>&parentId=<?=$parentId?>" onClick="return confirmDel();">
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
     </div>
			<form id="modifyForm" name="modifyForm" action="modify.php" method="post">
				<input type="hidden" name="action" value="edit"/>
				<input type="hidden" name="oper" value="isshow"/>
				<input type="hidden" name="cId" value=""/>
				<input type="hidden" name="parentId" value="<?=$parentId?>"/>
			</form>
  </div>
</body>
</html>