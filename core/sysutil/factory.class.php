<?php
include_once($root."/core/config.inc.php");
include_once($root."/core/db/database.class.php");

class Factory {

	private static $db;
	public static function create() {
		if (!is_object(self::$db)) {
			global $cfg_dbhost;
			global $cfg_dbuser;
			global $cfg_dbpwd;
			global $cfg_dbname;			
			self::$db = new Database($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd,$cfg_dbname);
		}
		return self::$db;
	}
}
?>
