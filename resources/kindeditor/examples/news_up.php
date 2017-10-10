<?php
require_once("../../include/global.php");
require_once("../../donhonet/session.php");
$date=getdate();
$addate=date("Y-m-d");

$query = "select * from news where id=$id";
$db->setQuery($query);
$por = $db->loadObject();

		$sql = "select * from news_zilei where id = $zid";
		$db->setquery($sql);
		$row_yi = $db->loadObject(); 
		
		$sqlfls = "select * from news_zilei where id = $row_yi->fuid";
		$db->setquery($sqlfls);
		$sqlflsrs = $db->loadObject(); 
		$strArr=explode(',',$sqlflsrs->leisort);
		$row_zilei = "-[".$row_yi->zititle."]";
		
		$get_km="select * from seacrh where fuid=1 order by zileipx asc";
		$db->setquery($get_km);
		$hq_km = $db->loadobjectlist(); 
		$get_bb="select * from seacrh where fuid=2 order by zileipx asc";
		$db->setquery($get_bb);
		$hq_bb = $db->loadobjectlist(); 
		$get_sj="select * from seacrh where fuid=3 order by zileipx asc";
		$db->setquery($get_sj);
		$hq_sj = $db->loadobjectlist(); 

if($Submit=="修改"){
			
$image_s = $por->image;
$image_a = $por->image_a;
$image_b = $por->image_b;
$image_cc = $por->image_c;
$image_d = $por->image_d;
$files_url = $por->files_url;


if($_FILES[image_s][name]){
		$img_s = new Image("image_s","prospic");
		if($img_s->upload()){
			$image_s = $img_s->getImgPath();
			$root = "../".$por->image;
			echo $root;
			@unlink($root);
		}else{
		echo $image_s;
		}
	}
if($_FILES[image_a][name]){
		$img_a = new Image("image_a","download");
		if($img_a->upload()){
		$image_a = $img_a->getImgPath();
		$root = "../".$por->image_a;
		@unlink($root);
		}else{
		echo $image_a;
		}
	}
if($_FILES[image_b][name]){
		$img_b = new Image("image_b","prospic");
		if($img_b->upload()){
		$image_b = $img_b->getImgPath();
		$root = "../".$por->image_b;
		@unlink($root);
		}else{
		echo $image_b;
		}
	}
if($_FILES[image_cc][name]){
		$img_cc = new Image("image_cc","prospic");
		if($img_cc->upload()){
		$image_cc = $img_cc->getImgPath();
		$root = "../".$por->image_c;
		@unlink($root);
		}else{
		echo $image_cc;
		}
	}
if($_FILES[image_d][name]){
		$img_d = new Image("image_d","prospic");
		if($img_d->upload()){
		$image_d = $img_d->getImgPath();
		$root = "../".$por->image_d;
		@unlink($root);
		}else{
		echo $image_d;
		}
	}
	
	if($_POST["files_url"]==""){
		$files_url=$por->files_url;
		}else{
		$files_url=	$_POST["files_url"];
			}
	
	$addtimess=$times.date("H:i:s");
	$addtime=strtotime($addtimess);
	if($zhuti==""){
		$zhuti=0;
		}
	$query = "update news set ziid='$zileiid',fiid='$fids',title='$title',cisu='$leisort',author='$author',zhusu='$zhusu',canyin='$canyin',image='$image_s',image_a='$image_a',image_b='$image_b',image_c='$image_cc',image_d='$image_d',files_url='$files_url',htmlurl='$url',shiping='$shiping',zhicheng='$zhicheng',jiage='$jiage',type1='$type1',type2='$type2',type3='$typec',type4='$typed',type5='$typee',content='$content',times='$addtime',toptimes='$toptimes',bottomtimes='$bottomtimes',px='$px',seo_title='$seo_title',seo_gjci='$seo_gjci',seo_type='$seo_type',tuijian='$tuijian',redian='$redian',remai='$remai',zhuti=$zhuti,tebie='$tebie',pinpai='$pinpai',hanliang='$hanliang',yuanliao='$yuanliao',chengfen='$chengfen',shiyong='$shiyong' where id = $id";
	$db->setQuery($query);
	$db->query();
	
if($tid == 100000000000){
		$path = ROOT."/admin/mod/index-1.htm";
		$array = array(
					"{-zititle-}"=>$row_yi->zititle,
					"{-title-}"=>$title,
					"{-wztitle-}"=>$author,
					"{-seotitle-}"=>$seo_title,
					"{-seogjci-}"=>$seo_gjci,
					"{-seotype-}"=>$seo_type,
					"{-content-}"=>stripslashes($content),
		);
		$html = new CreateHtml();
		$html->readTemplate($path);
		$html->createStaticHtml($array,ROOT.$url);
		$html->foreachhtml(ROOT.$url);
		$html->diqutitlehhtml(ROOT.$url,$zid);
		$html->diquleibiehtml(ROOT.$url);
	}
	$js->alert("修改成功");
	$js->Goto("news_gl.php?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=$PB_page&sou=$sou");
}


