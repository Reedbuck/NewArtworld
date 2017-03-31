<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php get_header( 'list' ); ?>
    <?php wp_head(); ?>
    
</head>
    
    
<body <?php body_class(); ?>>
    <header>
        <div class="header__information">
            <div class="container">
                <div class="col-md-4 logo"></div>
                <div class="col-md-5 search"></div>
                <div class="col-md-3 quote"></div>
            </div>
        </div>
        <div class="header__navigation">
            <div class="container">
                <div class="col-md-9 navigation-menu">
                    <?php wp_nav_menu( array( 'container_class' => 'navigation-menu__top', 'theme_location' => 'top_menu' ) ); ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </header>