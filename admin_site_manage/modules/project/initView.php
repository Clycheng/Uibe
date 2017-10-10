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
        <li><a href="#main-contain-tabs-1">项目管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：<a href="list.php">项目管理</a> &gt 查看项目
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
					$projectManager = ManagerFactory::getProjectManager();
					$record = $projectManager->GetProjectById($proId);
				?><div id="tabs">
              <ul>
                <li><a href="#tabs-1">项目明细</a></li>
              </ul>
              <div class="tabs-spacer"></div>
              <div id="tabs-1">
              
								<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
									<tr>
										<td width="10%" height="30" align="right" bgcolor="#FFFFFF">
											<span class="table_title">项目名称：</span>
										</td>
										<td width="40%" height="30" align="left" bgcolor="#FFFFFF">
										  <?=$record->name ?>
										</td>
										<td width="10%" height="30" align="right" bgcolor="#FFFFFF">
											<span class="table_title">所属行业：</span>
										</td>
										<td width="40%" height="30" align="left" bgcolor="#FFFFFF">
										  <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getBelongIndustry());
                      foreach ($dictEntryList as $dictEntry) {
                        if ($record->industry == $dictEntry->entryId) {
                          echo $dictEntry->entryName;
                        }
                      }
                      ?>
										</td>
									</tr>
									
									<tr>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">项目概述：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->intro?>
                    </td>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">项目有效期：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->startTime ?>至<?=$record->endTime ?>
                    </td>
                  </tr>
									
                  <tr>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">联系人姓名：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->contact ?>
                    </td>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">联系电话：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->tellphone ?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">手机：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->cellphone ?>
                    </td>
                    <td width="10%" height="30" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">邮箱：</span>
                    </td>
                    <td width="40%" height="30" align="left" bgcolor="#FFFFFF">
                      <?=$record->email?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">
                      <span>内容：</span>
                    </td>
                    <td height="30" align="left" bgcolor="#FFFFFF" colspan="3">
                      <?=$record->content?>
                    </td>
                  </tr>
	              </table>
                
							</div>
							<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
            
                    <tr>
                      <td height="30" colspan="2" align="center" bgcolor="#FFFFFF">
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