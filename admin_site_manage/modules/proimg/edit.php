<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$proImgManager = ManagerFactory::getProImgManager();			
			$row = $proImgManager->GetProImgByPiId($piId);
			
			if ($row == "") {
				throw new Exception("项目案例不存在！",10001);
			}
						
			/*$smallPic = $row->smallPic;
			if($_FILES[smallPic][name]){
				$img = new Image("smallPic","upload/images/proimg/smallPic");
				if($img->upload()){
					$smallPic = $img->getImgPath();
					$delImgPath = "../".$row->smallPic;
					echo "删除原来图片".$row->smallPic;
					@unlink($delImgPath);
				}else{
					echo $smallPic;
				}
			}
			if ($smallPic == "") {
				$smallPic = "";
			}
			
			$zoomPic = $row->zoomPic;
			if($_FILES[zoomPic][name]){
				$img = new Image("zoomPic","upload/images/proimg/zoomPic");
				if($img->upload()){
					$zoomPic = $img->getImgPath();
					$delImgPath = "../".$row->zoomPic;
					echo "删除原来图片".$row->zoomPic;
					@unlink($delImgPath);
				}else{
					echo $zoomPic;
				}
			}
			if ($zoomPic == "") {
				$zoomPic = "";
			}
			*/
    
      /*if ($smallPic != null) {
        if ($row->smallPic != null) {
          if ($row->smallPic != $smallPic) {
            echo "删除原来图片".$row->smallPic;
            @unlink($root."/".substr($row->smallPic, 1));
          }
        } else {
          echo $smallPic;
        }
      }
      if ($zoomPic != null) {
        if ($row->zoomPic != null) {
          if ($row->zoomPic != $zoomPic) {
            echo "删除原来图片".$row->zoomPic;
            @unlink($root."/".substr($row->zoomPic, 1));
          }
        } else {
          echo $zoomPic;
        }
      }*/
			if ($seqNo == "") {
				$seqNo = 0;
			}
      if ($name == "") {
        throw new Exception("项目案例名称不能为空！",10002);
      }
			
			$proImgManager->Update($pId, $name, $smallPic, $zoomPic, $seqNo, $piId);
			
			//JsUtil::Alert("修改成功！");
      $_SESSION["success_msg"] = "操作成功";
			JsUtil::gotoliwqbj("list.php?pId=".pId."&catId=".$catId);
			
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