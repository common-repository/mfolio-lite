<?php
/**
 * @Packge     : Mfolio
 * @Version    : 1.0
 * @Author     : ThemeLooks
 * @Author URI : https://www.themelooks.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();

    if( have_posts() ){
        echo '<section class="pt-140">';
            echo '<div class="foliodon-wrapper container">';
                echo '<div class="foliodon-row foliodon-gutters-60 foliodon-row-cols-3 foliodon-masonry">';
                    while( have_posts( ) ) :
                        the_post();
                        echo '<div class="portfolio-grid-item">';
    	                    echo '<!-- Project Item -->';
    	                    echo '<div class="project-item agency">';
    							if( has_post_thumbnail() ){
    		                        echo '<div class="project-image">';
    		                            echo '<a href="'.esc_url( get_the_permalink() ).'">';
    		                                the_post_thumbnail();
    		                            echo '</a>';
    		                        echo '</div>';
    							}
    	                        echo '<div class="project-info">';
    								if( get_the_title() ){
    		                            echo '<h2> <a href="'.esc_url( get_the_permalink() ).'">' .wp_kses_post( get_the_title() ). '</a></h2>';
    								}
    								$mfolio_portfolio_cat_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
    								if( !empty( $mfolio_portfolio_cat_terms ) ){
    									foreach( $mfolio_portfolio_cat_terms as $terms ){
    										echo '<p><a href="'.esc_url( get_term_link( $terms ) ).'">'.esc_html( ucfirst( $terms->name ) ).'</a></p>';
    									}
    								}
    	                        echo '</div>';
    	                    echo '</div>';
    	                    echo '<!-- End of Project Item -->';
    	                echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                echo '</div>';
            echo '</div>';
        echo '</section>';
    }

    //footer
    get_footer();