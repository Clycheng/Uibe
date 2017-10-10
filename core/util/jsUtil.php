<?php
class JsUtil
{
    function JsUtil(){}
    
   /**
    *返回上一级
    *@param  step  
    * */
    static function Back($step = -1)
    {
        $msg = "history.go(".$step.");";
        self::_Write($msg);
        exit;
    }

    /**
     * 弹出信息
     * @param $msg 弹出信息的内容
     */
    static function Alert($msg)
    {
        $msg = "alert('".$msg."');";
        self::_Write($msg);
    }
    /**
     * дjs
     * @param $msg
     */
    static function _Write($msg)
    {
        echo "<script language=javascript>";
        echo $msg;
        echo "</script>";
    }
    /**
     *刷新本页面
     */
    static function Reload()
    {
        $msg = "location.reload();";
        self::_Write($msg);
        exit;
    }
    /**
     * 刷新子页面
     */
    static function ReloadOpener()
    {
        $msg = "if (opener)    opener.location.reload();";
        self::_Write($msg);
     }

    /**
     * 跳转
     * @param $url 定向的位置
     */
    static function Goto_($url)
    {
        $msg = "location.href = '$url';";
        self::_Write($msg);
        exit;
    }
    /**
     * 框架跳转
     * @param $url 定向的位置
     */
	static function Gotolwq($url)
    {
        $msg = "parent.frames('leftFrame').location.href = '$url';";
        self::_Write($msg);
        exit;
    }
	
	static function gotoliwqbj($url)
    {
        $msg = "location.href = '$url';";
        self::_Write($msg);
        exit;
    }
	
	static function gotozzl($url)
    {
        $msg = "parent.frames('main').location.href = '$url';";
        self::_Write($msg);
        exit;
    }
	
	/**
	*弹出层
	*/
	static function alert_ceng($msg,$url){
		echo "<div id='liwqbj_box' style=' position:absolute; margin-top:0px; margin-left:150px; width:248px; height:auto; z-index:2000; overflow:hidden;'>
  <div style='border:#cecece solid 1px; background:#f3f4f4; color:#036; font-size:13px; line-height:150%;'>
    <table width='100%' height='100' border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td height='29' align='left' style='background:url(/admin/images/bj_fudong.jpg) no-repeat; color:#FFFFFF;'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td width='86%'>&nbsp;&nbsp;&nbsp;&nbsp;系统提示信息</td>
            <td width='14%' align='center' valign='middle'></td>
          </tr>
        </table></td>
      </tr>
        <tr>
          <td valign='top'>
		  <table width='100%' border='0' cellspacing='0' cellpadding='0' style='margin-top:10px;'>
            <tr>
              <td height='20' colspan='2' align='center' style='font-size:14px;'>
			  <span id='lwq'></span>
			  </td>
            </tr>
            <tr>
              <td height='40' colspan='2' align='center' style='font-size:14px;'>$msg</td>
            </tr>
            <tr>
              <td height='35' colspan='2' align='center'><input type='button' name='Submit' value='确定' onclick=\"document.getElementById('liwqbj_box').style.visibility='hidden';\" style='background:url(/admin/images/bjanniu.jpg) no-repeat; width:46px; height:30px; line-height:30px; color:#FFFFFF; text-align:center; border:0px;'/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='button' name='Submit2' value='取消' onclick=\"document.getElementById('liwqbj_box').style.visibility='hidden';\" style='background:url(/admin/images/bjanniu.jpg) no-repeat; width:46px; height:30px; line-height:30px; color:#FFFFFF; text-align:center; border:0px;'/></td>
            </tr>
          </table>
		  </td>
        </tr>
    </table>
  </div>
</div>
<script language='javascript'>
liwbj_wh();
static function liwbj_wh() {
if(screen.width==1024){
var gao=416;
var kuan=760;
}else if(screen.width==1366){
var gao=416;
var kuan=920;
}else if(screen.width==1280){
var gao=416;
var kuan=860;
}else if(screen.width==1440){
var gao=500;
var kuan=960;
}else{
var gao=416;
var kuan=920;
}
document.getElementById('liwqbj_box').style.top=document.documentElement.scrollTop+document.documentElement.clientHeight-gao+'px';
document.getElementById('liwqbj_box').style.left=document.documentElement.scrollLeft+document.documentElement.clientWidth-kuan+'px';
setTimeout('liwbj_wh();',80);
}
</script>
<script language='javascript'> 
var bar=0 ;
count() ;
static function count(){ 
    bar=bar+2;
    	document.getElementById('lwq').innerHTML = bar+'%' ;
    if (bar<100){
        setTimeout('count()',50);
    }else{
        document.getElementById('liwqbj_box').style.visibility='hidden';
		 window.location = '$url';
    } 
}
</script>
";
}
	/**
	*弹出对话框
	*/
	static function Confirm($string)
	{
		$msg = "confirm('".$string."');";
		self::_Write($msg);
	}
	
	static function Confirm2()	{
		$msg = "if (!confirm('此信息是付费信息,继续？')){ window.close();}";
		self::_Write($msg);
	}
	
	

    /**
     *关闭
     */
     static function Close()
     {
        $msg = "window.close()";
        self::_Write($msg);
        exit;
     }
    /**
     * 提交
     * @param $frm 表单的id
     */
    static function Submit($frm)
    {
        $msg = $frm.".submit();";
        self::_Write($msg);
    }
}
?>