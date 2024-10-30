;(function($) {
    'use strict';

    function mfoliodonMasonry(){
        var selector = $('.foliodon-masonry');
        selector.imagesLoaded( function() {
            selector.masonry({
                itemSelector: '.foliodon-masonry .portfolio-grid-item',
                columnWidth: '.foliodon-masonry .portfolio-grid-item'
            });
        });
    }

    $(window).on( 'elementor/frontend/init', function() {
        // Mfolio Portfolio Grid
        elementorFrontend.hooks.addAction('frontend/element_ready/mfolioportfoliogrid.default',function($scope) {
            let $portfolio_v1 = $scope.find('.portfolio_item.style-1');
            $portfolio_v1.on('mousemove', function(event){
                var mx = event.offsetX,
                    my = event.offsetY;

                    $(this).children('.portfolio_info').css({
                        'top' : my + 'px',
                        'left' : mx + 'px'
                    });

            });

            $portfolio_v1.on('mousehover', function(event){
                var mx = event.offsetX,
                    my = event.offsetY;

                    $(this).children('.portfolio_info').css({
                        'top' : my + 'px',
                        'left' : mx + 'px'
                    });

            });

            mfoliodonMasonry();

            $(window).on('resize', mfoliodonMasonry);

            $('.foliodon-wrapper img.svg').each(function () {
              var $img = $(this);
              var imgID = $img.attr('id');
              var imgClass = $img.attr('class');
              var imgURL = $img.attr('src');
              $.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = $(data).find('svg'); // Add replaced image's ID to the new SVG

                if (typeof imgID !== 'undefined') {
                  $svg = $svg.attr('id', imgID);
                } // Add replaced image's classes to the new SVG


                if (typeof imgClass !== 'undefined') {
                  $svg = $svg.attr('class', imgClass + ' replaced-svg');
                } // Remove any invalid XML tags as per http://validator.w3.org


                $svg = $svg.removeAttr('xmlns:a'); // Check if the viewport is set, if the viewport is not set the SVG wont't scale.

                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                  $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                } // Replace image with new SVG


                $img.replaceWith($svg);
              }, 'xml');
            }); //Portfolio Hover

        });

        // Mfolio Related Portfolio
        elementorFrontend.hooks.addAction('frontend/element_ready/mfolioportfoliorelated.default',function($scope) {
            let $portfolio_v1 = $scope.find('.portfolio_item.style-1');
            $portfolio_v1.on('mousemove', function(event){
                var mx = event.offsetX,
                    my = event.offsetY;

                    $(this).children('.portfolio_info').css({
                        'top' : my + 'px',
                        'left' : mx + 'px'
                    });

            });

            $portfolio_v1.on('mousehover', function(event){
                var mx = event.offsetX,
                    my = event.offsetY;

                    $(this).children('.portfolio_info').css({
                        'top' : my + 'px',
                        'left' : mx + 'px'
                    });

            });

            mfoliodonMasonry();

            $(window).on('resize', mfoliodonMasonry);

            $('.foliodon-wrapper img.svg').each(function () {
              var $img = $(this);
              var imgID = $img.attr('id');
              var imgClass = $img.attr('class');
              var imgURL = $img.attr('src');
              $.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = $(data).find('svg'); // Add replaced image's ID to the new SVG

                if (typeof imgID !== 'undefined') {
                  $svg = $svg.attr('id', imgID);
                } // Add replaced image's classes to the new SVG


                if (typeof imgClass !== 'undefined') {
                  $svg = $svg.attr('class', imgClass + ' replaced-svg');
                } // Remove any invalid XML tags as per http://validator.w3.org


                $svg = $svg.removeAttr('xmlns:a'); // Check if the viewport is set, if the viewport is not set the SVG wont't scale.

                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                  $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                } // Replace image with new SVG


                $img.replaceWith($svg);
              }, 'xml');
            }); //Portfolio Hover

        });

        // Mfolio Portfolio Hover
        elementorFrontend.hooks.addAction('frontend/element_ready/mfolioportfoliohover.default',function($scope) {

            var tabSelect_portfolio = $('[data-portfolio-tab-select]');
            var tab_portfolio = $('[data-portfolio-tab]');

            tabSelect_portfolio.each(function () {
                var tabText_portfolio = $(this).data('portfolio-tab-select');
                $(this).on('mouseenter', function () {
                    $(this).addClass('active').siblings().removeClass('active');
                    tab_portfolio.each(function () {
                        if (tabText_portfolio === $(this).data('portfolio-tab')) {
                            $(this).fadeIn(500).siblings().stop().hide();
                            $(this).addClass('active').siblings().removeClass('active');
                        }
                    });
                });

                if ($(this).hasClass('active')) {
                    tab_portfolio.each(function () {
                        if (tabText_portfolio === $(this).data('portfolio-tab')) {
                            $(this).addClass('active');
                        }

                        if ($(this).hasClass('active')) {
                            $(this).show().siblings().hide();
                        }
                    });
                }
            });

        });

    });
}(jQuery));