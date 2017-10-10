<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "edit") {
		try {
					
			$newManager = ManagerFactory::getNewManager();
			$row = $newManager->GetNewById($nId);
						
			/*$imgPath = $row->imgPath;
			if($_FILES[imgPath][name]){
				$img = new Image("imgPath","upload/images/news");
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
				$img = new Image("thumbnailPath","upload/images/news/thumbnail");
				if($img->upload()){
					$thumbnailPath = $img->getImgPath();
					$delImgPath = "../".$row->thumbnailPath;
					echo "删除原来图片".$row->thumbnailPath;
					@unlink($delImgPath);
				}else{
					echo $thumbnailPath;
				}
			}*/
			
		
      /*if ($imgPath != null) {
        if ($row->imgPath != null) {
          if ($row->imgPath != $imgPath) {
            echo "删除原来图片".$row->imgPath;
            @unlink($root."/".substr($row->imgPath, 1));
          }
        } else {
          echo $imgPath;
        }
      }
      if ($thumbnailPath != null) {
        if ($row->thumbnailPath != null) {
          if ($row->thumbnailPath != $thumbnailPath) {
            echo "删除原来图片".$row->thumbnailPath;
            @unlink($root."/".substr($row->thumbnailPath, 1));
          }
        } else {
          echo $thumbnailPath;
        }
      }*/
      
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
				throw new Exception("信息标题不能为空！",10001);
			}
			if ($issueDate != "") {
				if(!preg_match("/^(19|20)\d{2}-(0?\d|1[012])-(0?\d|[12]\d|3[01])$/",$issueDate)) {
					throw new Exception("日期格式不正确！",10001);
				}
			}
			if ($content != "") {
				$content=stripslashes($content);
			}
			
			$newManager->Update($catId, $title, $seqNo, $seoTitle,$seoKey,$seoDescription,$content,$origin, $intro,$imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$issueDate,$thumbnailPath,$thumbnailAlt,$author,$nId);
			
			//JsUtil::Alert("修改成功！");
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