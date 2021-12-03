<?php 
	//start session
	session_start();
	//load file Connection.php de lay bien ket noi csdl
	include "../app/Connection.php";
	//load file Controller.php
	include "../app/Controller.php";
 ?>
 

 <?php 
 	//lay bien controller truyen tu url
 	//index.php?controller=PhongBan&action=listPhongBan
 	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
 		//-> $controller = PhongBan
 	//ghep chuoi de thanh ten class
 	$classController = $controller."Controller";
 		//->$classController = PhongBanController
 	//ghep chuoi de thanh ten file
 	$fileController = "controllers/".$controller."Controller.php";
 		//-> $fileController =  controllers/PhongBanController.php		
 	$action = isset($_GET["action"]) ? $_GET["action"] : "index";
 		//$action = listPhongBan 
 	//---
 	//include file controller
 	if(file_exists($fileController)){
 		include $fileController;
 		$obj = new $classController();
 		$obj->$action();
 	}
 	//---

  ?>
  <!-- <h1>file controller: <?php echo $fileController; ?></h1>
  <h1>class: <?php echo $classController; ?></h1>
  <h1>action: <?php echo $action; ?></h1> -->