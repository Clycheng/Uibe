<?
include_once($root."/core/dao/baseDao.php");
class WebConfigDao extends BaseDao {

	var $db;		
	function WebConfigDao() {
		parent::BaseDao();
		$this->db = parent::getDB();
	}
	
	function GetWebConfigList($index, $limit) {
		$sql= "select * from dh_webconfig";
		$this->db->setQuery($sql, $index, $limit);
		return $this->db->loadobjectlist();	
	}
	
	function GetWebConfigCount() {
		$sql= "select * from dh_webconfig";
		$this->db->setQuery($sql);
		return $this->db->num_rows();	
	}
	
	function GetWebConfigById($id) {
		$sql= "select * from dh_webconfig where wid = ".$id;
		$this->db->setQuery($sql);
		return $this->db->loadobject();	
	}
	
	function UpdateStatus($oper, $isDisabled, $wId) {
		if ($oper == "isDisabled") {
			$sql = " update dh_webconfig set ";
			
			if ($isDisabled == "0") {
				$sql = $sql." isDisabled=1";
			} else {
				$sql = $sql." isDisabled=0";
			}
				
			$sql = $sql." where wId=".$wId;
			
			$this->db->setQuery($sql);
			$this->db->query();		
		}		
	}
	
	function Save($name,$qq, $imgPath, $address, $serviceTel, $tellphone, $cellphone, $fax, $contact, $email, $url, $putOnRecords, $seoTitle, $seoKey, $seoDescription, $microblog, $copyright, $zipCode, $seqNo) {
		$sql = " insert into dh_webconfig(";
		$sql = $sql." name,imgPath,address,serviceTel,tellphone,cellphone,fax,contact,email,";
		$sql = $sql." url,putOnRecords,seoTitle,seoKey,";
		$sql = $sql." seoDescription,microblog,copyright, zipCode, seqNo,qq ";		
		$sql = $sql.") values ( ";
		$sql = $sql." '$name','$imgPath','$address','$serviceTel',$tellphone','$cellphone','$fax','$contact','$email',";
		$sql = $sql." '$url','$putOnRecords','$seoTitle','$seoKey',";
		$sql = $sql." '$seoDescription','$microblog','$copyright', '$zipCode', '$seqNo','$qq'";
		$sql = $sql.")";
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Update($name,$qq, $imgPath, $address, $serviceTel, $tellphone, $cellphone, $fax, $contact, $email, $url, $putOnRecords, $seoTitle, $seoKey, $seoDescription, $microblog, $copyright, $zipCode, $seqNo, $wId) {
		$sql = " update dh_webconfig set ";
		$sql = $sql." name='$name',qq='$qq',imgPath='$imgPath',address='$address',serviceTel='$serviceTel',tellphone='$tellphone',cellphone='$cellphone',fax='$fax',contact='$contact',email='$email',";
		$sql = $sql." url='$url',putOnRecords='$putOnRecords',seoTitle='$seoTitle',seoKey='$seoKey',";
		$sql = $sql." seoDescription='$seoDescription',microblog='$microblog',copyright='$copyright', zipCode='$zipCode', seqNo='$seqNo'";
		$sql = $sql." where wId=".$wId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
	
	function Del($wId) {
		$sql = " delete from dh_webconfig where wId=".$wId;
		$this->db->setQuery($sql);
		$this->db->query();
	}
}
?>