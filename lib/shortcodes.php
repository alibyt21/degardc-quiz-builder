<?php

function degardc_quiz_builder_callback($atts)
{
    // global $wpdb;
    // $column = "options";
    $id = $atts['id'];
    // $table = $wpdb->prefix . 'degardcquiz_quizes';
    // $quiz_data = json_decode($wpdb->get_row("SELECT $column FROM $table WHERE id = $id")->$column);
    // $quiz_name = $quiz_data->name;
    // $quiz_description = $quiz_data->description;
    // $quiz_questions = $quiz_data->questions;
    // $quiz_settings = $quiz_data->settings;
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;
        $user_mobile_number = get_user_meta($user_id, 'degardc_mobile_number', true);
    }



?>

    <link rel="stylesheet" href="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/css/persian-datepicker.min.css' ?>" />
    <link rel="stylesheet" href="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/css/index.css' ?>" />
    <link rel="stylesheet" href="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/css/toastify.min.css' ?>" />
    <script type="text/javascript" src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/toastify.min.js' ?>"></script>

    <div class="info" data-login="<?= is_user_logged_in() ? "true" : "false" ?>" data-mobile="<?= $user_mobile_number ? "true" : "false" ?>"></div>
    <div class="hidden bg-white absolute top-4 left-2 h-2 right-2 w-auto rounded-xl my-2 transition-all ease-in-out duration-1000" id="dg-progress-bar-container" style="visibility: hidden; opacity: 0;">
        <div class="dg-progress-bar absolute right-0 bg-blue-500 h-2 rounded-xl transition-all duration-1000 ease-in-out" style="width: 0%;"></div>
    </div>
    <!-- https://stackoverflow.com/questions/50649381/svg-arc-progress-bar-with-constant-stroke-dasharray-object -->

    <div>
        <div class="loading flex overflow-hidden relative flex-col justify-center items-center px-2 w-full h-screen my-6" style="display: flex;">
            <div class="flex flex-col bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out items-center justify-center">
                <div class="loader">
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                </div>
            </div>
        </div>
        <div class="quiz flex dg-main-container overflow-hidden relative flex-col justify-center items-center px-2 w-full h-screen my-6" style="display: none;">
            <div class="dg-step-card dg-entrance-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
                <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                    <div class="mx-auto w-full text-center">
                        <h2 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                            به باشگاه یادگیری زبان آکادمی izaban خوش آمدید
                        </h2>
                        <img style="width: 100px;" class="mx-auto mb-7" src="https://www.izaban.org/wp-content/uploads/elementor/thumbs/logo__2_-removebg-preview-ptzef6xvxwbkibnt8fw570yem3npogba2jd043xheg.png" alt="">
                        <h1 class="quiz-name text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center"></h1>
                    </div>

                    <div class="quiz-description max-w-[500px] border border-solid border-gray-200 p-2 md:p-4 lg:p-6 rounded-xl my-10 mx-auto text-justify"></div>
                </div>

                <div class="flex justify-center bg-white p-5 md:p-7 lg:p-10 pt-0 rounded-b-xl absolute bottom-5 w-full transition-all duration-[0.9s] ease-in-out">
                    <button class="dg-start-exam-button dg-next-step-button dg-next-question-button w-full text-center cursor-pointer rounded-xl p-3 text-white flex justify-center items-center h-[63px]" style="max-width: 500px">
                        شروع آزمون
                    </button>
                </div>
            </div>

            <div class="sample-multiple-choice-question dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] transition-all ease-in-out flex items-center">
                <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                    <div class="text-gray-400">
                        بهترین پاسخ را انتخاب کنید
                    </div>
                    <div style="direction: ltr;" class="question question-name text-2xl my-5 mb-7">
                        question name
                    </div>
                    <div style="direction: ltr;" class="answer-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="single-option">
                        <div class="sample-multiple-choice-answer option">
                            <div class="bullet">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="answer-name">answer name</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 pt-0 rounded-b-xl absolute bottom-0 w-full">
                    <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 ml-5 flex justify-center items-center h-[63px]">
                        قبلی
                    </button>
                    <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        بعدی
                    </button>
                </div>
            </div>

            <div style="opacity:0;" class="collect-mobile-number dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
                <div class="dg-step-block flex justify-center flex-col mx-auto max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl max-w-[500px]">
                    <div class="text-center my-2">
                        <h1 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                            نتیجه آزمون به شماره شما ارسال خواهد شد
                        </h1>
                    </div>
                    <div class="flex flex-row w-full justify-between p-3 rounded-xl border my-2 border-solid border-gray-300">
                        <input class="flex-auto w-2/3 focus-visible:outline-none" id="mobile-number" pattern="[0]{1}[9]{1}[0-9]{9}" type="number" minlength="10" maxlength="11" placeholder="شماره موبایل خود را وارد کنید" />
                        <div class="flex flex-row items-center" id='flag'>
                            <div class="border-l mx-2"></div>
                            <span class="ml-2">98+</span>
                            <div class="w-9 h-6">
                                <div class="h-2 bg-green-600"></div>
                                <div class="h-2 bg-white"></div>
                                <div class="h-2 bg-red-600"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 pt-0 rounded-b-xl absolute left-0 right-0 bottom-0 w-full max-w-[500px]">
                    <button class="dg-next-step-button collect-mobile-number-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        ارسال کد تایید
                    </button>
                    <button style="display: none;" class="dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 ml-5 flex justify-center items-center h-[63px]">
                        قبلی
                    </button>
                </div>
            </div>

            <div style="opacity:0;" class="register-validate dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-start">
                <div class="dg-step-block flex justify-center flex-col mx-auto max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl max-w-[500px]">
                    <div class="text-center my-2">
                        <h1 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                            ثبت نام / ورود به سایت
                        </h1>
                    </div>
                    <div id="register-part">
                        <div class="extra-field">
                            <div class="flex" id="participant-name">
                                <div class="flex border border-solid border-gray-200 p-3 rounded-xl my-2 ml-2">
                                    <input id="participant-firstname" class="flex-auto w-2/3 focus-visible:outline-none" type="text" placeholder="نام" />
                                </div>
                                <div class="flex border border-solid border-gray-200 p-3 rounded-xl my-2 mr-2">
                                    <input id="participant-lastname" class="flex-auto w-2/3 focus-visible:outline-none" type="text" placeholder="نام خانوادگی" />
                                </div>
                            </div>
                        </div>
                        <div class="border border-solid border-gray-200 p-3 rounded-xl my-2">
                            <input id="participant-email" class="flex-auto w-2/3 focus-visible:outline-none" type="email" placeholder="آدرس ایمیل" />
                        </div>
                        <div class="border border-solid border-gray-200 p-3 rounded-xl my-2">
                            <input id="participant-password" class="flex-auto w-2/3 focus-visible:outline-none" type="password" placeholder="پسورد" />
                        </div>
                    </div>
                    <div id="validate-part">
                        <div class="border border-solid border-gray-200 p-3 rounded-xl my-2">
                            <input id="validation-code" class="flex-auto w-full focus-visible:outline-none" type="number" placeholder="کد 5 رقمی ارسال شده را وارد کنید" />
                        </div>
                        <div class="flex justify-center text-sm text-gray-400 my-2">
                            <div class="flex" id="dg-countdown-container">
                                <div class="mx-2">دریافت مجدد کد تا</div>
                                <div id="dg-countdown-timer">02:00</div>
                            </div>
                            <div id="dg-send-new-code" class="cursor-pointer text-blue-500">دریافت مجدد کد</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 pt-0 rounded-b-xl absolute left-0 right-0 bottom-0 w-full max-w-[500px]">
                    <button class="dg-next-step-button register-validate-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        ثبت نام / ورود
                    </button>
                    <button class="dg-prev-step-button text-gray-500 border border-solid border-gray-200 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 flex justify-center items-center h-[63px]">
                        بازگشت و اصلاح شماره
                    </button>
                </div>
            </div>

            <div style="opacity:0;" class="book-an-appointment flex justify-center dg-question-card dg-after-exam-question dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out items-center">
                <div class="dg-step-block p-5 md:p-7 lg:p-10">
                    <div class="question text-2xl my-5 mb-7">
                        نوع آزمون شفاهی تعیین سطح خود را مشخص کنید
                    </div>
                    <div class="w-full">
                        <span class="w-full text-center">
                            ساعت کاری آموزشگاه از ساعت 10 صبح تا 9 شب است.
                        </span>
                    </div>
                    <div class="w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2">
                        <div class="w-full p-4 border border-solid border-gray-300 rounded-xl my-6">
                            <input type="text" id="book-date" class="date-picker w-full" />
                        </div>
                        <div class="w-full p-4 border border-solid border-gray-300 rounded-xl my-6">
                            <input type="text" id="book-time" class="date-picker w-full" />
                        </div>
                    </div>
                    <div class="answer-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="single-option" data-qid="book" data-qgroup="book">
                        <div class="option">
                            <div class="bullet">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="answer-name">تعیین سطح شفاهی حضوری</span>
                        </div>
                        <div class="option">
                            <div class="bullet">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="answer-name">تعیین سطح شفاهی آنلاین</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center mx-auto bg-white p-5 md:p-7 lg:p-10 pt-0 absolute bottom-0 rounded-b-xl w-full max-w-[580px]">
                    <button class="dg-next-step-button izaban-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        رزرو
                    </button>
                    <button class="hidden dg-prev-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">

                    </button>
                </div>
            </div>

            <div style="opacity:0;visibility:hidden" class="result bg-white flex flex-col justify-center dg-step-card static top-12 left-2 right-2 rounded-xl w-full max-w-[600px] transition-all ease-in-out items-center">
                <div class="dg-total-result flex flex-col w-full justify-center bg-white rounded-xl pb-8 px-4 mb-3">
                    <div id="progress">
                        <svg viewbox="0 0 110 100" style="width: 200px;height:180px">
                            <linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
                                <stop offset="0%" stop-color="#56c4fb" />
                                <stop offset="100%" stop-color="#0baeff" />
                            </linearGradient>
                            <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                            <path id="percentage-curve" fill='none' class="blue" d="M30,90 A40,40 0 1,1 80,90" />

                            <text id="percentage-text" x="41%" y="52%" dominant-baseline="middle" text-anchor="middle" style="font-size:20px;"></text>
                            <text x="50%" y="71%" dominant-baseline="middle" text-anchor="middle" style="font-size:10px;fill:#aaaaaa;">نمره نهایی</text>
                            <text x="65%" y="53%" dominant-baseline="middle" text-anchor="middle" style="font-size:10px;fill:#aaaaaa;">100/</text>
                        </svg>
                    </div>
                    <div class="result-message text-gray-500 text-center"></div>
                </div>
                <div class="dg-seprate-results w-full">
                    <div class="dg-single-result flex flex-row items-center justify-between bg-white rounded-xl w-full p-3 px-6">
                        <div class="flex flex-col">
                            <div class="dg-single-result-name text-gray-600"></div>
                            <div class="dg-single-result-description text-sm text-gray-400"></div>
                        </div>
                        <div class="z-[2]">
                            <div class="dg-single-result-score rating"></div>
                        </div>
                    </div>
                </div>

                <div class="dg-ticket w-full my-2 hidden">
                    <div class="container">
                        <div class="bp-card" data-clickthrough="link">
                            <div class="bp-card_label">
                                <div class="bd-border_solid"></div>
                                <div class="bd-border_dotted"></div>
                            </div>
                            <div class="bp-card_content">
                                <p class="secondary">Medium ticket</p>
                                <h4>Ticket name</h4>


                                <ul>
                                    <span>Including:</span>
                                    <li>
                                        Minimal 1
                                    </li>
                                    <li>
                                        Minimal 1
                                    </li>
                                    <li>
                                        Minimal 1
                                    </li>
                                </ul>

                                <a href="" class="price">
                                    € 9,-
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 pt-0 rounded-b-xl left-0 right-0 bottom-0 w-full max-w-[500px]">
                    <button class="dg-next-step-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        تعیین سطح شفاهی
                    </button>
                    <button class="hidden dg-prev-step-button text-gray-500 border border-solid border-gray-200 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 flex justify-center items-center h-[63px]">

                    </button>
                </div>
            </div>

            <div class="thank-you flex justify-center dg-question-card dg-after-exam-question dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out items-center">
                <div class="dg-step-block p-5 md:p-7 lg:p-10">
                    <div class="question text-2xl my-5 mb-7">
                        با تشکر از شما؛ همکاران ما به زودی با شما تماس خواهند گرفت.
                        </br>
                        "همواره مطمئن باشید، ما بیشتر از شما به فکر یادگیری‌تان هستیم"
                    </div>
                </div>
                <div class="flex flex-col justify-center mx-auto bg-white p-5 md:p-7 lg:p-10 absolute bottom-0 rounded-b-xl w-full max-w-[580px]">
                    <button class="hidden dg-next-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">

                    </button>
                    <button class="hidden dg-prev-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">

                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($id == 1) {
    ?>
        <script>
            function _0x25a2(_0x4401b1, _0x55de4a) {
                var _0x5dc885 = _0x5dc8();
                return _0x25a2 = function(_0x25a2d5, _0x854140) {
                    _0x25a2d5 = _0x25a2d5 - 0x196;
                    var _0x468290 = _0x5dc885[_0x25a2d5];
                    return _0x468290;
                }, _0x25a2(_0x4401b1, _0x55de4a);
            }
            var _0x3ed56d = _0x25a2;
            (function(_0x1c506e, _0x450108) {
                var _0x4489a4 = _0x25a2,
                    _0xe5e3bc = _0x1c506e();
                while (!![]) {
                    try {
                        var _0x491da1 = parseInt(_0x4489a4(0x332)) / 0x1 + -parseInt(_0x4489a4(0x2bd)) / 0x2 * (parseInt(_0x4489a4(0x228)) / 0x3) + -parseInt(_0x4489a4(0x309)) / 0x4 * (-parseInt(_0x4489a4(0x1e0)) / 0x5) + parseInt(_0x4489a4(0x2e9)) / 0x6 + parseInt(_0x4489a4(0x356)) / 0x7 * (parseInt(_0x4489a4(0x206)) / 0x8) + parseInt(_0x4489a4(0x346)) / 0x9 * (-parseInt(_0x4489a4(0x1f8)) / 0xa) + -parseInt(_0x4489a4(0x244)) / 0xb * (parseInt(_0x4489a4(0x320)) / 0xc);
                        if (_0x491da1 === _0x450108) break;
                        else _0xe5e3bc['push'](_0xe5e3bc['shift']());
                    } catch (_0x18771e) {
                        _0xe5e3bc['push'](_0xe5e3bc['shift']());
                    }
                }
            }(_0x5dc8, 0x55694));
            var quizData = {
                'group': 0xb,
                'name': _0x3ed56d(0x247),
                'description': 'تعداد\x20سوالات:\x20120\x20سوال\x20در\x20قالب\x206\x20سطح\x20مختلف</br>\x0a\x20\x20\x20\x20هرکس\x20تنها\x20یکبار\x20قادر\x20به\x20شرکت\x20در\x20این\x20آزمون\x20است،\x20بنابراین\x20تنها\x20درصورتی\x20که\x20در\x20شرایط\x20مناسب\x20(زمان\x20و\x20مکان\x20مناسب\x20و\x20برخورداری\x20از\x20تمرکز\x20کافی)\x20هستید\x20برای\x20شرکت\x20در\x20آزمون\x20بر\x20روی\x20دکمه\x20زیر\x20کلیک\x20کلیک\x20کنید\x20تا\x20آزمون\x20برای\x20شما\x20شروع\x20شود.',
                'resultMessage': [{
                    'min': 0x0,
                    'max': 0x1e,
                    'message': ''
                }, {
                    'min': 0x1f,
                    'max': 0x32,
                    'message': ''
                }],
                'settings': {
                    'requireScore': 0x46,
                    'collectParticipantName': ![],
                    'collectMobileNumber': !![],
                    'validateMobileNumber': !![],
                    'registerOnSite': ![],
                    'seprateResult': !![],
                    'showResult': !![],
                    'bookAnAppointment': !![],
                    'oneAttempt': !![]
                },
                'questions': [{
                    'id': 1,
                    'name': "l- ---, ۲, ۳, ---, ---",
                    'description': '',
                    'answers': [{
                        'name': "a.	1, 4, 5",
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': "b. 1, 5, 6",
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': "c. 4, 5, 6",
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': "d. 1, 3, 5",
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x2,
                    'name': _0x3ed56d(0x2ff),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1fb),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'on',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x2ca),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x242),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x3,
                    'name': _0x3ed56d(0x294),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x2dc),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'I',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x2de),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1c8),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x4,
                    'name': _0x3ed56d(0x2f9),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x32c),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x312),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x214),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'Is',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x5,
                    'name': _0x3ed56d(0x231),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1e1),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x2bf),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x25b),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'grandson',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x6,
                    'name': _0x3ed56d(0x22b),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1f6),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x20a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'brother',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1e1),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x7,
                    'name': _0x3ed56d(0x311),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1d4),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x19f),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x2d9),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1e2),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x8,
                    'name': '8-\x09---,\x20---,\x20c,\x20d',
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x347),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x2a5),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1e9),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x29d),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x9,
                    'name': _0x3ed56d(0x208),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x22e),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x21f),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1f9),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x2e3),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xa,
                    'name': _0x3ed56d(0x302),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x298),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x271),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x22f),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1a1),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0xb,
                    'name': _0x3ed56d(0x2e2),
                    'description': '',
                    'answers': [{
                        'name': 'see',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x24d),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1e8),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x255),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0xc,
                    'name': _0x3ed56d(0x351),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1ff),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x30f),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'e,\x20f,\x20g,\x20i',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x19b),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0xd,
                    'name': _0x3ed56d(0x22a),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x29a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1ca),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x2d3),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x2df),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xe,
                    'name': '14-\x09color:',
                    'description': '',
                    'answers': [{
                        'name': 'strange',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'strong',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x250),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x301),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0xf,
                    'name': _0x3ed56d(0x239),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1f7),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x20e),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x272),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x21b),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x10,
                    'name': _0x3ed56d(0x30b),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x2fb),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x1de),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'It\x27s\x20a\x20red\x20car.',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'It\x27s\x20Sam.',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x11,
                    'name': _0x3ed56d(0x2ed),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1ba),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x2a8),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x3ed56d(0x1a8),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'pot',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x12,
                    'name': _0x3ed56d(0x335),
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x1cd),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'sandbox',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x358),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'sandcastle',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x13,
                    'name': _0x3ed56d(0x1df),
                    'description': '',
                    'answers': [{
                        'name': 'purple',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x31a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'blue',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'big',
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0x14,
                    'name': "20- a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, ---, ---, ---, ---, ---, ---, ---, z",
                    'description': '',
                    'answers': [{
                        'name': _0x3ed56d(0x223),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x32a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'k,\x20s,\x20u,\x20t,\x20w,\x20x,\x20y',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x3ed56d(0x265),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }],
                'childs': [{
                    'group': 0x2,
                    'name': _0x3ed56d(0x230),
                    'description': '',
                    'settings': {
                        'requireScore': 0x46,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': !![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': ![]
                    },
                    'questions': [{
                        'id': 0x15,
                        'name': "۲l- ۱, ۲, ۳, ۴, ---, ---, ---, ---, ۹, ۱۰",
                        'description': '',
                        'answers': [{
                            'name': 'a. ۵, ۷, ۹, ۱۱',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': "b. ۵, ۶, ۷, ۹",
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': "c. ۵, ۶, ۸, ۷",
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': "d. ۵, ۶, ۷, ۸",
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x16,
                        'name': _0x3ed56d(0x2a2),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2d4),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1d6),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2ef),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'Who\x20is\x20this?',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x17,
                        'name': _0x3ed56d(0x212),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x271),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x284),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'dad',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x272),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x18,
                        'name': _0x3ed56d(0x2d6),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1ec),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x204),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1f4),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'It\x27s\x20woof',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x19,
                        'name': _0x3ed56d(0x26a),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x30a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'puzzle',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x259),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'boot',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1a,
                        'name': _0x3ed56d(0x1ce),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x273),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'here\x20you\x20are',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'over\x20there',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1a4),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1b,
                        'name': '27-\x09At\x20school:',
                        'description': '',
                        'answers': [{
                            'name': 'erase',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x298),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1c1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x32b),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x1c,
                        'name': '28-\x09shape:\x20',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x301),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2d5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2ec),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x21c),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x1d,
                        'name': _0x3ed56d(0x349),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1b5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x26c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'triangle',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1c0),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1e,
                        'name': '30-\x09What\x27s\x20\x20this?\x20-------------------',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x295),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2b2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x310),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1a2),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1f,
                        'name': _0x3ed56d(0x2e6),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x23b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x314),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'ckite',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x211),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x20,
                        'name': _0x3ed56d(0x2b1),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x207),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x319),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x257),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x260),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x21,
                        'name': _0x3ed56d(0x209),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x275),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x289),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x324),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'no',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x22,
                        'name': _0x3ed56d(0x327),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x34f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x23f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x31e),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x301),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x23,
                        'name': _0x3ed56d(0x300),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x21d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2a9),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'knees',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x30e),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x24,
                        'name': _0x3ed56d(0x2a7),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x245),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is\x20are',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x254),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'is',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x25,
                        'name': _0x3ed56d(0x329),
                        'description': '',
                        'answers': [{
                            'name': 'crayon',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1e7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2cf),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'pants',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x26,
                        'name': '38-\x09Animal:',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2a4),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x243),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2cb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2ac),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x27,
                        'name': _0x3ed56d(0x233),
                        'description': '',
                        'answers': [{
                            'name': 'sebra',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'zebra',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x35c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x270),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x28,
                        'name': _0x3ed56d(0x199),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x277),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x285),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x243),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'pen',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x3,
                    'name': _0x3ed56d(0x1d7),
                    'description': '',
                    'settings': {
                        'requireScore': 0x4b,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': !![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': ![]
                    },
                    'questions': [{
                        'id': 0x29,
                        'name': _0x3ed56d(0x1d3),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2ee),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'Tursday,\x20Wensday',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2fd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'Thursday,\x20Wednesday',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2a,
                        'name': _0x3ed56d(0x1b7),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x237),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x264),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'kic',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2d8),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x2b,
                        'name': _0x3ed56d(0x19e),
                        'description': '',
                        'answers': [{
                            'name': 'I',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'my',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'me',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1b6),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2c,
                        'name': _0x3ed56d(0x2e4),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x29c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x281),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x283),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'shorts',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2d,
                        'name': _0x3ed56d(0x2d1),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2d2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'thirsthy',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x28d),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x2e,
                        'name': _0x3ed56d(0x2b0),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x207),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x251),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x257),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2be),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2f,
                        'name': _0x3ed56d(0x1c6),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x315),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1d9),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'cut',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x33f),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x30,
                        'name': _0x3ed56d(0x1d1),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1d5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1fe),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x352),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'well\x20picture',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x31,
                        'name': _0x3ed56d(0x1c5),
                        'description': '',
                        'answers': [{
                            'name': 'bedroom',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x248),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x226),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x292),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x32,
                        'name': _0x3ed56d(0x33c),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x254),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'am',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x234),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x33,
                        'name': _0x3ed56d(0x35d),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x26f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x24b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1a7),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x297),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x34,
                        'name': _0x3ed56d(0x303),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2ac),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'cat',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x28e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2b6),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x35,
                        'name': _0x3ed56d(0x1fa),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1be),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'pillo',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x32d),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'break',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x36,
                        'name': _0x3ed56d(0x246),
                        'description': '',
                        'answers': [{
                            'name': 'on,\x20on',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x23c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2d7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'in,\x20on',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x37,
                        'name': _0x3ed56d(0x1f2),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2b8),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x30c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'sea',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x27c),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x38,
                        'name': '56-\x09How\x20many\x20pens\x20are\x20there?',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x316),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x258),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1a6),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2fa),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x39,
                        'name': _0x3ed56d(0x30d),
                        'description': '',
                        'answers': [{
                            'name': 'soap',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x271),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x338),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2f6),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x3a,
                        'name': _0x3ed56d(0x286),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x358),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x229),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2b7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1b8),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x3b,
                        'name': _0x3ed56d(0x345),
                        'description': '',
                        'answers': [{
                            'name': 'on',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'in',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'at',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'for',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x3c,
                        'name': _0x3ed56d(0x2a1),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x336),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1ad),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x25d),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2ae),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x4,
                    'name': _0x3ed56d(0x278),
                    'description': '',
                    'settings': {
                        'requireScore': 0x50,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': !![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': ![]
                    },
                    'questions': [{
                        'id': 0x3d,
                        'name': _0x3ed56d(0x215),
                        'description': '',
                        'answers': [{
                            'name': 'My\x20name\x20Pete.\x20',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2f1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'My\x20name\x27s\x20Pete.',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x293),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3e,
                        'name': '62-\x09In\x20classroom:',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1e5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x340),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x272),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2f5),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3f,
                        'name': _0x3ed56d(0x2ea),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x28c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x341),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1bb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x31d),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x40,
                        'name': _0x3ed56d(0x29e),
                        'description': '',
                        'answers': [{
                            'name': 'fork',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'hot',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'fig',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'fige',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x41,
                        'name': _0x3ed56d(0x282),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x25c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1aa),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'are,\x20armes',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x34e),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x42,
                        'name': '66-\x09In\x20pen:',
                        'description': '',
                        'answers': [{
                            'name': 'in',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x24e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x350),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x32b),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x43,
                        'name': _0x3ed56d(0x1c9),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x238),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1c3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1e3),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'yes,\x20he\x20does',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x44,
                        'name': _0x3ed56d(0x2f0),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x221),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1f0),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2f3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1a3),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x45,
                        'name': _0x3ed56d(0x343),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1f3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2dd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x261),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x299),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x46,
                        'name': _0x3ed56d(0x2f7),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x28e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'mat',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x23a),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x35b),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x47,
                        'name': '71-\x09He\x20----\x20have\x20two\x20brothers.',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x330),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x33a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x24c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x235),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x48,
                        'name': _0x3ed56d(0x2ba),
                        'description': '',
                        'answers': [{
                            'name': 'school',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'playground',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x29f),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2d5),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x49,
                        'name': _0x3ed56d(0x31f),
                        'description': '',
                        'answers': [{
                            'name': 'bigger',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1a5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x288),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'funny',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x4a,
                        'name': _0x3ed56d(0x2f4),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x29b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x280),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x241),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x213),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x4b,
                        'name': _0x3ed56d(0x22c),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1b3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x220),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'insect',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x357),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x4c,
                        'name': _0x3ed56d(0x306),
                        'description': '',
                        'answers': [{
                            'name': 'What\x20do\x20you\x20like?',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x287),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x25f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x35a),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4d,
                        'name': _0x3ed56d(0x339),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2eb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x196),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x217),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'you\x20like',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4e,
                        'name': '78-\x09Can\x20you\x20and\x20your\x20cousin\x20play\x20basketball?',
                        'description': '',
                        'answers': [{
                            'name': 'No,\x20he\x20can\x27t.',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x216),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'No,\x20we\x20can',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c6),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x4f,
                        'name': _0x3ed56d(0x296),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2f2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c9),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'larve',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x240),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x50,
                        'name': '80-\x09---\x20play\x20games',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2e0),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2e8),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'lets',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x262),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x5,
                    'name': _0x3ed56d(0x355),
                    'description': '',
                    'settings': {
                        'requireScore': 0x55,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': !![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': ![]
                    },
                    'questions': [{
                        'id': 0x51,
                        'name': _0x3ed56d(0x19c),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1f1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x304),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x256),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'does\x20have,\x20hair',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x52,
                        'name': _0x3ed56d(0x2fe),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x232),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2cd),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'staircases',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2ad),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x53,
                        'name': _0x3ed56d(0x322),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x197),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2dd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1c4),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x31c),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x54,
                        'name': _0x3ed56d(0x252),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x334),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x32e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'nervous',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2c1),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x55,
                        'name': _0x3ed56d(0x1dd),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x20b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2a6),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'hotest',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2aa),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x56,
                        'name': _0x3ed56d(0x1ac),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x28b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'pin',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x350),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2e5),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x57,
                        'name': _0x3ed56d(0x2db),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x27d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'behind\x20of',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'into\x20of',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2af),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x58,
                        'name': _0x3ed56d(0x2bb),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1ae),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'yes,\x20she\x20is',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c5),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2b5),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x59,
                        'name': _0x3ed56d(0x317),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x20f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x24a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'grasses',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'grapes',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x5a,
                        'name': '90-\x09My\x20sister\x20and\x20I\x20---\x20P.E.\x20---\x20Saturday.',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1b2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1fd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x227),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1d8),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5b,
                        'name': _0x3ed56d(0x1ef),
                        'description': '',
                        'answers': [{
                            'name': 'by',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c8),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'width',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x26f),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5c,
                        'name': '92-\x09-----------------------\x20?\x20Two\x20dollars\x20please.',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1c7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x27b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1ea),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x28a),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5d,
                        'name': _0x3ed56d(0x2bc),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x325),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1ed),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1cb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1af),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x5e,
                        'name': _0x3ed56d(0x1e4),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x276),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1b0),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x27f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x249),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5f,
                        'name': '95-\x09What\x20are\x20you\x20doing?\x20----------------',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x203),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1b1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x20c),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2da),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x60,
                        'name': _0x3ed56d(0x326),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x219),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1d0),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x25e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x313),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x61,
                        'name': _0x3ed56d(0x1a0),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x270),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2ab),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'foots',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x34d),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x62,
                        'name': _0x3ed56d(0x33d),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x28f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x31b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1b0),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x26e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x63,
                        'name': _0x3ed56d(0x27e),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2b9),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x24f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'a\x20lot\x20of,\x20a\x20lot\x20of',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2d0),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x64,
                        'name': _0x3ed56d(0x33b),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x307),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x274),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x34b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2b4),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }]
                }, {
                    'group': 0x6,
                    'name': _0x3ed56d(0x269),
                    'description': '',
                    'settings': {
                        'requireScore': 0x5a,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': !![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': ![]
                    },
                    'questions': [{
                        'id': 0x65,
                        'name': '101-\x09Horse\x20---\x20cat.',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x318),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x308),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1ee),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x33e),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x66,
                        'name': _0x3ed56d(0x34a),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x23d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'polar\x20bear',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'three',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'bear',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x67,
                        'name': _0x3ed56d(0x328),
                        'description': '',
                        'answers': [{
                            'name': 'Who\x20should\x20plays\x20it?',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2a3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x253),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x331),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x68,
                        'name': _0x3ed56d(0x1e6),
                        'description': '',
                        'answers': [{
                            'name': 'go,\x20play,\x20take',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1bd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x305),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2b3),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x69,
                        'name': _0x3ed56d(0x27a),
                        'description': '',
                        'answers': [{
                            'name': 'favorite',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x224),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1eb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2ce),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x6a,
                        'name': '106-\x09Where\x20is\x20Peru?',
                        'description': '',
                        'answers': [{
                            'name': 'in\x20South\x20America',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'in\x20North\x20America',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x200),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x290),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x6b,
                        'name': _0x3ed56d(0x279),
                        'description': '',
                        'answers': [{
                            'name': 'my',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x234),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1dc),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'your',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x6c,
                        'name': '108-\x09Dolphins\x20aren\x27t\x20---.\x20They\x20are\x20---.',
                        'description': '',
                        'answers': [{
                            'name': 'beautiful,\x20safe',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'dangerous,\x20clean',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x337),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x266),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x6d,
                        'name': _0x3ed56d(0x2c4),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x263),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x23e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1bf),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x2c3),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x6e,
                        'name': _0x3ed56d(0x34c),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1da),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x22d),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x1b4),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'anger,\x20scared',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x6f,
                        'name': '111-\x09Farmers\x20keep\x20---\x20and\x20---.',
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1d2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x20d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'sheep,\x20cow',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'sheep,\x20cows',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x70,
                        'name': _0x3ed56d(0x26b),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x267),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x342),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'gets\x20up,\x20watches',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2c0),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x71,
                        'name': _0x3ed56d(0x2e1),
                        'description': '',
                        'answers': [{
                            'name': 'actors,\x20sings',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2f8),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x205),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'actor,\x20sing',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x72,
                        'name': _0x3ed56d(0x218),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x19a),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x354),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x353),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1ab),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x73,
                        'name': _0x3ed56d(0x268),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x321),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1fc),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x323),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1c2),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x74,
                        'name': _0x3ed56d(0x2fc),
                        'description': '',
                        'answers': [{
                            'name': 'vegetables',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x291),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x344),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'chicken',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x75,
                        'name': _0x3ed56d(0x19d),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1db),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2a0),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'waterfall',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'ocean',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x76,
                        'name': _0x3ed56d(0x359),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2e7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x236),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x348),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x202),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x77,
                        'name': _0x3ed56d(0x222),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x2c7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x25a),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x201),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x1cc),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x78,
                        'name': _0x3ed56d(0x1a9),
                        'description': '',
                        'answers': [{
                            'name': _0x3ed56d(0x1bc),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x2cc),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x3ed56d(0x225),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x3ed56d(0x210),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }]
            };

            function _0x5dc8() {
                var _0x12c8fe = ['1184544MxstGV', '63-\x09I\x20have\x20a\x20bag.\x20This\x20is\x20---\x20bag.\x20You\x20have\x20a\x20toy.\x20This\x20is\x20---\x20toy.', 'do\x20you\x20like', 'yellow', '17-\x09Clothes:', 'Wensday,\x20Tursday', 'What\x27s\x20your\x20name?', '68-\x09Who\x20is\x20this?', 'My\x20names\x20Pete.', 'larva', 'This\x20is\x20Beth\x27s\x20dad\x27s', '74-\x09I\x20like\x20those\x20green\x20---\x20on\x20a\x20tree.', 'teddy', 'soup', '70-\x09Firefighter\x20has\x20a\x20yellow\x20---.', 'actors,\x20singers', '4-\x09----\x20your\x20name?', 'There\x20are\x20a\x20pen.', 'It\x27s\x20a\x20boy.', '116-\x09It\x20is\x20not\x20a\x20food\x20group:', 'Wednesday,\x20Thursday', '82-\x09Our\x20classroom\x20is\x20---.', '2-\x09---,\x20two,\x20three,\x20four,\x20five', '35-\x09I\x20have\x20ten\x20----\x20.', 'orange', '10-\x09\x20For\x20school:\x20---,\x20pencil', '52-\x09Animal:', 'have,\x20hair', 'do,\x20play,\x20sell', '76-\x09--------------------\x20?\x20I\x20like\x20eggs.', 'say\x20goodbye', 'faster\x20than', '345868RpfBrb', 'puzzled', '16-\x09What\x27s\x20this?', 'saw', '57-\x09In\x20the\x20kitchen:', 'fingers', 'e,\x20l\x20,\x20m,\x20n', 'It\x27s\x20a\x20red\x20hat.', '7-\x09------------------\x20?\x20It\x27s\x20Jack.', 'What\x20are', 'body\x20shape', 'chite', 'jump', 'There\x20a\x20pen.', '89-\x09I\x20love\x20---.', 'is\x20faster', 'rhino', 'bull', 'rock', 'yes,\x20they\x20hungry', 'my,\x20your', 'socks', '73-\x09I\x20like\x20monkeys\x20so\x20much.\x20They\x20are\x20---\x20.', '12RKRZrO', 'salt,\x20water,\x20in', '83-\x09Are\x20they\x20hungry?', 'salt,\x20water,\x20on', 'No,\x20it\x20isn\x27t', 'on,\x20in,\x20at', '96-\x09A\x20part\x20of\x20body:', '34-\x09Closet:', '103-\x09----------------------\x20?\x20It\x20is\x20my\x20turn\x20to\x20play.', '37-\x09Party:', 's,\x20t,\x20u,\x20v,\x20w,\x20x,\x20y', 'pencil', 'What', 'pillow', 'teachers', '5,\x206,\x207,\x209', 'don\x27t', 'Whose\x20turn\x20is\x20it?', '692427StceGE', '1,\x204\x20,5', 'teach', '18-\x09Food:', 'taxi', 'polluted,\x20clean', 'seesaw', '77-\x09-----------\x20\x20salad?\x20Yes,\x20please', 'does', '100-\x09Suzy\x20---\x20.', '50-\x09This---\x20my\x20home.', '98-\x09Desert\x20doesn\x27t\x20have:', 'is\x20faster\x20than', 'climb', 'folder', 'me,\x20your', 'is\x20getting\x20up,\x20is\x20watching', '69-\x09Are\x20these\x20her\x20socks?', 'dairy', '59-\x09I\x20have\x20milk\x20---\x20breakfast.', '861399ZUfzMq', 'a,\x20b', 'lake', '29-\x09shape:', '102-\x09You\x20can\x20see\x20it\x20in\x20jungle:', 'says\x20good\x20buy', '110-\x09Lion\x20is\x20---.\x20I\x20am\x20---.', 'feet', 'are,\x20arms', 'banana', 'ink', '12-\x09a,\x20b,\x20c,\x20d,\x20---\x20,\x20---\x20,\x20---,\x20---', 'good\x20job', 'in\x20speaking', 'on\x20speaking', 'آزمون\x20تعیین\x20سطح\x20کودکان\x20-\x20بخش\x20پنجم', '4092529pvUCbr', 'mane', 'sandwich', '118-\x09It\x20doesn\x27t\x20have\x20\x20water:', 'Why\x20do\x20you\x20have\x20eggs?', 'uniforms', 'yogurt', '51-\x09Don\x27t\x20---\x20plants.', 'will\x20you\x20like', 'yes,\x20they\x20are\x20hungry', '1-\x09---,\x202,\x203,\x20---,\x20---', '40-\x09Party:', 'at\x20speaking', 'e,\x20f,\x20g,\x20h', '81-\x09Rosy\x20---\x20brown\x20---.', '117-\x09Water\x20falls\x20down.\x20It\x27s\x20beautiful.', '43-\x09Can\x20you\x20help\x20---\x20please?', 'Who\x20is\x20this?', '97-\x09I\x20have\x20two\x20---.', 'bag', 'It\x27s\x20a\x20hat\x20red.', 'This\x20is\x20Beth\x27s\x20dad', 'There\x20I\x20am', 'blacks\x20and\x20whites', 'There\x20is\x20a\x20pen.', 'break', 'parrot', '120-\x09They\x20---\x20in\x20apartment.\x20They\x20---\x20happy.\x20Their\x20daughter\x20---\x20homework\x20every\x20day.\x20', 'is,\x20arms', 'for\x20speaking', '86-\x09\x20For\x20cleaning:', 'taxi\x20drive', 'yes,\x20he\x20is\x20', 'at,\x20in,\x20at', 'sink', 'I\x20watch\x20TV.', 'has,\x20on', 'feather', 'scared,\x20scary', 'nectarine', 'mine', '42-\x09---\x20the\x20ball.', 'sandwiches', '1\x20,5\x20,6', 'parents', 'my,\x20you', 'don\x27t\x20lived,\x20were,\x20did', 'do,\x20play,\x20take', 'white\x20board', 'Neither\x20do\x20I', 'jungle', 'car', 'salt,\x20mash,\x20in', 'yes,\x20he', 'no,\x20they\x20are', '49-\x09For\x20cooking\x20food:', '47-\x09I\x20can\x20---\x20a\x20book.', 'How\x20many\x20is\x20it?\x09', 'name', '67-\x09Is\x20he\x20a\x20doctor?', 'greet', 'at,\x20in,\x20in', 'can\x27t', 'orange\x20bag', '26-\x09Let\x27s\x20share.\x20--------------------\x20', '5,\x206,\x208,\x207', 'muscles', '48-\x09Your\x20picture\x20is\x20very\x20good.\x20----\x20!', 'sheeps,\x20cows', '41-\x09Monday,\x20Tuesday,\x20---,\x20---\x20,\x20Friday,\x20Saturday,\x20Sunday', 'Is\x20this\x20my\x20mom?', 'good', 'Nice\x20to\x20meet\x20you\x20too', 'آزمون\x20تعیین\x20سطح\x20کودکان\x20و\x20نونهالان\x20-\x20بخش\x20سوم', 'have,\x20in', 'read', 'angry,\x20scary', 'sea', 'their', '85-\x09Let\x27s\x20have\x20---\x20pizza.', 'It\x27s\x20red.', '19-\x09Chicken\x20is\x20small.\x20Horse\x20is\x20---\x20.', '5qxwRCv', 'grandpa', 'Is\x20this\x20my\x20dad?', 'yes,\x20he\x20is', '94-\x09Stone\x20---\x20in\x20water.', 'sandcastle', '104-\x09---\x20gymnastics,\x20---\x20chess,\x20---\x20photos', 'table', 'you', 'a,\x20e', 'How\x20much\x20is\x20it?', 'hobby', 'I\x27m\x20a\x20chair.\x20', 'on,\x20on,\x20at', 'are\x20faster', '91-\x09Play\x20---\x20friends', 'This\x20is\x20Beth\x20dad\x27s', 'has,\x20hairs', '55-\x09vacation:', 'yes,\x20there\x20is', 'It\x27s\x20a\x20chair.', '1,\x203,\x205', 'mom', 'teddy\x20bear', '60AtzgCl', 'C,\x20d', '53-\x09In\x20bedroom:', 'one', 'salt,\x20cooks,\x20in', 'have,\x20on', 'good\x20homework', 'e,\x20g,\x20h,\x20i', 'in\x20Europe', 'couldn\x27t', 'bridge', 'I\x20wearing\x20a\x20T-shirt.', 'It\x27s\x20a\x20water', 'singers,\x20musicians', '8ELHzUx', 'rabbit', '9-\x09A,a\x09B,b\x09C,--\x09--,d', '33-\x09Is\x20it\x20a\x20mouse?\x20-----------------------', 'dad', 'hole', 'I\x20am\x20watching\x20TV.', 'ship,\x20cows', 'polar\x20bear', 'breads', 'didn\x27t\x20live,\x20were,\x20do', 'kite', '23-\x09Classroom:', 'leaves', 'What\x20is', '61-\x09What\x27s\x20your\x20name?\x20------------------------', 'No,\x20I\x20can\x27t.', 'would\x20you\x20like', '114-\x09I\x20am\x20very\x20good\x20---\x20English.', 'bend', '21-\x091,\x202,\x203,\x204,\x20---,\x20---,\x20---,\x20---,\x209,\x2010', 'beard', 'circle', 'legs', '5,\x206,\x207,\x208', 'C,\x20D', 'wing', 'This\x20is\x20Beth\x20dad.', '119-\x09You\x20---\x20take\x20a\x20photo\x20in\x20museum.\x20', 's,\x20t,\x20u,\x20v,\x20w,\x20x,\x20i', 'hobbies', 'didn\x27t\x20live,\x20were,\x20does', 'chicken', 'has,\x20in', '78pFuafl', 'sandwichs', '13-\x09color:', '6-\x09I\x20love\x20my\x20---.\x20Her\x20name\x20is\x20Sara.', '75-\x09Lion\x20has:', 'angry,\x20scared', 'c,\x20D', 'cat', 'آزمون\x20تعیین\x20سطح\x20نونهالان\x20و\x20کودکان\x20-\x20بخش\x20دوم', '5-\x09Dad\x27s\x20mom?', 'school', '39-\x09Animal:\x20', 'our', 'doesn\x27t', 'river', 'cick', 'yes,\x20he\x20doctor', '15-\x09toy:', 'helmet', 'cite', 'in,\x20in', 'forest', 'I\x20don\x27t\x20like\x20them\x20neither', 'water', 'lava', 'lives', 'own', 'fox', '3535081uVYMnb', 'are\x20is', '54-\x09---\x20bedroom,\x20---\x20TV', 'آزمون\x20تعیین\x20سطح\x20نونهالان\x20و\x20کودکان', 'bathroom', 'float', 'grape', 'broke', 'not', 'quiet', 'inks', 'some,\x20a\x20lot\x20of', 'organize', 'cow', '84-\x09She\x20is\x20---\x20.', 'Whose\x20turn\x20to\x20play?', 'are', 'sit', 'has,\x20hair', 'tiger', 'there\x20is\x20two\x20pens.', 'puzle', 'mustn\x27t', 'granddaughter', 'is,\x20arm', 'taxi\x20driver', 'things', 'Where\x20do\x20you\x20have\x20eggs?', 'elephant', 'yes,\x20it\x20is', 'lest', 'I\x20don\x27t\x20like\x20too.\x20', 'cik', 'k,\x20t,\x20u,\x20v,\x20w,\x20x,\x20y', 'dangerous,\x20friendly', 'gets\x20up,\x20is\x20watching', '115-\x09Add\x20some\x20---\x20and\x20---\x20them\x20---\x20the\x20dish', 'آزمون\x20تعیین\x20سطح\x20کودکان\x20-\x20بخش\x20ششم', '25-\x09Play\x20time:', '112-\x09He\x20---\x20early\x20every\x20day.\x20He\x20---\x20TV\x20right\x20now.', 'tricycle', '20-\x09a,\x20b,\x20c,\x20d,\x20e,\x20f,\x20g,\x20h,\x20I,\x20j,\x20k,\x20l,\x20m,\x20n,\x20o,\x20p,\x20q,\x20r,\x20---,\x20---,\x20---,\x20---,\x20---,\x20---,\x20---,\x20z', 'sand\x20dune', 'buy', 'fit', 'toy', 'bird', 'There\x20you\x20are', 'says\x20good\x20by', 'No,\x20it\x20is', 'sinks', 'ice\x20cream', 'آزمون\x20تعیین\x20سطح\x20کودکان\x20-\x20بخش\x20چهارم', '107-\x09We\x20have\x20a\x20cool\x20classroom.\x20This\x20is\x20---\x20whiteboard.', '105-\x09What\x20are\x20your\x20---\x20in\x20your\x20country?', 'How\x20much\x20is\x20they?', 'say', 'in\x20front\x20', '99-\x09There\x20weren’t\x20---\x20cars.\x20There\x20were\x20---\x20taxis.', 'floats', 'leave', 'ship', '65-\x09These\x20---\x20my\x20---.', 'sheep', 'bin', 'eraser', '58-\x09I\x20have\x20two\x20----.', 'When\x20do\x20you\x20have\x20eggs?', 'my\x20little', 'No,\x20isn\x27t', 'How\x20many\x20is?', 'map', 'mine,\x20your', 'thirsty', 'hat', 'camel', 'in\x20Africa', 'fruit', 'kitchen', 'Names\x20Pete', '3-\x09---\x20am\x20Sam.', 'They\x20are\x20red\x20hat.', '79-\x09Volcano\x20has:', 'bring', 'doll', 'yes,\x20she\x20is', 'great', 'leafs', 'shoes', 'A,\x20a', '64-\x09We\x20eat:', 'roundabout', 'waterfell', '60-\x09He\x20is\x20a\x20---.', '22-\x09A:\x20Hello\x20Sam.\x20Nice\x20to\x20meet\x20you.\x20\x09\x09B:\x20Hello\x20Jig.\x20------------------', 'Who\x27s\x20turn\x20is\x20it?', 'food', 'a,\x20d', 'whole', '36-\x09They\x20---\x20my\x20dad\x20and\x20mom.\x20', 'pants', 'heads', 'purple', 'foot', 'cut', 'upstairs', 'drive', 'in\x20front\x20of', '46-\x09Pet:', '32-\x09Pet:', 'This\x20is\x20my\x20dad.', 'have,\x20play,\x20take', 'says\x20goodbye', 'yes,\x20she\x20loves\x20it', 'mat', 'sandcastls', 'see', 'some,\x20some', '72-\x09We\x20are\x20on\x20a\x20---\x20.', '88-\x09Does\x20your\x20grandma\x20like\x20music?', '93-\x09---\x20school,\x20---\x20the\x20afternoon,\x20---\x20night', '24268RcOgkd', 'giraffe', 'grandma', 'get\x20up,\x20watch', 'anger', 'tirsthy', 'I\x20don\x27t\x20too', '109-\x09A:\x20I\x20don\x27t\x20like\x20snakes.\x20\x09B:\x20-----------', 'yes,\x20she\x20does', 'No,\x20we\x20can\x27t.', 'must', 'with', 'inside', 'once', 'pen', 'didn\x27t\x20lived,\x20were,\x20didn\x27t', 'stairs', 'doing', 'cake', 'any,\x20some', '45-\x09Can\x20I\x20drink\x20water?\x20I\x20am\x20---\x20.', 'tirsty', 'green', 'Nice\x20to\x20meet\x20you', 'circus', '24-\x09What\x27s\x20this?', 'on,\x20in', 'kick', 'How\x20are\x20you?', 'I\x20play\x20games.', '87-\x09Look\x20at\x20the\x20photo.\x20I\x20am\x20---\x20a\x20tree.', 'I\x27m', 'yes,\x20they\x20are', 'this', 'glue', 'let\x27s', '113-\x09---\x20play\x20in\x20movies,\x20---\x20sing\x20in\x20movies', '11-\x09I\x20---\x20on\x20a\x20chair.', 'A,\x20b', '44-\x09Animal:', 'mop', '31-\x09Toy:', 'ocean', 'lit\x27s'];
                _0x5dc8 = function() {
                    return _0x12c8fe;
                };
                return _0x5dc8();
            }
        </script>
    <?php
    } else if ($id == 2) {
    ?>
        <script>
            function _0x7f82() {
                var _0x4aaff8 = ['confidence', '12358pEhcDT', 'listen\x20never', 'had\x20lived', 'graduating', 'off', 'Next', 'blocked', '17.If\x20I\x20__________\x20closer\x20to\x20my\x20office,\x20I\x20could\x20walk\x20to\x20work.', 'You\x20studied', '2.Would\x20you\x20mind\x20changing\x20my\x20appointment?\x20__________\x20time\x20on\x20Friday\x20is\x20fine.', 'would\x20have\x20been', 'has\x20declined', 'need', 'give', '13.\x20Very\x20rarely\x20_____\x20here\x20in\x20July.', 'only', '3.\x20This\x20is\x20our\x20new\x20teacher.\x20___\x20name\x20is\x20Mark.', 'are\x20drink', 'have\x20been\x20eating', 'Have\x20you\x20read', '5.\x20He\x20turned\x20_____\x20to\x20be\x20considerably\x20older\x20than\x201\x20had\x20imagined.', 'reminds', 'would\x20bring', 'see', 'Did\x20you\x20study', '2.The\x20_____________\x20period\x20of\x20economic\x20growth\x20soon\x20ended.', 'has\x20the\x20dog\x20been\x20being', 'Any', 'be\x20used\x20to', 'superstitious', '12.I\x20____\x20drive\x20a\x20car.\x20I\x27m\x20under\x2018.', 'call', 'just', '9.\x20We\x20may\x20be\x20a\x20bit\x20late.\x20We’re\x20_____\x20in\x20a\x20traffic\x20jam.', 'driving', 'open', 'to\x20drink', 'want', '13.By\x20the\x20end\x20of\x20today’s\x20seminar\x20I\x20will\x20__________\x20to\x20each\x20of\x20you\x20individually.', 'had\x20to\x20be', 'whenever', '4771472lgcvxK', '16.\x20Don\x27t\x20lie\x20to\x20me\x20that\x20you\x20were\x20ill\x20yesterday.\x20You\x20________\x20been\x20ill\x20-\x20Don\x20said\x20you\x20were\x20at\x20the\x20ice\x20hockey\x20match\x20last\x20night.', '1.hey\x20are\x20in\x20the\x20kitchen.\x20By\x20the\x20way,_________nything\x20yet?\x20If\x20not,\x20could\x20you\x20get\x20us\x20something\x20from\x20the\x20supermarket?', '8.Salsa\x20music\x20usually\x20__________\x20me\x20of\x20my\x20trip\x20to\x20Cuba.', 'the\x20highest', 'not\x20are', '3711463ZlbwUH', 'rained', 'been\x20given', 'having\x20driven', 'are\x20you\x20going', 'whatever', 'تعیین\x20سطح\x20بزرگسالان\x20-\x20A2', '7.What\x20would\x20you\x20do\x20if\x20it\x20________\x20on\x20your\x20wedding\x20day?', 'are\x20be', 'until', 'آزمون\x20تعیین\x20سطح\x20بزرگسالان\x20-\x20B2', 'to\x20take', '’ll\x20give', 'is\x20being', 'attended', 'has\x20been', 'speak', '18.Lena\x20used\x20to\x20find\x20work\x20boring\x20__________\x20she\x20became\x20a\x20nurse.', 'Do\x20you\x20go', 'has\x20been\x20declined', '3.We’ve\x20__________\x20come\x20back\x20from\x20a\x20trip\x20to\x20India.\x20It\x20was\x20amazing.', '14.\x20‘Was\x20Debussy\x20from\x20France?’\x20‘Yes,\x20___.’', 'impertinent', 'have\x20spoken', 'wastage', 'don’t\x20reads', 'Did\x20you\x20studied', 'Even\x20if', 'stood', 'was\x20standing', 'تعیین\x20سطح\x20بزرگسالان\x20-\x20C1', 'Every', 'might\x20not', '4.You\x20________\x20the\x20bill\x20by\x20the\x20time\x20the\x20item\x20arrives.', 'is\x20it\x20raining', 'will\x20be\x20left', '12.\x20I’d\x20lived\x20in\x20Australia,\x20so\x20I\x20was\x20used\x20to\x20__________\x20on\x20the\x20left\x20side\x20of\x20the\x20road.', 'had', '8.\x20The\x20experiment\x20_____\x20testing\x20people’s\x20responses\x20before\x20and\x20after\x20drinking\x20coffee.', '2.I’ve\x20got\x20to\x20be\x20at\x20work\x20in\x20five\x20minutes.\x20Don’t\x20worry,\x20I\x20__________\x20you\x20a\x20lift\x20if\x20you\x20want.', 'the\x20higher', 'haven’t', 'should', 'تعیین\x20سطح\x20بزرگسالان\x20-\x20B1', 'taken', 'out', 'wanderlust', 'does', '3.\x20The\x20police\x20claimed\x20that\x20they\x20acted\x20in\x20self\x20_____\x20.', 'impervious', 'All\x20the', 'since', '6.James\x20___\x20basketball\x20in\x20the\x20biggest\x20hall\x20in\x20the\x20city\x20by\x20next\x20Saturday.', '690pnJLMH', '13.It’s\x20Walter’s\x20birthday\x20on\x20Friday.\x20He\x20__________\x20be\x2030,1\x20think.', 'in\x20comparison\x20to', '6.\x20Janet\x20and\x20James\x20had\x20a\x20blazing\x20_______________\x20last\x20night.', '2.\x20I’m\x20Italian.\x20___\x20family\x20are\x20from\x20Venice.', 'deeply', 'can', 'buried', 'can\x27t\x20do', 'should\x20have', '10.\x20Having\x20_____\x20his\x20driving\x20test\x20several\x20times,\x20Paul\x20finally\x20passed\x20at\x20the\x20fourth\x20attempt.', 'remembers', '8.\x20It’s\x20ten\x20___\x20seven.', '9.They\x20might\x20have\x20spent\x20the\x20whole\x20week\x20at\x20the\x20campsite,\x20provided\x20they\x20______\x20enough\x20food\x20and\x20water.', 'did', 'hasn’t\x20been', '7.__________\x20anywhere\x20interesting\x20recently?', 'Can\x27t\x20have', 'will\x20be', 'calling', 'debate', '7.\x20Speed\x20cameras\x20_____\x20shown\x20to\x20reduce\x20accidents.', 'would\x20have', '2.how\x20long\x20_______\x20home\x20alone?', 'Will\x20you\x20go', 'didn\x27t\x20used\x20to\x20be', 'What', 'demand', '2.\x20She\x20invested\x20a\x20lot\x20of\x20time\x20_____\x20researching\x20the\x20most\x20appropriate\x20university\x20course.', 'be\x20speaking', 'What’s', 'row', 'would\x20have\x20to\x20be', 'coming', '1457202fDtPDh', 'saw', 'am\x20standing', '11.If\x20the\x20weather\x20__________\x20bad\x20tomorrow,\x20we\x20can\x20go\x20to\x20a\x20museum.', 'paint', 'use\x20not\x20to\x20be', '9.Have\x20you\x20finished\x20__________\x20the\x20wall\x20yet?', 'some\x20other', '15.I\x20can\x27t\x20hear\x20anything.\x20Is\x20the\x20man\x20on\x20stage\x20_______\x20a\x20prize?', 'hasn’t\x20be', 'would\x20rain', 'not', 'drove', 'parents’', '713537xyqafg', 'Are\x20you\x20reading', 'was\x20seeing', '5.\x20Is\x20Mont\x20Blanc\x20___\x20mountain\x20in\x20Europe?', 'supercilious', 'live', 'borrow', 'didn\x27t\x20use\x20to\x20be', 'broad', 'impious', 'haven’t\x20be', 'walloping', 'to\x20playing', 'disagreement', 'His', 'isn’t\x20going', '19.We\x20___\x20to\x20Canada.', 'were\x20still', 'would\x20still\x20be', 'to\x20paint', 'تعیین\x20سطح\x20بزرگسالان\x20-\x20C2', '\x27ve\x20received', 'has\x20looked,\x20hasn\x27t\x20found', '3.\x20They\x20were\x20_______________\x20even\x20to\x20the\x20charm,\x20eloquence\x20and\x20beauty\x20of\x20Miss\x20Finchley.', 'made', '’m\x20going\x20to\x20give', 'over', 'interest', 'lived', '18.Home\x20buyers\x20________informed\x20of\x20potential\x20taxes\x20before\x20buying\x20their\x20house.', 'is\x20looking,\x20didn\x27t', 'spend', 'more\x20one', 'will', '12.Can\x20I\x20make\x20myself\x20a\x20cup\x20of\x20coffee?\x20Of\x20course.\x20You\x20__________\x20to\x20ask.', '10.\x20You\x20won’t\x20find\x20a\x20camera\x20with\x20so\x20many\x20functions.\x20It\x20____________\x20so\x20heavy\x20as\x20to\x20be\x20hardly\x20usable\x20in\x20field\x20work.', '3.Ben\x20_______\x20(look)\x20for\x20his\x20penknife,\x20but\x20he\x20_______(not\x20find)\x20it\x20yet.', 'the\x20more\x20high', '16.They\x20didn’t\x20___\x20the\x20tickets.', 'Must\x20have', '5222304EQFbWH', 'discipline', 'must\x20have', 'will\x20have\x20been\x20rebuilt', 'What\x20is\x20it', 'are\x20been', '10.Hans\x20isn’t\x20here.\x20He\x20__________\x20to\x20see\x20his\x20grandmother.\x20He’ll\x20be\x20back\x20tomorrow.', '\x2014.\x20I\x20prefer\x20to\x20buy\x20CDs\x20__________\x20download\x20music\x20from\x20my\x20computer.', 'won’t\x20have', 'painting', 'first', 'wide', 'be\x20graduate', 'little', 'don’t\x20have', 'incorporated', 'large', 'lend', 'aren’t', 'entirely', 'round', 'abrupt', 'used\x20to', 'other', 'will\x20rain', 'taking', 'he\x20were', '4.\x20All\x20conference\x20participants\x20wore\x20______________\x20with\x20their\x20names.', '15.If\x20you\x20__________\x20money\x20from\x20a\x20friend,\x20you\x20should\x20always\x20pay\x20it\x20back\x20promptly.', 'stuck', '15.\x20The\x20number\x20of\x20turtles\x20on\x20the\x20island\x20__________\x20by\x2070%\x20over\x20the\x20last\x20decade.', 'third', 'play', '1.\x20We\x20___\x20American.', 'are\x20being', 'were', 'would', '19.When\x20I\x20was\x20a\x20child,\x20I\x20__________\x20climb\x20the\x20wall\x20and\x20jump\x20into\x20our\x20neighbours’\x20garden.', 'painted', '4.___\x20the\x20time?', 'already', 'does\x20it\x20rain', 'had\x20gone', '4.The\x20last\x20time\x20I\x20_____\x20Joanna\x20was\x20in\x20Paris.', '20.\x20I\x20haven’t\x20___\x20this\x20photo\x20before.', 'won’t', '5.\x20Their\x20_____________\x20made\x20them\x20take\x20a\x20trip\x20round\x20the\x20world.', 'do\x20you\x20go\x20to', '10WHjnCG', '7.\x20When\x20we\x20saw\x20a\x20policeman\x20we\x20cleared\x20_____________\x20as\x20fast\x20as\x20we\x20could.', 'took', 'am\x20giving', 'impeccable', 'contained', 'quarrel', 'has', 'parents', 'book', 'didn’t\x20have', 'has\x20been\x20looking,\x20hasn\x27t\x20found', '6.\x20It’s\x20my\x20___\x20computer.', 'has\x20gone', '11.The\x20number\x20of\x20turtles\x20on\x20the\x20island\x20__________\x20by\x2070%\x20over\x20the\x20last\x20decade.', 'watchband', 'have\x20been\x20speaking', 'have\x20seen', '\x27ll\x20have\x20received', 'was', 'surrounded', '8.\x20\x22He\x20would\x20have\x20gone\x20with\x20you\x20if\x20you\x20had\x20asked\x20him.\x22\x20Which\x20conditional\x20is\x20this?', '10.If\x20she\x20doesn\x27t\x20answer,\x20try\x20_______her\x20mobile.', '4.\x20I\x20_____\x20remember\x20putting\x20my\x20briefcase\x20down\x20on\x20that\x20shelf.', 'can\x27t', 'is\x20rebuilt', '14.Learning\x20the\x20piano\x20isn’t\x20as\x20difficult\x20__________\x20learning\x20the\x20violin.', 'are', 'has\x20the\x20dog', '116hlWyZK', 'Its', 'were\x20being', '16qOADsp', 'Might\x20have', 'seen', '11.\x20I\x20___\x20to\x20classical\x20music.', 'drinks', 'Should\x20have', '3804060IolNyK', 'is\x20going\x20to\x20play', 'defence', 'than', '15.Sarah\x20looks\x20really\x20pleased\x20with\x20herself.\x20She\x20________\x20passed\x20her\x20driving\x20test\x20this\x20morning.', 'used', 'never\x20to\x20listen', 'آزمون\x20تعیین\x20سطح\x20بزرگسالان', 'for', 'our', 'make', 'her', 'will\x20leave', 'can’t', 'tags', 'What\x20it\x20is', 'is\x20declining', 'take', 'have', 'mustn’t', 'Provided\x20that', 'like', '5.She\x20___\x20to\x20cook\x20for\x20her\x20boyfriend.', '20.I\x20__________\x20outside\x20the\x20cinema\x20when\x20suddenly\x20apolice\x20car\x20arrived.', '8.\x20The\x20government\x20should\x20introduce\x20measures\x20aimed\x20to\x20put\x20_____________\x20,\x20or\x20at\x20least\x20restrict,\x20organised\x20crime.', 'needn’t', 'had\x20been', 'will\x20still\x20be', 'has\x20been\x20declining', '17.\x20What\x20___\x20do\x20tomorrow?', '4.Julia\x20__________\x20married\x20since\x20she\x20was\x2020.', 'Do\x20you\x20read', '16.If\x20you\x20don\x27t\x20study\x20enough,\x20you\x20_________\x20fail\x20your\x20exam.', 'another', 'would\x20be\x20rebuilt', 'have\x20you\x20ate', 'would\x20be', 'down', 'second', 'booking', '13.She\x20_______\x20very\x20tall\x20when\x20she\x20was\x20in\x20school.', '19.English\x20______\x20understood\x20in\x20most\x20countries\x20in\x20the\x20world.', 'have\x20had', 'don’t\x20never\x20listen', 'can’t\x20have', 'earn', 'isn’t\x20go', '20.He\x20\x20______\x20promoted\x20and\x20now\x20he\x20is\x20the\x20accounts\x20manager.', 'shall', 'Studied\x20you', '9.\x20It\x20is\x20still\x20uncertain\x20whether\x20or\x20not\x20the\x20place\x20__________\x20.\x20The\x20decision\x20must\x20be\x20made\x20before\x20May.'];
                _0x7f82 = function() {
                    return _0x4aaff8;
                };
                return _0x7f82();
            }
            var _0x308909 = _0x8d02;

            function _0x8d02(_0x5910d2, _0x23640c) {
                var _0x7f824a = _0x7f82();
                return _0x8d02 = function(_0x8d0231, _0x3e0a01) {
                    _0x8d0231 = _0x8d0231 - 0x13c;
                    var _0x280326 = _0x7f824a[_0x8d0231];
                    return _0x280326;
                }, _0x8d02(_0x5910d2, _0x23640c);
            }(function(_0x2f875d, _0x39ab52) {
                var _0x29ac61 = _0x8d02,
                    _0x37ad48 = _0x2f875d();
                while (!![]) {
                    try {
                        var _0xa8711a = parseInt(_0x29ac61(0x242)) / 0x1 * (parseInt(_0x29ac61(0x205)) / 0x2) + parseInt(_0x29ac61(0x20e)) / 0x3 + parseInt(_0x29ac61(0x26b)) / 0x4 + parseInt(_0x29ac61(0x1e8)) / 0x5 * (parseInt(_0x29ac61(0x182)) / 0x6) + parseInt(_0x29ac61(0x271)) / 0x7 * (parseInt(_0x29ac61(0x208)) / 0x8) + parseInt(_0x29ac61(0x1b8)) / 0x9 + -parseInt(_0x29ac61(0x160)) / 0xa * (parseInt(_0x29ac61(0x190)) / 0xb);
                        if (_0xa8711a === _0x39ab52) break;
                        else _0x37ad48['push'](_0x37ad48['shift']());
                    } catch (_0x4adfad) {
                        _0x37ad48['push'](_0x37ad48['shift']());
                    }
                }
            }(_0x7f82, 0xca34d));
            var quizData = {
                'group': 0xc,
                'name': _0x308909(0x215),
                'description': 'تعداد\x20سوالات:\x20100\x20سوال\x20در\x20قالب\x206\x20سطح\x20مختلف</br>\x0a\x20\x20\x20\x20هرکس\x20تنها\x20یکبار\x20قادر\x20به\x20شرکت\x20در\x20این\x20آزمون\x20است،\x20بنابراین\x20تنها\x20درصورتی\x20که\x20در\x20شرایط\x20مناسب\x20(زمان\x20و\x20مکان\x20مناسب\x20و\x20برخورداری\x20از\x20تمرکز\x20کافی)\x20هستید\x20برای\x20شرکت\x20در\x20آزمون\x20بر\x20روی\x20دکمه\x20زیر\x20کلیک\x20کلیک\x20کنید\x20تا\x20آزمون\x20برای\x20شما\x20شروع\x20شود.',
                'resultMessage': [{
                    'min': 0x0,
                    'max': 0x1e,
                    'message': ''
                }, {
                    'min': 0x1f,
                    'max': 0x32,
                    'message': ''
                }],
                'settings': {
                    'requireScore': 0x0,
                    'collectParticipantName': ![],
                    'collectMobileNumber': !![],
                    'validateMobileNumber': !![],
                    'registerOnSite': ![],
                    'seprateResult': !![],
                    'showResult': !![],
                    'bookAnAppointment': !![],
                    'oneAttempt': !![]
                },
                'questions': [{
                    'id': 0x1,
                    'name': _0x308909(0x1d9),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x18d),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x270),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x1ca),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'isn’t',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x2,
                    'name': _0x308909(0x164),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x217),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'my',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x219),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'me',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x3,
                    'name': _0x308909(0x252),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x19e),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'Her',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x206),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'He',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x4,
                    'name': _0x308909(0x1df),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x17e),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x1bc),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x17a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x21d),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x5,
                    'name': _0x308909(0x193),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x153),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'the\x20most\x20highest',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x1b5),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x26f),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0x6,
                    'name': _0x308909(0x1f4),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x1f0),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x18f),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'parent',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'parent’s',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x7,
                    'name': '7.\x20Could\x20we\x20___\x20the\x20bill,\x20please?',
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x21f),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x267),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'have',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'ask',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x8,
                    'name': _0x308909(0x16c),
                    'description': '',
                    'answers': [{
                        'name': 'to',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x216),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'at',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'in',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x9,
                    'name': '9.\x20He\x20___\x20the\x20newspaper\x20every\x20day.',
                    'description': '',
                    'answers': [{
                        'name': 'read',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'reads',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'doesn’t\x20reads',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x144),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xa,
                    'name': '10.\x20British\x20people\x20___\x20tea\x20with\x20milk.',
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x266),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'drink',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x20c),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x253),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xb,
                    'name': _0x308909(0x20b),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x214),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x243),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'never\x20listen',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x239),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xc,
                    'name': _0x308909(0x260),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x166),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x200),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': 'can\x20do',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x168),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xd,
                    'name': '13.\x20Would\x20you\x20like\x20___\x20coffee?',
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x1cf),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x22f),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x189),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x1b0),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xe,
                    'name': _0x308909(0x140),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x1d2),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x1fb),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'there\x20were',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'he\x20was',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0xf,
                    'name': '15.\x20___\x20yesterday?',
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x24a),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x145),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x25a),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x23f),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x10,
                    'name': _0x308909(0x1b6),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x235),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'booked',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'to\x20book',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x1f1),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0x11,
                    'name': _0x308909(0x22b),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x275),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'you\x20going',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'are\x20you\x20going\x20to',
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x1e7),
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x12,
                    'name': '18.\x20___\x20this\x20magazine\x20before?',
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x22d),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'Are\x20you\x20going\x20to\x20read',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x191),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x255),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }, {
                    'id': 0x13,
                    'name': _0x308909(0x1a0),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x19a),
                        'priority': '',
                        'isCorrect': !![]
                    }, {
                        'name': _0x308909(0x16f),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x18b),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'haven’t\x20been',
                        'priority': '',
                        'isCorrect': ![]
                    }]
                }, {
                    'id': 0x14,
                    'name': _0x308909(0x1e4),
                    'description': '',
                    'answers': [{
                        'name': _0x308909(0x259),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x183),
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': 'to\x20see',
                        'priority': '',
                        'isCorrect': ![]
                    }, {
                        'name': _0x308909(0x20a),
                        'priority': '',
                        'isCorrect': !![]
                    }]
                }],
                'childs': [{
                    'group': 0x2,
                    'name': _0x308909(0x277),
                    'description': '',
                    'settings': {
                        'requireScore': 0x0,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': ![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': !![]
                    },
                    'questions': [{
                        'id': 0x15,
                        'name': '1.I\x20__________\x20a\x20lot\x20of\x20sport\x20in\x20my\x20free\x20time.',
                        'description': '',
                        'answers': [{
                            'name': 'do',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'practise',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x218),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'exercise',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x16,
                        'name': _0x308909(0x24b),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x247),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x15d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x14a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x25d),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x17,
                        'name': '3.He\x20___\x20playing\x20the\x20piano.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x203),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x15a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1ef),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x18,
                        'name': _0x308909(0x1e3),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1f9),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x183),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x259),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x192),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x19,
                        'name': _0x308909(0x224),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x19f),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x23c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'aren’t\x20going',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'doesn’t\x20go',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1a,
                        'name': _0x308909(0x15f),
                        'description': '',
                        'answers': [{
                            'name': 'is\x20playing',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x20f),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1d8),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x19c),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1b,
                        'name': _0x308909(0x170),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x13d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'Have\x20you\x20been',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'Are\x20you\x20going',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x178),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1c,
                        'name': '8.We\x20never\x20_____\x20a\x20television\x20when\x20I\x20was\x20a\x20child.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x238),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'hadn’t',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x150),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1f2),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1d,
                        'name': _0x308909(0x188),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x186),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1a3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1c1),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1de),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1e,
                        'name': _0x308909(0x1be),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1f5),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x228),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x280),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1e2),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x1f,
                        'name': _0x308909(0x185),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x172),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1fb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x232),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x20,
                        'name': _0x308909(0x1b2),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x154),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x221),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x227),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1c6),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x21,
                        'name': _0x308909(0x161),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x155),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'can',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1b1),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x23e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x22,
                        'name': _0x308909(0x202),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x223),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'so',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x211),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'as',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x23,
                        'name': _0x308909(0x1d4),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x196),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x23b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1af),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1c9),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x24,
                        'name': _0x308909(0x22e),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1b1),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1fb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x232),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x25,
                        'name': _0x308909(0x249),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ac),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'would\x20live',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x244),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x195),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x26,
                        'name': _0x308909(0x13c),
                        'description': '',
                        'answers': [{
                            'name': 'unless',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x27a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'if',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x15e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x27,
                        'name': _0x308909(0x1dd),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1dc),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'did',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x220),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x213),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x28,
                        'name': _0x308909(0x225),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x147),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x148),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'have\x20stood',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x184),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x3,
                    'name': _0x308909(0x156),
                    'description': '',
                    'settings': {
                        'requireScore': 0x0,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': ![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': !![]
                    },
                    'questions': [{
                        'id': 0x29,
                        'name': '1.Shall\x20we\x20go\x20to\x20The\x20Riceboat\x20for\x20dinner?\x20It\x20__________\x20be\x20fully\x20booked.\x20They’re\x20sometimes\x20busy\x20on\x20a\x20Monday.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1b1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'may',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'can',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'must',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2a,
                        'name': _0x308909(0x152),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x24f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1eb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x27d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1a9),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2b,
                        'name': _0x308909(0x13f),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1e0),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'yet',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x262),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x251),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2c,
                        'name': _0x308909(0x22c),
                        'description': '',
                        'answers': [{
                            'name': 'is',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1fb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x280),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x27e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2d,
                        'name': '5.I’ve\x20got\x20a\x20terrible\x20headache,\x20and\x20it\x20won’t\x20go\x20away.\x20Have\x20you\x20tried\x20__________\x20some\x20aspirin?',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x27c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'take',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1ea),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1d1),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2e,
                        'name': '6.I’ve\x20finished\x20this\x20salad\x20and\x20I’m\x20still\x20hungry.\x20I\x20__________\x20ordered\x20something\x20more\x20filling.',
                        'description': '',
                        'answers': [{
                            'name': 'must\x20have',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x176),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x169),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'may\x20have',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x2f,
                        'name': '7.There’s\x20no\x20name\x20on\x20this\x20dictionary.\x20It\x20__________\x20be\x20mine\x20then.\x20Mine’s\x20got\x20my\x20name\x20on\x20the\x20front.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x14b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x221),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1e5),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x21b),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x30,
                        'name': _0x308909(0x26e),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x16b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'realises',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'recognises',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x257),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x31,
                        'name': '9.It’s\x20a\x20huge\x20painting.\x20It\x20__________\x20taken\x20ages\x20to\x20complete.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ba),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x23a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x169),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1c0),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x32,
                        'name': '10.Speed\x20cameras\x20_____\x20shown\x20to\x20reduce\x20accidents.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x220),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x207),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'have\x20been',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1da),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x33,
                        'name': _0x308909(0x1f6),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x24d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x22a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x13e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x21e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x34,
                        'name': '12.__________\x20I\x20had\x20the\x20talent,\x20I\x20still\x20wouldn’t\x20want\x20to\x20be\x20a\x20movie\x20star.',
                        'description': '',
                        'answers': [{
                            'name': 'In\x20case',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x146),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x222),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'However\x20much',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x35,
                        'name': _0x308909(0x268),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x281),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x142),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x17d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1f8),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x36,
                        'name': '14.If\x20the\x20taxi\x20hadn’t\x20stopped\x20for\x20us,\x20we\x20__________\x20standing\x20in\x20the\x20rain.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1a1),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1a2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'are\x20still',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x229),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x37,
                        'name': _0x308909(0x18a),
                        'description': '',
                        'answers': [{
                            'name': 'given',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'being\x20given',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x273),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'gave',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x4,
                    'name': _0x308909(0x27b),
                    'description': '',
                    'settings': {
                        'requireScore': 0x0,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': ![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': !![]
                    },
                    'questions': [{
                        'id': 0x38,
                        'name': _0x308909(0x26d),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x231),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x254),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'have\x20you\x20eaten',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x39,
                        'name': _0x308909(0x177),
                        'description': '',
                        'answers': [{
                            'name': 'has\x20the\x20dog\x20been',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x25c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x204),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3a,
                        'name': _0x308909(0x1b4),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ae),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1f3),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1a6),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3b,
                        'name': _0x308909(0x14c),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1fa),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'will\x20receiving',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1a5),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3c,
                        'name': '5.The\x20boss\x20________\x20by\x20the\x20time\x20the\x20orders\x20come\x20in.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x21a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x14e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'will\x20have\x20left',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x3d,
                        'name': '6.eptember\x20works\x20for\x20us.\x20Lisa\x20will\x20not\x20________\x20by\x20then.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x245),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'have\x20graduated',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1c4),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3e,
                        'name': _0x308909(0x278),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x272),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1d0),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x18c),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x3f,
                        'name': _0x308909(0x1fd),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1c2),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x234),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1d7),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x40,
                        'name': _0x308909(0x16d),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x258),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'would\x20have\x20brought',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'had\x20brought',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x41,
                        'name': _0x308909(0x1fe),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x173),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x261),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'to\x20call',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x42,
                        'name': '11.My\x20mum\x20doesn\x27t\x20let\x20me\x20______\x20with\x20you.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x181),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'come',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'to\x20come',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x43,
                        'name': '12.You\x20will\x20________\x20noisy\x20children\x20soon.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ce),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x25e),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'bee',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x44,
                        'name': _0x308909(0x236),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x197),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x179),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x187),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x45,
                        'name': '14.John\x20__________\x20gone\x20on\x20holiday.\x20I\x20saw\x20him\x20this\x20morning\x20downtown.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x20d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x209),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'Can\x27t\x20have',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x46,
                        'name': _0x308909(0x212),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x171),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1b7),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x20d),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x47,
                        'name': _0x308909(0x26c),
                        'description': '',
                        'answers': [{
                            'name': 'Can\x27t\x20have',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x209),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'would\x20have',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x48,
                        'name': '17.\x20The\x20negotiations\x20_________\x20postponed\x20indefinitely.',
                        'description': '',
                        'answers': [{
                            'name': 'were\x20been',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'were',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x16e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x49,
                        'name': _0x308909(0x1ad),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x279),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1bd),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x203),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4a,
                        'name': _0x308909(0x237),
                        'description': '',
                        'answers': [{
                            'name': 'is',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x27e),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x280),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4b,
                        'name': _0x308909(0x23d),
                        'description': '',
                        'answers': [{
                            'name': 'is',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'had\x20been',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'has\x20been',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }]
                }, {
                    'group': 0x5,
                    'name': _0x308909(0x149),
                    'description': '',
                    'settings': {
                        'requireScore': 0x0,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': ![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': !![]
                    },
                    'questions': [{
                        'id': 0x4c,
                        'name': '1.\x20People\x20were\x20amazed\x20that\x20the\x20burglary\x20took\x20place\x20in\x20_____\x20daylight.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1c3),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x198),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1c8),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x265),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4d,
                        'name': _0x308909(0x17c),
                        'description': '',
                        'answers': [{
                            'name': 'to',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'for',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'with',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'in',
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x4e,
                        'name': _0x308909(0x15b),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ab),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x241),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x210),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1b9),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x4f,
                        'name': _0x308909(0x1ff),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x165),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1cb),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'clearly',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'strongly',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x50,
                        'name': _0x308909(0x256),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1aa),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'up',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x158),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1cc),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x51,
                        'name': '6.\x20The\x20windows\x20in\x20this\x20house\x20are\x20in\x20urgent\x20_____\x20of\x20replacement.',
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x24e),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'help',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x267),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x17b),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x52,
                        'name': _0x308909(0x175),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x220),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'were\x20being',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'have\x20been',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x1da),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x53,
                        'name': _0x308909(0x151),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ed),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1c7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'involved',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'consisted',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x54,
                        'name': _0x308909(0x263),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x167),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1d5),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x248),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1fc),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x55,
                        'name': _0x308909(0x16a),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x157),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1a8),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'had',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x27f),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x56,
                        'name': '11.\x20Maintaining\x20an\x20accurate\x20balance\x20sheet\x20is\x20essential.\x20_____\x20business\x20you’re\x20in.',
                        'description': '',
                        'answers': [{
                            'name': 'however',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'wherever',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x276),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x26a),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x57,
                        'name': _0x308909(0x14f),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x264),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'drive',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x274),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x18e),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x58,
                        'name': _0x308909(0x250),
                        'description': '',
                        'answers': [{
                            'name': 'it\x20rains',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1e1),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x14d),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'it\x20is\x20raining',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x59,
                        'name': _0x308909(0x1bf),
                        'description': '',
                        'answers': [{
                            'name': 'in\x20contrast\x20to',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'as\x20opposed\x20to',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'rather\x20than',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x162),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5a,
                        'name': _0x308909(0x1d6),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x24d),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x22a),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'has\x20been\x20declined',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'is\x20declining',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }, {
                    'group': 0x6,
                    'name': _0x308909(0x1a4),
                    'description': '',
                    'settings': {
                        'requireScore': 0x0,
                        'collectParticipantName': ![],
                        'collectMobileNumber': !![],
                        'validateMobileNumber': !![],
                        'registerOnSite': ![],
                        'seprateResult': !![],
                        'showResult': !![],
                        'bookAnAppointment': !![],
                        'oneAttempt': !![]
                    },
                    'questions': [{
                        'id': 0x5b,
                        'name': '1.\x20Mr\x20Jones\x20said\x20the\x20plan\x20had\x20_____________\x20similarities\x20with\x20the\x20previous\x20one.',
                        'description': '',
                        'answers': [{
                            'name': 'superfluous',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x25f),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'superficial',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x194),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5c,
                        'name': _0x308909(0x25b),
                        'description': '',
                        'answers': [{
                            'name': 'brief',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'concise',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1cd),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1c5),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5d,
                        'name': _0x308909(0x1a7),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x141),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x15c),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x199),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1ec),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5e,
                        'name': _0x308909(0x1d3),
                        'description': '',
                        'answers': [{
                            'name': 'badges',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x21c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'labels',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'signs',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x5f,
                        'name': _0x308909(0x1e6),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1f7),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x159),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x19b),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x143),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x60,
                        'name': _0x308909(0x163),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x1ee),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x174),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x17f),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x19d),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x61,
                        'name': _0x308909(0x1e9),
                        'description': '',
                        'answers': [{
                            'name': 'out',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'off',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': 'away',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': 'up',
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x62,
                        'name': _0x308909(0x226),
                        'description': '',
                        'answers': [{
                            'name': 'up',
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x158),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x246),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x233),
                            'priority': '',
                            'isCorrect': !![]
                        }]
                    }, {
                        'id': 0x63,
                        'name': _0x308909(0x240),
                        'description': '',
                        'answers': [{
                            'name': 'will\x20be\x20rebuilt',
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x230),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x201),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1bb),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }, {
                        'id': 0x64,
                        'name': _0x308909(0x1b3),
                        'description': '',
                        'answers': [{
                            'name': _0x308909(0x180),
                            'priority': '',
                            'isCorrect': !![]
                        }, {
                            'name': _0x308909(0x24c),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x1db),
                            'priority': '',
                            'isCorrect': ![]
                        }, {
                            'name': _0x308909(0x269),
                            'priority': '',
                            'isCorrect': ![]
                        }]
                    }]
                }]
            };
        </script>
    <?php
    } else if ($id == 3) {
    ?>
        <script>
            var quizData = {
                group: 13,
                name: "آزمون تعیین سطح مکالمه",
                description: `تعداد سوالات: 50 سوال</br>
    هرکس تنها یکبار قادر به شرکت در این آزمون است، بنابراین تنها درصورتی که در شرایط مناسب (زمان و مکان مناسب و برخورداری از تمرکز کافی) هستید برای شرکت در آزمون بر روی دکمه زیر کلیک کلیک کنید تا آزمون برای شما شروع شود.`,
                resultMessage: [{
                        min: 0,
                        max: 30,
                        message: "",
                    },
                    {
                        min: 31,
                        max: 50,
                        message: "",
                    },
                ],
                settings: {
                    requireScore: 70,
                    collectParticipantName: false,
                    collectMobileNumber: true,
                    validateMobileNumber: true,
                    registerOnSite: false,
                    seprateResult: true,
                    showResult: true,
                    bookAnAppointment: true,
                    oneAttempt: true,
                },
                questions: [{
                        id: 1,
                        name: '1-She always drives her mom\'s car too fast. What is "she"?',
                        description: "",
                        answers: [{
                                name: "subject",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "object",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "adjective",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "adverb",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 2,
                        name: "2-What is the mark that is put at the end of a sentence to finish it?",
                        description: "",
                        answers: [{
                                name: "dot",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "point",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "period",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "exclamation mark",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 3,
                        name: "3-She can --- piano well.",
                        description: "",
                        answers: [{
                                name: "plays",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "play",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "has",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "plaies",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 4,
                        name: "4-My brother never --- my dad's car.",
                        description: "",
                        answers: [{
                                name: "drives",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "drive",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "has",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "take",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 5,
                        name: "5-My dad and mom --- late.",
                        description: "",
                        answers: [{
                                name: "is never",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "never is",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "are never",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "never are",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 6,
                        name: "6-Does she like watching TV at night?",
                        description: "",
                        answers: [{
                                name: "yes, she does.",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "yes, she is",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "yes, she watches",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "yes, she does at night",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 7,
                        name: "7-Where -- ?",
                        description: "",
                        answers: [{
                                name: "he comes from",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "does he come from",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "does he is from",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "do he comes from",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 8,
                        name: "8-What --- ?",
                        description: "",
                        answers: [{
                                name: "are you do",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "you doing",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "are you doing",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "he doing is",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 9,
                        name: "9-------------- ? He weighs 73 kg. ",
                        description: "",
                        answers: [{
                                name: "how does he weigh",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how much do he weighs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how much does he weigh",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "how weigh does he",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 10,
                        name: "10-My sister is always --- .",
                        description: "",
                        answers: [{
                                name: "watching TV today",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "watches TV tonight",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "being late now",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "late",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 11,
                        name: "11-My grandma --- in the park last night.",
                        description: "",
                        answers: [{
                                name: "ran",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "runs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "was run",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "was raning",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 12,
                        name: "12-My elderly grandma and I --- a taxi this morning.",
                        description: "",
                        answers: [{
                                name: "taking",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "took",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "is taking",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "has taken",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 13,
                        name: "13-Who --- last night?",
                        description: "",
                        answers: [{
                                name: "you saw",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "do you see",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "did you saw",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "did you see",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 14,
                        name: '14-I always meet my friendly teacher fast. What are "friendly" and "fast"?',
                        description: "",
                        answers: [{
                                name: "adj, adj",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "adv, adj",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "adv, adv",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "adj, adv",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 15,
                        name: "15---- do you have?",
                        description: "",
                        answers: [{
                                name: "how many hair",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how many hairs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how much hairs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how much hair",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 16,
                        name: "16-Those are my ---- . He really likes them.",
                        description: "",
                        answers: [{
                                name: "brothers' friends",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "brother's friends",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "brothers' friend",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "brother's friend",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 17,
                        name: "17-I always drive my very fast car fast on quiet streets.",
                        description: "",
                        answers: [{
                                name: 'Subject pronoun, frequency adverb, action verb, possessive adjective, intensifier, adjective, object, manner adverb, prepositions adjective place adverb plural "s" period',
                                priority: "",
                                isCorrect: true,
                            },
                            {
                                name: 'Subject pronoun, frequency adverb, action verb, possessive adjective, intensifier, adjective, object, manner adverb, prepositions adjective place adverb plural "s" dot',
                                priority: "",
                                isCorrect: false,
                            },
                            {
                                name: 'Subject, frequency adverb, action verb, possessive adverb, intensifier, adjective, object, manner adverb, prepositions adjective place adverb plural "s" dot',
                                priority: "",
                                isCorrect: false,
                            },
                            {
                                name: 'Subject, frequency adverb, action verb, possessive adjective, intensifier, adjective, object, time adverb, prepositions adjective place adverb plural "s" period',
                                priority: "",
                                isCorrect: false,
                            },
                        ],
                    },
                    {
                        id: 18,
                        name: "18---- is it? This is my father's.",
                        description: "",
                        answers: [{
                                name: "who",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "whose car",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "whom",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "how old",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 19,
                        name: '19-I was listening to music when I heard the noise in the park. What is "when"?',
                        description: "",
                        answers: [{
                                name: "wh question",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "information question",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "preposition",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "conjunction",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 20,
                        name: "20-I --- the phone if it rings.",
                        description: "",
                        answers: [{
                                name: "am answering",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "answer",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "will answer",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "would answered",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 21,
                        name: "21-She --- a hot cup of coffee today.",
                        description: "",
                        answers: [{
                                name: "likes",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "will like",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "would like",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "prefer",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 22,
                        name: "22-You --- stop at red light no matter what time it is.",
                        description: "",
                        answers: [{
                                name: "must",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "have to",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "are allowed",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "had better",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 23,
                        name: "23-You --- watch out if you pass over a cross-walk.",
                        description: "",
                        answers: [{
                                name: "must",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "have to",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "are allowed",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "had better",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 24,
                        name: "24-You --- do gymnastics or play tennis today for exercising. ",
                        description: "",
                        answers: [{
                                name: "could",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "should",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "had better",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "can",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 25,
                        name: "25-She --- fast when she was younger.",
                        description: "",
                        answers: [{
                                name: "runs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "used to",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "uses to",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "used to run",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 26,
                        name: "26-My brother never --- money.",
                        description: "",
                        answers: [{
                                name: "has a lot of",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "has any",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "have any",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "has many",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 27,
                        name: "27-I --- English ---.",
                        description: "",
                        answers: [{
                                name: "studied, since last year",
                                priority: "",
                                isCorrect: false,
                            },
                            {
                                name: "have studied, last year",
                                priority: "",
                                isCorrect: false,
                            },
                            {
                                name: "have studied, since last year",
                                priority: "",
                                isCorrect: true,
                            },
                            {
                                name: "have studied, for last year",
                                priority: "",
                                isCorrect: false,
                            },
                        ],
                    },
                    {
                        id: 28,
                        name: "28-My cousin --- a faster car next month.",
                        description: "",
                        answers: [{
                                name: "buys",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "must buy",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "can't be buying",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "is going to buy",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 29,
                        name: "29-She --- pizza when I --- her.",
                        description: "",
                        answers: [{
                                name: "ate, called",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "is eating, called",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "was having, called",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "had eaten, called",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 30,
                        name: "30---- you yesterday ?",
                        description: "",
                        answers: [{
                                name: "where you go",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "where were",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "were are",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "who call",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 31,
                        name: "31-Nothing could be better than sitting on --- in the evening and watching the street. ",
                        description: "",
                        answers: [{
                                name: "yard",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "bedroom",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "balcony",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "attic",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 32,
                        name: "32-I have no idea why I lost all my hair. Unfortunately I am --- .",
                        description: "",
                        answers: [{
                                name: "excited",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "bald",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "handsome",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "scared",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 33,
                        name: "33-I love the smell when I peel it. I drink its juice every day in winter.",
                        description: "",
                        answers: [{
                                name: "tangerine",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "peach",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "pear",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "orange",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 34,
                        name: "34-Add some salt and start ---. It helps if you have a cold.",
                        description: "",
                        answers: [{
                                name: "gargling",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "drinking",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "smelling",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "eating",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 35,
                        name: "35-Will you touch a snake? I can't. I'm not --- enough.",
                        description: "",
                        answers: [{
                                name: "nervous",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "generous",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "brave",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "cruel",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 36,
                        name: "36-We can't swim deeply in this pool. It's --- .",
                        description: "",
                        answers: [{
                                name: "deep",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "shallow",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "polluted",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "dangerous",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 37,
                        name: "37-Ant in a sandwich? I don't like it. It's --- .",
                        description: "",
                        answers: [{
                                name: "yummy",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "discussing",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "disgusting",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "cruel",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 38,
                        name: "38-I like egg's ---, but its white isn't cool I think.",
                        description: "",
                        answers: [{
                                name: "meat",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "flesh",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "yolk",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "raw",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 39,
                        name: "39-My sister used to grow her ---. He puts on false ones now. Her fingers are still beautiful.",
                        description: "",
                        answers: [{
                                name: "toe",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "thumb",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "nail",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "hair",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 40,
                        name: "40-My tongue is dry. I am tired and --- . I can't walk any more.",
                        description: "",
                        answers: [{
                                name: "hungry",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "thirsty",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "angry",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "surprised",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 41,
                        name: "41-If you have a cold, don't touch people's property. Your illness is ---.",
                        description: "",
                        answers: [{
                                name: "courageous",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "gorgeous",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "contagious",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "cautious",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 42,
                        name: "42-Have you ever noticed --- people. They are afraid of nothing.",
                        description: "",
                        answers: [{
                                name: "grateful",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "gallant",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "hasty",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "innovative",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 43,
                        name: "43-I would like --- music in public places. Radio broadcasts lots of them.",
                        description: "",
                        answers: [{
                                name: "enough",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "abundant",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "appropriate",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "audible",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 44,
                        name: "44-This color is not a type of yellow.",
                        description: "",
                        answers: [{
                                name: "golden",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "mustard",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "ivory",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "maroon",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 45,
                        name: "45-This animal is bigger than horse. It has thick skin. It has four legs.",
                        description: "",
                        answers: [{
                                name: "rhino",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "mole",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "ant",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "leopard",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 46,
                        name: "46-If you go to a/an ---, you need to come back then.",
                        description: "",
                        answers: [{
                                name: "alley",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "dead-end alley",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "busy street",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "vacant street",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 47,
                        name: "47-They aren't a type of underwear:",
                        description: "",
                        answers: [{
                                name: "panties",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "briefs",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "boxers",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "mittens",
                                priority: "",
                                isCorrect: true
                            },
                        ],
                    },
                    {
                        id: 48,
                        name: "48-Babies who don't have parents are kept in a/an ---.",
                        description: "",
                        answers: [{
                                name: "dormitory",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "shelter",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "orphanage",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "nursing home",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 49,
                        name: "49-My step-father had already had two sons. My mom and step-dad have a child. I love my two ---.",
                        description: "",
                        answers: [{
                                name: "half-brothers",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "step-brothers",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "brothers",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "new brothers",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                    {
                        id: 50,
                        name: "50-He was ---. He was shouting too. He also hit my car.",
                        description: "",
                        answers: [{
                                name: "fierce",
                                priority: "",
                                isCorrect: true
                            },
                            {
                                name: "feeble",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "drastic",
                                priority: "",
                                isCorrect: false
                            },
                            {
                                name: "absurd",
                                priority: "",
                                isCorrect: false
                            },
                        ],
                    },
                ],
            };
        </script>
    <?php
    }
    ?>

    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/jquery-3.6.4.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-date.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-datepicker.min.js' ?>"></script>


<?php
}
add_shortcode("degardc_quiz_builder", "degardc_quiz_builder_callback");
