<?php 
	class LoginModel{
		public function checkLogin(){
			$email = $_POST["email"];
			//ham md5 de Hash chuoi
			$password = md5($_POST["password"]);
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("select * from users where email=:email");
			//thuc thi truy van
			//co the su dung dau [] de khai bao array. [] <=> array()
			$query->execute(["email"=>$email]);
			//lay mot ban ghi
			$result = $query->fetch();
			if(isset($result->email)){
				if($result->password == $password){
					//dang nhap thanh cong
					$_SESSION["email"] = $email;
				}
			}
		}
	}
 ?>