<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "del") {
		try {
			
			$newManager = ManagerFactory::getNewManager();
			$row = $newManager->GetNewById($nId);
				
			if ($row == "") {
				throw new Exception("该新闻不存在！",10001);
			}
			
			$newManager->Del($nId);
			
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