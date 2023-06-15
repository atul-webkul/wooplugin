<?php

class Wk_front_function {

    /**
     *  register permalink endpoint
     */
    public function wk_custom_endpoint() {
        add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
        $this->install();
    }
    

    /**
     * Insert the new endpoint into the My Account menu.
     */
    public function wk_new_menu_items( $items ) {
        $items[ 'profile' ] = 'Profile';
        return $items;
    }

    /**
     *To add Content to Endpoint 
    */
    public function wk_endpoint_content() {
        $current_user = wp_get_current_user();
        $user_meta = get_userdata($current_user->ID);  
        // echo "<pre>";
        //  print_r($user_meta->ID);
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <h3>profile information</h3>
        <table class="form-table">
        <tr>
        <td>
        <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>" class="form-control"/>
        <input type="text" name="wk_nicename" id="" value="<?= $user_meta->user_nicename; ?>" required class="regular-text" />
        <input type="text" name="wk_email" id="" value="<?= $user_meta->user_email;?>" required class="regular-text" />
        <input type="text" name="wk_firstname" id="" value="<?= $user_meta->user_firstname;?>" required class="regular-text" />
        <input type="text" name="wk_lastname" id="" value="<?= $user_meta->user_lastname;?>" required class="regular-text" />
        <input type="text" name="wk_password" id="" value="" placeholder="Current Password" class="regular-text" />
        <input type="text" name="wk_newpassword" id="" value="" placeholder="New Password" class="regular-text" />
        <input type="text" name="wk_cnewpassword" id="" value="" placeholder="Confirm Password" class="regular-text" />

        <input type='submit' class="button-primary" name="wk_update" value="update" id="update"/><br />
        </td>
        </tr>   
        </table></form>

        <?php

    }

    /**
     * Function to update user details
     */
    public function wk_profile_fields() {
        if(isset( $_POST['wk_update'])) {
            $user_id=sanitize_text_field($_POST['user_id']);
            $user_meta = get_userdata(get_current_user_id());  
            if($_POST['wk_password'] != ''){
            if (wp_check_password( $_POST['wk_password'], $user_meta->user_pass, $user_meta->ID ) ) {
                if($_POST['wk_newpassword'] == $_POST['wk_cnewpassword']){
                wp_set_password($_POST['wk_newpassword'], $user_meta->ID);
                } else {
                    echo "new and confirm password not matched";
                }
            } else {
                echo "you have entered wrong password";
            }
        }
            $user_data = array(
                'ID' => $user_id,
                'user_nicename' => $_POST['wk_nicename'],
                'user_email' => $_POST['wk_email'],
                'first_name' => $_POST['wk_firstname'],
                'last_name' => $_POST['wk_lastname']
                );
             $result = wp_update_user( $user_data );

             if ( is_wp_error($result) ) {
                echo 'Error updating user: ' . $result->get_error_message();
            }
        }
    }


    public function woocommerce_product_custom_fields () {
    
        ?>
        <div>
        <input type="text" name="gift-text" id="gift-text">
        <br>
        <br>
        </div>
        <?php
        }

    public function wk_save_custom_field( $cart_item_data, $product_id, $qty ) {
        $gift_note = filter_input( INPUT_POST, 'gift-text' );

        if ( empty( $gift_note ) ) {
            return $cart_item_data;
        }

        $cart_item_data['gift-text'] = $gift_note;
    
        return $cart_item_data;
    }

    public function wk_gift_note_item_data( $item_data, $cart_item ) {

        if ( isset( $cart_item['gift-text'] ) ){
            $item_data[] = array(
                'key' => 'Name',
                'display' => $cart_item['gift-text']
            );
        }
    
        return $item_data;
    
    }
	/**
	 * Plugin install action.
	 * Flush rewrite rules to make our custom endpoint available.
	 */
    public static function install() {
		flush_rewrite_rules();
	}

}