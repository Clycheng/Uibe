// JavaScript Document
/*隔行变色js*/
for (i=0;i<table_color.rows.length;i++) {
	(i%2==0)?(table_color.rows(i).className = "color1"):(table_color.rows(i).className = "color2");
}
function dod(){
	document.getElementById("testId").className="overcolor";
}



//以下是 鼠标经过后的颜色
function bgover(obj){
	obj.style.backgroundColor="#fafafa";
	obj.style.color="red";
	obj.style.cursor="pointer";
}
function bgout(obj){
	obj.style.backgroundColor="";
	obj.style.color="";
}
