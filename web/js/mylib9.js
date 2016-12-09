        jQuery(document).ready(function() {
            RESPONSIVEUI.responsiveTabs();
        })

        jQuery(document).ready(function() {
            jQuery('#products').slides({
                preload: true,
                preloadImage: false,
                effect: 'fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: false,
                generatePagination: false
            });	
            jQuery('.jqzoom').jqzoom({
                zoomType: 'reverse',
                lens:true,
                zoomWidth:300,
                zoomHeight:230,
                preloadImages: false,
                title:false,
                alwaysOn:false
            });
            jQuery("#carousel").jcarousel({
                scroll:1					  
                                      });

        });	
