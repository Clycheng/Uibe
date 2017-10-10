<div class="banner">
	<div id="kinMaxShow">
	  <?
	  $partnerManager = ManagerFactory::getPartnerManager();
	  $list = $partnerManager->GetPartnerList(23);
	  
	  foreach ($list as $row) {
	  ?>
    <div>
      <img src="/<?=$row->imgPath?>"  width="1000" height="311"/>
      <!--如果需要附加内容在焦点图内部 需要用一个div包裹起来，如下面标红div所示，否则kinMaxShow会解析混乱-->
      <div>
        <img class="sub_1_1" src="/<?=$row->imgPath?>"  width="1000" height="311"/>
      </div>
    </div>
	  <?
     }
	  ?>
	</div>
</div>