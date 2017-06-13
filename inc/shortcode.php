<?php
// [footag foo="bar"]
function wni_shortcode_func ( $atts ) {
    nutritionInfo();
}
add_shortcode( 'nutritiontable', 'wni_shortcode_func ' ); ?>
