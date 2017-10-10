<?
include_once($root."/core/dao/baseDao.php");
class ProductDao extends BaseDao {

	var $db;		
	function ProductDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}

  function GetProductList($catId) {
    $sql= "select * from dh_product where catId = $catId order by seqNo";
    $this->db->setQuery($sql);
    return $this->db->loadobjectlist(); 
  }
  
  function GetRecomProductList() {
    $sql= "select * from dh_product where recom=1 order by seqNo";
    $this->db->setQuery($sql);
    return $this->db->loadobjectlist(); 
  }
	
	function GetProductById($pId) {
		$sql= "select * from dh_product where pId = ".$pId;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

  function GetFirstProductByCatId($catId) {
    $sql= "select * from dh_product where catId = $catId";
    $this->db->setQuery($sql, 0 , 1);
    return $this->db->loadobject();
  }
  
	function GetPrevProductByPId($pId) {
		$sql= "select * from dh_product where pId < ".$pId." order by pId desc limit 0, 1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}
	
	function GetNextProductByPId($pId) {
		$sql= "select * from dh_product where pId > ".$pId." order by pId limit 0, 1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetProductListByCatId($catId, $start, $size) {
		$sql= "select * from dh_product where catId = $catId order by seqNo";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetProductCountByCatId($catId) {
		$sql= "select * from dh_product where catId = $catId";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function GetProductListByParam($s, $start, $size) {
		$sql= "select * from dh_product where catId not in (select catId from dh_category where parentId = 5) ";
		$sql= $sql."and (name like '%$s%' or number like '%$s%') order by seqNo";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetProductCountByParam($s) {
		$sql= "select * from dh_product where catId not in (select catId from dh_category where parentId = 5) ";
		$sql= $sql."and (name like '%$s%' or number like '%$s%')";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($pId) {
		$sql= "delete from dh_product where pId = ".$pId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function UpdateStatus($oper, $row, $pId) {
    $sql = " update dh_product set ";
    if ($oper == "putTop") { 
      if ($row->putTop == 0) {
        $sql = $sql." putTop=1";
      } else {
        $sql = $sql." putTop=0";
      }
    }
    
    $sql = $sql." where pId=".$pId;
    
    $this->db->setQuery($sql);
    $this->db->query(); 
  }
	
	function Update($catId, $name, $imgPath, $imgAlt, $seqNo,$putTop, $seoTitle, $seoKey, $seoDescription,$content,$description, $pId) {
		$sql = " update dh_product set ";
		$sql = $sql." name = '$name',imgPath='".$imgPath."',imgAlt='$imgAlt',";
		$sql = $sql." seqNo=$seqNo,putTop=$putTop,description='$description',";
		$sql = $sql." seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',content='$content'";
		$sql = $sql." where pId=".$pId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($catId, $name, $imgPath, $imgAlt, $seqNo,$putTop, $seoTitle, $seoKey, $seoDescription,$content,$description) {
		$sql = " insert into dh_product(";
		$sql = $sql." catId,name,imgPath,imgAlt,seqNo,puttop,seoTitle,seoKey,seoDescription,content,description,createtime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$catId','$name','".$imgPath."','$imgAlt',$seqNo,$putTop,";
		$sql = $sql." '$seoTitle','$seoKey','$seoDescription','$content','$description','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>