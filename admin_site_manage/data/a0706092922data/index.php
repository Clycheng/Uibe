<?

		$usedumppass=1;  //导入数据时是否使用导入密码。如果您忘记了导入密码，请把值改为 0 。HTTP方式下载数据文件不能取消导入密码。

		define("VERSION","4.0");
		error_reporting(1);
		@set_time_limit(0);
		$md5pass="698d51a19d8a121ce581499d7b701668";

		 if(!isset($_POST)){ $_POST = $HTTP_POST_VARS; $_GET = $HTTP_GET_VARS; $_SERVER = $HTTP_SERVER_VARS;} 

		if($_GET["action"]=="downphp"){
			if(!file_exists("$_GET[phpfile]")||$_GET["db_pass"]!=$md5pass) exit;
			header("Content-disposition: filename=$_GET[phpfile]");
			header("Content-type: unknown/unknown");
			readfile("$_GET[phpfile]");
			exit;
		}
		if(!$_GET[framename]){
		echo "<html>
		<head> <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<title>自导入数据库备份程序 — Powerd By faisun Edit by HaierSpI</title>
		</head>
		<frameset rows='90,*,0' frameborder='NO' border='0' framespacing='0' name='myframeset'>
			<frame src='$_SERVER[PHP_SELF]?action=topframe&framename=topframe' name='topFrame' scrolling='NO' noresize>
			<frame src='$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]&framename=main' name='mainFrame1'>
			<frame src='about:blank' name='mainFrame2'>  
		</frameset>
		<BODY></BODY>
		</html>";
		exit;
	}
	function fsql_StrCode($string,$action="ENCODE"){
		global $_SERVER;
		if($string=="") return "";
		if($action=="ENCODE") $md5code=substr(md5($string),8,10);
		else{
			$md5code=substr($string,-10); 
			$string=substr($string,0,strlen($string)-10); 
		}
		$key = md5($md5code.$_SERVER["HTTP_USER_AGENT"].filemtime($_SERVER["SCRIPT_FILENAME"]));
		$string = ($action=="ENCODE"?$string:base64_decode($string));
		$len = strlen($key);
		$code = "";
		for($i=0; $i<strlen($string); $i++){
			$k = $i%$len;
			$code .= $string[$i]^$key[$k];
		}
		$code = ($action == "DECODE" ? (substr(md5($code),8,10)==$md5code?$code:NULL) : base64_encode($code)."$md5code");
		return $code;
	}
	if($_POST[faisunsql_postvars]){
		if($faisunsql_postvars=unserialize(fsql_StrCode($_POST[faisunsql_postvars],"DECODE"))){
			foreach($faisunsql_postvars as $key=>$value){
				if(!isset($_POST[$key])) $_POST[$key] = $value;
			}
		}else{ die("<script language='JavaScript'>alert('由于文档更改,提交信息已丢失,需要重新开始.');</script>"); }
		unset($_POST[faisunsql_postvars],$faisunsql_postvars,$key,$value);
	}
		
		if($_GET["framename"]=="topframe"&&$_GET["action"]=="topframe"){
			echo "<html><body><center><a href='http://www.softpure.com' target='_blank'><img src='index_faisunsqllogo.gif' border=0 width=300 height=71></a></center></body></html>";
			exit;
		}
		?><html><head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>faisunSQL 数据库自导入程序 — Powerd By faisun</title><style type='text/css'>
	<!--
	body, td, input, a{
		color:#985b00;
		font-family: '宋体';
		font-size: 9pt;
	}
	body, td, a{
		line-height:180%; 
	}
	.tabletitle{
		color:#FFFFFF;
		background-color:#89C3E4;
	}
	.tabledata{
		background-color:#D9F3FF;
	}
	.tabledata_on{
		background-color:#FFFFCC;
	}	
	input, .borderdiv {
		border:1px inset;
	}
	-->
	</style></head>
		<body link="#0000FF" vlink="#0000FF" alink="#0000FF">
		<center>
		<font color=red>本文件由 faisunSQL自导入数据库备份程序 V4.0Edit by HaierSpI生成</font><HR size=1>
		<script language="Javascript">document.doshowmywin=1;</script>		
		<script language='Javascript'>
	function showmywin(){
		if(!document.doshowmywin) return;
		if(top.myframeset&&this.window.name=='mainFrame1'){
			top.myframeset.rows='90,*,0';
		}
		if(top.myframeset&&this.window.name=='mainFrame2'){
			top.myframeset.rows='90,0,*';
		}
	}
	document.body.onload=showmywin;
	</script>
		<?
		$showmywin0=$_POST[loadpage]?"<script language=Javascript>document.doshowmywin=0;</script></body>":"";
		
		if($_GET["action"]=="downall"){
			echo "<form name=\"actionform\" method=\"post\" action=\"\">";
			if($_POST[db_pass]!=$md5pass and ($_POST[db_pass]=md5($_POST[db_pass]))!=$md5pass){
			?>
		　　为了数据的安全,HTTP方式下载数据文件请输入正确的导入密码，导入密码在数据库导出时已创建。<BR>
		　　导入密码：<input name="db_pass" value="" type="password"> <input type='submit' name='action' value='确定' class='tabletitle' style='border:3px double #FF6600' > 
			</form>
			<?
			exit;
		}
		if(!empty($_POST["deleteallfiles"])){
			for(reset($_POST["files"]);@list($key,$value)=@each($_POST["files"]);){
				if(@unlink($value)){
					echo "已删除： $value <br>";
				}else{
					echo "<b>删除失败： $value </b><br>";
				}
			}
			echo "<br>完成。";
			exit;
		}
		?>
		以下是所有有关文件,如果您安装了FlashGet等软件,您可以点击右键并选择“Download All by FlashGet”下载。<br>
		下载完后您可以
		<input name="db_pass" value="<?=$_POST[db_pass];?>" type="hidden"><input type='submit' name='deleteallfiles' value='删除所有文件' class='tabletitle' style='border:3px double #FF6600' onclick="return confirm('删除以下所有备份文件，确定吗？');"> 

		<BR><BR>
		<?
		echo "<a href=\"index.php?action=downphp&phpfile=index.php&db_pass=$_POST[db_pass]\">index.php</a><BR>
		<a href=\"index_faisunsqllogo.gif\">index_faisunsqllogo.gif</a><BR>
		<input type=\"hidden\" name=\"files[-1]\" value=\"index.php\">
		<input type=\"hidden\" name=\"files[0]\" value=\"index_faisunsqllogo.gif\">
		";
		$i=1;
		while(file_exists($afile="index_pg{$i}.php")){
			 echo "<a href=\"index.php?action=downphp&phpfile=$afile&db_pass=$_POST[db_pass]\">$afile</a><BR>
			 <input type=\"hidden\" name=\"files[$i]\" value=\"$afile\">
			 ";
			 $i++;
		}
		echo "</form></body></html>";
		exit;
		}

		if(!$_POST["action"] and !$_GET["action"]){
		?><center><form name="configform" method="post" action=""><table width='1' border='0' cellspacing='0' cellpadding='0' align=center class='tabletitle'>
	<tr><td class='tabletitle'><strong>&nbsp;备份信息一览</strong></td></tr> <tr><td>
	<table width='400' border='0' cellspacing='1' cellpadding='2' align=center><tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px' width='50%' nowrap>共有数据量：</td>
	<td style='padding-left:4px' width='50%' nowrap>167.09  KB</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>共有数据表：</td>
	<td style='padding-left:4px'  nowrap>0</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>每页生成数据文件</td>
	<td style='padding-left:4px'  nowrap>≥ 1000  KB</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>数据文件数：</td>
	<td style='padding-left:4px'  nowrap>1</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>文件总数：</td>
	<td style='padding-left:4px'  nowrap>3</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>备份时间：</td>
	<td style='padding-left:4px'  nowrap>2011-07-13 10:09</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>原数据库版本：</td>
	<td style='padding-left:4px'  nowrap>5.0.81-community-nt</td>
</tr>
</table></td></tr></table><BR>
<table width='1' border='0' cellspacing='0' cellpadding='0' align=center class='tabletitle'>
	<tr><td class='tabletitle'><strong>&nbsp;导入数据库配置</strong></td></tr> <tr><td>
	<table width='400' border='0' cellspacing='1' cellpadding='2' align=center><tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px' width='50%' nowrap>服务器：</td>
	<td style='padding-left:4px' width='50%' nowrap><input name="db_host" value="49.247.252.133" type="text"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>数据库：</td>
	<td style='padding-left:4px'  nowrap><input name="db_dbname" value="a0706092922" type="text"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>该数据库不存在时自动创建</td>
	<td style='padding-left:4px'  nowrap><input name="db_autocreate" value="1" type="checkbox" checked></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>用户名：</td>
	<td style='padding-left:4px'  nowrap><input name="db_username" value="root" type="text"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>密　码：</td>
	<td style='padding-left:4px'  nowrap><input name="db_password" value="" type="password"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>导入一页时间间隔：</td>
	<td style='padding-left:4px'  nowrap><input name="nextpgtimeout" value="0" type="text"> 秒</td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>强制编码(请保持默认)：</td>
	<td style='padding-left:4px'  nowrap><input name="db_code" value="" type="text"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>导入密码：</td>
	<td style='padding-left:4px'  nowrap><input name="db_pass" value="" type="password"></td>
</tr>
<tr class='tabledata' onmouseover='this.className="tabledata_on";' onmouseout='this.className="tabledata";'>
	<td style='padding-left:4px'  nowrap>安全的临时表(<a href="javascript:alert('使用临时表插入完整无误的数据后再删除原表,要临时占用数据库空间.');" title="帮助">?</a>)：</td>
	<td style='padding-left:4px'  nowrap><input name="db_safttemptable" type="checkbox" id="db_safttemptable" value="yes" checked></td>
</tr>
</table></td></tr></table><BR>
<input type='submit' name='action' value='导入' class='tabletitle' style='border:3px double #FF6600' > </form><a href="index.php?action=downall" target="_blank">点击这里HTTP方式下载所有文件</a>.
		</center>
		<?
		exit;
		}
		if($usedumppass and md5($_POST[db_pass])!=$md5pass) die("<div id=pageendTag></div>导入密码不正确！如果您忘记了导入密码，请把本源文件开头的 \$usedumppass 的值改为 0 。 $showmywin0");
		
		$conn=@mysql_connect($_POST[db_host],$_POST[db_username],$_POST[db_password]) or die("<div id=pageendTag></div><BR><BR><center>不能连接服务器或连接超时！请返回检查您的配置。</center> $showmywin0");
		mysql_query("SET NAMES 'utf8'", $conn);
		if (mysql_get_server_info()> '4.1'){ mysql_query("SET NAMES `".$_POST[db_code]."`"); }


		if(!@mysql_select_db($_POST[db_dbname])){
			global $_POST;
			if(!$_POST[db_autocreate]){echo "<div id=pageendTag></div><BR><BR><center>数据库[{$_POST[db_dbname]}]不存在！请返回检查您的配置。</center> $showmywin0";exit;	}
			if(!mysql_query("CREATE DATABASE `$_POST[db_dbname]`")){echo "<div id=pageendTag></div><BR><BR><center>数据库[{$_POST[db_dbname]}]不存在且自动创建失败！请返回检查您的配置。</center> $showmywin0";exit;}
			mysql_select_db("$_POST[db_dbname]");
		}
		function query($sql){
			global $_POST;
			if(!mysql_query($sql)){
				echo "<BR><BR><font color=red>MySQL语句错误！您可能发现了程序的BUG！<a href=\"mailto:faisun@sina.com\">请报告开发者。</a>
				  	<BR>版本：V4.0<BR>语句：<XMP>$sql</XMP>错误信息： ".mysql_error()." </font>" ;
				if(trim($_POST[db_temptable])) query("DROP TABLE IF EXISTS `$_POST[db_temptable]`;");
				exit;
			}
		}
		function create($table,$sql){
			global $_POST;
			if(!trim($_POST[db_temptable])){
				do{
					$_POST[db_temptable]="_faisunsql".rand(100,10000);
				}while(@mysql_query("select * from `$_POST[db_temptable]`"));
			}
			query("CREATE TABLE `$_POST[db_temptable]` $sql");
			if(!$_POST[db_safttemptable]) query("DROP TABLE IF EXISTS `$table`;");
		}
		function insert($data){
			global $_POST;
			query("INSERT IGNORE INTO `$_POST[db_temptable]` VALUES $data;");
		}
		function tableend($table){
			global $_POST;
			if($_POST[db_safttemptable]) query("DROP TABLE IF EXISTS `$table`;");
			query("ALTER TABLE `$_POST[db_temptable]` RENAME `$table`");
		}
		
		$totalpage=1;
		if(!$_POST[loadpage]){$_POST[loadpage]=1;}
		include("index_pg$_POST[loadpage].php");
		echo "<center><form name=myform method='post' action=''>";
		$_POST[loadpage]++;

		echo "<input type='hidden' name='faisunsql_postvars' value='".fsql_StrCode(serialize($_POST),"ENCODE")."'>
		<BR><BR>正在导入数据到数据库'$_POST[db_dbname]'……<BR><BR>本页运行完成！ 正在自动进入<a href='javascript:myform.submit();'>第 $_POST[loadpage] 页</a>，共 $totalpage 页……
		<BR><BR>(除非进程长久不动，否则请不要点击以上页码链接。)";
		?>
		<BR><BR><B><div id="postingTag"></div></B>
		<? echo "<script language='Javascript'>
				try{finisheditem.focus();}catch(e){}
				function checkerror(frame){
					if(top.mainFrame1.location.href!=top.mainFrame2.location.href||(frame.document && !frame.document.all.postingTag && frame.document.all.pageendTag)){
						postingTag.innerHTML='faisunSQL:提交出现错误.正在自动<a href=\'javascript:myform.submit();\'>重新提交</a>...';
						myform.submit();
					}
				}
				nextpgtimeout = parseFloat('$_POST[nextpgtimeout]')?parseFloat('$_POST[nextpgtimeout]'):0;
				if(top.myframeset&&this.window.name=='mainFrame1'){
					myform.target='mainFrame2';
					setInterval('checkerror(top.mainFrame2)',10000+1000*nextpgtimeout);
				}
				if(top.myframeset&&this.window.name=='mainFrame2'){
					myform.target='mainFrame1';
					setInterval('checkerror(top.mainFrame1)',10000+1000*nextpgtimeout);
				}
				setTimeout('myform.submit();',1000*nextpgtimeout);
				</script>";
		 ?>
		<div id="pageendTag"></div>
		</form></center>
		</body></html>
		