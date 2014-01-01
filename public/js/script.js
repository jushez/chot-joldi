$(function(){
	
	$(".validate-me").validationEngine({promptPosition : "topLeft"});

	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
	
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