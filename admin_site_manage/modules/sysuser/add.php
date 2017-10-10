<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "add") {
		try {
			
			if ($userName == "") {
				throw new Exception("用户名称不能为空！",10001);
			}
			if ($userPwd == "") {
				throw new Exception("用户密码不能为空！",10002);
			}
			$sysUserManager = ManagerFactory::getSysUserManager();
			$sysUser = $sysUserManager->GetSysUserByUserName($userName);
			if (is_object($sysUser)) {
				throw new Exception("该用户名称已经存在！",10003);
			}
		  
			$sysUserManager->Save($userName, $userPwd, $remark);
			
			//JsUtil::Alert("添加成功！");
      $_SESSION["success_msg"] = "操作成功！";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() != "") {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("添加失败！");
        $_SESSION["err_msg"] = "操作失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>