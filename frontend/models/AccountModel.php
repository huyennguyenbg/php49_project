<?php 
	trait AccountModel{
		//dang ky tai khoan
		public function modelRegister(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//kiem tra xem email da ton tai chua, neu chua ton tai thi insert vao csdl
			$conn = Connection::getInstance();
			$queryEmail = $conn->query("select email from customers where email='$email'");
			$checkEmail = $queryEmail->rowCount();
			if($checkEmail == 0){
				//insert ban ghi vao csdl
				$conn->query("insert into customers set name='$name',email='$email',phone='$phone',address='$address',password='$password'");
				header("location:index.php?controller=account&action=notify&message=registerSuccess");
			}else{
				header("location:index.php?controller=account&action=notify&message=emailExists");
			}
		}
		//Login
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$password = md5($password);
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select id, email, password from customers where email='$email'");
			$result = $query->fetch();
			if(isset($result->email)){
				if($result->password == $password){
					//dang nhap thanh cong
					$_SESSION["customer_email"] = $email;
					$_SESSION["customer_id"] = $result->id;
					header("location:index.php");
				}				
			}else
				header("location:index.php?controller=account&action=login");
		}
	}
 ?>