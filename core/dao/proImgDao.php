<?
include_once($root."/core/dao/baseDao.php");
class ProImgDao extends BaseDao {

	var $db;		
	function ProImgDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetProImgList($pId) {
		$sql= "select * from dh_pro_img where pId = $pId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetFirstProImg($pId) {
		$sql= "select * from dh_pro_img where pId = $pId order by seqNo";
		$this->db->setQuery($sql, 0, 1);
		return $this->db->loadobject();	
	}
	
	function GetProImgByPiId($piId) {
		$sql= "select * from dh_pro_img where piId = ".$piId;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetProImgListByPId($pId, $start, $size) {
		$sql= "select * from dh_pro_img where pId = $pId order by seqNo";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetProImgCountByPId($pId) {
		$sql= "select * from dh_pro_img where pId = $pId";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($piId) {
		$sql= "delete from dh_pro_img where piId = ".$piId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($pId, $name, $smallPic, $zoomPic, $seqNo, $piId) {
		$sql = " update dh_pro_img set ";
		$sql = $sql." pId = '$pId',name = '$name',smallPic='$smallPic',zoomPic='$zoomPic',seqNo=$seqNo";
		$sql = $sql." where piId=".$piId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($pId, $name, $smallPic, $zoomPic, $seqNo) {
		$sql = " insert into dh_pro_img(";
		$sql = $sql." pId,name,smallPic,zoomPic,seqNo,createTime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$pId','$name','$smallPic','$zoomPic', $seqNo,'".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>