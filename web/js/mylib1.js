window.addEvent('load', function() {
				new JCaption('img.caption');
			});
//<![CDATA[ 
vmSiteurl = 'http://livedemo00.template-help.com/free_2013_virtuemart_2_0_22_a/' ;
vmLang = '&amp;lang=en' ;
Virtuemart.addtocart_popup = '1' ; 
vmCartText = '%2$s x %1$s was added to your cart.' ;
vmCartError = 'There was an error while updating your cart.' ;
loadingImage = '/free_2013_virtuemart_2_0_22_a/components/com_virtuemart/assets/images/facebox/loading.gif' ;
closeImage = '/free_2013_virtuemart_2_0_22_a/components/com_virtuemart/assets/images/fancybox/fancy_close.png' ; 
usefancy = false
//]]>

		window.addEvent('domready', function() {

			SqueezeBox.initialize({});
			SqueezeBox.assign($$('a.modal'), {
				parse: 'rel'
			});
		});
function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(840000); });
 
          var search_timer = new Array(); 
		  var search_has_focus = new Array(); 
		  var op_active_el = null;
		  var op_active_row = null;
          var op_active_row_n = parseInt("0");
		  var op_last_request = ""; 
          var op_process_cmd = "href"; 
		  var op_controller = ""; 
		  var op_lastquery = "";
		  var op_maxrows = 4; 
		  var op_lastinputid = "vm_ajax_search_search_str2135";
		  var op_currentlang = "en";
		  var op_lastmyid = "135"; 
		  var op_ajaxurl = "http://livedemo00.template-help.com/free_2013_virtuemart_2_0_22_a/modules/mod_vm_ajax_search/ajax/index.php";
		  var op_savedtext = new Array(); 
 
 
  /* <![CDATA[ */
  // global variable for js
  
   
   search_timer[135] = null; 
   search_has_focus[135] = false; 
   //document.addEvent('onkeypress', function(e) { handleArrowKeys(e); });
 
   window.addEvent('domready', function() {
     document.onkeydown = function(event) { return handleArrowKeys(event); };
     //jQuery(document).keydown(function(event) { handleArrowKeys(event); }); 
     // document.onkeypress = function(e) { handleArrowKeys(e); };
     if (document.body != null)
	 {
	   var div = document.createElement('div'); 
	   div.setAttribute('id', "vm_ajax_search_results2135"); 
	   div.setAttribute('class', "res_a_s"); 
	   div.setAttribute('style', "width:317px");
	   document.body.appendChild(div);
	 }
     //document.body.innerHTML += '<div class="res_a_s" id="vm_ajax_search_results2135" style="z-index: 999; width: 317px;">&nbsp;</div>';
   });
   /* ]]> */

