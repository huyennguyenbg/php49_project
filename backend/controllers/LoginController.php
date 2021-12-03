<?php 
	//load model
	include "models/LoginModel.php";	
	class LoginController extends Controller{
		//ham tao de kiem tra dang nhap
		// public function __construct(){
		// 	$this->authentication();
		// }
		//su dung class model
		use LoginModel;
		public function index(){
			$this->loadView("LoginView.php");
		}
		//khi an nut submit
		public function login(){
			//goi ham modelLogin trong model
			$this->modelLogin();
			//quay lai trang index
			header("location:index.php");
		}
		//dang xuat
		public function logout(){
			//huy session
			unset($_SESSION["email"]);
			header("location:index.php");
		}
	}
 ?>