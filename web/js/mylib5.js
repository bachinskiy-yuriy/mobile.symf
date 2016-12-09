	jQuery(document).ready(function(){
		jQuery('.list li.has-children ').hover(
			function() {
				jQuery(this).find('ul:first').stop(true, true).fadeIn("slow");
			},
			function() {
				jQuery(this).find('ul:first').stop(true, true).delay(400).fadeOut("slow") ;
			}
		);
});