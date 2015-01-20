<?php
class databaseConnect{

	private $con , $state;

	public function __construct(){
		$this->connectDatabase();
	}

	private function connectDatabase(){
		$this->con = mysql_connect( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS );
		if (!$this->con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db(SAE_MYSQL_DB , $this->con);
	}

	public function addOneRecord($name, $tel, $zhuanye, $home, $dpm){

		$name = mysql_real_escape_string($name);
		$tel = mysql_real_escape_string($tel);
		$zhuanye = mysql_real_escape_string($zhuanye);
		$home = mysql_real_escape_string($home);
		$dpm = mysql_real_escape_string($dpm);

		$sql = "INSERT INTO list(name,tel,zhuanye,home,dpm) VALUES('$name','$tel','$zhuanye','$home','$dpm')";
		return mysql_query($sql);

	}

	public function getList($page, $perpage){
		$limitstr = "{($page-1)*$perpage}" . "," . "$perpage";
		$sql = "SELECT * FROM list ORDER BY id DESC LIMIT $limitstr";
		$res = mysql_query($sql);
		return mysql_fetch_array($res);
	}

	public function delOneRecord($id){
		$sql = "DELETE FROM list WHERE id=$id";
		return mysql_query($sql);
	}

}
?>