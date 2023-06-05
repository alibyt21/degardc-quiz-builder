let quizData = {
    group: 1,
    name: "اولین آزمون زبان انگلیسی",
    description: "یسری توضیحات",
    settings: {
        requireScore: 56,
        collectMobileNumber: true,
        validateMobileNumber: true,
        registerOnSite: false,
        seprateResult: true,
        showResult: true,
        bookAnAppointment: true,
    },
    questions: [
        {
            id: 1,
            name: "سلام این سوال اوله",
            description: "",
            answers: [
                {
                    name: "جواب یک",
                    priority: "",
                    isCorrect: true,
                },
                {
                    name: "جواب دو",
                    priority: "",
                    isCorrect: false,
                },
                {
                    name: "جواب سه",
                    priority: "",
                    isCorrect: false,
                },
            ],
            settings: {
                type: "",
                weight: "",
            },
        },
        {
            id: 2,
            name: "سلام این سوال اوله",
            description: "",
            answers: [
                {
                    name: "جواب یک",
                    priority: "",
                    isCorrect: true,
                },
                {
                    name: "جواب دو",
                    priority: "",
                    isCorrect: false,
                },
                {
                    name: "جواب سه",
                    priority: "",
                    isCorrect: false,
                },
            ],
            settings: {
                type: "",
                weight: "",
            },
        },
    ],

    childs: [
        {
            group: 15,
            name: "یک نام تستی برای گروه 15",
            description: "یکسری توضیحات تستی برای گروه 15",
            questions: [
                {
                    id: 24,
                    name: "گروه دوم یک",
                    description: "",
                    answers: [
                        {
                            name: "",
                        },
                        {
                            name: "",
                        },
                    ],
                    settings: {
                        type: "",
                        weight: "",
                    },
                },
            ],
            settings: {
                requireScore: 69,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                bookAnAppointment: true,
            },
            childs: null,
        },
        {
            group: 17,
            name: "یک نام تستی برای گروه 17",
            description: "یکسری توضیحات تستی برای گروه 15",
            questions: [
                {
                    id: 24,
                    name: "گروه هفدهم یک",
                    description: "",
                    answers: [
                        {
                            name: "",
                        },
                        {
                            name: "",
                        },
                    ],
                    settings: {
                        type: "",
                        weight: "",
                    },
                },
            ],
            settings: {
                requireScore: 0,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                bookAnAppointment: true,
            },
            childs: null,
        },
    ],
};

// make a copy of parts of html source
let clonedMultipleChoiceAnswer = document
    .querySelector(".sample-multiple-choice-answer")
    .cloneNode(true);
document.querySelector(".sample-multiple-choice-answer").remove();

let clonedMultipleChoiceQuestion = document
    .querySelector(".sample-multiple-choice-question")
    .cloneNode(true);
document.querySelector(".sample-multiple-choice-question").remove();

let clonedCollectMobileNumber = document
    .querySelector(".collect-mobile-number")
    .cloneNode(true);
document.querySelector(".collect-mobile-number").remove();

let clonedRegisterValidate = document
    .querySelector(".register-validate")
    .cloneNode(true);
document.querySelector(".register-validate").remove();

let clonedOnlyValidate = document
    .querySelector(".only-validate")
    .cloneNode(true);
document.querySelector(".only-validate").remove();

let clonedOnlyRegister = document
    .querySelector(".only-register")
    .cloneNode(true);
document.querySelector(".only-register").remove();

let clonedBookAnAppointment = document
    .querySelector(".book-an-appointment")
    .cloneNode(true);
//remove orginals from html
document.querySelector(".book-an-appointment").remove();

let clonedSingleResult = document
    .querySelector(".dg-single-result")
    .cloneNode(true);
document.querySelector(".dg-single-result").remove();
let clonedResult = document.querySelector(".result").cloneNode(true);
document.querySelector(".result").remove();

