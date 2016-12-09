	// initialise plugins
	jQuery(function(){
		jQuery('ul.sf_menu').superfish({
		    hoverClass:    'sfHover',         
		    pathClass:     'overideThisToUse',
		    pathLevels:    1,    
		    delay:         500, 
		    animation:     {opacity:'show'}, 
		    speed:         'normal',   
		    dropShadows:   false, 
		    disableHI:     false, 
		    easing:        "swing"
		});
	});
