<script type="text/javascript">
/*产品树展开和关闭*/
$(function(){
  var currentIndex = $.cookie('currentIndex');
  if (currentIndex!=null) {
    var $ul = $(".left_ul > li > a").eq(currentIndex).siblings("ol");
    var isShow = $.cookie('isShow');
    if (isShow != null) {
      if(isShow == 1){
    	  $ul.parent().attr("class","on");
        $ul.hide();
      }else{
    	  $ul.parent().attr("class","off");
        $ul.show();
      }
    }
	}
  
  $(".left_ul > li > a").click(function(){
    var $ul = $(this).siblings("ol");
    $.cookie('currentIndex',$(".left_ul > li > a").index(this));
    if($ul.is(":visible")){
      $(this).parent().attr("class","on");
      $ul.hide();
      $.cookie('isShow','1');
    }else{
      $(this).parent().attr("class","off");
      $ul.show();
      $.cookie('isShow','0');
    }
    window.location.href=$(this).attr("href");
    return false;
  });
});
</script>