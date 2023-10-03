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

    <div class="info" data-group="<?= $id ?>" data-login="<?= is_user_logged_in() ? "true" : "false" ?>" data-mobile="<?= $user_mobile_number ? "true" : "false" ?>"></div>
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
        <div class="quiz flex dg-main-container overflow-hidden relative flex-col justify-center items-center px-2 w-full min-h-screen my-6" style="display: none;">
            <div class="dg-step-card dg-entrance-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
                <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                    <div class="mx-auto w-full text-center">
                        <h1 class="quiz-name text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center"></h1>
                    </div>
                    <div class="quiz-description invisible max-w-[500px] border border-solid border-gray-200 p-2 md:p-4 lg:p-6 rounded-xl my-10 mx-auto text-justify"></div>
                </div>

                <div class="flex justify-center bg-white p-5 md:p-7 lg:p-10 pt-0 rounded-b-xl absolute bottom-5 w-full transition-all duration-[0.9s] ease-in-out">
                    <button class="dg-start-exam-button dg-next-step-button dg-next-question-button w-full text-center cursor-pointer rounded-xl p-3 text-white flex justify-center items-center h-[63px]" style="max-width: 500px">
                        شروع آزمون
                    </button>
                </div>
            </div>

            <div class="sample-multiple-choice-question dg-step-card dg-question-card bg-white shadow-lg absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] transition-all ease-in-out flex items-center">
                <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                    <div class="question-description text-gray-400">
                        بهترین پاسخ را انتخاب کنید
                    </div>
                    <div class="question question-name text-2xl my-5 mb-7">
                        question name
                    </div>
                    <div class="answer-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="single-option">
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
                    <button disabled class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
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
                        <input id="mobile-number" class="flex-auto w-2/3 focus-visible:outline-none" pattern="[0]{1}[9]{1}[0-9]{9}" type="number" minlength="10" maxlength="11" placeholder="شماره موبایل خود را وارد کنید" />
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
                            <input id="validation-code" class="flex-auto w-full focus-visible:outline-none" type="number" placeholder="کد 4 رقمی ارسال شده را وارد کنید" />
                        </div>
                        <div class="flex justify-center text-sm text-gray-400 my-2">
                            <div class="flex" id="dg-countdown-container">
                                <div class="mx-2">دریافت مجدد کد تا</div>
                                <div id="dg-countdown-timer">03:00</div>
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
                    <div class="p-4 border border-solid border-gray-300 rounded-xl my-6">
                        <input type="text" class="date-picker w-full" />
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
                    <button class="dg-next-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        رزرو
                    </button>
                    <button class="hidden dg-prev-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">

                    </button>
                </div>
            </div>

            <div style="opacity:0" class="thank flex justify-center dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out items-center">
                <div id="thank-message">

                </div>
                <div class="flex flex-col justify-center mx-auto bg-white p-5 md:p-7 lg:p-10 absolute bottom-0 rounded-b-xl w-full max-w-[580px]">
                    <button class="hidden dg-next-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">
                        مشاهده نتیجه
                    </button>
                    <button class="hidden dg-prev-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">

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
                    <div class="dg-single-result flex flex-row items-center justify-between bg-white rounded-xl w-full p-4 px-6 my-2">
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
                <!-- <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 pt-0 rounded-b-xl left-0 right-0 bottom-0 w-full max-w-[500px]">
                    <button class="dg-next-step-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white flex justify-center items-center h-[63px]">
                        تعیین سطح شفاهی
                    </button>
                    <button class="hidden dg-prev-step-button text-gray-500 border border-solid border-gray-200 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 flex justify-center items-center h-[63px]">

                    </button>
                </div> -->
            </div>
        </div>
    </div>




    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/jquery-3.6.4.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-date.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-datepicker.min.js' ?>"></script>


<?php
}
add_shortcode("degardc_quiz_builder", "degardc_quiz_builder_callback");
