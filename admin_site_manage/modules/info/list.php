<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="../../resources/images/all_css.css" rel="stylesheet" type="text/css" />
	<script src="../../../resources/scripts/jquery1.42.min.js"></script>
	<script src="../../resources/js/huanse.js"></script>
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

<body class="main_body" id="body">

	<div class="more_login">
		<span style="float:right;"></span>
		<? include("../common/loginTip.php");?>
	</div>
	<?
		$categoryManager = ManagerFactory::getCategoryManager();
		$categoryobj = $categoryManager->GetCatObjectByCatId($catId);
		if (is_object($categoryobj)) {
			$childCategorys = $categoryManager->GetCatListByParentId($categoryobj->catId);
			$childCategorysNum = $categoryManager->GetCatCountByParentId($categoryobj->catId);
		}
	?>	
	<div class="the_title">
		<div class="title_text"><?=$categoryobj->catName?></div>
	</div>

	<?
		if ($childCategorysNum != 0) {
	?>
	<div class="file_title"><!--../info/list.php?catId=-->
		当前位置：栏目管理 <?=Position::cat("",$catId)?>
	</div>
	
	<div class="maincontent" style="text-align:center;">
		<table width="100%" height="27"  cellpadding="0" cellspacing="0" style="background:url(../../resources/images/sechbg.gif) repeat-x">
			<tr>
				<td style="padding-left:10px"> 
					<strong>栏目管理</strong>				</td>
				<td width="45%" align="right" style="padding-right:10px;">				</td>
			</tr>
		</table>
		
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" onMouseOver="changeto()"  onmouseout="changeback()" bgcolor="#dbdbdb">
		<tr class="tab_title">
			<td width="26%" height="25" align="center">
				栏目名称
			</td>
			<td width="16%" height="24" align="center">
				栏目图片
			</td>
			<td width="10%" height="24" align="center">
				子栏目数
			</td>
			<td width="10%" height="24" align="center">
				显示方式
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
		$categorys = $categoryManager->GetCatListByParentId($catId);;
		if ($categorys != null) {
			foreach($categorys as $row) {
				$childCategorys = $categoryManager->GetCatListByParentId($row->catId);
				$num = $categoryManager->GetCatCountByParentId($row->catId);
		?>
		<tr>
			<td height="20" align="center" bgcolor="#FFFFFF">
				<a href="list.php?catId=<?=$row->catId?>" class="liw" title="点击进入添加下一级栏目">
				<? echo $row->catName?>
				</a>
			</td>
			<td align="center" bgcolor="#FFFFFF">
			<? if($row->imgPath) { ?>
				<img src="../<?=$row->imgPath?>" width="40" height="40"/>
			<? } else { ?>
				<img src="../../resources/images/zanwu.gif" width="40" height="40"/>
			<? } ?>					  
			</td>
			<td align="center" bgcolor="#FFFFFF"><?=$num?></td>
			<td align="center" bgcolor="#FFFFFF"><? Tool::convertStyle($row->style)?></td>
			<td align="center" bgcolor="#FFFFFF"><?=$row->seqNo?></td>
			<td align="center" bgcolor="#FFFFFF">
				<a href="javascript:void(0);" onClick="javascript:isShow('<?=$row->catId?>','<? Tool::convertNoIsShow($row->isShow)?>')">
					<? Tool::convertIsShow($row->isShow)?>
				</a>
			</td>
			<td align="center" bgcolor="#FFFFFF">
				请在栏目管理模块中操作
			</td>
		</tr>
		<? 
			}
		}
		 ?>
		</table>
	</div>
	<?
		} else {
	?>
	<div class="file_title"><!--../info/list.php?catId=-->
		当前位置：资讯管理 <?=Position::cat("",$catId)?>
	</div>
	
	<div class="maincontent" style="text-align:center;">
		<table width="100%" height="27"  cellpadding="0" cellspacing="0" style="background:url(../../resources/images/sechbg.gif) repeat-x">
			<tr>
				<td style="padding-left:10px"> 
					<strong>资讯管理</strong>				</td>
				<td width="45%" align="right" style="padding-right:10px;">
					<a href="initAdd.php?catId=<?=$_GET["catId"]?>" title="添加资讯">
					[添加资讯]					</a>				</td>
			</tr>
		</table>
		
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" onMouseOver="changeto()"  onmouseout="changeback()" bgcolor="#dbdbdb">
		<tr class="tab_title">
			<td width="52%" height="25" align="center">
				资讯标题
			</td>
			<td width="21%" height="24" align="center">
				创建时间
			</td>
			<td width="8%" height="24" align="center">
				排序
			</td>
			<td width="14%" height="24" align="center">
				操作
			</td>
		</tr>
		
		<?
		
		$infoManager = ManagerFactory::getInfoManager();
		
		$pagesize = 10;		
		$total = $infoManager->GetInfoCountByCatId($catId);
		if($total == ""){
			$result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
	  	$total = 1;
	  }
		$pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));

		if($_GET["PB_page"] == ""){
			$_GET["PB_page"]= 1;
		}
		$infos = $infoManager->GetInfoListByCatId($catId, $pagingbean->offset(), $pagesize);
		if ($infos != null) {
			foreach($infos as $row) {
			
		?>
		<tr>
			<td height="20" align="center" bgcolor="#FFFFFF">
				<a href="initEdit.php?action=edit&infoId=<?=$row->infoId?>&catId=<?=$catId?>" class="liw" title="点击进入添加编辑页面">
				<? echo $row->title?>
				</a>
			</td>
			<td align="center" bgcolor="#FFFFFF"><?=$row->createTime?></td>
			<td align="center" bgcolor="#FFFFFF"><?=$row->seqNo?></td>
			<td align="center" bgcolor="#FFFFFF">
				<a href="initEdit.php?action=edit&infoId=<?=$row->infoId?>&catId=<?=$catId?>"> 
					<img src="../../resources/images/edt.gif" width="16" height="16" border="0" />编辑
				</a>
				&nbsp;
				<a href="del.php?action=del&infoId=<?=$row->infoId?>&catId=<?=$catId?>" onClick="return confirmDel();">
					<img src="../../resources/images/del.gif" width="16" height="16" border="0" />删除
				</a>
			</td>
		</tr>
		<? 
			}
		}
		 ?>
		</table>
	</div>
	
	<dl style="clear:both">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
			<tr>
				<td width="29%" class="STYLE4">
					&nbsp;&nbsp;
					共有<?=$total?>条记录，当前第<?=$_GET["PB_page"];?>/<?=$pagingbean->totalpage?>页，<?=$pagesize?>条/页
				</td>
				<td width="25%" align="left" class="STYLE4">
				<td align="left" class="STYLE4">&nbsp;</td>
        <td width="23%" align="right" valign="middle">
					<?=$pagingbean->show(3)?>
				</td>
			</tr>
		</table>	
	</dl>	
	<?
		}
	?>
	<form id="modifyForm" name="modifyForm" action="modify.php" method="post">
		<input type="hidden" name="action" value="edit"/>
		<input type="hidden" name="oper" value="isshow"/>
		<input type="hidden" name="catId" value=""/>
		<input type="hidden" name="parentId" value="<?=$catId?>"/>
	</form>
	
</body>
<script src="../../resources/js/tu.js"  language="javascript"></script>
