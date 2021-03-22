<?php 
	//start session
	session_start();
	//load file ket noi csdl
	include "../Application/Connection.php";
	//---
	//VD: index.php?controller=Users&action=Read
    //lay bien controller tu url, sau do gan chuoi vao de no thanh mot duong dan file controller hoan chinh -> load file do vao day
    $controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
    //gan them chu Controller vao bien $controller
    $className = $controller."Controller";
    //$className = UsersController
    //viet hoa chu dau tien. VD: users -> Users
    $controller = ucfirst($controller);
    //$controller = "Users";
    //ghep cac gia tri de thanh duong dan hoan chinh den file controller
    $fileController = "Controllers/$controller"."Controller.php";
    //$fileController = "Controllers/UsersController.php";
    //lay bien action truyen tu url (day la ham ben trong class), neu co thi goi no
    $action = isset($_GET["action"]) ? $_GET["action"] : "index";
    //$action = Read
	//---
	//kiem tra xem neu user chua dang nhap thi thuc hien dang nhap
	if(isset($_SESSION["email"]) == false){
		include "Views/LayoutLogin.php";
	}else{
		//goi file Views/Layout.php de hien thi, load cac MVC vao file nay
		include "Views/Layout.php";
	}
 ?>