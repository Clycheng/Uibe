<?php
class liwqbjindex{
	var $db;
	var $js;
	var $liwqbj;
	function liwqbjindex(){
		global $db; 
		global $js;
		global $liwqbj; 
		global $_REQUEST;
		$this->db = $db;
		$this->js = $js;
		$this->liwqbj = $liwqbj;
	}
	//读取网站信息；底部，关于我们....；
	function jibenxinxi($ttslwq){
		$query = "SELECT * FROM lwq_xinxi";
		$this->db->setQuery($query);
		$xinxi = $this->db->loadObject();
		return stripslashes($xinxi->$ttslwq);
	}
	function aboutfor($zid){
		$query = "SELECT * FROM news where ziid = $zid";	
		$this->db->setQuery($query);
		$row = $this->db->loadObjectlist();
		foreach($row as $rs){
			$title .= "menu1.addItem('{$rs->title}','about.php?id={$rs->id}');";	
		}
		return $title;
	}
	function newslist($zid,$list,$url){
		$query = "select * from news_zilei where fuid = $zid";
		$this->db->setQuery($query);
		$row = $this->db->loadObjectlist();
		foreach($row as $rs){
			$title .= "menu{$list}.addItem('{$rs->zititle}','{$url}?zid={$rs->id}');";	
		}
		return $title;
	}
	function index_news(){
		$sql = "select a.*,b.zititle from news a left join news_zilei b on a.ziid = b.id where b.fuid = 2 order by a.px desc,a.times desc limit 7";
		$this->db->setquery($sql);
		$oz = $this->db->loadobjectlist();
		foreach($oz as $rs){
		   $body .= "<li><a href=\"news_list.php?id={$rs->id}\">".$this->liwqbj->liwqbj_str($rs->title,13,0,'UTF-8')."</a><p>[".date("Y-m-d",$rs->times)."]</p></li>";
		}
		return $body;
	}
	
	function index_news_now(){
		$sql = "select a.*,b.zititle from news a left join news_zilei b on a.ziid = b.id where b.fuid = 2 and a.zhanshi = 1 order by a.px desc,a.times desc limit 1";
		$this->db->setquery($sql);
		$oz = $this->db->loadobject();
		   return "<span><a href=\"news_list.php?id={$oz->id}\"><img src=\"{$oz->image}\" width=\"130\" height=\"97\" /></a>".$this->liwqbj->liwqbj_str($this->liwqbj->liwqbj_html(stripslashes($oz->type1)),35,0,'UTF-8')."</span>";
	}
	
	
	function index_engineering(){
		$sql = "select a.*,b.zititle from news a left join news_zilei b on a.ziid = b.id where b.fuid = 8 and a.zhanshi = 1 order by a.px desc,a.times desc limit 3";
		$this->db->setquery($sql);
		$eng = $this->db->loadobjectlist();
		foreach($eng as $rs){
			$body .= "<ul>
                    	<img src=\"{$rs->image}\" width=\"150\" height=\"112\" />
                        <dd>".$this->liwqbj->liwqbj_strlwq($rs->title,5,0,'UTF-8')."</dd>
                        <li>建筑面积：{$rs->pinpai}</li>
                        <li>开工日期：{$rs->toptimes}</li>
                        <li>竣工日期：{$rs->bottomtimes}</li>
                        <li style=\"background:none;\">".$this->liwqbj->liwqbj_str($this->liwqbj->liwqbj_html(stripslashes($rs->type1)),60,0,'UTF-8')."<a href=\"engineering_list.php?id={$rs->id}\">[更多]</a></li>
                    </ul>";
		}
		return $body;
	}
	
	function thienew(){
		$sql = "select a.*,b.zititle from news a left join news_zilei b on a.ziid = b.id where b.fuid = 20 and a.zhanshi = 1 order by a.px desc,a.times desc";
		$this->db->setquery($sql);
		$new = $this->db->loadobjectlist();
		foreach($new as $rs){
			$body .= "<td width=\"185\"><a href=\"thienew_list.php?id={$rs->image}\"><img src=\"{$rs->image}\" width=\"150\" height=\"110\" /></a></td>";	
		}
		return $body;
	}
}
?>