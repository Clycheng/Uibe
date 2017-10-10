<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "del") {
		try {
			
			$newExhibitionManager = ManagerFactory::getNewExhibitionManager();
			$row = $newExhibitionManager->GetNewExhibitionById($nId);
				
			if ($row == "") {
				throw new Exception("该新闻不存在！",10001);
			}
			
			$newExhibitionManager->Del($nId);
			
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