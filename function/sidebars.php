<?php
add_action( 'widgets_init', 'reedbuck_register_wp_sidebars' );

function reedbuck_register_wp_sidebars() {
 
	/* первый сайдбар */
	register_sidebar(
		array(
			'id' => 'right_side1', // уникальный id
			'name' => 'Боковая колонка на страницах деятельность', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget deplay %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>',
		)
        
	);
	register_sidebar(
		array(
			'id' => 'right_side2', // уникальный id
			'name' => 'Боковая колонка на страницах Новости', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget news %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>',
		)
        
	);
	register_sidebar(
		array(
			'id' => 'right_side3', // уникальный id
			'name' => 'Боковая колонка на главной', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget news %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>',
		)
        
	);
    
    
}
 
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	global $post;
	return '<br><a class="expert" href="'. get_permalink($post->ID) . '">Подробнее...</a>';
}

function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

?>