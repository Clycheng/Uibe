<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
if ($catId == "") {
  $catId = 0;
}
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

	function isShow(parentId, Id,Info) {
		if(confirm('是否确定设置此栏目在前台'+Info+'？')) {
			$("[name=\"modifyForm\"]").find("input[name=catId]").val(Id);
			$("[name=\"modifyForm\"]").find("input[name=parentId]").val(parentId);
			javascript:document.modifyForm.submit();
		}
	}
	</script>
</head>

<body>

  <div id="tabs">
     <ul>
        <li><a href="#tabs-1">栏目管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
		   <div style="padding:10px">
		    <span class="ui-icon ui-icon-home" style="float:left"></span>
		    当前位置：系统设置 > <a href="list.php?catId=0">栏目管理</a> <?=Position::cat("../category/list.php?catId=",$catId)?>
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
			          <strong>栏目管理</strong>       
			        </td>
			        <td width="45%" align="right" height="40">
			          <a href="initAdd.php?parentId=<?=$_GET["catId"]?>&path=<?=$_GET["path"]?>" title="添加栏目">
			            <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
			              <span class="ui-icon ui-icon-plus" style="float:left"></span>添加栏目
			            </span>     
			          </a>
			        </td>
			      </tr>
	        </table>
	       </div>
	       <div id="table-body-contain" class="ui-widget">
			    <table class="ui-widget ui-widget-content">
				    <tr class="ui-widget-header">
				      <td width="26%" height="40" align="center">
				        栏目名称
				      </td>
				      <td width="18%" height="40" align="center">
				        栏目图片
				      </td>
				      <td width="10%" height="40" align="center">
				        子栏目数
				      </td>
				      <td width="10%" height="40" align="center">
				        显示方式
				      </td>
				      <td width="7%" height="40" align="center">
				        排序
				      </td>
				      <td width="11%" height="40" align="center">
				        状态（点击设置）
				      </td>
				      <td width="13%" height="40" align="center">
				        操作
				      </td>
				    </tr>
				    
				    <?
				    $categoryManager = ManagerFactory::getCategoryManager();
				    $categorys = $categoryManager->GetCatListByParentId($catId);
				    if (is_array($categorys)) {
				      foreach ($categorys as $row) {
				        $childCategorys = $categoryManager->GetCatListByParentId($row->catId);
				        $num = $categoryManager->GetCatCountByParentId($row->catId);
				    ?>
				    <tr>
				      <td height="30" align="center" bgcolor="#FFFFFF">
				        <a href="list.php?parentId=<?=$row->parentId?>&catId=<?=$row->catId?>&path=<?=$row->path?>" class="liw" title="点击进入添加下一级栏目">
				        <? echo $row->catName?>
				        </a>
				      </td>
				      <td align="center" bgcolor="#FFFFFF">
				      <? if($row->imgPath) { ?>
				        <img src="<?=$row->imgPath?>" width="40" height="40"/>
				      <? } else { ?>
				        <img src="../../resources/images/zanwu.gif" width="40" height="40"/>
				      <? } ?>           
				      </td>
				      <td align="center" bgcolor="#FFFFFF">
				      <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px;">
				        <?=$num?>
				      </span>
				      </td>
				      <td align="center" bgcolor="#FFFFFF"><? Tool::convertStyle($row->style)?></td>
				      <td align="center" bgcolor="#FFFFFF">
				        <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px;">
				        <?=$row->seqNo?>
				        </span>
				      </td>
				      <td align="center" bgcolor="#FFFFFF">
				        <a href="javascript:void(0);" onClick="javascript:isShow('<?=$row->parentId?>','<?=$row->catId?>','<? Tool::convertNoIsShow($row->isShow)?>')">
				          <? Tool::convertIsShow($row->isShow)?>
				        </a>
				      </td>
				      <td align="center" bgcolor="#FFFFFF">
				          <a href="initEdit.php?action=edit&catId=<?=$row->catId?>&parentId=<?=$row->parentId?>&path=<?=$row->path?>"> 
				            <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
				              <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
				            </span>
				          </a>
				          <a href="del.php?action=del&catId=<?=$row->catId?>&parentId=<?=$row->parentId?>" onClick="return confirmDel();">
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
  </div>
  
  <form id="modifyForm" name="modifyForm" action="modify.php" method="post">
    <input type="hidden" name="action" value="edit"/>
    <input type="hidden" name="oper" value="isshow"/>
    <input type="hidden" name="catId" value=""/>
    <input type="hidden" name="parentId" value=""/>
  </form>

</body>
</html>
