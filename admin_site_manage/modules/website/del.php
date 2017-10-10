<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
		
	if ($action == "del") {
		try {
			
			$webConfigManager = ManagerFactory::getWebConfigManager();
			$row = $webConfigManager->GetWebConfigById($wId);
			
			if ($row == "") {
				throw new Exception("该站点不存在！",10001);
			}
			
			$webConfigManager->Del($wId);
			
			//JsUtil::Alert("删除成功！");
      $_SESSION["success_msg"] = "删除成功！";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("删除失败！");
        $_SESSION["err_msg"] = "删除失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>