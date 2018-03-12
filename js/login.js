function login()
{
            
            var user_id = document.getElementById('user').value;
            var password = document.getElementById('pass').value;
            
          
            $.ajax({
                type: 'POST',
                url: '../photo/welcome_connect.php',
                data: {functionName: 'login', id : user_id, pw : password},
                success: function(data) {
                    alert(data);
                    if(data == 'login')
                        window.location = "welcome.php";
                  
                    if(data == 'cannot_login')
                        $(".message").html('Wrong id or password?');
                },
                error:function()
                {
                    alert("error");
                }
            });
}