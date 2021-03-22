<?php 
	//load file model
	include "Models/HomeModel.php";
	class HomeController extends HomeModel{
		//san pham noi bat
		public function hotProducts(){
			$products = $this->modelHotProducts();
			include "Views/HomeHotProducts.php";
		}
		//san pham moi
		public function newProducts(){
			$products = $this->modelNewProducts();
			include "Views/HomeNewProducts.php";
		}
		//liet ke danh muc san pham -> chi liet ke danh muc co san ph am
		public function categories(){
			$listCategories = $this->modelCategories();
			include "Views/HomeCategoryProducts.php";
		}
	}
 ?>