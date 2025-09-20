// Enhanced Question Database
const questions = {
    easy: [
    {
        q: "🇵🇭 What is the national hero of the Philippines?",
        options: ["Andres Bonifacio", "Jose Rizal", "Emilio Aguinaldo", "Lapu-Lapu"],
            answer: "Jose Rizal",
            category: "History"
    },
    {
        q: "🦁 Which animal is called the King of the Jungle?",
        options: ["Tiger", "Lion", "Elephant", "Bear"],
            answer: "Lion",
            category: "Nature"
    },
    {
        q: "🌊 What is the largest ocean on Earth?",
        options: ["Indian Ocean", "Atlantic Ocean", "Pacific Ocean", "Arctic Ocean"],
            answer: "Pacific Ocean",
            category: "Geography"
    },
    {
        q: "🚀 Who was the first man to step on the moon?",
        options: ["Neil Armstrong", "Buzz Aldrin", "Yuri Gagarin", "Michael Collins"],
            answer: "Neil Armstrong",
            category: "Science"
        },
        {
            q: "🎵 What is the capital of Japan?",
            options: ["Osaka", "Kyoto", "Tokyo", "Hiroshima"],
            answer: "Tokyo",
            category: "Geography"
        }
    ],
    medium: [
        {
            q: "🧬 What is the powerhouse of the cell?",
            options: ["Nucleus", "Mitochondria", "Ribosome", "Chloroplast"],
            answer: "Mitochondria",
            category: "Science"
        },
        {
            q: "📚 Who wrote 'Romeo and Juliet'?",
            options: ["Charles Dickens", "William Shakespeare", "Mark Twain", "Jane Austen"],
            answer: "William Shakespeare",
            category: "Literature"
        },
        {
            q: "⚡ What is the chemical symbol for gold?",
            options: ["Go", "Gd", "Au", "Ag"],
            answer: "Au",
            category: "Science"
        },
        {
            q: "🏛️ In which year did World War II end?",
            options: ["1944", "1945", "1946", "1947"],
            answer: "1945",
            category: "History"
        },
        {
            q: "🎨 Who painted the Mona Lisa?",
            options: ["Vincent van Gogh", "Pablo Picasso", "Leonardo da Vinci", "Michelangelo"],
            answer: "Leonardo da Vinci",
            category: "Art"
        }
    ],
    hard: [
        {
            q: "🔬 What is the speed of light in vacuum?",
            options: ["299,792,458 m/s", "300,000,000 m/s", "299,000,000 m/s", "301,000,000 m/s"],
            answer: "299,792,458 m/s",
            category: "Physics"
        },
        {
            q: "🧮 What is the derivative of x²?",
            options: ["x", "2x", "x²", "2x²"],
            answer: "2x",
            category: "Mathematics"
        },
        {
            q: "🌌 What is the smallest unit of matter?",
            options: ["Atom", "Electron", "Proton", "Quark"],
            answer: "Quark",
            category: "Physics"
        },
        {
            q: "🧬 What does DNA stand for?",
            options: ["Deoxyribonucleic Acid", "Deoxyribose Nucleic Acid", "Deoxyribonucleotide Acid", "Deoxyribose Nucleotide Acid"],
            answer: "Deoxyribonucleic Acid",
            category: "Biology"
        },
        {
            q: "⚛️ What is the atomic number of Carbon?",
            options: ["6", "12", "14", "16"],
            answer: "6",
            category: "Chemistry"
        }
    ]
};

// Game Configuration
const prizes = [1000, 2000, 5000, 10000, 20000, 50000, 100000, 250000, 500000, 1000000];

// Game State
let gameState = {
    current: 0,
    prize: 0,
    difficulty: 'medium',
    playerName: 'Player',
    lifelines: {
        '50-50': true,
        'phone': true,
        'audience': true
    },
    gameActive: false,
    settings: {
        sound: true,
        music: true,
        theme: 'classic'
    }
};

