jQuery('.marg-bot.sp .fleft .vmicon').live('click',function(){
		jQuery(this).parent().parent().parent().find('.spinner').css({display:'block'});						  
	})

jQuery(document).ready(function() {
	jQuery('#vmCartModule').hover(
	   function(){
	   jQuery('#cart_list').stop(true,true).slideDown(400) 
	   },
	   function(){ 
	   jQuery('#cart_list').stop(true,true).delay(500).slideUp(100)
	   }
	)
});
function remove_product_cart(elm) {
	var cart_id = jQuery(elm).children("span.product_cart_id").text();
	new Request.HTML({
		'url':'index.php?option=com_virtuemart&view=cart&task=delete',
		'method':'post',
		'data':'cart_virtuemart_product_id='+cart_id,
		'onSuccess':function(tree,elms,html,js) {
			//jQuery(".vmCartModule").productUpdate();
			mod=jQuery(".vmCartModule");
			jQuery.getJSON(vmSiteurl+"index.php?option=com_virtuemart&nosef=1&view=cart&task=viewJS&format=json"+vmLang,
				function(datas, textStatus) {
					if (datas.totalProduct >0) {
						mod.find(".vm_cart_products").html("");
						datas.products.reverse();
						jQuery.each(datas.products, function(key, val) {
						 	if (key<4){	
								jQuery("#hiddencontainer .container").clone().appendTo(".vmCartModule .vm_cart_products");
								jQuery.each(val, function(key, val) {
									if (jQuery("#hiddencontainer .container ."+key)) mod.find(".vm_cart_products ."+key+":last").html(val) ;
							});
							}	
						});
						mod.find(".total").html(datas.billTotal);
						mod.find(".show_cart").html(datas.cart_show);
					} else {
						mod.find(".text-cart").html(datas.cart_empty_text);
						mod.find(".vm_cart_products").html("");
						mod.find(".total").html("");
						mod.find(".show_cart").html("");
					}
					mod.find(".total_products").html(datas.totalProductTxt);
				}
			);
		}
	}).send();
}

jQuery(document).ready(function() {
	jQuery(function(){
		 jQuery('#select-form').jqTransform({imgPath:'../images/'}).css('display','block');
	});
		
});
