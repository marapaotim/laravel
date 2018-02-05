$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(e) { 
	$('.contact-form i').hide();
    $('div.error-captcha').hide();
     
	$("#form-contact-us").submit(function(e) {
        e.preventDefault(); 
        
        $('#submit-contact').attr("disabled", "disabled");
        $('.contact-form i').show(); 

        console.log(grecaptcha.getResponse());
        $.ajax({
            dataType: 'json',
            type:'post',
            url: 'send_mail',
            data:{
				name: $('#name').val(),
				email: $('#email').val(),
				subject: $('#subject').val(),
				message: $('#message').val(),
                captcha: grecaptcha.getResponse(),
			},
            _token: '{{ csrf_token() }}'
        }).done(function(result){ 
            
            if(result.status != 'robot') {

            	$('#form-contact-us')[0].reset();

                var message = '<div class="alert alert-success fade in alert-dismissable" style="margin-top: 20px;">';

                message+='<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';

                message+='<strong>Successfully Send!</strong></div>';

                $('.display-success').html(message);

                grecaptcha.reset();

                $('div.error-captcha').hide();
            }
            else{

                $('div.error-captcha').show();

                $('.display-success').html('');

            }

            $('.contact-form i').hide(); 

            $("#submit-contact").removeAttr("disabled");
        }); 
    }); 
}); 