// DOM Elements
const elements = {
    questionText: document.getElementById('questionText'),
    questionNumber: document.getElementById('questionNumber'),
    questionPrize: document.getElementById('questionPrize'),
    optionsContainer: document.getElementById('optionsContainer'),
    feedbackText: document.getElementById('feedbackText'),
    currentScore: document.getElementById('currentScore'),
    playerName: document.getElementById('playerName'),
    prizeLadder: document.getElementById('prizeLadder'),
    startGameBtn: document.getElementById('startGameBtn'),
    pauseGameBtn: document.getElementById('pauseGameBtn'),
    finalScore: document.getElementById('finalScore'),
    finalScoreDisplay: document.getElementById('finalScoreDisplay'),
    gameOverTitle: document.getElementById('gameOverTitle'),
    saveScoreForm: document.getElementById('saveScoreForm'),
    
    // Modals
    settingsModal: document.getElementById('settingsModal'),
    leaderboardModal: document.getElementById('leaderboardModal'),
    gameOverModal: document.getElementById('gameOverModal'),
    
    // Settings
    playerNameInput: document.getElementById('playerNameInput'),
    difficultySelect: document.getElementById('difficultySelect'),
    soundToggle: document.getElementById('soundToggle'),
    musicToggle: document.getElementById('musicToggle'),
    themeSelect: document.getElementById('themeSelect'),
    
    // Lifelines
    fiftyFifty: document.getElementById('fiftyFifty'),
    phoneFriend: document.getElementById('phoneFriend'),
    audiencePoll: document.getElementById('audiencePoll')
};

// Initialize Game
function initGame() {
    loadSettings();
    setupEventListeners();
    buildPrizeLadder();
    updatePlayerInfo();
    showWelcomeScreen();
}

// Load Settings from Local Storage
function loadSettings() {
    const savedSettings = localStorage.getItem('millionaireSettings');
    if (savedSettings) {
        const settings = JSON.parse(savedSettings);
        gameState.settings = { ...gameState.settings, ...settings };
        gameState.difficulty = settings.difficulty || 'medium';
        gameState.playerName = settings.playerName || 'Player';
    }
    
    // Apply settings to UI
    elements.playerNameInput.value = gameState.playerName;
    elements.difficultySelect.value = gameState.difficulty;
    elements.soundToggle.checked = gameState.settings.sound;
    elements.musicToggle.checked = gameState.settings.music;
    elements.themeSelect.value = gameState.settings.theme;
}

// Save Settings to Local Storage
function saveSettings() {
    const settings = {
        playerName: elements.playerNameInput.value,
        difficulty: elements.difficultySelect.value,
        sound: elements.soundToggle.checked,
        music: elements.musicToggle.checked,
        theme: elements.themeSelect.value
    };
    
    localStorage.setItem('millionaireSettings', JSON.stringify(settings));
    gameState.settings = { ...gameState.settings, ...settings };
    gameState.difficulty = settings.difficulty;
    gameState.playerName = settings.playerName;
    
    updatePlayerInfo();
    closeModal('settingsModal');
    showNotification('Settings saved successfully!', 'success');
}

// Setup Event Listeners
function setupEventListeners() {
    // Game Controls
    elements.startGameBtn.addEventListener('click', startNewGame);
    elements.pauseGameBtn.addEventListener('click', pauseGame);
    
    // Modal Controls
    document.getElementById('settingsBtn').addEventListener('click', () => openModal('settingsModal'));
    document.getElementById('leaderboardBtn').addEventListener('click', () => openModal('leaderboardModal'));
    document.getElementById('closeSettings').addEventListener('click', () => closeModal('settingsModal'));
    document.getElementById('closeLeaderboard').addEventListener('click', () => closeModal('leaderboardModal'));
    document.getElementById('closeGameOver').addEventListener('click', () => closeModal('gameOverModal'));
    
    // Settings
    document.getElementById('saveSettings').addEventListener('click', saveSettings);
    document.getElementById('resetSettings').addEventListener('click', resetSettings);
    
    // Lifelines
    elements.fiftyFifty.addEventListener('click', () => useLifeline('50-50'));
    elements.phoneFriend.addEventListener('click', () => useLifeline('phone'));
    elements.audiencePoll.addEventListener('click', () => useLifeline('audience'));
    
    // Close modals when clicking outside
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal(modal.id);
            }
        });
    });
}

// Build Prize Ladder
function buildPrizeLadder() {
    elements.prizeLadder.innerHTML = '';
    prizes.forEach((prize, index) => {
        const ladderItem = document.createElement('div');
        ladderItem.className = 'ladder-item';
        ladderItem.innerHTML = `
            <span>Question ${index + 1}</span>
            <span>₱${prize.toLocaleString()}</span>
        `;
        elements.prizeLadder.appendChild(ladderItem);
    });
}

// Update Player Info
function updatePlayerInfo() {
    elements.playerName.textContent = gameState.playerName;
    elements.currentScore.textContent = `₱${gameState.prize.toLocaleString()}`;
}

// Show Welcome Screen
function showWelcomeScreen() {
    elements.questionText.textContent = 'Welcome to Who Wants to Be a Millionaire!';
    elements.questionNumber.textContent = 'Ready to Play?';
    elements.questionPrize.textContent = '₱0';
    elements.optionsContainer.innerHTML = '';
    elements.feedbackText.textContent = 'Click "Start New Game" to begin your journey to ₱1,000,000!';
    elements.startGameBtn.style.display = 'flex';
    elements.pauseGameBtn.style.display = 'none';
}

