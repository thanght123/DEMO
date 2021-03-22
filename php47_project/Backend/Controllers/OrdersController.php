<?php 
	//load file OrdersModel.php
	include "Models/OrdersModel.php";
	//ten lop dat theo quy tac passcal
	class OrdersController extends OrdersModel{
		//ten ham dat theo quy tac camel
		public function read(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 4;
			//tinh so trang
			$numPage = ceil($this->totalRecord()/$recordPerPage);
			//goi ham ModelRead tu class OrdersModel de lay ket qua
			$listRecord = $this->ModelRead($recordPerPage);
			//load view
			include "Views/OrdersRead.php";
		}
		//giao hang
		public function delivery(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->deliveryModel($id);
			//quay lai trang orders
			echo "<script>location.href='index.php?controller=orders&action=read';</script>";
		}
		//chi tiet don hang
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$listRecord = $this->orderDetailsModel($id);
			include "Views/OrderDetails.php";
		}
	}
 ?>