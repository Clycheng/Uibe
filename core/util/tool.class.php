<?php
class Tool {	

	public static function convertIsDisabled($isDisabled) {
		if ($isDisabled == "1") {
			echo "禁用";
		} else {
			echo "<span style='color:#0099CC'>启用</span>";	
		}
	}	
	
	public static function convertNoIsDisabled($isDisabled) {
		if ($isDisabled == "1") {
			echo "启用";
		} else {
			echo "禁用";	
		}
	}	
	
	public static function convertIsShow($isshow) {
		if ($isshow == "1") {
			echo "显示";
		} else {
			echo "<span style='color:#0099CC'>不显示</span>";	
		}
	}	
	
	public static function convertNoIsShow($isshow) {
		if ($isshow == "1") {
			echo "不显示";
		} else {
			echo "显示";	
		}
	}	
	
	public static function convertRecom($recom) {
		if ($recom == "0") {
			echo "普通";
		} else {
			echo "<span style='color:red'>推荐</span>";	
		}
	}	
	
	public static function convertPutTop($puttop) {
		if ($puttop == "0") {
			echo "普通";
		} else {
			echo "<span style='color:red'>置顶</span>";	
		}
	}	
	
	public static function convertIsSecondShow($isSecondShow) {
		if ($isSecondShow == "0") {
			echo "普通";
		} else {
			echo "<span style='color:red'>二级页</span>";	
		}
	}	
	
	public static function convertSetIsShow($isShow) {
		if ($isShow == "0") {
			echo "普通";
		} else {
			echo "<span style='color:red'>首页</span>";	
		}
	}	
	
	public static function convertStyle($style) {	
		switch ($style) {
			case 0:
				echo "综合页面";
				break;
			case 1:
				echo "单页式";
				break;
			case 2:
				echo "产品列表式";
				break;
			case 3:
				echo "图片列表式";
				break;
			case 4:
				echo "新闻列表式";
				break;
			default:
				echo "未知页面";
				break;			
		}
	}	
	
	public static function convertStatus($status) {
		if ($status == "1") {
			echo "已查看";
		} else {
			echo "<span style='color:red'>未查看</span>";	
		}
	}	
	
	public static function convertGender($gender) {
		if ($status == "1") {
			echo "男";
		} else {
			echo "女";	
		}
	}	
	
}
?>