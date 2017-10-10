<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$slideManager = ManagerFactory::getSlideManager();			
			$row = $slideManager->GetSlideById($sId);
			
			if ($row == "") {
				throw new Exception("该幻灯片不存在！",10001);
			}
			if ($imgPath == "") {
				$imgPath = "";
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($title == "") {
				throw new Exception("标题不能为空！",10001);
			}
			
			$slideManager->Update($title, $imgPath, $imgAlt, $link, $seqNo, $remark, $sId);
		
      //JsUtil::Alert("操作成功！");
      $_SESSION["success_msg"] = "操作成功";
      JsUtil::gotoliwqbj("list.php?catId=".$catId);
    
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