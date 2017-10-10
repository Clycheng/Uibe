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
        <li><a href="#main-contain-tabs-1">频道管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：<a href="list.php?parentId=0">频道管理</a> 
          <?=Position::parentChannel("../channel/list.php?parentId=",$parentId)?>
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
		    if ($action == "edit") {
		      $channelManager = ManagerFactory::getChannelManager();
		      $row = $channelManager->GetChannelById($cId);
		    ?>
		    <form action="edit.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        
            <div id="tabs">
              <ul>
                <li><a href="#tabs-1">基本信息</a></li>
              </ul>
              <div class="tabs-spacer"></div>
              <div id="tabs-1">
	
			         <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                  <tr class="ui-widget-header">
										<td height="25" colspan="2" align="center">
											修改频道
										</td>
									</tr>
									<tr>
										<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">频道名称：</span>
										</td>
										<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
											<input name="action" type="hidden" value="edit"/>
											<input name="cId" type="hidden" value="<?=$row->cId ?>"/>
											<input name="parentId" type="hidden" value="<?=$row->parentId ?>"/>
											<input name="path" type="hidden" value="<?=$row->path ?>"/>
											<input name="name" type="text" id="name" class="text ui-widget-content ui-corner-all" value="<?=$row->name ?>"/>
										</td>
									</tr>
									
									<tr>
										<td height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">排序：</span>
										</td>
										<td height="25" align="left" bgcolor="#FFFFFF">
											<input name="seqNo" type="text" id="seqNo" value="<?=$row->seqNo?>" size="5" class="text_seq ui-widget-content ui-corner-all"/>
										</td>
									</tr>
									
									<tr>
										<td height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">关联栏目：</span>
										</td>
										<td height="25" align="left" bgcolor="#FFFFFF">
											<input name="isContainCat" type="checkbox" id="isContainCat" value="1" class="input_seq_txt" size="5" <? if($row->isContainCat == 1) {echo "checked='checked'";}?>/>
										</td>
									</tr>
									
									<tr>
										<td height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">后台URL：</span>
										</td>
										<td height="25" align="left" bgcolor="#FFFFFF">
											<input name="backUrl" type="text" id="backUrl" value="<?=$row->backUrl?>" class="text ui-widget-content ui-corner-all"/>
										</td>
									</tr>
									
									<tr>
										<td height="25" align="right" bgcolor="#FFFFFF">
											<span class="table_title">频道描述：</span>
										</td>
										<td height="25" align="left" bgcolor="#FFFFFF">
											<textarea name="description" id="description" class="textarea ui-widget-content ui-corner-all"><?=$row->description?></textarea>
										</td>
									</tr>
									
								</table>
							</div>
							
							   <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                  <tr>
                    <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                      <input type="Submit" name="btn_submit" id="btn_submit" value="修改"/>
                      &nbsp;&nbsp;
                      <input name="fanhui" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
                    </td>
                  </tr>
                </table>
						</div>
		    </form>
				<?
					}
				?>
			</div>
	</div>
</body>
</html>