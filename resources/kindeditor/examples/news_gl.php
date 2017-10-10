<?php
require_once("../../include/global.php");
require_once("../../donhonet/session.php");
$sql = "select * from news_zilei where id = $zid"; 
$db->setQuery($sql);
$tbb= $db->loadobject();
if($Submit == "搜索"){
$sql = "select a.*,c.zititle from news a left join news_zilei c on a.ziid=c.id where a.title like '%".$_GET["sou"]."%' or c.zititle like '%".$_GET["sou"]."%' order by a.zhiding desc,a.px asc";
}else{
$sql = "select a.*,c.zititle,c.gid,c.id as ziid from news a left join news_zilei c on a.ziid=c.id where c.id = $zid order by a.zhiding desc,a.px asc,a.times desc";
}
$pagepre = 10;
$db->setQuery($sql);
$zong = $db->num_rows();
	$liwqbjpage=new liwqpage(array('total'=>$zong,'perpage'=>$pagepre));
	$db->setQuery($sql,$liwqbjpage->offset(),$pagepre);
	if($_GET["PB_page"] == ""){
	$_GET["PB_page"]= 1;
	}
$rows = $db->loadObjectList();
$rowst = $db->loadObject();
$sql = "select * from news_zilei where id = $zid";
$db->setquery($sql);
$row_yi = $db->loadObject(); 
		
$sqlfls = "select * from news_zilei where id = $row_yi->fuid";
$db->setquery($sqlfls);
$sqlflsrs = $db->loadObject(); 

