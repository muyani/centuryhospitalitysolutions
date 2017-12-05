 jQuery(function($){
	
	$(document).ready(function() {
		
		jQuery('.counter-item').appear(function() {
			jQuery('.counter-number').countTo();
			jQuery(this).addClass('funcionando');
			console.log('funcionando');
		});
		
	}); 
	
	/* wow
	-------------------------------*/
	new WOW({ mobile: false }).init();
	
});
