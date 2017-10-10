<?
include_once($root."/core/dao/baseDao.php");
class JobDao extends BaseDao {

	var $db;		
	function JobDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetJobById($id) {
		$sql= "select * from dh_job where jobId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetJobList($start, $size) {
		$sql= "select * from dh_job";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetJobCount() {
		$sql= "select * from dh_job";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($jobId) {
		$sql= "delete from dh_job where jobId = ".$jobId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($name, $gender,$age, $education,$post,$nature, $evaluate, $industry,$pay,$tellphone,$remark, $jobId) {
		$sql = " update dh_job set ";
		$sql = $sql." name = '$name',gender='$gender',age='$age',',education='$education',pay='$pay',tellphone='$tellphone',";
		$sql = $sql." post='$post',nature='$nature',evaluate='$evaluate', industry= '$industry',remark='$remark'";
		$sql = $sql." where jobId=".$jobId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($name, $gender, $age,$education,$post,$nature, $evaluate, $industry,$pay,$tellphone,$remark) {
		$sql = " insert into dh_job(";
		$sql = $sql." name, gender,age, education,post,nature, evaluate, industry,pay,tellphone,remark,createtime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$name', '$gender','$age', '$education','$post','$nature', '$evaluate', '$industry','$pay','$tellphone','$remark','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>