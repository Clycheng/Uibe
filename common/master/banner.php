<?
if (is_null($one) || $one == 1) {
	
	echo "  <div class=\"www51buycom\">";
	echo "    <ul class=\"51buypic\">";
	$slideManager = ManagerFactory::getSlideManager();
	$list = $slideManager->GetSlideList(18);
	
	foreach ($list as $slide) {
		echo "    <li><img src=\"".$slide->imgPath."\" /></li>";
	}
	echo "    </ul>";
	echo "  	<a class=\"prev\" href=\"javascript:void(0)\"></a>";
  echo "  	<a class=\"next\" href=\"javascript:void(0)\"></a>";
  echo "  	<div class=\"num\">";
  echo "  		<ul></ul>";
  echo "  	</div>";
  echo "</div>";
	
} else {
	echo "<div class=\"newsbanner\"><img src=\"".$currentCat->imgPath."\"/></div>";
}
?>    