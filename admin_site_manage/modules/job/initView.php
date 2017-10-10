<? 
@session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
?>
<html>
<head>
  <link href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link href="/resources/kindeditor/themes/default/default.css" rel="stylesheet">
  <script charset="utf-8" src="/resources/kindeditor/kindeditor-min.js"></script>
  <script charset="utf-8" src="/resources/kindeditor/lang/zh_CN.js"></script>
  <script charset="utf-8" src="/resources/DatePicker/WdatePicker.js" type="text/javascript"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  <script>
  $(function() {
    $( "#main-contain-tabs" ).tabs();
    $( "#tabs" ).tabs();
    $( "#btn_submit" ).button();
    $( "#btn_return" ).button();
  });
  </script>
</head>

<body>

    <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1">简历管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：简历管理
        </div>
        <?
          if ($_SESSION["err_msg"] != null) {
        ?>
        <div class="ui-widget" id="tip">
          <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
            <strong>提示:</strong> <?=$_SESSION["err_msg"]?> </p>
          </div>
        </div>
        <script type="text/javascript">
        $("#tip").click(function() {
          $(this).animate({
            opacity: "hide"
          }, "slow");
        });
        setTimeout('$("#tip").click()',3000);
        </script>
        <?
          $_SESSION["err_msg"] = null;
          }
        ?>
				<?if ($action == "view") {
					$jobManager = ManagerFactory::getJobManager();
					$record = $jobManager->GetJobById($jobId);
				?><div id="tabs">
              <ul>
                <li><a href="#tabs-1">简历明细</a></li>
              </ul>
              <div class="tabs-spacer"></div>
              <div id="tabs-1">
              
								<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
									<tr>
										<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">姓名：</span>
										</td>
										<td width="40%" height="25" align="left" bgcolor="#FFFFFF">
										  <?=$record->name ?>
										</td>
										<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">性别：</span>
										</td>
										<td width="40%" height="25" align="left" bgcolor="#FFFFFF">
										  <? 
										    if ($record->gender == "F") {
										      echo "男";
										    } else if ($record->gender == "M"){
										      echo "女";
										    } else {
										      echo "未知";
										    }
										  ?>
										</td>
									</tr>
									
									<tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">年龄：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->age ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">学历：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getHighEducation());
                      foreach ($dictEntryList as $dictEntry) {
                        if ($record->education == $dictEntry->entryId) {
                          echo $dictEntry->entryName;
                        }
                      }
                      ?>
                    </td>
                  </tr>
									
                  <tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">应聘岗位：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->post ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">工作性质：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getJobNature());
                      foreach ($dictEntryList as $dictEntry) {
                        if ($record->nature == $dictEntry->entryId) {
                          echo $dictEntry->entryName;
                        }
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">自我评价：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->evaluate ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">希望行业：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getIndustry());
                      foreach ($dictEntryList as $dictEntry) {
                        if ($record->industry == $dictEntry->entryId) {
                          echo $dictEntry->entryName;
                        }
                      }
                      ?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">期望薪资：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->pay ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">联系电话：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->tellphone?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                      <span>备注：</span>
                    </td>
                    <td height="25" align="left" bgcolor="#FFFFFF" colspan="3">
                      <?=$record->remark?>
                    </td>
                  </tr>
	              </table>
                
							</div>
							<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
            
                    <tr>
                      <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                        <input name="return" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
                      </td>
                    </tr>
                    
                </table>
						</div>
						<?
							}
						?>
        
      </div>
      
    </div>
	<br>
	<br>
</body>