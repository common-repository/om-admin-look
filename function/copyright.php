<?php
add_filter('admin_footer_text', 'oal_left_admin_footer_text_output'); //left side
function oal_left_admin_footer_text_output($text) {
$site_title = get_bloginfo( 'name' );
$site_url = network_site_url( '/' );
$site_description = get_bloginfo( 'description' );
$text = '<a href="'.$site_url.'">All Right Reserved &copy; '. date("Y")." ".$site_title.'</a>';
return $text;
}
?>