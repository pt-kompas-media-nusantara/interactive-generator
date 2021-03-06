<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', [ $this, 'add_generator_menu' ] );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( $hook === 'toplevel_page_interactive-generator' || strpos($hook, 'shortcode-generator') !== false) :
			wp_enqueue_style( 'tailwind-css', 'https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css', [], $this->version );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/interactive-generator.css', [], $this->version, 'all' );
		endif;
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( $hook === 'toplevel_page_interactive-generator' || strpos($hook, 'shortcode-generator') !== false) :
			wp_enqueue_script('hgcharts', 'https://code.highcharts.com/highcharts.js', [], '2.6.10', true );
			wp_enqueue_script('vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js', [], '2.6.10', true );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/interactive-generator.js', ['vue', 'jquery'], $this->version, true );
		endif;
	}
	// Tambah menu di sidebar wordpress, jangan lupa regis di __construct
	public function add_generator_menu() {
			if ( !is_admin() ) return;
			add_menu_page( 'Shortcode Generator', 'Shortcode Generator', 'edit_posts', 'interactive-generator', [$this, 'interactive_generator'], 'dashicons-star-empty' );
			add_submenu_page( 'interactive-generator', 'Gallery', 'Gallery', 'edit_posts', 'gallery-generator', [$this, 'gallery_generator']);
			add_submenu_page( 'interactive-generator', 'Timeline', 'Timeline', 'edit_posts', 'timeline-generator', [$this, 'timeline_generator']);
			add_submenu_page( 'interactive-generator', 'Photo 360', 'Photo 360', 'edit_posts', 'pannellum-generator', [$this, 'pannellum_generator']);
			add_submenu_page( 'interactive-generator', 'Compare Photos', 'Compare Photos', 'edit_posts', 'compare-generator', [$this, 'compare_generator']);
  		add_submenu_page( 'interactive-generator', 'Highcharts', 'Highcharts', 'edit_posts', 'highcharts-generator', [$this, 'highcharts_generator']);
  		add_submenu_page( 'interactive-generator', 'Highcharts - Pie', 'Highcharts - Pie', 'edit_posts', 'highcharts-pie-generator', [$this, 'highcharts_pie_generator']);
	}
	public function interactive_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-index.php';
	}
	public function gallery_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-gallery.php';
	}
	public function timeline_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-timeline.php';
	}
	public function compare_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-twenty.php';
	}
	public function pannellum_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-pannellum.php';
	}
	public function highcharts_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-highcharts.php';
	}
	public function highcharts_pie_generator(){
		include_once plugin_dir_path( __FILE__ ) . '/partials/interactive-highcharts-pie.php';
	}
}
