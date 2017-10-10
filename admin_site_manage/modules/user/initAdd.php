<? 
session_start();
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
    $( "#image" ).button().addClass("button");
    $( "#btn_submit" ).button();
    $( "#btn_return" ).button();
  });
  </script>
</head>

<body>

    <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1">学员管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：<a href="list.php">学员管理</a> &gt; 添加学员
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
        <form action="add.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <div id="tabs">
            <ul>
              <li><a href="#tabs-1">基本信息</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">
            
							<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
								<tr>
									<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
										<span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
									</td>
									<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
										<input name="action" type="hidden" value="add"/>
										<input name="realName" type="text" id="realName" class="text ui-widget-content ui-corner-all" />
									</td>
								</tr>
								
								<tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                     <span>身份证号：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <input name="certificate" type="text" id="certificate" class="text ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                  
                <tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                      <span>会员类型：</span>
                    </td>
                    <td height="25" align="left" bgcolor="#FFFFFF">
                      <select name="userType" id="userType" class="text ui-widget-content ui-corner-all" >
                      <?
                       $dictEntryManager = ManagerFactory::getDictEntryManager();
                       $dictEntryList = $dictEntryManager->GetDictEntryListByDictType(Constants::getUserType());
                       foreach ($dictEntryList as $dictEntry) {
                          echo "<option value=\"$dictEntry->entryId\">$dictEntry->entryName</option>\n";
                       }
                      ?>
                      </select>
                    </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>执业编号：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <input name="number" type="text" id="number" class="text ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>获证时间：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <input name="issuedDate" type="text" id="issuedDate" class="text ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>年审情况：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <textarea name="audit" id="audit" class="textarea ui-widget-content ui-corner-all"></textarea>
                  </td>
                </tr>
                
							</table>
							
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                 <tr>
                    <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                       <input type="Submit" name="btn_submit" id="btn_submit" value="添加"/>
                       &nbsp;&nbsp;
                       <input name="fanhui" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
                    </td>
                 </tr>
              </table>
						</div>
						
					</div>
              
		      </form>
	     </div>
	</div>
</body>

</html>
