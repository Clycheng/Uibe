<?
include_once($root."/core/dao/baseDao.php");
class ProjectDao extends BaseDao {

	var $db;		
	function ProjectDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetProjectById($id) {
		$sql= "select * from dh_project where proId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetProjectList($start, $size) {
		$sql= "select * from dh_project";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetProjectCount() {
		$sql= "select * from dh_project";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($proId) {
		$sql= "delete from dh_project where proId = ".$proId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($name, $industry, $intro, $startTime, $endTime, $contact, $tellphone, $cellphone, $email, $content, $proId) {
		$sql = " update dh_project set ";
		$sql = $sql." name='$name',industry='$industry',intro='$intro',";
		$sql = $sql." startTime='$startTime',endTime='$endTime',contact='$contact',content='$content',";
		$sql = $sql." tellphone='$tellphone',cellphone='$cellphone',email='$email'";
		$sql = $sql." where proId=".$proId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($name, $industry, $intro, $startTime, $endTime, $contact, $tellphone, $cellphone, $email, $content) {
		$sql = " insert into dh_project(";
		$sql = $sql." name, industry, intro, startTime, endTime, contact, tellphone, cellphone, email, content,createtime ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$name', '$industry', '$intro', '$startTime', '$endTime', '$contact', '$tellphone', '$cellphone', '$email', '$content','".date('Y-m-d H:i:s')."'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>