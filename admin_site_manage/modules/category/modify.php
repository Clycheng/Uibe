<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$categoryManager = ManagerFactory::getCategoryManager();
			$row = $categoryManager->GetCatById($catId);
			
			if (!is_object($row)) {
				throw new Exception("该栏目不存在！", 100001);
			}
			
			$categoryManager->UpdateStatus($oper, $row->isShow, $catId);
			
			//JsUtil::Alert("此栏目状态设置成功！");
      $_SESSION["success_msg"] = "此栏目状态设置成功！";
			JsUtil::gotoliwqbj("list.php?catId=$parentId");
			
		} catch(Exception $e) {
			//捕获异常
			//JsUtil::Alert("此栏目状态设置无效！");
			$_SESSION["err_msg"] = "此栏目状态设置无效！";
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>