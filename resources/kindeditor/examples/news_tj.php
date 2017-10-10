<?php
require_once("../../include/global.php");
require_once("../../donhonet/session.php");
$date=getdate();
$addate=date("Y-m-d");

if($Submit=="保存"){	
		$sql = "select * from news_zilei where id = $zileiid";
		$db->setquery($sql);
		$news_tit = $db->loadobject();

		$img_s = new Image("image_s","prospic");
		if($img_s->upload()){
			$image_s = $img_s->getImgPath();
		}		
		$img_a = new Image("image_a","download");
		if($img_a->upload()){
			$image_a = $img_a->getImgPath();
		}
		$img_b= new Image("image_b","prospic");
		if($img_b->upload()){
			$image_b = $img_b->getImgPath();
		}		
		$img_c = new Image("image_c","prospic");
		if($img_c->upload()){
			$image_c = $img_c->getImgPath();
		}
		$img_d= new Image("image_d","prospic");
		if($img_d->upload()){
			$image_d = $img_d->getImgPath();
		}		
		$img_e = new Image("image_e","prospic");
		if($img_e->upload()){
			$image_e = $img_e->getImgPath();
		}
		if($files_a){
		$files_t = new Filest("files_a","download");
		if($files_t->upload()){
			$files_url = $files_t->getfilesPath();
		}
		}else{
			$files_url= $_POST["files_url"];
			}
	if($toptimes==""){
		$toptimes=0;
		}
	$addtimess=$times.date("H:i:s");
	$addtime=strtotime($addtimess);
	if($zhuti==""){
		$zhuti=0;
		}
	$query = "insert into news(ziid,fiid,title,cisu,author,zhusu,canyin,image,image_a,image_b,image_c,image_d,files_url,htmlurl,shiping,zhicheng,jiage,type1,type2,type3,type4,type5,content,times,toptimes,bottomtimes,px,seo_title,seo_gjci,seo_type,zhanshi,tuijian,zhiding,redian,tebie,remai,zhuti,pinpai,hanliang,yuanliao,chengfen,shiyong) values('$zileiid','$fids','$title','$leisort','$author','$zhusu','$canyin','$image_s','$image_a','$image_b','$image_c','$image_d','$files_url','$url','$shiping','$zhicheng','$jiage','$type1','$type2','$type3','$type4','$type5','$content','$addtime',$toptimes,'$bottomtimes','$px','$seo_title','$seo_gjci','$seo_type','1','$tuijian','$zhiding','$redian','$tebie','$remai',$zhuti,'$pinpai','$hanliang','$yuanliao','$chengfen','$shiyong')";
	$db->setQuery($query);	
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
		$html->diqutitlehhtml(ROOT.$url,$zileiid);
		$html->diquleibiehtml(ROOT.$url);
	}
		if($db->query()){
			$js->Alert("添加成功");
			$js->Goto("news_gl.php?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan");
		}
}
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
	});	
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
function lwqyanse(ids) {
  		document.getElementById(ids).className="input_hongse";
}
function lwq_yanseno(ids){
  		document.getElementById(ids).className="input_none";
}



