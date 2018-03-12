function insert()
{
       
       alert("invoice");  
        var S_user = document.getElementById('S_user').value;
	     	 var S_pass = document.getElementById('S_pass').value;
         var S_email = document.getElementById('S_email').value;
             
           
          
           $.ajax({
               type: 'POST',
               url: '../UserSignUp_action.php',
		       	   data: {S_user: S_user, S_pass:S_pass ,S_email:S_email},
		        		success: function(data) {
                    alert("123");
                  
                   
                },
                error:function()
                {
                    alert("error");
                }
            });
}