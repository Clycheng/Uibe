<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			/*$img = new Image("imgPath","upload/images/partner");
			if ($img->upload()) {
				$imgPath = $img->getImgPath();
			}*/
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($title == "") {
				throw new Exception("标题不能为空！",10001);
			}
		
			$partnerManager = ManagerFactory::getPartnerManager();
			$partnerManager->Save($catId, $title, $smallImgPath, $smallImgAlt,$bigImgPath, $bigImgAlt, $link, $seqNo,$remark);
			
			//JsUtil::Alert("操作成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?catId=$catId");
		 
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