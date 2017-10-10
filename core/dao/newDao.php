<?
include_once($root."/core/dao/baseDao.php");
class NewDao extends BaseDao {

  var $db;    
  function NewDao() {
    parent::BaseDao();
    $this->db = parent::getDB();
  }
  
  function GetLastNewListByCatId($catId, $start, $size) {
    $sql= "select * from dh_new where catId in (select catId from dh_category where parentId = ".$catId.") order by createTime desc";
    $this->db->setQuery($sql, $start, $size);
    return $this->db->loadobjectlist(); 
  }
  
  function GetTopNewList($catId, $size) {
    $sql= "select * from dh_new where catId in ($catId) and isShow = 1 order by recom desc, seqNo";
    $this->db->setQuery($sql, 0 ,$size);
    return $this->db->loadobjectlist(); 
  }
  
  function GetSecondRecomNewList($catId, $size) {
    $sql= "select * from dh_new where catId = $catId and isSecondShow = 1 order by putTop desc, recom desc, seqNo";
    $this->db->setQuery($sql, 0 ,$size);
    return $this->db->loadobjectlist(); 
  }

  function GetRecomNew($catId) {
    $sql= "select * from dh_new where catId = ".$catId." and recom=1 limit 0, 1";
    $this->db->setQuery($sql);
    return $this->db->loadobject();
  }
  
  function GetRecomNewList($size) {
    $sql= "select * from dh_new where recom=1 order by seqNo limit 0, $size";
    $this->db->setQuery($sql, 0, $si);
    return $this->db->loadobjectlist();
  }
  
  function GetNewList($catId) {
    $sql= "select * from dh_new where catId = $catId order by seqNo";
    $this->db->setQuery($sql);
    return $this->db->loadobjectlist(); 
  }
  
  function GetNewListByCatId($catId, $start, $size) {
    $sql= "select * from dh_new where catId = ".$catId." order by seqNo";
    $this->db->setQuery($sql, $start, $size);
    return $this->db->loadobjectlist(); 
  }
  
  function GetNewCountByCatId($catId) {
    $sql= "select * from dh_new where catId = ".$catId;
    $this->db->setQuery($sql);
    return $this->db->num_rows(); 
  }

  function GetMaxSeqNoByCatId($catId) {
    $sql= "select max(seqNo) from dh_new where catId = ".$catId;
    $this->db->setQuery($sql);
    return $this->db->loadResult(); 
  }
  
  function GetNewListByCondition($condition, $start, $size) {
    //$sql= "select * from dh_new where title like '%$condition%' or content like '%$condition%' order by issueDate";
    $sql1= "select t1.nId as id, t1.catId, t1.title,t1.issueDate from dh_new t1 where t1.title like '%$condition%' or t1.content like '%$condition%' order by t1.seqNo";
    $sql2= "select t2.pId as id, t2.catId, t2.name as title,t2.createtime as issueDate  from dh_product t2 where t2.name like '%$condition%' or t2.description like '%$condition%' or t2.features like '%$condition%' order by t2.seqNo";
    $sql= "select * from (($sql1) union ($sql2)) tab";
    $this->db->setQuery($sql, $start, $size);
    return $this->db->loadobjectlist(); 
  }
  
  function GetNewCountByCondition($condition) {
    //$sql= "select * from dh_new where title like '%$condition%' or content like '%$condition%'";
    $sql1= "select t1.nId as id, t1.catId, t1.title from dh_new t1 where t1.title like '%$condition%' or t1.content like '%$condition%' order by t1.seqNo";
    $sql2= "select t2.pId as id, t2.catId, t2.name as title  from dh_product t2 where t2.name like '%$condition%' or t2.description like '%$condition%' or t2.features like '%$condition%' order by t2.seqNo";
    $sql= "select * from (($sql1) union ($sql2)) tab";
    $this->db->setQuery($sql);
    return $this->db->num_rows(); 
  }
  
  function GetNewById($id) {
    $sql="select * from dh_new where nId = ".$id;
    $this->db->setQuery($sql);
    return $this->db->loadobject(); 
  }

  function GetPrevNewById($catId, $id) {
    $sql= "select * from dh_new where catId = ".$catId." and nId < ".$id." order by nId desc limit 0, 1";
    $this->db->setQuery($sql);
    return $this->db->loadobject();
  }
  
  function GetNextNewById($catId, $id) {
    $sql= "select * from dh_new where catId = ".$catId." and nId > ".$id." order by nId limit 0, 1";
    $this->db->setQuery($sql);
    return $this->db->loadobject();
  }
  
  function Save($catId,$title,$issueDate,$seqNo,$seoTitle,$seoKey,$seoDescription,$content,$origin,$intro,$imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$thumbnailPath,$thumbnailAlt,$author) {
    $sql = " insert into dh_new(";
    $sql = $sql." catId,title,issueDate,seqNo,seoTitle,seoKey,seoDescription,content,origin,intro,imgPath,imgAlt,";
    $sql = $sql." putTop,isShow,isSecondShow,recom,thumbnailPath,thumbnailAlt,author,createTime ";
    $sql = $sql.") values ( ";
    $sql = $sql." $catId,'$title','$issueDate',$seqNo,";   
    $sql = $sql." '$seoTitle','$seoKey','$seoDescription','$content','$origin','$intro','".$imgPath."','$imgAlt',";
    $sql = $sql." $putTop,$isShow,$isSecondShow,$recom,'$thumbnailPath','$thumbnailAlt','$author','".date('Y-m-d H:i:s')."'";
    $sql = $sql.")";
    
    $this->db->setQuery($sql);
    $this->db->query();
  }
  
  function Update($catId, $title, $seqNo, $seoTitle,$seoKey,$seoDescription,$content,$origin, $intro,$imgPath,$imgAlt,$putTop,$isShow,$isSecondShow,$recom,$issueDate,$thumbnailPath,$thumbnailAlt,$author,$nId) {
    $sql = " update dh_new set ";
    $sql = $sql." catId = $catId,title='$title',seqNo=$seqNo,";
    $sql = $sql." seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',content='$content',";
    $sql = $sql." origin='$origin',intro='$intro',imgPath='".$imgPath."',thumbnailPath='$thumbnailPath',thumbnailAlt='$thumbnailAlt',";
    $sql = $sql." imgAlt='$imgAlt',putTop=$putTop,isShow=$isShow,isSecondShow=$isSecondShow,recom=$recom,issueDate='$issueDate',author='$author'";
    $sql = $sql." where nId=".$nId;
    
    $this->db->setQuery($sql);
    $this->db->query();
  }
  
  function Del($nId) {
    $sql = " delete from dh_new  where nId=".$nId;
      
    $this->db->setQuery($sql);
    $this->db->query();
  }
  
  function UpdateStatus($oper, $row, $nId) {
    $sql = " update dh_new set ";
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