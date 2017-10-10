<?
include_once($root."/core/sysutil/factory.class.php");
class BaseDao {

	var $db;		
	function BaseDao() {
		$this->db = Factory::create();
	}
	
	function getDB() {
		return $this->db;
	}
}
?>