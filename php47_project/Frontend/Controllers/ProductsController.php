<?php 
	//load file model
	include "Models/ProductsModel.php";
	class ProductsController extends ProductsModel{
		//ten ham dat theo quy tac camel
		public function category(){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->totalRecord($category_id)/$recordPerPage);
			//goi ham ModelRead tu class ProductsModel de lay ket qua
			$listRecord = $this->modelRead($recordPerPage,$category_id);
			//load view
			include "Views/ProductsCategory.php";
		}
		//chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$record = $this->modelDetail($id);
			//load view
			include "Views/ProductsDetail.php";
		}
		//rating star
		public function rating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$star = isset($_GET["star"]) ? $_GET["star"] : 0;
			$this->modelRating($id,$star);
			//di chuyen den trang chi tiet
			//header("location:index.php?controller=products&action=detail&id=$id");
			echo "<script>location.href='index.php?controller=products&action=detail&id=$id';</script>";
		}
	}
 ?>