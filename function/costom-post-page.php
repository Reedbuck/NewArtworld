<?php

add_action( 'init', 'tovar_register_post_type_init' ); // Использовать функцию только внутри хука init
 
function tovar_register_post_type_init() {
	$labels = array(
		'name' => 'Товары',
		'singular_name' => 'Товар', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Товар',
		'add_new_item' => 'Добавить новый Товар', // заголовок тега <title>
		'edit_item' => 'Редактировать Товар',
		'new_item' => 'Новый Товар',
		'all_items' => 'Все Товар',
		'view_item' => 'Просмотр Товара на сайте',
		'search_items' => 'Искать Товар',
		'not_found' =>  'Товар не найден.',
		'not_found_in_trash' => 'В корзине нет Товаров.',
		'menu_name' => 'Товары' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => get_stylesheet_directory_uri() .'/images/icon-admin.png', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail', 'page-attributes'),
        'rewrite' => array( 'slug' => 'delay')
	);
	register_post_type('tovar', $args);
}

add_filter( 'post_updated_messages', 'tovar_post_type_messages' );
 
function tovar_post_type_messages( $messages ) {
	global $post, $post_ID;
 
	$messages['tovar'] = array( // slug - название созданного нами типа записей
		0 => '', // Данный индекс не используется.
		1 => sprintf( 'Товар обновлен. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		2 => 'Параметр обновлён.',
		3 => 'Параметр удалён.',
		4 => 'Товар обновлен',
		5 => isset($_GET['revision']) ? sprintf( 'Товар восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( 'Товар опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		7 => 'Товар сохранен.',
		8 => sprintf( 'Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( 'Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
 
	return $messages;
}



add_action( 'init', 'zakaz_register_post_type_init' ); // Использовать функцию только внутри хука init
 
function zakaz_register_post_type_init() {
	$labels = array(
		'name' => 'Заказчики',
		'singular_name' => 'Заказчик', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Заказчика',
		'add_new_item' => 'Добавить нового Заказчика', // заголовок тега <title>
		'edit_item' => 'Редактировать Заказчика',
		'new_item' => 'Новый Заказчик',
		'all_items' => 'Все Заказчики',
		'view_item' => 'Просмотр Заказчика на сайте',
		'search_items' => 'Искать Заказчика',
		'not_found' =>  'Заказчик не найден.',
		'not_found_in_trash' => 'В корзине нет Заказчиков.',
		'menu_name' => 'Заказчики' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => get_stylesheet_directory_uri() .'/images/icon-admin.png', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail', 'page-attributes'),
        'rewrite' => array( 'slug' => 'zakazshik')
	);
	register_post_type('zakaz', $args);
}

add_filter( 'post_updated_messages', 'zakaz_post_type_messages' );
 
function zakaz_post_type_messages( $messages ) {
	global $post, $post_ID;
 
	$messages['zakaz'] = array( // slug - название созданного нами типа записей
		0 => '', // Данный индекс не используется.
		1 => sprintf( 'Заказчик обновлен. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		2 => 'Параметр обновлён.',
		3 => 'Параметр удалён.',
		4 => 'Заказчик обновлен',
		5 => isset($_GET['revision']) ? sprintf( 'Заказчик восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( 'Заказчик опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		7 => 'Товар сохранен.',
		8 => sprintf( 'Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( 'Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
 
	return $messages;
}
?>