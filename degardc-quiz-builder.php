<?php
/*
* Plugin Name: Degardc Quiz Builder
* Plugin URI: https://degardc.com
* Description: آزمون ساز اختصاصی آنلاین
* Version: 1.0.0
* Author: ali bayat
* Author URI: https://degardc.com
* License: GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: fa
* Domain Path: /languages/
*/


define('DEGARDC_QUIZ_BUILDER_URL', plugin_dir_url(__FILE__));
define('DEGARDC_QUIZ_BUILDER_PATH', plugin_dir_path(__FILE__));

include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/jdf.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/hooks.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/functions.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/shortcodes.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/ajax.php';

function degardc_quiz_builder_create_db_table()
{

    global $wpdb;
    $table_name = $wpdb->prefix . "degardcquiz_quizes";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      options text(4095) NOT NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'degardc_quiz_builder_create_db_table');



// START پنل ادمین
add_action('admin_menu', 'degardc_quiz_builder_menu_pages');
function degardc_quiz_builder_menu_pages()
{
    add_menu_page(
        'آزمون ساز',
        'آزمون ساز',
        'administrator',
        'degardc-quiz-builder',
        'degardc_quiz_builder_main_page',
        'dashicons-forms',
        2000
    );
    add_submenu_page( 
		'degardc-quiz-builder',
        'همه آزمون‌ها',
        'همه آزمون‌ها',
        'administrator',
        'degardc-quiz-builder',
        'degardc_quiz_builder_main_page',
    );
    add_submenu_page( 
		'degardc-quiz-builder',
        'افزودن آزمون',
        'افزودن آزمون',
        'administrator',
        'degardc-quiz-builder-new',
        'degardc_quiz_builder_new_page',
    );

}


function degardc_quiz_builder_new_page(){
    include DEGARDC_QUIZ_BUILDER_PATH . '/tpl/admin/admin-dashboard-html.php';
}
function degardc_quiz_builder_main_page()
{
}
