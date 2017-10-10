<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "add") {
		try {
			/*$img = new Image("imgPath","upload/image/product");
			if ($img->upload()) {
				$imgPath = $img->getImgPath();
			} else {
				$imgPath = "";
			}*/
      if ($seqNo == "") {
        $seqNo = 0;
      }
      if ($putTop == "") {
        $putTop = 0;
      }
			if ($name == "") {
				throw new Exception("产品名称不能为空！",10001);
			}
		    
      if ($content != "") {
        $content=stripslashes($content);
      }   
      if ($description != "") {
        $description=stripslashes($description);
      }
			
			$productManager = ManagerFactory::getProductManager();	
			$productManager->Save($catId, $name, $imgPath, $imgAlt, $seqNo,$putTop, $seoTitle, $seoKey, $seoDescription,$content,$description);
			
      //JsUtil::Alert("添加成功！");
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