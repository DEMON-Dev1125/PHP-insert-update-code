<?php
class Database {

	private $host = "localhost";
	private $user = "root";  
	private $pass = ""; 
	private $db = "johncrane";  
	public $con;
	
	public function openDb() {
			$this->con = mysqli_connect($this->host, $this->user, $this->pass,$this->db);
			mysqli_set_charset($this->con,"utf8mb4");
			if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
	}
	
	public function closeDb() {
		mysqli_close($this->con);
	}
}
define("MAX_LIMIT", 150);
?>