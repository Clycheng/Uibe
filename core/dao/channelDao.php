<?
include_once($root."/core/dao/baseDao.php");
class ChannelDao extends BaseDao {

	var $db;		
	function ChannelDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetChannelById($cId) {
		$sql= "select * from dh_channel where cId = ".$cId;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	
	function GetChannelListByParentId($parentId) {
		$sql= "select * from dh_channel where parentId = ".$parentId." order by seqNo asc";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetChannelCountByParentId($parentId) {
		$sql= "select * from dh_channel where parentId = ".$parentId;
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function Save($parentId, $name, $path, $seqNo, $backUrl, $description, $isContainCat) {
		$sql = " insert into dh_channel(";
		$sql = $sql." parentId,name,createTime,path,seqNo,backUrl,description,isContainCat ";
		$sql = $sql.") values ( ";
		$sql = $sql." $parentId,'$name','".date('Y-m-d H:i:s')."','$path',$seqNo,'$backUrl','$description','$isContainCat'";
		$sql = $sql.")";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Update($parentId, $name, $path, $seqNo, $backUrl, $description, $isContainCat, $cId) {
		$sql = " update dh_channel set ";
		$sql = $sql." parentId = $parentId,name='$name',path='$path',";
		$sql = $sql." seqNo=$seqNo,backUrl='$backUrl',description='$description',isContainCat=$isContainCat";
		$sql = $sql." where cId=".$cId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Del($cId) {
		$sql = " delete from dh_channel where cId=".$cId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function UpdateStatus($oper, $isShow, $cId) {
		
		if ($oper == "isshow") {
			$sql = " update dh_channel set ";
			
			if ($isShow == "0") {
				$sql = $sql." isShow=1";
			} else {
				$sql = $sql." isShow=0";
			}
			
			$sql = $sql." where cId=".$cId;
			
			$this->db->setQuery($sql);
			$this->db->query();
		}
	}
}
?>