// Start New Game
function startNewGame() {
    gameState.current = 0;
    gameState.prize = 0;
    gameState.gameActive = true;
    gameState.lifelines = {
        '50-50': true,
        'phone': true,
        'audience': true
    };
    
    updateLifelines();
    updatePrizeLadder();
    updatePlayerInfo();
    loadQuestion();
    elements.startGameBtn.style.display = 'none';
    elements.pauseGameBtn.style.display = 'flex';
    
    if (gameState.settings.sound) {
        playSound('gameStart');
    }
}

// Load Question
function loadQuestion() {
    if (gameState.current >= questions[gameState.difficulty].length) {
        endGame(true);
        return;
    }

    const question = questions[gameState.difficulty][gameState.current];
    
    elements.questionNumber.textContent = `Question ${gameState.current + 1}`;
    elements.questionPrize.textContent = `₱${prizes[gameState.current].toLocaleString()}`;
    elements.questionText.textContent = question.q;
    elements.feedbackText.textContent = '';
    
    // Create options
    elements.optionsContainer.innerHTML = '';
    question.options.forEach((option, index) => {
        const optionBtn = document.createElement('button');
        optionBtn.className = 'option-btn';
        optionBtn.textContent = option;
        optionBtn.dataset.option = option;
        optionBtn.addEventListener('click', () => selectAnswer(option));
        elements.optionsContainer.appendChild(optionBtn);
    });
    
    updatePrizeLadder();
}

// Select Answer
function selectAnswer(selected) {
    if (!gameState.gameActive) return;
    
    const question = questions[gameState.difficulty][gameState.current];
    const optionButtons = elements.optionsContainer.querySelectorAll('.option-btn');
    
    // Disable all buttons
    optionButtons.forEach(btn => {
        btn.disabled = true;
        if (btn.dataset.option === question.answer) {
            btn.classList.add('correct');
        } else if (btn.dataset.option === selected && selected !== question.answer) {
            btn.classList.add('incorrect');
        }
    });
    
    if (selected === question.answer) {
        gameState.prize = prizes[gameState.current];
        elements.feedbackText.textContent = `✅ Correct! You now have ₱${gameState.prize.toLocaleString()}`;
        elements.feedbackText.style.color = '#00ff00';
        
        if (gameState.settings.sound) {
            playSound('correct');
        }
        
        gameState.current++;
        updatePlayerInfo();
        updatePrizeLadder();
        
        setTimeout(() => {
            if (gameState.gameActive) {
                loadQuestion();
            }
        }, 2000);
    } else {
        elements.feedbackText.textContent = `❌ Wrong! The correct answer was "${question.answer}". Game Over!`;
        elements.feedbackText.style.color = '#ff0000';
        
        if (gameState.settings.sound) {
            playSound('incorrect');
        }
        
        setTimeout(() => {
            endGame(false);
        }, 2000);
    }
}

// Use Lifeline
function useLifeline(lifeline) {
    if (!gameState.gameActive || !gameState.lifelines[lifeline]) return;
    
    const question = questions[gameState.difficulty][gameState.current];
    const optionButtons = elements.optionsContainer.querySelectorAll('.option-btn');
    
    switch (lifeline) {
        case '50-50':
            useFiftyFifty(question, optionButtons);
            break;
        case 'phone':
            usePhoneFriend(question);
            break;
        case 'audience':
            useAudiencePoll(question, optionButtons);
            break;
    }
    
    gameState.lifelines[lifeline] = false;
    updateLifelines();
    
    if (gameState.settings.sound) {
        playSound('lifeline');
    }
}

// 50:50 Lifeline
function useFiftyFifty(question, optionButtons) {
    const correctAnswer = question.answer;
    const wrongAnswers = question.options.filter(opt => opt !== correctAnswer);
    const removeAnswers = wrongAnswers.sort(() => 0.5 - Math.random()).slice(0, 2);
    
    optionButtons.forEach(btn => {
        if (removeAnswers.includes(btn.dataset.option)) {
            btn.style.opacity = '0.3';
            btn.disabled = true;
        }
    });
    
    showNotification('50:50 used! Two wrong answers have been removed.', 'info');
}

// Phone a Friend Lifeline
function usePhoneFriend(question) {
    const responses = [
        "I'm not sure, but I think it might be...",
        "That's a tough one. I'd go with...",
        "I'm pretty confident the answer is...",
        "I'm not certain, but my best guess is..."
    ];
    
    const response = responses[Math.floor(Math.random() * responses.length)];
    const confidence = Math.floor(Math.random() * 40) + 60; // 60-100%
    
    showNotification(`Phone a Friend: "${response} ${question.answer}" (${confidence}% confident)`, 'info');
}

