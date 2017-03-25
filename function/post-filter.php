<?php



function go_filter() { // наша функция
    
	$args = array(
        'post_type' => 'tovar',
    ); // подготовим массив 
    $args['taxonomy'] = $_POST['taxonomy'];
    $args['post_type'] = 'tovar';
	
    $args['meta_query']['relation'] = 'AND'; // отношение между условиями, у нас это "И то И это", можно ИЛИ(OR)
    $args['meta_query']['post-type'] = 'tovar';
	global $wp_query; // нужно заглобалить текущую выборку постов

	if ($_POST['razdel'] != '') { // если передана фильтрация по разделу
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'razdel', // название произвольного поля
			'value' => (int)$_POST['razdel'], // переданное значение произвольного поля
			'type' => 'numeric' // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
			);
	}

	if ($_POST['price_min'] != '' || $_POST['price_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['price_min'] == '') $_POST['price_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['price_max'] == '') $_POST['price_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'price', // название произвольного поля
            'post_type' => 'tovar',
			'value' => array( (int)$_POST['price_min'], (int)$_POST['price_max'] ), // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => 'BETWEEN' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['temper_min'] != '' || $_POST['temper_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['temper_min'] == '') $_POST['temper_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['temper_max'] == '') $_POST['temper_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'temper_min', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['temper_min'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '<=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['temper_min'] != '' || $_POST['temper_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['temper_min'] == '') $_POST['temper_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['temper_max'] == '') $_POST['temper_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'temper_max', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['temper_max'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '>=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['obiem_kam_min'] != '' || $_POST['obiem_kam_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['obiem_kam_min'] == '') $_POST['obiem_kam_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['obiem_kam_max'] == '') $_POST['obiem_kam_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'max_obiem_kam', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['obiem_kam_max'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '<=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}   
    
    if ($_POST['obiem_kam_min'] != '' || $_POST['obiem_kam_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['obiem_kam_min'] == '') $_POST['obiem_kam_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['obiem_kam_max'] == '') $_POST['obiem_kam_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'min_obiem_kam', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['obiem_kam_min'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '>=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    
    if ($_POST['chastota_min'] != '' || $_POST['chastota_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['chastota_min'] == '') $_POST['chastota_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['chastota_max'] == '') $_POST['chastota_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'chastota_min', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['chastota_min'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '>=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['chastota_min'] != '' || $_POST['chastota_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['chastota_min'] == '') $_POST['chastota_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['chastota_max'] == '') $_POST['chastota_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'chastota_max', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['chastota_max'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '<=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    
    if ($_POST['obeves_min'] != '' || $_POST['obeves_max'] != '') { // если передано поле "Цена от" или "Цена до"
		if ($_POST['obeves_min'] == '') $_POST['obeves_min'] = 0; // если "Цена от" пустое, то значит от 0 и выше
		if ($_POST['obeves_max'] == '') $_POST['obeves_max'] = 9999999; // если "Цена до" пустое, то будет до 9999999
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'obeves_min', // название произвольного поля
            'post_type' => 'tovar',
			'value' => (int)$_POST['obeves_min'], // переданные значения ОТ и ДО для интервала передаются в массиве
			'type' => 'numeric', // тип поля - число
			'compare' => '>=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['vlaga'] != '') { // если передано поле "Цена от" или "Цена до"
		
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'vlaga', // название произвольного поля
            'post_type' => 'tovar',
			'value' => '1', // переданные значения ОТ и ДО для интервала передаются в массиве
			
			'compare' => '=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['davlenie'] != '') { // если передано поле "Цена от" или "Цена до"
		
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'davlenie', // название произвольного поля
            'post_type' => 'tovar',
			'value' => '1', // переданные значения ОТ и ДО для интервала передаются в массиве
			
			'compare' => '=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    
    if ($_POST['termoshok'] != '') { // если передано поле "Цена от" или "Цена до"
		
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'termoshok', // название произвольного поля
            'post_type' => 'tovar',
			'value' => '1', // переданные значения ОТ и ДО для интервала передаются в массиве
			
			'compare' => '=' // тип сравнения, здесь это BETWEEN - т.е. между "Цены от" и до "Цены до"
			);
	}
    
    if ($_POST['razdel'] != '') { // если передана фильтрация по разделу
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'razdel', // название произвольного поля
			'value' => (int)$_POST['razdel'], // переданное значение произвольного поля
			'type' => 'numeric' // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
			);
	}
    

	if (!empty($_POST['rooms'])) { // если передан массив с фильтром по комнатам
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'rooms', // название произвольного поля
			'value' => $_POST['rooms'], // переданное значения, $_POST['rooms'] содержит массив со значениями отмеченных чекбоксов
			'type' => 'numeric', // тип поля - число
			'compare' => 'IN' // тип сравнения IN, т.е. значения поля комнат должно быть одним из значений элементов массива
			);
	}

	if ($_POST['photo'] != '') { // если передано поле "Только с фото"
		$args['meta_query'][] = array( // пешем условие в meta_query
			'key' => '_thumbnail_id', // поле _thumbnail_id должно быть, это зарезервированное имя wp
			);
	}

	if ($_POST['keyword'] != '') { // если передано поле "Ключевое слово"
		$args['s'] = $_POST['keyword']; // пешем значение в ключ "s" условий выборки, обратите внимание это уже не произвольное поле для meta_query, будет работать как обычный поиск + остальные условия
	}
			
	query_posts(array_merge($args,$wp_query->query)); // сшиваем текущие условия выборки стандартного цикла wp с новым массивом переданным из формы и фильтруем
    query_posts($args);
    if($_POST['action'] == 'go_filter'){ ?>
        <?php while ( have_posts() ) : the_post(); ?>
    
                        <div class="col-xs-12 col-md-4 boxis-ottovar">
                            <a href="<?php echo get_permalink() ?>">
                                <img src="<?php $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail-size', true);
            echo $thumb_url[0]; ?>" alt="">
                                <p><?php echo get_the_title(); ?>
                            
                            <a href="#" class="eModal-1 zakaz-button">Заказать</a></p></a>
                        </div>

<?php endwhile; 
      wp_reset_postdata();
	die();              
    }

}
add_action('wp_ajax_go_filter', 'go_filter');
add_action('wp_ajax_nopriv_go_filter', 'go_filter');

if($_POST['action'] == 'go_filter'){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
}
?>