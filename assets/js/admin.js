let biggestQuestionId = 0;

const loaderHTML = '<div class="loading-circle"></div>';

const DEFAULT_QUESTION_OBJECT = {
    id: "",
    name: "",
    description: "",
    answers: [],
    settings: {},
};

const DEFAULT_ANSWER_OBJECT = {
    name: "",
    priority: "",
    isCorrect: false,
};

const DEFAULT_RESULT_MESSAGE_OBJECT = {
    min: "",
    max: "",
    message: "",
};

let state = {
    group: "",
    name: "",
    description: "",
    thankMessage: "",
    resultMessage: [],
    questions: [],
    childs: [],
    settings: {
        requireScore: 70,
        collectParticipantName: false,
        collectMobileNumber: false,
        validateMobileNumber: false,
        registerOnSite: false,
        seprateResult: false,
        showThank: false,
        showResult: true,
        bookAnAppointment: false,
        oneAttempt: false,
    },
};

let clonedEmptyQuestion = document
    .querySelector(".single-question")
    .cloneNode(true);
let clonedEmptyAnswer = document
    .querySelector(".single-answer")
    .cloneNode(true);
let clonedEmptyResultMessage = document
    .querySelector(".single-resultMessage")
    .cloneNode(true);

/* START helper functions */
function end_loading_animation(buttonNode, buttonPrevText) {
    buttonNode.innerHTML = buttonPrevText;
}
function start_loading_animation(buttonNode) {
    let buttonPrevText = buttonNode.innerHTML;
    buttonNode.innerHTML = loaderHTML;
    return buttonPrevText;
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
            color = "#1aae50";
            break;
    }
    Toastify({
        text,
        duration: 5000,
        close: false,
        gravity: "bottom", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover,
        escapeMarkup: false,
        style: {
            background: color,
            borderRadius: "10px",
            boxShadow: "0 3px 6px 0px rgba(0,0,0,.06)",
            userSelect: "none",
        },
    }).showToast();
}
function find_related_parent_by_className(node, className) {
    let isFindParent = false;
    let parent = node;
    // prevent infinite loop
    let counter = 0;
    while (!isFindParent && counter <= 20) {
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
async function postData(
    url = "",
    urlParameters = {},
    data = {},
    headers = {
        "Content-Type": "application/json",
    }
) {
    try {
        // Default options are marked with *
        const response = await fetch(
            url + "?" + new URLSearchParams(urlParameters),
            {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                mode: "cors", // no-cors, *cors, same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                credentials: "same-origin", // include, *same-origin, omit
                headers,
                redirect: "follow", // manual, *follow, error
                referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(data), // body data type must match "Content-Type" header
            }
        );
        return response.json(); // parses JSON response into native JavaScript objects
    } catch (error) {
        show_notif(
            "در ارسال اطلاعات خطایی رخ داده است، لطفا چند دقیقه دیگر مجددا امتحان کنید"
        );
    }
}
async function getData(
    url = "",
    urlParameters = {},
    headers = {
        "Content-Type": "application/json",
    }
) {
    const response = await fetch(
        url + "?" + new URLSearchParams(urlParameters),
        {
            method: "GET",
            headers: new Headers(headers),
            mode: "cors",
        }
    );
    return response.json(); // parses JSON response into native JavaScript objects
}
/* END helper functions */

/* START sync state to view */
function sync_state_to_view(state) {
    sync_quiz_info_to_view(state);
    sync_questions_to_view(state);
    sync_result_messages_to_view(state);
}

function sync_quiz_info_to_view(state) {
    /*----- sync quiz name , description and settings -----*/

    // sync name
    let quizName = document.querySelector(".quiz-name");
    quizName.value = state.name;

    // sync description
    let quizDescription = document.querySelector(".quiz-description");
    quizDescription.value = state.description;

    // sync thankyou message
    let thankyouMessage = document.querySelector(".quiz-thank-message");
    thankyouMessage.value = state.thankMessage;

    // show thankyou message box only if showThank checked
    let thankyouMessageBox = document.querySelector(".thank-message-box");
    if (state.settings.showThank) {
        thankyouMessageBox.style.display = "flex";
    } else {
        thankyouMessageBox.style.display = "none";
    }

    // show custom result message box only if showResult checked
    let resultMessageBox = document.querySelector(".resultMessage-box");
    if (state.settings.showResult) {
        resultMessageBox.style.display = "flex";
    } else {
        resultMessageBox.style.display = "none";
    }

    // sync settings
    document.querySelector(".quiz-settings-registerOnSite").checked =
        state.settings.registerOnSite;
    document.querySelector(".quiz-settings-collectMobileNumber").checked =
        state.settings.collectMobileNumber;
    document.querySelector(".quiz-settings-validateMobileNumber").checked =
        state.settings.validateMobileNumber;
    document.querySelector(".quiz-settings-collectParticipantName").checked =
        state.settings.collectParticipantName;
    document.querySelector(".quiz-settings-showThank").checked =
        state.settings.showThank;
    document.querySelector(".quiz-settings-showResult").checked =
        state.settings.showResult;
    document.querySelector(".quiz-settings-oneAttempt").checked =
        state.settings.oneAttempt;
}

function sync_questions_to_view(state) {
    let questionsContainer = document.getElementById("questions-container");
    questionsContainer.innerHTML = null;

    let newQuestion = clonedEmptyQuestion.cloneNode(true);
    newQuestion.querySelector(".single-answer").remove();

    state.questions.forEach((singleQuestion) => {
        let newQuestion = clonedEmptyQuestion.cloneNode(true);
        newQuestion.querySelector(".single-answer").remove();
        // sync name
        let questionName = newQuestion.querySelector(".question-name");
        questionName.value = singleQuestion.name;

        // sync description
        let questionDescription = newQuestion.querySelector(
            ".question-description"
        );
        questionDescription.value = singleQuestion.description;

        // sync answers
        sync_answers_of_a_single_question(singleQuestion.answers, newQuestion);

        // sync settings
        // TODO

        // attach manipulated question to quiz
        questionsContainer.appendChild(newQuestion);
    });
}

function sync_answers_of_a_single_question(answers, questionDOM) {
    answers.forEach((singleAnswer) => {
        let newAnswer = clonedEmptyAnswer.cloneNode(true);
        // sync name
        let answerName = newAnswer.querySelector(".answer-name");
        answerName.value = singleAnswer.name;

        // sync priority
        let answerPriority = newAnswer.querySelector(".answer-priority");
        answerPriority.value = singleAnswer.priority;

        // sync is correct
        let answerIsCorrect = newAnswer.querySelector(".answer-is-correct");
        answerIsCorrect.checked = singleAnswer.isCorrect;

        // sync others
        // TODO

        // attach manipulated answer to question
        let answersContainer = questionDOM.querySelector(".answers-container");
        answersContainer.appendChild(newAnswer);
    });
}

function sync_result_messages_to_view(state) {
    let resultMessageContainer = document.querySelector(
        ".resultMessage-container"
    );
    resultMessageContainer.innerHTML = null;
    state.resultMessage.forEach(function (singleResultMessage) {
        let newResultMessage = clonedEmptyResultMessage.cloneNode(true);
        newResultMessage.querySelector(".resultMessage-lower-bundle").value =
            singleResultMessage.min;
        newResultMessage.querySelector(".resultMessage-upper-bundle").value =
            singleResultMessage.max;
        newResultMessage.querySelector(".resultMessage-message").innerHTML =
            singleResultMessage.message;
        resultMessageContainer.appendChild(newResultMessage);
    });
}
/* END sync state to view */

/* START sync view to state */
function change_quiz_state(state, newQuizState) {
    let prevState = state;
    state.name =
        newQuizState.name || newQuizState.name == ""
            ? newQuizState.name
            : prevState.name;
    state.description =
        newQuizState.description || newQuizState.description == ""
            ? newQuizState.description
            : prevState.description;
    state.thankMessage =
        newQuizState.thankMessage || newQuizState.thankMessage == ""
            ? newQuizState.thankMessage
            : prevState.thankMessage;
    if (newQuizState.settings) {
        for (var key of Object.keys(newQuizState.settings)) {
            state.settings[key] = newQuizState.settings[key];
        }
    }
}

function change_result_message_state_by_result_message_index(
    state,
    resultMessageIndex,
    newResultMessageState
) {
    let prevState = state.resultMessage[resultMessageIndex];
    state.resultMessage[resultMessageIndex] = {
        min:
            newResultMessageState.min || newResultMessageState.min == ""
                ? newResultMessageState.min
                : prevState.min,
        max:
            newResultMessageState.max || newResultMessageState.max == ""
                ? newResultMessageState.max
                : prevState.max,
        message:
            newResultMessageState.message || newResultMessageState.message == ""
                ? newResultMessageState.message
                : prevState.message,
    };
}
function change_question_state_by_question_index(
    state,
    questionIndex,
    newQuestionState
) {
    let prevState = state.questions[questionIndex];
    state.questions[questionIndex] = {
        id: prevState.id,
        name:
            newQuestionState.name || newQuestionState.name == ""
                ? newQuestionState.name
                : prevState.name,
        description:
            newQuestionState.description || newQuestionState.description == ""
                ? newQuestionState.description
                : prevState.description,
        answers: prevState.answers,
    };
}

function change_answer_state_by_question_and_answer_index(
    state,
    questionIndex,
    answerIndex,
    newAnswerState
) {
    let prevState = state.questions[questionIndex].answers[answerIndex];
    state.questions[questionIndex].answers[answerIndex] = {
        name:
            newAnswerState.name || newAnswerState.name == ""
                ? newAnswerState.name
                : prevState.name,
        priority:
            newAnswerState.priority || newAnswerState.priority == ""
                ? newAnswerState.priority
                : prevState.priority,
        isCorrect:
            newAnswerState.isCorrect !== undefined &&
            newAnswerState.isCorrect !== null
                ? newAnswerState.isCorrect
                : prevState.isCorrect,
    };
    return;
}

function add_new_result_message(state) {
    let cloned = JSON.parse(JSON.stringify(DEFAULT_RESULT_MESSAGE_OBJECT));
    state.resultMessage.push(cloned);
}

function add_new_question(state) {
    calculate_biggest_question_id();
    let cloned = JSON.parse(JSON.stringify(DEFAULT_QUESTION_OBJECT));
    // increase question id in add
    cloned.id = +biggestQuestionId + 1;
    state.questions.push(cloned);
}

function delete_result_message_by_index(state, resultMessageIndex) {
    state.resultMessage.splice(resultMessageIndex, 1);
}

function delete_question_by_index(state, questionIndex) {
    state.questions.splice(questionIndex, 1);
}

function add_new_answer_by_question_index(state, questionIndex) {
    let cloned = JSON.parse(JSON.stringify(DEFAULT_ANSWER_OBJECT));
    state.questions[questionIndex].answers.push(cloned);
}

function delete_answer_by_question_and_answer_index(
    state,
    questionIndex,
    answerIndex
) {
    state.questions[questionIndex].answers.splice(answerIndex, 1);
}

let quizContainer = document.getElementById("quiz-container");
quizContainer.addEventListener("change", async function (e) {
    if (e.target.className.includes("quiz")) {
        // related to quiz
        if (e.target.className.includes("quiz-name")) {
            change_quiz_state(state, {
                name: e.target.value,
            });
        } else if (e.target.className.includes("quiz-description")) {
            change_quiz_state(state, {
                description: e.target.value,
            });
        } else if (e.target.className.includes("quiz-thank-message")) {
            change_quiz_state(state, {
                thankMessage: e.target.value,
            });
        } else if (e.target.className.includes("quiz-settings")) {
            let key = e.target.className.replace("quiz-settings-", "");
            change_quiz_state(state, {
                settings: {
                    [key]: e.target.checked,
                },
            });
        }
    } else if (e.target.className.includes("question")) {
        // related to question
        // find related question
        let singleQuestion = find_related_parent_by_className(
            e.target,
            "single-question"
        );
        let questionIndex = Array.from(
            singleQuestion.parentElement.children
        ).indexOf(singleQuestion);
        if (e.target.className.includes("question-name")) {
            change_question_state_by_question_index(state, questionIndex, {
                name: e.target.value,
            });
        } else if (e.target.className.includes("question-description")) {
            change_question_state_by_question_index(state, questionIndex, {
                description: e.target.value,
            });
        }
    } else if (e.target.className.includes("answer")) {
        // related to answer
        // find related question
        let singleQuestion = find_related_parent_by_className(
            e.target,
            "single-question"
        );
        let questionIndex = Array.from(
            singleQuestion.parentElement.children
        ).indexOf(singleQuestion);
        let singleAnswer = find_related_parent_by_className(
            e.target,
            "single-answer"
        );
        let answerIndex = Array.from(
            singleAnswer.parentElement.children
        ).indexOf(singleAnswer);
        if (e.target.className.includes("answer-name")) {
            change_answer_state_by_question_and_answer_index(
                state,
                questionIndex,
                answerIndex,
                {
                    name: e.target.value,
                }
            );
        } else if (e.target.className.includes("answer-priority")) {
            change_answer_state_by_question_and_answer_index(
                state,
                questionIndex,
                answerIndex,
                {
                    priority: e.target.value,
                }
            );
        } else if (e.target.className.includes("answer-is-correct")) {
            change_answer_state_by_question_and_answer_index(
                state,
                questionIndex,
                answerIndex,
                {
                    isCorrect: e.target.checked,
                }
            );
        }
    } else if (e.target.className.includes("resultMessage")) {
        // related to resultMessage
        // find related resultMessage
        let singleResultMessage = find_related_parent_by_className(
            e.target,
            "single-resultMessage"
        );
        let resultMessageIndex = Array.from(
            singleResultMessage.parentElement.children
        ).indexOf(singleResultMessage);
        if (e.target.className.includes("resultMessage-lower-bundle")) {
            change_result_message_state_by_result_message_index(
                state,
                resultMessageIndex,
                {
                    min: e.target.value,
                }
            );
        } else if (e.target.className.includes("resultMessage-upper-bundle")) {
            change_result_message_state_by_result_message_index(
                state,
                resultMessageIndex,
                {
                    max: e.target.value,
                }
            );
        } else if (e.target.className.includes("resultMessage-message")) {
            change_result_message_state_by_result_message_index(
                state,
                resultMessageIndex,
                {
                    message: e.target.value,
                }
            );
        }
    }
});
quizContainer.addEventListener("click", async function (e) {
    if (find_related_parent_by_className(e.target, "delete")) {
        // delete something
        if (find_related_parent_by_className(e.target, "delete-question")) {
            // delete question
            let relatedQuestion = find_related_parent_by_className(
                e.target,
                "single-question"
            );
            let questionIndex = Array.from(
                relatedQuestion.parentElement.children
            ).indexOf(relatedQuestion);
            delete_question_by_index(state, questionIndex);
        } else if (
            find_related_parent_by_className(e.target, "delete-answer")
        ) {
            // delete answer
            let relatedQuestion = find_related_parent_by_className(
                e.target,
                "single-question"
            );
            let questionIndex = Array.from(
                relatedQuestion.parentElement.children
            ).indexOf(relatedQuestion);
            let relatedAnswer = find_related_parent_by_className(
                e.target,
                "single-answer"
            );
            let answerIndex = Array.from(
                relatedAnswer.parentElement.children
            ).indexOf(relatedAnswer);
            delete_answer_by_question_and_answer_index(
                state,
                questionIndex,
                answerIndex
            );
        } else if (
            find_related_parent_by_className(e.target, "delete-resultMessage")
        ) {
            // delete resultMessage
            let relatedResultMessage = find_related_parent_by_className(
                e.target,
                "single-resultMessage"
            );
            let resultMessageIndex = Array.from(
                relatedResultMessage.parentElement.children
            ).indexOf(relatedResultMessage);
            delete_result_message_by_index(state, resultMessageIndex);
        }
        sync_state_to_view(state);
    } else if (find_related_parent_by_className(e.target, "add")) {
        // add new question or new answer
        if (find_related_parent_by_className(e.target, "add-new-question")) {
            // add new question
            add_new_question(state);
        } else if (
            find_related_parent_by_className(e.target, "add-new-answer")
        ) {
            // add new answer
            let relatedQuestion = find_related_parent_by_className(
                e.target,
                "single-question"
            );
            let questionIndex = Array.from(
                relatedQuestion.parentElement.children
            ).indexOf(relatedQuestion);
            add_new_answer_by_question_index(state, questionIndex);
        } else if (
            find_related_parent_by_className(e.target, "add-new-resultMessage")
        ) {
            // add new result message
            add_new_result_message(state);
        }
        sync_state_to_view(state);
    }
});
/* END sync view to state */

/* START save changes */
let saveChanges = document.getElementById("save-changes");
saveChanges.addEventListener("click", async function (e) {
    let buttonPrevText = start_loading_animation(e.target);
    await save_data_to_db(state);
    end_loading_animation(e.target, buttonPrevText);
});
/* START save changes */

let settingsPanel = document.querySelector(".settings-panel");
settingsPanel.addEventListener("click", function () {
    setTimeout(function () {
        sync_state_to_view(state);
    }, 0);
});

function end_loading_page_animation() {
    document.querySelector(".loading").style.display = "none";
    document.querySelector(".loaded").style.filter = "none";
}

async function get_init_state() {
    if (!state.group) {
        end_loading_page_animation();
        return;
    }
    const response = await getData(degardc_quiz_builder_ajax_object.ajax_url, {
        action: "degardc_quiz_builder_get_quiz_data_ajax",
        id: state.group,
    });
    state = JSON.parse(response.message);
    sync_state_to_view(state);
    end_loading_page_animation();
}

function calculate_biggest_question_id() {
    state.questions.forEach(function (single) {
        if (single.id > biggestQuestionId) {
            biggestQuestionId = single.id;
        }
    });
}

async function save_data_to_db(state) {
    // we send id in update and null in insert
    if (state.group) {
        // update
        await send_state_to_back_end((mode = "update"));
    } else {
        // insert
        await send_state_to_back_end((mode = "insert"));
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get("page");
        window.history.replaceState(
            ``,
            `آزمون جدید ${state.name}`,
            `admin.php?page=${page}&id=${state.group}`
        );
    }
}

async function send_state_to_back_end(mode = "update") {
    try {
        let response = await postData(
            degardc_quiz_builder_ajax_object.ajax_url,
            {
                action: "degardc_quiz_builder_save_quiz_data_ajax",
                id: state.group,
            },
            state
        );
        if (mode == "insert") {
            state.group = response.message;
            // now we have quiz id in db and set it in state and resend it to backend to save quiz info with group id
            await postData(
                degardc_quiz_builder_ajax_object.ajax_url,
                {
                    action: "degardc_quiz_builder_save_quiz_data_ajax",
                    id: state.group,
                },
                state
            );
        }
        show_notif("تغییرات شما با موفقیت ذخیره شد", "success");
    } catch (error) {}
}

(async function init() {
    sync_state_to_view(state);
    let urlParams = new URLSearchParams(window.location.search);
    state.group = urlParams.get("id") ? urlParams.get("id") : null;
    await get_init_state();
    setInterval(function () {
        console.log(state);
    }, 2000);
})();
