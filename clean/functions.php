<?php
//function wpse_edit_post_show_excerpt( $user_login, $user ) {
//    $unchecked = get_user_meta( $user->ID, 'metaboxhidden_post', true );
//    $key = array_search( 'postexcerpt', $unchecked );
//    if ( FALSE !== $key ) {
//        array_splice( $unchecked, $key, 1 );
//        update_user_meta( $user->ID, 'metaboxhidden_post', $unchecked );
//    }
//}
//add_action( 'wp_login', 'wpse_edit_post_show_excerpt', 10, 2 );
//


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

add_theme_support( 'post-thumbnails' );


function exclude_posts_from_robots($output) {
    if (is_single() || is_archive()) {
        $output .= "\nUser-agent: *\nDisallow: /";
    }
    return $output;
}
add_filter('robots_txt', 'exclude_posts_from_robots');



function load_post_content() {
    // Проверяем, передан ли идентификатор записи
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']); // Приводим к целочисленному значению

        // Получаем контент записи
        $post = get_post($post_id);

        if ($post) {
            // Возвращаем контент
            wp_send_json_success($post->post_content);
        } else {
            wp_send_json_error('Запись не найдена');
        }
    } else {
        wp_send_json_error('ID записи не передан');
    }

    // Прекращаем выполнение
    wp_die();
}

// Регистрация AJAX обработчика для авторизованных и не авторизованных пользователей
add_action('wp_ajax_load_post_content', 'load_post_content');
add_action('wp_ajax_nopriv_load_post_content', 'load_post_content');

function enqueue_ajax_script() {
//    wp_enqueue_script('swiper', get_template_directory_uri().'/modules/swiper/script.js', array(), null, true);

    wp_enqueue_script('ajax-script', get_template_directory_uri().'/script/ajax-script.js', array('jquery'), null, true);

    // Передаем ajaxurl в скрипт
    wp_localize_script('ajax-script', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'enqueue_ajax_script');
?>

