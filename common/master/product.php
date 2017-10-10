<ul class="left_ul">

  <?
    $infoManager = ManagerFactory::getInfoManager();
    $productManager = ManagerFactory::getProductManager();
    $productList = $categoryManager->GetCatListByParentId(3);
    
    foreach ($productList as $record) {
      $firstUrl="";
      $infoObj = $infoManager->GetInfoObjectByCatId($record->catId);
      if ($infoObj != null) {
	      if($urlIsRewrite) {
	        $firstUrl = "/product/detail-".$record->parentId."-".$record->catId."-".$infoObj->infoId.".html";
	      } else {
	        $firstUrl = "/product_detail.php?one=".$record->parentId."&two=".$record->catId."&id=".$infoObj->infoId;
	      }
      } else {
        $firstUrl="javascript:void(0)";
      }
  ?>
    <li class="off">
      <a href="<?=$firstUrl?>" class="on_a"><?=$record->catName?></a>
      <ol class="left_ol">
        <?
          $childProductList = $categoryManager->GetCatListByParentId($record->catId);
          foreach ($childProductList as $childRecord) {
            $product = $productManager->GetFirstProductByCatId($childRecord->catId);
            if ($product == null) {
              continue;
            }
            $secondUrl = "";
	          if($urlIsRewrite) {
			        $secondUrl = "/product/detail1-3-".$childRecord->parentId."-".$childRecord->catId."-".$product->pId.".html";
			      } else {
			        $secondUrl = "/product_detail1.php?one=3&two=".$childRecord->parentId."&third=".$childRecord->catId."&id=".$product->pId;
			      }
        ?>
        <li><a href="<?=$secondUrl?>" class="ol_cur"><i><?=$childRecord->catName?></i></a></li>
        <?
          }
        ?>
      </ol>
    </li>
  <?
    }
  ?>
          
</ul>