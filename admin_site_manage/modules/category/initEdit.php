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
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
	<script type="text/javascript">
		KindEditor.ready(function(K) {
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
            width: 400,
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
        <li><a href="#main-contain-tabs-1">栏目管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：系统设置 > <a href="list.php?catId=0">栏目管理</a> 
          <?=Position::parentCat("../category/list.php?catId=",$parentId)?>
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
					$categoryManager = ManagerFactory::getCategoryManager();
					$row = $categoryManager->GetCatById($catId);
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
								<tr>
									<td width="10%" height="35" align="right" bgcolor="#FFFFFF">
										<span class="table_title">栏目名称：</span>
									</td>
									<td width="90%" height="35" align="left" bgcolor="#FFFFFF" colspan="3">
										<input name="action" type="hidden" value="edit"/>
										<input name="catId" type="hidden" value="<?=$row->catId ?>"/>
										<input name="parentId" type="hidden" value="<?=$row->parentId ?>"/>
										<input name="path" type="hidden" value="<?=$_GET["path"] ?>"/>
										<input name="catName" type="text" id="catName" class="text ui-widget-content ui-corner-all" value="<?=$row->catName ?>"/>
									</td>
								</tr>
								
				        <tr>
				          <td width="10%" height="35" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">菜单名称：</span>
				          </td>
				          <td width="90%" height="35" align="left" bgcolor="#FFFFFF" colspan="3">
				            <input name="menuName" type="text" id="menuName" class="text ui-widget-content ui-corner-all" value="<?=$row->menuName ?>"/>
				          </td>
				        </tr>
				        
								<tr>
									<td height="35" align="right" bgcolor="#FFFFFF">
										<span class="table_title">栏目图片：</span>
									</td>
									<td height="35" align="left" bgcolor="#FFFFFF" colspan="3">
										<input type="text" name="imgPath" id="imgPath" readonly="readonly" value="<?=$row->imgPath?>" class="text ui-widget-content ui-corner-all"/> 
										<input type="button" id="image" value="选择图片" />
										<? if ($row->imgPath) { ?>
										<input type="button" id="view-image" value="图片预览"/>
										<? } ?>
										<? if ($row->imgPath) { ?>
									  		<!-- <img src="../../../<?=$row->imgPath?>" width="100" height="80" /> -->
									  	<? } else { ?>
									  		<!-- <img src="../../resources/images/zanwu.gif" width="100" height="80"/> -->
									  	<? } ?>
									</td>
								</tr>
								
								<tr>
									<td height="35" align="right" bgcolor="#FFFFFF">
										<span class="table_title">后台URL：</span>
									</td>
									<td height="35" align="left" bgcolor="#FFFFFF" colspan="3">
										<input name="backUrl" type="text" id="backUrl" value="<?=$row->backUrl?>" class="text ui-widget-content ui-corner-all"/>
										<span  class="tip">由程序员定义，非专业人员请勿更改！</span>
									</td>
								</tr>
								
								<tr>
									<td height="35" align="right" bgcolor="#FFFFFF">
										<span class="table_title">前台URL：</span>
									</td>
									<td height="35" align="left" bgcolor="#FFFFFF" colspan="3">
										<input name="frontUrl" type="text" id="frontUrl" value="<?=$row->frontUrl?>" class="text ui-widget-content ui-corner-all"/>
										<span  class="tip">由程序员定义，非专业人员请勿更改！</span>
									</td>
								</tr>
								
								<tr>
									<td height="35" align="right" bgcolor="#FFFFFF">
										<span class="table_title">栏目描述：</span>
									</td>
									<td height="35" align="left" bgcolor="#FFFFFF" colspan="3">
										<textarea name="description" id="description" style="width:98%; height:250px; border:1px solid #dbdbdb; "><?=$row->description?></textarea>
									</td>
								</tr>
								
                <tr>
                  <td width="10%" height="35" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">显示方式：</span>
                  </td>
                  <td width="40%" height="35" align="left" bgcolor="#FFFFFF">
                    <select name="style" id="style" class="text ui-widget-content ui-corner-all">
                      <option value="0">综合页面</option>
                      <option value="1" <? if ('1' == $row->style) { echo "selected='selected'"; } ?>>单页式</option>
                      <option value="2" <? if ('2' == $row->style) { echo "selected='selected'"; } ?>>产品列表式</option>
                      <option value="3" <? if ('3' == $row->style) { echo "selected='selected'"; } ?>>图片列表式</option>
                      <option value="4" <? if ('4' == $row->style) { echo "selected='selected'"; } ?>>新闻列表式</option>
                    </select>
                  </td>
                  <td width="10%" height="35" align="right" bgcolor="#FFFFFF">
                    <span class="table_title">排序：</span>
                  </td>
                  <td width="40%" height="35" align="left" bgcolor="#FFFFFF">
                    <input name="seqNo" type="text" id="seqNo" value="<?=$row->seqNo?>" size="5" class="text_seq ui-widget-content ui-corner-all" />
                  </td>
                </tr>
                
							</table>
		    
		        </div>
		        <div id="tabs-2">
		        
		          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
		            
		            <tr>
		              <td width="10%" height="35" align="right" bgcolor="#FFFFFF">
		                <span class="table_title">标题：</span>
		              </td>
		              <td width="90%" height="35" align="left" bgcolor="#FFFFFF">
		                <input name="seoTitle" type="text" id="seoTitle" value="<?=$row->seoTitle?>" class="text ui-widget-content ui-corner-all"/>
		              </td>
		            </tr>
		            
		            <tr>
		              <td height="35" align="right" bgcolor="#FFFFFF">
		                <span class="table_title">关键词：</span>
		              </td>
		              <td height="35" align="left" bgcolor="#FFFFFF">
		                <input name="seoKey" type="text" id="seoKey" value="<?=$row->seoKey?>" class="text ui-widget-content ui-corner-all"/>
		              </td>
		            </tr>
		            
		            <tr>
		              <td height="35" align="right" bgcolor="#FFFFFF">
		                <span class="table_title">描述：</span>
		              </td>
		              <td height="35" align="left" bgcolor="#FFFFFF">
		                <textarea name="seoDescription" class="textarea ui-widget-content ui-corner-all"><?=$row->seoDescription?></textarea>
		              </td>
		            </tr>
		
		          </table>
		          
		        </div>
		        
	          <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
	            <tr>
	              <td height="35" colspan="2" align="center" bgcolor="#FFFFFF">
	                 <input type="Submit" id="btn_submit" name="submit" value="修改"/>
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