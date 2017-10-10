<?
class FrontUtil {
  
  static function GetLocation($catId) {
    if ($catId == "" || $catId == 0) {
      return "";
    }
    $categoryManager = ManagerFactory::getCategoryManager();
    $categoryobject = $categoryManager->GetCatObjectByCatId($catId);
    if (!is_object($categoryobject)) {
      return "";
    }
    
    $link = self::generateLink($categoryobject);
    
    $catName = "<a href=\"".$link."\">".$categoryobject->catName."</a>";
    $parentId = $categoryobject->parentId;
    if ($parentId != 0) {
      return self::GetParentLocation($parentId)." > ".$catName;
    } else {
      return " > ".$catName;
    }
  }
  
  static function GetParentLocation($catId) {
    
    if ($catId == "" || $catId == 0) {
      return "";
    }
    $categoryManager = ManagerFactory::getCategoryManager();
    $categoryobject= $categoryManager->GetCatObjectByCatId($catId);
    if(!is_object($categoryobject)) {
      return "";
    }
    $link = self::generateLink($categoryobject);
    
    $parentCatName = "<a href='".$link."'>".$categoryobject->catName."</a>";
    $parentId = $categoryobject->parentId;
    if ($parentId != 0) {
      return self::GetParentLocation($parentId)." > ".$parentCatName;
    } else {
      return " > ".$parentCatName;
    }     
  }
  
  static function generateLink($categoryobject) {
    global $urlIsRewrite;
    $link = "";
    if ($categoryobject->parentId == null || $categoryobject->parentId == 0) {
      if ($urlIsRewrite) {
        $link .= $categoryobject->frontUrl."/";//."-".$categoryobject->catId.".html";
      } else {
        $link .= $categoryobject->frontUrl.".php"."?one=".$categoryobject->catId;
      }
    } else {
      if ($urlIsRewrite) {
        if ($categoryobject->style == 1) {
          $link .= $categoryobject->frontUrl."/detail-".$categoryobject->parentId."-".$categoryobject->catId.".html";
        } else {
          $link .= $categoryobject->frontUrl."/list-".$categoryobject->parentId."-".$categoryobject->catId.".html";
        }
      } else {
        $link .= $categoryobject->frontUrl.".php"."?one=".$categoryobject->parentId."&two=".$categoryobject->catId;
      }
    }
    return $link;
  }
  
  static function GenerateSecondCatMenu($twoCatList, $two) {
    global $urlIsRewrite;
    foreach($twoCatList as $row) {
      $clz = "";
      echo "\n";
      echo "<li>";
      echo "\n";
      if ($urlIsRewrite) {
        if ($row->style == 1) {
          echo "<a $clz href=\"".$row->frontUrl."/detail-".$row->parentId."-".$row->catId.".html\">".$row->catName."</a>";
        } else {
          echo "<a $clz href=\"".$row->frontUrl."/list-".$row->parentId."-".$row->catId.".html\">".$row->catName."</a>";
        }
      } else {
        echo "<a $clz href=\"".$row->frontUrl.".php"."?one=".$row->parentId."&two=".$row->catId."\">".$row->catName."</a>";
      }
      echo "\n";
      echo "</li>";
      echo "\n";
    }
  }

  static function GenerateThirdCatMenu($thirdCatList, $one, $third) {
    global $urlIsRewrite;
    foreach($thirdCatList as $row) {
      $index++;
      echo "\n";
      echo "<li";
      if ($row->catId == $third) {
        echo " class=\"dq\"";
      }
      echo ">";
      if ($urlIsRewrite) {
        echo "<a href=\"".$row->frontUrl."/list-".$one."-".$row->parentId."-".$row->catId.".html\">".$row->catName."</a></li>";
      } else {
        echo "<a href=\"".$row->frontUrl.".php"."?one=".$one."&two=".$row->parentId."&third=".$row->catId."\">".$row->catName."</a></li>";
      }
      echo "\n";
    }
  }
  
}

?>