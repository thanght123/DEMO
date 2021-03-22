<?php
	class OrdersModel{
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
			$query = $conn->query("select * from orders order by id desc limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from orders");
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function getRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from orders where id=:id");
			$query->execute(array("id"=>$id));
			//lay mot ban ghi
			$record = $query->fetch();
			return $record;
		}
		//lay mot ban ghi
		public function getCustomer($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from customers where id=:id");
			$query->execute(array("id"=>$id));
			//lay mot ban ghi
			$record = $query->fetch();
			return $record;
		}		
		//giao hang
		public function deliveryModel($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update orders set status = 1 where id=:id");
			$query->execute(array("id"=>$id));
		}
		public function orderDetailsModel($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select products.name, products.photo,quantity, orderdetails.price from orderdetails inner join products on orderdetails.product_id = products.id where order_id=:id");
			$query->execute(array("id"=>$id));
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>