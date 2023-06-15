<?php

class Wk_front_function
{
   
    /**
     * To add Custom Field to product show page
     */
    public function woocommerce_product_custom_fields () {
    
        ?>
        <div>
        <input type="text" name="gift-text" id="gift-text">
        <br>
        <br>
        </div>
        <?php
        }

    /**
     * To save custom field
     */
    public function wk_save_custom_field( $cart_item_data, $product_id, $qty ) {
        $gift_note = filter_input( INPUT_POST, 'gift-text' );

        if ( empty( $gift_note ) ) {
            return $cart_item_data;
        }
        $cart_item_data['gift-text'] = $gift_note;
    
        return $cart_item_data;
    }

    /**
     * To show note of custom field
     */
    public function wk_gift_note_item_data( $item_data, $cart_item ) {

        if ( isset( $cart_item['gift-text'] ) ){
            $item_data[] = array(
                'key' => 'Gift-Note',
                'display' => $cart_item['gift-text']
            );
        }
    
        return $item_data;

    }

    /**
     * Add custom field to order object
     */
    public function wk_add_custom_data_to_order( $item, $cart_item_key, $values, $order ) {
                foreach( $item as $cart_item_key=>$values ) {
                if( isset( $values['gift-text'] ) ) {
                $item->add_meta_data( __( 'gift-text', 'cfwc' ), $values['gift-text'], true );
            }
        }
    }





}