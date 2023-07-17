<?php
/*
* Plugin Name: Degardc Quiz Builder
* Plugin URI: https://degardc.com
* Description: آزمون ساز اختصاصی دگردیسی
* Version: 1.0.0
* Author: ali bayat
* Author URI: https://degardc.com
* License: GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: fa
* Domain Path: /languages/
*/
defined( 'ABSPATH' ) || exit;


define('DEGARDC_QUIZ_BUILDER_URL', plugin_dir_url(__FILE__));
define('DEGARDC_QUIZ_BUILDER_PATH', plugin_dir_path(__FILE__));
define('DEGARDC_QUIZ_TABLE', 'degardcquiz_quizes');
define('DEGARDC_ANSWER_TABLE', 'degardcquiz_answers');

include_once DEGARDC_QUIZ_BUILDER_PATH . '/includes/class-gateways.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/jdf.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/hooks.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/functions.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/shortcodes.php';
include_once DEGARDC_QUIZ_BUILDER_PATH . '/lib/ajax.php';

function degardc_quiz_builder_create_db_table()
{
    global $wpdb;
    $quiz_table_name = $wpdb->prefix . DEGARDC_QUIZ_TABLE;
    $charset_collate = $wpdb->get_charset_collate();
    $sql1 = "CREATE TABLE IF NOT EXISTS $quiz_table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      options text(4095) NOT NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";


    $answer_table_name = $wpdb->prefix . DEGARDC_ANSWER_TABLE;
    $charset_collate = $wpdb->get_charset_collate();
    $sql2 = "CREATE TABLE IF NOT EXISTS $answer_table_name (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      quiz_id int(11) NOT NULL,
      mobile_number text(1024),
      is_verified boolean NOT NULL,
      answer text(4095),
      result text(4095),
      extra_info text(4095),
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY id (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql1);
    dbDelta($sql2);
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
    add_submenu_page(
        'degardc-quiz-builder',
        'پاسخ‌ها',
        'پاسخ‌ها',
        'administrator',
        'degardc-quiz-builder-answers',
        'degardc_quiz_builder_answers_page',
    );
    add_submenu_page(
        'degardc-quiz-builder',
        'تنظیمات',
        'تنظیمات',
        'administrator',
        'degardc-quiz-builder-settings',
        'degardc_quiz_builder_settings_page',
    );
}

function degardc_quiz_builder_answers_page()
{
    $quiz_id = $_GET['id'];
    global $wpdb;
    $answer_table_name = $wpdb->prefix . DEGARDC_ANSWER_TABLE;
    $quiz_table_name = $wpdb->prefix . DEGARDC_QUIZ_TABLE;
    if ($quiz_id) {
        $results = $wpdb->get_results("SELECT * FROM $answer_table_name INNER JOIN $quiz_table_name ON $answer_table_name.quiz_id = $quiz_table_name.id WHERE quiz_id = $quiz_id");
    } else {
        $results = $wpdb->get_results("SELECT * FROM $answer_table_name INNER JOIN $quiz_table_name ON $answer_table_name.quiz_id = $quiz_table_name.id");
    }
    include DEGARDC_QUIZ_BUILDER_PATH . '/tpl/admin/answers-html.php';
}


function degardc_quiz_builder_settings_page()
{
    $degardc_quiz_builder_options = get_option('degardc_quiz_builder_options');
    if (isset($_POST['degardc_quiz_builder_save_changes'])) {
        $sms_api_username = sanitize_text_field($_POST['sms_api_username']);
        $sms_api_password = sanitize_text_field($_POST['sms_api_password']);
        $sms_api_from = sanitize_text_field($_POST['sms_api_from']);
        $sms_api_url = sanitize_text_field($_POST['sms_api_url']);
        
        $degardc_quiz_builder_options['sms_api_username'] = $sms_api_username;
        $degardc_quiz_builder_options['sms_api_password'] = $sms_api_password;
        $degardc_quiz_builder_options['sms_api_from'] = $sms_api_from;
        $degardc_quiz_builder_options['sms_api_url'] = $sms_api_url;

        update_option('degardc_quiz_builder_options', $degardc_quiz_builder_options);
        echo '<div class="updated"><p>تغییرات شما با موفقیت انجام شد</p></div>';
    }
    include DEGARDC_QUIZ_BUILDER_PATH . '/tpl/admin/settings-html.php';
}

function degardc_quiz_builder_new_page()
{
    include DEGARDC_QUIZ_BUILDER_PATH . '/tpl/admin/add-new-quiz-html.php';
}
function degardc_quiz_builder_main_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . DEGARDC_QUIZ_TABLE;
    $results = $wpdb->get_results("SELECT * FROM $table_name");
    include DEGARDC_QUIZ_BUILDER_PATH . '/tpl/admin/all-quiz-html.php';
}