// Ask the Audience Lifeline
function useAudiencePoll(question, optionButtons) {
    const correctAnswer = question.answer;
    const correctIndex = question.options.indexOf(correctAnswer);
    
    // Generate audience poll results (correct answer gets highest percentage)
    const percentages = [0, 0, 0, 0];
    percentages[correctIndex] = Math.floor(Math.random() * 30) + 50; // 50-80%
    
    const remaining = 100 - percentages[correctIndex];
    const otherOptions = [0, 1, 2, 3].filter(i => i !== correctIndex);
    
    otherOptions.forEach((index, i) => {
        if (i === otherOptions.length - 1) {
            percentages[index] = remaining;
        } else {
            const amount = Math.floor(Math.random() * remaining / 2);
            percentages[index] = amount;
            remaining -= amount;
        }
    });
    
    // Show audience poll results
    let pollResults = "Audience Poll Results:\n";
    question.options.forEach((option, index) => {
        pollResults += `${option}: ${percentages[index]}%\n`;
    });
    
    showNotification(pollResults, 'info');
}

// Update Lifelines Display
function updateLifelines() {
    Object.keys(gameState.lifelines).forEach(lifeline => {
        const btn = elements[lifeline === '50-50' ? 'fiftyFifty' : 
                           lifeline === 'phone' ? 'phoneFriend' : 'audiencePoll'];
        if (gameState.lifelines[lifeline]) {
            btn.classList.remove('used');
            btn.disabled = false;
        } else {
            btn.classList.add('used');
            btn.disabled = true;
        }
    });
}

// Update Prize Ladder
function updatePrizeLadder() {
    const ladderItems = elements.prizeLadder.querySelectorAll('.ladder-item');
    ladderItems.forEach((item, index) => {
        item.classList.remove('current', 'passed');
        if (index === gameState.current) {
            item.classList.add('current');
        } else if (index < gameState.current) {
            item.classList.add('passed');
        }
    });
}

// End Game
function endGame(won) {
    gameState.gameActive = false;
    elements.startGameBtn.style.display = 'flex';
    elements.pauseGameBtn.style.display = 'none';
    
    if (won) {
        elements.gameOverTitle.textContent = '🎉 Congratulations! You Won!';
        elements.finalScoreDisplay.textContent = `₱${gameState.prize.toLocaleString()}`;
        elements.finalScore.value = gameState.prize;
        
        if (gameState.settings.sound) {
            playSound('victory');
        }
    } else {
        elements.gameOverTitle.textContent = 'Game Over!';
        elements.finalScoreDisplay.textContent = `₱${gameState.prize.toLocaleString()}`;
        elements.finalScore.value = gameState.prize;
        
        if (gameState.settings.sound) {
            playSound('gameOver');
        }
    }
    
    setTimeout(() => {
        openModal('gameOverModal');
    }, 1000);
}

// Pause Game
function pauseGame() {
    gameState.gameActive = false;
    elements.startGameBtn.style.display = 'flex';
    elements.pauseGameBtn.style.display = 'none';
    showNotification('Game paused. Click "Start New Game" to continue.', 'info');
}

// Modal Functions
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('show');
    modal.style.display = 'flex';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('show');
    modal.style.display = 'none';
}

// Settings Functions
function resetSettings() {
    elements.playerNameInput.value = 'Player';
    elements.difficultySelect.value = 'medium';
    elements.soundToggle.checked = true;
    elements.musicToggle.checked = true;
    elements.themeSelect.value = 'classic';
    saveSettings();
}

// Notification System
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#00ff00' : type === 'error' ? '#ff0000' : '#1e90ff'};
        color: white;
        padding: 1rem 2rem;
        border-radius: 10px;
        z-index: 3000;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        animation: slideInRight 0.3s ease;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Sound System
function playSound(soundType) {
    if (!gameState.settings.sound) return;
    
    // Create audio context for sound effects
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    
    const sounds = {
        correct: { frequency: 800, duration: 0.3 },
        incorrect: { frequency: 200, duration: 0.5 },
        lifeline: { frequency: 600, duration: 0.2 },
        gameStart: { frequency: 1000, duration: 0.5 },
        victory: { frequency: 1200, duration: 1.0 },
        gameOver: { frequency: 300, duration: 1.0 }
    };
    
    const sound = sounds[soundType];
    if (sound) {
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(sound.frequency, audioContext.currentTime);
        oscillator.type = 'sine';
        
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + sound.duration);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + sound.duration);
    }
}

// Initialize the game when DOM is loaded
document.addEventListener('DOMContentLoaded', initGame);
