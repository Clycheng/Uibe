<?
include_once($root."/core/dao/baseDao.php");
class FeedDao extends BaseDao {

	var $db;		
	function FeedDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetFeedById($id) {
		$sql= "select * from dh_feed where eId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetFeedList($start, $size) {
		$sql= "select * from dh_feed order by createtime";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetFeedCount() {
		$sql= "select * from dh_feed";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($eId) {
		$sql= "delete from dh_feed where eId = ".$eId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($email) {
		$sql = " insert into dh_feed(";
		$sql = $sql." email,createtime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$email','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>