<?php
//php连接access数据库类代码;
//2011-1-07;
//php连接access数据库类;
//编写liwqbj;   有个问题utf8不能实现。


class Access//Access数据库操作类
{
	var $databasepath; //连接数据库的路径;
	var $constr;
	var $dbusername;//连接数据库的用户名;
	var $dbpassword;//连接数据库的密码;
	var $link;
	function Access($databasepath,$dbusername,$dbpassword)//构造函数
	{
	$this->databasepath=$databasepath;
	$this->username=$dbusername;
	$this->password=$dbpassword;
	$this->connect();
	}
	
	//数据库连接函数
	function connect()
	{
		$this->constr="DRIVER={Microsoft Access Driver (*.mdb)};DBQ=".realpath($this->databasepath); 
		$this->link=odbc_connect($this->constr,$this->username,$this->password,SQL_CUR_USE_ODBC);
		return $this->link;
		//if($this->link){echo "恭喜你,数据库连接成功!";}else{echo "数据库连接失败!";}
	}
	
	//送一个查询字符串到数据库中
	function query($sql)
	{
	return @odbc_exec($this->link,$sql);
	}

	//从access数据库中返回一个数组
	function first_array($sql)
	{
	return @odbc_fetch_array($this->query($sql));
	}
	
	
	//从access数据库中返回一个二维数组
	function loadarraylist($sql)
	{
		$rt = $this->query($sql);
		while($item = @odbc_fetch_array($rt,OBDC_ASSOC)){
			$rs[] = $item;
		}
		if(is_array($rs)){
			return $rs;
		}else{
			return array();
		}
	}


	function fetch_row($query)//返回记录中的一行
	{
	return odbc_fetch_row($this->query($query));
	}

	function total_num($sql)//取得记录总数
	{
	return odbc_num_rows($this->query($sql));
	}

	function close()//关闭数据库连接函数
	{ 
	odbc_close($this->link);
	}
	
	function insert($table,$field)//插入记录函数
     {
         $temp=explode(',',$field);
         $ins='';
         for ($i=0;$i<count($temp);$i++)
         {
             $ins.="'".$_POST[$temp[$i]]."',";
         }
         $ins=substr($ins,0,-1);
         $sql="INSERT INTO ".$table." (".$field.") VALUES (".$ins.")";
         $this->query($sql);//调用query()方法
     }


	function getinfo($table,$field,$id,$colnum)//取得当条记录详细信息
	{
	$sql="SELECT * FROM ".$table." WHERE ".$field."=".$id."";
	$query=$this->query($sql);
	if($this->fetch_row($query))
	{
	for ($i=1;$i<$colnum;$i++)
	{
	$info[$i]=odbc_result($query,$i);
	}
	}
	return $info;
	}

	function getlist($table,$field,$colnum,$condition,$sort="ORDER BY id DESC")//取得记录列表 
	{
	$sql="SELECT * FROM ".$table." ".$condition." ".$sort;
	$query=$this->query($sql);
	$i=0;
	while ($this->fetch_row($query)) 
	{
	$recordlist[$i]=getinfo($table,$field,odbc_result($query,1),$colnum);
	$i++;
	}
	return $recordlist;
	}

	function getfieldlist($table,$field,$fieldnum,$condition="",$sort="")//取得记录列表
	{
	$sql="SELECT ".$field." FROM ".$table." ".$condition." ".$sort;
	$query=$this->query($sql);
	$i=0;
	while ($this->fetch_row($query)) 
	{
	for ($j=0;$j<$fieldnum;$j++)
	{
	$info[$j]=odbc_result($query,$j+1);
	} 
	$rdlist[$i]=$info;
	$i++;
	}
	return $rdlist;
	}

	function updateinfo($table,$field,$id,$set)//更新记录函数
	{
	$sql="UPDATE ".$table." SET ".$set." WHERE ".$field."=".$id;
	$this->query($sql);
	}

	function deleteinfo($table,$field,$id)//删除记录函数
	{
	$sql="DELETE FROM ".$table." WHERE ".$field."=".$id;
	$this->query($sql);
	}

	function deleterecord($table,$condition)//删除指定条件的记录函数
	{
	$sql="DELETE FROM ".$table." WHERE ".$condition;
	$this->query($sql);
	}

	function getcondrecord($table,$condition="")//取得指定条件的记录数函数
	{
	$sql="SELECT COUNT(*) AS num FROM ".$table." ".$condition;
	$query=$this->query($sql);
	$this->fetch_row($query);
	$num=odbc_result($query,1);
	return $num; 
	}
}
?>