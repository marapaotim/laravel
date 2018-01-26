 $(document).ready(function(e) {  	
  		$("#signinform").submit(function(e) {
		    e.preventDefault();
		    login();
		}); 

		$("#signupform").submit(function(e) {
		    e.preventDefault();
		    signup();
		});   
});
		function login(){
			var username = $('#username').val();
			var password = $('#password').val(); 
			var type = "signin";

				$.ajax({
					type: 'POST', 
					data:  {type:type,username:username, password:password},
					url: "inc/User.class.php",
					success: function(result){  
						//alert(result);
						if(result == 'false'){ alert('Invalid Username or Password'); } else { window.location="?action=main"; }  
					}
				})
		}

		function signup(){

			var fullname = $('#signup_fullname').val();
			var username = $('#signup_username').val(); 
			var password = $('#signup_password').val();
			var gender = $("input[name='signup_gender']:checked").val();
			var type = "signup";

				$.ajax({
					type: 'POST', 
					data:  {type:type,fullname:fullname, username:username, password:password, gender:gender},
					url: "inc/User.class.php",
					success: function(result){
						window.location="?action=login";
						//if(result == 'false'){ alert('Invalid Username or Password'); } else { window.location="?action=main"; }  
					}
				})
		}

// })(jQuery); 