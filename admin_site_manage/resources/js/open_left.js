// JavaScript Document
/*打开、关闭左边管理导航菜单*/
function preloadImg(src)
{
	var img=new Image();
	img.src=src
}
preloadImg("resources/images/topmuen_03.jpg");

var displayBar=true;
function switchBar(obj)
{
	if (displayBar)
	{
		parent.frame2.cols="0,*";
		displayBar=false;
		obj.src="resources/images/topmuen_03.jpg";
		obj.title="打开左边管理导航菜单";
	}
	else{
		parent.frame2.cols="210,*";
		displayBar=true;
		obj.src="resources/images/topmuen_03.jpg";
		obj.title="关闭左边管理导航菜单";
	}
}
