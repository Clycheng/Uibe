<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "add") {
		try {
		
			/*$img = new Image("imgPath","upload/images/news");
			if ($img->upload()) {
				$imgPath = $img->getImgPath();
			}
			$img = new Image("thumbnailPath","upload/images/news/thumbnail");
			if ($img->upload()) {
				$thumbnailPath = $img->getImgPath();
			}*/
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
			if ($title == "") {
				throw new Exception("信息标题不能为空！",10001);
			}
			if ($issueDate != "") {
				if(ereg("/\d{4}-\d{2}-\d{2}/",$issueDate)) {
					throw new Exception("日期格式不正确！",10002);
				}
			}
			
			if ($issueDate == "") {
				$issueDate = date('Y-m-d');
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			
			$newManager = ManagerFactory::getNewManager();
		
			$newManager->Save($catId,$title,$issueDate,$seqNo,$seoTitle,$seoKey,$seoDescription,$content,$origin,$intro,$imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$author);
			
			//JsUtil::Alert("添加成功！");
			$_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?catId=".$_POST["catId"]);
			
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