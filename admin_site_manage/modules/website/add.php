<?php
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");		
	
	if ($action == "add") {
		try {
			
		  /*$img = new Image("imgPath","upload/images/site");
      if ($img->upload()) {
        $imgPath = $img->getImgPath();
      }*/
		  $imgPath = "";
			$webConfigManager = ManagerFactory::getWebConfigManager();
			$webConfigManager->Save($name,$qq, $imgPath, $address, $serviceTel, $tellphone, $cellphone, $fax, $contact, $email, $url, $putOnRecords, $seoTitle, $seoKey, $seoDescription, $microblog, $copyright, $zipCode, $seqNo);
			
			//JsUtil::Alert("添加成功！");
			$_SESSION["success_msg"] = "添加成功";
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				JsUtil::Alert($e->getMessage());
				$_SESSION["err_msg"] = $e->getMessage();
			} else {
				//JsUtil::Alert("修改失败！");
				$_SESSION["err_msg"] = "修改失败！";
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
?>