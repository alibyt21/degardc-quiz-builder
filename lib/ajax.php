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
    } else {
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















/* START FRONT APIs */
function degardc_quiz_builder_send_validation_code_ajax()
{
    $mobile_number = sanitize_text_field($_POST['mobileNumber']);
    $inserted_id = sanitize_text_field($_POST['insertedId']);
    if (!$inserted_id) {
        $result = array(
            'error' => true,
            'message' =>  "خطایی رخ داده است، کد خطا: 12",
        );
        wp_send_json($result);
    }

    if (empty($mobile_number)) {
        $result = array(
            'error' => true,
            'message' =>  'لطفا شماره تلفن همراه خود را به صورت کامل وارد کنید',
        );
        wp_send_json($result);
    }
    if (!is_mobile_number_valid_in_iran($mobile_number)) {
        $result = array(
            'error' => true,
            'message' => 'شماره تلفن همراه وارد شده نامعتبر است',
        );
        wp_send_json($result);
    }
    // $args = array(
    //     'meta_query' => array(
    //         array(
    //             'key' => 'degardc_mobile_number',
    //             'value' => $mobile_number,
    //             'compare' => '='
    //         )
    //     )
    // );
    // $user_with_same_mobile_number = get_users($args);
    // if ($user_with_same_mobile_number) {
    //     $result = array(
    //         'error' => true,
    //         'message' =>  'یک حساب کاربری فعال با شماره وارد شده در سیستم وجود دارد و این شماره قابل استفاده مجدد نیست',
    //     );
    //     wp_send_json($result);
    // }

    global $wpdb;
    $column = "mobile_number";
    $table = $wpdb->prefix . 'degardcquiz_answers';
    $last_user_try = json_decode($wpdb->get_row("SELECT $column FROM $table WHERE id = $inserted_id")->$column);
    if (!(empty($last_user_try)) && !($last_user_try->number != $mobile_number) && !($last_user_try->until < time())) {
        $result = array(
            'error' => true,
            'message' => 'لطفا صبر کنید، درخواست قبلی شما هنوز معتبر است',
        );
        wp_send_json($result);
    }

    $random_number = rand(10000, 99999);
    /* return int in success */
    // $response = faraz_sms_pattern("qncer227zn", array($mobile_number), array("verification-code" => $random_number));
    if (!true) {
        $result = array(
            'error' => true,
            'message' => 'در ارسال پیامک خطایی رخ داده است، لطفا به پشتیبانی اطلاع دهید',
        );
        wp_send_json($result);
    }
    $degardc_validation_code['number'] = $mobile_number;
    $degardc_validation_code['code'] = $random_number;
    $degardc_validation_code['until'] = time() + 120;
    $data = array('mobile_number' => json_encode($degardc_validation_code));
    $where = array('id' => $inserted_id);
    $db_result = $wpdb->update($table, $data, $where);
    if (!$db_result) {
        $result = array(
            'error' => true,
            'message' =>  gettype($degardc_validation_code),
        );
        wp_send_json($result);
    }
    $result = array(
        'error' => false,
        'message' =>  "پیامک فعال سازی با موفقیت به شماره $mobile_number ارسال شد",
    );
    wp_send_json($result);
    die();
}
add_action('wp_ajax_degardc_quiz_builder_send_validation_code_ajax', 'degardc_quiz_builder_send_validation_code_ajax');
add_action('wp_ajax_nopriv_degardc_quiz_builder_send_validation_code_ajax', 'degardc_quiz_builder_send_validation_code_ajax');


function degardc_quiz_builder_save_unvalidate_mobile_ajax()
{
    $mobile_number = sanitize_text_field($_POST['mobileNumber']);
    $inserted_id = sanitize_text_field($_POST['insertedId']);
    if (!$inserted_id) {
        $result = array(
            'error' => true,
            'message' =>  "خطایی رخ داده است، کد خطا: 12",
        );
        wp_send_json($result);
    }

    if (empty($mobile_number)) {
        $result = array(
            'error' => true,
            'message' =>  'لطفا شماره تلفن همراه خود را به صورت کامل وارد کنید',
        );
        wp_send_json($result);
    }
    if (!is_mobile_number_valid_in_iran($mobile_number)) {
        $result = array(
            'error' => true,
            'message' => 'شماره تلفن همراه وارد شده نامعتبر است',
        );
        wp_send_json($result);
    }
    global $wpdb;
    $table = $wpdb->prefix . 'degardcquiz_answers';
    $data = array('mobile_number' => $mobile_number);
    $where = array('id' => $inserted_id);
    $db_result = $wpdb->update($table, $data, $where);
    if (!$db_result) {
        $result = array(
            'error' => true,
            'message' => "خطایی رخ داده است، کد خطا: 15",
        );
        wp_send_json($result);
    }
    $result = array(
        'error' => false,
        'message' =>  "",
    );
    wp_send_json($result);
    die();
}
add_action('wp_ajax_degardc_quiz_builder_save_unvalidate_mobile_ajax', 'degardc_quiz_builder_save_unvalidate_mobile_ajax');
add_action('wp_ajax_nopriv_degardc_quiz_builder_save_unvalidate_mobile_ajax', 'degardc_quiz_builder_save_unvalidate_mobile_ajax');


function degardc_quiz_builder_submit_answers_ajax()
{
    // we should use stripslashes as because we are running in wordpress
    $quiz_id = sanitize_text_field($_POST['quizId']);
    $participant_data = stripslashes(sanitize_text_field($_POST['participantData']));
    $quiz_result = stripslashes(sanitize_text_field($_POST['quizResult']));

    global $wpdb;
    $table = $wpdb->prefix . 'degardcquiz_answers';
    $row = array('quiz_id' => $quiz_id, 'is_verified' => false, 'answer' => $participant_data, 'result' => $quiz_result);
    $db_result = $wpdb->insert($table, $row);
    $insert_id = $wpdb->insert_id;
    if (!$db_result) {
        $result = array(
            'error' => true,
            'message' =>  "خطایی رخ داده است، کد خطا: 11",
        );
        wp_send_json($result);
    }
    $result = array(
        'error' => false,
        'message' =>  $insert_id,
    );
    wp_send_json($result);
}
add_action('wp_ajax_degardc_quiz_builder_submit_answers_ajax', 'degardc_quiz_builder_submit_answers_ajax');
add_action('wp_ajax_nopriv_degardc_quiz_builder_submit_answers_ajax', 'degardc_quiz_builder_submit_answers_ajax');


function degardc_quiz_builder_check_validation_code()
{
    // check_ajax_referer('degardc_nonce', 'security');
    $user_validation_code = sanitize_text_field($_POST['validationCode']);
    $mobile_number = sanitize_text_field($_POST['mobileNumber']);
    $inserted_id = sanitize_text_field($_POST['insertedId']);
    if (empty($user_validation_code)) {
        $result = array(
            'error' => true,
            'message' =>  'لطفا کد ارسال شده را به صورت کامل وارد کنید',
        );
        wp_send_json($result);
    }
    global $wpdb;
    $column = "mobile_number";
    $table = $wpdb->prefix . 'degardcquiz_answers';
    $last_user_try = json_decode($wpdb->get_row("SELECT $column FROM $table WHERE id = $inserted_id")->$column);
    $system_validation_code = $last_user_try->code;
    if ($system_validation_code != $user_validation_code) {
        $result = array(
            'error' => true,
            'message' =>  'کد وارد شده اشتباه است، لطفا مجددا تلاش کنید',
        );
        wp_send_json($result);
    }

    if ($mobile_number != $last_user_try->number) {
        $result = array(
            'error' => true,
            'message' =>  'شماره همراه وارد شده نامعتبر است، در صورت نیاز به پشتیبانی اطلاع دهید',
        );
        wp_send_json($result);
    }
    $data = array('mobile_number' => $mobile_number, 'is_verified' => true);
    $where = array('id' => $inserted_id);
    $db_result = $wpdb->update($table, $data, $where);
    if (!$db_result) {
        $result = array(
            'error' => true,
            'message' =>  "خطایی رخ داده است، کد خطا: 11",
        );
        wp_send_json($result);
    }
    $result = array(
        'error' => false,
        'message' =>  'شماره شما با موفقیت تایید شد',
    );
    wp_send_json($result);
}
add_action('wp_ajax_degardc_quiz_builder_check_validation_code', 'degardc_quiz_builder_check_validation_code');
add_action('wp_ajax_nopriv_degardc_quiz_builder_check_validation_code', 'degardc_quiz_builder_check_validation_code');


function degardc_quiz_builder_login_if_exists_register_if_new()
{
    // check_ajax_referer('degardc_register_nonce', 'security');
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    if (empty($email) || empty($password)) {
        $result = array(
            'error' => true,
            'message' => 'لطفا فرم را به صورت کامل تکمیل کنید'
        );
        wp_send_json($result);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = array(
            'error' => true,
            'message' => 'لطفا ایمیل خود را به صورت صحیح وارد کنید'
        );
        wp_send_json($result);
    }
    if (email_exists($email)) {
        //it means that email is already registered in this site and we have to login

        $creds = array(
            'user_login'    => $email,
            'user_password' => $password,
            'remember'      => true
        );
        $wp_signon_result = wp_signon($creds, false);
        if (is_wp_error($wp_signon_result)) {
            $result = array(
                'error' => true,
                'message' => $wp_signon_result->get_error_message(),
            );
            wp_send_json($result);
        } else {
            $result = array(
                'error' => false,
                'message' => 'شما با موفقیت وارد سایت شدید',
            );
            wp_send_json($result);
        }
    } else {
        //it means that email is new user and we have to register the user

        $user_login = substr($email, 0, strrpos($email, '@'));
        $creds = array(
            'user_login' => $user_login,
            'user_email' => $email,
            'user_pass'  => $password,
            'show_admin_bar_front' => 'false',
        );

        //in success return new user id
        $wp_insert_user_result = wp_insert_user($creds);

        if (is_wp_error($wp_insert_user_result)) {
            $result = array(
                'error' => true,
                'message' => $wp_insert_user_result->get_error_message(),
            );
            wp_send_json($result);
        }
        $creds = array(
            'user_login'    => $email,
            'user_password' => $password,
            'remember'      => true
        );
        $wp_signon_result = wp_signon($creds, false);
        if (is_wp_error($wp_signon_result)) {
            $result = array(
                'error' => true,
                'message' =>  'حساب کاربری شما با موفقیت ایجاد شد، اما در ورود شما به سایت مشکلی رخ داده است، لطفا به پشتیبانی اطلاع دهید',
            );
            wp_send_json($result);
        } else {
            $result = array(
                'error' => false,
                'message' => 'حساب کاربری شما با موفقیت ایجاد شد',
            );
            wp_send_json($result);
        }
    }
    die();
}
add_action('wp_ajax_degardc_quiz_builder_login_if_exists_register_if_new', 'degardc_quiz_builder_login_if_exists_register_if_new');
add_action('wp_ajax_nopriv_degardc_quiz_builder_login_if_exists_register_if_new', 'degardc_quiz_builder_login_if_exists_register_if_new');

function degardc_quiz_builder_login_register_with_mobile()
{
    // check_ajax_referer('degardc_register_nonce', 'security');
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $mobile = sanitize_text_field($_POST['mobile']);
    if (empty($email) || empty($password)) {
        $result = array(
            'error' => true,
            'message' => 'لطفا فرم را به صورت کامل تکمیل کنید'
        );
        wp_send_json($result);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = array(
            'error' => true,
            'message' => 'لطفا ایمیل خود را به صورت صحیح وارد کنید'
        );
        wp_send_json($result);
    }
}
/* END FRONT APIs */
