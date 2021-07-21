jQuery( function($) { 
	$(document).ready( function() { 
		
		var networksIcons = {
			"Airbnb":        "<i class='fab fa-airbnb fa-fw'></i>",
			"Behance":       "<i class='fab fa-behance fa-fw'></i>",
			"Codepen":       "<i class='fab fa-codepen fa-fw'></i>",
			"Dribble":       "<i class='fab fa-dribbble fa-fw'></i>",
			"Email":         "<i class='far fa-envelope fa-fw'></i>",
			"Facebook":      "<i class='fab fa-facebook-f fa-fw'></i>",
			"Flickr":        "<i class='fab fa-flickr fa-fw'></i>",
			"Github":        "<i class='fab fa-github fa-fw'></i>",
			"Instagram":     "<i class='fab fa-instagram fa-fw'></i>",
			"Linkedin":      "<i class='fab fa-linkedin-in fa-fw'></i>",
			"Medium":        "<i class='fab fa-medium-m fa-fw'></i>",
			"Pinterest":     "<i class='fab fa-pinterest-p fa-fw'></i>",
			"Skype":         "<i class='fab fa-skype fa-fw'></i>",
			"Snapchat":      "<i class='fab fa-snapchat fa-fw'></i>",
			"Soundcloud":    "<i class='fab fa-soundcloud fa-fw'></i>",
			"Telegram":      "<i class='fab fa-telegram-plane fa-fw'></i>",
			"Tumblr":        "<i class='fab fa-tumblr fa-fw'></i>",
			"Twitter":       "<i class='fab fa-twitter fa-fw'></i>",
			"Viber":         "<i class='fab fa-viber fa-fw'></i>",
			"Vimeo":         "<i class='fab fa-vimeo-v fa-fw'></i>",
			"Whatsapp":      "<i class='fab fa-whatsapp fa-fw'></i>",
			"Youtube":       "<i class='fab fa-youtube fa-fw'></i>",
		};
		
		
		$(".networks-block li a").each( function() {
			
			var thisText = $(this).text();
			$(this).html(networksIcons[thisText]);
			
		});
		
		
		$(".networks-block").addClass("showed");
		
	});
});