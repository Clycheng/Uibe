<? require_once("core/common/globalFilter.php");?>
<? require_once("common/lib/config.php");?>
<?
  if (is_null($one) || intval($one) != 16) {
    $one = 16;
  }
  $categoryManager = ManagerFactory::getCategoryManager();
  
  //一级栏目
  $currentCat = $categoryManager->GetCatObjectByCatId($one);
  if ($currentCat == null) {
    echo "该页面不存在！";
    JsUtil::Goto_($indexUrl);
    exit;
  }
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
    <div class="list_left" style="height:700px;">
      <div class="list_left1"><?=$currentCat->catName?></div>
      <div class="list_left2">
        <ul>
          <li><a href="<?=$certificateUrl?>"><?=$currentCat->catName?></a></li>
        </ul>
      </div>
    </div>
    <div class="nr_right">
      <div class="nr_right1">当前位置：<a href="<?=$indexUrl?>">首页</a><?=FrontUtil::GetLocation($one);?></div>
      <div class="nr_zscx">
        <div class="rz_news2">
          <table style="width: 100%;" class="list_table" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="32%" height="30" align="right"><strong>姓&nbsp;&nbsp;&nbsp;&nbsp;名：</strong></td>
                <td width="68%" height="30" align="left">
                  <input name="realName" id="realName" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" />
                </td>
              </tr>
              <tr>
                <td height="30" align="right"><strong>身份证号：</strong></td>
                <td height="30" align="left">
                  <input name="certificate" id="certificate" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" />
                </td>
              </tr>
              <tr>
                <td height="30" align="right">&nbsp;</td>
                <td height="40" align="left">&nbsp;<a href="###1" onclick="javascript:submitForm();"><img src="/resources/images/tj.jpg" /></a>&nbsp;&nbsp;<a href="###2" onclick="javascript:clearForm();"><img src="/resources/images/cz.jpg" /></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="rz_news1" id="searchTitle">
        <p><strong>查询结果：</strong></p>
      </div>
      <div class="rz_news3" id="searchResult">
        
      </div>
    </div>
  </div>

  <? require_once("common/master/footer.php");?>
  
  <script type="text/javascript">
  $(function(){
	   $("#searchTitle").hide();
	  });
  function submitForm() {
    $("#searchTitle").hide();
    $("#searchResult").html("");
	  $realName = $("#realName");
    $certificate = $("#certificate");
    if ($realName.val() == null || $realName.val() == "") {
        alert("请输入姓名!");
        return;
    }
    if ($certificate.val() == null || $certificate.val() == "") {
        alert("请输入身份证号!");
        return;
    }
    $("#searchTitle").show();
    
	  $("#searchResult").load(
			  "/certificate_result.php?t="+new Date().getTime(), 
			  {
				  realName:$realName.val(), 
				  certificate:$certificate.val()
				},
			  function() {
				});
	}
	function clearForm(){
    $("#searchTitle").hide();
    $("#searchResult").html("");
    $realName = $("#realName");
    $certificate = $("#certificate");
    $realName.val("");
    $certificate.val("");
	}
  </script>
</body>
</html>