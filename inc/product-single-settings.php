<?php //This filter function will add a custom tab to the Products Data metabox
add_filter( 'woocommerce_product_data_tabs', 'add_my_custom_product_data_tab' , 99 , 1 );
function add_my_custom_product_data_tab( $product_data_tabs ) {
    $product_data_tabs['my-custom-tab'] = array(
        'label' => __( 'Nutritional Info', 'nutritional_info_domain' ),
        'target' => 'my_custom_product_data',
    );
    return $product_data_tabs;
}

// This action will add custom fields to the added custom tabs under Products Data metabox
add_action( 'woocommerce_product_data_panels', 'add_my_custom_product_data_fields' );
function add_my_custom_product_data_fields() {
    global $woocommerce, $post;
    ?>
    <!-- id below must match target registered in above add_my_custom_product_data_tab function -->
    <div id="my_custom_product_data" class="panel woocommerce_options_panel">
        <?php
        woocommerce_wp_text_input( array(
            'id'          => 'energy',
            'class'       => '',
            'label'       => __('Energy', 'nutritional_info_domain'),
            'description' => __('(KJ/kcal)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 Kj / 0 kcal', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'fat',
            'class'       => '',
            'label'       => __('Fat', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'saturated_fat',
            'class'       => '',
            'label'       => __('Saturated fatty acids', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'monounsaturated_fat',
            'class'       => '',
            'label'       => __('Monounsaturated fatty acids', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'polyunsaturated_fat',
            'class'       => '',
            'label'       => __('Polyunsaturated fatty acids', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'carb',
            'class'       => '',
            'label'       => __('Carbohydrate', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'sugar',
            'class'       => '',
            'label'       => __('Sugar', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'polyol',
            'class'       => '',
            'label'       => __('Polyols', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id' => 'starch',
            'class' => '',
            'label' => __('Starch', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip' => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'fiber',
            'class'       => '',
            'label'       => __('Dietary fiber', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'protein',
            'class'       => '',
            'label'       => __('Protein', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'salt',
            'class'       => '',
            'label'       => __('Salt', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('0 g', 'nutritional_info_domain')
        ) );
        woocommerce_wp_text_input( array(
            'id'          => 'vitamin_mineral',
            'class'       => '',
            'label'       => __('Vitamins and minerals', 'nutritional_info_domain'),
            'description' => __('(gram)', 'nutritional_info_domain'),
            'desc_tip'    => false,
            'placeholder' => __('none', 'nutritional_info_domain')
        ) );

        ?>
    </div>
    <?php
}

// Save custom fields data of products tab:
add_action( 'woocommerce_process_product_meta', 'woocommerce_process_product_meta_fields_save' );
function woocommerce_process_product_meta_fields_save( $post_id ){
    update_post_meta( $post_id, 'energy', stripslashes( $_POST['energy'] ) );
    update_post_meta( $post_id, 'fat', stripslashes( $_POST['fat'] ) );
    update_post_meta( $post_id, 'saturated_fat', stripslashes( $_POST['saturated_fat'] ) );
    update_post_meta( $post_id, 'monounsaturated_fat', stripslashes( $_POST['monounsaturated_fat'] ) );
    update_post_meta( $post_id, 'polyunsaturated_fat', stripslashes( $_POST['polyunsaturated_fat'] ) );
    update_post_meta( $post_id, 'carb', stripslashes( $_POST['carb'] ) );
    update_post_meta( $post_id, 'sugar', stripslashes( $_POST['sugar'] ) );
    update_post_meta( $post_id, 'polyol', stripslashes( $_POST['polyol'] ) );
    update_post_meta( $post_id, 'starch', stripslashes( $_POST['starch'] ) );
    update_post_meta( $post_id, 'fiber', stripslashes( $_POST['fiber'] ) );
    update_post_meta( $post_id, 'protein', stripslashes( $_POST['protein'] ) );
    update_post_meta( $post_id, 'salt', stripslashes( $_POST['salt'] ) );
    update_post_meta( $post_id, 'vitamin_mineral', stripslashes( $_POST['vitamin_mineral'] ) );
} ?>
