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
    name: "ی چیز خوب",
    description: "ی چیز تستی خوب برای توضیحات",
    questions: [
        {
            name: "sal1",
            description: "test 1 question",
            answers: [
                {
                    name: "javab 1",
                    priority: "",
                    isCorrect: false,
                },
            ],
            settings: {},
        },
        {
            name: "sal2",
            description: "test 2 question",
            answers: [
                {
                    name: "javab 2",
                    priority: "",
                    isCorrect: true,
                },
                {
                    name: "javab 2",
                    priority: "",
                    isCorrect: true,
                },
                {
                    name: "javab 2",
                    priority: "",
                    isCorrect: true,
                },
                {
                    name: "javab 2",
                    priority: "",
                    isCorrect: true,
                },
            ],
            settings: {},
        },
    ],
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
    state.name = newQuizState.name || prevState.name;
    state.description = newQuizState.description || prevState.description;
    state.settings = newQuizState.settings || prevState.settings;
}

function change_question_state_by_question_index(
    state,
    questionIndex,
    newQuestionState
) {
    let prevState = state.questions[questionIndex];
    state.questions[questionIndex] = {
        name: newQuestionState.name || prevState.name,
        description: newQuestionState.description || prevState.description,
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
        name: newAnswerState.name || prevState.name,
        priority: newAnswerState.priority || prevState.priority,
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
            console.log(state);
        }
        sync_state_to_view(state);
    }
});
/* END sync view to state */

setInterval(function () {
    // console.log(state);
}, 2000);

sync_state_to_view(state);