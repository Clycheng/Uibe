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
        <li><a href="#main-contain-tabs-1">岗位管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：<a href="list.php">岗位管理</a> &gt 查看岗位
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
					$postManager = ManagerFactory::getPostManager();
					$record = $postManager->GetPostById($postId);
				?><div id="tabs">
              <ul>
                <li><a href="#tabs-1">岗位明细</a></li>
              </ul>
              <div class="tabs-spacer"></div>
              <div id="tabs-1">
              
								<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
									<tr>
										<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">企业名称：</span>
										</td>
										<td width="40%" height="25" align="left" bgcolor="#FFFFFF">
										  <?=$record->name ?>
										</td>
										<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">企业性质：</span>
										</td>
										<td width="40%" height="25" align="left" bgcolor="#FFFFFF">
										  <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEnterpriseNature());
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
                      <span class="table_title">所属行业：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
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
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">企业规模：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEnterpriseScale());
                      foreach ($dictEntryList as $dictEntry) {
                        if ($record->scale == $dictEntry->entryId) {
                          echo $dictEntry->entryName;
                        }
                      }
                      ?>
                    </td>
                  </tr>
									
                  <tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">招聘岗位：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->post ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">招聘人数：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->num ?>人
                    </td>
                  </tr>
                  
                  <tr>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">岗位有效期：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->startTime ?>至<?=$record->endTime ?>
                    </td>
                    <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                      <span class="table_title">学历要求：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <? 
                      $dictEntryManager = ManagerFactory::getDictEntryManager();
                      $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getEducationRequire());
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
                      <span class="table_title">联系人：</span>
                    </td>
                    <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                      <?=$record->contact ?>
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