<?
include_once($root."/core/dao/baseDao.php");
class CourseDao extends BaseDao {

	var $db;		
	function CourseDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetCourseById($id) {
		$sql= "select * from dh_course where courseId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

  function GetCourseByUserId($userId) {
    $sql= "select * from dh_course where userId = $userId";
    $this->db->setQuery($sql);
    return $this->db->loadobjectlist();
  }
  
	function GetCourseListByUserId($userId, $start, $size) {
		$sql= "select * from dh_course where userId = '$userId'";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetCourseCountByUserId($userId) {
		$sql= "select * from dh_course where userId = '$userId'";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($courseId) {
		$sql= "delete from dh_course where courseId = ".$courseId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($name, $level, $userId, $seqNo, $courseId) {
		$sql = " update dh_course set ";
		$sql = $sql." name='$name',level='$level', userId='$userId', seqNo='$seqNo'";
		$sql = $sql." where courseId=".$courseId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($name, $level, $userId, $seqNo) {
		$sql = " insert into dh_course(";
		$sql = $sql." name, level, userId, seqNo ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$name', '$level', '$userId', '$seqNo'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>