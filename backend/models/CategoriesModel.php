<?php 
	trait CategoriesModel{
		//ham lay danh sach cac ban ghi co phan trang
		public function modelRead($recordPerPage){
			//lay bien p truyen tu url
			$p = isset($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 0;			
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc limit $from,$recordPerPage");
			//lay toan bo ket qua tra ve
			$result = $query->fetchAll();			
			//---
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord($recordPerPage){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from categories where parent_id = 0");
			//tra ve tong so ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id=$id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		//lay cac danh muc con
		public function modelReadSubCategories($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = $category_id order by id desc");
			//tra ve mot ban ghi
			return $query->fetchAll();
		}
		//update ban ghi
		public function modelUpdate($id){
			$name = $_POST["name"];
			$parent_id = $_POST["parent_id"];
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("update categories set name='$name', parent_id=$parent_id where id=$id");
		}
		//create bang hi
		public function modelCreate(){
			$name = $_POST["name"];
			$parent_id = $_POST["parent_id"];
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("insert into categories set name='$name', parent_id=$parent_id");
		}
		//xoa ban ghi
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$conn->query("delete from categories where id=$id");
		}
		//liet ke cac danh muc (cho chu nang create, update)
		public function modelListCategories($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = 0 and id <> $category_id order by id desc");
			//tra ve mot ban ghi
			return $query->fetchAll();
		}
	}
 ?>