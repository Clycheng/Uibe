<?
function filter($param) {

	$reg="(.*\s*)((<\s*[/]*\s*)|(\s*[/]*\s*>)|(<\s*[/]*\s*>)|(<\s*[/]*\s*script\s*[/]*\s*)|(<\s*[/]*\s*embed\s*[/]*\s*)|(<\s*[/]*\s*style\s*[/]*\s*)|(<\s*[/]*\s*img\s*[/]*\s*)|(<\s*[/]*\s*image\s*[/]*\s*)|(<\s*[/]*\s*frame\s*[/]*\s*)|(<\s*[/]*\s*object\s*[/]*\s*)|(<\s*[/]*\s*iframe\s*[/]*\s*)|(<\s*[/]*\s*frameset\s*[/]*\s*)|(<\s*[/]*\s*meta\s*[/]*\s*)|(<\s*[/]*\s*xml\s*[/]*\s*)|(<\s*[/]*\s*applet\s*[/]*\s*)|(<\s*[/]*\s*link\s*[/]*\s*)|(<\s*[/]*\s*onload\s*[/]*\s*)|(<\s*[/]*\s*alert\s*[/]*\s*))(.*\s*)";

	return ereg($reg,$param);
}

function isEmail($param) {
	$reg = "^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+";	
	if(ereg($reg,$param)) {
		return true;
	}
	return false;
}

function isNumber($param) {
	$reg = "^([0-9]+d*)$";	
	if(ereg($reg,$param)) {
		return true;
	}
	return false;
}

function isNotNumber($param) {
	return !isNumber($param);
}

?>