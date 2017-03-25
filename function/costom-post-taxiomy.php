<?php
add_action( 'init', 'create_tovar_taxonomies', 0 );
 
// функция, создающая таксономию "Разделы" для постов типа "Товары"
 
function create_tovar_taxonomies(){
 
  // определяем заголовки для 'Разделы'
  $labels = array(
	'name' => _x( 'razdelis', 'taxonomy general name' ),
	'singular_name' => _x( 'razdeli', 'taxonomy singular name' ),
	'search_items' =>  __( 'Искать Разделы' ),
	'popular_items' => __( 'Популярные Разделы' ),
	'all_items' => __( 'Все Разделы' ),
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __( 'Править Раздел' ),
	'update_item' => __( 'Обновить Раздел' ),
	'add_new_item' => __( 'Добавить новый Раздел' ),
	'new_item_name' => __( 'Имя нового Раздела' ),
	'separate_items_with_commas' => __( 'Separate writers with commas' ),
	'add_or_remove_items' => __( 'Добавить или удалить Раздел' ),
	'choose_from_most_used' => __( 'Choose from the most used writers' ),
	'menu_name' => __( 'Разделы' ),
  );
// Добавляем древовидную таксономию 'Разделы' (как рубрики), чтобы сделать НЕ девовидную (как метки) значение для 'hierarchical' => false,
 
register_taxonomy('tovar-category', 'tovar',array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'razdel' ),
  ));
}
?>