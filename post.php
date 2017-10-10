<? require_once("core/common/globalFilter.php");?>
<? require_once("common/lib/config.php");?>
<?
  if (is_null($one) || intval($one) != 13) {
    $one = 13;
  }
  $categoryManager = ManagerFactory::getCategoryManager();
  
  //一级栏目
  $firstCat = $categoryManager->GetCatObjectByCatId($one);
  if ($firstCat == null) {
    echo "该页面不存在！";
    JsUtil::Goto_($indexUrl);
    exit;
  }
  
  $two = 14;
  $currentCat = $categoryManager->GetCatObjectByCatId($two);
  if ($currentCat == null || intval($one) != $currentCat->parentId) {
    echo "该页面不存在！";
    JsUtil::Goto_($indexUrl);
    exit;
  }
  //二级栏目
  $twoCatList = $categoryManager->GetTwoCatListByOneId($one);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<? require_once("common/master/header.php");?>
<? require_once("common/master/seo.php");?>
<script charset="utf-8" src="/resources/DatePicker/WdatePicker.js" type="text/javascript"></script>
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
      <div class="rz_news">
        <ul>
         <?
          $i = 0;
          $newManager = ManagerFactory::getNewManager();
          $totalRecords = $newManager->GetSecondRecomNewList($two, 8);
          
          foreach($totalRecords as $row) {
            if($urlIsRewrite) {
              $url = "/post/detail-".$one."-".$two."-".$row->nId.".html";
            } else {
              $url = "/post_detail.php?one=".$one."&two=".$two."&id=".$row->nId;
            }
          ?>
          <li>
            <dt><img src="/resources/images/arrow011.jpg" /><a href="<?=$url?>"><?=$row->title?></a></dt>
            <dd><?=date("Y-m-d",strtotime($row->issueDate))?></dd>
          </li>
          <?
          }
          ?>
        </ul>
      </div>
       <div class="rz_news1">
        <p>本栏目是专为RFP会员开放的信息交流平台，专为有人才需求的企业而设计，如果您对我们发布的人才信息感兴趣，请将下表填
