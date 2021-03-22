<?php 
	class HomeModel{
		//san pham moi
		public function modelNewProducts(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products order by id desc limit 0,6");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//san pham noi bat
		public function modelHotProducts(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where hot = 1 order by id desc limit 0,6");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//san pham theo danh muc
		public function modelCategories(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van -> chi hien thi danh muc co san pham
			$query = $conn->query("select * from categories where id in (select category_id from products where categories.id = products.category_id)");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//lay cac san pham thuoc danh muc
		public function modelProductsInCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id = $category_id limit 0,6");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>