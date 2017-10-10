<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			if ($seqNo == "") {
				$seqNo = 0;
			}		
			if ($post == "") {
				throw new Exception("职位名称不能为空！",10001);
			}		
      if ($address == "") {
        throw new Exception("工作地点不能为空！",10002);
      }
      if ($recruterNombre == "") {
        throw new Exception("招聘人数不能为空！",10003);
      }   
      if ($issueDate == "") {
        throw new Exception("发布日期不能为空！",10004);
      }   
		
      if ($content != "") {
        $content=stripslashes($content);
      }
			$jobManager = ManagerFactory::getJobManager();	
			$jobManager->Save($catId, $post, $recruterNombre,$address,$issueDate,$seqNo,$content);
			
			//JsUtil::Alert("添加成功！");
			$_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?catId=".$catId);
			
		} catch(Exception $e) {
      //捕获异常
      if ($e->getCode() != null) {
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