<?
include_once($root."/core/dao/baseDao.php");
class DictEntryDao extends BaseDao {

	var $db;		
	function DictEntryDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetDictEntryById($id) {
		$sql= "select * from dh_dictentry where entryId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

  function GetDictEntryListByDictType($dictType) {
    $sql= "select * from dh_dictentry where dictType = '$dictType' order by seqNo";
    $this->db->setQuery($sql, $start, $size);
    return $this->db->loadobjectlist(); 
  }

	function GetDictEntryList($start, $size) {
		$sql= "select * from dh_dictentry order by dictType, seqNo";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetDictEntryCount() {
		$sql= "select * from dh_dictentry";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($entryId) {
		$sql= "delete from dh_dictentry where entryId = ".$entryId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($entryName, $entryDesc,$dictType, $seqNo, $entryId) {
		$sql = " update dh_dictentry set ";
		$sql = $sql." entryName='$entryName',entryDesc='$entryDesc',dictType='$dictType', seqNo='$seqNo' ";
		$sql = $sql." where entryId=".$entryId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($entryName, $entryDesc, $dictType, $seqNo) {
		$sql = " insert into dh_dictentry(";
		$sql = $sql." entryName, entryDesc, dictType, seqNo ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$entryName', '$entryDesc', '$dictType', '$seqNo'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>