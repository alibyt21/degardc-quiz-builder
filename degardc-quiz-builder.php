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
