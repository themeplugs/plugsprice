<?php 
/*
Plugin Name: PlusPrice
Plugin URI: http://themeplugs.com/
Author: Themeplugs
Author URI: http://themeplugs.com/
Version: 1.0.1
Text Domain: plugsprice
Description: Plusprice is pricing addons for – Elementor Page Builder. It’s have pricing table style with huge option. You can use this plusprice plugins on your website easily.

PlusPrice is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

PlusPrice is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with PlusPrice.  If not, see <https://www.gnu.org/licenses/>. 
*/
use \Elementor\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die(esc_html__("Direct Access Not Allow",'plugsprice'));
}

final class Elementorplugsprice {

	const VERSION = "1.0.0";
	const MINIMUM_ELEMENTOR_VERSION = "2.6.8";
	const MINIMUM_PHP_VERSION = "7.0";

	private static $_instance = null;
   
    //instance 
    public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}


	public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }
	public function init() {
		load_plugin_textdomain( 'plugsprice' );
	
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

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_new_cat' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'pricing_editor_assets' ] );
	}

	function pricing_editor_assets(){
		wp_enqueue_script("pricing-editor-js", plugins_url("/assets/js/scripts.js",__FILE__),array("jquery"),time(),true);
	
	}

	public function widget_styles(){
		wp_enqueue_style('fontawesome', plugins_url('/assets/css/fontawesome.min.css',__FILE__ ), '5.13.0');
		wp_enqueue_style('priceplugs', plugins_url('/assets/css/style.css',__FILE__ ), '1.0.0');
	}
	function register_new_cat($manager){
		$manager->add_category('pricingtable',[
			'title'=>esc_html('Themeplugs','plugsprice'),
			'icon' => 'fa fa-plug',
		]);
	}

    public function init_widgets(){
		// Include Widget files

		// price style1
        require_once( __DIR__ . '/widgets/price-style1.php' );
		Plugin::instance()->widgets_manager->register_widget_type( new \PlugsPriceOne() );

		// price style2
        require_once( __DIR__ . '/widgets/price-style2.php' );
		Plugin::instance()->widgets_manager->register_widget_type( new \PlugsPriceTwo() );

	}
	
    public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'plugsprice' ),
			'<strong>' . esc_html__( 'PlugsPrice', 'plugsprice' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'plugsprice' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    
    public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'plugsprice' ),
			'<strong>' . esc_html__( 'PlugsPrice', 'plugsprice' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'plugsprice' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

    public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'plugsprice' ),
			'<strong>' . esc_html__( 'PlugsPrice', 'plugsprice' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'plugsprice' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    
	public function includes() {}

}
Elementorplugsprice::instance();