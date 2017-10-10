<?php

class Validator {
  
  static function checkForm() {
		if(is_array($_POST)) { 
		  foreach($_POST as $key=>$value) { 
		    if($value != "") {
		      if(self::filter($value)) {
		        throw new Exception("违法操作", 1000);
		      }
		    }
		  } 
		}
  }
  
	static function filter($param) {
	
	  $reg="(.*\s*)((<\s*[/]*\s*)|(\s*[/]*\s*>)|(<\s*[/]*\s*>)|(<\s*[/]*\s*script\s*[/]*\s*)|(<\s*[/]*\s*embed\s*[/]*\s*)|(<\s*[/]*\s*style\s*[/]*\s*)|(<\s*[/]*\s*img\s*[/]*\s*)|(<\s*[/]*\s*image\s*[/]*\s*)|(<\s*[/]*\s*frame\s*[/]*\s*)|(<\s*[/]*\s*object\s*[/]*\s*)|(<\s*[/]*\s*iframe\s*[/]*\s*)|(<\s*[/]*\s*frameset\s*[/]*\s*)|(<\s*[/]*\s*meta\s*[/]*\s*)|(<\s*[/]*\s*xml\s*[/]*\s*)|(<\s*[/]*\s*applet\s*[/]*\s*)|(<\s*[/]*\s*link\s*[/]*\s*)|(<\s*[/]*\s*onload\s*[/]*\s*)|(<\s*[/]*\s*alert\s*[/]*\s*))(.*\s*)";
	
	  return ereg($reg,$param);
	}
	
	static function isEmail($param) {
	  $reg = "^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+";  
	  if(ereg($reg,$param)) {
	    return true;
	  }
	  return false;
	}
	
	static function isNumber($param) {
	  $reg = "^([0-9]+d*)$";  
	  if(ereg($reg,$param)) {
	    return true;
	  }
	  return false;
	}
	
	static function isNotNumber($param) {
	  return !self::isNumber($param);
	}
	
	/**
	 * 参数是否为空
	 * @param $param
	 */
	static function isEmpty($param) {
	  
	  if (isset($param) && !empty($param)) {
	    return false;
	  } else {
	   return true;
	  }
	}
	
	static function isNotEmpty($param) {
	  return !self::isEmpty($param);
	}
  
	static function validLength($param, $len) {
	  if (strlen($param) > $len) {
	    return true;
	  } else {
	    return false;
	  }
	}
}

?>