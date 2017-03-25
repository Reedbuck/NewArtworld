<?php

function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).
        ';</script>'
    );
}
add_action('wp_head','js_variables');

?>