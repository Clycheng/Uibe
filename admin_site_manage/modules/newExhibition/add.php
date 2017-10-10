<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "add") {
		try {
		
			$img = new Image("imgPath","upload/images/newExhibition");
			if ($img->upload()) {
				$imgPath = $img->getImgPath();
			}
			$img = new Image("thumbnailPath","upload/images/newExhibition/thumbnail");
			if ($img->upload()) {
				$thumbnailPath = $img->getImgPath();
			}
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
				throw new Exception("资讯标题不能为空！",10001);
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			
			$newExhibitionManager = ManagerFactory::getNewExhibitionManager();
		
			$newExhibitionManager->Save($catId,$imgPath,$imgAlt,$title,$time,$place,$address,$content,$seqNo,$seoTitle,$seoKey,$seoDescription,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt);
			
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