<? require_once("../core/common/globalFilter.php");?>
<? require_once("../common/lib/config.php");?>
<?
@session_start();
try {
  if (is_null($cmd)) {
    throw new Exception("非法操作！", 1000);
  }
  
  switch ($cmd) {
    //项目信息处理
    case 1001 :
  
      $s_verifyCode = $_SESSION["s_verifycode"];
      if($checkCode != $s_verifyCode){
        throw new Exception("验证码不正确！",10003);
      }
      if (is_null($name)) {
        throw new Exception("请输入项目名称！", 1001);
      }
      if (is_null($intro)) {
        throw new Exception("请输入项目概述！", 1002);
      }
      if (is_null($startTime)) {
        throw new Exception("请输入项目有效期！", 1003);
      }
      if (is_null($endTime)) {
        throw new Exception("请输入项目有效期！", 1004);
      }
      if (is_null($contact)) {
        throw new Exception("请输入联系人姓名！", 1005);
      }
      if (is_null($tellphone)) {
        throw new Exception("请输入您的联系电话！", 1006);
      }
      if (isNotNumber($tellphone)) {
        throw new Exception("联系电话格式不正确！", 1007);
      }
      if (isNotNumber($cellphone)) {
        throw new Exception("手机格式不正确！", 1007);
      }
      if (!is_null($email) && $email != "") {
        if (!isEmail($email)) {
           throw new Exception("邮箱格式不正确！", 1008);
        }
      }
      if (filter($name) 
      || filter($intro) 
      || filter($startTime) 
      || filter($endTime) 
      || filter($contact) 
      || filter($tellphone)
      || filter($cellphone)
      || filter($email)
      || filter($industry)
      || filter($content)) {
         throw new Exception("非法操作！", 1009);
      }
      
      $projectManager = ManagerFactory::getProjectManager();
      $projectManager->Save($name, $industry, $intro, $startTime, $endTime, $contact, $tellphone, $cellphone, $email, $content);
      $_SESSION["s_verifycode"] = null;
      break;
    //企业信息处理
    case 1002 :
  
      $s_verifyCode = $_SESSION["s_verifycode"];
      if($checkCode != $s_verifyCode){
        throw new Exception("验证码不正确！",10003);
      }
      if (is_null($name)) {
        throw new Exception("请输入企业名称！", 1001);
      }
      if (is_null($post)) {
        throw new Exception("请输入招聘岗位！", 1002);
      }
      if (is_null($startTime)) {
        throw new Exception("请输入岗位有效期！", 1003);
      }
      if (is_null($endTime)) {
        throw new Exception("请输入岗位有效期！", 1004);
      }
      if (is_null($contact)) {
        throw new Exception("请输入联系人！", 1005);
      }
      if (is_null($tellphone)) {
        throw new Exception("请输入您的联系电话！", 1006);
      }
      if (isNotNumber($tellphone)) {
        throw new Exception("联系电话格式不正确！", 1007);
      }
      if (filter($name) 
      || filter($nature) 
      || filter($industry) 
      || filter($scale) 
      || filter($post) 
      || filter($num) 
      || filter($startTime) 
      || filter($endTime) 
      || filter($education) 
      || filter($contact) 
      || filter($tellphone)
      || filter(remark)) {
         throw new Exception("非法操作！", 1009);
      }      
      
      $postManager = ManagerFactory::getPostManager();
      $postManager->Save($name, $nature, $industry, $scale, $post, $num, $startTime, $endTime, $education, $contact, $tellphone, $remark);
      $_SESSION["s_verifycode"] = null;
      break;
    //简历信息处理
    case 1003 :
      
      
      $s_verifyCode = $_SESSION["s_verifycode"];
      if($checkCode != $s_verifyCode){
        throw new Exception("验证码不正确！",10003);
      }
      if (is_null($name)) {
        throw new Exception("请输入姓名！", 1001);
      }
      if (is_null($age)) {
        throw new Exception("请输入年龄！", 1001);
      }
      if (is_null($post)) {
        throw new Exception("请输入招聘岗位！", 1002);
      }
      if (is_null($evaluate)) {
        throw new Exception("请输入自我评价！", 1004);
      }
      if (is_null($pay)) {
        throw new Exception("请输入您的期望薪资！", 1006);
      }
      if (isNotNumber($pay)) {
        throw new Exception("期望薪资格式不正确！", 1007);
      }
      if (is_null($tellphone)) {
        throw new Exception("请输入您的联系电话！", 1006);
      }
      if (isNotNumber($tellphone)) {
        throw new Exception("联系电话格式不正确！", 1007);
      }
      if (filter($name) 
      || filter($gender) 
      || filter($age) 
      || filter($education) 
      || filter($post) 
      || filter($nature) 
      || filter($evaluate) 
      || filter($industry) 
      || filter($pay) 
      || filter($tellphone)
      || filter(remark)) {
         throw new Exception("非法操作！", 1009);
      }      
      
      $jobManager = ManagerFactory::getJobManager();
      $jobManager->Save($name, $gender, $age, $education, $post, $nature, $evaluate, $industry, $pay, $tellphone, $remark);
      $_SESSION["s_verifycode"] = null;
      break;
    default :
       throw new Exception("无效操作！", 1009);
  }
  echo "处理成功！";
} catch (Exception $e){
  if ($e->getCode() != "") {
    echo $e->getMessage();
  } else {
    echo "系统错误！";
  }
}

?>