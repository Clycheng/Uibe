<?
	//登录记录语句
	$rowlog = ManagerFactory::getHistoryManager()->GetLastLoginHistory();
	if (is_object($rowlog)) {
?>
最近登录日期： <?=$rowlog->date?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
管理员：<?=$rowlog->user;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
IP：<?=$rowlog->ip;?>&nbsp;&nbsp;&nbsp;
<a href="<?="/admin_site_manage/modules/history/list.php"?>" class="grey">查看全部记录</a>
<?
	}
?>