if($zong == ""){
	  	$kong = "<div style='padding-top:5px;'>
	  当前还没有任何记录,您所在的当前位置是：".$tbb->zititle."</div>";
	  $zong = 1 ;
}
if($act == "del"){
	
	$sqlsss = "select * from news where id in($id)"; 
	$db->setQuery($sqlsss);
	$sqlsssrs= $db->loadobject();
	$query = "delete from news where id in($id)";
	$db->setQuery($query);
	$allimg=$db->query();
	$imagepart1 = "../".$allimg->image;
	echo $imagepart1;
	$imagepart2 = "../".$sqlsssrs->image_a;
	$imagepart3 = "../".$sqlsssrs->image_b;
	$imagepart4 = "../".$sqlsssrs->image_c;
	$imagepart5 = "../".$sqlsssrs->image_d;
	@unlink($imagepart1);
	@unlink($imagepart2);
	@unlink($imagepart3);
	@unlink($imagepart4);
	@unlink($imagepart5);
	@unlink($imagepart6);
	$js->alert("删除成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "notebie"){
	$query = "update news set tebie='0' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("取消推荐");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "tebie"){
	$query = "update news set tebie='1' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("设为推荐");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "notui"){
	$query = "update news set tuijian='0' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("取消促销成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "tui"){
	$query = "update news set tuijian='1' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("设为促销成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}

if($act == "nonewpro"){
	$query = "update news set redian='0' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("取消推荐成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "newpro"){
	$query = "update news set redian='1' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("设为推荐成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "zhiding"){
	$query = "update news set zhiding='1' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("置顶成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "nozhiding"){
	$query = "update news set zhiding='0' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("置顶已取消");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "nozhan"){
	$query = "update news set zhanshi='0' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("展示已取消");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
if($act == "zhan"){
	$query = "update news set zhanshi='1' where id=$id";
	$db->setQuery($query);
	$db->query();
	$js->alert("展示已成功");
	$js->Goto("?zid=$zid&tid=$tid&gid=$gid&yuyan=$yuyan&PB_page=".$_GET["PB_page"]);
}
//登录记录语句
	$sqllog = "select * from ".$prefix."history order by id desc";
	$db->setQuery($sqllog);
	$rowlog = $db->loadObject();
	$sqllog = "select * from ".$prefix."history where id=".$rowlog->id."-1";
	$db->setQuery($sqllog);
	$rowlog = $db->loadObject();
?>
<style>
.yangshi{ border:#ff0000 solid 1px; padding:1px 20px; color:#fff; font-weight:bold; background:#ff0000;}
</style>
<script src="../../js/huanse.js"></script>
<link href="../../images/all_css.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function sltAll()
{
	var max =document.form1.item("del");
	for(j=0;j<max.length;j++)
	{
		document.form1.del[j].checked = true;
	}
}
function sltNull()
{
	var max =document.form1.item("del");
	for(j=0;j<max.length;j++)
	{
		document.form1.item("del",j).checked = false;
	}
}
//-------------以上是全选取消代码---------------//


function SelectChk()
{
	var s=false,delid,n=0,strid,strurl;
	
	var nn =document.form1.item("del");
	for (j=0;j<nn.length;j++)
	{
		if (document.form1.item("del",j).checked)
		{
			n = n + 1;
			s=true;
			delid =document.form1.del[j].value;
			if(n==1){strid = delid;}
			else{strid = strid + "," + delid;}
		}
	}

	if (nn.length==null)
		{
		if (document.form1.del.checked)
		   { s=true;
		   strid =document.form1.del.value;}
		
		}

	strurl = "?act=del&zid=<?=$zid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&id=" +strid;//据实际修改一下
	if(!s)	{
			alert("请选择要删除的信息！");
			return false;
		}
		
	if ( confirm("你确定要删除这些信息吗？"))
	{
			form1.action = strurl;
			form1.submit();
		}
}
//-------------以上是全选删除代码---------------//

function ConfirmDelBig()
{
   if(confirm("确定要删除吗？一旦删除不能恢复！"))
     return true;
   else
     return false;
	 
}

function ConfirmDelSmall()
{
   if(confirm("确定要删除吗？\n将删除此栏目下所有栏目！"))
     return true;
   else
     return false;
	 
}

function checkSubmit() 
{ 
	if(document.form2.sou.value==''){
				alert('请填写您要搜索的关键词！！');
				form2.sou.focus();
				return false;
	}
	return true; 
}
</script>



<script language="javascript">
function liwqbj_getrs(value,ids){
		var teach_str = "";
		var liwqbj = document.getElementById(value);
		var liwqbj_str = liwqbj.getElementsByTagName("INPUT");
		for (var i = 0; i < liwqbj_str.length; i++) {
			if (liwqbj_str[i].checked) teach_str += liwqbj_str[i].value + ",";
		}
		valuest = teach_str.substring(0, teach_str.length-1);
		doedit_more(valuest,ids);
}

function doedit_more(value,id)
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
		url = "../ajax/xiangmu.php?values="+values+"&id="+id;
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
					document.getElementById("xiangmu_id").innerHTML="<img src=../images/load.gif />";
				}
				if (http_request.readyState == 4 ) {
					if (http_request.status == 200) {
						Text = http_request.responseText;
						document.getElementById("xiangmu_id").className="yangshi";
						document.getElementById("xiangmu_id").innerHTML=Text;
					} else {
						alert('您请求的页面发现错误');
					}
				}
		}
}  



function select_fx(){
	for(var i=0;i<list_form.elements.length;i++){
		var obj = list_form.elements[i];
		if(obj.name=="xiangmu[]"&&obj.type=="checkbox"){
			obj.checked = !obj.checked;
		}
	}
}
</script>
<body class="main_body">
<div class="more_login">最近登录日期：
<?=$rowlog->date?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员：<?=$rowlog->user;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP：<?=$rowlog->ip;?>&nbsp;&nbsp;&nbsp;<a href="../../donhonet/login_history.php" class="grey">查看全部记录</a>
</div>
<div class="the_title">
	<div class="title_text">栏目管理<?=$tid?></div>
