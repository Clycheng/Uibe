<?php
class Authority {

	public static function checkAuth($rights, $cId) {
		if ($rights == "") {
			return false;
		}
		$rightsArray = explode(",",$rights);
		foreach($rightsArray as $right) {
			if ($right == "") {
				continue;
			}
			if ($right == $cId) {
				return true;
			}
		}
		return false;
	}

}
?>