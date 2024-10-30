<?php
/**
 * @Packge     : Mfolio
 * @Version    : 1.0
 * @Author     : ThemeLooks
 * @Author URI : https://www.themelooks.com/
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
    if( have_posts() ){
        echo '<div class="mfolio-fluid">';
            echo '<div class="portfolio-details">';
                while( have_posts( ) ) :
                    the_post();
                    the_content();
                endwhile;
                wp_reset_postdata();
            echo '</div>';
        echo '</div>';
    }
    //footer
    get_footer();