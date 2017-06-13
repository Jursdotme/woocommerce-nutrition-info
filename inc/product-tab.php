<?php
if (get_option( 'wc_nutrients_settings_tab_position' ) == 'tab') {
    // Add tab to single product pages
    add_filter( 'woocommerce_product_tabs', 'nutritional_content_tab' );
}

function nutritional_content_tab( $tabs ) {

	// Adds the new tab
	$tabs['nutrient_tab'] = array(
		'title' 	=> __( 'Nutrients', 'nutritional_info_domain' ),
		'priority' 	=> 50,
		'callback' 	=> 'nutritional_content_tab_content'
	);

	return $tabs;

}
function nutritional_content_tab_content() {

	// The new tab content
	echo '<h2>' . __('New Product Tab', 'nutritional_info_domain') . '</h2>';
	nutritionInfo();

} ?>
