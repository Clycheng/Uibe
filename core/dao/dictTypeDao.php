<?
include_once($root."/core/dao/baseDao.php");
class DictTypeDao extends BaseDao {

	var $db;		
	function DictTypeDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetDictTypeById($id) {
		$sql= "select * from dh_dicttype where dictId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetDictTypeList($start, $size) {
		$sql= "select * from dh_dicttype";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetDictTypeCount() {
		$sql= "select * from dh_dicttype";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($dictId) {
		$sql= "delete from dh_dicttype where dictId = ".$dictId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($dictName, $dictDesc, $dictId) {
		$sql = " update dh_dicttype set ";
		$sql = $sql." dictName='$dictName',dictDesc='$dictDesc'";
		$sql = $sql." where dictId=".$dictId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($dictName, $dictDesc) {
		$sql = " insert into dh_dicttype(";
		$sql = $sql." dictName, dictDesc ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$dictName', '$dictDesc'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>