<?
include_once($root."/core/dao/baseDao.php");
class CategoryDao extends BaseDao {

	var $db;		
	function CategoryDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetNavList($catId) {
		$sql= "select * from dh_category where isShow=1 and parentId = $catId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetNavCount($catId) {
		$sql= "select * from dh_category where isShow=1 and parentId = $catId order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
  function GetNavListByCatIdIn($catIds) {
    $sql= "select * from dh_category where isShow=1 and catId in ($catIds) order by seqNo";
    $this->db->setQuery($sql);
    return $this->db->loadobjectlist(); 
  }
  
  function GetNavCountByCatIdIn($catIds) {
    $sql= "select * from dh_category where isShow=1 and catId in ($catIds) order by seqNo";
    $this->db->setQuery($sql);
    return $this->db->num_rows(); 
  }
	
	function GetCatObjectByCatId($catId) {
		$sql= "select * from dh_category where catId=".$catId." order by seqNo limit 0,1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	function GetCatNameByCatId($catId) {
		$sql= "select catName from dh_category where catId=".$catId." order by seqNo limit 0,1";
		$this->db->setQuery($sql);
		$object = $this->db->loadobject();	
		return $object->catName;	
	}
	
	function GetTwoIdByOneId($one) {
		$sql= "select catId from dh_category where parentId=".$one." order by seqNo limit 0,1";
		$this->db->setQuery($sql);
		$object = $this->db->loadobject();	
		return $object->catId;	
	}
	
  function GetOneIdByTwoId($two) {
    $sql= "select * from dh_category where catId=".$two." order by seqNo limit 0,1";
    $this->db->setQuery($sql);
    $object = $this->db->loadobject();  
    return $object->parentId;  
  }
  
	function GetTwoNameByOneId($one) {
		$sql= "select catName from dh_category where parentId=".$one." order by seqNo limit 0,1";
		$this->db->setQuery($sql);
		$object = $this->db->loadobject();	
		return $object->catName;	
	}
	
	function GetTwoCatListByOneId($one) {
		$sql= "select * from dh_category where parentId=".$one." order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
	function GetCatById($id) {
		$sql= "select * from dh_category where catId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	function GetCatListByParentId($parentId) {
		$sql= "select * from dh_category where parentId = ".$parentId." order by seqNo";
		$this->db->setQuery($sql);
		return $this->db->loadobjectlist();	
	}
	
  function GetMaxSeqNoByParentId($parentId) {
    $sql= "select max(seqNo) from dh_category where parentId = ".$parentId;
    $this->db->setQuery($sql);
    return $this->db->loadResult(); 
  }
	
	function GetCatCountByParentId($parentId) {
		$sql= "select * from dh_category where parentId = ".$parentId;
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function UpdateStatus($oper, $isShow, $catId) {
		
		if ($oper == "isshow") {
			$sql = " update dh_category set ";
			
			if ($isShow == "0") {
				$sql = $sql." isShow=1";
			} else {
				$sql = $sql." isShow=0";
			}
			
			$sql = $sql." where catId=".$catId;
			
			$this->db->setQuery($sql);
			$this->db->query();
		}
	}
	
	function Save($parentId, $catName, $menuName, $imgPath, $path, $seqNo, $style, $seoTitle, $seoKey, $seoDescription, $frontUrl, $backUrl, $description) {
		$sql = " insert into dh_category(";
		$sql = $sql." parentId,catName,menuName,imgPath,createTime,path,seqNo,style,seoTitle,seoKey,seoDescription,frontUrl,";
		$sql = $sql."backUrl,description ";
		$sql = $sql.") values ( ";
		$sql = $sql." $parentId,'$catName','$menuName','".$imgPath."','".date('Y-m-d H:i:s')."','$path',$seqNo,";		
		$sql = $sql." '$style','$seoTitle','$seoKey','$seoDescription','$frontUrl','$backUrl','$description'";
		$sql = $sql.")";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Update($parentId, $catName, $menuName, $imgPath, $path, $seqNo, $style, $seoTitle, $seoKey, $seoDescription, $frontUrl, $backUrl, $description, $catId) {
		$sql = " update dh_category set ";
		$sql = $sql." parentId = $parentId,catName='$catName',menuName='$menuName',imgPath='".$imgPath."',path='$path',";
		$sql = $sql." seqNo=$seqNo,style=$style,seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',";
		$sql = $sql." frontUrl='$frontUrl',backUrl='$backUrl',description='$description'";
		$sql = $sql." where catId=".$catId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Del($catId) {
		$sql = " delete from dh_category where catId=".$catId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
}
?>