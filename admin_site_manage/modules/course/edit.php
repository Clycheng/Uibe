<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
      $courseManager = ManagerFactory::getCourseManager();      
      $record = $courseManager->GetCourseById($courseId);
			
			if ($record == "") {
        throw new Exception("该考试成绩不存在！",10001);
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
      if ($name == "") {
        throw new Exception("考试科目不能为空！",10001);
      }
      if ($level == "") {
        throw new Exception("考试等级不能为空！",10001);
      }
			$courseManager->Update($name, $level, $userId, $seqNo, $courseId);
			
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?userId=".$userId);
			
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