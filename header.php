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
<div class="our_container">
<header>
    <section class="site_logo">
        <div class="container">
            <div class="col-xs-12 col-sm-6 col-md-9">
                <img src="" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <form>
                   <p>
                       <input type="search" name="q" placeholder="Поиск"> 
                       <input type="submit" value="&#128269;">
                   </p>
                </form>
            </div>
        </div>
    </section>
    <section class="nav_section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav class="navbar navbar-default main_nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                       <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php /* Primary navigation */
                                wp_nav_menu( array(
                                    'menu' => 'top_menu',
                                    'depth' => 2,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav',
                                    //Process nav menu using our custom nav walker
                                    'walker' => new wp_bootstrap_navwalker())
                                );
                            ?>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
    </section>
</header>