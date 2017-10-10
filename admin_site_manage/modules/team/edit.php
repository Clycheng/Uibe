<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");	
	
	if ($action == "edit") {
		try {
					
			$teamManager = ManagerFactory::getTeamManager();
			$row = $teamManager->GetTeamById($tId);
						
			/*$imgPath = $row->imgPath;
			if($_FILES[imgPath][name]){
				$img = new Image("imgPath","upload/image/team");
				if($img->upload()){
					$imgPath = $img->getImgPath();
					$delImgPath = "../".$row->imgPath;
					echo "删除原来图片".$row->imgPath;
					@unlink($delImgPath);
				}else{
					echo $imgPath;
				}
			}
			if ($imgPath == "") {
				$imgPath = "";
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
			if ($name == "") {
				throw new Exception("团队成员姓名不能为空！",10001);
			}
			
			$teamManager->Update($catId, $name, $seqNo, $post, $imgPath, $imgAlt, $putTop, $isShow, $isSecondShow, $recom,$thumbnailPath,$thumbnailAlt,$seoTitle,$seoKey,$seoDescription,$content,$intro, $tId);
			
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