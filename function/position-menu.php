<?php

    add_theme_support( 'post-thumbnails' ); // для всех типов постов

    //добавление возможность создавать меню
    if (function_exists('add_theme_support')) {
        add_theme_support('menus');
    }

    //добавление позиций меню
        register_nav_menus( array(
        'top_menu' => 'Меню сверху',
        'footer_menu1' => 'Меню в подвале1',
        'footer_menu2' => 'Меню в подвале2',
        'footer_menu3' => 'Меню в подвале3',

    ) );
?>