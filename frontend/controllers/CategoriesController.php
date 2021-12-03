<?php 
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		use CategoriesModel;
		public function index(){
			$this->loadView("CategoriesView.php");
		}
	}
 ?>