// JavaScript Document
//以下是全选
function checkall(obj){
	var tagname = document.getElementsByTagName("input");
			for(var i=0;i<tagname.length;i++){
					if(!tagname[i].checked){
						tagname[i].checked="true";}
			}
}//end function
function checkdel(obj){
	var tagname = document.getElementsByTagName("input");
	for(var d=0;d<tagname.length;d++){
		if(tagname[d].checked){
			tagname[d].checked="";}
		}
	}//end function
	
function check()
{
var checkflag = "false";
	var nn =document.form1.item("list");
for(i=0;i<nn.length;i++){
if(document.form0.list[i].checked == true){
checkflag=false;
}
}
if (checkflag=="false"){ 
alert("请选择要删除的列表！");
return false;
}
}
//以下是 