function create_multiple_choice_answer(singleAnswer) {
    let newAnswer = clonedMultipleChoiceAnswer.cloneNode(true);
    newAnswer.querySelector(".answer-name").innerHTML = singleAnswer.name;
    return newAnswer;
}
function create_multiple_choice_question(singleQuestion, quizGroup) {
    let newQuestion = clonedMultipleChoiceQuestion.cloneNode(true);
    // answerBlock where answers add to it
    let answerBlock = newQuestion.querySelector(".answer-block");
    // sync question name with data
    newQuestion.querySelector(".question-name").innerHTML = singleQuestion.name;
    // insert id into question
    answerBlock.dataset.qid = singleQuestion.id;
    // insert quiz group id into question
    answerBlock.dataset.qgroup = quizGroup;
    singleQuestion.answers.forEach(function (singleAnswer) {
        answerBlock.appendChild(create_multiple_choice_answer(singleAnswer));
    });
    return newQuestion;
}
function change_question_if_last_or_first(quizData, newQuestion, index) {
    if (index == 0) {
        newQuestion.dataset.qfirst = true;
        let prevStepButton = newQuestion.querySelector(".dg-prev-step-button");
        prevStepButton.style.display = "none";
    }
    if (index == quizData.questions.length - 1) {
        newQuestion.dataset.qlast = true;
        let nextStepButton = newQuestion.querySelector(".dg-next-step-button");
        nextStepButton.innerHTML = "تایید نهایی";
    }
}
function create_quiz(quizData) {
    let mainParent = document.querySelector(".dg-main-container");
    //name and description
    document.querySelector(".quiz-name").innerHTML = quizData.name;
    document.querySelector(".quiz-description").innerHTML =
        quizData.description;

    //questions
    append_all_questions_into_html(quizData, mainParent);

    //collect mobile number
    if (quizData.settings.collectMobileNumber) {
        mainParent.appendChild(clonedCollectMobileNumber);
    }
    if (
        quizData.settings.collectMobileNumber &&
        quizData.settings.validateMobileNumber &&
        quizData.settings.registerOnSite
    ) {
        //register-validate
        mainParent.appendChild(clonedRegisterValidate);
    } else if (
        quizData.settings.collectMobileNumber &&
        quizData.settings.validateMobileNumber &&
        !quizData.settings.registerOnSite
    ) {
        //only-validate
        mainParent.appendChild(clonedOnlyValidate);
    } else if (
        (!quizData.settings.collectMobileNumber ||
            !quizData.settings.validateMobileNumber) &&
        quizData.settings.registerOnSite
    ) {
        //only-register
        mainParent.appendChild(clonedOnlyRegister);
    }

    //book an appointment
    if (quizData.settings.bookAnAppointment) {
        mainParent.appendChild(clonedBookAnAppointment);
    }

    //show result
    mainParent.appendChild(clonedResult);
}
function append_all_questions_into_html(quizData, parentNode) {
    if (quizData.questions) {
        quizData.questions.forEach(function (singleQuestion, index) {
            // TODO check question type -> singleQuestion.settings.type
            // multiple choice
            let newQuestion = create_multiple_choice_question(
                singleQuestion,
                quizData.group
            );
            change_question_if_last_or_first(quizData, newQuestion, index);
            parentNode.appendChild(newQuestion);
        });
    }
    if (quizData.childs) {
        quizData.childs.forEach(function (singleChild) {
            append_all_questions_into_html(singleChild, parentNode);
        });
    }
}
create_quiz(quizData);

const QUESTION_TYPES = {
    type1: "single-option",
    type2: "multi-option",
};
let stepBlocks = document.querySelectorAll(".dg-step-block");
let clonedStartStepBlock = stepBlocks[0].cloneNode(true);
let clonedFirstQuestionBlock = stepBlocks[1].cloneNode(true);
let startExamButton = document.querySelector(".dg-start-exam-button");
let progressBar = document.querySelector(".dg-progress-bar");
let progressBarContainer = document.getElementById("dg-progress-bar-container");
let questionCards = document.querySelectorAll(".dg-question-card");
let stepCards = document.querySelectorAll(".dg-step-card");

let animationDuration = 500;
let entranceAnimationDuration = 1000;
let currentIndex = 1;

init_before_exam_start();
function init_before_exam_start() {
    set_start_exam_button_position();
    set_z_index_for_all_steps_and_make_them_3d();
    set_transition_duration_before_exam_start();
    set_questions_opacity_to_zero_and_qnumber();

    $(".date-picker").persianDatepicker({
        inline: false,
        format: "LLLL",
        viewMode: "day",
        initialValue: 1682970244916,
        minDate: Date(),
        maxDate: null,
        autoClose: false,
        position: "auto",
        altFormat: "lll",
        altField: "#تست",
        onlyTimePicker: false,
        onlySelectOnDate: true,
        calendarType: "persian",
        inputDelay: 800,
        observer: false,
        calendar: {
            persian: {
                locale: "fa",
                showHint: false,
                leapYearMode: "algorithmic",
            },
            gregorian: {
                locale: "en",
                showHint: true,
            },
        },
        navigator: {
            enabled: true,
            scroll: {
                enabled: true,
            },
            text: {
                btnNextText: "<",
                btnPrevText: ">",
            },
        },
        toolbox: {
            enabled: true,
            calendarSwitch: {
                enabled: false,
                format: "MMMM",
            },
            todayButton: {
                enabled: true,
                text: {
                    fa: "امروز",
                    en: "Today",
                },
            },
            submitButton: {
                enabled: true,
                text: {
                    fa: "تایید",
                    en: "Submit",
                },
            },
            text: {
                btnToday: "امروز",
            },
        },
        timePicker: {
            enabled: true,
            step: 1,
            hour: {
                enabled: true,
                step: null,
            },
            minute: {
                enabled: true,
                step: "15",
            },
            second: {
                enabled: false,
                step: null,
            },
            meridian: {
                enabled: false,
            },
        },
        dayPicker: {
            enabled: true,
            titleFormat: "YYYY MMMM",
        },
        monthPicker: {
            enabled: false,
            titleFormat: "YYYY",
        },
        yearPicker: {
            enabled: false,
            titleFormat: "YYYY",
        },
        responsive: true,
    });
}
window.addEventListener("resize", set_start_exam_button_position);

