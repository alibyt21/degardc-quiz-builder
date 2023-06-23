// constants
const QUESTION_TYPES = {
    type1: "single-option",
    type2: "multi-option",
};
const loaderHTML = '<div class="loading-circle"></div>';
let quizData = {
    group: 1,
    name: "اولین آزمون زبان انگلیسی",
    description: "یسری توضیحات",
    resultMessage: [
        {
            min: 0,
            max: 30,
            message: "0-30",
        },
        {
            min: 31,
            max: 50,
            message: "31-50",
        },
    ],
    settings: {
        requireScore: 70,
        collectParticipantName: true,
        collectMobileNumber: true,
        validateMobileNumber: true,
        registerOnSite: true,
        seprateResult: true,
        showResult: true,
        bookAnAppointment: true,
        oneAttempt: false,
    },
    questions: [
        {
            id: 1,
            name: "1-\t---, 2, 3, ---, ---",
            description: "",
            answers: [
                { name: "1, 4 ,5", priority: "", isCorrect: true },
                { name: "1 ,5 ,6", priority: "", isCorrect: false },
                { name: "4, 5, 6", priority: "", isCorrect: false },
                { name: "1, 3, 5", priority: "", isCorrect: false },
            ],
        },
        {
            id: 2,
            name: "2-\t---, two, three, four, five",
            description: "",
            answers: [
                { name: "one", priority: "", isCorrect: true },
                { name: "on", priority: "", isCorrect: false },
                { name: "once", priority: "", isCorrect: false },
                { name: "own", priority: "", isCorrect: false },
            ],
        },
        {
            id: 3,
            name: "3-\t--- am Sam.",
            description: "",
            answers: [
                { name: "I'm", priority: "", isCorrect: false },
                { name: "I", priority: "", isCorrect: true },
                { name: "this", priority: "", isCorrect: false },
                { name: "name", priority: "", isCorrect: false },
            ],
        },
        {
            id: 4,
            name: "4-\t---- your name?",
            description: "",
            answers: [
                { name: "What", priority: "", isCorrect: false },
                { name: "What are", priority: "", isCorrect: false },
                { name: "What is", priority: "", isCorrect: true },
                { name: "Is", priority: "", isCorrect: false },
            ],
        },
        {
            id: 5,
            name: "5-\tDad's mom?",
            description: "",
            answers: [
                { name: "grandpa", priority: "", isCorrect: false },
                { name: "grandma", priority: "", isCorrect: true },
                { name: "granddaughter", priority: "", isCorrect: false },
                { name: "grandson", priority: "", isCorrect: false },
            ],
        },
        {
            id: 6,
            name: "6-\tI love my ---. Her name is Sara.",
            description: "",
            answers: [
                { name: "mom", priority: "", isCorrect: true },
                { name: "dad", priority: "", isCorrect: false },
                { name: "brother", priority: "", isCorrect: false },
                { name: "grandpa", priority: "", isCorrect: false },
            ],
        },
        {
            id: 7,
            name: "7-\t------------------ ? It's Jack.",
            description: "",
            answers: [
                { name: "Is this my mom?", priority: "", isCorrect: false },
                { name: "Who is this?", priority: "", isCorrect: true },
                { name: "How are you?", priority: "", isCorrect: false },
                { name: "Is this my dad?", priority: "", isCorrect: false },
            ],
        },
        {
            id: 8,
            name: "8-\t---, ---, c, d",
            description: "",
            answers: [
                { name: "a, b", priority: "", isCorrect: true },
                { name: "a, d", priority: "", isCorrect: false },
                { name: "a, e", priority: "", isCorrect: false },
                { name: "A, a", priority: "", isCorrect: false },
            ],
        },
        {
            id: 9,
            name: "9-\tA,a\tB,b\tC,--\t--,d",
            description: "",
            answers: [
                { name: "c, D", priority: "", isCorrect: true },
                { name: "C, D", priority: "", isCorrect: false },
                { name: "C, d", priority: "", isCorrect: false },
                { name: "A, b", priority: "", isCorrect: false },
            ],
        },
        {
            id: 10,
            name: "10-\t For school: ---, pencil",
            description: "",
            answers: [
                { name: "doll", priority: "", isCorrect: false },
                { name: "toy", priority: "", isCorrect: false },
                { name: "cat", priority: "", isCorrect: false },
                { name: "bag", priority: "", isCorrect: true },
            ],
        },
        {
            id: 11,
            name: "11-\tI --- on a chair.",
            description: "",
            answers: [
                { name: "see", priority: "", isCorrect: false },
                { name: "quiet", priority: "", isCorrect: false },
                { name: "you", priority: "", isCorrect: false },
                { name: "sit", priority: "", isCorrect: true },
            ],
        },
        {
            id: 12,
            name: "12-\ta, b, c, d, --- , --- , ---, ---",
            description: "",
            answers: [
                { name: "e, g, h, i", priority: "", isCorrect: false },
                { name: "e, l , m, n", priority: "", isCorrect: false },
                { name: "e, f, g, i", priority: "", isCorrect: false },
                { name: "e, f, g, h", priority: "", isCorrect: true },
            ],
        },
        {
            id: 13,
            name: "13-\tcolor:",
            description: "",
            answers: [
                { name: "great", priority: "", isCorrect: false },
                { name: "greet", priority: "", isCorrect: false },
                { name: "green", priority: "", isCorrect: true },
                { name: "glue", priority: "", isCorrect: false },
            ],
        },
        {
            id: 14,
            name: "14-\tcolor:",
            description: "",
            answers: [
                { name: "strange", priority: "", isCorrect: false },
                { name: "strong", priority: "", isCorrect: false },
                { name: "organize", priority: "", isCorrect: false },
                { name: "orange", priority: "", isCorrect: true },
            ],
        },
        {
            id: 15,
            name: "15-\ttoy:",
            description: "",
            answers: [
                { name: "teddy bear", priority: "", isCorrect: true },
                { name: "polar bear", priority: "", isCorrect: false },
                { name: "bird", priority: "", isCorrect: false },
                { name: "beard", priority: "", isCorrect: false },
            ],
        },
        {
            id: 16,
            name: "16-\tWhat's this?",
            description: "",
            answers: [
                { name: "It's a boy.", priority: "", isCorrect: false },
                { name: "It's red.", priority: "", isCorrect: false },
                { name: "It's a red car.", priority: "", isCorrect: true },
                { name: "It's Sam.", priority: "", isCorrect: false },
            ],
        },
        {
            id: 17,
            name: "17-\tClothes:",
            description: "",
            answers: [
                { name: "parents", priority: "", isCorrect: false },
                { name: "pants", priority: "", isCorrect: true },
                { name: "parrot", priority: "", isCorrect: false },
                { name: "pot", priority: "", isCorrect: false },
            ],
        },
        {
            id: 18,
            name: "18-\tFood:",
            description: "",
            answers: [
                { name: "orange bag", priority: "", isCorrect: false },
                { name: "sandbox", priority: "", isCorrect: false },
                { name: "sandwich", priority: "", isCorrect: true },
                { name: "sandcastle", priority: "", isCorrect: false },
            ],
        },
        {
            id: 19,
            name: "19-\tChicken is small. Horse is --- .",
            description: "",
            answers: [
                { name: "purple", priority: "", isCorrect: false },
                { name: "bull", priority: "", isCorrect: false },
                { name: "blue", priority: "", isCorrect: false },
                { name: "big", priority: "", isCorrect: true },
            ],
        },
        {
            id: 20,
            name: "20-\ta, b, c, d, e, f, g, h, I, j, k, l, m, n, o, p, q, r, ---, ---, ---, ---, ---, ---, ---, z",
            description: "",
            answers: [
                { name: "s, t, u, v, w, x, i", priority: "", isCorrect: false },
                { name: "s, t, u, v, w, x, y", priority: "", isCorrect: false },
                { name: "k, s, u, t, w, x, y", priority: "", isCorrect: false },
                { name: "k, t, u, v, w, x, y", priority: "", isCorrect: false },
            ],
        },
    ],
    childs: [
        {
            group: 2,
            name: "آزمون تعیین سطح نونهالان و کودکان - بخش دوم",
            description: "",
            settings: {
                requireScore: 70,
                collectParticipantName: false,
                collectMobileNumber: true,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                showResult: true,
                bookAnAppointment: true,
                oneAttempt: false,
            },
            questions: [
                {
                    id: 21,
                    name: "21-\t1, 2, 3, 4, ---, ---, ---, ---, 9, 10",
                    description: "",
                    answers: [
                        { name: "5, 7, 9, 11", priority: "", isCorrect: false },
                        { name: "5, 6, 7, 9", priority: "", isCorrect: false },
                        { name: "5, 6, 8, 7", priority: "", isCorrect: false },
                        { name: "5, 6, 7, 8", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 22,
                    name: "22-\tA: Hello Sam. Nice to meet you. \t\tB: Hello Jig. ------------------",
                    description: "",
                    answers: [
                        {
                            name: "Nice to meet you",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Nice to meet you too",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "What's your name?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Who is this?",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 23,
                    name: "23-\tClassroom:",
                    description: "",
                    answers: [
                        { name: "toy", priority: "", isCorrect: false },
                        { name: "bin", priority: "", isCorrect: true },
                        { name: "dad", priority: "", isCorrect: false },
                        { name: "bird", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 24,
                    name: "24-\tWhat's this?",
                    description: "",
                    answers: [
                        {
                            name: "I'm a chair. ",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "It's a water",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "It's a chair.",
                            priority: "",
                            isCorrect: true,
                        },
                        { name: "It's woof", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 25,
                    name: "25-\tPlay time:",
                    description: "",
                    answers: [
                        { name: "puzzled", priority: "", isCorrect: false },
                        { name: "puzzle", priority: "", isCorrect: true },
                        { name: "puzle", priority: "", isCorrect: false },
                        { name: "boot", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 26,
                    name: "26-\tLet's share. -------------------- ",
                    description: "",
                    answers: [
                        {
                            name: "There you are",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "here you are", priority: "", isCorrect: true },
                        { name: "over there", priority: "", isCorrect: false },
                        { name: "There I am", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 27,
                    name: "27-\tAt school:",
                    description: "",
                    answers: [
                        { name: "erase", priority: "", isCorrect: false },
                        { name: "doll", priority: "", isCorrect: false },
                        { name: "car", priority: "", isCorrect: false },
                        { name: "pencil", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 28,
                    name: "28-\tshape: ",
                    description: "",
                    answers: [
                        { name: "orange", priority: "", isCorrect: false },
                        { name: "circus", priority: "", isCorrect: false },
                        { name: "yellow", priority: "", isCorrect: false },
                        { name: "circle", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 29,
                    name: "29-\tshape:",
                    description: "",
                    answers: [
                        { name: "nectarine", priority: "", isCorrect: false },
                        { name: "tricycle", priority: "", isCorrect: false },
                        { name: "triangle", priority: "", isCorrect: true },
                        { name: "jungle", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 30,
                    name: "30-\tWhat's  this? -------------------",
                    description: "",
                    answers: [
                        {
                            name: "They are red hat.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "This is my dad.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "It's a red hat.",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "It's a hat red.",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 31,
                    name: "31-\tToy:",
                    description: "",
                    answers: [
                        { name: "cite", priority: "", isCorrect: false },
                        { name: "chite", priority: "", isCorrect: false },
                        { name: "ckite", priority: "", isCorrect: false },
                        { name: "kite", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 32,
                    name: "32-\tPet:",
                    description: "",
                    answers: [
                        { name: "rabbit", priority: "", isCorrect: true },
                        { name: "rhino", priority: "", isCorrect: false },
                        { name: "tiger", priority: "", isCorrect: false },
                        { name: "elephant", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 33,
                    name: "33-\tIs it a mouse? -----------------------",
                    description: "",
                    answers: [
                        { name: "No, it is", priority: "", isCorrect: false },
                        { name: "No, isn't", priority: "", isCorrect: false },
                        { name: "No, it isn't", priority: "", isCorrect: true },
                        { name: "no", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 34,
                    name: "34-\tCloset:",
                    description: "",
                    answers: [
                        { name: "banana", priority: "", isCorrect: false },
                        { name: "water", priority: "", isCorrect: false },
                        { name: "socks", priority: "", isCorrect: true },
                        { name: "orange", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 35,
                    name: "35-\tI have ten ---- .",
                    description: "",
                    answers: [
                        { name: "legs", priority: "", isCorrect: false },
                        { name: "heads", priority: "", isCorrect: false },
                        { name: "knees", priority: "", isCorrect: false },
                        { name: "fingers", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 36,
                    name: "36-\tThey --- my dad and mom. ",
                    description: "",
                    answers: [
                        { name: "are is", priority: "", isCorrect: false },
                        { name: "is are", priority: "", isCorrect: false },
                        { name: "are", priority: "", isCorrect: true },
                        { name: "is", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 37,
                    name: "37-\tParty:",
                    description: "",
                    answers: [
                        { name: "crayon", priority: "", isCorrect: false },
                        { name: "table", priority: "", isCorrect: false },
                        { name: "cake", priority: "", isCorrect: true },
                        { name: "pants", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 38,
                    name: "38-\tAnimal:",
                    description: "",
                    answers: [
                        { name: "food", priority: "", isCorrect: false },
                        { name: "fox", priority: "", isCorrect: true },
                        { name: "pen", priority: "", isCorrect: false },
                        { name: "cut", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 39,
                    name: "39-\tAnimal: ",
                    description: "",
                    answers: [
                        { name: "sebra", priority: "", isCorrect: false },
                        { name: "zebra", priority: "", isCorrect: true },
                        { name: "yogurt", priority: "", isCorrect: false },
                        { name: "fit", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 40,
                    name: "40-\tParty:",
                    description: "",
                    answers: [
                        { name: "ice cream", priority: "", isCorrect: true },
                        { name: "eraser", priority: "", isCorrect: false },
                        { name: "fox", priority: "", isCorrect: false },
                        { name: "pen", priority: "", isCorrect: false },
                    ],
                },
            ],
        },
        {
            group: 3,
            name: "آزمون تعیین سطح کودکان و نونهالان - بخش سوم",
            description: "",
            settings: {
                requireScore: 75,
                collectParticipantName: false,
                collectMobileNumber: true,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                showResult: true,
                bookAnAppointment: true,
                oneAttempt: false,
            },
            questions: [
                {
                    id: 41,
                    name: "41-\tMonday, Tuesday, ---, --- , Friday, Saturday, Sunday",
                    description: "",
                    answers: [
                        {
                            name: "Wensday, Tursday",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Tursday, Wensday",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Wednesday, Thursday",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "Thursday, Wednesday",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 42,
                    name: "42-\t--- the ball.",
                    description: "",
                    answers: [
                        { name: "cick", priority: "", isCorrect: false },
                        { name: "cik", priority: "", isCorrect: false },
                        { name: "kic", priority: "", isCorrect: false },
                        { name: "kick", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 43,
                    name: "43-\tCan you help --- please?",
                    description: "",
                    answers: [
                        { name: "I", priority: "", isCorrect: false },
                        { name: "my", priority: "", isCorrect: false },
                        { name: "me", priority: "", isCorrect: true },
                        { name: "mine", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 44,
                    name: "44-\tAnimal:",
                    description: "",
                    answers: [
                        { name: "shoes", priority: "", isCorrect: false },
                        { name: "ship", priority: "", isCorrect: false },
                        { name: "sheep", priority: "", isCorrect: true },
                        { name: "shorts", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 45,
                    name: "45-\tCan I drink water? I am --- .",
                    description: "",
                    answers: [
                        { name: "tirsty", priority: "", isCorrect: false },
                        { name: "tirsthy", priority: "", isCorrect: false },
                        { name: "thirsthy", priority: "", isCorrect: false },
                        { name: "thirsty", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 46,
                    name: "46-\tPet:",
                    description: "",
                    answers: [
                        { name: "rabbit", priority: "", isCorrect: true },
                        { name: "cow", priority: "", isCorrect: false },
                        { name: "tiger", priority: "", isCorrect: false },
                        { name: "giraffe", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 47,
                    name: "47-\tI can --- a book.",
                    description: "",
                    answers: [
                        { name: "jump", priority: "", isCorrect: false },
                        { name: "read", priority: "", isCorrect: true },
                        { name: "cut", priority: "", isCorrect: false },
                        { name: "climb", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 48,
                    name: "48-\tYour picture is very good. ---- !",
                    description: "",
                    answers: [
                        { name: "good", priority: "", isCorrect: false },
                        {
                            name: "good homework",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "good job", priority: "", isCorrect: true },
                        {
                            name: "well picture",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 49,
                    name: "49-\tFor cooking food:",
                    description: "",
                    answers: [
                        { name: "bedroom", priority: "", isCorrect: false },
                        { name: "bathroom", priority: "", isCorrect: false },
                        { name: "chicken", priority: "", isCorrect: false },
                        { name: "kitchen", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 50,
                    name: "50-\tThis--- my home.",
                    description: "",
                    answers: [
                        { name: "are", priority: "", isCorrect: false },
                        { name: "is", priority: "", isCorrect: true },
                        { name: "am", priority: "", isCorrect: false },
                        { name: "our", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 51,
                    name: "51-\tDon't --- plants.",
                    description: "",
                    answers: [
                        { name: "buy", priority: "", isCorrect: false },
                        { name: "broke", priority: "", isCorrect: false },
                        { name: "break", priority: "", isCorrect: true },
                        { name: "bring", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 52,
                    name: "52-\tAnimal:",
                    description: "",
                    answers: [
                        { name: "cut", priority: "", isCorrect: false },
                        { name: "cat", priority: "", isCorrect: true },
                        { name: "hat", priority: "", isCorrect: false },
                        { name: "mat", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 53,
                    name: "53-\tIn bedroom:",
                    description: "",
                    answers: [
                        { name: "white board", priority: "", isCorrect: false },
                        { name: "pillo", priority: "", isCorrect: false },
                        { name: "pillow", priority: "", isCorrect: true },
                        { name: "break", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 54,
                    name: "54-\t--- bedroom, --- TV",
                    description: "",
                    answers: [
                        { name: "on, on", priority: "", isCorrect: false },
                        { name: "in, in", priority: "", isCorrect: false },
                        { name: "on, in", priority: "", isCorrect: false },
                        { name: "in, on", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 55,
                    name: "55-\tvacation:",
                    description: "",
                    answers: [
                        { name: "see", priority: "", isCorrect: false },
                        { name: "saw", priority: "", isCorrect: false },
                        { name: "sea", priority: "", isCorrect: true },
                        { name: "say", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 56,
                    name: "56-\tHow many pens are there?",
                    description: "",
                    answers: [
                        {
                            name: "There a pen.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "there is two pens.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "There is a pen.",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "There are a pen.",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 57,
                    name: "57-\tIn the kitchen:",
                    description: "",
                    answers: [
                        { name: "soap", priority: "", isCorrect: false },
                        { name: "toy", priority: "", isCorrect: false },
                        { name: "seesaw", priority: "", isCorrect: false },
                        { name: "soup", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 58,
                    name: "58-\tI have two ----.",
                    description: "",
                    answers: [
                        { name: "sandwich", priority: "", isCorrect: false },
                        { name: "sandwichs", priority: "", isCorrect: false },
                        { name: "sandcastls", priority: "", isCorrect: false },
                        { name: "sandwiches", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 59,
                    name: "59-\tI have milk --- breakfast.",
                    description: "",
                    answers: [
                        { name: "on", priority: "", isCorrect: false },
                        { name: "in", priority: "", isCorrect: false },
                        { name: "at", priority: "", isCorrect: false },
                        { name: "for", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 60,
                    name: "60-\tHe is a ---.",
                    description: "",
                    answers: [
                        { name: "taxi", priority: "", isCorrect: false },
                        { name: "taxi drive", priority: "", isCorrect: false },
                        { name: "taxi driver", priority: "", isCorrect: true },
                        { name: "drive", priority: "", isCorrect: false },
                    ],
                },
            ],
        },
        {
            group: 4,
            name: "آزمون تعیین سطح کودکان - بخش چهارم",
            description: "",
            settings: {
                requireScore: 80,
                collectParticipantName: false,
                collectMobileNumber: true,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                showResult: true,
                bookAnAppointment: true,
                oneAttempt: false,
            },
            questions: [
                {
                    id: 61,
                    name: "61-\tWhat's your name? ------------------------",
                    description: "",
                    answers: [
                        {
                            name: "My name Pete. ",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "My names Pete.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "My name's Pete.",
                            priority: "",
                            isCorrect: true,
                        },
                        { name: "Names Pete", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 62,
                    name: "62-\tIn classroom:",
                    description: "",
                    answers: [
                        { name: "sandcastle", priority: "", isCorrect: false },
                        { name: "folder", priority: "", isCorrect: true },
                        { name: "bird", priority: "", isCorrect: false },
                        { name: "teddy", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 63,
                    name: "63-\tI have a bag. This is --- bag. You have a toy. This is --- toy.",
                    description: "",
                    answers: [
                        { name: "mine, your", priority: "", isCorrect: false },
                        { name: "me, your", priority: "", isCorrect: false },
                        { name: "my, you", priority: "", isCorrect: false },
                        { name: "my, your", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 64,
                    name: "64-\tWe eat:",
                    description: "",
                    answers: [
                        { name: "fork", priority: "", isCorrect: false },
                        { name: "hot", priority: "", isCorrect: false },
                        { name: "fig", priority: "", isCorrect: true },
                        { name: "fige", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 65,
                    name: "65-\tThese --- my ---.",
                    description: "",
                    answers: [
                        { name: "is, arm", priority: "", isCorrect: false },
                        { name: "is, arms", priority: "", isCorrect: false },
                        { name: "are, armes", priority: "", isCorrect: false },
                        { name: "are, arms", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 66,
                    name: "66-\tIn pen:",
                    description: "",
                    answers: [
                        { name: "in", priority: "", isCorrect: false },
                        { name: "inks", priority: "", isCorrect: false },
                        { name: "ink", priority: "", isCorrect: true },
                        { name: "pencil", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 67,
                    name: "67-\tIs he a doctor?",
                    description: "",
                    answers: [
                        {
                            name: "yes, he doctor",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "yes, he", priority: "", isCorrect: false },
                        { name: "yes, he is", priority: "", isCorrect: true },
                        {
                            name: "yes, he does",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 68,
                    name: "68-\tWho is this?",
                    description: "",
                    answers: [
                        {
                            name: "This is Beth dad.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "This is Beth dad's",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "This is Beth's dad's",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "This is Beth's dad",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 69,
                    name: "69-\tAre these her socks?",
                    description: "",
                    answers: [
                        {
                            name: "yes, there is",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "yes, they are",
                            priority: "",
                            isCorrect: true,
                        },
                        { name: "yes, it is", priority: "", isCorrect: false },
                        { name: "yes, she is", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 70,
                    name: "70-\tFirefighter has a yellow ---.",
                    description: "",
                    answers: [
                        { name: "hat", priority: "", isCorrect: false },
                        { name: "mat", priority: "", isCorrect: false },
                        { name: "helmet", priority: "", isCorrect: true },
                        { name: "uniforms", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 71,
                    name: "71-\tHe ---- have two brothers.",
                    description: "",
                    answers: [
                        { name: "don't", priority: "", isCorrect: false },
                        { name: "does", priority: "", isCorrect: false },
                        { name: "not", priority: "", isCorrect: false },
                        { name: "doesn't", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 72,
                    name: "72-\tWe are on a --- .",
                    description: "",
                    answers: [
                        { name: "school", priority: "", isCorrect: false },
                        { name: "playground", priority: "", isCorrect: false },
                        { name: "roundabout", priority: "", isCorrect: true },
                        { name: "circus", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 73,
                    name: "73-\tI like monkeys so much. They are --- .",
                    description: "",
                    answers: [
                        { name: "bigger", priority: "", isCorrect: false },
                        {
                            name: "blacks and whites",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "my little", priority: "", isCorrect: false },
                        { name: "funny", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 74,
                    name: "74-\tI like those green --- on a tree.",
                    description: "",
                    answers: [
                        { name: "leafs", priority: "", isCorrect: false },
                        { name: "leave", priority: "", isCorrect: false },
                        { name: "lives", priority: "", isCorrect: false },
                        { name: "leaves", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 75,
                    name: "75-\tLion has:",
                    description: "",
                    answers: [
                        { name: "feather", priority: "", isCorrect: false },
                        { name: "wing", priority: "", isCorrect: false },
                        { name: "insect", priority: "", isCorrect: false },
                        { name: "mane", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 76,
                    name: "76-\t-------------------- ? I like eggs.",
                    description: "",
                    answers: [
                        {
                            name: "What do you like?",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "When do you have eggs?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Where do you have eggs?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Why do you have eggs?",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 77,
                    name: "77-\t-----------  salad? Yes, please",
                    description: "",
                    answers: [
                        { name: "do you like", priority: "", isCorrect: false },
                        {
                            name: "will you like",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "would you like",
                            priority: "",
                            isCorrect: true,
                        },
                        { name: "you like", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 78,
                    name: "78-\tCan you and your cousin play basketball?",
                    description: "",
                    answers: [
                        {
                            name: "No, he can't.",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "No, I can't.",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "No, we can", priority: "", isCorrect: false },
                        {
                            name: "No, we can't.",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 79,
                    name: "79-\tVolcano has:",
                    description: "",
                    answers: [
                        { name: "larva", priority: "", isCorrect: false },
                        { name: "inside", priority: "", isCorrect: false },
                        { name: "larve", priority: "", isCorrect: false },
                        { name: "lava", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 80,
                    name: "80-\t--- play games",
                    description: "",
                    answers: [
                        { name: "let's", priority: "", isCorrect: true },
                        { name: "lit's", priority: "", isCorrect: false },
                        { name: "lets", priority: "", isCorrect: false },
                        { name: "lest", priority: "", isCorrect: false },
                    ],
                },
            ],
        },
        {
            group: 5,
            name: "آزمون تعیین سطح کودکان - بخش پنجم",
            description: "",
            settings: {
                requireScore: 85,
                collectParticipantName: false,
                collectMobileNumber: true,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                showResult: true,
                bookAnAppointment: true,
                oneAttempt: false,
            },
            questions: [
                {
                    id: 81,
                    name: "81-\tRosy --- brown ---.",
                    description: "",
                    answers: [
                        { name: "has, hairs", priority: "", isCorrect: false },
                        { name: "have, hair", priority: "", isCorrect: false },
                        { name: "has, hair", priority: "", isCorrect: true },
                        {
                            name: "does have, hair",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 82,
                    name: "82-\tOur classroom is ---.",
                    description: "",
                    answers: [
                        { name: "school", priority: "", isCorrect: false },
                        { name: "stairs", priority: "", isCorrect: false },
                        { name: "staircases", priority: "", isCorrect: false },
                        { name: "upstairs", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 83,
                    name: "83-\tAre they hungry?",
                    description: "",
                    answers: [
                        {
                            name: "yes, they are hungry",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "yes, they are",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "no, they are",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "yes, they hungry",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 84,
                    name: "84-\tShe is --- .",
                    description: "",
                    answers: [
                        { name: "teach", priority: "", isCorrect: false },
                        { name: "teachers", priority: "", isCorrect: false },
                        { name: "nervous", priority: "", isCorrect: true },
                        { name: "anger", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 85,
                    name: "85-\tLet's have --- pizza.",
                    description: "",
                    answers: [
                        { name: "hole", priority: "", isCorrect: false },
                        { name: "whole", priority: "", isCorrect: true },
                        { name: "hotest", priority: "", isCorrect: false },
                        { name: "purple", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 86,
                    name: "86-\t For cleaning:",
                    description: "",
                    answers: [
                        { name: "map", priority: "", isCorrect: false },
                        { name: "pin", priority: "", isCorrect: false },
                        { name: "ink", priority: "", isCorrect: false },
                        { name: "mop", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 87,
                    name: "87-\tLook at the photo. I am --- a tree.",
                    description: "",
                    answers: [
                        { name: "in front ", priority: "", isCorrect: false },
                        { name: "behind of", priority: "", isCorrect: false },
                        { name: "into of", priority: "", isCorrect: false },
                        { name: "in front of", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 88,
                    name: "88-\tDoes your grandma like music?",
                    description: "",
                    answers: [
                        { name: "yes, he is ", priority: "", isCorrect: false },
                        { name: "yes, she is", priority: "", isCorrect: false },
                        {
                            name: "yes, she does",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "yes, she loves it",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 89,
                    name: "89-\tI love ---.",
                    description: "",
                    answers: [
                        { name: "breads", priority: "", isCorrect: false },
                        { name: "grape", priority: "", isCorrect: false },
                        { name: "grasses", priority: "", isCorrect: false },
                        { name: "grapes", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 90,
                    name: "90-\tMy sister and I --- P.E. --- Saturday.",
                    description: "",
                    answers: [
                        { name: "has, on", priority: "", isCorrect: false },
                        { name: "have, on", priority: "", isCorrect: true },
                        { name: "has, in", priority: "", isCorrect: false },
                        { name: "have, in", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 91,
                    name: "91-\tPlay --- friends",
                    description: "",
                    answers: [
                        { name: "by", priority: "", isCorrect: false },
                        { name: "with", priority: "", isCorrect: true },
                        { name: "width", priority: "", isCorrect: false },
                        { name: "buy", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 92,
                    name: "92-\t----------------------- ? Two dollars please.",
                    description: "",
                    answers: [
                        {
                            name: "How many is it?\t",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "How much is they?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "How much is it?",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "How many is?",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 93,
                    name: "93-\t--- school, --- the afternoon, --- night",
                    description: "",
                    answers: [
                        { name: "on, in, at", priority: "", isCorrect: false },
                        { name: "on, on, at", priority: "", isCorrect: false },
                        { name: "at, in, in", priority: "", isCorrect: false },
                        { name: "at, in, at", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 94,
                    name: "94-\tStone --- in water.",
                    description: "",
                    answers: [
                        { name: "sinks", priority: "", isCorrect: true },
                        { name: "sink", priority: "", isCorrect: false },
                        { name: "floats", priority: "", isCorrect: false },
                        { name: "float", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 95,
                    name: "95-\tWhat are you doing? ----------------",
                    description: "",
                    answers: [
                        {
                            name: "I wearing a T-shirt.",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "I watch TV.", priority: "", isCorrect: false },
                        {
                            name: "I am watching TV.",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "I play games.",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 96,
                    name: "96-\tA part of body:",
                    description: "",
                    answers: [
                        { name: "bend", priority: "", isCorrect: false },
                        { name: "muscles", priority: "", isCorrect: true },
                        { name: "things", priority: "", isCorrect: false },
                        { name: "body shape", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 97,
                    name: "97-\tI have two ---.",
                    description: "",
                    answers: [
                        { name: "fit", priority: "", isCorrect: false },
                        { name: "foot", priority: "", isCorrect: false },
                        { name: "foots", priority: "", isCorrect: false },
                        { name: "feet", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 98,
                    name: "98-\tDesert doesn't have:",
                    description: "",
                    answers: [
                        { name: "camel", priority: "", isCorrect: false },
                        { name: "rock", priority: "", isCorrect: false },
                        { name: "sink", priority: "", isCorrect: true },
                        { name: "sand dune", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 99,
                    name: "99-\tThere weren’t --- cars. There were --- taxis.",
                    description: "",
                    answers: [
                        { name: "some, some", priority: "", isCorrect: false },
                        {
                            name: "some, a lot of",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "a lot of, a lot of",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "any, some", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 100,
                    name: "100-\tSuzy --- .",
                    description: "",
                    answers: [
                        { name: "say goodbye", priority: "", isCorrect: false },
                        {
                            name: "says good by",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "says good buy",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "says goodbye", priority: "", isCorrect: true },
                    ],
                },
            ],
        },
        {
            group: 6,
            name: "آزمون تعیین سطح کودکان - بخش ششم",
            description: "",
            settings: {
                requireScore: 90,
                collectParticipantName: false,
                collectMobileNumber: true,
                validateMobileNumber: true,
                registerOnSite: true,
                seprateResult: true,
                showResult: true,
                bookAnAppointment: true,
                oneAttempt: false,
            },
            questions: [
                {
                    id: 101,
                    name: "101-\tHorse --- cat.",
                    description: "",
                    answers: [
                        { name: "is faster", priority: "", isCorrect: false },
                        { name: "faster than", priority: "", isCorrect: false },
                        { name: "are faster", priority: "", isCorrect: false },
                        {
                            name: "is faster than",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 102,
                    name: "102-\tYou can see it in jungle:",
                    description: "",
                    answers: [
                        { name: "forest", priority: "", isCorrect: false },
                        { name: "polar bear", priority: "", isCorrect: false },
                        { name: "three", priority: "", isCorrect: false },
                        { name: "bear", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 103,
                    name: "103-\t---------------------- ? It is my turn to play.",
                    description: "",
                    answers: [
                        {
                            name: "Who should plays it?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Who's turn is it?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Whose turn to play?",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "Whose turn is it?",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 104,
                    name: "104-\t--- gymnastics, --- chess, --- photos",
                    description: "",
                    answers: [
                        {
                            name: "go, play, take",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "do, play, take",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "do, play, sell",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "have, play, take",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 105,
                    name: "105-\tWhat are your --- in your country?",
                    description: "",
                    answers: [
                        { name: "favorite", priority: "", isCorrect: false },
                        { name: "hobbies", priority: "", isCorrect: true },
                        { name: "hobby", priority: "", isCorrect: false },
                        { name: "doing", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 106,
                    name: "106-\tWhere is Peru?",
                    description: "",
                    answers: [
                        {
                            name: "in South America",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "in North America",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "in Europe", priority: "", isCorrect: false },
                        { name: "in Africa", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 107,
                    name: "107-\tWe have a cool classroom. This is --- whiteboard.",
                    description: "",
                    answers: [
                        { name: "my", priority: "", isCorrect: false },
                        { name: "our", priority: "", isCorrect: true },
                        { name: "their", priority: "", isCorrect: false },
                        { name: "your", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 108,
                    name: "108-\tDolphins aren't ---. They are ---.",
                    description: "",
                    answers: [
                        {
                            name: "beautiful, safe",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "dangerous, clean",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "polluted, clean",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "dangerous, friendly",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 109,
                    name: "109-\tA: I don't like snakes. \tB: -----------",
                    description: "",
                    answers: [
                        {
                            name: "I don't like too. ",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "I don't like them neither",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "Neither do I", priority: "", isCorrect: true },
                        { name: "I don't too", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 110,
                    name: "110-\tLion is ---. I am ---.",
                    description: "",
                    answers: [
                        {
                            name: "angry, scary",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "angry, scared",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "scared, scary",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "anger, scared",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 111,
                    name: "111-\tFarmers keep --- and ---.",
                    description: "",
                    answers: [
                        {
                            name: "sheeps, cows",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "ship, cows", priority: "", isCorrect: false },
                        { name: "sheep, cow", priority: "", isCorrect: false },
                        { name: "sheep, cows", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 112,
                    name: "112-\tHe --- early every day. He --- TV right now.",
                    description: "",
                    answers: [
                        {
                            name: "gets up, is watching",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "is getting up, is watching",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "gets up, watches",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "get up, watch",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 113,
                    name: "113-\t--- play in movies, --- sing in movies",
                    description: "",
                    answers: [
                        {
                            name: "actors, sings",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "actors, singers",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "singers, musicians",
                            priority: "",
                            isCorrect: false,
                        },
                        { name: "actor, sing", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 114,
                    name: "114-\tI am very good --- English.",
                    description: "",
                    answers: [
                        { name: "at speaking", priority: "", isCorrect: true },
                        { name: "on speaking", priority: "", isCorrect: false },
                        { name: "in speaking", priority: "", isCorrect: false },
                        {
                            name: "for speaking",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
                {
                    id: 115,
                    name: "115-\tAdd some --- and --- them --- the dish",
                    description: "",
                    answers: [
                        {
                            name: "salt, water, in",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "salt, cooks, in",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "salt, water, on",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "salt, mash, in",
                            priority: "",
                            isCorrect: true,
                        },
                    ],
                },
                {
                    id: 116,
                    name: "116-\tIt is not a food group:",
                    description: "",
                    answers: [
                        { name: "vegetables", priority: "", isCorrect: false },
                        { name: "fruit", priority: "", isCorrect: false },
                        { name: "dairy", priority: "", isCorrect: false },
                        { name: "chicken", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 117,
                    name: "117-\tWater falls down. It's beautiful.",
                    description: "",
                    answers: [
                        { name: "sea", priority: "", isCorrect: false },
                        { name: "waterfell", priority: "", isCorrect: false },
                        { name: "waterfall", priority: "", isCorrect: true },
                        { name: "ocean", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 118,
                    name: "118-\tIt doesn't have  water:",
                    description: "",
                    answers: [
                        { name: "ocean", priority: "", isCorrect: false },
                        { name: "river", priority: "", isCorrect: false },
                        { name: "lake", priority: "", isCorrect: false },
                        { name: "bridge", priority: "", isCorrect: true },
                    ],
                },
                {
                    id: 119,
                    name: "119-\tYou --- take a photo in museum. ",
                    description: "",
                    answers: [
                        { name: "must", priority: "", isCorrect: false },
                        { name: "mustn't", priority: "", isCorrect: true },
                        { name: "couldn't", priority: "", isCorrect: false },
                        { name: "can't", priority: "", isCorrect: false },
                    ],
                },
                {
                    id: 120,
                    name: "120-\tThey --- in apartment. They --- happy. Their daughter --- homework every day. ",
                    description: "",
                    answers: [
                        {
                            name: "don't lived, were, did",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "didn't lived, were, didn't",
                            priority: "",
                            isCorrect: false,
                        },
                        {
                            name: "didn't live, were, does",
                            priority: "",
                            isCorrect: true,
                        },
                        {
                            name: "didn't live, were, do",
                            priority: "",
                            isCorrect: false,
                        },
                    ],
                },
            ],
        },
    ],
};

// variables
let quizResult;
let clonedMultipleChoiceAnswer,
    clonedMultipleChoiceQuestion,
    clonedCollectMobileNumber,
    clonedRegisterValidate,
    clonedBookAnAppointment,
    clonedSingleResult,
    clonedResult;
let stepBlocks,
    startExamButton,
    progressBar,
    progressBarContainer,
    questionCards,
    stepCards;
const animationDuration = 500;
const entranceAnimationDuration = 1000;
let currentIndex = 1;

// before exam functions needs to run

check_current_user_info_and_change_quiz_data_if_needed();
check_quiz_data_and_make_it_compatible();
make_copy_of_html_parts();
get_prev_quiz_result_if_exists();

create_quiz(quizData);

// show result page instead of new exam as a result of oneAttempt is actived
if (quizResult.isFinished && quizData.settings.oneAttempt) {
    limit_to_result_page();
}

// public events
window.addEventListener("resize", set_start_exam_button_position);
startExamButton.addEventListener("click", start_exam_button_animations);

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
    if (!quizResult.isFinished || !quizData.settings.oneAttempt) {
        //name and description
        document.querySelector(".quiz-name").innerHTML = quizData.name;
        document.querySelector(".quiz-description").innerHTML =
            quizData.description;

        //questions
        append_all_questions_into_html(quizData, mainParent);

        if (quizData.settings.collectMobileNumber) {
            //collect mobile number
            mainParent.appendChild(clonedCollectMobileNumber);
        }
        if (
            quizData.settings.registerOnSite ||
            quizData.settings.validateMobileNumber
        ) {
            //register-validate
            mainParent.appendChild(clonedRegisterValidate);
            if (!quizData.settings.collectParticipantName) {
                document.getElementById("participant-name").parentNode.remove();
            }
            if (!quizData.settings.validateMobileNumber) {
                document.getElementById("validate-part").remove();
                document
                    .querySelector(".register-validate")
                    .querySelector("h1").innerHTML = "ثبت نام / ورود به سایت";
            }
            if (!quizData.settings.registerOnSite) {
                document.getElementById("register-part").remove();
                document
                    .querySelector(".register-validate")
                    .querySelector("h1").innerHTML = "تایید شماره";
            }
        }
        //show result
        mainParent.appendChild(clonedResult);

        //book an appointment
        if (quizData.settings.bookAnAppointment) {
            mainParent.appendChild(clonedBookAnAppointment);
        }
    } else {
        //show result
        mainParent.appendChild(clonedResult);
    }
    tag_button_before_result_page();

    // init before exam start
    init_before_exam_start();
}
function tag_button_before_result_page() {
    const resultPage = document.querySelector(".result");
    let index = get_node_index(resultPage);

    resultPage.parentElement.children[index - 1]
        .querySelector(".dg-next-step-button")
        .classList.add("show_result");
    resultPage.parentElement.children[index - 1].querySelector(
        ".dg-next-step-button"
    ).innerHTML = "مشاهده نتیجه";
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

function init_before_exam_start() {
    stepBlocks = document.querySelectorAll(".dg-step-block");
    startExamButton = document.querySelector(".dg-start-exam-button");
    progressBar = document.querySelector(".dg-progress-bar");
    progressBarContainer = document.getElementById("dg-progress-bar-container");
    questionCards = document.querySelectorAll(".dg-question-card");
    stepCards = document.querySelectorAll(".dg-step-card");
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

    document.querySelector(".quiz").style.display = "flex";
    set_start_exam_button_position();
    document.querySelector(".loading").style.display = "none";
}

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
    startExamButton.style.transitionDuration = "0s";
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

function limit_to_result_page() {
    let mainParent = document.querySelector(".dg-main-container");
    mainParent.innerHTML = "";
    mainParent.appendChild(clonedResult);
    create_result();
}

function create_result() {
    console.log("dare amade mishe");
    document.querySelector(".result").style.visibility = "visible";
    document.querySelector(".result").style.opacity = "1";
    // set quiz to finished
    if (quizData.settings.oneAttempt) {
        quizResult.isFinished = true;
    }
    //save results
    localStorage.setItem("quizResult", JSON.stringify(quizResult));
    let totalScore = parseInt(quizResult.totalScore).toFixed(0);
    init_total_score(totalScore);
    if (quizData.settings.seprateResult) {
        clonedResult.querySelector(".dg-seprate-results").innerHTML = "";
        for (const groupId in quizResult.groupResult) {
            let newElem = clonedSingleResult.cloneNode(true);
            let groupData = get_quiz_sub_data_by_quiz_group(quizData, groupId);
            newElem.querySelector(".dg-single-result-name").innerHTML =
                groupData.name;
            newElem.querySelector(".dg-single-result-description").innerHTML =
                groupData.description;
            newElem.querySelector(".dg-single-result-score").innerHTML =
                quizResult.groupResult[groupId].score + "%";
            clonedResult
                .querySelector(".dg-seprate-results")
                .appendChild(newElem);
        }
        init_ratings();
    }
    make_result_message(totalScore);
}
function make_result_message(totalScore) {
    quizData.resultMessage.forEach(function (single) {
        if (totalScore >= single.min && totalScore <= single.max) {
            document.querySelector(".result-message").innerHTML =
                single.message || "";
        }
    });
}
function init_total_score(totalScore) {
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
    console.log("lets hoooo");
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

function exam_is_ready_to_start() {
    localStorage.removeItem("quizResult");
    let progressBar = document.querySelector(".dg-progress-bar");
    let participantData = [];
    let currentIndex = 1;
    let nextStepButton = document.querySelectorAll(".dg-next-step-button");
    let prevStepButton = document.querySelectorAll(".dg-prev-step-button");
    let allOptions = document.querySelectorAll(".option");
    let stepCards = document.querySelectorAll(".dg-step-card");
    let questionCards = document.querySelectorAll(".dg-question-card");
    let sendNewCode = document.getElementById("dg-send-new-code");
    let isOneTimePassword;

    let insertedId = -1;
    let interval;

    init_view();
    init_participant_data();

    allOptions.forEach(function (singleAnswer) {
        singleAnswer.addEventListener("click", handle_click_on_answer);
    });

    /* every thing happend here */
    nextStepButton.forEach(function (singleNextButton) {
        singleNextButton.addEventListener("click", async function (e) {
            let index = get_node_index(
                find_related_parent_by_className(e.target, "dg-step-card")
            );
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
                        let buttonPrevText =
                            start_loading_animation(singleNextButton);
                        try {
                            handle_request_to_send_validation_code_api(
                                mobileNumber
                            );
                            isOneTimePassword =
                                await handle_request_to_check_if_is_mobile_number_validated_before(
                                    mobileNumber
                                );
                            if (isOneTimePassword) {
                                switch_to_only_validate();
                            }
                            go_to_next_step_animations(index);
                        } catch (error) {}
                        end_loading_animation(singleNextButton, buttonPrevText);
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
                let inputs = document
                    .querySelector(".register-validate")
                    .querySelectorAll("input");
                if (quizData.settings.collectMobileNumber) {
                    var mobileNumber =
                        document.getElementById("mobile-number").value;
                }
                if (
                    quizData.settings.registerOnSite &&
                    quizData.settings.validateMobileNumber
                ) {
                    // register-validate API
                    let email =
                        document.getElementById("participant-email").value;
                    let password = document.getElementById(
                        "participant-password"
                    ).value;
                    let validationCode =
                        document.getElementById("validation-code").value;
                    let firstName,
                        lastName = null;
                    if (quizData.settings.collectParticipantName) {
                        firstName = document.getElementById(
                            "participant-firstname"
                        ).value;
                        lastName = document.getElementById(
                            "participant-lastname"
                        ).value;
                    }
                    if (check_inputs(inputs) && check_email(email)) {
                        let buttonPrevText =
                            start_loading_animation(singleNextButton);
                        try {
                            await handle_request_to_login_if_exists_register_if_new(
                                email,
                                password,
                                firstName,
                                lastName
                            );
                            await handle_request_to_check_validation_code(
                                validationCode,
                                mobileNumber
                            );
                            go_to_next_step_animations(index);
                        } catch (error) {}
                        end_loading_animation(singleNextButton, buttonPrevText);
                    }
                } else if (
                    quizData.settings.registerOnSite &&
                    !quizData.settings.validateMobileNumber
                ) {
                    // only register API
                    let email =
                        document.getElementById("participant-email").value;
                    let password = document.getElementById(
                        "participant-password"
                    ).value;
                    let firstName,
                        lastName = null;
                    if (quizData.settings.collectParticipantName) {
                        firstName = document.getElementById(
                            "participant-firstname"
                        ).value;
                        lastName = document.getElementById(
                            "participant-lastname"
                        ).value;
                    }
                    if (check_inputs(inputs) && check_email(email)) {
                        let buttonPrevText =
                            start_loading_animation(singleNextButton);
                        try {
                            await handle_request_to_login_if_exists_register_if_new(
                                email,
                                password,
                                firstName,
                                lastName
                            );
                            go_to_next_step_animations(index);
                        } catch (error) {}
                        end_loading_animation(singleNextButton, buttonPrevText);
                    }
                } else if (
                    !quizData.settings.registerOnSite &&
                    quizData.settings.validateMobileNumber
                ) {
                    // only validate API
                    let validationCode =
                        document.getElementById("validation-code").value;
                    if (check_inputs(inputs)) {
                        let buttonPrevText =
                            start_loading_animation(singleNextButton);
                        try {
                            if (isOneTimePassword) {
                                await handle_request_to_login_with_one_time_password(
                                    validationCode,
                                    mobileNumber
                                );
                            } else {
                                console.log("hakakooo");
                                await handle_request_to_check_validation_code(
                                    validationCode,
                                    mobileNumber
                                );
                            }
                            go_to_next_step_animations(index);
                        } catch (error) {}
                        end_loading_animation(singleNextButton, buttonPrevText);
                    }
                }
            } else {
                // default - for questions next buttons
                go_to_next_step_animations(index);
            }
            if (singleNextButton.classList.contains("show_result")) {
                create_result();
            }
        });
    });

    prevStepButton.forEach(function (singlePrevButton) {
        singlePrevButton.addEventListener("click", function (e) {
            let index = get_node_index(
                find_related_parent_by_className(e.target, "dg-step-card")
            );
            back_to_prev_step_animations(index);
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
    async function handle_request_to_check_if_is_mobile_number_validated_before(
        mobileNumber
    ) {
        // send request to send validation code
        try {
            let response = await request_to_api({
                action: "degardc_quiz_builder_check_if_is_mobile_number_validated_before",
                mobileNumber,
            });
            return response.result;
        } catch (error) {
            throw new Error();
        }
    }

    async function handle_request_to_check_validation_code(
        validationCode,
        mobileNumber
    ) {
        console.log("injam");
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
    async function handle_request_to_login_with_one_time_password(
        validationCode,
        mobileNumber
    ) {
        try {
            let response = await request_to_api({
                action: "degardc_quiz_builder_login_with_one_time_password",
                validationCode,
                mobileNumber,
                insertedId,
            });
            if (response.error) {
                show_notif(response.message, "error");
                throw new Error();
            } else {
                show_notif(response.message, "success");
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

    async function handle_request_to_login_if_exists_register_if_new(
        email,
        password,
        firstName,
        lastName
    ) {
        // send request to register_login user
        let response;
        try {
            if (firstName && lastName) {
                response = await request_to_api({
                    action: "degardc_quiz_builder_login_if_exists_register_if_new",
                    email,
                    password,
                    firstName,
                    lastName,
                });
            } else {
                response = await request_to_api({
                    action: "degardc_quiz_builder_login_if_exists_register_if_new",
                    email,
                    password,
                });
            }
            if (response.error) {
                show_notif(response.message, "error");
                throw new Error();
            } else {
                show_notif(response.message, "success");
            }
        } catch (error) {
            throw new Error();
        }
    }
    // async function handle_request_to_register_login_user_with_mobile(
    //     email,
    //     password,
    //     mobileNumber,
    //     validationCode,
    //     firstName,
    //     lastName
    // ) {
    //     // send request to register_login user
    //     let response;
    //     try {
    //         if (firstName && lastName) {
    //             response = await request_to_api({
    //                 action: "degardc_quiz_builder_login_register_with_mobile",
    //                 email,
    //                 password,
    //                 mobileNumber,
    //                 validationCode,
    //                 firstName,
    //                 lastName,
    //                 insertedId,
    //             });
    //         } else {
    //             response = await request_to_api({
    //                 action: "degardc_quiz_builder_login_register_with_mobile",
    //                 email,
    //                 password,
    //                 mobileNumber,
    //                 validationCode,
    //                 insertedId,
    //             });
    //         }
    //         if (response.error) {
    //             show_notif(response.message, "error");
    //             throw new Error();
    //         } else {
    //             show_notif(response.message, "success");
    //         }
    //     } catch (error) {
    //         throw new Error();
    //     }
    // }
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
        if (
            stepCards[+(index + 2)].classList.contains("dg-question-card") &&
            !stepCards[+(index + 2)].classList.contains(
                "dg-after-exam-question"
            )
        ) {
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
        if (
            stepCards[+(index + 3)].classList.contains("dg-question-card") &&
            !stepCards[+(index + 3)].classList.contains(
                "dg-after-exam-question"
            )
        ) {
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
        if (
            stepCards[index].classList.contains("dg-question-card") &&
            !stepCards[index].classList.contains("dg-after-exam-question")
        ) {
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
        if (
            stepCards[+(index + 1)].classList.contains("dg-question-card") &&
            !stepCards[+(index + 1)].classList.contains(
                "dg-after-exam-question"
            )
        ) {
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
            if (
                questionCards[index].classList.contains(
                    "dg-after-exam-question"
                )
            ) {
                return;
            }
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
        for (let index = 0; index < stepCards.length; index++) {
            if (
                +stepCards[index].dataset.qnumber > +lastqnumber &&
                stepCards[index].classList.contains("dg-question-card") &&
                !stepCards[index].classList.contains("dg-after-exam-question")
            ) {
                stepCards[index].remove();
            }
        }
        // recalculate stepCards because of deleted ones
        stepCards = document.querySelectorAll(".dg-step-card");

        // retag because last question before result has been removed!
        tag_button_before_result_page();
    }

    function switch_to_only_validate() {
        quizData.settings.registerOnSite = false;
        document.getElementById("register-part").remove();
        if (document.getElementById("register-part")) {
        }
        document
            .querySelector(".register-validate")
            .querySelector("h1").innerHTML = "ورود با کد یکبار مصرف";
    }

    setInterval(function () {
        console.log(quizResult);
    }, 2000);
}

/* START helper functions */
function get_node_index(element) {
    return Array.from(element.parentNode.children).indexOf(element);
}
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
function check_email(email) {
    let hasError = !String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    if (hasError) {
        show_notif("لطفا ایمیل خود را به صورت صحیح وارد کنید", "alert");
    }
    return !hasError;
}
function check_inputs(inputs) {
    let hasError = false;
    for (let index = 0; index < inputs.length; index++) {
        if (!inputs[index].value) {
            hasError = true;
        }
    }
    if (hasError) {
        show_notif("لطفا فرم را به صورت کامل پر کنید", "alert");
    }
    return !hasError;
}
function end_loading_animation(buttonNode, buttonPrevText) {
    buttonNode.innerHTML = buttonPrevText;
}
function start_loading_animation(buttonNode) {
    let buttonPrevText = buttonNode.innerHTML;
    buttonNode.innerHTML = loaderHTML;
    return buttonPrevText;
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

function check_current_user_info_and_change_quiz_data_if_needed() {
    let infoDiv = document.querySelector(".info");
    let isUserLoggedIn = infoDiv.dataset.login === "true" ? true : false;
    let isUserValidateMobile = infoDiv.dataset.mobile === "true" ? true : false;
    if (isUserLoggedIn) {
        quizData.settings.registerOnSite = false;
        if (isUserValidateMobile) {
            quizData.settings.collectMobileNumber = false;
        }
    }
}
function check_quiz_data_and_make_it_compatible() {
    if (!quizData.settings.collectMobileNumber) {
        quizData.settings.validateMobileNumber = false;
    }
}
function make_copy_of_html_parts() {
    // make a copy of parts of html source
    clonedMultipleChoiceAnswer = document
        .querySelector(".sample-multiple-choice-answer")
        .cloneNode(true);
    document.querySelector(".sample-multiple-choice-answer").remove();

    clonedMultipleChoiceQuestion = document
        .querySelector(".sample-multiple-choice-question")
        .cloneNode(true);
    document.querySelector(".sample-multiple-choice-question").remove();

    clonedCollectMobileNumber = document
        .querySelector(".collect-mobile-number")
        .cloneNode(true);
    document.querySelector(".collect-mobile-number").remove();

    clonedRegisterValidate = document
        .querySelector(".register-validate")
        .cloneNode(true);
    document.querySelector(".register-validate").remove();

    clonedBookAnAppointment = document
        .querySelector(".book-an-appointment")
        .cloneNode(true);
    document.querySelector(".book-an-appointment").remove();

    clonedSingleResult = document
        .querySelector(".dg-single-result")
        .cloneNode(true);
    document.querySelector(".dg-single-result").remove();

    clonedResult = document.querySelector(".result").cloneNode(true);
    document.querySelector(".result").remove();
}

function get_prev_quiz_result_if_exists() {
    quizResult = JSON.parse(localStorage.getItem("quizResult")) || {
        groupResult: {},
        totalScore: "",
        isFinished: false,
    };
}
