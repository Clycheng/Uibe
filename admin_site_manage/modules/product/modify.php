<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		$msg = "";
		try {
		
				$productManager = ManagerFactory::getProductManager();
				$row = $productManager->GetProductById($pId);
				if ($oper == "putTop") {			
					
					$productManager->UpdateStatus($oper, $row, $pId);
					
					$msg = "该条信息推荐状态设置";
				}
			
		} catch(Exception $e) {
			//捕获异常
			//JsUtil::Alert($msg."失败！");
      $_SESSION["err_msg"] = $msg."失败！";
			JsUtil::Back(-1);
		}		
		//JsUtil::Alert($msg."成功！");
		
    $_SESSION["success_msg"] = $msg."成功！";
		JsUtil::gotoliwqbj("list.php?catId=".$_POST["parentId"]);
		
	} else {
		JsUtil::Back(-1);
	}
			
?>