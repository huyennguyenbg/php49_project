<?php 
	//connection
	class Connection{
		public static function getInstance(){
			$conn = new PDO("mysql:hostname=localhost;dbname=php49_project","root","");
			//lay du lieu theo kieu unicode
			$conn->exec("set names utf8");
			//mac dinh duyet ban ghi theo kieu object
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $conn;
		}
	}
 ?>