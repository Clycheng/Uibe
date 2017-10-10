<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "del") {
		try {
			
			$sysUserManager = ManagerFactory::getSysUserManager();
			$sysUser = $sysUserManager->GetSysUserByUserId($uId);
			if (!is_object($sysUser)) {
				throw new Exception("该用户不存在！",10001);
			}
			
			$sysUserManager->Del($uId);
			
			//JsUtil::Alert("删除成功！");
      $_SESSION["success_msg"] = "操作成功！";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("删除失败！");
        $_SESSION["err_msg"] = "操作失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>