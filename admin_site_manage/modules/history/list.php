<?php
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
 	<script language="javascript">
 	$(function () {
		$("#selectAll").click(function () {//全选
			$(".maincontent :checkbox").attr("checked", true);
		});
		
		$("#unselectAll").click(function () {//全不选 
			$(".maincontent :checkbox").attr("checked", false); 
		});
		
		$("#del").click(function () {//删除 
			var flag = false;
			var id = "";
			$(".maincontent :checkbox").each(function () {  
				if ($(this).attr("checked"))  {
					flag = true;
					id += $(this).val() + ",";
				}
			});
			if (!flag) {
				alert("请选择要删除的信息！");
				return false;
			}
			if (flag) {
				id = id.substr(0, id.length - 1);
			}
			submitDel(id);
		});  
	}); 
	
	function submitDel(id) {
		$("#form1 [name=\"id\"]").val(id);
		$("#form1").submit();
	}

	function Del() {
		if(confirm("确定要删除吗？一旦删除不能恢复！"))
			return true;
		else
			return false;
	}

	function ConfirmDelSmall() {
		if(confirm("确定要删除吗？\n将删除此栏目下所有栏目！"))
			return true;
		else
			return false;
	}
	</script>
</head>

<body class="main_body">
	<div class="the_title">
		<div class="title_text">登录历史</div>
	</div>
	<div class="file_title">
	当前位置：<a href="../../index.php" target="_top">管理首页</a> &gt; 登录历史
	</div>
	
	<div class="maincontent" style="text-align:center;">
		<table width="100%" height="27"  cellpadding="0" cellspacing="0" style="background:url(../../resources/images/sechbg.gif) repeat-x">
			<tr>
				<td style="padding-left:10px"> 
					<strong>最近登录状况</strong>				
				</td>
				<td width="45%" align="right" style="padding-right:10px;">
				</td>
			</tr>
		</table>
	
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" onMouseOver="changeto()"  onmouseout="changeback()" bgcolor="#dbdbdb">
			<tr class="tab_title">
				<td width="0%"></td>
				<td width="2%" align="center">&nbsp;</td>
				<td width="3%" align="center"><span id="ari">ID</span></td>
				<td width="20%" align="center">用户</td>
				<td width="20%" align="center">IP地址</td>
				<td width="30%" align="center">登录日期</td>
				<td width="30%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;操作</td>
			</tr>
	
			<?php
				$historyManager = ManagerFactory::getHistoryManager();
				
				$pagesize = 10;
				$total = $historyManager->GetLoginHistoryCount();
				if($total == ""){
					$result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
					$total = 1;
				}
				$pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
				
				if($_GET["PB_page"] == ""){
					$_GET["PB_page"]= 1;
				}
				$loginHistorys = $historyManager->GetLoginHistoryList($pagingbean->offset(), $pagesize);
				if ($loginHistorys != null) {
					foreach($loginHistorys as $rs) {
			?>
			<tr>
					<td bgcolor="#FFFFFF" height="23px" align="center">&nbsp;</td>
					<td bgcolor="#FFFFFF" height="23px" align="center"><input type="checkbox" id="id" value="<?=$rs->id?>" /></td>
					<td bgcolor="#FFFFFF" height="23px" align="center"><?=$rs->id?></td>
					<td bgcolor="#FFFFFF" height="23px" align="center"><?=$rs->user?></td>
					<td bgcolor="#FFFFFF" height="23px" align="center"><?=$rs->ip?></td>
					<td bgcolor="#FFFFFF" height="23px" align="center"><?=$rs->date?></td>
					<td bgcolor="#FFFFFF" height="23px" align="center">
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="del.php?action=del&id=<?=$rs->id?>" onClick="Del();"><img src="../../resources/images/11.gif"/>&nbsp;删除</a>
					</td>
			</tr>
			<?
					} 
				}
			?>
		</table>
	<div>
	<form action="del.php" method="post" name="form1" id="form1">
		<input type="hidden" name="action" value="del"/>
		<input type="hidden" name="id" value=""/>
		<input type="hidden" name="PB_page" value="<?=$_GET["PB_page"];?>"/>
	</form>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" onMouseOver="changeto()"  onmouseout="changeback()" bgcolor="#dbdbdb">
			<tr class="tab_title">
			<td>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0)" id="selectAll"><img src="../../resources/images/format.gif">全选</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" id="unselectAll"><img src="../../resources/images/edit.gif">取消</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" id="del"><img src="../../resources/images/11.gif"/>删除</a>&nbsp;&nbsp;
      </td>
   	</tr>
	</table>
	<p>&nbsp;&nbsp;</p>
	
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
</body>
<script src="../../resources/js/row_color.js" language="javascript"></script>
<script src="../../resources/js/check.list.js" ></script>
