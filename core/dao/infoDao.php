<?
include_once($root."/core/dao/baseDao.php");
class InfoDao extends BaseDao {

	var $db;		
	function InfoDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetInfoObjectByCatId($catId) {
		$sql= "select * from dh_info where catId=".$catId." order by seqNo limit 0,1";
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	/**
	 * 根据InfoId查询单页信息
	 */
	function GetInfoByInfoId($infoId) {
		$sql= "select * from dh_info where infoId=".$infoId;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	/**
	 * 分页查询单页信息
	 */
	function GetInfoListByCatId($catId, $start, $size) {
		$sql= "select * from dh_info where catId=".$catId." order by infoId desc";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	/**
	 * 查询所有单页总数
	 */
	function GetInfoCountByCatId($catId) {
		$sql= "select * from dh_info where catId=".$catId;
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

  function GetMaxSeqNoByCatId($catId) {
    $sql= "select max(seqNo) from dh_info where catId = ".$catId;
    $this->db->setQuery($sql);
    return $this->db->loadResult(); 
  }
	
	function Save($catId, $title ,$imgPath, $seqNo, $seoTitle, $seoKey, $seoDescription, $content,$putTop, $source, $author, $issueDate) {
		$sql = " insert into dh_info(";
		$sql = $sql." catId,title,imgPath,createTime,seqNo,seoTitle,seoKey,seoDescription,content,putTop, source, author, issueDate ";
		$sql = $sql.") values ( ";
		$sql = $sql." $catId,'$title','$imgPath','".date('Y-m-d H:i:s')."','$seqNo',";		
    $sql = $sql." '$seoTitle','$seoKey','$seoDescription','$content',";
    $sql = $sql." '$putTop','$source','$author','$issueDate'";
		$sql = $sql.")";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 更新单页信息
	 */
	function Update($catId, $title,$imgPath, $seqNo, $seoTitle, $seoKey, $seoDescription, $content,$putTop, $source, $author, $issueDate, $infoId) {
		
		$sql = " update dh_info set ";
		$sql = $sql." catId = $catId,title='$title',imgPath='$imgPath',seqNo=$seqNo,";
    $sql = $sql." seoTitle='$seoTitle',seoKey='$seoKey',seoDescription='$seoDescription',content='$content',";
    $sql = $sql." putTop='$putTop',source='$source',author='$author',issueDate='$issueDate'";
		$sql = $sql." where infoId=".$infoId;
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 删除单页信息
	 */
  function Del($infoId) {
		$sql= "delete from dh_info where infoId=".$infoId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
}
?>