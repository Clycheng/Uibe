<?
include_once($root."/core/dao/baseDao.php");
class HistoryDao extends BaseDao {

	var $db;	
	function HistoryDao(){
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	/**
	 * 添加历史日志
	 */
	function Save($date, $ip, $userName) {
		$sql="insert into dh_history(`date`,`ip`,`user`) values('$date','$ip','$userName')";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	/**
	 * 添加历史日志
	 */
	function GetLastLoginHistory() {
		$sql="select * from dh_history where id=(select id from dh_history order by id desc limit 1,1)";
		$this->db->setQuery($sql);
		return $this->db->loadObject();
	}
	
	/**
	 * 查询历史日志
	 */
	function GetLoginHistoryList($start, $size) {
		$sql="select * from dh_history order by id desc";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadObjectList();
	}
	
	/**
	 * 统计历史日志
	 */
	function GetLoginHistoryCount() {
		$sql="select * from dh_history order by id desc";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	/**
	 * 删除历史日志
	 */
	function Del($id) {
		$sql="delete from dh_history where id in ($id)";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
}
?>