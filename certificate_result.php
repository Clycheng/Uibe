<? require_once("core/common/globalFilter.php");?>
<? require_once("common/lib/config.php");?>
<?

$msg = "";
$user = null;
$courseList = null;
try {
  if (is_null($realName) || $realName == "") {
    throw new Exception("请输入姓名！", 1001);
  }
  if (is_null($certificate) || $certificate == "") {
    throw new Exception("请输入身份证号！", 1002);
  }
  if (filter($realName) 
  || filter($certificate)) {
     throw new Exception("您输入了非法字符！", 1009);
  }
  
  $userManager = ManagerFactory::getUserManager();
  $user = $userManager->GetUserByRealNameAndCertificate($realName, $certificate);
  if ($user != null) {
    $courseManager = ManagerFactory::getCourseManager();
    $courseList = $courseManager->GetCourseByUserId($user->userId);
  }
} catch (Exception $e){
  if ($e->getCode() != "") {
    $msg = $e->getMessage();
  } else {
    $msg = "系统错误！";
  }
}

if ($user != null) {
?>
姓    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<?=$user->realName?><br />
身份证号：<?=$user->certificate?><br />
会员类型：<?=$user->realName?><br />
执业编号：<?=$user->number?><br />
获证时间：<?=$user->issuedDate?><br />
考试成绩：<br />
<table width="404" border="0" cellspacing="0" cellpadding="0" class="lie_list">
 <tr>
   <th width="254" align="left">&nbsp;&nbsp;&nbsp;&nbsp;考核科目</th>
   <th width="150" align="center">考核等级</th>
 </tr>
 <?
    if ($courseList != null) {
      foreach ($courseList as $record) {
 ?>
 <tr>
   <td align="left">&nbsp;&nbsp;<?=$record->name?></td>
   <td align="center"><?=$record->level?></td>
 </tr>
 <?
      }
    }
 ?>
</table>
<br />
年审情况：<br />
<?=$user->audit?><br />
<br />
如有疑问，可通过电邮：<?=$config->email?>与我处联系。
<?
} else {
  if (is_null($msg) || $msg == "") {
    echo "证书信息不存在！";
  } else {
    echo $msg;
  }
}
?>