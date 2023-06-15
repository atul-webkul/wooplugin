<?php

class Wk_front_hook {
 
    /**
     * Call add classes of function and hooks
     */
    public function __construct()
    {
        $endpoint = 'profile';
        $function_handler = new Wk_front_function();
        add_action('init', array($function_handler,'wk_custom_endpoint' ));
        add_filter('woocommerce_account_menu_items', array($function_handler,'wk_new_menu_items' ));
        add_action('woocommerce_account_'.$endpoint.'_endpoint', array($function_handler , 'wk_endpoint_content' ));
        add_action( 'init', array($function_handler,'wk_profile_fields' ) );
        add_action( 'woocommerce_before_add_to_cart_button',array($function_handler,'woocommerce_product_custom_fields'),10);   
        add_filter( 'woocommerce_add_cart_item_data', array($function_handler,'wk_save_custom_field'),10,3);
        add_filter( 'woocommerce_get_item_data', array($function_handler,'wk_gift_note_item_data'), 10, 2 );
    }
}