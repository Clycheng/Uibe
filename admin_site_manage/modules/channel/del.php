<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "del") {
		try {
			
			$channelManager = ManagerFactory::getChannelManager();
			$row = $channelManager->GetChannelById($cId);
				
			if (!is_object($row)) {
				throw new Exception("该频道不存在！",10001);
			}
			
			$channelManager->Del($cId);
			
			//JsUtil::Alert("删除成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?parentId=".$_GET["parentId"]);
			
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