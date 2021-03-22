<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Assets/Backend/css/bootstrap.min.css">
</head>
<body>
<?php                 
    //kiem tra xem file do co ton tai khong, neu co ton tai thi load vao day
    if(file_exists("Controllers/LoginController.php"))
    {
        include "Controllers/LoginController.php";      
        //VD: include "Controllers/UsersController.php";          
        //tao object cua class $controller
        if(class_exists("LoginController"))
        {
            $obj = new LoginController();  
            //$obj = new Users(); 
            //goi ham ben trong class
            $obj->$action();
            //$obj->Read();
        }
    }
 ?>
</body>
</html>
