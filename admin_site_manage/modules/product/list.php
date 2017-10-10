<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
$categoryManager = ManagerFactory::getCategoryManager();
$categoryobj = $categoryManager->GetCatObjectByCatId($catId);
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
  function putTop(Id,oper) {
    $("[name=\"modifyForm\"]").find("input[name=oper]").val(oper);
    $("[name=\"modifyForm\"]").find("input[name=pId]").val(Id);
    javascript:document.modifyForm.submit();
  }
	function isShow(Id,Info) {
		if(confirm('是否确定设置此栏目在前台'+Info+'？')) {
			$("[name=\"modifyForm\"]").find("input[name=catId]").val(Id);
			javascript:document.modifyForm.submit();
		}
	}
	</script>

</head>

  <div id="tabs">
     <ul>
        <li><a href="#tabs-1"><?=$categoryobj->catName?></a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
       <div style="padding:10px">
        <span class="ui-icon ui-icon-home" style="float:left"></span>
        当前位置：内容管理 <?=Position::cat("",$catId)?>
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
                <strong><?=$categoryobj->catName?></strong>       
              </td>
              <td width="45%" align="right" height="40">
                <a href="initAdd.php?catId=<?=$_GET["catId"]?>" title="添加">
                  <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
                    <span class="ui-icon ui-icon-plus" style="float:left"></span>添加
                  </span>     
                </a>
              </td>
            </tr>
          </table>
        </div>
	
        <div id="table-body-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">		
              <td width="10%" height="25" align="center">
                编号
              </td>
              <td width="30%" height="25" align="center">
                产品名称
              </td>
              <td width="20%" height="24" align="center">
                创建时间
              </td>
				      <td width="10%" height="24" align="center">
				        是否置顶
				      </td>
							<td width="10%" height="24" align="center">
								排序
							</td>
							<td width="20%" height="24" align="center">
								操作
							</td>
						</tr>
						
						<?
						$productManager = ManagerFactory::getProductManager();
						$pagesize = 10;
						$total = $productManager->GetProductCountByCatId($catId);
						if($total == ""){
							$result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
					  	$total = 1;
					  }
						$pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
						
						if($_GET["PB_page"] == ""){
							$_GET["PB_page"]= 1;
						}
						$products = $productManager->GetProductListByCatId($catId, $pagingbean->offset(), $pagesize);
						if ($products != null) {
							foreach($products as $row) {
							
						?>
						<tr>
						  <td align="center" bgcolor="#FFFFFF"><?=$row->pId?></td>
							<td height="20" align="center" bgcolor="#FFFFFF">
								<a href="../product/initEdit.php?action=edit&pId=<?=$row->pId?>&catId=<?=$catId?>" class="liw" title="点击进入编辑页面">
								<? echo $row->name ?>
								</a>
							</td>
				      <td align="center" bgcolor="#FFFFFF"><?=$row->createTime?></td>
				      <td align="center" bgcolor="#FFFFFF">
				      <a href="javascript:void(0);" onclick="javascript:putTop('<?=$row->pId?>','putTop');">
				      <?=Tool::convertPutTop($row->putTop)?>
				      </a>
				      </td>
							<td align="center" bgcolor="#FFFFFF"><?=$row->seqNo?></td>
							<td align="center" bgcolor="#FFFFFF">
								<a href="../proimg/list.php?pId=<?=$row->pId?>&catId=<?=$catId?>"> 
									<span class="ui-state-default ui-corner-all" style="padding:6px 16px 6px 16px; float:left">
                    案例
                  </span>
								</a>
								&nbsp;
								<a href="initEdit.php?action=edit&pId=<?=$row->pId?>&catId=<?=$catId?>"> 
									<span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                    <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
                  </span>
								</a>
								&nbsp;
								<a href="del.php?action=del&pId=<?=$row->pId?>&catId=<?=$catId?>" onClick="return confirmDel();">
									<span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
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
	        <? if ($products != null) { ?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
						<tr>
							<td width="29%">
								&nbsp;&nbsp;
								共有<?=$total?>条记录，当前第<?=$_GET["PB_page"];?>/<?=$pagingbean->totalpage?>页，<?=$pagesize?>条/页
							</td>
							<td width="25%" align="left"></td>
							<td align="left">&nbsp;</td>
			        <td width="23%" align="right" valign="middle">
								<?=$pagingbean->show(3)?>
							</td>
						</tr>
					</table>	
					<? }?>
				  <form id="modifyForm" name="modifyForm" action="modify.php" method="post">
				    <input type="hidden" name="action" value="edit"/>
				    <input type="hidden" name="oper" value="putTop"/>
				    <input type="hidden" name="pId" value=""/>
				    <input type="hidden" name="parentId" value="<?=$catId?>"/>
				  </form>
				</div>
		</div>
</body>
</html>