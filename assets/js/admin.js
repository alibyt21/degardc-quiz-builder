const DEFAULT_QUESTION_OBJECT = {
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

let state = {
    name: "",
    description: "",
    questions: [],
    settings: {},
};

let clonedEmptyQuestion = document
    .querySelector(".single-question")
    .cloneNode(true);
let clonedEmptyAnswer = document
    .querySelector(".single-answer")
    .cloneNode(true);

/* START helper functions */
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
/* END helper functions */

/* START sync state to view */
function sync_state_to_view(state) {
    sync_quiz_info_to_view(state);
    sync_questions_to_view(state);
}

function sync_quiz_info_to_view(state) {
    /*----- sync quiz name , description and settings -----*/

    // sync name
    let quizName = document.querySelector(".quiz-name");
    quizName.value = state.name;

    // sync description
    let quizDescription = document.querySelector(".quiz-description");
    quizDescription.value = state.description;

    // sync settings
    // TODO
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
    state.settings = newQuizState.settings || prevState.settings;
}

function change_question_state_by_question_index(
    state,
    questionIndex,
    newQuestionState
) {
    let prevState = state.questions[questionIndex];
    state.questions[questionIndex] = {
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

function add_new_question(state) {
    let cloned = JSON.parse(JSON.stringify(DEFAULT_QUESTION_OBJECT));
    state.questions.push(cloned);
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
quizContainer.addEventListener("change", function (e) {
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
    }
    save_data_to_db(state);
});
quizContainer.addEventListener("click", function (e) {
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
        }
        sync_state_to_view(state);
    }
    save_data_to_db(state);
});
/* END sync view to state */

setInterval(function () {
    console.log(state);
}, 2000);

sync_state_to_view(state);

let urlParams = new URLSearchParams(window.location.search);
let id = urlParams.get("id") ? urlParams.get("id") : null;
let firstTry = true;

function get_init_state() {
    if (!id) {
        return;
    }
    fetch(
        degardc_quiz_builder_ajax_object.ajax_url +
            "?" +
            new URLSearchParams({
                action: "degardc_quiz_builder_get_quiz_data_ajax",
                id,
            }),
        {
            method: "POST",
            credentials: "same-origin",
        }
    )
        .then((response) => response.json())
        .then((data) => {
            state = JSON.parse(data.message);
            sync_state_to_view(state);
        })
        .catch((error) => {
            console.error(error);
        });
}
get_init_state();

function save_data_to_db(state) {
    // we send id in update and null in insert
    if (id) {
        // update
        send_state_to_back_end((mode = "update"));
    } else {
        // insert
        if (firstTry) {
            firstTry = false;
            send_state_to_back_end((mode = "insert"));
        }
    }
}

function send_state_to_back_end(mode = "update") {
    let apiURL =
        degardc_quiz_builder_ajax_object.ajax_url +
        "?" +
        new URLSearchParams({
            action: "degardc_quiz_builder_save_quiz_data_ajax",
            id,
        });
    fetch(apiURL, {
        method: "POST",
        credentials: "same-origin",
        body: JSON.stringify(state),
    })
        .then((response) => response.json())
        .then((data) => {
            if (mode == "insert") {
                id = data.message;
            }
        })
        .catch((error) => {
            console.error(error);
        });
}