function set_questions_opacity_to_zero_and_qnumber() {
    for (let index = 0; index < questionCards.length; index++) {
        questionCards[index].style.opacity = "0";
        questionCards[index].dataset.qnumber = index;
    }
}

function set_transition_duration_before_exam_start() {
    stepCards.forEach(function (single) {
        single.style.transitionDuration =
            entranceAnimationDuration / 1000 + "s";
        single.style.transitionDelay = (animationDuration * 2) / 1000 + "s";
    });
    progressBar.style.transitionDuration =
        entranceAnimationDuration / 1000 + "s";
    progressBar.style.transitionDelay = animationDuration / 1000 + "s";
}

function set_start_exam_button_position() {
    startExamButton.parentNode.classList.remove("justify-center");
    startExamButton.parentNode.classList.add("justify-end");
    let s = stepBlocks[0].offsetWidth - startExamButton.offsetWidth;
    let extraPadding = +window
        .getComputedStyle(startExamButton.parentNode, null)
        .getPropertyValue("padding-left")
        .replace("px", "");
    startExamButton.style.transform =
        "translateX(" + (s / 2 - extraPadding) + "px)";
}

function set_z_index_for_all_steps_and_make_them_3d() {
    for (let index = 0; index < stepCards.length; index++) {
        stepCards[index].style.zIndex = stepCards.length - index;
    }
}

startExamButton.addEventListener("click", start_exam_button_animations);
function start_exam_button_animations() {
    stepBlocks[0].parentNode.classList.add("dg-question-card");
    // animate first step block
    stepBlocks[0].style.opacity = "0";

    // change content of first step block
    stepBlocks[0].innerHTML = stepBlocks[1].innerHTML;
    stepBlocks[1].parentNode.remove();
    stepCards[0].dataset.qnumber = "0";

    // add class to start exam button
    startExamButton.classList.add("transition-all");
    startExamButton.classList.add("ease-in-out");
    startExamButton.style.transitionDuration = "0.714s";

    // change bottom position of startExamButton
    startExamButton.parentNode.style.bottom = "0";

    // change inside nextStepButton
    setTimeout(function () {
        startExamButton.innerHTML = "بعدی";
    }, animationDuration / 2);

    // reset transform of nextStepButton
    startExamButton.style.maxWidth = "49.5%";
    startExamButton.style.transform = "translateX(0)";

    setTimeout(function () {
        // animate the progress bar
        progressBarContainer.style.visibility = "visible";
        progressBarContainer.style.opacity = "100%";

        // init progress bar
        progressBar.style.width =
            (currentIndex / questionCards.length) * 100 + "%";

        // animate first step block
        stepBlocks[0].classList.add("transition-all");
        stepBlocks[0].classList.add("ease-in-out");
        stepBlocks[0].style.transitionDuration =
            (entranceAnimationDuration - 500) / 1000 + "s";
        stepBlocks[0].style.opacity = "1";
    }, animationDuration);

    exam_is_ready_to_start();

    // remove all events related to startExamButton
    startExamButton.removeEventListener("click", start_exam_button_animations);
    window.removeEventListener("resize", set_start_exam_button_position);
}

