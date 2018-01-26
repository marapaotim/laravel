$(document).ready(function(e) {  
  	 $(".logout a").click(function (e) {
	    e.preventDefault();
	    var conf = confirm("Are you sure you want to logout?"); 
	    if(conf == true){
	    	var type = "logout";
			$.ajax({
				type: 'POST', 
				data:  {type:type},
				url: "inc/User.class.php",
				success: function(result){ 
				//alert(result);   
					window.location="?action=main";
				}
			})
	    }
	}); 
}) 