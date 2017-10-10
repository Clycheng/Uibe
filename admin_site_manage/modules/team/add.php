<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "add") {
		try {
		
			/*$img = new Image("imgPath","upload/image/team");
			if ($img->upload()) {
				$imgPath = $img->getImgPath();
			}
			if ($imgPath == "") {
				$imgPath = "";
			}
			*/
			if ($putTop == "") {
				$putTop = 0;
			}
			if ($isShow == "") {
				$isShow = 0;
			}
			if ($isSecondShow == "") {
				$isSecondShow = 0;
			}
			if ($recom == "") {
				$recom = 0;
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($name == "") {
				throw new Exception("团队成员姓名不能为空！",10001);
			}
		
			$teamManager = ManagerFactory::getTeamManager();
			$teamManager->Save($catId, $name, $seqNo, $post, $imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$seoTitle,$seoKey,$seoDescription,$content,$intro);
			
      //JsUtil::Alert("添加成功！");
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