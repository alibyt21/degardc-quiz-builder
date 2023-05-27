let quizData = {
    group: 1,
    name: "اولین آزمون زبان انگلیسی",
    description: "یسری توضیحات",
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
        },{
            id: 15,
            name: "سلام این سوال اوله",
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
        {
            id: 24,
            name: "سلام این سوال اوله",
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
        requireScore: "0",
        validateMobileNumber: true,
        registerOnSite: true,
        seprateResult: true,
        bookAnAppointment: true,
    },
    childs: [
        {
            group: 15,
            name: "",
            description: "",
            questions: [
                {
                    id: 24,
                    name: "سوال سوم",
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
                requireScore: "0",
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

let clonedMobileNumberValidation = document
    .querySelector(".mobile-number-validation")
    .cloneNode(true);
document.querySelector(".mobile-number-validation").remove();

let clonedRegisterOnSite = document
    .querySelector(".register-on-site")
    .cloneNode(true);
document.querySelector(".register-on-site").remove();

let clonedBookAnAppointment = document
    .querySelector(".book-an-appointment")
    .cloneNode(true);
//remove orginals from html
document.querySelector(".book-an-appointment").remove();

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
function create_quiz(quizData) {
    let mainParent = document.querySelector(".dg-main-container");
    //name and description
    document.querySelector(".quiz-name").innerHTML = quizData.name;
    document.querySelector(".quiz-description").innerHTML =
        quizData.description;

    //questions
    append_all_questions_into_html(quizData, mainParent);

    //register on site
    if (quizData.settings.registerOnSite) {
        mainParent.appendChild(clonedRegisterOnSite);
    }
    if (quizData.settings.validateMobileNumber) {
        mainParent.appendChild(clonedMobileNumberValidation);
    }
    if (quizData.settings.bookAnAppointment) {
        mainParent.appendChild(clonedBookAnAppointment);
    }
    mainParent.appendChild(clonedResult);
}
function append_all_questions_into_html(quizData, parentNode) {
    if (quizData.questions) {
        quizData.questions.forEach(function (singleQuestion) {
            // TODO check question type -> singleQuestion.settings.type
            // multiple choice
            parentNode.appendChild(
                create_multiple_choice_question(singleQuestion, quizData.group)
            );
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
    let allOptions = document.querySelectorAll(".option");
    let stepCards = document.querySelectorAll(".dg-step-card");
    let questionCards = document.querySelectorAll(".dg-question-card");

    init_view();
    init_participant_data();

    allOptions.forEach(function (singleAnswer) {
        singleAnswer.addEventListener("click", handle_click_on_answer);
    });

    nextStepButton.forEach(function (singleNextButton, index) {
        singleNextButton.addEventListener("click", function () {
            go_to_next_step_animations(index);
        });
    });

    prevStepButton.forEach(function (singlePrevButton, index) {
        singlePrevButton.addEventListener("click", function () {
            back_to_prev_step_animations(index + 1);
        });
    });

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
        } else {
            stepCards[+(index + 2)].style.opacity = "0%";
        }

        // 3 next question animation
        if (!stepCards[+(index + 3)]) {
            return;
        }
        if (stepCards[+(index + 3)].classList.contains("dg-question-card")) {
            stepCards[+(index + 3)].style.transform =
                "matrix(0.90, 0, 0 , 0.90 , 0 , 52)";
            stepCards[+(index + 3)].style.opacity = "25%";
        } else {
            stepCards[+(index + 3)].style.opacity = "0%";
        }
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
        } else {
            stepCards[+(index + 1)].style.opacity = "0%";
        }

        // 2 next question animation
        if (!stepCards[+(index + 2)]) {
            return;
        }
        if (stepCards[+(index + 2)].classList.contains("dg-question-card")) {
            stepCards[+(index + 2)].style.transform =
                "matrix(0.9, 0, 0 , 0.9 , 0 , 52)";
        }
        stepCards[+(index + 2)].style.opacity = "0%";
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
            if (!stepCards[index].classList.contains("dg-question-card")) {
                stepCards[index].style.opacity = "0%";
            }
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

    setInterval(function () {
        console.log(participantData);
    }, 2000);
}

/* START helper functions */
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

/* Start quiz emendate */
function emendate_participant_data_with_single_quiz_data(
    quizData,
    group,
    participantData = null
) {
    let singleQuizData = get_quiz_sub_data_by_quiz_group(quizData,group);
    let questionCount = singleQuizData.questions.length;
    console.log(questionCount);
}
emendate_participant_data_with_single_quiz_data(quizData,1)
function get_quiz_sub_data_by_quiz_group(quizData, group) {
    if (quizData.group == group) {
        return quizData;
    } else {
        if (quizData.childs) {
            for (let index = 0; index < quizData.childs.length; index++) {
                return get_quiz_sub_data_by_quiz_group(
                    quizData.childs[index],
                    group
                );
            }
        }
    }
}
/* END quiz correction */
