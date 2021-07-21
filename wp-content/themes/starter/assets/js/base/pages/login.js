jQuery( function($) { 
	$(document).ready( function() { 
		
		$("body.login").parent().addClass("login-page");
		$("<span></span>").insertAfter("body.login form .forgetmenot label input, body.login form .pw-weak label input, body.login form .mc4wp-checkbox label input");
		
	});
});