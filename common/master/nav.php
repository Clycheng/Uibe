<div class="head">
  <div class="logo"><img src="/resources/images/img_02.jpg" /></div>
  <div class="biaoyu"><span>國際財務策劃師公會中國北京代表處</span><br />
    INTERNATIONAL ASSOCIATION OF RFP IN BEIJING</div>
</div>
<div class="nav">
  <div class="cw_nav1">
    <ul id="nav">
      <?
	      $categoryManager = ManagerFactory::getCategoryManager();
	      $navcount = $categoryManager->GetNavCount(0);
	      $navlist = $categoryManager->GetNavList(0);
	      $index = 0;
	      $count = count($navlist);
	      foreach($navlist as $navobject) { 
	        $index++;
	        $clz = "";
          if ($index == $count) {
            $clz = "style=\"background:none;\"";
          }
	        if ($urlIsRewrite) {
	          $frontUrl = $navobject->frontUrl;
	          if ($frontUrl=="/") {
	            $url = $frontUrl;
	          } else if (!strrpos($frontUrl,"/",1)){
	            $url = $frontUrl."/";
	          } else {
	            $url = $frontUrl;
	          } 
	        }else {
	          $frontUrl = $navobject->frontUrl;
	          if (empty($frontUrl) || $frontUrl == "/") {
	            $url = $frontUrl;
	          } else {
	            $url = $frontUrl.".php";
	          }
	        }
	        $footMenu = $footMenu."<a href=\"".$url."\">".$navobject->catName."</a>";
	        if ($index < $navcount) {
	          $footMenu = $footMenu." | ";
	        }
	    ?>
      <li <?=$clz?>><a href="<?=$url?>"><?=$navobject->catName?></a>
      <?
       $navcount = $categoryManager->GetNavCount($navobject->catId);
       $navlist = $categoryManager->GetNavList($navobject->catId);
       if ($navlist != null) {
	    ?>
	     <ul>
	     <?
	        foreach($navlist as $childnavobject) {
	          if ($urlIsRewrite) {
	            $childfrontUrl = $childnavobject->frontUrl;
	            if ($childfrontUrl=="/") {
	              $childurl = $childfrontUrl;
	            } else if (!strrpos($childfrontUrl,"/",1)){
	              if ($childnavobject->style == 1) {
	                $childurl = $childfrontUrl."/"."detail-".$childnavobject->parentId."-".$childnavobject->catId.".html";
	              } else {
	                $childurl = $childfrontUrl."/"."list-".$childnavobject->parentId."-".$childnavobject->catId.".html";
	              }
	            } else {
	              $childurl = $childfrontUrl."detail-".$childnavobject->parentId."-".$childnavobject->catId.".html";
	            } 
	          }else {
	            $childfrontUrl = $childnavobject->frontUrl;
	            if (empty($childfrontUrl) || $childfrontUrl == "/") {
	              $childurl = $childfrontUrl;
	            } else {
	              $childurl = $childfrontUrl.".php?one=".$childnavobject->parentId."&two=".$childnavobject->catId;
	            }
	          }
	      ?>
	        <li><a href="<?=$childurl?>"><?=$childnavobject->catName?></a></li>
	      <?
	        }
	      ?>
	      </ul>
      <? } ?>
      </li>
      <?
        }
      ?>
    </ul>
  </div>
</div>
