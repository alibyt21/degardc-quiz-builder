<style>
    input[type="checkbox"] {
        border: none;
        outline: none;
        position: relative;
        width: 40px;
        height: 24px;
        min-width: 40px;
        -webkit-appearance: none;
        appearance: none;
        background: #ddd;
        border-radius: 2rem;
        cursor: pointer;
        box-shadow: none;
    }

    input[type="checkbox"]:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }

    input[type="checkbox"]::before,
    input[type="checkbox"]:checked::before {
        content: "";
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: 4px;
        left: 4px;
        transition: 0.3s;
        margin: 0px;
    }

    input[type="checkbox"]:checked::before {
        transform: translateX(100%);
    }

    input[type="checkbox"]:checked {
        background: #22c55e;
    }

    /* START inline loader */
    .loading-circle {
        text-align: center;
        border: 3px solid #f3f3f3;
        border-radius: 50%;
        border-top: 3px solid #cecece00;
        width: 25px;
        height: 25px;
        -webkit-animation: spin 1.5s linear infinite;
        /* Safari */
        animation: spin 1.5s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* END inline loader */

    .loading {
        background: #000000aa;
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 5;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>

<div class="loading" style="display: flex;">
    <div class="loading-circle"></div>
</div>

<div class="loaded flex p-4" id="quiz-container" style="filter: blur(5px)">
    <div class="flex-[2] px-2 mx-2 space-y-6">
        <div class="border bg-white border-solid border-gray-300 rounded flex flex-col p-4">
            <div>
                نام آزمون
            </div>
            <input class="quiz-name border rounded my-2 w-full" placeholder="نام آزمون خود را اینجا وارد کنید" type="text">
        </div>
        <div class="border bg-white border-solid border-gray-300 rounded flex flex-col p-4">
            <div>
                توضیحات
            </div>
            <textarea class="quiz-description w-full p-2 border my-2 rounded" name="" placeholder="توضیحات مربوط به آزمون را در این قسمت وارد کنید" rows="3"></textarea>
        </div>
        <div class="thank-message-box border bg-white border-solid border-gray-300 rounded flex flex-col p-4">
            <div>
                محتوا صفحه تشکر سفارشی
            </div>
            <textarea class="quiz-thank-message w-full p-2 border my-2 rounded" name="" placeholder="محتوا مربوط به صفحه تشکر سفارشی سازی شده را در این قسمت وارد کنید" rows="3"></textarea>
        </div>
        <div class="flex flex-col bg-white border border-solid border-gray-300 rounded p-4">
            <div class="mb-4">
                سوالات
            </div>
            <div id="questions-container">
                <div class="single-question flex border rounded mb-4">
                    <div class="flex-[2] border-l p-4">
                        <div class="w-full space-y-4">
                            <input class="question-name rtl w-full p-2 border rounded" type="text" placeholder="عنوان سوال خود را اینجا وارد کنید">
                            <textarea class="question-description w-full p-2 rtl border rounded" rows="3" placeholder="در صورت لزوم توضیحات سوال را اینجا وارد کنید"></textarea>
                            <div class="answers-container">
                                <div class="single-answer flex w-full items-center space-x-2 my-2">
                                    <div class="delete-answer cursor-pointer mx-2 bg-[#ff5562] text-white p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </div>
                                    <input class="answer-name w-full" type="text" placeholder="پاسخ خود را در این قسمت وارد کنید">
                                    <input class="hidden answer-priority w-[50px]" type="number" placeholder="اولویت">
                                    <input class="answer-is-correct cursor-pointer" type="checkbox">
                                </div>
                            </div>
                            <div class="add-new-answer border border-gray-400 border-dashed rounded p-3 flex justify-center items-center cursor-pointer">
                                <span>افزودن پاسخ جدید</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 p-4 h-full">
                        <div class="flex justify-between items-center my-2 mb-4">
                            <span>پاسخ دادن اجباری است</span>
                            <input class="question-settings-isRequired" type="checkbox">
                        </div>
                        <div class="delete-question flex justify-center items-end">
                            <div class="flex justify-center bg-[#ff5562] text-white rounded p-2 cursor-pointer w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <button>حذف سوال</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-question border border-gray-400 border-dashed rounded p-3 flex justify-center items-center cursor-pointer">
                <span>افزودن سوال جدید</span>
            </div>

        </div>
    </div>
    <div class="settings-panel flex-1 bg-white border border-solid border-gray-300 rounded px-4 py-6 mx-2 h-full space-y-6">
        <div class="flex justify-between items-center">
            <span>ثبت نام در سایت اجباری باشد</span>
            <input class="quiz-settings-registerOnSite" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>ورود شماره همراه اجباری باشد</span>
            <input class="quiz-settings-collectMobileNumber" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>تایید شماره همراه اجباری باشد</span>
            <input class="quiz-settings-validateMobileNumber" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>نام و نام خانوادگی دریافت شود</span>
            <input class="quiz-settings-collectParticipantName" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>هرکس فقط یکبار بتواند شرکت کند</span>
            <input class="quiz-settings-oneAttempt" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>صفحه تشکر سفارشی نمایش داده شود</span>
            <input class="quiz-settings-showThank" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>نتیجه آزمون نمایش داده شود</span>
            <input class="quiz-settings-showResult" type="checkbox">
        </div>
        <div class="flex justify-between items-center">
            <span>با انتخاب جواب به سوال بعدی برو</span>
            <input class="quiz-settings-autoSkim" type="checkbox">
        </div>
        <div class="resultMessage-box flex flex-col">
            <div class="resultMessage-container">
                <div class="single-resultMessage border rounded p-4 mt-4">
                    <div class="flex items-center">
                        <input class="resultMessage-lower-bundle w-full p-2 ml-2" type="number" min="0" max="100" placeholder="از (از 0 تا 100 وارد کنید)" id="">
                        <input class="resultMessage-upper-bundle w-full p-2 mr-2" type="number" min="0" max="100" placeholder="تا (از 0 تا 100 وارد کنید)" id="">
                    </div>
                    <textarea class="resultMessage-message w-full mt-4 mb-2 p-2" cols="30" rows="3" placeholder="پیام نمایشی برای بازه مورد نظر"></textarea>
                    <div class="delete-resultMessage flex justify-center items-end">
                        <div class="flex justify-center bg-[#ff5562] text-white rounded p-2 cursor-pointer w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <button>حذف</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-resultMessage border border-gray-400 border-dashed rounded p-3 flex justify-center items-center cursor-pointer mt-4">
                <span>افزودن پیام نمایشی جدید</span>
            </div>
        </div>
        <div class="flex justify-center items-end">
            <button id="save-changes" class="flex justify-center items-center h-10 bg-green-600 text-white rounded-lg p-2 cursor-pointer w-full">
                <span>ذخیره تغییرات</span>
            </button>
        </div>
    </div>
</div>