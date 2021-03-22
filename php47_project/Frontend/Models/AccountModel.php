<?php 
	class AccountModel{
		public function modelRegister(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			//ham md5 ma hoa mot chieu
			$password = md5($_POST["password"]);
			//lay bien connect csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into customers set name=:name,email=:email,address=:address,phone=:phone,password=:password");
			$query->execute(array("name"=>$name,"email"=>$email,"address"=>$address,"phone"=>$phone,"password"=>$password));
		}
	}
 ?>