<?
include_once($root."/core/dao/baseDao.php");
class UserDao extends BaseDao {

	var $db;		
	function UserDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetUserById($id) {
		$sql= "select * from dh_user where userId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}
	
  function GetUserByRealNameAndCertificate($realName, $certificate) {
    $sql= "select * from dh_user where realName = '$realName' and certificate='$certificate'";
    $this->db->setQuery($sql);
    return $this->db->loadobject();
  }

	function GetUserList($start, $size) {
		$sql= "select * from dh_user";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetUserCount() {
		$sql= "select * from dh_user";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($userId) {
		$sql= "delete from dh_user where userId = ".$userId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($realName, $certificate, $userType, $number, $issuedDate, $audit,$userId) {
		$sql = " update dh_user set ";
		$sql = $sql." realName='$realName',certificate='$certificate',";
		$sql = $sql." userType='$userType',number='$number',issuedDate='$issuedDate',audit='$audit'";
		$sql = $sql." where userId=".$userId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($realName, $certificate, $userType, $number, $issuedDate, $audit) {
		$sql = " insert into dh_user(";
		$sql = $sql." realName, certificate, userType, number, issuedDate, audit ";
		$sql = $sql.") values ( ";
		$sql = $sql." '$realName', '$certificate', '$userType', '$number', '$issuedDate', '$audit'";
		$sql = $sql.")";

		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>