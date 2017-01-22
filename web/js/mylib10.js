jQuery(document).ready(function () {
	jQuery('.orderlistcontainer').hover(
		function() { jQuery(this).find('.orderlist').has('div').stop().show()},
		function() { jQuery(this).find('.orderlist').has('div').stop().hide()}
	)
	jQuery('.orderlistcontainer .orderlist').each(function(){
	 	jQuery(this).parent().find('.activeOrder').addClass('block');            
	})

});