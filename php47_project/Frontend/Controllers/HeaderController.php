<?php 
	include "Models/HeaderModel.php";
	class HeaderController extends HeaderModel{
		public function listCategory(){
			include "Views/HeaderMenu.php";
		}
	}
 ?>