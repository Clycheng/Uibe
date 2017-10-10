<?
$seo_Title = $config->seoTitle;
$seo_Key = $config->seoKey;
$seo_Desc = $config->seoDescription;

if (is_object($firstCat)) {
  if ($firstCat->seoTitle != "") {
    $seo_Title = $firstCat->seoTitle." | ".$seo_Title;
  }
  if ($firstCat->seoKey != "") {
    $seo_Key = $firstCat->seoKey." | ".$seo_Key;
  }
  if ($firstCat->seoDescription != "") {
    $seo_Desc = $firstCat->seoDescription." | ".$seo_Desc;
  }
}
if (is_object($secondCat)) {
  if ($secondCat->seoTitle != "") {
    $seo_Title = $secondCat->seoTitle." | ".$seo_Title;
  }
  if ($secondCat->seoKey != "") {
    $seo_Key = $secondCat->seoKey." | ".$seo_Key;
  }
  if ($secondCat->seoDescription != "") {
    $seo_Desc = $secondCat->seoDescription." | ".$seo_Desc;
  }
}
if (is_object($currentCat)) {
	if ($currentCat->seoTitle != "") {
		$seo_Title = $currentCat->seoTitle." | ".$seo_Title;
	}
	if ($currentCat->seoKey != "") {
		$seo_Key = $currentCat->seoKey." | ".$seo_Key;
	}
	if ($currentCat->seoDescription != "") {
		$seo_Desc = $currentCat->seoDescription." | ".$seo_Desc;
	}
}
if (is_object($object)) {
	if ($object->seoTitle != "") {
		$seo_Title = $object->seoTitle." | ".$seo_Title;
	}
	if ($object->seoKey != "") {
		$seo_Key = $object->seoKey." | ".$seo_Key;
	}
	if ($object->seoDescription != "") {
		$seo_Desc = $object->seoDescription." | ".$seo_Desc;
	}
}
?>
<title><?=$seo_Title?></title>
<meta name="keywords" content="<?=$seo_Key?>"/>
<meta name="description" content="<?=$seo_Desc?>"/>
