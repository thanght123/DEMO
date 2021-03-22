<?php 
	class Connection{
		public static function getInstance(){
			//---	
			//ket noi csdl su dung PDO
			$connection = new PDO("mysql:host=localhost;dbname=php47_project","root","");
			//thuc hien cau lenh sau de co the lay du lieu theo kieu unicode
			$connection->exec("set names utf8");
			//dat cach thuc de duyet cac ban ghi
			$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			//---
			return $connection;
		}
	}
 ?>