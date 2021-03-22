<?php 
	class ProductsModel{
		//ham liet ke cac san pham thuoc danh muc
		//doc tat ca cac ban ghi
		public function modelRead($recordPerPage,$category_id){
			//------
			//sap xep khoang gia
			$groupPrice = isset($_GET["groupPrice"]) ? $_GET["groupPrice"]:"";
			//sap xep tang giam dan
			$order = isset($_GET["order"]) ? $_GET["order"]:"";
			//sap xep so ban ghi tren trang
			$pageSize = isset($_GET["pageSize"]) ? $_GET["pageSize"]:"";
			$strWhere = "";
			switch ($groupPrice) {
				case '1tr-5tr':
					$strWhere = " and price BETWEEN 1000000 and 5000000 ";
					break;
				case '5tr-10tr':
					$strWhere = " and price BETWEEN 5000000 and 10000000 ";
					break;
				case '10tr-15tr':
					$strWhere = " and price BETWEEN 10000000 and 15000000 ";
					break;
				case '15tr-20tr':
					$strWhere = " and price BETWEEN 15000000 and 20000000 ";
					break;
				case '20tr-25tr':
					$strWhere = " and price BETWEEN 20000000 and 25000000 ";
					break;
				case '25tr-30tr':
					$strWhere = " and price BETWEEN 25000000 and 30000000 ";
					break;
			}
			//---
			$strOrder = "order by id desc";
			switch ($order) {
				case 'priceAsc':
					$strOrder = " order by price asc ";
					break;
				case 'priceDesc':
					$strOrder = " order by price desc ";
					break;
				case 'nameAsc':
					$strOrder = " order by name asc ";
					break;
				case 'nameDesc':
					$strOrder = " order by name desc ";
					break;
			}
			//------
			if($pageSize > 0)
				$recordPerPage = $pageSize;
			//---
			//phan trang
			//tinh so trang
			//ham ceil la ham lay gia tri tran. vd: 2.3 = 3
			$numPage = ceil($this->totalRecord($category_id)/$recordPerPage);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&$_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//---
			//lay bien ket noi
			$conn = Connection::getInstance();			
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id = $category_id $strWhere $strOrder limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where category_id = $category_id");
			return $query->rowCount();
		}
		//lay ten danh muc
		public function getCategoryName($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select name from categories where id = $category_id");
			//lay mot ban ghi
			return $query->fetch();
		}
		//chi tiet san pham
		public function modelDetail($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where id = $id");
			//lay mot ban ghi
			return $query->fetch();
		}
		public function modelRating($id,$star){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("insert into rating set product_id = :product_id, star = :star");
			$query->execute(array("product_id"=>$id,"star"=>$star));
		}
		//dem so rating 1star cua san pham co id truyen vao
		public function modelGet1Star($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where star = 1 and product_id = $id");
			//lay mot ban ghi
			return $query->rowCount();
		}
		//dem so rating 2star cua san pham co id truyen vao
		public function modelGet2Star($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where star = 2 and product_id = $id");
			//lay mot ban ghi
			return $query->rowCount();
		}
		//dem so rating 3star cua san pham co id truyen vao
		public function modelGet3Star($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where star = 3 and product_id = $id");
			//lay mot ban ghi
			return $query->rowCount();
		}
		//dem so rating 4star cua san pham co id truyen vao
		public function modelGet4Star($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where star = 4 and product_id = $id");
			//lay mot ban ghi
			return $query->rowCount();
		}
		//dem so rating 5star cua san pham co id truyen vao
		public function modelGet5Star($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where star = 5 and product_id = $id");
			//lay mot ban ghi
			return $query->rowCount();
		}
	}
 ?>