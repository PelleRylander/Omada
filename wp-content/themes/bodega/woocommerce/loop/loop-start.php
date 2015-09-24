<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>

<?php global  $qode_options; 
$products_list_type = 'type1';
	if(isset($qode_options['woo_products_list_type'])){
	$products_list_type = $qode_options['woo_products_list_type'];
}

$products_hover_list_type = 'hover_type1';
if(isset($qode_options['woo_products_hover_list_type'])){
    $products_hover_list_type = $qode_options['woo_products_hover_list_type'];
}
$class='';
if($products_list_type == 'type1'){
	$class = 'type1';
} elseif($products_list_type=='type2'){
	$class = 'type2';
} elseif ($products_list_type=='type3'){
	$class = 'type3';
}
$hover_class='';
if($products_hover_list_type == 'hover_type1'){
    $hover_class = 'hover_type1';
} elseif($products_hover_list_type=='hover_type2'){
    $hover_class = 'hover_type2';
}
?>

<ul class="products clearfix <?php echo esc_attr($class ).' '. esc_attr($hover_class); ?>">