<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "del") {
		try {
			
			$infoManager = ManagerFactory::getInfoManager();
			$row = $infoManager->GetInfoByInfoId($infoId);
				
			if (!is_object($row)) {
				throw new Exception("该资讯不存在！",10001);
			}
			
			$infoManager->Del($infoId);
			
			JsUtil::Alert("删除成功！");
			JsUtil::gotoliwqbj("list.php?catId=".$_GET["catId"]);
			
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