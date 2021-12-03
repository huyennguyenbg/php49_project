<?php 
	session_start();
	//load file Controller.php
	include "../app/Controller.php";
	//load file Connection.php
	include "../app/Connection.php";
	//---
	//lay bien controller truyen tu url
	$controller = isset($_GET["controller"]) ? $_GET["controller"]:"Home";
	//lay bien action truyen tu url
	$action = isset($_GET["action"]) ? $_GET["action"]:"index";
	//ghep thanh duong dan file controller vat ly
	$fileController = "controllers/".ucfirst($controller)."Controller.php";
	//ten class
	$classController = ucfirst($controller)."Controller";
	//load file controller
	include $fileController;
	//kiem tra xem class do ton tai khong, neu co thi khoi tao
	if(class_exists($classController)){
		$obj = new $classController();
		$obj->$action();
	}else die("$fileController không tồn tại");
	//---
 ?>
