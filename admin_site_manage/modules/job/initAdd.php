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
  var editor;
  KindEditor.ready(function(K) {
    editor = K.create('textarea[name="content"]', {
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
        <li><a href="#main-contain-tabs-1"><?=$categoryobj->catName?></a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：内容管理
          <?=Position::Location("list.php?catId=",$catId)?>
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
					        <tr class="ui-widget-header">
					          <td height="25" colspan="4" align="center">
					            添加<?=$categoryobj->catName?>
					          </td>
					        </tr>
					        <tr>
					          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
					            <span>职位名称：</span>
					          </td>
					          <td width="40%" height="25" align="left" bgcolor="#FFFFFF">
					            <input name="action" type="hidden" value="add"/>
					            <input name="catId" type="hidden" value="<?=$catId?>"/>
					            <input name="post" type="text" id="post" class="text ui-widget-content ui-corner-all"/>
					          </td>
					          <td height="25" align="right" bgcolor="#FFFFFF">
					            <span>工作地点：</span>
					          </td>
					          <td height="25" align="left" bgcolor="#FFFFFF">
					             <input name="address" type="text" id="address" class="text ui-widget-content ui-corner-all"/>
					          </td>
					        </tr>
					        
	                <tr>
	                  <td height="25" align="right" bgcolor="#FFFFFF">
	                    <span>信息内容：</span>
	                  </td>
	                  <td height="25" align="left" bgcolor="#FFFFFF" colspan="3">
	                    <textarea name="content" id="content" style="width:100%; height:300px; border:1px solid #dbdbdb; "></textarea>
	                  </td>
	                </tr>
	                
					        <tr>
		                  <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
		                    <span>其他设置：</span>
		                  </td>
		                  <td width="90%" colspan="3" height="25" align="left" bgcolor="#FFFFFF">
		                    
		                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
		                      
		                      <tr>
                          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                            <span>招聘人数：</span>
                          </td>
                          <td width="20%" height="25" align="left" bgcolor="#FFFFFF">
                            <input name="recruterNombre" type="text" id="recruterNombre" value="" class="text_seq ui-widget-content ui-corner-all"/>
                          </td>
                          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                            <span>发布日期：</span>
                          </td>
                          <td width="30%" height="25" align="left" bgcolor="#FFFFFF">
                            <input type="text" name="issueDate" id="issueDate" readonly="readonly" onClick="WdatePicker({el:'issueDate'})" value="<?=date('Y-m-d')?>" class="ui-widget-content ui-corner-all" style="width:120px" value=""/>
                          </td>
                          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
                            <span>排序：</span>
                          </td>
                          <td width="20%" height="25" align="left" bgcolor="#FFFFFF">
                            <?
				                    $jobManager = ManagerFactory::getJobManager();
				                    $catId = empty($catId) ? 0 : $catId;
				                    $maxSeqNo = $jobManager->GetMaxSeqNoByCatId($catId);
				                    $seqNo = 1;
				                    if (!is_null($maxSeqNo)) {
				                      $seqNo = $seqNo + $maxSeqNo;
				                    }
				                    ?>
                            <input name="seqNo" type="text" id="seqNo" value="<?=$seqNo?>" size="5" class="text_seq ui-widget-content ui-corner-all" />
                          </td>
		                      </tr>
		                    </table>
		                    
		                  </td>
		                </tr>
					        
					      </table>
	          
	            </div>
	            
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
                  
                <tr>
                  <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                    <input type="Submit" id="btn_submit" name="btn_submit" value="添加"/>
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
