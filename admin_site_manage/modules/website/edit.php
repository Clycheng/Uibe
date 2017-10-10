<?php
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");		
	
	if ($action == "edit") {
		try {
      $webConfigManager = ManagerFactory::getWebConfigManager();
      $row = $webConfigManager->GetWebConfigById($wId);
      
      /*$imgPath = $row->imgPath;
      if($_FILES[imgPath][name]){
        $img = new Image("imgPath","upload/images/site");
        if($img->upload()){
          $imgPath = $img->getImgPath();
          $delImgPath = "../".$row->imgPath;
          echo "删除原来图片".$row->imgPath;
          @unlink($delImgPath);
        }else{
          echo $imgPath;
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
      }*/
      $imgPath = "";
			$webConfigManager->Update($name,$qq, $imgPath, $address, $serviceTel, $tellphone, $cellphone, $fax, $contact, $email, $url, $putOnRecords, $seoTitle, $seoKey, $seoDescription, $microblog, $copyright, $zipCode, $seqNo, $wId);
			
			//JsUtil::Alert("修改成功！");
      $_SESSION["success_msg"] = "添加成功";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				//JsUtil::Alert($e->getMessage());
        $_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("修改失败！");
        $_SESSION["err_msg"] = "添加成功";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
?>