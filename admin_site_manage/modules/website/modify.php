<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		$msg = "";
		try {
			
			if ($oper == "isDisabled") {			
				$webConfigManager = ManagerFactory::getWebConfigManager();
				$row = $webConfigManager->GetWebConfigById($wId);
				
				if (!is_object($row)) {
					throw new Exception("该站点不存在！", 100001);
				}
			
				$webConfigManager->UpdateStatus($oper, $row->isDisabled, $wId);
				$msg = "此站点状态设置";
			}
			
		} catch(Exception $e) {
			//捕获异常
      //JsUtil::Alert($msg."失败！");
      $_SESSION["err_msg"] = $msg."失败！";
			JsUtil::Back(-1);
		}		
    //JsUtil::Alert($msg."成功！");
    $_SESSION["success_msg"] = $msg."成功！";
		JsUtil::gotoliwqbj("list.php");
		
	} else {
		JsUtil::Back(-1);
	}
			
?>