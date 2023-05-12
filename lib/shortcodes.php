<?php

function dg_quiz_builder_callback()
{
?>
    <link rel="stylesheet" href="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/css/persian-datepicker.min.css' ?>" />
    <link rel="stylesheet" href="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/css/index.css' ?>" />

    <div class="dg-main-container overflow-hidden relative flex flex-col justify-center items-center px-2 w-full h-screen my-6">
        <div class="bg-white absolute top-4 left-2 h-2 right-2 w-auto rounded-xl my-2 transition-all ease-in-out duration-1000" id="dg-progress-bar-container" style="visibility: hidden; opacity: 0;">
            <div class="dg-progress-bar absolute right-0 bg-blue-500 h-2 rounded-xl transition-all duration-1000 ease-in-out" style="width: 0%;"></div>
        </div>



        <div class="dg-step-card dg-entrance-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="mx-auto w-full text-center">
                    <img class="mx-auto max-w-[300px] mb-7" src="https://www.izaban.org/wp-content/uploads/elementor/thumbs/logo__2_-removebg-preview-ptzef6xvxwbkibnt8fw570yem3npogba2jd043xheg.png" alt="">
                    <h1 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                        آزمون تعیین سطح آنلاین زبان انگلیسی
                    </h1>
                </div>

                <div class="max-w-[500px] border border-solid border-gray-200 p-2 md:p-4 lg:p-6 rounded-xl my-10 mx-auto text-justify">
                    از جدیدترین روش های تعیین سطح، تعیین سطح آنلاین است که به تازگی با فراگیر شدن بستر اینترنت و در حال
                    حاضر با توجه به شیوع گسترده بیماری کرونا رشد و رواج پیدا کرده و با استفاده از اینترنت در هر زمان و
                    مکانی می توانید آن را انجام دهید. اخیرا بسیاری از آموزشگاه ها از تعیین سطح آنلاین استفاده می کنند.
                </div>
            </div>

            <div class="flex justify-center bg-white p-5 md:p-7 lg:p-10 rounded-b-xl absolute bottom-5 w-full transition-all duration-[0.9s] ease-in-out">
                <button class="dg-start-exam-button dg-next-step-button w-full text-center cursor-pointer rounded-xl p-3 text-white" style="max-width: 500px;">
                    شروع آزمون
                </button>
            </div>
        </div>


        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option" data-qnumber="0">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>

        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>


        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>


        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>


        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>

        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>

        <div class="dg-step-card dg-question-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="dg-step-block max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl">
                <div class="text-gray-400">
                    بهترین پاسخ را انتخاب کنید
                </div>
                <div class="question text-2xl my-5 mb-7">
                    I ________________ from France
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="multi-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>is</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>are</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>am</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>be</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-between p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute bottom-0 w-full">
                <button class="dg-prev-question-button dg-prev-step-button hover:bg-[#efefef] transition-all duration-300 ease-in-out border border-solid border-gray-300 cursor-pointer w-full rounded-xl p-3 last:mr-5">
                    قبلی
                </button>
                <button class="dg-next-question-button dg-next-step-button transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 last:mr-5 text-white">
                    بعدی
                </button>
            </div>
        </div>












        <div class="dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="flex justify-center flex-col mx-auto max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl max-w-[500px]">
                <div class="text-center my-2">
                    <h1 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                        نتیجه آزمون به شماره شما ارسال خواهد شد
                    </h1>
                </div>
                <div class="border border-solid border-gray-200 p-3 rounded-xl my-2">
                    <input class="flex-auto w-2/3 focus-visible:outline-none" type="tel" placeholder="نام و نام خانوادگی" />
                </div>
                <div class="flex flex-row w-full justify-between p-3 rounded-xl border my-2 border-solid border-gray-300">
                    <input class="flex-auto w-2/3 focus-visible:outline-none" type="tel" placeholder="شماره موبایل خود را وارد کنید" />
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
            <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute left-0 right-0 bottom-0 w-full max-w-[500px]">
                <button class="dg-next-step-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">
                    تایید شماره
                </button>
                <button class="dg-prev-step-button text-gray-500 border border-solid border-gray-200 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3">
                    بازگشت به آزمون
                </button>
            </div>
        </div>



        <div class="dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out flex items-center">
            <div class="flex justify-center flex-col mx-auto max-h-[600px] overflow-auto p-5 md:p-7 lg:p-10 w-full overflow-y-visible rounded-xl max-w-[500px]">
                <div class="text-center my-2">
                    <h1 class="text-[18px] md:text-[20px] lg:text-[22px] font-semibold text-center">
                        کد تایید ارسال شده را وارد کنید
                    </h1>
                </div>
                <div class="border border-solid border-gray-200 p-3 rounded-xl my-2">
                    <input class="flex-auto w-full focus-visible:outline-none" type="number" placeholder="کد 4 رقمی ارسال شده را وارد کنید" />
                </div>

            </div>
            <div class="flex flex-col justify-center mx-auto p-5 bg-white md:p-7 lg:p-10 rounded-b-xl absolute left-0 right-0 bottom-0 w-full max-w-[500px]">
                <button class="dg-next-step-button mb-3 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">
                    ارسال نتیجه آزمون
                </button>
                <button class="dg-prev-step-button text-gray-500 border border-solid border-gray-200 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3">
                    اصلاح شماره
                </button>
            </div>
        </div>

        <div class="flex justify-center dg-question-card dg-after-exam-question dg-step-card bg-white absolute top-12 left-2 right-2 rounded-xl w-auto h-[90vh] shadow-lg transition-all ease-in-out items-center">
            <div class="p-5 md:p-7 lg:p-10">
                <div class="question text-2xl my-5 mb-7">
                    نوع آزمون شفاهی تعیین سطح خود را مشخص کنید
                </div>
                <div class="p-4 border border-solid border-gray-300 rounded-xl my-6">
                    <input type="text" class="date-picker w-full" />
                </div>
                <div class="option-block w-full grid grid-cols-1 gap-3 lg:gap-5 lg:grid-cols-2" data-qtype="single-option">
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>تعیین سطح شفاهی حضوری</span>
                    </div>
                    <div class="option">
                        <div class="bullet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 check">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>تعیین سطح شفاهی آنلاین</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center mx-auto bg-white p-5 md:p-7 lg:p-10 absolute bottom-0 rounded-b-xl w-full max-w-[580px]">
                <button class="hidden dg-next-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">

                </button>
                <button class="dg-next-step-button mb-3 bg-blue-500 transition-all duration-300 ease-in-out cursor-pointer w-full rounded-xl p-3 text-white">
                    رزرو تعیین سطح شفاهی
                </button>
            </div>
        </div>



    </div>


    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/jquery-3.6.4.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-date.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/persian-datepicker.min.js' ?>"></script>
    <script src="<?= DEGARDC_QUIZ_BUILDER_URL . 'assets/js/index.js' ?>"></script>



<?php
}
add_shortcode("dg_quiz_builder", "dg_quiz_builder_callback");
