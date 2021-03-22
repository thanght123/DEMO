<?php
	class UsersModel{
		//doc tat ca cac ban ghi
		public function ModelRead($recordPerPage){
			//---
			//phan trang
			//tinh so trang
			//ham ceil la ham lay gia tri tran. vd: 2.3 = 3
			$numPage = ceil($this->totalRecord()/$recordPerPage);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&$_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from users order by id desc limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from users");
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function getRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from users where id=:id");
			$query->execute(array("id"=>$id));
			//lay mot ban ghi
			$record = $query->fetch();
			return $record;
		}
		//update ban ghi
		public function modelUpdate($id){
			//--
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update users set name=:name,email=:email where id=:id");
			$query->execute(array("id"=>$id,"name"=>$name,"email"=>$email));
			//neu password khong rong thi update password
			if($password != ""){
				//ma hoa password
				$password = md5($password);
				$query = $conn->prepare("update users set password=:password where id=:id");
				$query->execute(array("id"=>$id,"password"=>$password));
			}
		}
		//create ban ghi
		public function modelCreate(){
			//--
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = md5($_POST["password"]);
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into users set name=:name,email=:email,password=:password");
			$query->execute(array("name"=>$name,"email"=>$email,"password"=>$password));
		}
		//delete ban ghi
		public function modelDelete($id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("delete from users where id=:id");
			$query->execute(array("id"=>$id));
		}
	}
 ?>