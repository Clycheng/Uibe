<?php
@session_start(); 
if(is_null($_SESSION["s_userName"])){
?>
<script language="javascript">
	if(confirm("您还没有登录，去登录？")){
		window.parent.location="/admin_site_manage/login.php";
	}
</script>
<?
}
?>