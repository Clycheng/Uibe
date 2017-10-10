<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$partnerManager = ManagerFactory::getPartnerManager();
			$row =  $partnerManager->GetPartnerById($pId);
			
			/*$imgPath = $row->imgPath;
			if($_FILES[imgPath][name]){
				$img = new Image("imgPath","upload/images/partner");
				if($img->upload()){
					$imgPath = $img->getImgPath();
					$delImgPath = "../".$row->imgPath;
					echo "删除原来图片".$row->imgPath;
					@unlink($delImgPath);
				}else{
					echo $imgPath;
				}
			}*/
			
		
      /*if ($smallImgPath != null) {
        if ($row->smallImgPath != null) {
          if ($row->smallImgPath != $smallImgPath) {
            echo "删除原来图片".$row->smallImgPath;
            @unlink($root."/".substr($row->smallImgPath, 1));
          }
        } else {
          echo $smallImgPath;
        }
      }
      if ($bigImgPath != null) {
        if ($row->bigImgPath != null) {
          if ($row->bigImgPath != $bigImgPath) {
            echo "删除原来图片".$row->bigImgPath;
            @unlink($root."/".substr($row->bigImgPath, 1));
          }
        } else {
          echo $bigImgPath;
        }
      }*/
      
			if ($seqNo == "") {
				$seqNo = 0;
			}
			if ($title == "") {
				throw new Exception("标题不能为空！",10001);
			}
			
			$partnerManager->Update($title, $smallImgPath, $smallImgAlt, $bigImgPath, $bigImgAlt, $link, $seqNo, $remark, $pId);
			
			//JsUtil::Alert("操作成功！");
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