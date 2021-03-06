<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Pasquill
 * @since      1.0.0
 *
 * @package    Content_External_Links_Wp_Plugin
 * @subpackage Content_External_Links_Wp_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Content_External_Links_Wp_Plugin
 * @subpackage Content_External_Links_Wp_Plugin/admin
 * @author     Pasquill <pasquill.x@gmail.com>
 */
class Content_External_Links_Wp_Plugin_Admin {

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

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_External_Links_Wp_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_External_Links_Wp_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-external-links-wp-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_External_Links_Wp_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_External_Links_Wp_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-external-links-wp-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register plugin menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		add_options_page( 'Content External Links', 'Content External Links', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );

	}

	/**
     * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
    public function add_action_links( $links ) {

		$settings_link = array(
		 '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge(  $settings_link, $links );

	 }

	/**
	 * Render the settings page for the plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_setup_page() {

		include_once( 'partials/' . $this->plugin_name . '-admin-display.php' );

	}

	/**
	 * Register options in the allowed options list.
	 *
	 * @since    1.0.0
	 */
	public function register_plugin_options() {

		register_setting( $this->plugin_name, $this->plugin_name );

	}

}
