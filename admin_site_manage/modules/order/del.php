<? 
	session_start();
	include_once("../../../core/common/globalFilter.php");
	include_once("../common/session.php");
	
	if ($action == "del") {
		try {
			
			$orderManager = ManagerFactory::getOrderManager();
			$row = $orderManager->GetOrderById($orderId);
			
			if ($row == "") {
				throw new Exception("该订单信息不存在！",10001);
			}
			
			$orderManager->Del($orderId);
			
			JsUtil::Alert("删除成功！");
			JsUtil::gotoliwqbj("list.php");
			
		} catch(Exception $e) {
			//捕获异常
			if ($e->getCode() == 10001) {
				JsUtil::Alert($e->getMessage());
			} else {
				JsUtil::Alert("删除失败！");
			}
			JsUtil::Back(-1);
		}
		
	} else {
		JsUtil::Back(-1);
	}
			
?>