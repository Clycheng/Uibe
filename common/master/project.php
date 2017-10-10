<ul class="left_ul">

  <?
    $infoManager = ManagerFactory::getInfoManager();
    $newManager = ManagerFactory::getNewManager();
    $projectList = $categoryManager->GetCatListByParentId(19);
    
    foreach ($projectList as $record) {
      $firstUrl="";
      $infoObj = $infoManager->GetInfoObjectByCatId($record->catId);
      if($urlIsRewrite) {
        $firstUrl = "/project/list-".$record->parentId."-".$record->catId.".html";
      } else {
        $firstUrl = "/project.php?one=".$record->parentId."&two=".$record->catId;
      }
  ?>
    <li class="off">
      <a href="<?=$firstUrl?>" class="on_a"><?=$record->catName?></a>
    </li>
  <?
    }
  ?>
          
</ul>