function exam_is_ready_to_start() {
    let progressBar = document.querySelector(".dg-progress-bar");
    let participantData = [];
    let currentIndex = 1;
    let nextStepButton = document.querySelectorAll(".dg-next-step-button");
    let prevStepButton = document.querySelectorAll(".dg-prev-step-button");
    let nextQuestionButton = document.querySelectorAll(
        ".dg-next-question-button"
    );
    let allOptions = document.querySelectorAll(".option");
    let stepCards = document.querySelectorAll(".dg-step-card");
    let questionCards = document.querySelectorAll(".dg-question-card");
    let sendNewCode = document.getElementById("dg-send-new-code");

    let quizResult = {
        groupResult: {},
        totalScore: "",
    };
    let insertedId = -1;
    let interval;

    init_view();
    init_participant_data();

    allOptions.forEach(function (singleAnswer) {
        singleAnswer.addEventListener("click", handle_click_on_answer);
    });

    /* every thing happend here */
    nextStepButton.forEach(function (singleNextButton, index) {
        singleNextButton.addEventListener("click", async function (e) {
            if (check_if_is_it_last_question_in_group(e.target)) {
                let group = find_quiz_group_from_next_button(e.target);
                let result = emendate_participant_data_with_single_quiz_data(
                    quizData,
                    group,
                    participantData
                );
                update_quiz_result(group, result.score, result.questionCount);
                if (
                    !check_if_is_allow_to_participate_in_next_group(
                        quizData,
                        group
                    )
                ) {
                    remove_extra_questions(e.target);
                    go_to_next_step_animations(index);
                    handle_request_to_submit_answers();
                    create_result();
                } else {
                    go_to_next_step_animations(index);
                }
            } else if (
                singleNextButton.classList.contains(
                    "collect-mobile-number-button"
                )
            ) {
                // collect mobile number API
                let mobileNumber =
                    document.getElementById("mobile-number").value;
                if (check_mobile_number(mobileNumber)) {
                    if (quizData.settings.validateMobileNumber) {
                        // require validate mobile
                        if (interval) {
                            clearInterval(interval);
                        }
                        interval = count_down();
                        go_to_next_step_animations(index);
                        try {
                            await handle_request_to_send_validation_code_api(
                                mobileNumber
                            );
                        } catch (error) {
                            back_to_prev_step_animations(index + 1);
                        }
                    } else {
                        // just save mobile in db
                        go_to_next_step_animations(index);
                        try {
                            await handle_request_to_save_unvalidate_mobile_number(
                                mobileNumber
                            );
                        } catch (error) {
                            back_to_prev_step_animations(index + 1);
                        }
                    }
                }
            } else if (
                singleNextButton.classList.contains("register-validate-button")
            ) {
                // register-validate API
                console.log("register-validate");
            } else if (
                singleNextButton.classList.contains("only-register-button")
            ) {
                // only register API
                console.log("only-register");
            } else if (
                singleNextButton.classList.contains("only-validate-button")
            ) {
                // only validate API
                let mobileNumber =
                    document.getElementById("mobile-number").value;
                let validationCode = document.getElementById("validation-code").value;
                try {
                    await handle_request_to_check_validation_code(
                        validationCode,
                        mobileNumber
                    );
                    go_to_next_step_animations(index);
                } catch (error) {
                }
            } else {
                // default - for questions next buttons
                go_to_next_step_animations(index);
            }
        });
    });

    prevStepButton.forEach(function (singlePrevButton, index) {
        singlePrevButton.addEventListener("click", function () {
            back_to_prev_step_animations(index + 1);
        });
    });

    /* START api functions */
    async function handle_request_to_send_validation_code_api(mobileNumber) {
        if (insertedId == -1) {
            setTimeout(() => {
                handle_request_to_send_validation_code_api(mobileNumber);
            }, 1000);
            return;
        }
        // send request to send validation code
        try {
            let response = await request_to_api({
                action: "degardc_quiz_builder_send_validation_code_ajax",
                mobileNumber,
                insertedId,
            });
            if (response.error) {
                show_notif(response.message, "error");
            } else {
                show_notif(response.message, "success");
            }
        } catch (error) {
            throw new Error();
        }
    }

    async function handle_request_to_check_validation_code(
        validationCode,
        mobileNumber
    ) {
        try {
            let response = await request_to_api({
                action: "degardc_quiz_builder_check_validation_code",
                validationCode,
                mobileNumber,
                insertedId,
            });
            if (response.error) {
                show_notif(response.message, "error");
                throw new Error();
            } else {
                // nothing in success
            }
        } catch (error) {
            throw new Error();
        }
    }

    async function handle_request_to_save_unvalidate_mobile_number(
        mobileNumber
    ) {
        if (insertedId == -1) {
            setTimeout(() => {
                handle_request_to_save_unvalidate_mobile_number(mobileNumber);
            }, 1000);
            return;
        }
        // send request to save unvalidate mobile number
        try {
            let response = await request_to_api({
                action: "degardc_quiz_builder_save_unvalidate_mobile_ajax",
                mobileNumber,
                insertedId,
            });
            if (response.error) {
                show_notif(response.message, "error");
            } else {
                // nothing in success
            }
        } catch (error) {
            throw new Error();
        }
    }
    async function handle_request_to_submit_answers() {
        let tryCount = 2;
        try {
            return await try_to_submit_answers();
        } catch (error) {
            show_notif(
                "خطا: در ذخیره سازی اطلاعات آزمون شما خطایی رخ داده است، لطفا به پشتیبانی اطلاع دهید",
                "error"
            );
            throw new Error();
            //TODO call error log functions and save error in db
        }
        async function try_to_submit_answers() {
            try {
                tryCount = tryCount - 1;
                let response = await request_to_api({
                    action: "degardc_quiz_builder_submit_answers_ajax",
                    quizId: quizData.group,
                    participantData: JSON.stringify(participantData),
                    quizResult: JSON.stringify(quizResult),
                });
                if (response && !response.error) {
                    insertedId = response.message;
                } else {
                    throw new Error();
                }
            } catch (error) {
                if (tryCount > 0) {
                    await try_to_submit_answers();
                } else {
                    throw new Error();
                }
            }
        }
    }
    async function request_to_api(
        data = {
            action: "",
        },
        url = degardc_quiz_builder_ajax_object.ajax_url
    ) {
        let tryCount = 2;
        // error happend in network layer
        try {
            return await try_request(data, url);
        } catch (error) {
            show_notif(
                "خطا: در برقراری ارتباط با سرور خطایی رخ داد، لطفا اتصال اینترنت خود را چک کنید و چند دقیقه بعد مجددا امتحان کنید",
                "error"
            );
            throw new Error();
        }
        async function try_request(data, url) {
            try {
                tryCount = tryCount - 1;
                let response = await fetch(url, {
                    method: "POST",
                    credentials: "same-origin",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        "Cache-Control": "no-cache",
                    },
                    body: new URLSearchParams(data),
                });
                return response.json();
            } catch (error) {
                if (tryCount > 0) {
                    await try_request(data, url);
                } else {
                    throw new Error();
                }
            }
        }
    }
    /* END api functions */

    if (quizData.settings.validateMobileNumber) {
        sendNewCode.addEventListener("click", function () {
            let mobileNumber = document.getElementById("mobile-number").value;
            count_down();
            handle_request_to_send_validation_code_api(mobileNumber);
        });
    }
    function find_quiz_group_from_next_button(nodeButton) {
        let parent = find_related_parent_by_className(
            nodeButton,
            "dg-question-card"
        );
        return parent.querySelector(".answer-block").dataset.qgroup;
    }
    function go_to_next_step_animations(index) {
        if (!stepCards[+(index + 1)]) {
            return;
        }
        currentIndex = currentIndex + 1;
        let progressBarPercentage =
            (currentIndex / questionCards.length) * 100 >= 100
                ? 100
                : (currentIndex / questionCards.length) * 100;
        progressBar.style.width = progressBarPercentage + "%";

        // current question animation
        if (
            stepCards[index].classList.contains("dg-question-card") &&
            index != questionCards.length - 1
        ) {
            stepCards[index].style.transform =
                "matrix(1.2, 0, 0 , 1.2 , 0 , 100)";
        }
        stepCards[index].style.opacity = "0%";
        stepCards[index].style.visibility = "hidden";
        setTimeout(function () {
            stepCards[index].style.display = "none";
            setTimeout(function () {
                stepCards[index].style.display = "flex";
            }, 50);
        }, animationDuration);

        // next question animation
        stepCards[+(index + 1)].style.transform = "matrix(1, 0, 0 , 1 , 0 , 0)";
        stepCards[+(index + 1)].style.opacity = "100%";

        // 2 next question animation
        if (!stepCards[+(index + 2)]) {
            return;
        }
        if (stepCards[+(index + 2)].classList.contains("dg-question-card")) {
            stepCards[+(index + 2)].style.transform =
                "matrix(0.95, 0, 0 , 0.95 , 0 , 28)";
            stepCards[+(index + 2)].style.opacity = "50%";
        }
        //  else {
        //     stepCards[+(index + 2)].style.opacity = "0%";
        // }

        // 3 next question animation
        if (!stepCards[+(index + 3)]) {
            return;
        }
        if (stepCards[+(index + 3)].classList.contains("dg-question-card")) {
            stepCards[+(index + 3)].style.transform =
                "matrix(0.90, 0, 0 , 0.90 , 0 , 52)";
            stepCards[+(index + 3)].style.opacity = "25%";
        }
        // else {
        //     stepCards[+(index + 3)].style.opacity = "0%";
        // }
    }

    function back_to_prev_step_animations(index) {
        if (!stepCards[+(index - 1)]) {
            return;
        }
        currentIndex = currentIndex - 1;
        let progressBarPercentage =
            (currentIndex / questionCards.length) * 100 >= 100
                ? 100
                : (currentIndex / questionCards.length) * 100;
        progressBar.style.width = progressBarPercentage + "%";

        // current question animation
        if (stepCards[index].classList.contains("dg-question-card")) {
            stepCards[index].style.transform =
                "matrix(0.95, 0, 0 , 0.95 , 0 , 28)";
            stepCards[index].style.opacity = "50%";
        } else {
            stepCards[index].style.opacity = "0%";
        }

        // prev question animation
        stepCards[+(index - 1)].style.transform = "matrix(1, 0, 0 , 1 , 0 , 0)";
        stepCards[+(index - 1)].style.visibility = "visible";
        stepCards[+(index - 1)].style.opacity = "100%";

        // next question animation
        if (!stepCards[+(index + 1)]) {
            return;
        }
        if (stepCards[+(index + 1)].classList.contains("dg-question-card")) {
            stepCards[+(index + 1)].style.transform =
                "matrix(0.9, 0, 0 , 0.9 , 0 , 52)";
            stepCards[+(index + 1)].style.opacity = "25%";
        }
        // else {
        //     stepCards[+(index + 1)].style.opacity = "0%";
        // }

        // 2 next question animation
        if (!stepCards[+(index + 2)]) {
            return;
        }
        if (stepCards[+(index + 2)].classList.contains("dg-question-card")) {
            stepCards[+(index + 2)].style.transform =
                "matrix(0.9, 0, 0 , 0.9 , 0 , 52)";
        }
        // stepCards[+(index + 2)].style.opacity = "0%";
    }

    function handle_click_on_answer(e) {
        let relatedAnswerBlock = find_related_parent_by_className(
            e.target,
            "answer-block"
        );
        let qType = relatedAnswerBlock.dataset.qtype;
        let qid = relatedAnswerBlock.dataset.qid;
        let qgroup = relatedAnswerBlock.dataset.qgroup;

        // for multiple choice
        let relatedAnswer = find_related_parent_by_className(
            e.target,
            "option"
        );

        let answerName = relatedAnswer.querySelector(".answer-name").innerHTML;

        // multiple choice questions
        let indexInParticipantData = check_if_data_exists_in_array(
            participantData,
            "quizGroup",
            qgroup,
            "questionId",
            qid
        );
        if (indexInParticipantData != -1) {
            // update
            let indexInAnswers = check_if_data_exists_in_array(
                participantData[indexInParticipantData].answers,
                "name",
                answerName
            );
            if (qType == QUESTION_TYPES.type1) {
                // single option
                if (indexInAnswers != -1) {
                    // data was existed before and clean up answers
                    participantData[indexInParticipantData].answers = [];
                } else {
                    // add new data
                    participantData[indexInParticipantData].answers = [
                        {
                            name: answerName,
                        },
                    ];
                }
            } else if (qType == QUESTION_TYPES.type2) {
                // multi option
                if (indexInAnswers != -1) {
                    // data was existed before and remove it
                    participantData[indexInParticipantData].answers.splice(
                        indexInAnswers,
                        1
                    );
                } else {
                    participantData[indexInParticipantData].answers.push({
                        name: answerName,
                    });
                }
            }
        } else {
            //insert
            let singleAnswerData = {
                quizGroup: qgroup,
                questionId: qid,
                answers: [
                    {
                        name: answerName,
                    },
                ],
            };
            participantData.push(singleAnswerData);
        }
        sync_participant_data_to_view();
    }

    function check_if_data_exists_in_array(
        array,
        key,
        value,
        key2 = -1,
        value2 = -1
    ) {
        let isFind = -1;
        array.forEach(function (single, index) {
            if (key2 != -1) {
                // we have 2pair
                if (single[key] == value && single[key2] == value2) {
                    isFind = index;
                }
            } else {
                // we have 1pair
                if (single[key] == value) {
                    isFind = index;
                }
            }
        });
        return isFind;
    }

    function init_view() {
        // init step cards after exam (doesn't contain question of exam)
        for (let index = 0; index < stepCards.length; index++) {
            //TODO
            setTimeout(function () {
                stepCards[index].style.transitionDuration =
                    animationDuration / 1000 + "s";
                stepCards[index].style.transitionDelay = "0s";
            }, entranceAnimationDuration);
        }
        setTimeout(function () {
            progressBar.style.transitionDuration =
                animationDuration / 1000 + "s";
            progressBar.style.transitionDelay = "0s";
        }, entranceAnimationDuration);

        // init 3 layers of question
        for (let index = 0; index < questionCards.length; index++) {
            if (index == 1) {
                questionCards[index].style.opacity = "50%";
                questionCards[index].style.transform =
                    "matrix(0.95, 0, 0 , 0.95 , 0 , 28)";
            } else if (index == 2) {
                questionCards[index].style.opacity = "25%";
                questionCards[index].style.transform =
                    "matrix(0.90, 0, 0 , 0.90 , 0 , 52)";
            } else if (index >= 3) {
                questionCards[index].style.opacity = "0%";
                questionCards[index].style.transform =
                    "matrix(0.85, 0, 0 , 0.85 , 0 , 76)";
            }
        }
    }

    function sync_participant_data_to_view() {
        let answerBlocks = document.querySelectorAll(".answer-block");
        answerBlocks.forEach(function (singleAnswerBlock) {
            let qid = singleAnswerBlock.dataset.qid;
            let qgroup = singleAnswerBlock.dataset.qgroup;
            let indexInParticipantData = check_if_data_exists_in_array(
                participantData,
                "quizGroup",
                qgroup,
                "questionId",
                qid
            );
            if (indexInParticipantData != -1) {
                // means question exists in participate data
                // START multiple choice questions
                let options = singleAnswerBlock.querySelectorAll(".option");
                options.forEach(function (singleAnswer) {
                    let optionName =
                        singleAnswer.querySelector(".answer-name").innerHTML;
                    let indexInAnswers = check_if_data_exists_in_array(
                        participantData[indexInParticipantData].answers,
                        "name",
                        optionName
                    );
                    if (indexInAnswers != -1) {
                        singleAnswer.classList.add("selected");
                    } else {
                        singleAnswer.classList.remove("selected");
                    }
                });
                // END multiple choice questions
            }
        });

        localStorage.setItem(
            "participantData",
            JSON.stringify(participantData)
        );
    }

    function init_participant_data() {
        if (localStorage.getItem("participantData")) {
            participantData = JSON.parse(
                localStorage.getItem("participantData")
            );
            sync_participant_data_to_view();
        }
    }

    /* Start quiz correction */
    function emendate_participant_data_with_single_quiz_data(
        quizData,
        group,
        participantData = null
    ) {
        let singleQuizData = get_quiz_sub_data_by_quiz_group(quizData, group);
        console.log(singleQuizData);
        let questionCount = singleQuizData.questions.length;
        let groupScore = 0;
        participantData.forEach(function (singleAnswer) {
            if (singleAnswer.quizGroup == group) {
                let question = get_question_in_sub_data_by_question_id(
                    singleQuizData,
                    singleAnswer.questionId
                );
                if (
                    singleAnswer.questionId == question.id &&
                    singleAnswer.answers.length
                ) {
                    let scoreTakenFromSingleQuestion =
                        check_answer_with_question_data_and_return_score(
                            question,
                            singleAnswer
                        );
                    groupScore = groupScore + scoreTakenFromSingleQuestion;
                }
            }
        });
        return {
            score: (groupScore / questionCount) * 100,
            questionCount,
        };
    }
    function check_answer_with_question_data_and_return_score(
        question,
        participantAnswer
    ) {
        let score = 1;

        /* ALGORYTHM 1 - only answer is correct if it is the as same as asnwer paper */
        participantAnswer.answers.forEach(function (singleParticipantAnswer) {
            question.answers.forEach(function (singleQuestionAnswer) {
                if (
                    singleParticipantAnswer.name == singleQuestionAnswer.name &&
                    !singleQuestionAnswer.isCorrect
                ) {
                    score = 0;
                }
            });
        });
        return score;
        /* ALGORYTHM 1 - only answer is correct if it is the as same as asnwer paper */
    }

    function get_question_in_sub_data_by_question_id(subData, questionId) {
        for (let index = 0; index < subData.questions.length; index++) {
            if (subData.questions[index].id == questionId) {
                return subData.questions[index];
            }
        }
    }
    function get_quiz_sub_data_by_quiz_group(quizData, group) {
        if (quizData.group == group) {
            return quizData;
        } else {
            if (quizData.childs) {
                for (let index = 0; index < quizData.childs.length; index++) {
                    if (
                        get_quiz_sub_data_by_quiz_group(
                            quizData.childs[index],
                            group
                        )
                    ) {
                        return get_quiz_sub_data_by_quiz_group(
                            quizData.childs[index],
                            group
                        );
                    }
                }
            } else {
                return false;
            }
        }
    }
    function update_quiz_result(group, score, questionCount) {
        let sum = 0;
        let questionCountTotal = 0;
        if (!quizResult.groupResult[group]) {
            //insert
            quizResult.groupResult[group] = {};
        }
        quizResult.groupResult[group].score = score;
        quizResult.groupResult[group].questionCount = questionCount;
        for (const key in quizResult.groupResult) {
            sum =
                sum +
                quizResult.groupResult[key].score *
                    quizResult.groupResult[key].questionCount;
            questionCountTotal =
                questionCountTotal + quizResult.groupResult[key].questionCount;
        }
        quizResult.totalScore = sum / questionCountTotal;
        // we can add weight to every single quiz group and make weighted average
    }
    /* END quiz correction */
    function check_if_is_allow_to_participate_in_next_group(quizData, group) {
        let singleQuizData = get_quiz_sub_data_by_quiz_group(quizData, group);
        let requireScore = +singleQuizData.settings.requireScore;
        let takenScore = +quizResult.groupResult[group].score;
        return requireScore <= takenScore ? true : false;
    }
    function check_if_is_it_last_question_in_group(nodeButton) {
        let parent = find_related_parent_by_className(
            nodeButton,
            "dg-question-card"
        );
        return parent && parent.dataset.qlast ? true : false;
    }
    function remove_extra_questions(nodeButton) {
        let parent = find_related_parent_by_className(
            nodeButton,
            "dg-question-card"
        );
        let lastqnumber = parent.dataset.qnumber;
        let stepCards = document.querySelectorAll(".dg-step-card");
        for (let index = 0; index < stepCards.length; index++) {
            if (
                stepCards[index].dataset.qnumber > lastqnumber &&
                stepCards[index].classList.contains("dg-question-card") &&
                !stepCards[index].classList.contains("dg-after-exam-question")
            ) {
                stepCards[index].remove();
            }
        }
    }

    function create_result() {
        init_total_score();
        if (quizData.settings.seprateResult) {
            for (const groupId in quizResult.groupResult) {
                let newElem = clonedSingleResult.cloneNode(true);
                let groupData = get_quiz_sub_data_by_quiz_group(
                    quizData,
                    groupId
                );
                newElem.querySelector(".dg-single-result-name").innerHTML =
                    groupData.name;
                newElem.querySelector(
                    ".dg-single-result-description"
                ).innerHTML = groupData.description;
                newElem.querySelector(".dg-single-result-score").innerHTML =
                    quizResult.groupResult[groupId].score + "%";
                clonedResult.appendChild(newElem);
            }
            init_ratings();
        }
    }
    function init_total_score() {
        let totalScore = parseInt(quizResult.totalScore).toFixed(0);
        let percentageCurve = document.getElementById("percentage-curve");
        let percentageText = document.getElementById("percentage-text");
        percentageText.textContent = totalScore.toString();
        var progress = 1 - totalScore / 100;
        percentageCurve.style.strokeDashoffset = 198 * progress;
    }
    function init_ratings() {
        /*
        Conic gradients are not supported in all browsers (https://caniuse.com/#feat=css-conic-gradients), so this pen includes the CSS conic-gradient() polyfill by Lea Verou (https://leaverou.github.io/conic-gradient/)
        */

        // Find al rating items
        const ratings = document.querySelectorAll(".rating");

        // Iterate over all rating items
        ratings.forEach((rating) => {
            // Get content and get score as an int
            const ratingContent = rating.innerHTML;
            const ratingScore = parseInt(ratingContent, 10);

            // Define if the score is good, meh or bad according to its value
            const scoreClass =
                ratingScore < 40 ? "bad" : ratingScore < 60 ? "meh" : "good";

            // Add score class to the rating
            rating.classList.add(scoreClass);

            // After adding the class, get its color
            const ratingColor = window.getComputedStyle(rating).backgroundColor;

            // Define the background gradient according to the score and color
            const gradient = `background: conic-gradient(${ratingColor} ${ratingScore}%, transparent 0 100%)`;

            // Set the gradient as the rating background
            rating.setAttribute("style", gradient);

            // Wrap the content in a tag to show it above the pseudo element that masks the bar
            rating.innerHTML = `<span>${ratingScore} ${
                ratingContent.indexOf("%") >= 0 ? "<small>%</small>" : ""
            }</span>`;
        });
    }

    setInterval(function () {
        console.log(quizResult);
    }, 2000);
}

