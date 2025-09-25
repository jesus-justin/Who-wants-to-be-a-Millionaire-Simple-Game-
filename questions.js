// Enhanced Question Database
const questions = {
    easy: [
    {
        q: "🇵🇭 What is the national hero of the Philippines?",
        options: ["Andres Bonifacio", "Jose Rizal", "Emilio Aguinaldo", "Lapu-Lapu"],
        answer: "Jose Rizal",
        category: "Philippines History"
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
    },
    {
        q: "🇵🇭 What is the capital of the Philippines?",
        options: ["Cebu", "Davao", "Manila", "Quezon City"],
        answer: "Manila",
        category: "Philippines Geography"
    },
    {
        q: "🍎 What color do you get when you mix red and blue?",
        options: ["Green", "Purple", "Orange", "Yellow"],
        answer: "Purple",
        category: "General Knowledge"
    },
    {
        q: "🐧 Which continent is home to penguins?",
        options: ["North America", "Africa", "Antarctica", "Asia"],
        answer: "Antarctica",
        category: "Nature"
    },
    {
        q: "🇵🇭 How many main islands make up the Philippines?",
        options: ["5,000+", "7,000+", "3,000+", "9,000+"],
        answer: "7,000+",
        category: "Philippines Geography"
    },
    {
        q: "☀️ What is the closest star to Earth?",
        options: ["Alpha Centauri", "The Sun", "Sirius", "Proxima Centauri"],
        answer: "The Sun",
        category: "Science"
    },
    {
        q: "🇵🇭 What is the national flower of the Philippines?",
        options: ["Sampaguita", "Gumamela", "Rosal", "Waling-waling"],
        answer: "Sampaguita",
        category: "Philippines Culture"
    },
    {
        q: "🎬 Which company created the movie 'Frozen'?",
        options: ["Pixar", "DreamWorks", "Disney", "Warner Bros"],
        answer: "Disney",
        category: "Entertainment"
    },
    {
        q: "🇵🇭 What is the official language of the Philippines?",
        options: ["English", "Filipino", "Tagalog", "Cebuano"],
        answer: "Filipino",
        category: "Philippines Culture"
    },
    {
        q: "🌍 How many continents are there?",
        options: ["5", "6", "7", "8"],
        answer: "7",
        category: "Geography"
    },
    {
        q: "🇵🇭 Which Philippine president served from 2016-2022?",
        options: ["Gloria Macapagal-Arroyo", "Rodrigo Duterte", "Benigno Aquino III", "Joseph Estrada"],
        answer: "Rodrigo Duterte",
        category: "Philippines Current Events"
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
        },
        {
            q: "🇵🇭 What is the largest island in the Philippines?",
            options: ["Mindanao", "Luzon", "Visayas", "Palawan"],
            answer: "Luzon",
            category: "Philippines Geography"
        },
        {
            q: "🌋 What type of volcano is Mount Mayon?",
            options: ["Shield", "Cinder Cone", "Stratovolcano", "Caldera"],
            answer: "Stratovolcano",
            category: "Philippines Geography"
        },
        {
            q: "🇵🇭 Which Philippine province is known as the 'Rice Granary of the Philippines'?",
            options: ["Nueva Ecija", "Isabela", "Cagayan", "Pangasinan"],
            answer: "Nueva Ecija",
            category: "Philippines Geography"
        },
        {
            q: "🎵 What is the national anthem of the Philippines?",
            options: ["Bayan Ko", "Lupang Hinirang", "Pilipinas Kong Mahal", "Ako ay Pilipino"],
            answer: "Lupang Hinirang",
            category: "Philippines Culture"
        },
        {
            q: "🇵🇭 Who is the current President of the Philippines (as of 2024)?",
            options: ["Rodrigo Duterte", "Bongbong Marcos", "Leni Robredo", "Manny Pacquiao"],
            answer: "Bongbong Marcos",
            category: "Philippines Current Events"
        },
        {
            q: "🏛️ What is the oldest university in the Philippines?",
            options: ["University of the Philippines", "Ateneo de Manila", "University of Santo Tomas", "De La Salle University"],
            answer: "University of Santo Tomas",
            category: "Philippines History"
        },
        {
            q: "🌊 Which sea separates the Philippines from Taiwan?",
            options: ["South China Sea", "Philippine Sea", "Luzon Strait", "Sulu Sea"],
            answer: "Luzon Strait",
            category: "Philippines Geography"
        },
        {
            q: "🇵🇭 What is the currency of the Philippines?",
            options: ["Peso", "Dollar", "Euro", "Yen"],
            answer: "Peso",
            category: "Philippines General"
        },
        {
            q: "🎬 Which Filipino movie won the Palme d'Or at Cannes Film Festival?",
            options: ["Heneral Luna", "On the Job", "Kinatay", "The Woman Who Left"],
            answer: "The Woman Who Left",
            category: "Philippines Entertainment"
        },
        {
            q: "🏆 Which Filipino boxer is known as 'Pacman'?",
            options: ["Nonito Donaire", "Manny Pacquiao", "Gerry Peñalosa", "Flash Elorde"],
            answer: "Manny Pacquiao",
            category: "Philippines Sports"
        },
        {
            q: "🌍 What is the smallest country in the world?",
            options: ["Monaco", "Vatican City", "San Marino", "Liechtenstein"],
            answer: "Vatican City",
            category: "Geography"
        },
        {
            q: "🔬 What is the speed of sound in air at room temperature?",
            options: ["300 m/s", "330 m/s", "343 m/s", "350 m/s"],
            answer: "343 m/s",
            category: "Science"
        },
        {
            q: "🇵🇭 Which Philippine city is known as the 'Summer Capital'?",
            options: ["Baguio", "Tagaytay", "Banaue", "Sagada"],
            answer: "Baguio",
            category: "Philippines Geography"
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
        },
        {
            q: "🇵🇭 What is the official name of the Philippines?",
            options: ["Republic of the Philippines", "Philippine Republic", "United States of the Philippines", "Commonwealth of the Philippines"],
            answer: "Republic of the Philippines",
            category: "Philippines Government"
        },
        {
            q: "🏛️ When did the Philippines gain independence from Spain?",
            options: ["June 12, 1898", "July 4, 1946", "December 10, 1898", "January 1, 1899"],
            answer: "June 12, 1898",
            category: "Philippines History"
        },
        {
            q: "🇵🇭 Which Philippine president was known as the 'Iron Lady of Asia'?",
            options: ["Gloria Macapagal-Arroyo", "Corazon Aquino", "Imelda Marcos", "Leni Robredo"],
            answer: "Corazon Aquino",
            category: "Philippines History"
        },
        {
            q: "🌋 What is the highest peak in the Philippines?",
            options: ["Mount Apo", "Mount Pulag", "Mount Mayon", "Mount Pinatubo"],
            answer: "Mount Apo",
            category: "Philippines Geography"
        },
        {
            q: "🇵🇭 Which Philippine province has the most number of islands?",
            options: ["Palawan", "Cebu", "Bohol", "Mindoro"],
            answer: "Palawan",
            category: "Philippines Geography"
        },
        {
            q: "🎭 Who wrote the novel 'Noli Me Tangere'?",
            options: ["Andres Bonifacio", "Jose Rizal", "Emilio Aguinaldo", "Marcelo del Pilar"],
            answer: "Jose Rizal",
            category: "Philippines Literature"
        },
        {
            q: "🇵🇭 What is the oldest city in the Philippines?",
            options: ["Manila", "Cebu", "Vigan", "Iloilo"],
            answer: "Cebu",
            category: "Philippines History"
        },
        {
            q: "🌊 Which Philippine sea is known for its rich marine biodiversity?",
            options: ["Sulu Sea", "Coral Triangle", "Philippine Sea", "South China Sea"],
            answer: "Coral Triangle",
            category: "Philippines Geography"
        },
        {
            q: "🇵🇭 What is the name of the Philippine flag's sun?",
            options: ["Sun of Liberty", "Sun of Freedom", "Sun of Independence", "Sun of the Revolution"],
            answer: "Sun of Liberty",
            category: "Philippines Culture"
        },
        {
            q: "🏆 Which Filipino athlete won the first Olympic gold medal for the Philippines?",
            options: ["Hidilyn Diaz", "Manny Pacquiao", "Efren Reyes", "Paeng Nepomuceno"],
            answer: "Hidilyn Diaz",
            category: "Philippines Sports"
        },
        {
            q: "🇵🇭 Which Philippine region is known as the 'Land of Promise'?",
            options: ["Mindanao", "Visayas", "Luzon", "Palawan"],
            answer: "Mindanao",
            category: "Philippines Geography"
        },
        {
            q: "🎨 Who is known as the 'Father of Philippine Art'?",
            options: ["Fernando Amorsolo", "Juan Luna", "Carlos Francisco", "Vicente Manansala"],
            answer: "Fernando Amorsolo",
            category: "Philippines Art"
        },
        {
            q: "🇵🇭 What is the official name of the Philippine Congress?",
            options: ["Congress of the Philippines", "National Assembly", "Parliament of the Philippines", "Legislative Assembly"],
            answer: "Congress of the Philippines",
            category: "Philippines Government"
        },
        {
            q: "🌍 What is the approximate population of the Philippines?",
            options: ["100 million", "110 million", "120 million", "130 million"],
            answer: "110 million",
            category: "Philippines Demographics"
        },
        {
            q: "🇵🇭 Which Philippine festival is known as the 'Mother of All Festivals'?",
            options: ["Sinulog", "Ati-Atihan", "Dinagyang", "MassKara"],
            answer: "Ati-Atihan",
            category: "Philippines Culture"
        }
    ],
    animeEdition: [
        {
            q: "🌀 What is the name of Naruto's father?",
            options: ["Minato Namikaze", "Kakashi Hatake", "Jiraiya", "Hiruzen Sarutobi"],
            answer: "Minato Namikaze",
            category: "Naruto"
        },
        {
            q: "🏴‍☠️ Who is the captain of the Straw Hat Pirates?",
            options: ["Monkey D. Luffy", "Roronoa Zoro", "Sanji", "Nami"],
            answer: "Monkey D. Luffy",
            category: "One Piece"
        },
        {
            q: "🦍 What is Goku's Saiyan name?",
            options: ["Kakarot", "Vegeta", "Bardock", "Gohan"],
            answer: "Kakarot",
            category: "Dragon Ball"
        },
        {
            q: "⚔️ In Attack on Titan, what are the giant creatures called?",
            options: ["Titans", "Giants", "Behemoths", "Colossals"],
            answer: "Titans",
            category: "Attack on Titan"
        },
        {
            q: "📓 What is the name of Light Yagami's notebook?",
            options: ["Death Note", "Life Note", "Fate Book", "Judgment Diary"],
            answer: "Death Note",
            category: "Death Note"
        },
        {
            q: "💪 Who is the protagonist of My Hero Academia?",
            options: ["Izuku Midoriya", "Katsuki Bakugo", "Shoto Todoroki", "All Might"],
            answer: "Izuku Midoriya",
            category: "My Hero Academia"
        },
        {
            q: "🎯 What is the highest rank in Hunter x Hunter?",
            options: ["Triple Hunter", "Double Hunter", "Hunter", "Master Hunter"],
            answer: "Triple Hunter",
            category: "Hunter x Hunter"
        },
        {
            q: "⚗️ In Fullmetal Alchemist, what is Edward Elric's title?",
            options: ["Fullmetal Alchemist", "Flame Alchemist", "Ice Alchemist", "Steel Alchemist"],
            answer: "Fullmetal Alchemist",
            category: "Fullmetal Alchemist"
        },
        {
            q: "👊 Who is the strongest in One Punch Man?",
            options: ["Saitama", "Genos", "Bang", "Tatsumaki"],
            answer: "Saitama",
            category: "One Punch Man"
        },
        {
            q: "💰 What is the currency in Dragon Ball?",
            options: ["Zeni", "Berry", "Beli", "Gold"],
            answer: "Zeni",
            category: "Dragon Ball"
        },
        {
            q: "🌊 In Demon Slayer, what is Tanjiro's breathing style?",
            options: ["Water Breathing", "Fire Breathing", "Thunder Breathing", "Wind Breathing"],
            answer: "Water Breathing",
            category: "Demon Slayer"
        },
        {
            q: "👹 Who is the creator of the Death Note?",
            options: ["Ryuk", "Rem", "Light Yagami", "L"],
            answer: "Ryuk",
            category: "Death Note"
        },
        {
            q: "⚡ What is All Might's quirk in My Hero Academia?",
            options: ["One For All", "All For One", "Super Strength", "Flight"],
            answer: "One For All",
            category: "My Hero Academia"
        },
        {
            q: "👁️ In Naruto, what is the Sharingan?",
            options: ["A type of eye technique", "A summoning jutsu", "A transformation", "A weapon"],
            answer: "A type of eye technique",
            category: "Naruto"
        },
        {
            q: "🏴‍☠️ Who is the Pirate King in One Piece?",
            options: ["Gol D. Roger", "Monkey D. Luffy", "Whitebeard", "Shanks"],
            answer: "Gol D. Roger",
            category: "One Piece"
        },
        {
            q: "🛡️ In Attack on Titan, what is the name of the organization that fights Titans?",
            options: ["Survey Corps", "Military Police", "Garrison", "Marleyan Warriors"],
            answer: "Survey Corps",
            category: "Attack on Titan"
        },
        {
            q: "🎮 In Sword Art Online, what is the virtual reality game called?",
            options: ["Sword Art Online", "Alfheim Online", "Gun Gale Online", "Underworld"],
            answer: "Sword Art Online",
            category: "Sword Art Online"
        },
        {
            q: "👑 Who is the main antagonist in Dragon Ball Z?",
            options: ["Frieza", "Cell", "Buu", "Beerus"],
            answer: "Frieza",
            category: "Dragon Ball"
        },
        {
            q: "🏐 In Haikyuu, what position does Hinata Shoyo play?",
            options: ["Middle Blocker", "Setter", "Wing Spiker", "Libero"],
            answer: "Middle Blocker",
            category: "Haikyuu"
        },
        {
            q: "👻 What is the power system in JoJo's Bizarre Adventure?",
            options: ["Stands", "Quirks", "Nen", "Chakra"],
            answer: "Stands",
            category: "JoJo's Bizarre Adventure"
        },
        {
            q: "🔥 In Fairy Tail, what is Natsu's magic type?",
            options: ["Fire Dragon Slayer", "Ice Make", "Sky Dragon Slayer", "Lightning Dragon Slayer"],
            answer: "Fire Dragon Slayer",
            category: "Fairy Tail"
        },
        {
            q: "🧙‍♂️ In One Piece, what is the name of the World Government organization?",
            options: ["Cipher Pol", "Navy", "Marines", "Seven Warlords"],
            answer: "Cipher Pol",
            category: "One Piece"
        },
        {
            q: "🦸‍♂️ In My Hero Academia, what is Katsuki Bakugo's hero name?",
            options: ["King Explosion Murder", "DynaMight", "Great Explosion Murder God Dynamight", "Explosion Boy"],
            answer: "Great Explosion Murder God Dynamight",
            category: "My Hero Academia"
        },
        {
            q: "🐉 In Dragon Ball, what is the name of Goku's first son?",
            options: ["Gohan", "Goten", "Trunks", "Pan"],
            answer: "Gohan",
            category: "Dragon Ball"
        },
        {
            q: "⚔️ In Attack on Titan, who is known as the 'Humanity's Strongest Soldier'?",
            options: ["Levi Ackerman", "Erwin Smith", "Mikasa Ackerman", "Armin Arlert"],
            answer: "Levi Ackerman",
            category: "Attack on Titan"
        },
        {
            q: "📖 In Death Note, what is L's real name?",
            options: ["L Lawliet", "Light Yagami", "Misa Amane", "Near"],
            answer: "L Lawliet",
            category: "Death Note"
        },
        {
            q: "🏃‍♂️ In Naruto, what is the name of the village hidden in the leaves?",
            options: ["Konoha", "Suna", "Kiri", "Iwa"],
            answer: "Konoha",
            category: "Naruto"
        },
        {
            q: "🍖 In One Piece, what is Sanji's dream?",
            options: ["To find the All Blue", "To become Pirate King", "To find a map", "To cook the best meal"],
            answer: "To find the All Blue",
            category: "One Piece"
        },
        {
            q: "🦸‍♀️ In My Hero Academia, what is Ochaco Uraraka's quirk?",
            options: ["Zero Gravity", "Super Strength", "Invisibility", "Telekinesis"],
            answer: "Zero Gravity",
            category: "My Hero Academia"
        },
        {
            q: "🎭 In Hunter x Hunter, what is Gon Freecss's Nen type?",
            options: ["Enhancer", "Transmuter", "Emitter", "Manipulator"],
            answer: "Enhancer",
            category: "Hunter x Hunter"
        },
        {
            q: "🧟 In Attack on Titan, what is the name of the wall that protects humanity?",
            options: ["Wall Maria", "Wall Rose", "Wall Sina", "All of the above"],
            answer: "All of the above",
            category: "Attack on Titan"
        },
        {
            q: "📺 In Sword Art Online, how many players died in the beta test?",
            options: ["2,000", "5,000", "10,000", "None"],
            answer: "2,000",
            category: "Sword Art Online"
        },
        {
            q: "👊 In One Punch Man, what is Saitama's training routine?",
            options: ["100 push-ups, 100 sit-ups, 100 squats, 10km run", "Running 100km", "Lifting weights", "Meditation"],
            answer: "100 push-ups, 100 sit-ups, 100 squats, 10km run",
            category: "One Punch Man"
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
    totalQuestions: 0,
    currentQuestions: [],
    timerId: null,
    timerSeconds: 30,
    lifelines: {
        '50-50': true,
        'phone': true,
        'audience': true,
        'swap': true,
        'hint': true
    },
    gameActive: false,
    settings: {
        sound: true,
        music: true,
        theme: 'classic'
    },
    // New enhancement features
    streak: 0,
    isDoublePointsRound: false,
    achievements: {},
    statistics: {
        gamesPlayed: 0,
        gamesWon: 0,
        totalScore: 0,
        bestStreak: 0,
        questionsAnswered: 0,
        correctAnswers: 0,
        averageTime: 0
    }
};

// DOM Elements
const elements = {
    questionText: document.getElementById('questionText'),
    questionNumber: document.getElementById('questionNumber'),
    questionPrize: document.getElementById('questionPrize'),
    questionTimer: document.getElementById('questionTimer'),
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
    audiencePoll: document.getElementById('audiencePoll'),
    swapQuestion: document.getElementById('swapQuestion')
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
    
    // Apply theme on load
    applyTheme(gameState.settings.theme);
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
    
    // Apply theme immediately
    applyTheme(settings.theme);
    
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
    if (elements.swapQuestion) {
        elements.swapQuestion.addEventListener('click', () => useLifeline('swap'));
    }

    // Keyboard shortcuts: 1-4 for options, F=50-50, P=phone, A=audience, S=swap
    document.addEventListener('keydown', (e) => {
        if (!gameState.gameActive) return;
        const key = e.key.toLowerCase();
        if (['1','2','3','4'].includes(key)) {
            const idx = parseInt(key, 10) - 1;
            const btn = elements.optionsContainer.querySelectorAll('.option-btn')[idx];
            if (btn && !btn.disabled) btn.click();
        } else if (key === 'f') {
            elements.fiftyFifty?.click();
        } else if (key === 'p') {
            elements.phoneFriend?.click();
        } else if (key === 'a') {
            elements.audiencePoll?.click();
        } else if (key === 's') {
            elements.swapQuestion?.click();
        }
    });
    
    // Close modals when clicking outside
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // Leaderboard tab switching
    document.querySelectorAll('.tab-btn').forEach(tab => {
        tab.addEventListener('click', () => {
            const difficulty = tab.dataset.difficulty;

            // Remove active class from all tabs
            document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            tab.classList.add('active');

            // Hide all leaderboard sections
            document.querySelectorAll('.leaderboard-section').forEach(section => {
                section.style.display = 'none';
            });

            // Show selected leaderboard section
            const selectedSection = document.getElementById(`${difficulty}Leaderboard`);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        });
    });
}

// Build Prize Ladder
function buildPrizeLadder() {
    elements.prizeLadder.innerHTML = '';
    const count = gameState.totalQuestions || Math.min(prizes.length, questions[gameState.difficulty].length);
    for (let index = 0; index < count; index++) {
        const prize = prizes[index];
        const ladderItem = document.createElement('div');
        ladderItem.className = 'ladder-item';
        ladderItem.innerHTML = `
            <span>Question ${index + 1}</span>
            <span>₱${prize.toLocaleString()}</span>
        `;
        elements.prizeLadder.appendChild(ladderItem);
    }
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
    
    // Build randomized per-game question set
    const bank = [...questions[gameState.difficulty]];
    shuffleArray(bank);
    gameState.totalQuestions = Math.min(prizes.length, bank.length);
    gameState.currentQuestions = bank.slice(0, gameState.totalQuestions);
    gameState.lifelines = {
        '50-50': true,
        'phone': true,
        'audience': true,
        'swap': true
    };
    
    buildPrizeLadder();
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
    if (gameState.current >= gameState.totalQuestions) {
        endGame(true);
        return;
    }

    // Pick a random question from the remaining pool for this turn
    const randomIndex = gameState.current + Math.floor(Math.random() * (gameState.totalQuestions - gameState.current));
    const temp = gameState.currentQuestions[gameState.current];
    gameState.currentQuestions[gameState.current] = gameState.currentQuestions[randomIndex];
    gameState.currentQuestions[randomIndex] = temp;

    const question = gameState.currentQuestions[gameState.current];
    
    elements.questionNumber.textContent = `Question ${gameState.current + 1}`;
    elements.questionPrize.textContent = `₱${prizes[gameState.current].toLocaleString()}`;
    elements.questionText.textContent = question.q;
    elements.feedbackText.textContent = '';
    
    // Create options
    elements.optionsContainer.innerHTML = '';
    const shuffledOptions = [...question.options];
    shuffleArray(shuffledOptions);
    shuffledOptions.forEach((option) => {
        const optionBtn = document.createElement('button');
        optionBtn.className = 'option-btn';
        optionBtn.textContent = option;
        optionBtn.dataset.option = option;
        optionBtn.addEventListener('click', () => selectAnswer(option));
        elements.optionsContainer.appendChild(optionBtn);
    });
    
    updatePrizeLadder();

    // Start or reset timer
    startTimer();
}

// Select Answer
function selectAnswer(selected) {
    if (!gameState.gameActive) return;
    stopTimer();
    
    const question = gameState.currentQuestions[gameState.current];
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
        // Calculate streak bonus
        gameState.streak++;
        let basePrize = prizes[gameState.current];
        let streakMultiplier = 1;

        if (gameState.streak >= 10) {
            streakMultiplier = 5;
        } else if (gameState.streak >= 5) {
            streakMultiplier = 3;
        } else if (gameState.streak >= 3) {
            streakMultiplier = 2;
        }

        // Apply double points if it's a double points round
        if (gameState.isDoublePointsRound) {
            basePrize *= 2;
            streakMultiplier *= 2;
        }

        const finalPrize = basePrize * streakMultiplier;
        gameState.prize = finalPrize;

        // Update statistics
        gameState.statistics.questionsAnswered++;
        gameState.statistics.correctAnswers++;
        gameState.statistics.totalScore += finalPrize;
        if (gameState.streak > gameState.statistics.bestStreak) {
            gameState.statistics.bestStreak = gameState.streak;
        }

        let streakMessage = '';
        if (streakMultiplier > 1) {
            streakMessage = ` 🔥 ${streakMultiplier}x STREAK BONUS!`;
        }

        elements.feedbackText.textContent = `✅ Correct! You now have ₱${gameState.prize.toLocaleString()}${streakMessage}`;
        elements.feedbackText.style.color = '#00ff00';

        if (gameState.settings.sound) {
            playSound('correct');
        }

        gameState.current++;
        updatePlayerInfo();
        updatePrizeLadder();
        updateStreakDisplay();

        setTimeout(() => {
            if (gameState.gameActive) {
                loadQuestion();
            }
        }, 2000);
    } else {
        // Reset streak on wrong answer
        gameState.streak = 0;
        updateStreakDisplay();

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
    
    const question = gameState.currentQuestions[gameState.current];
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
        case 'swap':
            useSwapQuestion();
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
    
    let remaining = 100 - percentages[correctIndex];
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
    
    // Show audience poll results with visual bars
    let pollResults = "🎯 Audience Poll Results:\n\n";
    question.options.forEach((option, index) => {
        const bar = "█".repeat(Math.floor(percentages[index] / 5));
        pollResults += `${option}: ${percentages[index]}% ${bar}\n`;
    });
    
    showNotification(pollResults, 'info');
}

// Swap Question Lifeline
function useSwapQuestion() {
    // Move current question to the end of the remaining pool and load next
    if (gameState.current >= gameState.totalQuestions) return;
    const currentIdx = gameState.current;
    const swapped = gameState.currentQuestions.splice(currentIdx, 1)[0];
    gameState.currentQuestions.push(swapped);
    showNotification('🔁 Question swapped! New question loaded.', 'info');
    loadQuestion();
}

// Timer Controls
function startTimer() {
    stopTimer();
    gameState.timerSeconds = 30;
    updateTimerUI();
    gameState.timerId = setInterval(() => {
        if (!gameState.gameActive) { stopTimer(); return; }
        gameState.timerSeconds -= 1;
        updateTimerUI();
        if (gameState.timerSeconds <= 0) {
            stopTimer();
            handleTimeout();
        }
    }, 1000);
}

function stopTimer() {
    if (gameState.timerId) {
        clearInterval(gameState.timerId);
        gameState.timerId = null;
    }
}

function updateTimerUI() {
    if (elements.questionTimer) {
        elements.questionTimer.textContent = `⏱️ ${gameState.timerSeconds}`;
        if (gameState.timerSeconds <= 5) {
            elements.questionTimer.style.color = '#ff6b6b';
        } else {
            elements.questionTimer.style.color = '';
        }
    }
}

function handleTimeout() {
    if (!gameState.gameActive) return;
    const question = gameState.currentQuestions[gameState.current];
    const optionButtons = elements.optionsContainer.querySelectorAll('.option-btn');
    optionButtons.forEach(btn => {
        btn.disabled = true;
        if (btn.dataset.option === question.answer) btn.classList.add('correct');
    });
    elements.feedbackText.textContent = '⏰ Time is up!';
    elements.feedbackText.style.color = '#ff0000';
    if (gameState.settings.sound) playSound('incorrect');
    setTimeout(() => endGame(false), 1500);
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
    stopTimer();
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

    // Set the difficulty in the form
    const difficultyInput = document.getElementById('finalDifficulty');
    if (difficultyInput) {
        difficultyInput.value = gameState.difficulty;
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
    stopTimer();
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

// Apply Theme
function applyTheme(theme) {
    const body = document.body;
    
    // Remove existing theme classes
    body.classList.remove('theme-classic', 'theme-dark', 'theme-neon');
    
    // Add new theme class
    body.classList.add(`theme-${theme}`);
    
    // Update CSS custom properties for dynamic theming
    const root = document.documentElement;
    
    switch(theme) {
        case 'dark':
            root.style.setProperty('--primary-bg', 'linear-gradient(135deg, #1a1a2e 0%, #16213e 100%)');
            root.style.setProperty('--secondary-bg', 'rgba(0, 0, 0, 0.9)');
            root.style.setProperty('--accent-color', '#00d4ff');
            root.style.setProperty('--text-color', '#ffffff');
            root.style.setProperty('--button-bg', 'linear-gradient(45deg, #00d4ff, #0099cc)');
            root.style.setProperty('--gold-color', '#00d4ff');
            break;
        case 'neon':
            root.style.setProperty('--primary-bg', 'linear-gradient(135deg, #0f0f23 0%, #1a0a2e 100%)');
            root.style.setProperty('--secondary-bg', 'rgba(0, 0, 0, 0.95)');
            root.style.setProperty('--accent-color', '#ff00ff');
            root.style.setProperty('--text-color', '#ffffff');
            root.style.setProperty('--button-bg', 'linear-gradient(45deg, #ff00ff, #00ffff)');
            root.style.setProperty('--gold-color', '#00ffff');
            break;
        case 'classic':
        default:
            root.style.setProperty('--primary-bg', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)');
            root.style.setProperty('--secondary-bg', 'rgba(0, 0, 0, 0.8)');
            root.style.setProperty('--accent-color', '#ffd700');
            root.style.setProperty('--text-color', '#ffffff');
            root.style.setProperty('--button-bg', 'linear-gradient(45deg, #667eea, #764ba2)');
            root.style.setProperty('--gold-color', '#ffd700');
            break;
    }
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

// Utils
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

// Initialize the game when DOM is loaded
document.addEventListener('DOMContentLoaded', initGame);
