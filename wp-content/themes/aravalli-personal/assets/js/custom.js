(function ($) {
    "use strict";

        // ScrollUp
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        // Sticky Menu
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 250) {
                $('.sticky-nav').addClass('sticky-menu');
            }
            else {
                $('.sticky-nav').removeClass('sticky-menu');
            }
        });

        $('.menubar .menu-wrap > li').hover(
        function(){
            $("li.active").addClass('inactive').removeClass('active');
        },
        function(){
            $("li.inactive").addClass('active').removeClass('inactive'); 
        });

        // Add/Remove .focus class for accessibility
        $('.menubar').find('a').on('focus blur', function() {
            $( this ).parents('ul, li').toggleClass('focus');
        });

        // Search Pop Up
        $(document).on('click','.view-popup', function(e){
            var btnId = $(this).attr('id');
            $( "body" ).addClass( "overlay-enabled" );
            $('.view-search').fadeIn(500);
            $( "."+ btnId ).addClass( 'on' );
            if ($('.view-search').hasClass('on')) {
                $('.form-control.search-field').focus();
                var links,i,len,menuItem=document.querySelector('.view-search-btn'),fieldToggle=document.querySelector('.form-control.search-field');let focusableElements='button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';let firstFocusableElement=fieldToggle;let focusableContent=menuItem.querySelectorAll(focusableElements);let lastFocusableElement=focusableContent[focusableContent.length-1];if(!menuItem){return!1}
                links=menuItem.getElementsByTagName('button');for(i=0,len=links.length;i<len;i++){links[i].addEventListener('focus',toggleFocus,!0);links[i].addEventListener('blur',toggleFocus,!0)}
                function toggleFocus(){var self=this;while(-1===self.className.indexOf('view-search-form')){if('input'===self.tagName.toLowerCase()){if(-1!==self.className.indexOf('focus')){self.className=self.className.replace('focus','')}else{self.className+=' focus'}}
                self=self.parentElement}}
                document.addEventListener('keydown',function(e){let isTabPressed=e.key==='Tab'||e.keyCode===9;if(!isTabPressed){return}
                if(e.shiftKey){if(document.activeElement===firstFocusableElement){lastFocusableElement.focus();e.preventDefault()}}else{if(document.activeElement===lastFocusableElement){firstFocusableElement.focus();e.preventDefault()}}});
            }
        });

        $(document).on('click','.view-search-remove', function(e){
            $( "body" ).removeClass( "overlay-enabled" );
            $('.view-search').fadeOut(500);
            $( ".view-search" ).removeClass('on');
            if (!$('.view-search').hasClass('on')) {
                $('.view-popup').focus();
            }
              return this;
        });

        // Mobile Menu
        $(".menubar .menu-wrap")
        .clone()
        .appendTo(".mobile-menus");

        var $mob_menu = $("#mobile-m");
        $(".close-menu").on("click", function() {
          $mob_menu.toggleClass("menu-show");
          $( "body" ).removeClass( "overlay-enabled" );
          if (!$mob_menu.hasClass('menu-show')) {
                $(".menutogglebtn").focus();
          }
        });

        $(".menutogglebtn").on("click", function() {
            if (!$mob_menu.hasClass('menu-show')) {
                $mob_menu.addClass("menu-show");
                $( "body" ).addClass( "overlay-enabled" );
                $('.close-menu').focus();
                var links,i,len,menuItem=document.querySelector('.mobile-menu'),fieldToggle=document.querySelector('.close-menu');let focusableElements='button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';let firstFocusableElement=fieldToggle;let focusableContent=menuItem.querySelectorAll(focusableElements);let lastFocusableElement=focusableContent[focusableContent.length-1];if(!menuItem){return!1}
                links=menuItem.getElementsByTagName('button');for(i=0,len=links.length;i<len;i++){links[i].addEventListener('focus',toggleFocus,!0);links[i].addEventListener('blur',toggleFocus,!0)}
                function toggleFocus(){var self=this;while(-1===self.className.indexOf('mobile-menus')){if('li'===self.tagName.toLowerCase()){if(-1!==self.className.indexOf('focus')){self.className=self.className.replace('focus','')}else{self.className+=' focus'}}
                self=self.parentElement}}
                document.addEventListener('keydown',function(e){let isTabPressed=e.key==='Tab'||e.keyCode===9;if(!isTabPressed){return}
                if(e.shiftKey){if(document.activeElement===firstFocusableElement){lastFocusableElement.focus();e.preventDefault()}}else{if(document.activeElement===lastFocusableElement){firstFocusableElement.focus();e.preventDefault()}}});
            }
        });
        $(".mobi_drop").on("click", function(e) {
            e.preventDefault();
            $(this)
              .parent()
              .toggleClass("current");
            $(this)
              .next()
              .slideToggle();
        });

        $(".header-widget")
        .clone()
        .appendTo(".mobi-head-top");
        var $mob_h_top = $("#mob-h-top");

        $('.header-sidebar-toggle').on('click', function(e) {
          $mob_h_top.toggleClass("active"); //you can list several class names 
          $('.header-sidebar-toggle').toggleClass("active");      
          e.preventDefault();
        });

        $(".menu-right")
        .clone()
        .appendTo(".mobi-head-cart");

        // Services Carousel
        $(".services-carousel").owlCarousel({
            items: 3,
            loop: true,
            dots: false,
            nav: true,
            navText: ['<i class="icofont-rounded-left"></i>', '<i class="icofont-rounded-right"></i>'],
            margin: 30,
            autoplay: true,
            autoplayTimeout: 9000,
            animateIn: 'pulse',
            animateOut: 'fadeOut',
            smartSpeed: 250,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 2,
                },
                900: {
                    items: 3
                },
            }
        });

        // Testimonial Carousel
        $(".team-section").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: false,
            autoplay: false,
            autoplayTimeout: 4000,
            animateIn: 'fadeInRight',
            animateOut: 'fadeInLeft',
            smartSpeed: 250,
            center: true
        });

        // News Events Carousel
        $(".news-events").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: false,
            autoplay: false,
            autoplayTimeout: 4000,
            animateIn: 'fadeInRight',
            animateOut: 'fadeInLeft',
            smartSpeed: 250,
            center: true
        });

        // Partners Carousel
        $(".partner-carousel").owlCarousel({
            items: 4,
            loop: true,
            dots: true,
            nav: false,
            margin: 30,
            autoplay: false,
            autoplayTimeout: 3000,
            animateIn: 'fadeInRight',
            animateOut: 'fadeInLeft',
            smartSpeed: 250,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },
            }
        });

        // info Carousel
        $(".info-carousel").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: false,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 5000,
            animateIn: 'pulse',
            animateOut: 'fadeOut',
            smartSpeed: 250,
            center: true
        });

        // Room Single Carousel
        $('.room_single_owl .owl-carousel').owlCarousel({
            autoplay: true,
            dots: false,
            autoplayTimeout: 4000,
            loop: true,
            center: true,
            nav: true,
            thumbs: true,
            thumbImage: true,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',
            navText: ["<i class='icofont-rounded-left' aria-hidden='true'></i>", "<i class='icofont-rounded-right' aria-hidden='true'></i>"],
            items: 1
        });

        // MagnificPopup
        $('.galleries').magnificPopup({
            delegate: '.gallery-item a',
            type: 'image',
            gallery: {
                enabled: true,
            }
        });

        // Load More Premium Features
        $(".load-blog-masonry").slice(0, 3).show();
        $(".load-blog").slice(0, 6).show();
        $(".load-2").slice(0, 4).show();
        $(".load-3").slice(0, 6).show();
        $(".load-4").slice(0, 8).show();
        $(".load-btn").on('click', function (e) {
            e.preventDefault();
            $(".load-btn").addClass("loadspinner");
            $(".load-btn").animate({
                    display: "block"
                }, 500,
                function () {
                    // Animation complete.
                    $(".load-blog-masonry:hidden").slice(0, 3).slideDown();
                    $(".load-blog:hidden").slice(0, 3).slideDown();
                    $(".load-2:hidden").slice(0, 2).slideDown()
                    .each(function() {
                      $('#grid').shuffle('appended', $(this));
                    });
                    $(".load-3:hidden").slice(0, 3).slideDown()
                    .each(function() {
                      $('#grid').shuffle('appended', $(this));
                    });
                    $(".load-4:hidden").slice(0, 4).slideDown()
                    .each(function() {
                      $('#grid').shuffle('appended', $(this));
                    });
                    if ($(".load-item:hidden").length === 0) {
                        $(".load-btn").text("No more");
                    }
                    $(".load-btn").removeClass("loadspinner");
                }
            );
        });

        // About Video
        // Megnific Popup Video BTN
        $(".play-icon").magnificPopup({
          type: 'iframe'
        });

        // // Preloader
        $(".preloader").fadeOut('slow');


        $('.counter').each(function () {
          var $this = $(this);
          $({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 5000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
          });
        });

}(jQuery));

