jQuery(function($) {	
	 // Main Slider
        $(".main-slider").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: true,            
            navText: ['<i class="fa fa-angle-left"></i> <span>Slide</span>', '<i class="fa fa-angle-right"></i> <span>Slide</span>'],
            autoplay: true,
            smartSpeed: 1000,
			autoplayTimeout: slider_settings.animationSpeed,
			animateIn: slider_settings.animateIn,
			animateOut: slider_settings.animateOut,
        });
        // Header Slide items with animate.css
        var owlMain = $('.main-slider');
        owlMain.owlCarousel();
        owlMain.on('translate.owl.carousel', function (event) {
            var data_anim = $("[data-animation]");
            data_anim.each(function() {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });
        $("[data-delay]").each(function() {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });
        $("[data-duration]").each(function() {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });
        owlMain.on('translated.owl.carousel', function() {
            var data_anim = owlMain.find('.owl-item.active').find("[data-animation]");
            data_anim.each(function() {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });
        function owlMainThumb() {
            $('.owl-item').removeClass('prev next');
            var currentSlide = $('.main-slider .owl-item.active');
            currentSlide.next('.owl-item').addClass('next');
            currentSlide.prev('.owl-item').addClass('prev');
            var nextSlideImg = $('.owl-item.next').find('.item img').attr('data-img-url');
            var prevSlideImg = $('.owl-item.prev').find('.item img').attr('data-img-url');
            $('.owl-nav .owl-prev').css({
                backgroundImage: 'url(' + prevSlideImg + ')'
            });
            $('.owl-nav .owl-next').css({
                backgroundImage: 'url(' + nextSlideImg + ')'
            });
        }
        owlMainThumb();
        owlMain.on('translated.owl.carousel', function() {
            owlMainThumb();
        });

});