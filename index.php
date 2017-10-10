<? require_once("core/common/globalFilter.php");?>
<? require_once("common/lib/config.php");?>
<?
  $categoryManager = ManagerFactory::getCategoryManager();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<? require_once("common/master/header.php");?>
<? require_once("common/master/seo.php");?>
</head>

<body>
  <? require_once("common/master/nav.php");?>

<div class="nav_x"></div>
<div class="home_main">
  <div class="banner">
    <div id="fsD1" class="focus" >
      <div id="D1pic1" class="fPic">
      <?
        $slideManager = ManagerFactory::getSlideManager();
        $slideList = $slideManager->GetSlideList(21);
        foreach ($slideList as $slide) {
      ?>
        <div class="fcon" style="display: none;"> <a target="_blank" href="#"><img src="<?=$slide->imgPath?>" style="opacity: 1; "/></a> <span class="shadow"></span> </div>
      <?
        }
      ?>
      </div>
      <div class="fbg">
        <div class="D1fBt" id="D1fBt"> <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a> </div>
      </div>
      <span class="prev"></span> <span class="next"></span> </div>
    <script type="text/javascript">
      Qfast.add('widgets', { path: "/resources/scripts/terminator2.2.min.js", type: "js", requires: ['fx'] });  
      Qfast(false, 'widgets', function () {
        K.tabs({
          id: 'fsD1',   //焦点图包裹id  
          conId: "D1pic1",  //** 大图域包裹id  
          tabId:"D1fBt",  
          tabTn:"a",
          conCn: '.fcon', //** 大图域配置class       
          auto: 1,   //自动播放 1或0
          effect: 'fade',   //效果配置
          eType: 'click', //** 鼠标事件
          pageBt:true,//是否有按钮切换页码
          bns: ['.prev', '.next'],//** 前后按钮配置class                          
          interval: 3000  //** 停顿时间  
        }) 
      })  
    </script>
  </div>
  <div class="ztc">
    <div class="ztc1"></div>
    <div class="ztc2">
      <?
        $categoryManager = ManagerFactory::getCategoryManager();
        $navcount = $categoryManager->GetNavCountByCatIdIn("3,9,13");
        $navlist = $categoryManager->GetNavListByCatIdIn("3,9,13");
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
      <dl>
        <dt><?=$navobject->catName?></dt>
        <?
         $navcount = $categoryManager->GetNavCount($navobject->catId);
         $navlist = $categoryManager->GetNavList($navobject->catId);
         if ($navlist != null) {
        ?>
       <dd>
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
        </dd>
      <? } ?>
      </dl>
      <?
        }
      ?>
      <ul class="home_bottom">
        <li><a href="<?=$activityUrl?>">学术论坛</a></li>
        <li><a href="<?=$certificateUrl?>">在线报名</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="home_main1">
  <div class="home_left">
    <div class="gonggao">
      <div class="gonggao1">
        <h1><a href="<?=$pressReleaseUrl?>">新闻公告</a></h1>
      </div>
      <div class="gonggao2">
        <ul>
        <?
          $newManager = ManagerFactory::getNewManager();
          $recomNewList = $newManager->GetTopNewList("34", 9);
          foreach ($recomNewList as $new) {
            $category = $categoryManager->GetCatById($new->catId);
            
            if($urlIsRewrite) {
              $link = "/pressRelease/detail-".$category->parentId."-".$new->catId."-".$new->nId.".html";
            } else {
              $link = "/pressRelease_detail.php?one=".$category->parentId."&two=".$new->catId."&id=".$new->nId;
            }
        ?>
          <li><a href="<?=$link?>"><?=$new->title?></a></li>
        <?
          }
        ?>
        </ul>
      </div>
    </div>
    <div class="hzhb"><a href="<?=$cooperationUrl?>"><img src="resources/images/img_38.jpg" /></a></div>
  </div>
  <div class="home_center">
    <div class="kuaixun">
      <div class="kuaixun1">
        <h1><a href="<?=$newUrl?>">商机无限</a></h1>
      </div>
      <div class="kuaixun2">
        <ul>
        <?
          $recomNewList = $newManager->GetTopNewList("10,11,12", 9);
          foreach ($recomNewList as $new) {
            $category = $categoryManager->GetCatById($new->catId);
            if($urlIsRewrite) {
              $link = "/new/detail-".$category->parentId."-".$new->catId."-".$new->nId.".html";
            } else {
              $link = "/new_detail.php?one=".$category->parentId."&two=".$new->catId."&id=".$new->nId;
            }
        ?>
          <li>
            <dt><a href="<?=$link?>"><?=$new->title?></a></dt>
            <dd><?=$new->issueDate?> </dd>
          </li>
        <?
          }
        ?>
        </ul>
      </div>
    </div>
    <div class="xyjy"><a href="<?=$collegeUrl?>"><img src="resources/images/img_40.jpg" /></a></div>
  </div>
  <div class="home_right">
    <div class="hdgg"><a href="<?=$noticeUrl?>"><img src="resources/images/img_29.jpg" /></a></div>
    <div class="ltfw">
      <div class="ltfw1">
        <h1><a href="<?=$postUrl?>">猎头服务</a></h1>
      </div>
      <div class="ltfw2">
        <ul>
          <?
            $recomNewList = $newManager->GetTopNewList("14,15", 9);
            foreach ($recomNewList as $new) {
              $category = $categoryManager->GetCatById($new->catId);
              $s = "";
              if ($new->catId == 14) {
                $s = "job";
              }  else {
                $s = "post";
              }
              if($urlIsRewrite) {
                $link = "/".$s."/detail-".$category->parentId."-".$new->catId."-".$new->nId.".html";
              } else {
                $link = "/".$s."_detail.php?one=".$category->parentId."&two=".$new->catId."&id=".$new->nId;
              }
          ?>
            <li><a href="<?=$link?>"><?=$new->title?></a></li>
          <?
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

  <? require_once("common/master/footer.php");?>
</body>
</html>