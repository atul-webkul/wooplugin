<?php

class Wk_Main_handler {

    /**
     * check for admin and load class 
     */
    public function __construct(){

        if(is_admin()) {

            new Wk_front_function();
            new Wk_front_hook();

        } else {
            
            new Wk_front_function();
            new Wk_front_hook();

        }
    }
   
}