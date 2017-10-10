<?php 
session_start();
include_once("../core/common/globalFilter.php");
?>
<title>跳转提示</title>
<script type="text/javascript">
	javascript:window.history.forward(1);//页面A（A中有这段代码）转向页面B，这时，B向A转向是被禁止。
</script>
<?php 
	session_start ();
	try {
		$r_userName = trim($_POST["userName"]);
		$r_userPwd = trim($_POST["userPwd"]);	
		$r_checkCode=$_POST["checkCode"];
		$s_verifyCode = $_SESSION["s_verifycode"];
		
		if ($r_userName == "") {
			throw new Exception("用户名不能为空！",10001);
		}
		if ($r_userPwd == "") {
			throw new Exception("密码不能为空！",10002);
		}
		if($r_checkCode != $s_verifyCode){
			throw new Exception("验证码不正确！",10003);
		}
		$sysUserManager = ManagerFactory::getSysUserManager();
		$sysUser = $sysUserManager->GetSysUserByUserName($r_userName);		
		if(!is_object($sysUser)){
			throw new Exception("用户名不存在！",10004);
		}
		if ($sysUser->userPwd != md5($r_userPwd)) {
			throw new Exception("密码不正确！",10005);
		}
		
		$_SESSION["s_userId"] = $sysUser->userId;
		$_SESSION["s_isDefaultIn"] = $sysUser->isDefaultIn;
		$_SESSION["s_userName"] = $_POST["userName"];
		
		$date= date("Y-m-d H:i:s");
		$ip= $_SERVER['REMOTE_ADDR'];
		
		$historyManager = ManagerFactory::getHistoryManager();
		$historyManager->Save($date, $ip, $sysUser->userName);
		
		$sysUserManager->Modify($ip, $date, $sysUser->userId);
		
		unset($_SESSION["s_verifycode"]);
		
		JsUtil::Alert("欢迎 ".$sysUser->userName." 管理员");
		JsUtil::Goto_("index.php");
		
	} catch (Exception $e) {
		if ($e->getCode()) {
			JsUtil::Alert($e->getMessage());
		} else {
			JsUtil::Alert("登录失败！");
		}
		JsUtil::Back(-1);
	}
?>