?>
<?
//登录记录语句
	$sqllog = "select * from ".$prefix."history order by id desc";
	$db->setQuery($sqllog);
	$rowlog = $db->loadObject();
	$sqllog = "select * from ".$prefix."history where id=".$rowlog->id."-1";
	$db->setQuery($sqllog);
	$rowlog = $db->loadObject();

?>
<style>
form {margin: 0;}
textarea {display: block;}
.menuNo { color:#000; cursor:pointer; line-height:28px; width:70px; float:left; text-align:center}
.menuOn { background:url(../../images/left_nei.jpg) repeat-x; color:#ff0000; width:70px; cursor:pointer; line-height:28px; float:left;text-align:center}
.list_none {display:none}
.list {margin:0px;padding:0px;height:auto}
.lwq_menuNo { color:#000; cursor:pointer; line-height:28px;}
.lwq_menuOn {  background:#0099FF; color:#fff; cursor:pointer; line-height:28px; }
.lwq_list_none {display:none; list-style:none;}
.lwq_list {margin:0px;padding:0px;height:auto}
</style>
<script src="../../js/huanse.js"></script>
<script src="../../js/date.js.js.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor-min.js"></script>
<script charset="utf-8" src="../lang/zh_CN.js"></script>
<link href="../../images/all_css.css" rel="stylesheet" type="text/css" />
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="type1"]', {
			allowFileManager : true
		});
		editor = K.create('textarea[name="type21"]', {
			allowFileManager : true
		});
		editor = K.create('textarea[name="type3"]', {
			allowFileManager : true
		});
		editor = K.create('textarea[name="type4"]', {
			allowFileManager : true
		});
		editor = K.create('textarea[name="type5"]', {
			allowFileManager : true
		});
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
		
	});	
</script>
<script language=javascript type="text/javascript"> 
    KE.show({
        id : 'type1',
        cssPath : '../editubb/index.css'
    });
