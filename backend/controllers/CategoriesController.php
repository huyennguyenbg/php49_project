<?php 
	//include file model
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		//su dung file model o day
		use CategoriesModel;
		//ham tao
		public function __construct(){
			//kiem tra dang nhap
			$this->authentication();
		}
		//hien thi danh sach cac ban ghi co phan trang
		public function index(){
			//dinh nghia so ban ghi tren mot trang
			$recordPerPage = 25;
			//tinh tong so trang
			$numPage = ceil($this->totalRecord($recordPerPage)/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//load view, truyen du lieu ra view
			$this->loadView("CategoriesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update ban ghi - trang thai GET
		public function update(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de lay du lieu
			$record = $this->modelGetRecord($id);	
			//tao bien $action de dua vao thuoc tinh action cua form
			$action = "index.php?controller=categories&action=updatePost&id=$id";
			//goi view, truyen du lieu ra view
			$this->loadView("CategoriesFormView.php",["record"=>$record,"action"=>$action]);
		}
		//update ban ghi - trang thai POST
		public function updatePost(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de update du lieu
			$record = $this->modelUpdate($id);	
			//di chuyen den url
			header("location:index.php?controller=categories");
		}
		//create ban ghi - trang thai GET
		public function create(){
			//tao bien $action de dua vao thuoc tinh action cua form
			$action = "index.php?controller=categories&action=createPost";
			//goi view, truyen du lieu ra view
			$this->loadView("CategoriesFormView.php",["action"=>$action]);
		}
		//create ban ghi - trang thai POST
		public function createPost(){
			//goi ham tu model de create du lieu
			if($this->modelCreate())
				//di chuyen den url
				header("location:index.php?controller=categories");
			else
				header("location:index.php?controller=categories&action=create&notify=emailExists");
		}
		//xoa ban ghi
		public function delete(){
			//lay bien id truyen tu url
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de update du lieu
			$record = $this->modelDelete($id);	
			//di chuyen den url
			header("location:index.php?controller=categories");
		}
	}
 ?>