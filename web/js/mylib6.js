       jQuery(function(){
        jQuery('#camera_wrap_130').camera({
                height: '319',
                minHeight: '',
                pauseOnClick: false,
                hover: 1,
                fx: 'random',
                loader: 'pie',
                pagination: 1,
                thumbnails: 1,
                thumbheight: 65,
                thumbwidth: 100,
                time: 7000,
                transPeriod: 1500,
                alignment: 'center',
                autoAdvance: 1,
                mobileAutoAdvance: 1,
                portrait: 0,
                barDirection: 'leftToRight',
                imagePath: '/images/',
                lightbox: 'mediaboxck',
                fullpage: 0,
                navigationHover: false,
                navigation: false,
                playPause: false,
                barPosition: 'bottom'
        });
});