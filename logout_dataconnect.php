<?php

echo "My first PHP script!";

/*
    switch($_POST['functionName'])
    {
        case 'login':
              login($_POST['id'], $_POST['pw']);
        break;
		case 'upload':
            echo $_POST['goods_name'] . " " . $_POST['desciption'] . " " . $_POST['stocky_qty'] . " " . $_POST['shelves'];
    		upload($_POST['goods_name'],$_POST['desciption'],$_POST['stocky_qty'],$_POST['shelves']);
		break;	
		case 'update':
			 echo $_POST['name'] . " " . $_POST['de'] . " " . $_POST['qty'] . " " . $_POST['sh'];
              update($_POST['id'],$_POST['name'], $_POST['de'], $_POST['qty'], $_POST['sh']);
        break;		
		
	}
    function connect()
    {
         $link = @mysqli_connect(
            'localhost',
            'root',
            '',
            'photo'
         ) or die("Connection error");

         return $link;
    }

    function login($id, $password)
    {   
        $conn = connect();

        $sql = "select * from t_user where username = '$id' and password = '$password'";
       
        $result = mysqli_query($conn, $sql);
        if(mysqli_fetch_assoc($result) > 0)
        {
            
            echo 'login';
            return true;
            
        }
      
        echo 'cannot_login';
        return false;
    }*/
 
?>