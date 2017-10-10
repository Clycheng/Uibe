<?php
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
  <script type="text/javascript">
  var editor;
  KindEditor.ready(function(K) {
	  K.create('textarea[name="copyright"]', {
	        allowFileManager : true
	      });
    });
  </script>
  
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
        <li><a href="#main-contain-tabs-1">站点管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：系统设置 > <a href="list.php">站点管理</a> &gt; 添加站点
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
            <?
              $webConfigManager = ManagerFactory::getWebConfigManager();
              $webconfig = $webConfigManager->GetWebConfigById($wId);
            ?>
        <form action="edit.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <div id="tabs">
            <ul>
              <li><a href="#tabs-1">基本信息</a></li>
              <li><a href="#tabs-2">SEO设置</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">

	            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
	              <tr class="ui-widget-header">
	                <td height="25" colspan="4" align="center" ><strong>站点信息</strong></td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>公司名称：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input type="hidden" name="wId" value="<?=$webconfig->wId?>"/>
	                  <input type="hidden" name="action" value="edit"/>
	                  <input name="name" type="text" id="name" value="<?=$webconfig->name?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td height="25" align="right" bgcolor="#FFFFFF">
	                   <span>客服电话：</span>
	                </td>
	                <td height="25" align="left" bgcolor="#FFFFFF">
	                   <input type="text" name="serviceTel" id="serviceTel" value="<?=$webconfig->serviceTel?>" size="50"  class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>公司电话：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20"" align="left" bgcolor="#FFFFFF">
	                  <input name="tellphone" type="text" id="tellphone" value="<?=$webconfig->tellphone?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>手机号码：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="cellphone" type="text" id="cellphone" value="<?=$webconfig->cellphone?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>公司传真：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="fax" type="text" id="fax" value="<?=$webconfig->fax?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>联系人：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="contact" type="text" id="contact" value="<?=$webconfig->contact?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>QQ：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="qq" type="text" id="qq" value="<?=$webconfig->qq?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>公司邮箱：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="email" type="text" id="email" value="<?=$webconfig->email?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>公司网址：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="url" type="text" id="url" value="<?=$webconfig->url?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>邮编：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="zipCode" type="text" id="zipCode" value="<?=$webconfig->zipCode?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>网站备案号：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="putOnRecords" type="text" id="putOnRecords" value="<?=$webconfig->putOnRecords?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>序号：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF">
	                  <input name="seqNo" type="text" id="seqNo" value="<?=$webconfig->seqNo?>" size="50" class="text_seq ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
                  <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
                    <span>公司地址：&nbsp;&nbsp;</span>
                  </td>
                  <td height="20" align="left" bgcolor="#FFFFFF" colspan="3">
                    <textarea name="address" id="address"  cols="51" rows="4" class="textarea ui-widget-content ui-corner-all"><?=$webconfig->address?></textarea>
                  </td>
                </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>版权信息：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" align="left" bgcolor="#FFFFFF" colspan="3">
	                <textarea name="copyright" id="copyright"  cols="51" rows="5" style="width:98%; height:200px; border:1px solid #dbdbdb; "><?=$webconfig->copyright?></textarea>
	                </td>
	              </tr>
	            </table>
						
						</div>
            <div id="tabs-2">
							<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>标题：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" colspan="2" align="left" bgcolor="#FFFFFF">
	                  <input name="seoTitle" type="text" id="seoTitle" value="<?=$webconfig->seoTitle?>" size="50" class="text ui-widget-content ui-corner-all"/>
	                </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>关键词：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" colspan="2" align="left" bgcolor="#FFFFFF">
	                  <textarea class="textarea ui-widget-content ui-corner-all" name="seoKey" id="seoKey" cols="51" rows="3" ><?=$webconfig->seoKey?></textarea>
	                 </td>
	              </tr>
	              <tr>
	                <td width="9%" height="25" align="right" bgcolor="#FFFFFF">
	                  <span>描述：&nbsp;&nbsp;</span>
	                </td>
	                <td height="20" colspan="2" align="left" bgcolor="#FFFFFF">
	                <textarea class="textarea ui-widget-content ui-corner-all" name="seoDescription" id="seoDescription" cols="51" rows="3"><?=$webconfig->seoDescription?></textarea>
	                </td>
	              </tr>
	            </table>
						</div>
						
						<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
              <tr>
                <td height="30" colspan="3" align="center" bgcolor="#FFFFFF">
                  <input name="Submit" type="submit"  id="btn_submit" value="提交" />                    
                  <input name="Submit22" type="button" id="btn_return" value="返回" onclick="javascript:history.go(-1);"/>
                </td>
              </tr>
            </table>
					</div>
					
				</form>
	    </div>
	  </div>
	   
</body>
</html>