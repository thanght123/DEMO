<?php 
	//load file Connection.php de ket noi csdl
	include "../Application/Connection.php";
	//---
	$key = isset($_GET["key"]) ? $_GET["key"] : "";
	//lay bien ket noi csdl
	$conn = Connection::getInstance();
	$query = $conn->query("select id, name, photo from products where name like '%$key%'");
	//lay tat ca ket qua tra ve
	$listRecord = $query->fetchAll();
 ?>
 <?php foreach($listRecord as $rows): ?>
 <li><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="../Assets/Upload/Products/<?php echo $rows->photo; ?>"> <?php echo $rows->name; ?></a></li>
 <?php endforeach; ?>