$(function(){
	// Code goes here.
	$(".validate-me").validationEngine();

	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
	
});