<?php
class MenuUtil {
    
  function MenuUtil() {
  }
  
  public static function channelTree($parentId, $rights, $catrights) {
    
    if ($parentId == "") {
      return;
    }
    $channelManager=ManagerFactory::getChannelManager();
    $channels = $channelManager->GetChannelListByParentId($parentId);
    $num = $channelManager->GetChannelCountByParentId($parentId);
    $index=0;
    foreach ($channels as $row) {
      $childChannelNum = $channelManager->GetChannelCountByParentId($row->cId);
      
      echo "\n";
      echo "{ id: '".$row->cId."', pId: '".$parentId."', name:\"".$row->name."\"";
      if ($childChannelNum > 0 or $row->isContainCat == "1") {
        echo ", open:true ";
      }
      if (Authority::checkAuth($rights, $row->cId)) {
        echo ", checked:true ";
      }
        echo "}";
      
      if ($index < $num) {
        echo ",";
      }
      $index++;
      
      if ($childChannelNum > 0) {
        self::channelTree($row->cId, $rights, $catrights);
      }
      
      if ($row->isContainCat == "1") {
        self::categoryTree($row->cId,"0", $catrights);
      }
      
    }   
    
  }
  
  public static function categoryTree($catId, $parentId, $catrights) {
    
    if ($parentId == "") {
      return;
    }
    
    $categoryManager = ManagerFactory::getCategoryManager();
    
    $num = $categoryManager->GetCatCountByParentId($parentId);
    $index=0;
    $cats = $categoryManager->GetCatListByParentId($parentId);
    foreach($cats as $row) {
      $childCats = $categoryManager->GetCatListByParentId($row->catId);
      $childCatNum = $categoryManager->GetCatCountByParentId($row->catId);
        echo "\n";
        echo "{ id: 'cat_".$row->catId."', pId: '".$catId."', name:\"".$row->menuName."\"";
      if ($childCatNum > 0) {
        echo ", open:true ";
      }
      
      if (Authority::checkAuth($catrights, $row->catId)) {
        echo ", checked:true ";
      }
        echo "}";
      
      if ($index < $num) {
        echo ",";
      }
      $index++;
      
      if ($childCatNum > 0) {
        self::categoryTree("cat_".$row->catId,$row->catId, $catrights);
      }
    }
    
    
  }
  
  public static function createChannelMenuHTML($isAdmin, $parentId, $rights, $catrights) {
    
    if ($parentId == "") {
      return;
    }
    $channelManager = ManagerFactory::getChannelManager();
    $channels = $channelManager->GetChannelListByParentId($parentId);
    $num = $channelManager->GetChannelCountByParentId($parentId);
    
    foreach ($channels as $row) {
      $childChannels = $channelManager->GetChannelListByParentId($row->cId);
      $childChannelNum = $channelManager->GetChannelCountByParentId($row->cId);
      
      if ($isAdmin or Authority::checkAuth($rights, $row->cId)) {
        
        echo "\n";
        $click = "";
        if (!empty($row->backUrl)) {
          $click="onclick=\"window.parent.main.location.href='".$row->backUrl."'\" target=\"main\"";
        }
        echo "  <h1 class=\"type\"><a href=\"javascript:void(0)\" $click>".$row->name."</a></h1>\n";
        echo "  <div class=\"content\">\n";
        echo "    <div>\n";
        echo "       <img src=\"./resources/images/menu_topline.gif\" width=\"188\" height=\"5\" />\n";
        echo "    </div>\n";
        
        if ($childChannelNum > 0) {
          
          echo "    <ul class=\"son_type\">\n";
          foreach ($childChannels as $childRow) {
            if ($isAdmin or Authority::checkAuth($rights, $childRow->cId)) {
          echo "      <li>\n";
          echo "         <a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$childRow->backUrl."'\" target=\"main\">".$childRow->name."</a>\n";
          echo "      </li>\n";
            }
          }
        }
        if ($row->isContainCat == "1") {
            self::categoryMenu($isAdmin, $row->cId,"0", $catrights);
        }
        echo "    </ul>\n";
        echo "  </div>\n";
      }
    }
  }
  
