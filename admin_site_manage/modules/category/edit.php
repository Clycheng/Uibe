<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "edit") {
		try {
			
			$categoryManager = ManagerFactory::getCategoryManager();
			$row = $categoryManager->GetCatById($catId);
				
			if (!is_object($row)) {
				throw new Exception("该栏目不存在！",10001);
			}
						
			/*$imgPath = $row->imgPath;
			if($_FILES[imgPath][name]){
				$img = new Image("imgPath","upload/image/category");
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
			
			if ($parentId == "") {
				$parentId = '0';
			}
      if ($parentId != '0') {
        $parentObj = $categoryManager->GetCatObjectByCatId($parentId);
        $path = $parentObj->path.",".$parentId;
      } else {
        $path = '0';
      }
			if ($style == "") {
				$style = 0;
			}
			if ($imgPath == "") {
				$imgPath = "";
			}
			if ($catName == "") {
				throw new Exception("栏目名称不能为空！",10001);
			}
			if ($description != "") {
				$description=stripslashes($description);
			}
			
      $categoryManager->Update($parentId, $catName, $menuName, $imgPath, $path, $seqNo, $style, $seoTitle, $seoKey, $seoDescription, $frontUrl, $backUrl, $description, $catId);
      
			//JsUtil::Alert("操作成功！");
      $_SESSION["success_msg"] = "操作成功";
      JsUtil::gotoliwqbj("list.php?catId=".$_POST["parentId"]."&path=".$_POST["path"]);
			
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