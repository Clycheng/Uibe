<? 
	@session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			if ($seqNo == "") {
				$seqNo = 0;
			}
      if ($name == "") {
        throw new Exception("考试科目不能为空！",10001);
      }
      if ($level == "") {
        throw new Exception("考试等级不能为空！",10001);
      }
			
			$courseManager = ManagerFactory::getCourseManager();	
			$courseManager->Save($name, $level, $userId, $seqNo);
			
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?&userId=".$userId);
		
    } catch(Exception $e) {
      //捕获异常
      if ($e->getCode() == 10001) {
        $_SESSION["err_msg"] = $e->getMessage();
        JsUtil::Back(-1);
      } else {
        $_SESSION["err_msg"] = "操作失败！";
        JsUtil::Back(-1);
      }
      JsUtil::Back(-1);
    }
	} else {
		JsUtil::Back(-1);
	}
			
?>