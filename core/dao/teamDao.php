<?
include_once($root."/core/dao/baseDao.php");
class TeamDao extends BaseDao {

	var $db;		
	function TeamDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
		
	function GetTeamListByCatId($catId, $index, $limit) {
		$sql= "select * from dh_team where catId = ".$catId." limit ".$index.", ".$limit."";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetTeamCountByCatId($catId) {
		$sql= "select * from dh_team where catId = ".$catId;
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function GetTeamById($id) {
		$sql= "select * from dh_team where tId = ".$id." limit 0, 1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}
	
	function GetTeamAllList($catId) {
		$sql= "select * from dh_team where catId = ".$catId;
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function Save($catId, $name, $seqNo, $post, $imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$seoTitle,$seoKey,$seoDescription,$content,$intro) {
		$sql = " insert into dh_team(";
		$sql = $sql." catId,name,seqNo,post,imgPath,imgAlt,";
		$sql = $sql." putTop,isShow,isSecondShow,recom,thumbnailPath, ";
		$sql = $sql." thumbnailAlt,seoTitle,seoKey,seoDescription,content,intro ";
		$sql = $sql.") values ( ";
		$sql = $sql." $catId,'$name',$seqNo,'$post','".$imgPath."','$imgAlt',";
		$sql = $sql." $putTop,$isShow,$isSecondShow,$recom,'$thumbnailPath','$thumbnailAlt','$seoTitle','$seoKey','$seoDescription','$content','$intro'";
		$sql = $sql.")";
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Update($catId, $name, $seqNo, $post, $imgPath, $imgAlt, $putTop, $isShow, $isSecondShow, $recom,$thumbnailPath,$thumbnailAlt,$seoTitle,$seoKey,$seoDescription,$content,$intro, $tId) {
		$sql = " update dh_team set ";
		$sql = $sql." catId = $catId,name='$name',seqNo=$seqNo,post='$post',";
		$sql = $sql." imgPath='".$imgPath."',";
		$sql = $sql." imgAlt='$imgAlt',putTop=$putTop,isShow=$isShow,isSecondShow=$isSecondShow,recom=$recom,";
		$sql = $sql." thumbnailPath='$thumbnailPath',thumbnailAlt='$thumbnailAlt',seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',";
		$sql = $sql." content='$content',intro='$intro'";
		$sql = $sql." where tId=".$tId;
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function UpdateStatus($oper, $row, $tId) {
		$sql = " update dh_team set ";
		if ($oper == "recom") {	
			if ($row->recom == "0") {
				$sql = $sql." recom=1";
			} else {
				$sql = $sql." recom=0";
			}
		}
		if ($oper == "setisshow") {	
			if ($row->isShow == "0") {
				$sql = $sql." isShow=1";
			} else {
				$sql = $sql." isShow=0";
			}
		}
		if ($oper == "issecondshow") {							
			if ($row->isSecondShow == "0") {
				$sql = $sql." isSecondShow=1";
			} else {
				$sql = $sql." isSecondShow=0";
			}
		}		
		if ($oper == "puttop") {	
			if ($row->putTop == "0") {
				$sql = $sql." putTop=1";
			} else {
				$sql = $sql." putTop=0";
			}
		}
		
		$sql = $sql." where tId=".$tId;
		
		$this->db->setQuery($sql);
		$this->db->query();	
	}
	
	function Del($tId) {
		$sql= "delete from dh_team where tId = ".$tId;
		$this->db->setQuery($sql);
		$this->db->query();	
	}
}
?>