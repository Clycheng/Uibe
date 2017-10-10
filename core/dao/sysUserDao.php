<?
include_once($root."/core/dao/baseDao.php");
class SysUserDao extends BaseDao {

	var $db;	
	function SysUserDao(){
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	/**
	 * 根据用户ID，查询用户信息
	 */
	function GetSysUserByUserId($userId) {
		$sql= "select * from dh_sysuser where userId = ".$userId;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}

	/**
	 * 根据用户名、密码，查询用户信息
	 */
	function GetSysUserByUserName($userName) {
		$sql= "select * from dh_sysuser where userName = '".$userName."'";
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	/**
	 * 保存用户信息
	 */
	function Save($userName, $userPwd, $remark) {
		
		$sql = " insert into dh_sysuser(";
		$sql = $sql." userName,userPwd,createtime,remark ";
		$sql = $sql.") values ( ";
		$sql = $sql." '".$userName."','".md5($userPwd)."','".date('Y-m-d H:i:s')."','".$remark."'";
		$sql = $sql.")";
		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 保存用户信息
	 */
	function Del($userId) {
		
		$sql = " delete from dh_sysuser where userId=".$userId;
		$this->db->setQuery($sql);
		$this->db->query();
		
	}
	
	/**
	 * 更新用户登录信息
	 */
	function Modify($ip, $date, $userId) {
		if (is_null($userId)){
			return;
		}
		$sql="update dh_sysuser set ip='$ip', lastLoginTime='$date',times=times+1 where userId=".$userId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 更新用户信息
	 *
	 */
	function Update($userPwd, $remark, $userId) {
		if (is_null($userId)){
			return;
		}
		$sql="update dh_sysuser set userPwd='$userPwd' ,remark='$remark' where userId=".$userId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 更新用户信息
	 *
	 */
	function UpdateSysUserInfo($userName, $userPwd, $remark, $userId) {
		if (is_null($userId)){
			return;
		}
		$sql="update dh_sysuser set userName='$userName', userPwd='$userPwd' ,remark='$remark' where userId=".$userId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 更新权限
	 */
	function UpdateRights($rights,$catrights,$uId) {
		if(is_null($uId)) {
			return;
		}
		$sql = " update dh_sysuser set rights = '$rights', catrights = '$catrights' where userId=".$uId;		
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 查询所有用户信息
	 */
	function GetSysUserList($isDefaultIn, $start, $size) {
		$sql= "select * from dh_sysuser";
		if ($isDefaultIn != "" and $isDefaultIn != "1") {
			$sql = $sql." where isDefaultIn != 1";
		}
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	/**
	 * 查询所有用户总数
	 */
	function GetSysUserCount($isDefaultIn) {
		$sql= "select * from dh_sysuser";
		if ($isDefaultIn != "" and $isDefaultIn != "1") {
			$sql = $sql." where isDefaultIn != 1";
		}
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
}
?>