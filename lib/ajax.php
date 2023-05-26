<?php

function degardc_quiz_builder_save_quiz_data_ajax()
{
    global $wpdb;
    $table = $wpdb->prefix . 'degardcquiz_quizes';

    $post_body = file_get_contents('php://input');
    $id = $_GET["id"];
    if (is_numeric($id)) {
        // update
        $data = array('options' => $post_body);
        $where = array('id' => $id);
        $db_result = $wpdb->update($table, $data, $where);
        $result = array(
            'error' => true,
            'message' => $db_result
        );
        wp_send_json($result);
        wp_die();
    } else{
        // insert
        $row = array('options' => $post_body);
        $db_result = $wpdb->insert($table, $row);
        $insert_id = $wpdb->insert_id;
        $result = array(
            'error' => true,
            'message' => $insert_id
        );
        wp_send_json($result);
        wp_die();
    }

}
add_action('wp_ajax_degardc_quiz_builder_save_quiz_data_ajax', 'degardc_quiz_builder_save_quiz_data_ajax');
add_action('wp_ajax_nopriv_degardc_quiz_builder_save_quiz_data_ajax', 'degardc_quiz_builder_save_quiz_data_ajax');


function degardc_quiz_builder_get_quiz_data_ajax()
{
    // the name of custom column in db
    $column = "options";
    global $wpdb;
    $id = $_GET["id"];
    $table = $wpdb->prefix . 'degardcquiz_quizes';
    $quiz_data = $wpdb->get_row("SELECT $column FROM $table WHERE id = $id")->$column;
    $result = array(
        'error' => true,
        'message' => $quiz_data
    );
    wp_send_json($result);
    wp_die();
}
add_action('wp_ajax_degardc_quiz_builder_get_quiz_data_ajax', 'degardc_quiz_builder_get_quiz_data_ajax');
add_action('wp_ajax_nopriv_degardc_quiz_builder_get_quiz_data_ajax', 'degardc_quiz_builder_get_quiz_data_ajax');
