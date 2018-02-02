$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(e) { 
	$('.contact-form img').hide();

	 $("#form-contact-us").submit(function(e) {
        e.preventDefault(); 
        
        $('#submit-contact').attr("disabled", "disabled");
        $('.contact-form img').show();

        $.ajax({
            dataType: 'json',
            type:'post',
            url: 'send_mail',
            data:{
				name: $('#name').val(),
				email: $('#email').val(),
				subject: $('#subject').val(),
				message: $('#message').val(),
			},
            _token: '{{ csrf_token() }}'
        }).done(function(result){ 
        	 $('#form-contact-us')[0].reset();
        	$('.contact-form img').hide(); 
        	$("#submit-contact").removeAttr("disabled");
            var message = '<div class="alert alert-success fade in alert-dismissable" style="margin-top: 20px;">';
            message+='<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
            message+='<strong>Successfully Send!</strong></div>';
        	$('.display-success').html(message); 
        }); 
    }); 
}); 