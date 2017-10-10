<? require_once($root."/common/lib/global.php");?>
<? require_once($root."/common/lib/base.php");?>
<? require_once($root."/common/lib/frontUtil.php");?>
<? require_once($root."/common/lib/pageBar.php");?>
<?
$webConfigManager = ManagerFactory::getWebConfigManager();
$config = $webConfigManager->GetWebConfigById(1);
$urlIsRewrite = $config->isDisabled;
$footMenu = "";
$indexUrl = "";
$serviceUrl = "";
$caseUrl = "";
$newUrl="";
$productUrl="";
if($urlIsRewrite) {
  $indexUrl = "/";
  $serviceUrl = "/service/";
  $caseUrl="/case/";
  $newUrl="/new/";
  $productUrl="/product/";
  $contactUrl="/contact/";
  $aboutUrl="/about/";
  $projectUrl="/project/";
  $cooperationUrl="/cooperation/";
  $certificateUrl="http://uibe.iarfp.org.cn/chinese/onlineregistration/Sign_up.asp";
  $educationUrl="/education/";
  $noticeUrl="/notice/";
  $shareUrl="/new/list-9-12.html";
  $activityUrl="/activity/";
  $pressReleaseUrl="/pressRelease/";
  $collegeUrl="/college/";
  $navUrl="/nav/";
  $linksUrl="/links/";
  $postUrl="/post/";
} else {
  $indexUrl = "/index.php";
  $serviceUrl = "/service.php";
  $caseUrl="/case.php";
  $newUrl="/new.php";
  $productUrl="/product.php";
  $contactUrl="/contact.php";
  $aboutUrl="/about.php";
  $projectUrl="/project.php";
  $cooperationUrl="/cooperation.php";
  $certificateUrl="http://uibe.iarfp.org.cn/chinese/onlineregistration/Sign_up.asp";
  $educationUrl="/education.php";
  $noticeUrl="/notice.php";
  $shareUrl="/new.php?one=9&two=12";
  $activityUrl="/activity.php";
  $pressReleaseUrl="/pressRelease.php";
  $collegeUrl="/college.php";
  $navUrl="/nav.php";
  $linksUrl="/links.php";
  $postUrl="/post.php";
}
?>