var add = "true";
var publicid = 0; 
 $(document).ready(function(e) {  
			$("#myform").submit(function(e) {
		    	e.preventDefault();
		    	//if(add == true)
		    		insert_update();
		    	// else
		    	// 	update();
			});  
    		$('#tblMessage').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
}); 
		function insert_update(){
				var fname = $('#fname').val();
				var email = $('#email').val();
				var message = $('#message').val(); 
				var type = "insert_update";

				$.ajax({
					type: 'POST', 
					data:  {type:type,add:add, id:publicid,fname:fname,email:email,message:message},
					url: "inc/Message.class.php",
					success: function(result){  
						$(".alert").show();
						var msg = '';
						if(add == "true")
							msg = '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> New data has been added.';
						else
						  	msg = '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Success!</strong> data has been updated.';
						
						$(".alert").html(msg); 

		    	 		add = "true";
						loadData(); 
					}
				})
		}

		function deleteMessage(selectid){
			var conf = confirm("Are you sure you want to delete?");
			if(conf == true){
				var type = "delete";
				$.ajax({
					type: 'POST', 
					data:  {type:type, id:selectid},
					url: "inc/Message.class.php",
					success: function(result){   
						loadData(); 
					}
				}) 
			}

		}

		function loadData(){
			var type = "viewMessages";
			$.ajax({
					type: 'POST', 
					data:  {type:type},
					url: "inc/Message.class.php",
					success: function(result){  
						$("#myTable").html(result);
						document.getElementById("myform").reset();
						$('#tblMessage').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
					}
				})
		}
		function paginate_message(x){ 
			//alert(x);
			var type = "paginate";
			$.ajax({
					type: 'POST', 
					data:  {type:type,pages:x},
					url: "inc/Message.class.php",
					success: function(result){   
						$("#myTable").html(result);
					}
				})
		}

		function retrieveData(id, name, email, message){
			add = "false";
			publicid = id;  
			$("#fname").val(name);
		    $("#email").val(email);
		    $("#message").val(message); 
		}
 