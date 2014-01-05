$(function(){
	
	// Form validation
	$(".validate-me").validationEngine({promptPosition : "topLeft"});

	// Datepicker
	$('#pickuptime, #droptime').datetimepicker({
		useStrict: true,
	    icons : {
			time: 'glyphicon glyphicon-time',
			date: 'glyphicon glyphicon-calendar',
			up:   'glyphicon glyphicon-chevron-up',
			down: 'glyphicon glyphicon-chevron-down'
	    }
	});

	// Sidebar toggle for mobile device
	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
	
	// Ajax call for email verification
	$('.verify-email').on('click', function(evt){
		evt.preventDefault();

		var $link = $(this);
		$link.text('Please wait....');

		$.get('send-verification-email', function(response){
			if(response === '1'){
				$link.text('Email sent! Resend?')
			}
		});

	});


});