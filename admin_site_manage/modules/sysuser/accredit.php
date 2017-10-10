<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$sysUserManager = ManagerFactory::getSysUserManager();
			$sysUserManager->UpdateRights($rights,$catrights,$uId);
			
			//JsUtil::Alert("授权成功！");
      $_SESSION["success_msg"] = "操作成功！";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() != "") {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("修改失败！");
        $_SESSION["err_msg"] = "操作失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>