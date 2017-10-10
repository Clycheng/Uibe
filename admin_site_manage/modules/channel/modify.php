<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$channelManager = ManagerFactory::getChannelManager();
			$row = $channelManager->GetChannelById($cId);
			if (!is_object($row)) {
				throw new Exception("该频道不存在！",10001);
			}
			
			$channelManager->UpdateStatus($oper, $row->isShow, $cId);
			
			//JsUtil::Alert("此频道状态设置成功！");
      $_SESSION["success_msg"] = "此频道状态设置成功！";
			JsUtil::gotoliwqbj("list.php?parentId=".$_POST["parentId"]);
			
		} catch(Exception $e) {
			//捕获异常
			//JsUtil::Alert("此频道状态设置无效！");
      $_SESSION["err_msg"] = "此频道状态设置无效！";
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>