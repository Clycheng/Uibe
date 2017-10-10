<?php
include_once($root."/core/dao/categoryDao.php");
include_once($root."/core/dao/channelDao.php");
class Position {

	function Position() {
	}
	
	static function cat($url, $catId) {
		
		if ($catId == "" || $catId == 0) {
			return "";
		}
		$categoryManager = ManagerFactory::getCategoryManager();
		$categoryobject = $categoryManager->GetCatObjectByCatId($catId);
		if (!is_object($categoryobject)) {
			return "";
		}
		$catName = $categoryobject->catName;
		$parentId = $categoryobject->parentId;
		if ($parentId != 0) {
			return self::parentCat($url, $parentId)." > ".$catName;
		} else {
			return " > ".$catName;
		}
	}	
	
	static function parentCat($url, $catId) {
		if ($catId == "" || $catId == 0) {
			return "";
		}
		$categoryManager = ManagerFactory::getCategoryManager();
		$categoryobject= $categoryManager->GetCatObjectByCatId($catId);
		if(!is_object($categoryobject)) {
			return "";
		}
		if ($url != "") {
			$parentCatName = "<a href='".$url.$categoryobject->catId."'>".$categoryobject->catName."</a>";
		} else {
			$parentCatName = $categoryobject->catName;
		}
		$parentId = $categoryobject->parentId;
		if ($parentId != 0) {
			return self::parentCat($url, $parentId)." > ".$parentCatName;
		} else {
			return " > ".$parentCatName;
		}
			
	}	
	
	static function Location($url, $catId) {
		
		if ($catId == "" || $catId == 0) {
			return "";
		}
		$categoryManager = ManagerFactory::getCategoryManager();
		$categoryobject = $categoryManager->GetCatObjectByCatId($catId);
		if (!is_object($categoryobject)) {
			return "";
		}
		$catName = $categoryobject->catName;
		$parentId = $categoryobject->parentId;
		if ($parentId != 0) {
			return self::parentCat("", $parentId)." > <a href='".$url.$categoryobject->catId."'>".$catName."</a>";
		} else {
			return " > ".$catName;
		}
	}	
		
	static function channel($url, $cId) {
		
		if ($cId == "" || $cId == 0) {
			return "";
		}
		$channelManager=ManagerFactory::getChannelManager();
		$channelobject = $channelManager->GetChannelById($cId);
		if (!is_object($channelobject)) {
			return "";
		}
		$name = $channelobject->name;
		$parentId = $channelobject->parentId;
		if ($parentId != 0) {
			return self::parentChannel($url, $parentId)." > ".$name;
		} else {
			return " > ".$name;
		}
	
	}
	
	static function parentChannel($url, $cId) {
		if ($cId == "" || $cId == 0) {
			return "";
		}
		$channelManager=ManagerFactory::getChannelManager();
		$channelobject = $channelManager->GetChannelById($cId);
		if (!is_object($channelobject)) {
			return "";
		}
		$parentChannelName = "<a href='".$url.$channelobject->cId."'>".$channelobject->name."</a>";
		$parentId = $channelobject->parentId;
		if ($parentId != 0) {
			return self::parentChannel($url, $parentId)." > ".$parentChannelName;
		} else {
			return " > ".$parentChannelName;
		}
	
	}
}
?>