<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			/*$img = new Image("smallPic","upload/images/proimg/smallPic");
			if ($img->upload()) {
				$smallPic = $img->getImgPath();
			} else {
				$smallPic = "";
			}
			$img = new Image("zoomPic","upload/images/proimg/zoomPic");
			if ($img->upload()) {
				$zoomPic = $img->getImgPath();
			} else {
				$zoomPic = "";
			}*/
			if ($seqNo == "") {
				$seqNo = 0;
			}
      if ($name == "") {
        throw new Exception("项目案例名称不能为空！",10001);
      }
			
			$proImgManager = ManagerFactory::getProImgManager();	
			$proImgManager->Save($pId,$name, $smallPic, $zoomPic, $seqNo);
			
			//JsUtil::Alert("添加成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?catId=".$catId."&pId=".$pId);
		
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