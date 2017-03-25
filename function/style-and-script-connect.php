<?php

    //объявление стилей
    function reedbuck_enqueue_styles() {
        wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'reedbuck_enqueue_styles');
    //объявление скриптов
    function reedbuck_enqueue_scripts () {
        wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );  
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"), false, '1.12.4');
        wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'reedbuck_enqueue_scripts');
    
?>