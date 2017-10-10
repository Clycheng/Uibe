<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "add") {
		try {
			if ($title == "") {
				throw new Exception("资讯标题不能为空！",10001);
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			
			$infoManager = ManagerFactory::getInfoManager();
			$infoManager->Save($catId, $title, $seqNo, $seoTitle, $seoKey, $seoDescription, $content);
			
			JsUtil::Alert("添加成功！");
			JsUtil::gotoliwqbj("list.php?catId=".$_POST["catId"]);
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				JsUtil::Alert($e->getMessage());
			} else {
				JsUtil::Alert("添加失败！");
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>