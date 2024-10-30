;(function($) {
    'use strict';

    function mfoliodonMasonry(){
        var mfolioselector = $( '.foliodon-masonry' );
        mfolioselector.imagesLoaded( function() {
            mfolioselector.masonry({
                itemSelector: '.foliodon-masonry .portfolio-grid-item',
                columnWidth: '.foliodon-masonry .portfolio-grid-item'
            });
        });
    }
    mfoliodonMasonry();
    $(window).on( 'resize', mfoliodonMasonry );

}(jQuery));