<?
	if (!is_null($one) &&	filter($one)){ 
		echo "操作失败！";
		exit;
	}
	if (!is_null($two) &&	filter($two)) {
		echo "操作失败！";
		exit;
	}
	if (!is_null($id) && filter($id)) {
		echo "操作失败！";
		exit;
	}
	if (!is_null($nId) && filter($nId)) {
		echo "操作失败！";
		exit;
	}
	if (!is_null($pId) && filter($pId)) {
		echo "操作失败！";
		exit;
	}
	if (!is_null($currentPage) && filter($currentPage)) {
		echo "操作失败！";
		exit;
	}
  if (!is_null($s) && filter($s)) {
    echo "操作失败！";
    exit;
  }
  if (!is_null($p) && filter($p)) {
    echo "操作失败！";
    exit;
  }
	if (!is_null($email) && filter($email)) {
		echo "操作失败！";
		exit;
	}
	if (!is_null($one) &&	isNotNumber($one)) {
		echo "请求的参数格式不正确！";
		exit;
	}
	if (!is_null($two) &&	isNotNumber($two)) {
		echo "请求的参数格式不正确！";
		exit;
	}
	if (!is_null($id) && isNotNumber($id)) {
		echo "请求的参数格式不正确！";
		exit;
	}
?>