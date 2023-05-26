<?php

function degardc_quiz_builder_scripts()
{
    // wp_enqueue_style('degardc-course-css', DEGARDC_QUIZ_BUILDER_URL . 'assets/degardc-course.css');
    wp_enqueue_script('degardc-quiz-builder-admin', DEGARDC_QUIZ_BUILDER_URL . 'assets/js/admin.js', array(), '1.0.0', true);
    wp_localize_script('degardc-quiz-builder-admin', 'degardc_quiz_builder_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'degardc_quiz_builder_scripts');




