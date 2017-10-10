<? 
	@session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			if ($entryName == "") {
				throw new Exception("字典名称不能为空！",10001);
			}
			if ($seqNo == null) {
			  $seqNo = 0;
			}
		  
			$dictEntryManager = ManagerFactory::getDictEntryManager();
			$dictEntryManager->Save($entryName, $entryDesc, $dictType, $seqNo);
			
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