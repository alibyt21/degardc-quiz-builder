<style>
    .mx-2 {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }

    .my-2 {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .flex {
        display: flex;
    }

    .h-6 {
        height: 1.5rem;
    }

    .h-full {
        height: 100%;
    }

    .w-6 {
        width: 1.5rem;
    }

    .w-\[50px\] {
        width: 50px;
    }

    .w-full {
        width: 100%;
    }

    .flex-1 {
        flex: 1 1 0%;
    }

    .flex-\[2\] {
        flex: 2;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .flex-col {
        flex-direction: column;
    }

    .items-end {
        align-items: flex-end;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .space-x-2> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(0.5rem * var(--tw-space-x-reverse));
        margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .space-y-4> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1rem * var(--tw-space-y-reverse));
    }

    .space-y-6> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .border {
        border-width: 1px;
    }

    .border-l {
        border-left-width: 1px;
    }

    .border-solid {
        border-style: solid;
    }

    .border-dashed {
        border-style: dashed;
    }

    .border-gray-300 {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .border-gray-400 {
        --tw-border-opacity: 1;
        border-color: rgb(156 163 175 / var(--tw-border-opacity));
    }

    .bg-\[\#ff5562\] {
        --tw-bg-opacity: 1;
        background-color: rgb(255 85 98 / var(--tw-bg-opacity));
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    }

    .p-2 {
        padding: 0.5rem;
    }

    .p-3 {
        padding: 0.75rem;
    }

    .p-4 {
        padding: 1rem;
    }

    .px-2 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .text-right {
        text-align: right;
    }

    .text-white {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity));
    }
</style>
<div class="flex p-4" id="quiz-container">
    <div class="flex-[2] px-2 mx-2 space-y-6">
        <div class="border bg-white border-solid border-gray-300 rounded flex flex-col p-4">
            <div>
                نام کوییز
            </div>
            <input class="quiz-name border rounded my-2 w-full" type="text">
        </div>
        <div class="border bg-white border-solid border-gray-300 rounded flex flex-col p-4">
            <div>
                توضیحات
            </div>
            <textarea class="quiz-description w-full border my-2 rounded" name="" rows="3"></textarea>
        </div>
        <div class="flex flex-col bg-white border border-solid border-gray-300 rounded p-4">
            <div class="mb-4">
                سوالات
            </div>
            <div id="questions-container">
                <div class="single-question flex border rounded mb-4">
                    <div class="flex-[2] border-l p-4">
                        <div class="w-full space-y-4">
                            <input class="question-name w-full p-2 border rounded" type="text" placeholder="عنوان سوال خود را اینجا وارد کنید">
                            <textarea class="question-description w-full p-2 text-right border rounded" rows="3" placeholder="در صورت لزوم توضیحات سوال را اینجا وارد کنید"></textarea>
                            <div class="answers-container">
                                <div class="single-answer flex w-full items-center space-x-2 my-2">
                                    <div class="delete-answer cursor-pointer mx-2 bg-[#ff5562] text-white p-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </div>
                                    <input class="answer-name w-full" type="text" placeholder="پاسخ خود را در این قسمت وارد کنید">
                                    <input class="answer-priority w-[50px]" type="number">
                                    <input class="answer-is-correct cursor-pointer" type="checkbox">
                                    <div>صحیح</div>
                                </div>
                            </div>
                            <div class="add-new-answer border border-gray-400 border-dashed rounded p-3 flex justify-center items-center cursor-pointer">
                                <span>افزودن پاسخ جدید</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 p-4 h-full">
                        <div class="delete-question flex justify-center items-end">
                            <div class="flex justify-center bg-[#ff5562] text-white rounded p-2 cursor-pointer w-full">
                                حذف سوال</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new-question border border-gray-400 border-dashed rounded p-3 flex justify-center items-center cursor-pointer">
                <span>افزودن سوال جدید</span>
            </div>

        </div>
    </div>
    <div class="flex-1 bg-white border border-solid border-gray-300 rounded p-4 mx-2 h-full">
        <div class="flex justify-center items-end">
            <div class="flex justify-center bg-[#ff5562] text-white rounded p-2 cursor-pointer w-full">حذف پرسشنامه
            </div>
        </div>
    </div>
</div>