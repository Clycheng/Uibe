<? require_once("core/common/globalFilter.php");?>
<? require_once("common/lib/config.php");?>
<?
  if (is_null($one) || intval($one) != 2) {
    $one = 2;
  }
  $categoryManager = ManagerFactory::getCategoryManager();
  
  
  //一级栏目
  $firstCat = $categoryManager->GetCatObjectByCatId($one);
  if ($firstCat == null) {
    echo "该页面不存在！";
    JsUtil::Goto_($indexUrl);
    exit;
  }
  
  if (is_null($two)) {
    $two = $categoryManager->GetTwoIdByOneId($one);
  } else {
    $currentCat = $categoryManager->GetCatObjectByCatId($two);
    if ($currentCat == null || intval($one) != $currentCat->parentId) {
      echo "该页面不存在！";
      JsUtil::Goto_($indexUrl);
      exit;
    }
  }
  //二级栏目
  if (!is_object($currentCat)) {
    $currentCat = $categoryManager->GetCatObjectByCatId($two);
  }
  $twoCatList = $categoryManager->GetTwoCatListByOneId($one);
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

  <div class="nav_banner">
    <div id="fsD1" class="focus1" >  
     <div id="D1pic1" class="fPic1">  
       <div class="fcon1" style="display: none;">
           <a target="_blank" href="#"></a>
       </div>
       
       <div class="fcon2" style="display: none;">
           <a target="_blank" href="#"></a>
       </div>
              
     </div>
     <div class="fbg">  
       <div class="D1fBt" id="D1fBt" style="display:none;">  
           <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a>  
           <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>  
           <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a>  
           <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a>  
       </div>  
     </div>  
       
    </div>  
    <script type="text/javascript">
      Qfast.add('widgets', { path: "/resources/scripts/terminator2.2.min.js", type: "js", requires: ['fx'] });  
      Qfast(false, 'widgets', function () {
        K.tabs({
          id: 'fsD1',   //焦点图包裹id  
          conId: "D1pic1",  //** 大图域包裹id  
          tabId:"D1fBt",  
          tabTn:"a",
          conCn: '.fcon1,.fcon2', //** 大图域配置class       
          auto: 2,   //自动播放 1或0
          effect: 'fade',   //效果配置
          eType: 'click', //** 鼠标事件
          pageBt:true,//是否有按钮切换页码
          bns: ['.prev', '.next'],//** 前后按钮配置class                          
          interval: 4000  //** 停顿时间  
        }) 
      })  
    </script>
  </div>
  
  <div class="home_main">
    <div class="list_left">
        <div class="list_left1"><?=$firstCat->catName?></div>
          <div class="list_left2">
          <ul>
          <?
            FrontUtil::GenerateSecondCatMenu($twoCatList, $two);
          ?>
          </ul>
          </div>
      </div>
      <div class="nr_right">
        <div class="nr_right1">当前位置：<a href="<?=$indexUrl?>">首页</a><?=FrontUtil::GetLocation($two);?></div>
          <div class="nr_right2">
          <?
           $infoManager = ManagerFactory::getInfoManager();
           $infoObj = $infoManager->GetInfoObjectByCatId($two);
           echo $infoObj->content;
          ?>
          </div>
      </div>
  </div>

  <? require_once("common/master/footer.php");?>
</body>
</html>