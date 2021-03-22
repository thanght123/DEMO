<?php 
	include "Models/SearchModel.php";
	class SearchController extends SearchModel{
		//tim kiem san pham theo gia
		public function searchPrice(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->totalRecordSearch()/$recordPerPage);
			//goi ham ModelRead tu class ProductsModel de lay ket qua
			$listRecord = $this->modelSearch($recordPerPage);
			//load view
			include "Views/ProductsSearchPrice.php";
		}
		//tim kiem san pham
		public function search(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->totalRecordSearch()/$recordPerPage);
			//goi ham ModelRead tu class ProductsModel de lay ket qua
			$listRecord = $this->modelSearch($recordPerPage);
			//load view
			include "Views/ProductsSearch.php";
		}
		//tim kiem theo cau hinh san pham
		public function searchParameter(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->totalRecordSearchParameter()/$recordPerPage);
			//goi ham ModelRead tu class ProductsModel de lay ket qua
			$listRecord = $this->modelSearchParameter($recordPerPage);
			//load view
			include "Views/ProductsSearchParameter.php";
		}
	}
 ?>