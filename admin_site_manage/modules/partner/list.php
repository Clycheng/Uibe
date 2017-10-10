<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
$categoryManager = ManagerFactory::getCategoryManager();
$categoryobj = $categoryManager->GetCatObjectByCatId($catId);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
		if(confirm('是否确定设置此栏目在前台'+Info+'？')) {
			$("[name=\"modifyForm\"]").find("input[name=catId]").val(Id);
			javascript:document.modifyForm.submit();
		}
	}
	</script>

</head>

<body>

  <div id="tabs">
     <ul>
        <li><a href="#tabs-1"><?=$categoryobj->catName?></a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
       <div style="padding:10px">
        <span class="ui-icon ui-icon-home" style="float:left"></span>
        当前位置：内容管理 <?=Position::Location("list.php?catId=",$catId)?>
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
	     
	     <div id="table-header-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">
              <td width="55%" height="40" style="padding-left:13px"> 
                <strong><?=$categoryobj->catName?></strong>       
              </td>
              <td width="45%" align="right" height="40">
                <a href="initAdd.php?catId=<?=$catId?>" title="添加">
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
					      <td width="8%" height="25" align="center">
					        编号
					      </td>
					      <td width="50%" height="24" align="center">
					        标题
					      </td>
					      <td width="13%" height="24" align="center">
					        创建时间
					      </td>
					      <td width="11%" height="24" align="center">
					        排序
					      </td>
					      <td width="13%" height="24" align="center">
					        操作
					      </td>
					    </tr>
				    
					    <?
					    $partnerManager = ManagerFactory::getPartnerManager();
					    $pagesize = 10;
					    $total = $partnerManager->GetPartnerCountByCatId($catId);
					    if($total == ""){
					      $result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
					      $total = 1;
					    }
					    $pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
					    
					    if($_GET["PB_page"] == ""){
					      $_GET["PB_page"]= 1;
					    }
					    $partners = $partnerManager->GetPartnerListByCatId($catId, $pagingbean->offset(), $pagesize);
					    if ($partners != null) {
					      foreach($partners as $row) {
					      
					    ?>
					    <tr>
					     <td align="center" bgcolor="#FFFFFF"><?=$row->pId?></td>
					      <td height="20" align="center" bgcolor="#FFFFFF">
					        <a href="initEdit.php?action=edit&pId=<?=$row->pId?>&catId=<?=$catId?>" class="liw" title="点击进入编辑页面">
					        <? echo $row->title ?>
					        </a>
					      </td>
					      <td align="center" bgcolor="#FFFFFF"><?=$row->createTime?></td>
					      <td align="center" bgcolor="#FFFFFF">
					      <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px;">
					        <?=$row->seqNo?>
					      </span>
					      </td>
					      <td align="center" bgcolor="#FFFFFF">
					        <a href="initEdit.php?action=edit&pId=<?=$row->pId?>&catId=<?=$catId?>"> 
					          <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                      <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
                    </span>
					        </a>
					        &nbsp;
					        <a href="del.php?action=del&pId=<?=$row->pId?>&catId=<?=$catId?>" onClick="return confirmDel();">
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
	       
	      <? if ($partners != null) { ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
				  <tr>
					  <td width="30%" class="STYLE4">
					     &nbsp;&nbsp;
					     共有<?=$total?>条记录，当前第<?=$_GET["PB_page"];?>/<?=$pagingbean->totalpage?>页，<?=$pagesize?>条/页
					  </td>
					  <td width="20%" align="left" class="STYLE4"></td>
					  <td width="20%" align="left" class="STYLE4">&nbsp;</td>
					  <td width="30%" align="right" valign="middle">
					    <?=$pagingbean->show(3)?>
					  </td>
				  </tr>
				</table>
				<? } ?>  
	   </div>
  </div>

</body>
</html>