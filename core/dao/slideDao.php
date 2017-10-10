<?
include_once($root."/core/dao/baseDao.php");
class SlideDao extends BaseDao {

	var $db;		
	function SlideDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetSlideList($catId) {
		$sql= "select * from dh_slide where catId = $catId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetSlideById($id) {
		$sql= "select * from dh_slide where sId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetSlideListByCatId($catId, $start=null, $size=null) {
		$sql= "select * from dh_slide where catId = $catId order by seqNo";
		if ($size) {
		  $this->db->setQuery($sql, $start, $size);
		}else {
		  $this->db->setQuery($sql);
		}
		return $this->db->loadobjectlist();	
	}
	
	function GetSlideCountByCatId($catId) {
		$sql= "select * from dh_slide where catId = $catId";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($sId) {
		$sql= "delete from dh_slide where sId = ".$sId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($title, $imgPath, $imgAlt, $link, $seqNo,$remark, $sId) {
		$sql = " update dh_slide set ";
		$sql = $sql." title = '$title',imgPath='".$imgPath."',imgAlt='$imgAlt',link='$link',seqNo=$seqNo,remark='$remark'";
		$sql = $sql." where sId=".$sId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($catId, $title, $imgPath, $imgAlt, $link, $seqNo, $remark) {
		$sql = " insert into dh_slide(";
		$sql = $sql." catId,title,imgPath,imgAlt,link,seqNo,remark,createTime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$catId','$title','".$imgPath."','$imgAlt','$link',$seqNo,'$remark','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>