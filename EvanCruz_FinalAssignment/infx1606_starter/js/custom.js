$(document).ready(function () {
/*--------------------------------Adipoli-----------------------------------------------*/
	$('.AltaPic').adipoli({
		'startEffect' : 'normal',
		'hoverEffect' : 'popout'
	});
	
/*---------------------------------jBox--------------------------------------------------*/
	$('.tooltip').jBox('Tooltip', {
		position: {
			x: 'right',
			y: 'center'
		},
		outside: 'x'
	});
/*----------------------------------Sidr-----------------------------------------------*/
	 $('#simple-menu').sidr();
	 
	
});