  public static function categoryMenu($isAdmin, $catId, $parentId, $catrights) {
    
    if ($parentId == "") {
      return;
    }
    $categoryManager = ManagerFactory::getCategoryManager();
    echo "\n";
    echo "    <div class=\"sec_menu\">\n";
  
    $cats = $categoryManager->GetCatListByParentId($parentId);
    $index=0;
    foreach($cats as $row) {
      //if ($row->isBackShow != 1) {
      //  continue;
      //}
      
//      if ($row->style == 1) {
//        continue;
//      }
      $childCatNum = $categoryManager->GetCatCountByParentId($row->catId);
      
      if ($isAdmin or Authority::checkAuth($catrights, $row->catId)) {
      
        echo "      <div class=\"centent0\">\n";
        echo "         <div class=\"shou\">\n";
        echo "            <div class=\"shou_a\">\n";
        echo "               <img src=\"./resources/images/submenusub.gif\" width=\"11\" height=\"7\">&nbsp;\n";
        if (!empty($row->backUrl)) {
          echo "               <a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$row->backUrl."?catId=".$row->catId."'\" target='main'>".$row->menuName."</a>\n";
        } else {
          echo "                 ".$row->menuName."";
        }
        /*if ($childCatNum == 0) {
          echo "               <a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$row->backUrl."?catId=".$row->catId."'\" target='main'>".$row->menuName."</a>\n";
        } else {
          echo "                 ".$row->menuName."";
        }
        */
        echo "            </div>\n";
        
        if ($childCatNum != 0) {
        echo "            <div id=\"expand".$index."\" class=\"shou_b\" onClick='ExpandOrCollapse(\"expandTip".$index."\",\"expand".$index."\");' >+ 展开</div>\n";
        }
        
        echo "         </div>\n";
        
        echo "         <div id=\"expandTip".$index."\" style=\"display:none;background:url(resources/images/menu_bgopen.gif) repeat-y; padding-left:10px; padding-top:5px;\">";           
      if ($childCatNum > 0) {
        echo "\n";//&clubs;
        self::childCategoryMenu($isAdmin, $row->catId, $row->catId, $catrights,"&gt;");
      }           
      echo "         </div>\n";           
      echo "      </div>\n";
          
      }
      $index++;
    }
      
    echo "    </div>\n";
  }
  
  public static function childCategoryMenu($isAdmin, $catId, $parentId, $catrights, $icon){
    $categoryManager = ManagerFactory::getCategoryManager();
    
    $cats = $categoryManager->GetCatListByParentId($parentId);
    foreach($cats as $row) {
  
      $childcats = $categoryManager->GetCatListByParentId($row->catId);
      $childcatnum = $categoryManager->GetCatCountByParentId($row->catId);
      //if ($row->isBackShow != 1) {
      //  continue;
      //}
      if ($isAdmin or Authority::checkAuth($catrights, $row->catId)) {
        //if ($childcatnum != 0) {
        if (empty($row->backUrl)) {
          echo "<div class='shou_er' onMouseOver='this.style.background='#FFFFD0';this.style.cursor='pointer''";
          echo " onMouseOut='this.style.background='ffffff''>\n";
          echo " <span style='font-weight:bold;color:#3399FF'>".self::GetIcon($row->path, $icon)."</span>&nbsp;".$row->menuName."</div>\n";
        } else {
          echo "<div class='shou_er' onMouseOver='this.style.background='#FFFFD0';this.style.cursor='pointer''";
          echo " onMouseOut='this.style.background='ffffff''>\n";
          echo "<span style='font-weight:bold;color:#999;";
          echo "'>".self::GetIcon($row->path, "&gt;")."</span>&nbsp;<a href=\"javascript:void(0);\" onclick=\"window.parent.main.location.href='".$row->backUrl."?catId=".$row->catId."'\" target='main'>".$row->menuName."</a>\n";
          echo "</div>";
        }
      }
      self::childCategoryMenu($isAdmin, $row->catId,$row->catId, $catrights, $icon);
    }
  }
  
  private static function GetIcon($path, $icon) {
    $count = count(explode(",",$path));
    if ($count == 2) {
      return "&nbsp;&nbsp;".$icon;
    } else {
      return "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$icon;
    }
  }
}
?>
