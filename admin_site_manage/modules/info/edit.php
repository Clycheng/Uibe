<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
						
			if ($title == "") {
				throw new Exception("信息标题不能为空！",10001);
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			if ($putTop == "") {
			  $putTop = 0;
			}
			if($issueDate == null) {
			  $issueDate = date('Y-m-d');
			}
			$infoManager = ManagerFactory::getInfoManager();
			if (!isset($infoId) || empty($infoId)) {
        $infoManager->Save($catId, $title,$imgPath, $seqNo, $seoTitle, $seoKey, $seoDescription, $content,$putTop, $source, $author, $issueDate);
			} else {
        $infoManager->Update($catId, $title,$imgPath, $seqNo, $seoTitle, $seoKey, $seoDescription, $content,$putTop, $source, $author, $issueDate, $infoId);
			}
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("initEdit.php?catId=".$catId);
			
		} catch(Exception $e) {
      //捕获异常
      if ($e->getCode() == 10001) {
        //JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
        JsUtil::Back(-1);
      } else {
        //JsUtil::Alert("操作失败！".$e);
        $_SESSION["err_msg"] = "操作失败！".$e;
        JsUtil::Back(-1);
      }
      JsUtil::Back(-1);
    }
		
	} else {
		JsUtil::Back(-1);
	}
			
?>