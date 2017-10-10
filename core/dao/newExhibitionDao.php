<?
include_once($root."/core/dao/baseDao.php");
class NewExhibitionDao extends BaseDao {

	var $db;		
	function NewExhibitionDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetNewExhibitionListByCatId($catId, $start, $size) {
		$sql= "select * from dh_new_exhibition where catId = ".$catId." order by nId desc";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetNewExhibitionCountByCatId($catId) {
		$sql= "select * from dh_new_exhibition where catId = ".$catId;
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function GetNewExhibitionById($id) {
		$sql="select * from dh_new_exhibition where nId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
		
	function GetPrevNewExhibitionById($id) {
		$sql= "select * from dh_new_exhibition where nId < ".$id." order by nId desc limit 0, 1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}
	
	function GetNextNewExhibitionById($id) {
		$sql= "select * from dh_new_exhibition where nId > ".$id." order by nId limit 0, 1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}
	
	function Save($catId,$imgPath,$imgAlt,$title,$time,$place,$address,$content,$seqNo,$seoTitle,$seoKey,$seoDescription,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt) {
		$sql = " insert into dh_new_exhibition(";
		$sql = $sql." catId,imgPath,imgAlt,title,time,place,address,content,seqNo,seoTitle,seoKey,seoDescription,";
		$sql = $sql." putTop,isShow,isSecondShow,recom,thumbnailPath,thumbnailAlt ";
		$sql = $sql.") values ( ";
		$sql = $sql." $catId,'".$imgPath."','$imgAlt','$title','$time','$place','$address','$content',$seqNo,";		
		$sql = $sql." '$seoTitle','$seoKey','$seoDescription',$putTop,$isShow,$isSecondShow,$recom,'$thumbnailPath','$thumbnailAlt'";
		$sql = $sql.")";
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Update($catId,$imgPath,$imgAlt,$title,$time,$place,$address,$content,$seqNo,$seoTitle,$seoKey,$seoDescription,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$nId) {
		$sql = " update dh_new_exhibition set ";
		$sql = $sql." catId = $catId,imgPath='".$imgPath."',imgAlt='$imgAlt',title='$title',time='$time',place='$place',address='$address',";
		$sql = $sql." content='$content',seqNo=$seqNo,seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',";
		$sql = $sql." putTop=$putTop,isShow=$isShow,isSecondShow=$isSecondShow,recom=$recom,";
		$sql = $sql." thumbnailPath='$thumbnailPath',thumbnailAlt='$thumbnailAlt'";
		$sql = $sql." where nId=".$nId;
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Del($nId) {
		$sql = " delete from dh_new_exhibition  where nId=".$nId;
			
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function UpdateStatus($oper, $row, $nId) {
		$sql = " update dh_new_exhibition set ";
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
		
		$sql = $sql." where nId=".$nId;
		
		$this->db->setQuery($sql);
		$this->db->query();	
	}
	
}

?>