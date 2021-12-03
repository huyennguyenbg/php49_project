<?php 
	include "models/AccountModel.php";
	class AccountController extends Controller{
		use AccountModel;
		//dang ky thanh vien
		public function register(){
			$this->loadView("AccountRegisterView.php");
		}		
		//khi an nut submit register
		public function registerPost(){
			$this->modelRegister();			
		}
		//thong bao
		public function notify(){
			$this->loadView("AccountNotifyView.php");
		}
		//dang nhap
		public function login(){
			$this->loadView("AccountLoginView.php");
		}
		//dang nhap an nut submit
		public function loginPost(){
			$this->modelLogin();
		}
		//dang xuat
		public function logout(){
			unset($_SESSION["customer_email"]);
			header("location:index.php?controller=account&action=login");
		}
	}
 ?>