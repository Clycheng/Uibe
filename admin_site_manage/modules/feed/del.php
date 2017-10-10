<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "del") {
		try {
			
			$feedManager = ManagerFactory::getFeedManager();			
			$row = $feedManager->GetFeedById($eId);
			
			if ($row == "") {
				throw new Exception("该订阅不存在！",10001);
			}
			
			$feedManager->Del($eId);
			
			JsUtil::Alert("删除成功！");
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				JsUtil::Alert($e->getMessage());
			} else {
				JsUtil::Alert("删除失败！");
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>