<?php  
	switch($_POST['functionName'])
    {
       
		case 'insert':
            echo $_POST['S_user'] . " " . $_POST['S_pass'] . " " . $_POST['S_email'];
    		insert($_POST['S_user'],$_POST['S_pass'],$_POST['S_email']);
		break;	
						
		
	}
    function connect()
    {
         $link = @mysqli_connect(
            'localhost',
            'root',
            '',
            'fyp'
         ) or die("Connection error");

         return $link;
    }

   
	
	function insert($S_user, $S_pass, $S_email)
	{
		 
	
		$S_user= $S_user;
		$S_pass=$S_pass ;
		$S_email=$S_email ;
		
		
		$conn= connect();
		$sql = "INSERT INTO `user` ( `username`, `email`, `password`) VALUES ('$S_user', '$S_pass', '$S_email')";
		$result = mysqli_query($conn, $sql);          
        echo "Sccuess";
		   	
	}
 
 	
  
 ?>  
