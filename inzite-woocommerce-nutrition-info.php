<?php
/*
Plugin Name: Woocommerce Nutrition Info
Plugin URI:  https://jurs.me
Description: Display nutritional information on you woocommerce product pages.
Version:     0.0.1
Author:      Rasmus Jürs
Author URI:  https://jurs.me/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: nutritional_info_domain
Domain Path: /languages
*/

function wni_load_textdomain() {
    load_plugin_textdomain( 'nutritional_info_domain', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wni_load_textdomain' );

define('WNI_BUNDLE_VERSION', '0.0.1');
define('WNI_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WNI_PLUGIN_URL', plugin_dir_url(__FILE__));

include WNI_PLUGIN_PATH . 'inc/general-settings.php'; // Set up general settings tab in woocommerce settings.
include WNI_PLUGIN_PATH . 'inc/product-single-settings.php'; // Add nutrients tab to woocommerce product pages.
include WNI_PLUGIN_PATH . 'inc/template.php'; // Nutrients display function
include WNI_PLUGIN_PATH . 'inc/product-tab.php'; // Nutrients display function

wp_enqueue_style( 'slider', WNI_PLUGIN_URL . '/css/styles.css',false,'1.1','all');

if (get_option( 'wc_nutrients_settings_tab_position' ) == 'after_product_summary') {
    add_action('woocommerce_single_product_summary', 'nutritionInfo', '45');
}

if (get_option( 'wc_nutrients_settings_tab_position' ) == 'after_add_to_cart') {
    add_action('woocommerce_single_product_summary', 'nutritionInfo', '35');
}

if (get_option( 'wc_nutrients_settings_tab_position' ) == 'after_excerpt') {
    add_action('woocommerce_single_product_summary', 'nutritionInfo', '25');
}

if (get_option( 'wc_nutrients_settings_tab_position' ) == 'after_price') {
    add_action('woocommerce_single_product_summary', 'nutritionInfo', '15');
}

if (get_option( 'wc_nutrients_settings_tab_position' ) == 'in_description_tab') {
    add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
}

function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
    $heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) ) );
    ?>

    <?php if ( $heading ) : ?>
      <h2><?php echo $heading; ?></h2>
    <?php endif; ?>

    <?php the_content();
	nutritionInfo();
}
