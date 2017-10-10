<?
include_once($root."/core/dao/baseDao.php");
class OrderDao extends BaseDao {

	var $db;		
	function OrderDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
		
	function GetOrderById($id) {
		$sql= "select * from dh_order where orderId = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();
	}

	function GetOrderList($start, $size) {
		$sql= "select * from dh_order order by createTime";
		$this->db->setQuery($sql, $start, $size);
		return $this->db->loadobjectlist();	
	}
	
	function GetOrderCount() {
		$sql= "select * from dh_order";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}

	function Del($orderId) {
		$sql= "delete from dh_order where orderId = ".$orderId;
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Update($productModel, $num, $realName, $tellphone, $email, $createTime, $orderId) {
		$sql = " update dh_order set ";
		$sql = $sql." productModel='$productModel', realName ='$realName',tellphone='$tellphone',email='$email',";
		$sql = $sql." createTime=$createTime,num='$num'";
		$sql = $sql." where orderId=".$orderId;
		
		$this->db->setQuery($sql);
		return $this->db->query();
	}
	
	function Save($productModel, $realName, $tellphone, $email, $createTime, $num) {
		$sql = " insert into dh_order(";
		$sql = $sql." productModel,realName,tellphone,email,createTime,num";
		$sql = $sql.") values ( ";
		$sql = $sql." '$productModel','$realName','$tellphone','$email','$createTime','$num'";
		$sql = $sql.")";
			
		$this->db->setQuery($sql);
		return $this->db->query();
	}

}
?>