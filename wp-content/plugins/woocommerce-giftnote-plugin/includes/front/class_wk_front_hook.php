<?php

class Wk_front_hook
{
   public function __construct()
   {
    $function_handler = new Wk_front_function();
    add_action( 'woocommerce_before_add_to_cart_button',array($function_handler,'woocommerce_product_custom_fields'),10);   
    add_filter( 'woocommerce_add_cart_item_data', array($function_handler,'wk_save_custom_field'),10,3);
    add_filter( 'woocommerce_get_item_data', array($function_handler,'wk_gift_note_item_data'), 10, 2 );
    add_action( 'woocommerce_checkout_create_order_line_item',array($function_handler,'wk_add_custom_data_to_order'), 10, 4);
   }





}