<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		$msg = "";
		try {
			
			
			if ($oper == "isshow") {			
				$categoryManager = ManagerFactory::getCategoryManager();
				$row = $categoryManager->GetCatById($catId);
				
				if (!is_object($row)) {
					throw new Exception("该栏目不存在！", 100001);
				}
			
				$categoryManager->UpdateStatus($oper, $row->isShow, $catId);
				$msg = "此栏目状态设置";
			} else {
				$newExhibitionManager = ManagerFactory::getNewExhibitionManager();
				$row = $newExhibitionManager->GetNewExhibitionById($nId);
				if ($oper == "recom") {			
					
					$newExhibitionManager->UpdateStatus($oper, $row, $nId);
					
					$msg = "该条信息推荐状态设置";
				}
				
				if ($oper == "setisshow") {		
					
					$newExhibitionManager->UpdateStatus($oper, $row, $nId);
					
					$msg = "该条信息首页显示状态设置";
				}
				
				if ($oper == "issecondshow") {			
				
					$newExhibitionManager->UpdateStatus($oper, $row, $nId);
					
					$msg = "该条信息二级显示状态设置";
				}
				
				
				if ($oper == "puttop") {			
				
					$newExhibitionManager->UpdateStatus($oper, $row, $nId);
					
					$msg = "该条信息置顶显示状态设置";
				}
			}
			
		} catch(Exception $e) {
			//捕获异常
			JsUtil::Alert($msg."失败！");
			JsUtil::Back(-1);
		}		
		JsUtil::Alert($msg."成功！");
		JsUtil::gotoliwqbj("list.php?catId=".$_POST["parentId"]);
		
	} else {
		JsUtil::Back(-1);
	}
			
?>