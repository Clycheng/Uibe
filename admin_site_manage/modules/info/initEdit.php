<? 
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");	
$categoryManager = ManagerFactory::getCategoryManager();
$categoryObj = $categoryManager->GetCatById($catId);
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
      K('#thumbnailImage').click(function() {
        editor.loadPlugin('image', function() {
        editor.plugin.imageDialog({
          imageUrl : K('#thumbnailPath').val(),
          clickFn : function(url, title, width, height, border, align) {
            K('#thumbnailPath').val(url);
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
      $( "#btn_submit" ).button();
      $( "#btn_return" ).button();

      $( "#image" ).button().addClass("button");
      $( "#view-image" ).button().addClass("button");
      $( "#btn_submit" ).button();
      $( "#btn_return" ).button();
      
      $( "#view-image" ).click(function() {
          viewLargerImage($("#imgPath"));
          });
    });

      function viewLargerImage( $link ) {
          var src = $link.val(),
              title = $link.siblings( "img" ).attr( "alt" ),
              $modal = $( "img[src$='" + src + "']" );

          if ( $modal.length ) {
            $modal.dialog( "open" );
          } else {
            var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
              .attr( "src", src ).appendTo( "body" );
            setTimeout(function() {
              img.dialog({
                title: title,
                modal: true
              });
            }, 1 );
          }
        }
  </script>
</head>

<body>
	 <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1"><?php echo $categoryObj->catName?></a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：内容管理 <?=Position::parentCat("",$catId)?>
        </div>
        
        <?
          if ($_SESSION["success_msg"] != null) {
        ?>
        <div class="ui-widget" id="tip">
          <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px;padding: 0 .7em;">
            <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
            <?=$_SESSION["success_msg"]?> </p>
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
          $_SESSION["success_msg"] = null;
          }
        ?>
        
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
		      $infoManager = ManagerFactory::getInfoManager();
		      $row = $infoManager->GetInfoObjectByCatId($catId);
		    ?>
		    <form action="edit.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		      
		      <div id="tabs" class="tabs-bottom">
            <ul>
              <li><a href="#tabs-1">基本信息</a></li>
              <li><a href="#tabs-2">SEO设置</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">
		      
				      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
				        <tr class="ui-widget-header">
				          <td height="35" colspan="2" align="center">
				            修改<?php echo $categoryObj->catName?>
				          </td>
				        </tr>
				        <tr>
				          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">信息标题：</span>
				          </td>
				          <td width="90%" height="25" align="left" bgcolor="#FFFFFF">
				            <input name="action" type="hidden" value="edit"/>
				            <input name="infoId" type="hidden" value="<?=$row->infoId ?>"/>
				            <input name="catId" type="hidden" value="<?=$catId ?>"/>
				            <input name="title" type="text" id="title"  class="text ui-widget-content ui-corner-all" value="<?=$row->title ?>"/>
				          </td>
				        </tr>
                
                <tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                       <span>信息图片：</span>
                    </td>
                    <td height="25" align="left" bgcolor="#FFFFFF">
                      <input type="text" name="imgPath" readonly="readonly" id="imgPath" value="<?=$row->imgPath?>" class="text ui-widget-content ui-corner-all" />
                      <input type="button" id="image" value="选择图片"/>
                      <? if ($row->imgPath) { ?>
                        <input type="button" id="view-image" value="图片预览"/>
                      <? } ?>
                    </td>
                </tr>
                
				        <tr> 
				          <td height="25" width="10%" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">信息内容：</span>
				          </td>
				          <td height="25" width="90%" align="left" bgcolor="#FFFFFF">
				            <textarea name="content" id="content" style="width:99%; height:250px; border:1px solid #dbdbdb;"><?=$row->content?></textarea>
				          </td>
				        </tr>
				        
				        
                <tr>
                  <td height="25" width="10%" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">其他设置：</span>
                  </td>
                  <td height="25" width="90%" align="left" bgcolor="#FFFFFF">
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
	                    <tr>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span class="table_title">发布日期：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="issueDate" id="issueDate" readonly="readonly" onClick="WdatePicker({el:'issueDate'})" class="ui-widget-content ui-corner-all" style="width:120px" value="<?=($row->issueDate==null) ? date('Y-m-d') : $row->issueDate?>"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span class="table_title">作者：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="author" id="author" class="ui-widget-content ui-corner-all" style="width:120px" value="<?=($row->author == null ? '管理员' : $row->author)?>"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span class="table_title">来源：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="source" id="source" class="ui-widget-content ui-corner-all" style="width:120px" value="<?=($row->source == null ? '本站' : $row->source)?>"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span class="table_title">是否置顶：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="checkbox" name="putTop" value="1" <? if($row->putTop == 1 ){  ?> checked="checked" <? }?>/>
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
                  <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">标题：</span>
                  </td>
                  <td width="90%" height="25" align="left" bgcolor="#FFFFFF">
                    <input name="seoTitle" type="text" id="seoTitle" value="<?=$row->seoTitle?>"  class="text ui-widget-content ui-corner-all"/>
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">关键词：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <input name="seoKey" type="text" id="seoKey" value="<?=$row->seoKey?>"  class="text ui-widget-content ui-corner-all"/>
                  </td>
                </tr>
                
                <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">描述：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <textarea name="seoDescription" class="textarea ui-widget-content ui-corner-all"><?=$row->seoDescription?></textarea>
                  </td>
                </tr>
                
              </table>
              
				    </div>
              
				  </div>
				  
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
            <tr>
              <td height="35" colspan="2" align="center" bgcolor="#FFFFFF">
                 <input type="Submit" id="btn_submit" name="submit" value="保存"/>
                    &nbsp;&nbsp;
                  <input name="fanhui" type="button" id="btn_return" value="返回" onclick='javascript:history.go(-1)';/>
              </td>
            </tr>
          </table>
		    </form>
      </div>
      
    </div>
</body>
</html>