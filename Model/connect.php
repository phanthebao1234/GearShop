<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=sql6.freesqldatabase.com;dbname=sql6512565';
		$user='sql6512565';
		$pass='WBWuXZmumB';
		$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	}

//	lấy đúng 1 ID nên lấy fetch vô luôn
	public function getInstance($select)
	{
		$results=$this->db->query($select);
		// echo $select;
		$result=$results->fetch();
		return $result;
	}
	
//	Lấy nhiều rows
	public function getList($select)
	{
		$results=$this->db->query($select);
		// echo $results;
		return($results);
	}

	public function getexec($query)
	{
		$results=$this->db->exec($query);
		// echo $results;
		return($results);
	}
	// phương thức chứa preapre để thực thi câu lệnh: select, insert, update, delete...
	public function getpreapre($query)
	{
		$results=$this->db->prepare($query);
		// echo $results;
		return($results);
	}
	
}
?>