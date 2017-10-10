<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
		
	if ($action == "del") {
		try {
			
			$teamManager = ManagerFactory::getTeamManager();
			$row = $teamManager->GetTeamById($tId);
			
			if ($row == "") {
				throw new Exception("该团队成员不存在！",10001);
			}
			
			$teamManager->Del($tId);
			
			//JsUtil::Alert("删除成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?catId=".$_GET["catId"]);
			
		} catch(Exception $e) {
      //捕获异常
      if ($e->getCode() != null) {
        //JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
        JsUtil::Back(-1);
      } else {
        //JsUtil::Alert("操作失败！");
        $_SESSION["err_msg"] = "操作失败！";
        JsUtil::Back(-1);
      }
      JsUtil::Back(-1);
    }
		
	} else {
		JsUtil::Back(-1);
	}
			
?>