</div>
<div class="file_title">管理员管理 > [栏目管理]-[<?=$tbb->zititle?>]</div>
<div class="maincontent" style="text-align:center;">
	<form id="form2" name="form2" method="get" action="../../news_row/?zid=<?=$zid?>&tid=<?=$tid?>&PB_page=<?=$_GET["PB_page"];?>&yidlei=<?=$_GET["yidlei"]?>&sou=<?=$_GET["sou"]?>" onSubmit="return checkSubmit();">
    <table width="100%" height="27"  cellpadding="0" cellspacing="0" style="background:url(../../images/sechbg.gif) repeat-x">
    	<tr>
        	<td width="255">
            &nbsp;&nbsp;&nbsp;&nbsp;模糊搜索
            <input name="sou" type="text" id="sou" style="color:#999999" value="<?=$_GET["sou"]?>" size="20" class="input_txt" />
            <input name="zid" type="hidden" id="zid" value="<?=$_GET["zid"]?>"/>
            <input name="tid" type="hidden" id="tid" value="<?=$_GET["tid"]?>"/>
            <input name="submit" type="image" src="../../images/vie.gif"/>
            <input type="hidden" name="Submit" value="搜索">
            </td>
            <td width="670"></td>
            <td width="264">
            <img src="../../images/22.gif" width="14" height="14" />
            <a href="../../news_row/news_tj.php?id=<?=$rowst->ziid?>&zid=<?=$zid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"]?>">新增</a>
            <img src="../../images/quit.gif" width="14" height="14" />
            <a class="bai" style="color:#000000" onClick="sltAll();" onMouseOver="this.style.cursor='hand'">全选</a>
            <img src="../../images/33.gif" width="14" height="14" />
            <a onClick="sltNull();" style="color:#000000" onMouseOver="this.style.cursor='hand'">取消</a>
            <img src="../../images/11.gif" width="14" height="14" />
            <a onClick="SelectChk();" style="color:#000000" onMouseOver="this.style.cursor='hand'">删除</a>
            </td>
        </tr>
    </table>
	</form>
	<form id="form1" name="form1" method="post" action="">
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="dbdbdb" onMouseOver="changeto()"  onmouseout="changeback()">
                <tr class="tab_title">
                  <td width="2%" height="25" align="center" >&nbsp;</td>
                  <td width="2%" height="22" align="center" ><span class="STYLE1">序号</span></td>
				  <?php if($tid != 100000){?>
                  <td width="4%" height="22" align="center" >图</td>
				  <?php } if($tid != 100000){?>
                  <td width="11%" height="22" align="center" >标题</td>
				  <?php } if($tid == 100000){?>
                  <?php }?>
                  <td width="7%" height="22" align="center" >类别</td>
                  <td width="8%" height="22" align="center" >添加时间</td>
                  <?php if($tid == 212313 || $tid == 3){?>
                  <td width="5%" height="22" align="center" >推荐</td>
                  <?php } ?>
                  <? if($tid=="abc"){?>
                  <td width="4%" height="22" align="center" >促销</td>
			      <td width="5%" height="22" align="center" >推荐</td>
			      <td width="5%" height="22" align="center" >置顶</td>
                  <? } ?>
			      <td width="5%" height="22" align="center" >显示</td>
                  <td width="5%" height="22" align="center" >排序</td>
                  <td width="31%" height="22" align="center"  class="STYLE1" style="cursor:hand">基本操作</td>
                </tr>
                <?php 
			 	if($_GET["PB_page"] != 1){
		  		$i=$pagepre * ($_GET["PB_page"] - 1) + 1;
		 		 }else{
				$i=1;
				}
				 foreach($rows as $row){
				?>
                <tr>
                  <td height="20" align="center" bgcolor="#FFFFFF"><input name="del" type="checkbox" id="del" value="<?=$row->id?>" /></td>
                  <td height="20" align="center" bgcolor="#FFFFFF"><?=$i?></td>
				  <?php if($tid != 1000000){?>
                  <td align="center" bgcolor="#FFFFFF">
				  <?php if($row->image == ""){?>
				  <img src="../../images/zanwu.gif" width="40" height="40" onMouseOver="toolTip('<img src=../images/zanwu.gif style=cursor:hand>')" onMouseOut="toolTip()"/>
				  <?php }else{?>
				  <img src="../../<?=$row->image?>" width="40" onMouseOver="toolTip('<img src=../../<?=$row->image?> width=200 style=cursor:hand>')" onMouseOut="toolTip()"/>
				  <?php }?>
				  </td>
				  
				  <?php } if($tid != 10000000){?>
                  <td height="20" align="left" bgcolor="#FFFFFF"> &nbsp;<?=$row->title?></td>
				   <?php } if($tid == 10000000){?>
                  <?php }?>
				  <td height="20" align="left" bgcolor="#FFFFFF">
				  &nbsp;&nbsp;<?=$row->zititle ? $row->zititle : "<font color='red'>暂无分类</font>";?>&nbsp;&nbsp;&nbsp;
				   <?php if($zid == 1000000){?>
				  (<?=strstr($row->files_url,".");?>)
				  <?php }?>
				  </td>
                  <td align="center" bgcolor="#FFFFFF"><?=date("Y-m-d H:i:s",$row->times);?></td>
                  <?php if($tid == 212313 || $tid == 3){?>
				   <td align="center" bgcolor="#FFFFFF">
<?php if($row->tebie){?>
				  <a href="../../news_row/?act=notebie&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" style="color:#FF0000"><img src="../../images/icon_ok.gif" width="16" height="16" border="0"/></a>
				  <?php }else{?>
				  <a href="../../news_row/?act=tebie&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>"><img src="../../images/icon_no.gif" width="16" height="16" border="0"/></a>
				  <?php }?>                   
                   </td>
                   <?php } ?>
                  <? if($tid=="abc"){?>
				   <td align="center" bgcolor="#FFFFFF">
<?php if($row->tuijian){?>
				  <a href="../../news_row/?act=notui&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" style="color:#FF0000"><img src="../../images/icon_ok.gif" width="16" height="16" border="0"/></a>
				  <?php }else{?>
				  <a href="../../news_row/?act=tui&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>"><img src="../../images/icon_no.gif" width="16" height="16" border="0"/></a>
				  <?php }?>                   
                   </td>
				   <td align="center" bgcolor="#FFFFFF">
<?php if($row->redian){?>
				  <a href="../../news_row/?act=nonewpro&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" style="color:#FF0000"><img src="../../images/icon_ok.gif" width="16" height="16" border="0"/></a>
				  <?php }else{?>
				  <a href="../../news_row/?act=newpro&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>"><img src="../../images/icon_no.gif" width="16" height="16" border="0"/></a>
				  <?php }?>                   
                   </td>
				   <td align="center" bgcolor="#FFFFFF">
<?php if($row->zhiding){?>
				  <a href="../../news_row/?act=nozhiding&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" style="color:#FF0000"><img src="../../images/icon_ok.gif" width="16" height="16" border="0"/></a>
				  <?php }else{?>
				  <a href="../../news_row/?act=zhiding&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>"><img src="../../images/icon_no.gif" width="16" height="16" border="0"/></a>
				  <?php }?>                   
                   </td>
                   <? } ?>
                  <td align="center" bgcolor="#FFFFFF">
				  <?php if($row->zhanshi){?>
				  <a href="../../news_row/?act=nozhan&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" style="color:#FF0000"><img src="../../images/icon_ok.gif" width="16" height="16" border="0"/></a>
				  <?php }else{?>
				  <a href="../../news_row/?act=zhan&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>"><img src="../../images/icon_no.gif" width="16" height="16" border="0"/></a>
				  <?php }?>	
				  </td>
                  <td height="20" align="center" bgcolor="#FFFFFF"><?=$row->px?></td>
                  <td height="20" align="center" bgcolor="#FFFFFF"><a href="../../news_row/news_up.php?id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>">&nbsp;<img src="../../images/edt.gif" width="16" height="16" border="0" />编辑</a>&nbsp;
				  <a href="../../news_row/?act=del&id=<?=$row->id?>&zid=<?=$row->ziid?>&tid=<?=$tid?>&gid=<?=$gid?>&yuyan=<?=$yuyan?>&PB_page=<?=$_GET["PB_page"];?>" onClick="return ConfirmDelBig();"><img src="../../images/del.gif" width="16" height="16" border="0" />删除</a>
                  </td>
                </tr>
                <?php
				$i++;
				   }
				   ?>
    </table><?=$kong?>
