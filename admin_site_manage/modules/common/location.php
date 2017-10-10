<?
	if($parentId <> 0){ 
		$sql = "select * from ".$prefix."category where parentId = $parentId";
		$db->setquery($sql);
		$category=$db->loadobject();
		$catName = " > ".$category->catName."";
	}
?>
系统管理 > <a href="../category/list.php">栏目管理</a><?=$catName?>
