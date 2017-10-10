<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "del") {
		try {
			
			$postManager = ManagerFactory::getPostManager();			
			$row = $postManager->GetPostById($postId);
			
			if ($row == "") {
				throw new Exception("该职位不存在！",10001);
			}
			
			$postManager->Del($postId);
			
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
      //捕获异常
      if ($e->getCode() != null) {
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