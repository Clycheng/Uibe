<?
include_once($root."/core/dao/baseDao.php");
class PartnerDao extends BaseDao {

	var $db;		
	function PartnerDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetPartnerList($catId) {
		$sql= "select * from dh_partner where catId = $catId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
		
	function GetPartnerCount($catId) {
		$sql= "select * from dh_partner where catId = $catId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function GetPartnerById($id) {
		$sql= "select * from dh_partner where pId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetPartnerListByCatId($catId, $start, $size) {
		$sql= "select * from dh_partner where catId = $catId order by seqNo";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetPartnerCountByCatId($catId) {
		$sql= "select * from dh_partner where catId = $catId";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($pId) {
		$sql= "delete from dh_partner where pId = ".$pId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($title, $smallImgPath, $smallImgAlt, $bigImgPath, $bigImgAlt, $link, $seqNo, $remark, $pId) {
		$sql = " update dh_partner set ";
		$sql = $sql." title = '$title',smallImgPath='".$smallImgPath."',smallImgAlt='$smallImgAlt',bigImgPath='".$bigImgPath."',bigImgAlt='$bigImgAlt',link='$link',seqNo=$seqNo,remark='$remark'";
		$sql = $sql." where pId=".$pId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($catId, $title, $smallImgPath, $smallImgAlt, $bigImgPath, $bigImgAlt, $link, $seqNo, $remark) {
		$sql = " insert into dh_partner(";
		$sql = $sql." catId,title,smallImgPath,smallImgAlt,bigImgPath, bigImgAlt, link,seqNo,remark,createTime";
		$sql = $sql.") values ( ";
		$sql = $sql." '$catId','$title','".$smallImgPath."','$smallImgAlt','".$bigImgPath."','$bigImgAlt','$link',$seqNo,'$remark','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>