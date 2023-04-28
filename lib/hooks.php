<?php

function degardc_quiz_builder_scripts()
{
    wp_enqueue_style('degardc-course-css', DEGARDC_COURSE_URL . '/assets/degardc-course.css');
    wp_enqueue_script('degardc-course-js', DEGARDC_COURSE_URL . '/assets/degardc-course.js', array(), '1.0.0', true);
    wp_localize_script('degardc-course-instructor-panel-js', 'degardc_course_instructor_panel_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'degardc_quiz_builder_scripts');
