<?php
	class ProductsModel{
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
			$query = $conn->query("select * from products order by id desc limit $from,$recordPerPage");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function totalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products");
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function getRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where id=:id");
			$query->execute(array("id"=>$id));
			//lay mot ban ghi
			$record = $query->fetch();
			return $record;
		}
		//update ban ghi
		public function modelUpdate($id){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update products set name=:name,category_id=:category_id,price=:price,discount=:discount,description=:description,content=:content,hot=:hot where id=:id");
			$query->execute(array("id"=>$id,"name"=>$name,"category_id"=>$category_id,"price"=>$price,"discount"=>$discount,"description"=>$description,"content"=>$content,"hot"=>$hot));
			//neu user chon anh			
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldQuery = $conn->query("select photo from products where id=$id");
				$oldRecord = $oldQuery->fetch();
				if(isset($oldRecord->photo) && file_exists("../Assets/Upload/Products/".$oldRecord->photo))
					unlink("../Assets/Upload/Products/".$oldRecord->photo);
				//---
				//lay ten anh, ghep voi ham thoi gian
				//ham time() doi thoi gian ra thanh so nguyen
				$photo = time().$_FILES["photo"]["name"];
				//thuc hien upload
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/$photo");
				//thuc hien truy van
				$query = $conn->prepare("update products set photo=:photo where id=:id");
				$query->execute(array("id"=>$id,"photo"=>$photo));
			}
		}
		//create ban ghi
		public function modelCreate(){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$photo = "";
			//neu user chon anh			
			if($_FILES["photo"]["name"] != ""){				
				//lay ten anh, ghep voi ham thoi gian
				//ham time() doi thoi gian ra thanh so nguyen
				$photo = time().$_FILES["photo"]["name"];
				//thuc hien upload
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../Assets/Upload/Products/$photo");			
			}
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into products set name=:name,category_id=:category_id,price=:price,discount=:discount,description=:description,content=:content,hot=:hot,photo=:photo");
			$query->execute(array("photo"=>$photo,"name"=>$name,"category_id"=>$category_id,"price"=>$price,"discount"=>$discount,"description"=>$description,"content"=>$content,"hot"=>$hot));
		}
		//delete ban ghi
		public function modelDelete($id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$oldQuery = $conn->query("select photo from products where id=$id");
			$oldRecord = $oldQuery->fetch();
			if(isset($oldRecord->photo) && file_exists("../Assets/Upload/Products/".$oldRecord->photo))
				unlink("../Assets/Upload/Products/".$oldRecord->photo);
			//---
			//thuc hien truy van
			$query = $conn->prepare("delete from products where id=:id");
			$query->execute(array("id"=>$id));
		}
		//lay ten danh muc
		public function getCategory($category_id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select name from categories where id=:category_id");
			$query->execute(array("category_id"=>$category_id));
			//lay mot ban ghi
			$record = $query->fetch();
			return $query->rowCount() > 0 ? $record->name:"";
		}
		//danh sach danh muc
		public function modelListCategory(){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc");
			//lay nhieu ban ghi
			$listRecord = $query->fetchAll();
			return $listRecord;
		}
		//danh sach danh muc con
		public function modelListCategorySub($category_id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id=$category_id order by id desc");
			//lay nhieu ban ghi
			$listRecord = $query->fetchAll();
			return $listRecord;
		}
		//doc tat ca cac ban ghi
		public function ModelReadParameters($product_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select parameters.name as name, product_parameters.id as id from product_parameters inner join parameters on product_parameters.parameter_id = parameters.id where product_id = $product_id");
			//lay tat cac ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//danh sach danh muc
		public function modelListParameter(){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from parameters where parent_id = 0 order by id desc");
			//lay nhieu ban ghi
			$listRecord = $query->fetchAll();
			return $listRecord;
		}
		//danh sach danh muc con
		public function modelListParameterSub($category_id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from parameters where parent_id=$category_id order by id desc");
			//lay nhieu ban ghi
			$listRecord = $query->fetchAll();
			return $listRecord;
		}
		public function modelAddParameter($product_id){
			$parameter_id = $_POST["parameter_id"];
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into product_parameters set product_id=:product_id,parameter_id=:parameter_id");
			$query->execute(array("product_id"=>$product_id,"parameter_id"=>$parameter_id));
		}
		//delete thuoc tinh san pham
		public function modelDeleteParameter($id){
			//--
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("delete from product_parameters where id=:id");
			$query->execute(array("id"=>$id));
		}
	}
 ?>