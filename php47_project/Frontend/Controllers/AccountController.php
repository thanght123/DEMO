<?php 
	include "Models/AccountModel.php";
	class AccountController extends AccountModel{
		public function register(){
			include "Views/Register.php";
		}
		public function registerPost(){
			$this->modelRegister();
			echo "<script>location.href='index.php?controller=account&action=register&mode=success';</script>";
		}
		public function login(){
			include "Views/Login.php";
		}
		public function loginPost(){
			$email = $_POST["email"];
			$password = md5($_POST["password"]);
			//---
			$conn = Connection::getInstance();
			$query = $conn->prepare("select id,email,password from customers where email=:email");
			$query->execute(["email"=>$email]);
			//lay mot ban ghi
			$result = $query->fetch();
			if($result->password == $password){
				//dang nhap thanh cong
				$_SESSION["customer_email"] = $email;
				$_SESSION["customer_id"] = $result->id;
				//quay tro lai trang chu
				echo "<script>location.href='index.php';</script>";
			}else{
				echo "<script>location.href='index.php?controller=account&action=login&notify=error';</script>";
			}
			//---
		}
		//dang xuat
		public function logout(){
			//huy session
			unset($_SESSION["customer_email"]);
			unset($_SESSION["customer_id"]);
			echo "<script>location.href='index.php?controller=account&action=login';</script>";
		}
	}
 ?>