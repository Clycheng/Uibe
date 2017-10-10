<? 
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
$categoryManager = ManagerFactory::getCategoryManager();
$categoryobj = $categoryManager->GetCatObjectByCatId($catId);
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
  KindEditor.ready(function(K) {
	  K.create('textarea[name="content"]', {
	        allowFileManager : true
	      });
	  K.create('textarea[name="description"]', {
	        allowFileManager : true
	      });
    var editor = K.editor({
          allowFileManager : true
        });
        K('#image').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
            imageUrl : K('#imgPath').val(),
            clickFn : function(url, title, width, height, border, align) {
              K('#imgPath').val(url);
              editor.hideDialog();
            }
          });
        });
      });
    });
  </script>
  
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
        <li><a href="#main-contain-tabs-1"><?=$categoryobj->catName?></a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：内容管理 <?=Position::Location("list.php?catId=",$catId)?>
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
              <li><a href="#tabs-2">SEO设置</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">
            
							<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
								<tr class="ui-widget-header">
									<td height="25" colspan="2" align="center">
										添加<?=$categoryobj->catName?>
									</td>
								</tr>
								<tr>
									<td width="10%" height="25" align="right" bgcolor="#FFFFFF">
										<span>产品名称：</span>
									</td>
									<td width="90%" height="25" align="left" bgcolor="#FFFFFF">
										<input name="action" type="hidden" value="add"/>
										<input name="catId" type="hidden" value="<?=$catId?>"/>
										<input name="name" type="text" id="name" class="text ui-widget-content ui-corner-all" />
									</td>
								</tr>
								
								<tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                       <span>图片：</span>
                    </td>
                    <td height="25" align="left" bgcolor="#FFFFFF">
                      <input type="text" name="imgPath" readonly="readonly" id="imgPath"  class="text ui-widget-content ui-corner-all" />
                      <input type="button" id="image" value="选择图片"/>
                    </td>
                </tr>
                  
                <tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                      <span>图片Alt：</span>
                    </td>
                    <td height="25" align="left" bgcolor="#FFFFFF">
                      <input name="imgAlt" type="text" id="imgAlt" value=""  class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>产品说明：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <textarea name="description" id="description" style="width:100%; height:300px; border:1px solid #dbdbdb; "></textarea>
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>具体参数：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <textarea name="content" id="content" style="width:100%; height:300px; border:1px solid #dbdbdb; "></textarea>
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>其他设置：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                      
                      <tr>
                        <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                          <span>是否置顶：</span>
                        </td>
                        <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                          <input type="checkbox" name="putTop" value="1" <? if($row->putTop == 1 ){  ?> checked="checked" <? }?>/>
                        </td>
                        <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                          <span>排序：</span>
                        </td>
                        <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
                          <input name="seqNo" type="text" id="seqNo" value="0" size="5" class="text_seq ui-widget-content ui-corner-all" />
                        </td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>
                
							</table>
							
						</div>
						
            <div id="tabs-2">
      
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
                <tr>
                  <td width="10%" height="35"  align="right" bgcolor="#FFFFFF">
                    <span>标题：</span>
                  </td>
                  <td width="90%" height="35" align="left" bgcolor="#FFFFFF">
                    <input name="seoTitle" type="text" id="seoTitle" value="" class="text ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                
                <tr>
                  <td height="35" align="right" bgcolor="#FFFFFF">
                    <span>关键词：</span>
                  </td>
                  <td height="35" align="left" bgcolor="#FFFFFF">
                    <input name="seoKey" type="text" id="seoKey" value="" class="text ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                
                <tr>
                  <td height="35" align="right" bgcolor="#FFFFFF">
                    <span>描述：</span>
                  </td>
                  <td height="35" align="left" bgcolor="#FFFFFF">
                    <textarea name="seoDescription" class="textarea ui-widget-content ui-corner-all" ></textarea>
                  </td>
                </tr>
              </table>
    
            </div>
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
              
		      </form>
	     </div>
	</div>
</body>

</html>
