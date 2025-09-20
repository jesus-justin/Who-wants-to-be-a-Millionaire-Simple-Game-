const questions = [
    {
        q: "🇵🇭 What is the national hero of the Philippines?",
        options: ["Andres Bonifacio", "Jose Rizal", "Emilio Aguinaldo", "Lapu-Lapu"],
        answer: "Jose Rizal"
    },
    {
        q: "🌍 What is the largest continent?",
        options: ["Africa", "Asia", "Europe", "North America"],
        answer: "Asia"
    },
    {
        q: "🦁 Which animal is called the King of the Jungle?",
        options: ["Tiger", "Lion", "Elephant", "Bear"],
        answer: "Lion"
    },
    {
        q: "🌊 What is the largest ocean on Earth?",
        options: ["Indian Ocean", "Atlantic Ocean", "Pacific Ocean", "Arctic Ocean"],
        answer: "Pacific Ocean"
    },
    {
        q: "🚀 Who was the first man to step on the moon?",
        options: ["Neil Armstrong", "Buzz Aldrin", "Yuri Gagarin", "Michael Collins"],
        answer: "Neil Armstrong"
    }
];

const prizes = [1000, 5000, 10000, 50000, 1000000]; // prize levels
let current = 0;
let prize = 0;

const questionEl = document.getElementById("question");
const optionsEl = document.getElementById("options");
const feedbackEl = document.getElementById("feedback");
const levelEl = document.getElementById("level");
const saveForm = document.getElementById("saveScoreForm");
const finalScoreEl = document.getElementById("finalScore");

function loadQuestion() {
    if (current >= questions.length) {
        feedbackEl.innerText = `🎉 Congratulations! You won ₱${prize}`;
        finalScoreEl.value = prize;
        saveForm.style.display = "block";
        questionEl.innerText = "";
        optionsEl.innerHTML = "";
        return;
    }

    let q = questions[current];
    questionEl.innerText = q.q;
    optionsEl.innerHTML = "";

    q.options.forEach(opt => {
        let btn = document.createElement("button");
        btn.innerText = opt;
        btn.onclick = () => checkAnswer(opt);
        optionsEl.appendChild(btn);
    });

    levelEl.innerText = `Prize: ₱${prizes[current]}`;
}

function checkAnswer(selected) {
    if (selected === questions[current].answer) {
        prize = prizes[current];
        feedbackEl.innerText = `✅ Correct! You now have ₱${prize}`;
        current++;
        setTimeout(loadQuestion, 1200);
    } else {
        feedbackEl.innerText = `❌ Wrong! Game Over. You won ₱${prize}`;
        finalScoreEl.value = prize;
        saveForm.style.display = "block";
        questionEl.innerText = "";
        optionsEl.innerHTML = "";
    }
}

loadQuestion();
