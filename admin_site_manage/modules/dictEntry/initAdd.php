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
        <li><a href="#main-contain-tabs-1">字典管理</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="main-contain-tabs-1"> 
        <div style="padding:10px">
          <span class="ui-icon ui-icon-home" style="float:left"></span>
          当前位置：<a href="list.php">字典管理</a> &gt; 添加字典
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
              <li><a href="#tabs-1">添加字典</a></li>
            </ul>
            <div class="tabs-spacer"></div>
            <div id="tabs-1">
            
	            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#dbdbdb">
				        <tr>
				          <td width="10%" height="25" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">字典名称：</span>
				          </td>
				          <td width="90%" height="25" align="left" bgcolor="#FFFFFF">
				            <input name="action" type="hidden" value="add"/>
				            <input name="entryName" type="text" id="entryName" class="text ui-widget-content ui-corner-all" />
				          </td>
				        </tr>
				        
				        <tr>
				          <td height="25" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">字典类型：</span>
				          </td>
				          <td height="25" align="left" bgcolor="#FFFFFF">
                    <select name="dictType" id="dictType" class="text ui-widget-content ui-corner-all" >
  				          <?
                     $dictTypeArray = Constants::getDict();
                     foreach ($dictTypeArray as $key => $value) {
                       echo "<option value=\"$key\">$value</option>\n";
                     }
                    ?>
                    </select>
				          </td>
				        </tr>
				        
				        <tr>
                  <td height="25" align="right" bgcolor="#FFFFFF">
                    <span>排序：</span>
                  </td>
                  <td height="25" align="left" bgcolor="#FFFFFF">
                    <input name="seqNo" type="text" id="seqNo" value="" size="5" class="text_seq ui-widget-content ui-corner-all" />
                  </td>
                </tr>
				        
				        <tr>
				          <td height="25" align="right" bgcolor="#FFFFFF">
				            <span class="table_title">字典描述：</span>
				          </td>
				          <td height="25" align="left" bgcolor="#FFFFFF">
				            <textarea name="entryDesc" id="entryDesc" class="textarea ui-widget-content ui-corner-all"></textarea>
				          </td>
				        </tr>
				        
				      </table>
		            
		          <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#dbdbdb">
		            <tr>
		              <td height="35" colspan="2" align="center" bgcolor="#FFFFFF">
		                <input type="Submit" id="btn_submit" name="Submit" value="添加"/>
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
