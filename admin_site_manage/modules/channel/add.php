<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			if ($parentId == null || $parentId == "") {
				$parentId = '0';
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($path == "") {
				$path = "0";
			} else {
				$path = $path.",".$parentId;
			}			
			if ($name == "") {
				throw new Exception("频道名称不能为空！",10001);
			}
			if ($isContainCat=="") {
				$isContainCat = 0;
			}
			
			$channelManager = ManagerFactory::getChannelManager();
			$channelManager->Save($parentId, $name, $path, $seqNo, $backUrl, $description, $isContainCat);
			
      //JsUtil::Alert("添加成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?parentId=".$_POST["parentId"]."&path=".$_POST["path"]);
			
		} catch(Exception $e) {
      //捕获异常
      if ($e->getCode() == 10001) {
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