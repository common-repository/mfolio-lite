<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Mfolio Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Mfolio_Lite_Addon {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
        if( class_exists( 'Mfolio_Addon' ) ){
            return;
        }else{
    		// Check if Elementor installed and activated
    		if ( ! did_action( 'elementor/loaded' ) ) {
    			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
    			return;
    		}

    		// Check for required Elementor version
    		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
    			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
    			return;
    		}

    		// Check for required PHP version
    		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
    			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
    			return;
    		}

    		// Add Plugin actions
    		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

    		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_editor_scripts' ] );

            // Register widget scripts
    		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

    		// Specific Register widget scripts
    		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'mfolio_regsiter_widget_scripts' ] );

            // category register
    		add_action( 'elementor/elements/categories_registered',[ $this, 'mfolio_elementor_widget_categories' ] );
        }
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'mfolio-lite' ),
			'<strong>' . esc_html__( 'Mfolio Lite', 'mfolio-lite' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'mfolio-lite' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'mfolio-lite' ),
			'<strong>' . esc_html__( 'Mfolio Lite', 'mfolio-lite' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'mfolio-lite' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'mfolio-lite' ),
			'<strong>' . esc_html__( 'Mfolio Lite', 'mfolio-lite' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'mfolio-lite' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

        // if( class_exists( 'Mfolio_Addon' ) ){
        //     return;
        // }else{
            // Include Widget files
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-grid.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-meta.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-filter.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-slider.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-hover.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-gallery.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-details-banner.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/double-image.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-simple-slider.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-section-title.php' );
            require_once( MFOLIO_LITE_ADDONS . '/widgets/portfolio-related.php' );

            // Register widget
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Grid() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Meta() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Filter() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Slider() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Hover() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Gallery() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Details_Banner() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Double_Image() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Simple_Slider() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Section_Title() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mfolio_Portfolio_Related() );
    	// }
	}

	public function enqueue_editor_scripts() {
		wp_enqueue_style(
            'mfolio-icons',
            MFOLIO_LITE_PLUGDIRURI . 'assets/css/mfolio.css',
            null,
            '1.0'
        );

	}

    public function widget_scripts() {
        wp_enqueue_script(
        	'mfolio-frontend-scripts',
            MFOLIO_LITE_PLUGDIRURI . 'assets/js/mfolio-frontends.js',
            array( 'jquery' ),
            false,
            true
		);

	}

	public function mfolio_regsiter_widget_scripts( ) {

        wp_enqueue_style(
            'mfolio-css',
            MFOLIO_LITE_PLUGDIRURI . 'assets/css/style.css',
            null,
            '1.0'
        );

		wp_register_script(
            'isotope',
        	MFOLIO_LITE_PLUGDIRURI . 'assets/js/isotope/isotope.pkgd.min.js',
            array('jquery'),
            '3.0.6',
            true
		);

		wp_register_script(
            'masonary-pkgd',
        	MFOLIO_LITE_PLUGDIRURI . 'assets/js/masonry/masonry.pkgd.min.js',
            array('jquery'),
            '4.2.2',
            true
		);

		wp_register_script(
            'imagesloaded',
        	MFOLIO_LITE_PLUGDIRURI . 'assets/js/masonary/imagesloaded.pkgd.min.js',
            array( 'jquery' ),
            '4.1.4',
            true
		);

	}

    function mfolio_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'mfolio-lite',
            [
                'title' => esc_html__( 'Mfolio Lite', 'mfolio-lite' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}

Mfolio_Lite_Addon::instance();