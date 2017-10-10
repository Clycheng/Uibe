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
  
	<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
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
    $( "#image" ).button().addClass("button");
    $( "#thumbnailImage" ).button().addClass("button");
    $( "#btn_submit" ).button();
    $( "#btn_return" ).button();
  });
  </script>
</head>

<body>
    <div id="main-contain-tabs">
     <ul>
        <li><a href="#main-contain-tabs-1">资讯管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：栏目管理
          <?=Position::Location("../new/list.php?catId=",$catId)?>
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
				            添加资讯
				          </td>
				        </tr>
				        <tr>
				          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
				            <span>信息标题：</span>
				          </td>
				          <td width="90%" height="25" align="left" bgcolor="#FFFFFF">
				            <input name="action" type="hidden" value="add"/>
				            <input name="catId" type="hidden" value="<?=$_GET["catId"] ?>"/>
				            <input name="title" type="text" id="title"  class="text ui-widget-content ui-corner-all" />
				          </td>
				        </tr>
				        
                <tr>
                    <td height="25" align="right" bgcolor="#FFFFFF">
                       <span>大图片：</span>
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
                     <span>小图片：</span>
                   </td>
                   <td height="25" align="left" bgcolor="#FFFFFF">
                      <input type="text" readonly="readonly" name="thumbnailPath" id="thumbnailPath"  class="text ui-widget-content ui-corner-all" />
                      <input type="button" id="thumbnailImage" value="选择图片"/>
                   </td>
                </tr>
                  
                <tr>
                   <td height="25" align="right" bgcolor="#FFFFFF">
                      <span>图片Alt：</span>
                   </td>
                   <td height="25" align="left" bgcolor="#FFFFFF">
                      <input name="thumbnailAlt" type="text" id="thumbnailAlt" value=""  class="text ui-widget-content ui-corner-all" />
                   </td>
                </tr>
				        
				        <tr>
				          <td height="25" align="right" bgcolor="#FFFFFF">
				            <span>简介：</span>
				          </td>
				          <td height="25" align="left" bgcolor="#FFFFFF">
				            <textarea name="intro" class="textarea ui-widget-content ui-corner-all"></textarea>
				          </td>
				        </tr>
				        
				        <tr>
				          <td height="25" align="right" bgcolor="#FFFFFF">
				            <span>信息内容：</span>
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
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span>是否置顶：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="checkbox" name="putTop" value="1"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span>排序：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                            <?
                            $newManager = ManagerFactory::getNewManager();
                            $catId = empty($catId) ? 0 : $catId;
                            $maxSeqNo = $newManager->GetMaxSeqNoByCatId($catId);
                            $seqNo = 1;
                            if (!is_null($maxSeqNo)) {
                              $seqNo = $seqNo + $maxSeqNo;
                            }
                            ?>
                          <input name="seqNo" type="text" id="seqNo" value="<?=$seqNo?>" size="5" class="text_seq ui-widget-content ui-corner-all" />
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span></span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                        </td>
                      </tr>
                      <tr>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span>发布日期：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="issueDate" id="issueDate" value="<?=date('Y-m-d')?>" readonly="readonly" onClick="WdatePicker({el:'issueDate'})" class="ui-widget-content ui-corner-all" style="width:120px"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span>作者：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="author" id="author" class="ui-widget-content ui-corner-all" style="width:120px" value="<?=($row->author == null ? '管理员' : $row->author)?>"/>
                        </td>
                        <td height="25" align="right" bgcolor="#FFFFFF">
                          <span>来源：</span>
                        </td>
                        <td height="25" align="left" bgcolor="#FFFFFF">
                          <input type="text" name="origin" id="origin" class="ui-widget-content ui-corner-all" style="width:120px" value="<?=($row->origin == null ? '本站' : $row->origin)?>"/>
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
	              <td height="35" colspan="2" align="center" bgcolor="#FFFFFF">
	                <input type="Submit" id="btn_submit" name="Submit" value="添加"/>
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
