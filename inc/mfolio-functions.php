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

    if( class_exists( 'Mfolio_Addon' ) ){
        return;
    }else{

        /**
         * Portfolio Post Type
         */
        add_action( 'init','mfolio_portfolio_li', 0 );

        if( !function_exists( 'mfolio_portfolio_li' ) ){
            function mfolio_portfolio_li(){
                $labels = array(
                    'name'               => esc_html__( 'Portfolios', 'post Category general name', 'mfolio-lite' ),
                    'singular_name'      => esc_html__( 'Portfolio', 'post Category singular name', 'mfolio-lite' ),
                    'menu_name'          => esc_html__( 'Portfolios', 'admin menu', 'mfolio-lite' ),
                    'name_admin_bar'     => esc_html__( 'Portfolio', 'add new on admin bar', 'mfolio-lite' ),
                    'add_new'            => esc_html__( 'Add New', 'Portfolio', 'mfolio-lite' ),
                    'add_new_item'       => esc_html__( 'Add New Portfolio', 'mfolio-lite' ),
                    'new_item'           => esc_html__( 'New Portfolio', 'mfolio-lite' ),
                    'edit_item'          => esc_html__( 'Edit Portfolio', 'mfolio-lite' ),
                    'view_item'          => esc_html__( 'View Portfolio', 'mfolio-lite' ),
                    'all_items'          => esc_html__( 'All Portfolios', 'mfolio-lite' ),
                    'search_items'       => esc_html__( 'Search Portfolios', 'mfolio-lite' ),
                    'parent_item_colon'  => esc_html__( 'Parent Portfolios:', 'mfolio-lite' ),
                    'not_found'          => esc_html__( 'No Portfolios found.', 'mfolio-lite' ),
                    'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash.', 'mfolio-lite' ),
                );

                $args = array(
                    'labels'             => $labels,
                    'description'        => esc_html__( 'Description.', 'mfolio-lite' ),
                    'public'             => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'has_archive'        => true,
                    'hierarchical'       => false,
                    'menu_position'      => null,
                    'show_in_rest'       => true,
                    'menu_icon'          => MFOLIO_LITE_PLUGDIRURI . 'assets/img/favicon.png',
                    'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor', 'custom-fields' ),
                    'rewrite'            => array( 'slug' => 'all-portfolios' ),
                );

                register_post_type( 'mfolio_portfolio', $args );

                $labels = array(
                    'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'mfolio-lite' ),
                    'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'mfolio-lite' ),
                    'search_items'               => esc_html__( 'Search Categorys', 'mfolio-lite' ),
                    'popular_items'              => esc_html__( 'Popular Categorys', 'mfolio-lite' ),
                    'all_items'                  => esc_html__( 'All Categorys', 'mfolio-lite' ),
                    'parent_item'                => null,
                    'parent_item_colon'          => null,
                    'edit_item'                  => esc_html__( 'Edit Category', 'mfolio-lite' ),
                    'update_item'                => esc_html__( 'Update Category', 'mfolio-lite' ),
                    'add_new_item'               => esc_html__( 'Add New Category', 'mfolio-lite' ),
                    'new_item_name'              => esc_html__( 'New Category Name', 'mfolio-lite' ),
                    'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'mfolio-lite' ),
                    'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'mfolio-lite' ),
                    'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'mfolio-lite' ),
                    'not_found'                  => esc_html__( 'No Categorys found.', 'mfolio-lite' ),
                    'menu_name'                  => esc_html__( 'Categories', 'mfolio-lite' ),
                );

                $args = array(
                    'hierarchical'          => true,
                    'labels'                => $labels,
                    'show_ui'               => true,
                    'show_admin_column'     => true,
                    'update_count_callback' => '_update_post_term_count',
                    'query_var'             => true,
                    'show_in_rest'          => true,
                    'rewrite'               => array( 'slug' => 'portfolio-category' ),
                );

                register_taxonomy( 'portfolio_category', 'mfolio_portfolio', $args );

                // Add new taxonomy, NOT hierarchical (like tags)
                $labels = array(
                    'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'mfolio-lite' ),
                    'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'mfolio-lite' ),
                    'search_items'               => esc_html__( 'Search Tags', 'mfolio-lite' ),
                    'popular_items'              => esc_html__( 'Popular Tags', 'mfolio-lite' ),
                    'all_items'                  => esc_html__( 'All Tags', 'mfolio-lite' ),
                    'parent_item'                => null,
                    'parent_item_colon'          => null,
                    'edit_item'                  => esc_html__( 'Edit Tag', 'mfolio-lite' ),
                    'update_item'                => esc_html__( 'Update Tag', 'mfolio-lite' ),
                    'add_new_item'               => esc_html__( 'Add New Tag', 'mfolio-lite' ),
                    'new_item_name'              => esc_html__( 'New Tag Name', 'mfolio-lite' ),
                    'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'mfolio-lite' ),
                    'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'mfolio-lite' ),
                    'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'mfolio-lite' ),
                    'not_found'                  => esc_html__( 'No Tags found.', 'mfolio-lite' ),
                    'menu_name'                  => esc_html__( 'Tags', 'mfolio-lite' ),
                );

                $args = array(
                    'hierarchical'          => false,
                    'labels'                => $labels,
                    'show_ui'               => true,
                    'show_admin_column'     => true,
                    'update_count_callback' => '_update_post_term_count',
                    'query_var'             => true,
                    'show_in_rest'          => true,
                    'rewrite'               => array( 'slug' => 'portfolio-tag' ),
                );

                register_taxonomy( 'portfolio_tag', 'mfolio_portfolio', $args );
            }
        }
        /**
         * Single Template
         */
        add_filter( 'single_template', 'mfolio_lite_template_redirect' );

        function mfolio_lite_template_redirect( $single_template ){

            global $post;

            // Portfolio Single Page
            if( $post ){
                if( $post->post_type == 'mfolio_portfolio' ){
                    $single_template = MFOLIO_LITE_PLUGIN_TEMP . 'single-mfolio_portfolio.php';
                }
            }

            return $single_template;
        }

        /**
         * Archive Template
         */
        add_filter( 'archive_template', 'mfolio_lite_template_archive' );

        function mfolio_lite_template_archive( $archive_template ){

            global $post;

            // Portfolio Archive Template
            if( $post ){
                if( $post->post_type == 'mfolio_portfolio' ){
                    $archive_template = MFOLIO_LITE_PLUGIN_TEMP . 'archive-mfolio_portfolio.php';
                }
            }

            return $archive_template;
        }

        /**
         * add SVG to allowed file uploads
         */
        if( ! function_exists( 'mfolio_mime_types' ) ){
            function mfolio_mime_types( $mimes ) {
                $mimes['svg'] = 'image/svg+xml';
                $mimes['svgz'] = 'image/svgz+xml';
                $mimes['exe'] = 'program/exe';
                $mimes['dwg'] = 'image/vnd.dwg';
                return $mimes;
            }
        }
        add_filter( 'upload_mimes', 'mfolio_mime_types' );

        /**
         * Extend The Upload Type Of File
         */
        if( ! function_exists( 'mfolio_lite_wp_check_filetype_and_ext' ) ){
            function mfolio_lite_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
                $wp_filetype = wp_check_filetype( $filename, $mimes );
                $ext         = $wp_filetype['ext'];
                $type        = $wp_filetype['type'];
                $proper_filename = $data['proper_filename'];

                return compact( 'ext', 'type', 'proper_filename' );
            }
        }
        add_filter( 'wp_check_filetype_and_ext', 'mfolio_lite_wp_check_filetype_and_ext', 10, 4 );

        function mfolio_lite_plugin_scripts() {
            global $post;

            if( is_post_type_archive( 'mfolio_portfolio' ) || is_tax( 'portfolio_category' ) ){

                wp_enqueue_script(
                    'imagesloaded',
                    MFOLIO_LITE_PLUGDIRURI . 'assets/js/masonry/imagesloaded.pkgd.min.js',
                    array( 'jquery' ),
                    false,
                    true
                );

                wp_enqueue_script(
                    'masonry-pkgd',
                    MFOLIO_LITE_PLUGDIRURI . 'assets/js/masonry/masonry.pkgd.min.js',
                    array( 'jquery' ),
                    false,
                    true
                );

                wp_enqueue_script(
                    'mfolio-js',
                    MFOLIO_LITE_PLUGDIRURI . 'assets/js/mfolio.js',
                    array( 'jquery' ),
                    false,
                    true
                );
            }

        }
        add_action( 'wp_enqueue_scripts', 'mfolio_lite_plugin_scripts' );

        /**
         * Image Alt Tag
         */
        function mfolio_lite_addon_image_alt( $url = '' ){
            if( $url != '' ){
                // attachment id by url
                $attachmentid = attachment_url_to_postid( esc_url( $url ) );
                // attachment alt tag
                $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
                if( $image_alt ){
                    return $image_alt ;
                }else{
                    $filename = pathinfo( esc_url( $url ) );
                    $alt = str_replace( '-', ' ', $filename['filename'] );
                    return $alt;
                }
            }else{
                return;
            }
        }

        /**
         * Related Portfolio Image Size
         */
        add_image_size( 'mfolio_related_portfolio', 362, 300, true );
    }