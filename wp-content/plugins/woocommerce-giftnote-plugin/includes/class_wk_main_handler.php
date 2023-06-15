<?php

class Wk_Main_Handler
{


    public function __construct()
    {

    if(is_admin()) {

        new Wk_front_hook();
        new Wk_front_function();

    } else {

        new Wk_front_hook();
        new Wk_front_function();
    }
        
    }
    

    




}