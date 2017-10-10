<? 
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="../../resources/images/all_css.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../resources/js/huanse.js"></script>
	<script type="text/javascript" src="../../resources/js/tu.js"></script>
	<script charset="utf-8" src="../../resources/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="../../resources/kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../../resources/DatePicker/WdatePicker.js" type="text/javascript"></script>
	<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});
	</script>
</head>

<body class="main_body" id="body">
	<div class="more_login">
		<span style="float:right;"></span>
		<? include("../common/loginTip.php");?>
	</div>
	
	<div class="the_title">
		<div class="title_text">资讯管理</div>
	</div>
	
	<div class="file_title">
		当前位置：栏目管理
		<?=Position::Location("../newExhibition/list.php?catId=",$catId)?>
	</div>
	
	<div class="maincontent" style="text-align:center;">
	
		<form action="../newExhibition/add.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb" onMouseOver="changeto()"  onmouseout="changeback()">
				<tr class="tab_title">
					<td height="25" colspan="2" align="center">
						添加资讯
					</td>
				</tr>
				<tr>
					<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">标题：</span>
					</td>
					<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
						<input name="action" type="hidden" value="add"/>
						<input name="catId" type="hidden" value="<?=$_GET["catId"] ?>"/>
						<input name="title" type="text" id="title" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">图片：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input type="file" name="imgPath" id="imgPath" class="input_txt"/>
						<span style="color:red;">(注：允许上传:gif, png, jpeg, jpg)</span>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">图片Alt：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="imgAlt" type="text" id="imgAlt" value="" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">缩略图：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input type="file" name="thumbnailPath" id="thumbnailPath" class="input_txt"/>
						<span style="color:red;">(注：允许上传:gif, png, jpeg, jpg)</span>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">缩略图Alt：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="thumbnailAlt" type="text" id="thumbnailAlt" value="" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">展览时间：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="time" type="text" id="time" value="" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">展览场地：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<textarea name="place" style="width:280px; height:100px; border:1px solid #dbdbdb; "></textarea>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">场馆地址：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<textarea name="address" style="width:280px; height:100px; border:1px solid #dbdbdb; "></textarea>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">排序：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="seqNo" type="text" id="seqNo" value="0" size="5" class="input_seq_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">SEO标题：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="seoTitle" type="text" id="seoTitle" value="" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">SEO关键词：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<input name="seoKey" type="text" id="seoKey" value="" class="input_txt"/>
					</td>
				</tr>
				
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">SEO描述：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<textarea name="seoDescription" style="width:280px; height:100px; border:1px solid #dbdbdb; "></textarea>
					</td>
				</tr>
								
				<tr>
					<td height="25" align="right" bgcolor="#FFFFFF">
						<span class="table_title">资讯内容：</span>
					</td>
					<td height="25" align="left" bgcolor="#FFFFFF">
						<textarea name="content" id="content" style="width:100%; height:300px; border:1px solid #dbdbdb; "></textarea>
					</td>
				</tr>
				
				<tr>
					<td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
						<input type="Submit" class="anniu" name="Submit" value="添加"/>
						&nbsp;&nbsp;
						<input name="fanhui" type="button" class="anniu" id="submit2" value="返回" onclick='javascript:history.go(-1)';/>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<br>
	<br>
</body>
