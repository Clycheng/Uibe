<? 
	@session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
      $userManager = ManagerFactory::getUserManager();
      
      $record = $userManager->GetUserById($userId);
			
			if ($record == "") {
				throw new Exception("该学员不存在！",10001);
			}
      if ($realName == "") {
        throw new Exception("姓名不能为空！",10001);
      }
      
			$userManager->Update($realName, $certificate, $userType, $number, $issuedDate, $audit, $userId);
			
			$_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php");
			
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