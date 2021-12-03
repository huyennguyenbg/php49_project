<?php 
	//load file model
	include "models/HomeModel.php";
	class HomeController extends Controller{
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//load view
			$this->loadView("HomeView.php");
		}
	}
 ?>