</script>
</script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					fileManagerJson : '../php/file_manager_json.php'
				});
				K('#filemanager').click(function() {
					editor.loadPlugin('filemanager', function() {
						editor.plugin.filemanagerDialog({
							viewType : 'VIEW',
							dirName : 'image',
							clickFn : function(url, title) {
								K('#url').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>

<script language="javascript">
  function switchmodTag(modtag,modcontent,modk) {
    for(i=1; i <= 10; i++) {
      if (i==modk) {
        document.getElementById(modtag+i).className="menuOn";
		document.getElementById(modcontent+i).className="list";
		}
      else {
        document.getElementById(modtag+i).className="menuNo";
		document.getElementById(modcontent+i).className="list_none";
		}
    }
  }
	function lwq_switchmodTag(lwqmodtag,lwqmodcontent,lwqmodk) {
		for(i=1; i <= 20; i++){
		  if (i==lwqmodk) {
			document.getElementById(lwqmodtag+i).className="lwq_menuOn";
			document.getElementById(lwqmodcontent+i).className="lwq_list";
			}
		  else {
			document.getElementById(lwqmodtag+i).className="lwq_menuNo";
			document.getElementById(lwqmodcontent+i).className="lwq_list_none";
			}
		}
	}
  
  
  
  function lwqyanse(ids) {
  		document.getElementById(ids).className="input_hongse";
  }
  function lwq_yanseno(ids){
  		document.getElementById(ids).className="input_none";
  }
</script>

<body class="main_body">
<div class="more_login">最近登录日期：
<?=$rowlog->date?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员：<?=$rowlog->user;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP：<?=$rowlog->ip;?>&nbsp;&nbsp;&nbsp;<a href="../../news_row/login_history.php" class="grey">查看全部记录</a>
</div>
<div class="the_title">
	<div class="title_text">栏目管理</div>
</div>
<div class="file_title">管理员管理 > [栏目管理]<?=$row_zilei?></div>
<div class="maincontent">
<form action="" method="post" enctype="multipart/form-data" name="myform" id="myform" onSubmit="return checkSubmit();">
	<table height="28" border="1" cellpadding="0" cellspacing="1" style="background:url(../../images/left_nei_1.jpg) repeat-x;">
		<tr>
			<td width="100" align="center" class="lwq_menuOn" id="lwq1" onClick="lwq_switchmodTag('lwq','liwqbj','1');this.blur();">基本信息</td>
			<td width="100" align="center" class="lwq_menuNo" id="lwq2" onClick="lwq_switchmodTag('lwq','liwqbj','2');this.blur();">上传设置 </td>
			<td width="100" align="center" class="lwq_menuNo" id="lwq3" onClick="lwq_switchmodTag('lwq','liwqbj','3');this.blur();">SEO设置</td>
		</tr>
	</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list" id="liwqbj1">
	<tr class="tab_title">
		<td height="25" colspan="2" align="left"> &nbsp;基本信息</td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_1")){?>
	<tr>
		<td width="12%" height="25" align="right" bgcolor="#FFFFFF"><? if($tid==2){ echo "名称";}else{ echo "标题";}?>：</td>
		<td width="88%" height="20" align="left" bgcolor="#FFFFFF"><input name="title" type="text" class="input_none" id="title" value="<?=$por->title?>"/></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">网页标题：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="author" type="text" class="input_none" id="author"  value="<?=$por->author?>"/></td>
	</tr>
	<?php }?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF"><? if($strArr[1]=="18"){echo "年级";}else{ echo "类别";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">&nbsp;<select name="zileiid" id="zileiid">
		<?php
		$sqlz_id=mysql_query("select * from news_zilei where id='$zid'");
		$rsz_id=mysql_fetch_array($sqlz_id);
		
		$sqll = "select * from news_zilei where fuid = $tid";
		$db->setquery($sqll);
		$row_list = $db->loadObjectlist(); 
		?>
        <? foreach($row_list as $rs){ ?>
		<option value="<?=$rs->id?>" <? if( $zid==$rs->id){ ?> selected <? } ?>><?=$rs->zititle?></option>
        <? } ?>
		</select>
        <input type="hidden" name="leisort" id="leisort" value="<?=$rsz_id["leisort"]?>">
        <input type="hidden" name="fids" id="fids" value="<?=$tid?>">
        </td>
	</tr>
    <? if($strArr[1]=="18" || $strArr[1]=="21"){?>
	<tr>
	<td height="25" align="right" bgcolor="#FFFFFF">科目：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">
		<select name="zhusu" id="zhusu">
		<option value="">--请选择科目--</option>
        <? 	foreach($hq_km as $rs){?>
		<option value="<?=$rs->id?>" <? if( $por->zhusu==$rs->id){ ?> selected <? } ?>><?=$rs->zititle?>	</option>
        <? } ?>
		</select>
        </td>
	</tr>
    <? }?>
    <? if($strArr[1]=="18"){?>
    	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">版本：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">
		<select name="canyin" id="canyin">
		<option value="">--请选择版本--</option>
        <? 	foreach($hq_bb as $rs){?>
		<option value="<?=$rs->id?>" <? if( $por->canyin==$rs->id){ ?> selected <? } ?>><?=$rs->zititle?>	</option>
        <? } ?>
		</select>
		</td>
	</tr>
    <? }else if($strArr[1]=="21"){?>
    	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">版本：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">
		<select name="canyin" id="canyin">
		<option value="">--请选择试卷--</option>
        <? 	foreach($hq_sj as $rs){?>
		<option value="<?=$rs->id?>"><?=$rs->zititle?>	</option>
        <? } ?>
		</select>
		</td>
	</tr>		
		<? }?>
	<? if($row_yi->fuid==5  || $row_yi->fuid==7){?>
	<tr>
	<td height="25" align="right" bgcolor="#FFFFFF"><?php if($_GET["zid"]=="aaa"){ echo "公司网址"; }else{ echo "来源";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="pinpai" type="text" id="pinpai" class="input_none" value="<?=$por->pinpai?>"/></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF"><?php if($_GET["zid"]=="aaa"){ echo "联系电话"; }else{ echo "作者";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="bottomtimes" type="text" class="input_none" id="bottomtimes"  value="<?=$por->bottomtimes?>"></td>
	</tr>
    <? } ?>
	<?php if($_GET["zid"]=="aaaaaaa"){?>    
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">地址：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="type2" type="text" class="input_none" id="type2" value="<?=$por->type2?>"></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">路线：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="type3" type="text" class="input_none" id="type3" value="<?=$por->type3?>"></td>
	</tr>
	<?php }?>    
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">时间：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">
        <input name="times" type="text" class="input_none" id="times" onFocus="cdr.show(this)" style="width:100px;" value="<?=date("Y-m-d",$por->times);?>"></td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_12")){?>
		<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">排序：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="px" type="text" id="px" value="<?=$por->px?>" size="5" class="input_none" style="width:30px;"/></td>
	</tr>
	<?php }?>
    <? if($sqlflsrs->fuid=="noshow"){?>
	<tr class="tab_title">
		<td height="25" colspan="2" align="left" > &nbsp;类型属性</td>
	</tr>
	<tr>
		<td width="123" height="25" align="right" bgcolor="#FFFFFF">操作：</td>
		<td width="1065" height="20" align="left" bgcolor="#FFFFFF">
		<input name="tuijian" type="checkbox" id="checkbox16" value="1" <?=$por->tuijian?"checked":"";?>/>热卖推荐
		<input name="redian" type="checkbox" id="checkbox19" value="1" <?=$por->redian?"checked":"";?>/>新品上市
		<input name="tebie" type="checkbox" id="redian" value="1" <?=$por->tebie?"checked":"";?>/>特价促销
		<input name="zhiding" type="checkbox" id="checkbox17" value="1" <?=$por->zhiding?"checked":"";?>/>置顶
        <input name="zhanshi" type="checkbox" id="checkbox18" value="1" <?=$por->zhanshi?"checked":"";?>/>显示
		</td>
	</tr>
    <? } ?>
	<?php if(strstr($row_yi->xiangmu,"s_13")){?>
	<!-----------------------------编辑器开始-------------------------------->
	<tr>
		<td colspan="2" bgcolor="#FFFFFF">
        <div>
            <ul>
            	<li class="menuOn" id="mod1" onClick="switchmodTag('mod','list','1');this.blur();">内容</li>
            	<? if($zddddddddddid==1){?>
                <li class="menuNo" id="mod2" onClick="switchmodTag('mod','list','2');this.blur();">描述</li>
                <? } ?>
            </ul>
        </div>
        </td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFFF">
        <div><ul>
			<li class="list" id="list1"><textarea name="type1" id="type1" style="width:700px; height:200px; visibility:hidden;"><?=stripslashes($por->type1);?></textarea></li>
        </ul>
        </div>
        </td>
	</tr>
	<!-----------------------------编辑器结束-------------------------------->
	<?php }?>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list_none" id="liwqbj2">
	<tr class="tab_title">
		<td height="25" colspan="3" align="left"> &nbsp;上传设置</td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_6")){?>
	<tr>
		<td width="163" height="25" align="right" bgcolor="#FFFFFF">图片：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_s" type="file" id="image_s" class="file"/></td>
		<td width="512" align="left" bgcolor="#FFFFFF">
<table width="120" border="0" cellspacing="0" cellpadding="0">
	<tr>
        <td align="center"><?php if($por->image == ""){?>
        <img src="../../images/zanwu.gif" width="55" height="50"/>
        <?php }else{?>
        <img src="../<?=$por->image?>" width="120" height="110" border="0"/>
        <?php }?>
        </td>
	</tr>
	<tr>
		<td align="center"><a href="../../news_row/?tupian1=del1&id=<?=$id?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$tid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>"><img src="../../images/shancu.jpg" border="0" style="margin:3px 0;"/></a></td>
	</tr>
</table>        
        </td>
	</tr>
	<? if($strArr[1]=="18" || $strArr[1]=="21" || $strArr[1]=="22"){?>
	 <tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF">
        <input type="text" name="files_url" id="files_url" style="border:1px solid #CCC" value="<?=$por->files_url?>" /> <input type="button" id="filemanager" value="浏览服务器" />
        </td>
        <td  bgcolor="#FFFFFF"></td>
	</tr>
    <? } ?>
    <?php if($zid==222222222222222222){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">图片2：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_b" type="file" id="image_b" class="file"/></td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF">
        	<div><?php if($por->image_b == ""){?>
        <img src="../../images/zanwu.gif" width="55" height="50" border="0"/>
        <?php }else{?>
        <img src="../<?=$por->image_b?>" width="120" height="110" border="0"/>
        <?php }?>
        <a href="../../news_row/?ttupian3=del3&id=<?=$id?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$tid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>"><img src="../../images/shancu.jpg" border="0" style="margin:3px 0;"/></a>
        	</div>
        </td>
	</tr>
    <? } ?>
    <?php if($tid==11111111111111114){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_a" type="file" id="image_a" class="file"/></td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><?=$por->image_a?></td>
        <td></td>
	</tr>
    <? } ?>
    <? if($sqlflsrs->fuid==1){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">作品大图：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_b" type="file" id="image_b" class="file"/></td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF">
        	<div><?php if($por->image_b == ""){?>
        <img src="../../images/zanwu.gif" width="55" height="50" border="0"/>
        <?php }else{?>
        <img src="../<?=$por->image_b?>" width="120" height="110" border="0"/>
        <?php }?>
        <a href="../../news_row/?ttupian3=del3&id=<?=$id?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$tid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>"><img src="../../images/shancu.jpg" border="0" style="margin:3px 0;"/></a>
        	</div>
        </td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">作品大图：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_cc" type="file" id="image_cc" class="file"/></td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF">
        	<div><?php if($por->image_c == ""){?>
        <img src="../../images/zanwu.gif" width="55" height="50" border="0"/>
        <?php }else{?>
        <img src="../<?=$por->image_c?>" width="120" height="110" border="0"/>
        <?php }?>
        <a href="../../news_row/?ttupian4=del4&id=<?=$id?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$tid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>"><img src="../../images/shancu.jpg" border="0" style="margin:3px 0;"/></a>
        	</div>
        </td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">图片大图：</td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF"><input name="image_d" type="file" id="image_d" class="file"/></td>
		<td width="512" height="20" align="left" bgcolor="#FFFFFF">
        	<div><?php if($por->image_d == ""){?>
        <img src="../../images/zanwu.gif" width="55" height="50" border="0"/>
        <?php }else{?>
        <img src="../<?=$por->image_d?>" width="120" height="110" border="0"/>
        <?php }?>
        <a href="../../news_row/?tupian5=del5&id=<?=$id?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$tid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>"><img src="../../images/shancu.jpg" border="0" style="margin:3px 0;"/></a>
        	</div>
        </td>
	</tr>
    <? }  }?>
<!--	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="files_a" type="file" id="files_a" class="file"/></td>
        <td><span style="color:#FF0000;"> &nbsp; &nbsp;*上传文件格式（.rar&nbsp;&nbsp;&nbsp;&nbsp; .txt&nbsp;&nbsp; &nbsp;.doc&nbsp;&nbsp; &nbsp;&nbsp;.pdf &nbsp;.jpg &nbsp;.zip）的类型</span>
	    </td>
	</tr>
-->	
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list_none" id="liwqbj3">
	<tr class="tab_title">
		<td height="25" colspan="2" align="left"> &nbsp;SEO设置</td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_9")){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">seo标题：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="seo_title" type="text" class="input_none" id="seo_title" onBlur="lwq_yanseno('seo_title');" onClick="lwqyanse('seo_title');" value="<?=$por->seo_title?>"/></td>
	</tr>
	<?php }?>
	<?php if(strstr($row_yi->xiangmu,"s_10")){?>
	<tr>
		<td height="20" align="right" bgcolor="#FFFFFF">seo关键词：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><textarea name="seo_gjci" cols="45" rows="5" id="seo_gjci"><?=$por->seo_gjci?></textarea></td>
	</tr>
	<?php }?>
	<?php if(strstr($row_yi->xiangmu,"s_11")){?>
	<tr>
		<td height="20" align="right" bgcolor="#FFFFFF">seo描述：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><textarea name="seo_type" id="seo_type" cols="45" rows="5"><?=$por->seo_type?></textarea></td>
	</tr>
	<?php }?>
</table>
<div style="margin-top:10px;">
<input name="Submit" type="submit"  class="anniu" id="Submit" value="修改"/>
<input name="Submit2" type="button" class="anniu" id="Submit2" value="返回" onClick="location.href='news_gl.php?zid=<?=$zid?>&amp;tid=<?=$tid?>&amp;gid=<?=$gid?>&amp;yuyan=<?=$yuyan?>&amp;PB_page=<?=$PB_page?>&amp;sou=<?=$sou?>'";/>
</div>

</form>





</div>
<br>
<br>
</body>
