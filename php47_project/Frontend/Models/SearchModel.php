<?php 
	class SearchModel{
		public function modelSearch($recordPerPage){
			//phan trang
			//tinh so trang
			//ham ceil la ham lay gia tri tran. vd: 2.3 = 3
			$numPage = ceil($this->totalRecordSearch()/$recordPerPage);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&$_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi
			$conn = Connection::getInstance();	
			//---
			$key = isset($_GET["key"]) ? $_GET["key"]:"";
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"]:0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"]:0;
			//---
			$strWhere = "";
			if($fromPrice > 0 && $toPrice > 0)
				$strWhere = " and price BETWEEN $fromPrice and $toPrice ";
			//---		
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%' $strWhere  limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecordSearch(){
			$key = isset($_GET["key"]) ? $_GET["key"]:"";
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"]:0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"]:0;
			//---
			$strWhere = "";
			if($fromPrice > 0 && $toPrice > 0)
				$strWhere = " and price BETWEEN $fromPrice and $toPrice ";
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where name like '%$key%' $strWhere");
			return $query->rowCount();
		}
		public function modelSearchParameter($recordPerPage){
			//phan trang
			//tinh so trang
			//ham ceil la ham lay gia tri tran. vd: 2.3 = 3
			$numPage = ceil($this->totalRecordSearch()/$recordPerPage);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&$_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi
			$conn = Connection::getInstance();	
			//---
			$id = isset($_GET["id"]) ? $_GET["id"]:0;
			//---		
			//thuc hien truy van
			$query = $conn->query("select * from products where id in (select product_id from product_parameters where parameter_id = $id) limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecordSearchParameter(){
			$id = isset($_GET["id"]) ? $_GET["id"]:0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where id in (select product_id from product_parameters where parameter_id = $id) ");
			return $query->rowCount();
		}
	}
 ?>