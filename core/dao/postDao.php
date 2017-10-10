<?
include_once($root."/core/dao/baseDao.php");
class PostDao extends BaseDao {

	var $db;		
	function PostDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetPostById($id) {
		$sql= "select * from dh_post where postId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetPostList($start, $size) {
		$sql= "select * from dh_post";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetPostCount() {
		$sql= "select * from dh_post";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($postId) {
		$sql= "delete from dh_post where postId = ".$postId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($name, $nature, $industry, $scale, $post, $num, $startTime, $endTime, $education, $contact, $tellphone, $remark, $postId) {
		$sql = " update dh_post set ";
		$sql = $sql." name='$name',nature='$nature',industry='$industry',scale='$scale',post='$post',";
		$sql = $sql." num='$num',startTime='$startTime',endTime='$endTime',education='$education',";
		$sql = $sql." contact='$contact',tellphone='$tellphone',remark='$remark'";
		$sql = $sql." where postId=".$postId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($name, $nature, $industry, $scale, $post, $num, $startTime, $endTime, $education, $contact, $tellphone, $remark) {
		$sql = " insert into dh_post(";
		$sql = $sql." name, nature, industry, scale, post, num, startTime, endTime, education, contact, tellphone, remark,createtime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$name', '$nature', '$industry', '$scale', '$post', '$num', '$startTime', '$endTime', '$education', '$contact', '$tellphone', '$remark','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>