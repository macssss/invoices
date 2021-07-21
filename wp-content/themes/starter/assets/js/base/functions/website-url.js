jQuery( function($) {
	
	window.domain_name  = window.location.hostname;
	window.protocol     = window.location.protocol;
	window.ajax_url     = protocol + '//' + domain_name + '/wp-admin/admin-ajax.php';
	
});