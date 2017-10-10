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
  
  $two = 15;
  $currentCat = $categoryManager->GetCatObjectByCatId($two);
  if ($currentCat == null || intval($one) != $currentCat->parentId) {
    echo "该页面不存在！";
    JsUtil::Goto_($indexUrl);
    exit;
  }
  $twoCatList = $categoryManager->GetTwoCatListByOneId($one);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<? require_once("common/master/header.php");?>
<script charset="utf-8" src="/resources/DatePicker/WdatePicker.js" type="text/javascript"></script>
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
              $url = "/job/detail-".$one."-".$two."-".$row->nId.".html";
            } else {
              $url = "/job_detail.php?one=".$one."&two=".$two."&id=".$row->nId;
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
        <p>本栏目是专为RFP会员开放的信息交流平台，专为正在找工作的您而设计，如果您对我们RFP会员发布的招聘信息感兴趣，请将下表填写后提交。</p>
        <p class="b">请您如实填写如下各项内容，带 <span>*</span> 的为必填内容，成功提交后我们将在24小时内与您确认。 </p>
      </div>
        <div class="rz_news2">
          <table style="width: 100%;" class="list_table" border="0" cellpadding="0" cellspacing="0">
           <tbody>
             <tr>
               <td width="18%" height="30" align="right"> <strong>姓名：</strong></td>
               <td width="82%" height="30" align="left">
                 <input name="name" id="name" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" /><span>*</span>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>性别：</strong></td>
               <td height="30" align="left"><p>
                 <label style="margin-left:5px;">
                   <input type="radio" name="gender" value="F"/>
                   男
                 </label>
                 <label>
                   <input type="radio" name="gender" value="M" />
                   女</label>
                 <span>*</span><br />
               </p></td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>年龄：</strong></td>
               <td height="30" align="left">
                 <input name="age" id="age" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;" type="text" />
                 <span>*</span>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>最高学历：</strong></td>
               <td height="30" align="left">
                 <label>
                 <select name="education" id="education" style="width:146px; margin-left:5px; border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                   <? 
                   $dictEntryManager = ManagerFactory::getDictEntryManager();
                   $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getHighEducation());
                   foreach ($dictEntryList as $dictEntry) {
                     echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                   }
                   ?>
                 </select>
                 <span>*</span>
                 </label>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>应聘岗位：</strong></td>
               <td height="30" align="left">
                <input name="post" id="post" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" />
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>工作性质：</strong></td>
               <td height="30" align="left">
                 <select name="nature" id="nature" style=" width:146px; margin-left:5px;border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                   <? 
                   $dictEntryManager = ManagerFactory::getDictEntryManager();
                   $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getJobNature());
                   foreach ($dictEntryList as $dictEntry) {
                     echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                   }
                   ?>
                 </select>
                 <span>*</span>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>自我评价：</strong></td>
               <td height="30" align="left">
                 <input name="evaluate" id="evaluate" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" />
                 <span>*</span>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>希望行业：</strong></td>
               <td height="30" align="left">
                  <label>
                  <select name="industry" id="industry" style=" width:146px; margin-left:5px;border-color:#B6CBDE;border-width:1px;border-style:Solid; height:22px; line-height:22px;">
                    <? 
                    $dictEntryManager = ManagerFactory::getDictEntryManager();
                    $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getIndustry());
                    foreach ($dictEntryList as $dictEntry) {
                      echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                    }
                    ?>
                  </select>
                  </label>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>期望薪资：</strong></td>
               <td height="30" align="left">
                 <input name="pay" id="pay" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:144px; margin-left:5px;" type="text" />
               </td>
             </tr>
             <tr>
               <td height="30" align="right"><strong>联系电话：</strong></td>
               <td height="30" align="left">
                  <input name="tellphone" id="tellphone" style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:22px; line-height:22px; width:310px; margin-left:5px;" type="text" /><span>*</span>
               </td>
             </tr>
             <tr>
               <td height="30" align="right"> <strong>备注：</strong></td>
               <td height="120" align="left">
                 <label>
                    <textarea name="remark" id="remark" cols="45" rows="5"  style="border-color:#B6CBDE;border-width:1px;border-style:Solid;height:105px; line-height:22px; width:310px; margin-left:5px;"></textarea>
                 </label>
               </td>
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
      alert("请输入姓名！");
      $name.focus();
      return;
    }
    var $gender = $("input[name=\"gender\"]:checked");
    if ($gender.val() == null || $gender.val() == "") {
      alert("请选择性别！");
      $gender.focus();
      return;
    }
    var $age = $("#age");
    if ($age.val() == null || $age.val() == "") {
      alert("请输入年龄！");
      $age.focus();
      return;
    }
    var age_reg = /^([0-9]+d*)$/;
    if (!(age_reg.test($age.val()))) {
      alert("年龄格式不正确！");
      $age.focus();
      return;
    }
    var $post = $("#post");
    if ($post.val() == null || $post.val() == "") {
      alert("请输入应聘岗位！");
      $post.focus();
      return;
    }
    var $evaluate = $("#evaluate");
    if ($evaluate.val() == null || $evaluate.val() == "") {
      alert("请输入自我评价！");
      $evaluate.focus();
      return;
    }
    var $pay = $("#pay");
    if ($pay.val() == null || $pay.val() == "") {
      alert("请输入期望薪资！");
      $pay.focus();
      return;
    }
    var pay_reg = /^([0-9]+d*)$/;
    if (!(pay_reg.test($pay.val()))) {
      alert("期望薪资格式不正确！");
      $pay.focus();
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
    var $education = $("#education");
    var $remark = $("#remark");
    var $checkCode = $("#checkCode");
    $.ajax({
        url: '/ajax/handle.php',
        type: 'post',
        data:{
          cmd:1003,
          name:$name.val(),
          gender:$gender.val(),
          age:$age.val(),
          education:$education.val(),
          post:$post.val(),
          nature:$nature.val(),
          evaluate:$evaluate.val(),
          industry:$industry.val(),
          pay:$pay.val(),
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
    var $gender = $("#gender");
    var $age = $("#age");
    var $education = $("#education");
    var $post = $("#post");
    var $nature = $("#nature");
    var $evaluate = $("#evaluate");
    var $industry = $("#industry");
    var $pay = $("#pay");
    var $tellphone = $("#tellphone");
    var $remark = $("#remark");
    var $checkCode = $("#checkCode");
    $name.val("");
    $gender.val("");
    $age.val("");
    $education.val("");
    $post.val("");
    $nature.val("");
    $evaluate.val("");
    $industry.val("");
    $pay.val("");
    $tellphone.val("");
    $remark.val("");
    $checkCode.val("");
    changeCaptcha();
  }
  </script>
  
</body>
</html>