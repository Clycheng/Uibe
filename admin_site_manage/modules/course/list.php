<?
session_start();
include_once("../../../core/common/globalFilter.php");
include_once("../common/session.php");
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/cupertino/jquery-ui-1.9.2.custom.min.css"/>
  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="/admin_site_manage/resources/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <link rel="stylesheet" href="/admin_site_manage/resources/jquery-ui/css/demos.css"/>
  
  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

</head>

<body>

  <div id="tabs">
     <ul>
        <li><a href="#tabs-1">考试成绩</a></li>
     </ul>
     <div class="tabs-spacer"></div>
     <div id="tabs-1">
       <div style="padding:10px">
        <span class="ui-icon ui-icon-home" style="float:left"></span>
        当前位置：<a href="../user/list.php">学员管理</a> &gt; 考试成绩
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
        
        <div id="table-header-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">
              <td width="55%" height="40" style="padding-left:13px"> 
                <strong>考试成绩</strong>       
              </td>
              <td width="45%" align="right" height="40">
                <a href="initAdd.php?userId=<?=$userId?>" title="添加">
                  <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:right">
                    <span class="ui-icon ui-icon-plus" style="float:left"></span>添加
                  </span>     
                </a>
              </td>
            </tr>
          </table>
        </div>
        
        
        <div id="table-body-contain" class="ui-widget">
          <table class="ui-widget ui-widget-content">
            <tr class="ui-widget-header">   
              <td width="10%" height="25" align="center">
				        编号
				      </td>
              <td width="51%" height="24" align="center">
                考核科目
              </td>
              <td width="15%" height="24" align="center">
                考核等级
              </td>
				      <td width="10%" height="24" align="center">
				        排序
				      </td>
				      <td width="14%" height="24" align="center">
				        操作
				      </td>
				    </tr>
                
				    <?
				    $courseManager = ManagerFactory::getCourseManager();
				    $pagesize = 10;
				    $total = $courseManager->GetCourseCountByUserId($userId);
				    if($total == ""){
				      $result = "<div style='padding-top:5px;'>当前还没有任何记录</div>";
				      $total = 1;
				    }
				    $pagingbean = new liwqpage(array('total'=>$total, 'perpage'=>$pagesize));
				    
				    if($_GET["PB_page"] == ""){
				      $_GET["PB_page"]= 1;
				    }
				    $records = $courseManager->GetCourseListByUserId($userId, $pagingbean->offset(), $pagesize);
				    if ($records != null) {
				      foreach($records as $record) {
				      
				    ?>
				    <tr>
				      <td align="center" bgcolor="#FFFFFF">
				          <?=$record->courseId?>
				      </td>
              <td align="center" bgcolor="#FFFFFF">
                  <?=$record->name?>        
              </td>
              <td align="center" bgcolor="#FFFFFF">
                  <?=$record->level?>        
              </td>
				      <td align="center" bgcolor="#FFFFFF"><?=$record->seqNo?></td>
				      <td align="center" bgcolor="#FFFFFF">
				        <a href="initEdit.php?action=edit&userId=<?=$userId?>&courseId=<?=$record->courseId?>"> 
				          <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                    <span class="ui-icon ui-icon-pencil" style="float:left"></span>编辑
                  </span>
				        </a>
				        &nbsp;
				        <a href="del.php?action=del&userId=<?=$userId?>&courseId=<?=$record->courseId?>" onClick="return confirmDel();">
				          <span class="ui-state-default ui-corner-all" style="padding:6px 12px 6px 4px; float:left">
                    <span class="ui-icon ui-icon-trash" style="float:left"></span>删除
                  </span>
				        </a>
				      </td>
				    </tr>
				    <? 
				      }
				    }
				     ?>
				    </table>
				  </div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
			      <tr>
			        <td width="29%">
			          &nbsp;&nbsp;
			          共有<?=$total?>条记录，当前第<?=$_GET["PB_page"];?>/<?=$pagingbean->totalpage?>页，<?=$pagesize?>条/页
			        </td>
			        <td width="25%" align="left"></td>
			        <td align="left">&nbsp;</td>
			        <td width="23%" align="right" valign="middle">
			          <?=$pagingbean->show(3)?>
			        </td>
			      </tr>
			    </table>  
        </div>
     
      </div>
	

</body>
</html>