function switchmodTag(modtag,modcontent,modk) {
    for(i=1; i <= 20; i++) {
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


function liwqbj_getrs(value,ids){
		var teach_str = "";
		var liwqbj = document.getElementById(value);
		var liwqbj_str = liwqbj.getElementsByTagName("INPUT");
		for (var i = 0; i < liwqbj_str.length; i++) {
			if (liwqbj_str[i].checked) teach_str += liwqbj_str[i].value + ",";
		}
		valuest = teach_str.substring(0, teach_str.length-1);
		doedit_more(valuest,ids,value);
}

function doedit_more(value,id,ajaxval)
{
		var http_request = false;
		var values = encodeURI(value); //这里UTF-8下要用encodeURI 否则在IE浏览器上出现乱码。
		//var value = encodeURIComponent(value);
        if (window.ActiveXObject){    /*在IE下初始化XMLHttpRequest对象 */
                try{
                        //新版本的 Internet Explorer
                        http_request= new ActiveXObject("Msxml2.XMLHTTP");
                }catch (oldIE){
                        try {
                                //较老版本的 Internet Explorer
                                http_request= new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (failed){
                                        // 还是创建失败 =.=|||
                                        http_request= false;
                                }             
                }
			} else if (window.XMLHttpRequest){    /*在Firefox下初始化XMLHttpRequest对象 */
					http_request= new XMLHttpRequest();
			}
			if(!http_request){
					alert("创建ajax失败！"); 
					return false;
			   }
		if(ajaxval == "xm"){
			url = "../ajax/xiangmu.php?values="+values+"&id="+id;
		}
		if(ajaxval == "luxian"){
			url = "../ajax/luxian.php?values="+values+"&id="+id;
		}
		if(ajaxval == "imgshu"){
			url = "../ajax/imgshu.php?values="+values+"&id="+id;
			document.getElementById("imgshulwq").value = values;
			document.getElementById('liwqbj_box').style.visibility='hidden'
		}
		if (http_request)
		{
			http_request.open("GET", url, true);	
			http_request.onreadystatechange = liwqbj;    //指定响应方法
			http_request.setRequestHeader('If-Modified-Since','0'); 
			http_request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			http_request.send(null);
		}
		
		function liwqbj(){
				if(http_request.readyState < 4)
				{
					document.getElementById(ajaxval+"_id").innerHTML="<img src=../images/load.gif />";
				}
				if (http_request.readyState == 4 ) {
					if (http_request.status == 200) {
						Text = http_request.responseText;
						document.getElementById(ajaxval+"_id").className="yangshi";
						document.getElementById(ajaxval+"_id").innerHTML=Text;
					} else {
						alert('您请求的页面发现错误');
					}
				}
		}
}  
</script>
<body class="main_body">
<div class="more_login"><span style="float:right;"></span>最近登录日期：
<?=$rowlog->date?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员：<?=$rowlog->user;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP：<?=$rowlog->ip;?>&nbsp;&nbsp;&nbsp;<a href="../../news_row/login_history.php" class="grey">查看全部记录</a>
</div>
<div class="the_title">
	<div class="title_text">栏目管理</div>
</div>
<div class="file_title">管理员管理 > [栏目管理]<?=$row_zilei?></div>
<div class="maincontent" style="border:0px;">
<form action="" method="post" enctype="multipart/form-data" name="myform" id="myform" onSubmit="return checkSubmit();">
	<table height="28" border="1" cellpadding="0" cellspacing="0" style="background:url(../../images/left_nei_1.jpg) repeat-x;">
		<tr>
			<td width="100" align="center" class="lwq_menuOn" id="lwq1" onClick="lwq_switchmodTag('lwq','liwqbj','1');this.blur();">基本信息</td>
			<td width="100" align="center" class="lwq_menuNo" id="lwq2" onClick="lwq_switchmodTag('lwq','liwqbj','2');this.blur();">上传设置 </td>
		  <td width="100" align="center" class="lwq_menuNo" id="lwq3" onClick="lwq_switchmodTag('lwq','liwqbj','3');this.blur();">SEO设置</td>
		</tr>
	</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list" id="liwqbj1"  onMouseOver="changeto()"  onmouseout="changeback()">
	<tr class="tab_title">
		<td height="25" colspan="2" align="left"> &nbsp;基本信息</td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_1")){?>
	<tr>
		<td width="12%" height="25" align="right" bgcolor="#FFFFFF">标题：</td>
		<td width="88%" height="20" align="left" bgcolor="#FFFFFF"><input name="title" type="text" id="title" class="input_none"/></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">网页标题：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="author" type="text" class="input_none" id="author"/></td>
	</tr>
	<?php }?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF"><? if($strArr[1]=="18"){echo "年级";}else{ echo "类别";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><select name="zileiid" id="zileiid">
		<?php
		$sqlz_id = "select * from news_zilei where fuid='$tid'";
		$db->setquery($sqlz_id);
		$rsz_id = $db->loadobjectlist();
		foreach($rsz_id as $rs){
		?>
		<option value="<?=$rs->id?>" <? if( $zid==$rs->id){ ?> selected <? } ?>><?=$rs->zititle?></option>
        <? } ?>
		</select>
		<?php 
		if($zid == 67){
		$sql12 = "select * from news_zilei where fuid = 3 order by zileipx desc";
		$db->setquery($sql12);
		$furows = $db->loadobjectlist();
		?>
		<select name="fiid" id="fiid">
		<?php foreach($furows as $rs){?>
		<option value="<?=$rs->id?>"><?=$rs->zititle?>	</option>
		<?php }?>
		</select>
		<?php }?>
        <input type="hidden" name="leisort" id="leisort" value="<?=$rsz_id["leisort"]?>">
        <input type="hidden" name="fids" id="fids" value="<?=$tid?>">
		&nbsp;&nbsp;<span class="STYLE7">*</span></td>
	</tr>
    
    <? if($strArr[1]=="18" || $strArr[1]=="21"){?>
	<tr>
	<td height="25" align="right" bgcolor="#FFFFFF">科目：</td>
		<td height="20" align="left" bgcolor="#FFFFFF">
		<select name="zhusu" id="zhusu">
		<option value="">--请选择科目--</option>
        <? 	foreach($hq_km as $rs){?>
		<option value="<?=$rs->id?>"><?=$rs->zititle?>	</option>
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
		<option value="<?=$rs->id?>"><?=$rs->zititle?>	</option>
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
	<tr>
	<td height="25" align="right" bgcolor="#FFFFFF"><?php if($_GET["zid"]=="aaa"){ echo "公司网址"; }else{ echo "来源";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="pinpai" type="text" id="pinpai" class="input_none" value=""/></td>
	</tr>
	<? if($row_yi->fuid==5  || $row_yi->fuid==7){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF"><?php if($_GET["zid"]=="aaa"){ echo "联系电话"; }else{ echo "作者";}?>：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="bottomtimes" type="text" class="input_none" id="bottomtimes"  value=""></td>
	</tr>
    <? } ?>
	<?php if($_GET["zid"]=="aaaaaaa"){?>    
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">地址：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="type2" type="text" class="input_none" id="type2"></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">路线：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="type3" type="text" class="input_none" id="type3" ></td>
	</tr>
	<?php }?>    
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">时间：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="times" type="text" class="input_none" id="times" onFocus="cdr.show(this)" style="width:100px;" value="<?=$addate?>"></td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_12")){?>
		<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">排序：</td>
		<td height="20" align="left" bgcolor="#FFFFFF"><input name="px" type="text" id="px" value="0" size="5" class="input_none" style="width:30px;"/></td>
	</tr>
	<?php }?>
	<? if($sqlflsrs->fuid=="noshow"){?>
	<tr class="tab_title">
		<td height="25" colspan="2" align="left" > &nbsp;类型属性</td>
	</tr>
	<tr>
		<td width="123" height="25" align="right" bgcolor="#FFFFFF">操作：</td>
		<td width="1065" height="20" align="left" bgcolor="#FFFFFF">
		<input name="tuijian" type="checkbox" id="checkbox16" value="1" />热卖推荐
		<input name="redian" type="checkbox" id="checkbox19" value="1" />新品上市
		<input name="tebie" type="checkbox" id="redian" value="1" />特价促销
		<input name="zhiding" type="checkbox" id="checkbox17" value="1" />置顶
		</td>
	</tr>
	<?php }?>
	<?php if(strstr($row_yi->xiangmu,"s_13")){?>
	<!-----------------------------编辑器开始-------------------------------->
	<tr>
		<td colspan="2" bgcolor="#FFFFFF">
        <div>
            <ul>
            	<li class="menuOn" id="mod1" onClick="switchmodTag('mod','list','1');this.blur();">内容</li>
            	<? if($zi333333d==1){?>
            	<li class="menuNo" id="mod2" onClick="switchmodTag('mod','list','2');this.blur();">描述</li>
                <? } ?>
            </ul>
        </div>
        </td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFFF">
        <div><ul>
			<li class="list" id="list1"><textarea name="type1" id="type1" style="width:700px; height:200px; visibility:hidden;"></textarea></li>
        </ul>
        </div>
        </td>
	</tr>
	<!-----------------------------编辑器结束-------------------------------->
	<?php }?>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list_none" id="liwqbj2"  onMouseOver="changeto()"  onmouseout="changeback()">
	<tr class="tab_title">
		<td height="25" colspan="2" align="left"> &nbsp;上传设置</td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">图片：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="image_s" type="file" id="image_s" class="file"/></td>
	</tr>
    <?php if($zid==2){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">图片2：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="image_b" type="file" id="image_b" class="file"/></td>
	</tr>
    <? } ?>
	<? if($strArr[1]=="18" || $strArr[1]=="21" || $strArr[1]=="22"){?>
	 <tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF">
        <input type="text" name="files_url" id="files_url" style="border:1px solid #CCC" value="" /> <input type="button" id="filemanager" value="浏览服务器" />
        </td>
	</tr>
    <? } ?>
    <? if($sqlflsrs->fuid==11111111111111111111111111){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">商品大图：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="image_b" type="file" id="image_b" class="file"/></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">商品大图：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="image_c" type="file" id="image_c" class="file"/></td>
	</tr>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">商品大图：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="image_d" type="file" id="image_d" class="file"/></td>
	</tr>
	<?php }?>
<?php if( $tid==7){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件路径：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF">
        <textarea name="files_url" rows="5" id="files_url" style="width:250px; height:50px;"><?=$files_url?></textarea>
        <span style="color:#FF0000;"> &nbsp; &nbsp;*在些加入视频地址</span></td>
	</tr>
    <?php }?>
<!--	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">文件：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="files_a" type="file" id="files_a" class="file"/>
		  <span style="color:#FF0000;"> &nbsp; &nbsp;*上传文件格式（.rar&nbsp;&nbsp;&nbsp;&nbsp; .txt&nbsp;&nbsp; &nbsp;.doc&nbsp;&nbsp; &nbsp;&nbsp;.pdf &nbsp;.jpg &nbsp;.zip）的类型</span>
	    </td>
	</tr>
-->	
</table>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" class="lwq_list_none" id="liwqbj3"  onMouseOver="changeto()"  onmouseout="changeback()">
	<tr class="tab_title">
		<td height="25" colspan="2" align="left"> &nbsp;SEO设置</td>
	</tr>
	<?php if(strstr($row_yi->xiangmu,"s_9")){?>
	<tr>
		<td height="25" align="right" bgcolor="#FFFFFF">seo标题：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><input name="seo_title" type="text" id="seo_title" class="input_none" /></td>
	</tr>
	<?php }?>
	<?php if(strstr($row_yi->xiangmu,"s_10")){?>
	<tr>
		<td height="20" align="right" bgcolor="#FFFFFF">seo关键词：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><textarea name="seo_gjci" cols="45" rows="5" id="seo_gjci"></textarea></td>
	</tr>
	<?php }?>
	<?php if(strstr($row_yi->xiangmu,"s_11")){?>
	<tr>
		<td height="20" align="right" bgcolor="#FFFFFF">seo描述：</td>
		<td width="870" height="20" align="left" bgcolor="#FFFFFF"><textarea name="seo_type" id="seo_type" cols="45" rows="5"></textarea></td>
	</tr>
	<?php }?>
</table>
<div style="margin-top:10px;">
<input name="Submit" type="submit"  class="anniu" id="Submit" value="保存"/>
<input name="Submit2" type="button" class="anniu" id="Submit2" value="返回" onClick="location.href='news_gl.php?zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$PB_page?>&sou=<?=$sou?>'";/>
</div>

</form>





</div>
<br>
<br>
</body>