<div class="listpage"><p><?=$liwqbjpage->show(3)?></p>共有<?=$zong?>条记录，当前第<?=$_GET["PB_page"];?>/<?=$liwqbjpage->totalpage?>页，<?=$pagepre?>条/页</div>
   
	<? if($_SESSION["username"]=="dhlc"){ ?>
	<form name="list_form" method="POST" action="">
    <div class="xiangmufenpei">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="xm">
	<tr class="tab_title" >
    	<td colspan="6" height="25" align="center" style="border-bottom:1px solid #dbdbdb"><strong>项目分配</strong></td>
    </tr>
	<tr>
		<td height="25" align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_1" <?php if(strstr($tbb->xiangmu,"s_1")){ echo "checked";}?>/>
		标题</td>
		<td align="left"><input name="xiangmu" type="checkbox" id="xiangmu2" value="s_13" <?php if(strstr($tbb->xiangmu,"s_13")){ echo "checked";}?>/>
详细内容</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_3" <?php if(strstr($tbb->xiangmu,"s_3")){ echo "checked";}?>/>
		作者</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_4" <?php if(strstr($tbb->xiangmu,"s_4")){ echo "checked";}?>/>
		网站标题</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_5" <?php if(strstr($tbb->xiangmu,"s_5")){ echo "checked";}?>/>
		来源</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_6" <?php if(strstr($tbb->xiangmu,"s_6")){ echo "checked";}?>/>
		图片上传</td>
	</tr>
	<tr>
		<td height="25" align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_7" <?php if(strstr($tbb->xiangmu,"s_7")){ echo "checked";}?>/>
		大图上传</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_8" <?php if(strstr($tbb->xiangmu,"s_8")){ echo "checked";}?>/>
		文件上传</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_9" <?php if(strstr($tbb->xiangmu,"s_9")){ echo "checked";}?>/>
		seo标题</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_10" <?php if(strstr($tbb->xiangmu,"s_10")){ echo "checked";}?>/>
		seo关键词</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_11" <?php if(strstr($tbb->xiangmu,"s_11")){ echo "checked";}?>/>
		seo描述</td>
		<td align="left">
		<input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_12" <?php if(strstr($tbb->xiangmu,"s_12")){ echo "checked";}?>/>
		排序</td>
	</tr>
	<tr>
		<td height="25" align="left"><input name="xiangmu[]2" type="checkbox" id="xiangmu[]" value="s_16" <?php if(strstr($tbb->xiangmu,"s_16")){ echo "checked";}?>/>
优酷视频</td>
		<td align="left">
        <input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_13" <?php if(strstr($tbb->xiangmu,"s_13")){ echo "checked";}?>/>	是否展示特性
        </td>
		<td align="left">
        <input name="xiangmu[]" type="checkbox" id="xiangmu" value="s_2" <?php if(strstr($tbb->xiangmu,"s_2")){ echo "checked";}?>/>操作
        </td>
		<td align="left">&nbsp;</td>
		<td align="left">&nbsp;</td>
		<td align="center">&nbsp;</td>
	</tr>
	<tr>
		<td height="30" colspan="6" align="left" style="border-top:1px solid #dbdbdb"><!--<input name="" type="checkbox" value="" onClick="select_fx();"/>全选--><a href="javascript:liwqbj_getrs('xm','<?=$zid?>')"><img src="../../images/baochun.gif" align="absmiddle"/></a><span id="xiangmu_id"></span></td>
	</tr>
</table>
    </div>
	</form>
    <? } ?>
</div>
<br>
<br>
</body>
<script src="../../js/tu.js"  language="javascript"></script>
