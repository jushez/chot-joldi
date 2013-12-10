$(function(){
	// Code goes here.
	$(".validate-me").validationEngine();

	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
	
	$('.verify-email').on('click', function(evt){
		evt.preventDefault();

		$.get('verify-email', function(response){
			alert(response);
		});

	});


});