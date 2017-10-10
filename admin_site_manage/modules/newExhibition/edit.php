<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "edit") {
		try {
					
			$newExhibitionManager = ManagerFactory::getNewExhibitionManager();
			$row = $newExhibitionManager->GetNewExhibitionById($nId);
						
			$imgPath = $row->imgPath;
			if($_FILES[imgPath][name]){
				$img = new Image("imgPath","upload/images/newExhibition");
				if($img->upload()){
					$imgPath = $img->getImgPath();
					$delImgPath = "../".$row->imgPath;
					echo "删除原来图片".$row->imgPath;
					@unlink($delImgPath);
				}else{
					echo $imgPath;
				}
			}
			$thumbnailPath = $row->thumbnailPath;
			if($_FILES[thumbnailPath][name]){
				$img = new Image("thumbnailPath","upload/images/newExhibition/thumbnail");
				if($img->upload()){
					$thumbnailPath = $img->getImgPath();
					$delImgPath = "../".$row->thumbnailPath;
					echo "删除原来图片".$row->thumbnailPath;
					@unlink($delImgPath);
				}else{
					echo $thumbnailPath;
				}
			}
			if ($putTop == "") {
				$putTop = 0;
			}
			if ($isShow == "") {
				$isShow = 0;
			}
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($isSecondShow == "") {
				$isSecondShow = 0;
			}
			if ($recom == "") {
				$recom = 0;
			}
			if ($title == "") {
				throw new Exception("资讯标题不能为空！",10001);
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			
			$newExhibitionManager->Update($catId,$imgPath,$imgAlt,$title,$time,$place,$address,$content,$seqNo,$seoTitle,$seoKey,$seoDescription,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$nId);
			
			JsUtil::Alert("修改成功！");
			JsUtil::gotoliwqbj("list.php?catId=".$_POST["catId"]);
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				JsUtil::Alert($e->getMessage());
			} else {
				JsUtil::Alert("修改失败！");
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>