/* START helper functions */
function check_mobile_number(mobileNumber) {
    if (!mobileNumber) {
        show_notif("لطفا شماره همراه خود را وارد کنید", "alert");
        return false;
    }
    if (!is_mobile_number_valid_in_iran(mobileNumber)) {
        show_notif("شماره همراه وارد شده نامعتبر است", "alert");
        return false;
    }
    return true;
}
function count_down() {
    // Get the countdown timer element
    let countdownContainer = document.getElementById("dg-countdown-container");
    var countdownTimer = document.getElementById("dg-countdown-timer");
    let sendNewCode = document.getElementById("dg-send-new-code");

    // init
    countdownContainer.style.display = "flex";
    sendNewCode.style.display = "none";
    // Set the minutes and seconds to countdown
    var minutes = 0;
    var seconds = 5;

    // Calculate the total seconds
    var totalSeconds = minutes * 60 + seconds;

    // Update the countdown timer every second
    var countdownInterval = setInterval(function () {
        // Calculate the minutes and seconds left
        var minutesLeft = Math.floor(totalSeconds / 60)
            .toString()
            .padStart(2, "0");
        var secondsLeft = (totalSeconds % 60).toString().padStart(2, "0");

        // Display the minutes and seconds left in the countdown timer element
        countdownTimer.innerHTML = minutesLeft + ":" + secondsLeft;

        // Subtract one second from the total seconds
        totalSeconds--;

        // If the countdown is finished, clear the countdown interval
        if (totalSeconds < 0) {
            clearInterval(countdownInterval);
            countdownContainer.style.display = "none";
            sendNewCode.style.display = "flex";
        }
    }, 1000);
    return countdownInterval;
}
function show_notif(text, type = "alert") {
    let color;
    switch (type) {
        case "alert":
            color = "#333333";
            break;
        case "error":
            color = "#fe597b";
            break;
        case "success":
            color = "#6ac847";
            break;
    }
    Toastify({
        text,
        duration: 5000,
        close: false,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: color,
            borderRadius: "10px",
            boxShadow: "0 3px 6px 0px rgba(0,0,0,.06)",
            userSelect: "none",
        },
    }).showToast();
}
function is_mobile_number_valid_in_iran(number) {
    var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
    var result = regex.test(number);
    return result;
}
function find_related_parent_by_className(node, className) {
    let isFindParent = false;
    let parent = node;
    // prevent infinite loop
    let counter = 0;
    while (!isFindParent && counter <= 5) {
        if (
            parent &&
            parent.className &&
            parent.className.toString().includes(className)
        ) {
            isFindParent = true;
        } else {
            parent = parent.parentNode ? parent.parentNode : parent;
        }
        counter = counter + 1;
    }
    if (isFindParent) {
        return parent;
    } else {
        return false;
    }
}
/* END helper functions */
