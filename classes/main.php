<?php
namespace sMyles\Pantheon\ENV;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Main initiation class
 *
 * @since  1.0.0
 * @var  string $version  Plugin version
 * @var  string $basename Plugin basename
 * @var  string $url      Plugin URL
 * @var  string $path     Plugin Path
 */
class Main {

	/**
	 * @var null|\sMyles\Pantheon\ENV\Main
	 */
	protected static $single_instance = null;

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return Main A single instance of this class.
	 * @since  1.0.0
	 */
	public static function get_instance() {

		if ( null === self::$single_instance ) {
			self::$single_instance = new self();
		}

		return self::$single_instance;
	}

	/**
	 * Sets up our plugin
	 *
	 * @since  1.0.0
	 */
	protected function __construct() {
		add_action( 'admin_bar_menu', array( $this, 'admin_bar' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'maybe_output_css' ), 100 );
		add_action( 'admin_enqueue_scripts', array( $this, 'maybe_output_css' ), 100 );
	}

	/**
	 * Plugins Loaded
	 *
	 * @since @@version
	 *
	 */
	public function plugins_loaded(  ) {

	}

	/**
	 * Output CSS
	 *
	 * @since @@version
	 *
	 */
	public function maybe_output_css() {
		if( is_admin_bar_showing() ){
			wp_register_style( 'pantheon-env-admin-bar', false );
			wp_enqueue_style( 'pantheon-env-admin-bar' );
			wp_add_inline_style( 'pantheon-env-admin-bar', '#wpadminbar ul li.pantheon-env-admin-bar{ background-color: cadetblue;} #wpadminbar ul li.peab-live { background-color: red; } #wpadminbar ul li.peab-dev, #wpadminbar ul li.peab-lando { background-color: green; } #wpadminbar ul li.peab-test { background-color: orange; }' );
		}
	}

	/**
	 * Add Admin Bar
	 *
	 * @param $wp_admin_bar
	 *
	 * @since 1.0.0
	 *
	 */
	public function admin_bar( $wp_admin_bar ) {
		$env = isset( $_ENV['PANTHEON_ENVIRONMENT'] ) ? sanitize_text_field( $_ENV['PANTHEON_ENVIRONMENT'] ) : false;

		if( ! $env ){
			return;
		}

		$args = array(
			'id'    => 'pantheon-env-admin-bar',
			'title' => strtoupper( $env ),
			'meta'  => array(
				'class' => "pantheon-env-admin-bar peab-{$env}"
			)
		);

		$wp_admin_bar->add_node( $args );
	}
}
