<? 
  session_start();
  include_once("../../../core/common/globalFilter.php");
  include_once("../common/session.php");
  
  if ($action == "accredit") {
    $sysUserManager = ManagerFactory::getSysUserManager();
    $sysUser = $sysUserManager->GetSysUserByUserId($uId);
?>
<html>
<head>
<link href="/admin_site_manage/resources/ztree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin_site_manage/resources/ztree/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/admin_site_manage/resources/ztree/js/jquery.ztree.core-3.5.min.js"></script>
<script type="text/javascript" src="/admin_site_manage/resources/ztree/js/jquery.ztree.excheck-3.5.min.js"></script>
<script type="text/javascript">
<!--
var setting = {
  check: {
  enable: true
  },
  data: {
  simpleData: {
    enable: true
  }
  }
};
var zNodes =[
  <? MenuUtil::channelTree("0", $sysUser->rights,$sysUser->catrights) ?>      
];

$(document).ready(function(){
  $.fn.zTree.init($("#channelTree"), setting, zNodes);
});
//-->

function getCheckedNodes() {
  var zTree = $.fn.zTree.getZTreeObj("channelTree");
  var nodes = zTree.getCheckedNodes();
	return nodes;
}
</script>
</head>

<body>
  <ul id="channelTree" class="ztree"></ul>
</body>
</html>
<? 
  }
?>