写后提交。</p>
        <p class="b">请您如实填写如下各项内容，带 <span>*</span> 的为必填内容，成功提交后我们将在24小时内与您确认。 </p>
       </div>
       <div class="rz_news2">
         <table style="width: 100%;" class="list_table" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="18%" height="30" align="right"> <strong>企业名称：</strong></td>
              <td width="82%" height="30" align="left">
                <input name="name" id="name" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" /><span>*</span>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>企业性质：</strong></td>
              <td height="30" align="left">
                <label>
                <select name="nature" id="nature" style=" width:146px; margin-left:5px; border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                  <? 
                  $dictEntryManager = ManagerFactory::getDictEntryManager();
                  $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEnterpriseNature());
                  foreach ($dictEntryList as $dictEntry) {
                    echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                  }
                  ?>
                </select>
                </label><span>*</span>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>所属行业：</strong></td>
              <td height="30" align="left">
                <label>
                <select name="industry" id="industry" style=" width:146px; margin-left:5px; border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                  <? 
                  $dictEntryManager = ManagerFactory::getDictEntryManager();
                  $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getBelongIndustry());
                  foreach ($dictEntryList as $dictEntry) {
                    echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                  }
                  ?>
                </select>
                </label>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>企业规模：</strong></td>
              <td height="30" align="left">
                <label>
                <select name="scale" id="scale" style=" width:146px; margin-left:5px; border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                  <? 
                  $dictEntryManager = ManagerFactory::getDictEntryManager();
                  $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEnterpriseScale());
                  foreach ($dictEntryList as $dictEntry) {
                    echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                  }
                  ?>
                </select>
                </label>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>招聘岗位：</strong></td>
              <td height="30" align="left">
                <input name="post" id="post" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" />
                <span>*</span></td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>招聘人数：</strong></td>
              <td height="30" align="left">
                <input name="num" id="num" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;" type="text" />
                人
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>岗位有效期：</strong></td>
              <td height="30" align="left">
                <input name="startTime" readonly="readonly" id="startTime" class="Wdate" onclick="WdatePicker({el:'startTime'})" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;" type="text" />&nbsp;~&nbsp;<input name="endTime" readonly="readonly" id="endTime" class="Wdate" onclick="WdatePicker({el:'endTime'})" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;" type="text" /><span>*</span>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>学历要求：</strong></td>
              <td height="30" align="left">
                <label>
                <select name="education" id="education" style=" width:146px; margin-left:5px; border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                  <? 
                  $dictEntryManager = ManagerFactory::getDictEntryManager();
                  $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEducationRequire());
                  foreach ($dictEntryList as $dictEntry) {
                    echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                  }
                  ?>
                </select>
                </label>
                <span>*</span>
              </td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>联系人：</strong></td>
              <td height="30" align="left"><input name="contact" id="contact" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" /><span>*</span></td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>联系电话：</strong></td>
              <td height="30" align="left"><input name="tellphone" id="tellphone" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" /><span>*</span></td>
            </tr>
            <tr>
              <td height="30" align="right"> <strong>备注：</strong></td>
              <td height="120" align="left"><label>
                <textarea name="remark" id="remark" cols="45" rows="5"  style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:105px; line-height:22px; width:310px; margin-left:5px;"></textarea>
              </label></td>
            </tr>
            <tr>
              <td height="30" align="right"><strong>验证码：</strong></td>
              <td height="30" align="left" style="vertical-align:middle;">
                <input name="checkCode" type="text" value="" maxlength="4" size="10" id="checkCode" autocomplete="off" onFocus="this.select();" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;"/>
                <img src="/admin_site_manage/modules/common/verifyCode.php" style="cursor:pointer;height:20px" id="captcha" onClick="changeCaptcha()"/>
              </td>
            </tr>
            <tr>
              <td height="30" align="right">&nbsp;</td>
              <td height="30" align="left">&nbsp;&nbsp;<a href="###1" onclick="javascript:submitForm();"><img src="/resources/images/tj.jpg" /></a>&nbsp;&nbsp;<a href="###2" onclick="javascript:clearForm();"><img src="/resources/images/cz.jpg" /></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <? require_once("common/master/footer.php");?>
  
  <script type="text/javascript">
  function changeCaptcha() {
    $("#captcha").attr("src", "/admin_site_manage/modules/common/verifyCode.php?" + new Date().getTime());
  }

  function checkNull($txt, tip) {
    var v = $.trim($txt.val());
    $txt.val(v);
    if (v) {
      return true;
    }
    $txt.focus();
    alert(tip);
    return false;
  }
  
  function submitForm() {
    var $name = $("#name");
    if ($name.val() == null || $name.val() == "") {
      alert("请输入企业名称！");
      $name.focus();
      return;
    }
    var $post = $("#post");
    if ($post.val() == null || $post.val() == "") {
      alert("请输入招聘岗位！");
      $post.focus();
      return;
    }
    var $num = $("#num");
    if ($num.val() == null || $num.val() == "") {
      alert("请输入招聘人数！");
      $num.focus();
      return;
    }
    var num_reg = /^([0-9]+d*)$/;
    if (!(num_reg.test($num.val()))) {
      alert("招聘人数格式不正确！");
      $num.focus();
      return;
    }
    var $startTime = $("#startTime");
    if ($startTime.val() == null || $startTime.val() == "") {
      alert("请输入岗位有效期！");
      $startTime.focus();
      return;
    }
    var $endTime = $("#endTime");
    if ($endTime.val() == null || $endTime.val() == "") {
      alert("请输入岗位有效期！");
      $endTime.focus();
      return;
    }
    var $contact = $("#contact");
    if ($contact.val() == null || $contact.val() == "") {
      alert("请输入联系人！");
      $contact.focus();
      return;
    }
    var $tellphone = $("#tellphone");
    if ($tellphone.val() == null || $tellphone.val() == "") {
      alert("请输入您的联系电话！");
      $tellphone.focus();
      return;
    }
    var tellphone_reg = /^([0-9]+d*)$/;
    if (!(tellphone_reg.test($tellphone.val()))) {
      alert("联系电话格式不正确！");
      return;
    }
    var $txt = $("#checkCode");
    if (!checkNull($txt, '验证码不能为空！')) {
      return false;
    }
    if (!/^\d{4}$/.test($txt.val())) {
      $txt.focus();
      alert("请输入4位数字验证码！");
      return false;
    }
    var $nature = $("#nature");
    var $industry = $("#industry");
    var $scale = $("#scale");
    var $education = $("#education");
    var $remark = $("#remark");
    var $checkCode = $("#checkCode");
    $.ajax({
        url: '/ajax/handle.php',
        type: 'post',
        data:{
          cmd:1002,
          name:$name.val(),
          nature:$nature.val(),
          industry:$industry.val(),
          scale:$scale.val(),
          post:$post.val(),
          num:$num.val(),
          startTime:$startTime.val(),
          endTime:$endTime.val(),
          education:$education.val(),
          contact:$contact.val(),
          tellphone:$tellphone.val(),
          remark:$remark.val(),
          checkCode:$checkCode.val()
        },
        dataType: 'html', 
        timeout: 1000,
        error: function(){  
          alert('提交失败，服务器未响应！');
        },
        success: function(result){
          alert(result);
          clearForm();
        } 
    });

  }

  function clearForm() {
	  var $name = $("#name");
    var $nature = $("#nature");
    var $industry = $("#industry");
    var $scale = $("#scale");
    var $post = $("#post");
    var $num = $("#num");
    var $startTime = $("#startTime");
    var $endTime = $("#endTime");
    var $education = $("#education");
    var $contact = $("#contact");
    var $tellphone = $("#tellphone");
    var $remark = $("#remark");
    var $checkCode = $("#checkCode");
	  $name.val("");
    $nature.val("");
    $industry.val("");
    $scale.val("");
    $post.val("");
    $num.val("");
    $startTime.val("");
    $endTime.val("");
    $education.val("");
    $contact.val("");
    $tellphone.val("");
    $remark.val("");
    $checkCode.val("");
    changeCaptcha();
  }
  </script>
</body>
</html>