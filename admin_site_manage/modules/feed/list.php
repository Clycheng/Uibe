<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="../../resources/images/all_css.css" rel="stylesheet" type="text/css" />
	<script src="../../../resources/scripts/jquery.min.js"></script>
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
	
	<div class="the_title">
		<div class="title_text">邮箱订阅</div>
	</div>
	
	<div class="file_title">
		当前位置：内容管理 > 邮箱订阅
	</div>
	
	<div class="maincontent" style="text-align:center;">
		<table width="100%" height="27"  cellpadding="0" cellspacing="0" style="background:url(../../resources/images/sechbg.gif) repeat-x">
			<tr>
				<td style="padding-left:10px"> 
					<strong>邮箱订阅</strong>				
				</td>
				<td width="45%" align="right" style="padding-right:10px;">
				</td>
			</tr>
		</table>
		
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" onMouseOver="changeto()"  onmouseout="changeback()" bgcolor="#dbdbdb">
		<tr class="tab_title">
			<td width="46%" height="25" align="center">
				邮箱
			</td>
			<td width="40%" height="25" align="center">
				订阅时间
			</td>
			<td width="14%" height="24" align="center">
				操作
			</td>
		</tr>
		
		<?
		$feedManager = ManagerFactory::getFeedManager();
		$pagesize = 10;
		$total = $feedManager->GetFeedCount();
		if($total == ""){
			$result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
	  	$total = 1;
	  }
		$pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
		
		if($_GET["PB_page"] == ""){
			$_GET["PB_page"]= 1;
		}
		$feeds = $feedManager->GetFeedList($pagingbean->offset(), $pagesize);
		if ($feeds != null) {
			foreach($feeds as $row) {
			
		?>
		<tr>
			<td align="center" bgcolor="#FFFFFF"><?=$row->email?></td>
			<td align="center" bgcolor="#FFFFFF"><?=$row->createtime?></td>
			<td align="center" bgcolor="#FFFFFF">
				
				<a href="../feed/del.php?action=del&eId=<?=$row->eId?>" onClick="return confirmDel();">
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

</body>
<script src="../../resources/js/tu.js"  language="javascript"></script>
