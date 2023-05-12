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
}
window.addEventListener("resize", set_start_exam_button_position);

function set_questions_opacity_to_zero_and_qnumber() {
    for (let index = 0; index < questionCards.length; index++) {
        questionCards[index].style.opacity = "0";
        questionCards[index].dataset.qnumber = index;
    }
}

function set_transition_duration_before_exam_start() {
    stepCards[0].style.transitionDuration =
        entranceAnimationDuration / 1000 + "s";
    stepCards[1].style.transitionDuration =
        entranceAnimationDuration / 1000 + "s";
    stepCards[2].style.transitionDuration =
        entranceAnimationDuration / 1000 + "s";
    stepCards[3].style.transitionDuration =
        entranceAnimationDuration / 1000 + "s";
    stepCards[0].style.transitionDelay = (animationDuration * 2) / 1000 + "s";
    stepCards[1].style.transitionDelay = (animationDuration * 2) / 1000 + "s";
    stepCards[2].style.transitionDelay = (animationDuration * 2) / 1000 + "s";
    stepCards[3].style.transitionDelay = (animationDuration * 2) / 1000 + "s";
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
    let answersData = [];
    let currentIndex = 1;

    let nextQuestionButton = document.querySelectorAll(
        ".dg-next-question-button"
    );
    let prevQuestionButton = document.querySelectorAll(
        ".dg-prev-question-button"
    );
    let nextStepButton = document.querySelectorAll(".dg-next-step-button");
    let prevStepButton = document.querySelectorAll(".dg-prev-step-button");
    let allOptions = document.querySelectorAll(".option");
    let stepCards = document.querySelectorAll(".dg-step-card");
    let questionCards = document.querySelectorAll(".dg-question-card");
    let afterExamCards = document.querySelectorAll(".dg-after-exam-card");

    init_view();
    init_answers_data();

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
        let qType =
            e.target.parentNode.dataset.qtype ||
            e.target.parentNode.parentNode.dataset.qtype;
        let qNumber =
            e.target.parentNode.parentNode.parentNode.dataset.qnumber ||
            e.target.parentNode.parentNode.parentNode.parentNode.dataset
                .qnumber;
        let optionBlock = e.target.parentNode.dataset.qtype
            ? e.target.parentNode
            : e.target.parentNode.parentNode.dataset.qtype
            ? e.target.parentNode.parentNode
            : null;
        let chosenAnswer = e.target.parentNode.dataset.qtype
            ? e.target
            : e.target.parentNode.parentNode.dataset.qtype
            ? e.target.parentNode
            : null;
        let chosenIndex;
        for (let index = 0; index < optionBlock.children.length; index++) {
            if (optionBlock.children[index] == chosenAnswer) {
                chosenIndex = index;
            }
        }

        if (qType == QUESTION_TYPES.type1) {
            for (let index = 0; index < optionBlock.children.length; index++) {
                if (index == chosenIndex) {
                    answersData[qNumber].option[index].isChosen =
                        !answersData[qNumber].option[index].isChosen;
                } else {
                    answersData[qNumber].option[index].isChosen = false;
                }
            }
        } else if (qType == QUESTION_TYPES.type2) {
            answersData[qNumber].option[chosenIndex].isChosen =
                !answersData[qNumber].option[chosenIndex].isChosen;
        }

        for (let index = 0; index < optionBlock.children.length; index++) {
            if (answersData[qNumber].option[index].isChosen) {
                answersData[qNumber].isAnswered = true;
            }
        }

        sync_data_to_view();
    }

    function init_view() {
        // init first and last buttons of questions
        nextQuestionButton[nextQuestionButton.length - 1].innerHTML =
            "مشاهده نتیجه";

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

    function sync_data_to_view() {
        let optionBlocks = document.querySelectorAll(".option-block");
        optionBlocks.forEach(function (singleOptionBlock, outerIndex) {
            for (
                let index = 0;
                index < singleOptionBlock.children.length;
                index++
            ) {
                if (answersData[outerIndex].option[index].isChosen) {
                    singleOptionBlock.children[index].classList.add("selected");
                } else {
                    singleOptionBlock.children[index].classList.remove(
                        "selected"
                    );
                }
            }
        });
        localStorage.setItem("answersData", JSON.stringify(answersData));
    }

    function init_answers_data() {
        if (localStorage.getItem("answersData")) {
            answersData = JSON.parse(localStorage.getItem("answersData"));
            sync_data_to_view();
        } else {
            let optionBlocks = document.querySelectorAll(".option-block");
            optionBlocks.forEach(function (singleQuestion) {
                let option = [];
                for (
                    let index = 0;
                    index < singleQuestion.children.length;
                    index++
                ) {
                    option.push({ isChosen: false });
                }
                answersData.push({
                    isAnswered: false,
                    option,
                });
            });
        }
    }
    setInterval(function () {
        console.log(answersData);
    }, 2000);
}
