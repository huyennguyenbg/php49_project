<?php 
	include "models/HomeModel.php";
	class HomeController extends Controller{
		use HomeModel;
		//ham mac dinh
		public function index(){
			//load view
			$this->loadView("HomeView.php");
		}
	}
 ?>