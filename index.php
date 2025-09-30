<?php
// Load scores
$scores = [];
if (file_exists("scores.json")) {
    $scores = json_decode(file_get_contents("scores.json"), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💰 Who Wants to Be a Millionaire? - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-trophy"></i>
                <h1>Who Wants to Be a Millionaire?</h1>
            </div>
            <div class="header-controls">
                <button class="settings-btn" id="settingsBtn">
                    <i class="fas fa-cog"></i>
                    Settings
                </button>
                <button class="leaderboard-btn" id="leaderboardBtn">
                    <i class="fas fa-medal"></i>
                    Leaderboard
                </button>
                <button class="settings-btn" id="achievementsBtn">
                    <i class="fas fa-star"></i>
                    Achievements
                </button>
                <button class="settings-btn" id="dailyChallengeBtn">
                    <i class="fas fa-calendar-day"></i>
                    Daily Challenge
                </button>
                <button class="settings-btn" id="randomEventBtn">
                    <i class="fas fa-bolt"></i>
                    Random Event
                </button>
            </div>
        </div>
    </header>

    <!-- Main Dashboard -->
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="player-info">
                <div class="player-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3 id="playerName">Player</h3>
                <div class="current-score">
                    <span class="score-label">Current Score:</span>
                    <span class="score-value" id="currentScore">₱0</span>
                </div>
                <div class="streak-display" id="streakDisplay">
                    <span class="streak-label">Current Streak:</span>
                    <span class="streak-value" id="streakValue">0 🔥</span>
                </div>
            </div>

            <div class="lifelines">
                <h4>Lifelines</h4>
                <div class="lifeline-grid">
                    <button class="lifeline-btn" id="fiftyFifty" data-lifeline="50-50">
                        <i class="fas fa-cut"></i>
                        <span>50:50</span>
                    </button>
                    <button class="lifeline-btn" id="phoneFriend" data-lifeline="phone">
                        <i class="fas fa-phone"></i>
                        <span>Phone</span>
                    </button>
                    <button class="lifeline-btn" id="audiencePoll" data-lifeline="audience">
                        <i class="fas fa-users"></i>
                        <span>Audience</span>
                    </button>
                    <button class="lifeline-btn" id="swapQuestion" data-lifeline="swap">
                        <i class="fas fa-random"></i>
                        <span>Swap</span>
                    </button>
                </div>
            </div>

            <div class="prize-ladder">
                <h4>Prize Ladder</h4>
                <div class="ladder" id="prizeLadder">
                    <!-- Prize levels will be populated by JavaScript -->
                </div>
            </div>

            <!-- Achievement Bar -->
            <div class="achievement-bar">
                <h4>Achievements</h4>
                <div id="sidebarAchievements">
                    <div class="achievement-bar-item" data-achievement="firstWin">
                        <span class="achievement-icon">🏆</span>
                        <span class="achievement-title">First Win</span>
                    </div>
                    <div class="achievement-bar-item" data-achievement="hotStreak">
                        <span class="achievement-icon">🔥</span>
                        <span class="achievement-title">Hot Streak</span>
                    </div>
                    <div class="achievement-bar-item" data-achievement="millionaire">
                        <span class="achievement-icon">💰</span>
                        <span class="achievement-title">Millionaire</span>
                    </div>
                    <div class="achievement-bar-item" data-achievement="animeMaster">
                        <span class="achievement-icon">🎌</span>
                        <span class="achievement-title">Anime Master</span>
                    </div>
                    <div class="achievement-bar-item" data-achievement="under1Sec">
                        <span class="achievement-icon">⚡</span>
                        <span class="achievement-title">Finish Under 1 Second</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Game Area -->
        <main class="game-area">
            <div class="game-container">
                <div class="question-container">
                    <div class="question-header">
                        <span class="question-number" id="questionNumber">Question 1</span>
                        <span class="question-prize" id="questionPrize">₱1,000</span>
                        <span class="question-timer" id="questionTimer">⏱️ 30</span>
                    </div>
                    <div class="question-category" id="questionCategory">Category: General Knowledge</div>
                    <div class="question-text" id="questionText">Loading question...</div>
                </div>

                <div class="options-container" id="optionsContainer">
                    <!-- Options will be populated by JavaScript -->
                </div>

                <div class="feedback-container" id="feedbackContainer">
                    <div class="feedback-text" id="feedbackText"></div>
                </div>

                <div class="game-controls">
                    <button class="control-btn" id="startGameBtn">
                        <i class="fas fa-play"></i>
                        Start New Game
                    </button>
                    <button class="control-btn" id="pauseGameBtn" style="display: none;">
                        <i class="fas fa-pause"></i>
                        Pause Game
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- Settings Modal -->
    <div class="modal" id="settingsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-cog"></i> Game Settings</h2>
                <button class="close-btn" id="closeSettings">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="setting-group">
                    <label for="playerNameInput">Player Name:</label>
                    <input type="text" id="playerNameInput" placeholder="Enter your name">
                </div>
                <div class="setting-group">
                    <label for="difficultySelect">Difficulty:</label>
                    <select id="difficultySelect">
                        <option value="easy">Easy</option>
                        <option value="medium" selected>Medium</option>
                        <option value="hard">Hard</option>
                        <option value="animeEdition">Anime Edition</option>
                    </select>
                </div>
                <div class="setting-group">
                    <label for="categorySelect">Category:</label>
                    <select id="categorySelect">
                        <option value="general" selected>General Knowledge</option>
                        <option value="science">Science</option>
                        <option value="history">History</option>
                        <option value="sports">Sports</option>
                        <option value="anime">Anime</option>
                        <!-- Add more categories as needed -->
                    </select>
                </div>
                <div class="setting-group">
                    <label for="soundToggle">Sound Effects:</label>
                    <input type="checkbox" id="soundToggle" checked>
                </div>
                <div class="setting-group">
                    <label for="musicToggle">Background Music:</label>
                    <input type="checkbox" id="musicToggle" checked>
                </div>
                <div class="setting-group">
                    <label for="themeSelect">Theme:</label>
                    <select id="themeSelect">
                        <option value="classic" selected>Classic</option>
                        <option value="dark">Dark</option>
                        <option value="neon">Neon</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="saveSettings">Save Settings</button>
                <button class="btn btn-secondary" id="resetSettings">Reset to Default</button>
            </div>
        </div>
    </div>

    <!-- Leaderboard Modal -->
    <div class="modal" id="leaderboardModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-medal"></i> Leaderboard</h2>
                <button class="close-btn" id="closeLeaderboard">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Difficulty Tabs -->
                <div class="difficulty-tabs">
                <button class="tab-btn active" data-difficulty="easy">Easy</button>
                <button class="tab-btn" data-difficulty="medium">Medium</button>
                <button class="tab-btn" data-difficulty="hard">Hard</button>
                <button class="tab-btn" data-difficulty="animeEdition">Anime Edition</button>
            </div>

            <!-- Easy Leaderboard -->
            <div class="leaderboard-section" id="easyLeaderboard">
                <h3>🥉 Easy Difficulty</h3>
                <div class="leaderboard-list">
                    <?php
                    if (!empty($scores['easy'])) {
                        arsort($scores['easy']);
                        $rank = 1;
                        foreach ($scores['easy'] as $player => $score) {
                            $medal = $rank <= 3 ? ['🥇', '🥈', '🥉'][$rank-1] : $rank;
                            echo "<div class='leaderboard-item rank-$rank'>";
                            echo "<span class='rank'>$medal</span>";
                            echo "<span class='player'>$player</span>";
                            echo "<span class='score'>₱" . number_format($score) . "</span>";
                            echo "</div>";
                            $rank++;
                        }
                    } else {
                        echo "<div class='no-scores'>No scores yet for Easy difficulty.</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Medium Leaderboard -->
            <div class="leaderboard-section" id="mediumLeaderboard" style="display: none;">
                <h3>🥈 Medium Difficulty</h3>
                <div class="leaderboard-list">
                    <?php
                    if (!empty($scores['medium'])) {
                        arsort($scores['medium']);
                        $rank = 1;
                        foreach ($scores['medium'] as $player => $score) {
                            $medal = $rank <= 3 ? ['🥇', '🥈', '🥉'][$rank-1] : $rank;
                            echo "<div class='leaderboard-item rank-$rank'>";
                            echo "<span class='rank'>$medal</span>";
                            echo "<span class='player'>$player</span>";
                            echo "<span class='score'>₱" . number_format($score) . "</span>";
                            echo "</div>";
                            $rank++;
                        }
                    } else {
                        echo "<div class='no-scores'>No scores yet for Medium difficulty.</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Hard Leaderboard -->
            <div class="leaderboard-section" id="hardLeaderboard" style="display: none;">
                <h3>🥇 Hard Difficulty</h3>
                <div class="leaderboard-list">
                    <?php
                    if (!empty($scores['hard'])) {
                        arsort($scores['hard']);
                        $rank = 1;
                        foreach ($scores['hard'] as $player => $score) {
                            $medal = $rank <= 3 ? ['🥇', '🥈', '🥉'][$rank-1] : $rank;
                            echo "<div class='leaderboard-item rank-$rank'>";
                            echo "<span class='rank'>$medal</span>";
                            echo "<span class='player'>$player</span>";
                            echo "<span class='score'>₱" . number_format($score) . "</span>";
                            echo "</div>";
                            $rank++;
                        }
                    } else {
                        echo "<div class='no-scores'>No scores yet for Hard difficulty.</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Anime Edition Leaderboard -->
            <div class="leaderboard-section" id="animeEditionLeaderboard" style="display: none;">
                <h3>🎌 Anime Edition</h3>
                <div class="leaderboard-list">
                    <?php
                    if (!empty($scores['animeEdition'])) {
                        arsort($scores['animeEdition']);
                        $rank = 1;
                        foreach ($scores['animeEdition'] as $player => $score) {
                            $medal = $rank <= 3 ? ['🥇', '🥈', '🥉'][$rank-1] : $rank;
                            echo "<div class='leaderboard-item rank-$rank'>";
                            echo "<span class='rank'>$medal</span>";
                            echo "<span class='player'>$player</span>";
                            echo "<span class='score'>₱" . number_format($score) . "</span>";
                            echo "</div>";
                            $rank++;
                        }
                    } else {
                        echo "<div class='no-scores'>No scores yet for Anime Edition.</div>";
                    }
                    ?>
                </div>
            </div>
            </div>
        </div>
    </div>

            <!-- Game Over Modal -->
            <div class="modal" id="gameOverModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 id="gameOverTitle">Game Over!</h2>
                        <button class="close-btn" id="closeGameOver">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="game-over-content">
                            <div class="final-score">
                                <h3>Final Score: <span id="finalScoreDisplay">₱0</span></h3>
                            </div>
                            <form id="saveScoreForm" method="POST" action="save_score.php">
                                <input type="hidden" name="score" id="finalScore">
                                <input type="hidden" name="difficulty" id="finalDifficulty">
                                <div class="input-group">
                                    <input type="text" name="player" id="playerNameSave" placeholder="Enter your name" required>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Save Score
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Achievements Modal -->
    <div class="modal" id="achievementsModal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-star"></i> Achievements</h2>
                <button class="close-btn" id="closeAchievements">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="achievements-list" id="achievementsList">
                    <div class="achievement-item" data-achievement="firstWin">
                        <span class="achievement-icon">🏆</span>
                        <span class="achievement-title">First Win</span>
                        <span class="achievement-desc">Win your first game.</span>
                    </div>
                    <div class="achievement-item" data-achievement="hotStreak">
                        <span class="achievement-icon">🔥</span>
                        <span class="achievement-title">Hot Streak</span>
                        <span class="achievement-desc">Answer 5 questions correctly in a row.</span>
                    </div>
                    <div class="achievement-item" data-achievement="millionaire">
                        <span class="achievement-icon">💰</span>
                        <span class="achievement-title">Millionaire</span>
                        <span class="achievement-desc">Reach ₱1,000,000.</span>
                    </div>
                    <div class="achievement-item" data-achievement="animeMaster">
                        <span class="achievement-icon">🎌</span>
                        <span class="achievement-title">Anime Master</span>
                        <span class="achievement-desc">Win Anime Edition.</span>
                    </div>
                    <div class="achievement-item" data-achievement="under1Sec">
                        <span class="achievement-icon">⚡</span>
                        <span class="achievement-title">Finish Under 1 Second</span>
                        <span class="achievement-desc">Answer a question in under 1 second.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Achievement Popup -->
    <div id="achievementPopup" style="display:none;position:fixed;top:20px;right:20px;z-index:9999;background:#222;color:#fff;padding:16px 24px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.2);font-size:18px;">
        <span id="achievementPopupIcon"></span>
        <span id="achievementPopupText"></span>
    </div>

    <!-- Daily Challenge Modal -->
    <div class="modal" id="dailyChallengeModal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-calendar-day"></i> Daily Challenge</h2>
                <button class="close-btn" id="closeDailyChallenge">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="dailyChallengeContent">
                    <p>Today's challenge: Answer 10 questions correctly in any category!</p>
                    <button class="btn btn-primary" id="startDailyChallengeBtn">Start Challenge</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Random Event Modal -->
    <div class="modal" id="randomEventModal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-bolt"></i> Random Event</h2>
                <button class="close-btn" id="closeRandomEvent">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="randomEventContent">
                    <p id="randomEventText">A surprise event appears! Double points for the next question!</p>
                </div>
            </div>
        </div>
    </div>

    <script src="questions.js"></script>
    <script>
    // Utility to show/hide modals
    function showModal(id) {
        document.getElementById(id).style.display = 'block';
        document.body.classList.add('modal-open');
    }
    function hideModal(id) {
        document.getElementById(id).style.display = 'none';
        document.body.classList.remove('modal-open');
    }

    // Achievements modal logic
    document.getElementById('achievementsBtn').onclick = function() {
        showModal('achievementsModal');
    };
    document.getElementById('closeAchievements').onclick = function() {
        hideModal('achievementsModal');
    };

    // Daily Challenge modal logic
    document.getElementById('dailyChallengeBtn').onclick = function() {
        showModal('dailyChallengeModal');
    };
    document.getElementById('closeDailyChallenge').onclick = function() {
        hideModal('dailyChallengeModal');
    };
    document.getElementById('startDailyChallengeBtn').onclick = function() {
        hideModal('dailyChallengeModal');
        // Start daily challenge logic here
        alert('Daily Challenge started! Try to answer 10 questions correctly!');
        // You can trigger your game logic here
    };

    // Random Event modal logic
    document.getElementById('randomEventBtn').onclick = function() {
        // Pick a random event for fun
        const events = [
            "Double points for the next question!",
            "Lose a lifeline!",
            "Instant bonus: ₱5,000!",
            "Skip the next question for free!",
            "Triple points for the next correct answer!"
        ];
        const eventText = events[Math.floor(Math.random() * events.length)];
        document.getElementById('randomEventText').innerText = eventText;
        showModal('randomEventModal');
    };
    document.getElementById('closeRandomEvent').onclick = function() {
        hideModal('randomEventModal');
    };

    // Modal close on overlay click and ESC key
    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            document.querySelectorAll('.modal').forEach(function(modal) {
                modal.style.display = 'none';
            });
            document.body.classList.remove('modal-open');
        }
    });

    // Difficulty tab logic
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const difficulty = this.getAttribute('data-difficulty');
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            document.querySelectorAll('.leaderboard-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(difficulty + 'Leaderboard').style.display = 'block';
        });
    });

    // Save settings logic
    document.getElementById('saveSettings').onclick = function() {
        const playerName = document.getElementById('playerNameInput').value;
        const difficulty = document.getElementById('difficultySelect').value;
        const category = document.getElementById('categorySelect').value;
        const soundEnabled = document.getElementById('soundToggle').checked;
        const musicEnabled = document.getElementById('musicToggle').checked;
        const theme = document.getElementById('themeSelect').value;

        // Save to localStorage (or send to server)
        localStorage.setItem('playerName', playerName);
        localStorage.setItem('difficulty', difficulty);
        localStorage.setItem('category', category);
        localStorage.setItem('soundEnabled', soundEnabled);
        localStorage.setItem('musicEnabled', musicEnabled);
        localStorage.setItem('theme', theme);

        // Close modal
        document.getElementById('settingsModal').style.display = 'none';

        // Update UI immediately
        document.getElementById('playerName').innerText = playerName;
        // Difficulty and category will be applied when starting a new game
    };

    // Reset settings logic
    document.getElementById('resetSettings').onclick = function() {
        // Reset to default values
        document.getElementById('playerNameInput').value = '';
        document.getElementById('difficultySelect').value = 'medium';
        document.getElementById('categorySelect').value = 'general';
        document.getElementById('soundToggle').checked = true;
        document.getElementById('musicToggle').checked = true;
        document.getElementById('themeSelect').value = 'classic';
    };

    // Sample questions for each category and difficulty
    const questions = {
        // -------------------- GENERAL KNOWLEDGE --------------------
        general: {
            // Easy
            easy: [
                // General Knowledge - Easy
                { q: "What is the capital of France?", options: ["Paris", "London", "Berlin", "Madrid"], answer: 0 },
                { q: "Which planet is known as the Red Planet?", options: ["Earth", "Mars", "Jupiter", "Venus"], answer: 1 },
                { q: "What color do you get when you mix red and white?", options: ["Pink", "Purple", "Orange", "Brown"], answer: 0 },
                { q: "How many continents are there?", options: ["5", "6", "7", "8"], answer: 2 },
                { q: "Which animal is known as man's best friend?", options: ["Cat", "Dog", "Horse", "Rabbit"], answer: 1 }
            ],
            // Medium
            medium: [
                // General Knowledge - Medium
                { q: "Who wrote 'Romeo and Juliet'?", options: ["Shakespeare", "Dickens", "Hemingway", "Twain"], answer: 0 },
                { q: "What is the largest ocean on Earth?", options: ["Atlantic", "Indian", "Pacific", "Arctic"], answer: 2 },
                { q: "Which country invented pizza?", options: ["France", "Italy", "USA", "Greece"], answer: 1 },
                { q: "What is the boiling point of water in Celsius?", options: ["90", "100", "110", "120"], answer: 1 },
                { q: "What is the main ingredient in guacamole?", options: ["Tomato", "Avocado", "Potato", "Carrot"], answer: 1 }
            ],
            // Hard
            hard: [
                // General Knowledge - Hard
                { q: "What is the smallest prime number?", options: ["1", "2", "3", "5"], answer: 1 },
                { q: "Which element has the chemical symbol 'Fe'?", options: ["Gold", "Iron", "Silver", "Lead"], answer: 1 },
                { q: "Who painted the Mona Lisa?", options: ["Van Gogh", "Picasso", "Da Vinci", "Rembrandt"], answer: 2 },
                { q: "What is the capital of Mongolia?", options: ["Astana", "Ulaanbaatar", "Tashkent", "Bishkek"], answer: 1 },
                { q: "Which planet has the most moons?", options: ["Earth", "Jupiter", "Saturn", "Mars"], answer: 2 }
            ]
        },
        // -------------------- SCIENCE --------------------
        science: {
            // Easy
            easy: [
                // Science - Easy
                { q: "What is H2O commonly known as?", options: ["Oxygen", "Hydrogen", "Water", "Salt"], answer: 2 },
                { q: "What do bees collect from flowers?", options: ["Honey", "Nectar", "Pollen", "Seeds"], answer: 2 },
                { q: "What is the freezing point of water?", options: ["0°C", "10°C", "32°C", "100°C"], answer: 0 },
                { q: "Which organ pumps blood?", options: ["Liver", "Heart", "Lung", "Kidney"], answer: 1 },
                { q: "What gas do plants breathe in?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"], answer: 1 }
            ],
            // Medium
            medium: [
                // Science - Medium
                { q: "What planet is closest to the sun?", options: ["Venus", "Mercury", "Mars", "Earth"], answer: 1 },
                { q: "What is the largest mammal?", options: ["Elephant", "Blue Whale", "Giraffe", "Hippopotamus"], answer: 1 },
                { q: "What is the process by which plants make food?", options: ["Respiration", "Photosynthesis", "Digestion", "Fermentation"], answer: 1 },
                { q: "Which vitamin is produced when sunlight hits the skin?", options: ["A", "B", "C", "D"], answer: 3 },
                { q: "What is the hardest natural substance?", options: ["Gold", "Iron", "Diamond", "Quartz"], answer: 2 }
            ],
            // Hard
            hard: [
                // Science - Hard
                { q: "What is the chemical symbol for gold?", options: ["Au", "Ag", "Gd", "Go"], answer: 0 },
                { q: "What is the speed of light?", options: ["300,000 km/s", "150,000 km/s", "1,000 km/s", "30,000 km/s"], answer: 0 },
                { q: "Who developed the theory of relativity?", options: ["Newton", "Einstein", "Tesla", "Curie"], answer: 1 },
                { q: "What is the powerhouse of the cell?", options: ["Nucleus", "Mitochondria", "Ribosome", "Chloroplast"], answer: 1 },
                { q: "What is the main gas in Earth's atmosphere?", options: ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"], answer: 1 }
            ]
        },
        // -------------------- HISTORY --------------------
        history: {
            // Easy
            easy: [
                // History - Easy
                { q: "Who was the first President of the USA?", options: ["Lincoln", "Washington", "Jefferson", "Adams"], answer: 1 },
                { q: "What year did World War II end?", options: ["1945", "1939", "1918", "1965"], answer: 0 },
                { q: "Who discovered America?", options: ["Columbus", "Magellan", "Cook", "Vespucci"], answer: 0 },
                { q: "Which ancient civilization built the pyramids?", options: ["Romans", "Egyptians", "Greeks", "Mayans"], answer: 1 },
                { q: "Who was known as the Maid of Orléans?", options: ["Cleopatra", "Joan of Arc", "Elizabeth I", "Marie Curie"], answer: 1 }
            ],
            // Medium
            medium: [
                // History - Medium
                { q: "In which year did WWII end?", options: ["1945", "1939", "1918", "1965"], answer: 0 },
                { q: "Who was the British Prime Minister during WWII?", options: ["Churchill", "Thatcher", "Blair", "Cameron"], answer: 0 },
                { q: "Which empire was ruled by Julius Caesar?", options: ["Greek", "Roman", "Ottoman", "Persian"], answer: 1 },
                { q: "Who was the first man on the moon?", options: ["Buzz Aldrin", "Neil Armstrong", "Yuri Gagarin", "John Glenn"], answer: 1 },
                { q: "Where did the Renaissance begin?", options: ["France", "Italy", "Germany", "Spain"], answer: 1 }
            ],
            // Hard
            hard: [
                // History - Hard
                { q: "Who discovered America?", options: ["Columbus", "Magellan", "Cook", "Vespucci"], answer: 0 },
                { q: "Who was the longest reigning British monarch?", options: ["Victoria", "Elizabeth II", "George III", "Henry VIII"], answer: 1 },
                { q: "Which treaty ended WWI?", options: ["Versailles", "Tordesillas", "Paris", "Vienna"], answer: 0 },
                { q: "Who was the first emperor of China?", options: ["Qin Shi Huang", "Kublai Khan", "Sun Tzu", "Confucius"], answer: 0 },
                { q: "What year did the Berlin Wall fall?", options: ["1989", "1991", "1980", "1975"], answer: 0 }
            ]
        },
        // -------------------- SPORTS --------------------
        sports: {
            // Easy
            easy: [
                // Sports - Easy
                { q: "How many players in a soccer team?", options: ["9", "10", "11", "12"], answer: 2 },
                { q: "What sport uses a puck?", options: ["Football", "Basketball", "Hockey", "Tennis"], answer: 2 },
                { q: "Which sport is Serena Williams famous for?", options: ["Golf", "Tennis", "Soccer", "Swimming"], answer: 1 },
                { q: "How many bases in baseball?", options: ["2", "3", "4", "5"], answer: 2 },
                { q: "What color is the center of a target in archery?", options: ["Red", "Blue", "Yellow", "Green"], answer: 2 }
            ],
            // Medium
            medium: [
                // Sports - Medium
                { q: "Which country won the FIFA World Cup in 2018?", options: ["Brazil", "France", "Germany", "Argentina"], answer: 1 },
                { q: "How many rings are on the Olympic flag?", options: ["3", "4", "5", "6"], answer: 2 },
                { q: "What is the national sport of Japan?", options: ["Karate", "Sumo", "Judo", "Baseball"], answer: 1 },
                { q: "Which sport is known as the 'king of sports'?", options: ["Basketball", "Soccer", "Tennis", "Cricket"], answer: 1 },
                { q: "Who holds the record for most Olympic gold medals?", options: ["Usain Bolt", "Michael Phelps", "Simone Biles", "Carl Lewis"], answer: 1 }
            ],
            // Hard
            hard: [
                // Sports - Hard
                { q: "What is the maximum score in a single frame of bowling?", options: ["30", "20", "10", "40"], answer: 0 },
                { q: "Which country hosted the first modern Olympics?", options: ["France", "USA", "Greece", "Italy"], answer: 2 },
                { q: "How many players are on a rugby union team?", options: ["11", "13", "15", "18"], answer: 2 },
                { q: "Who won the NBA MVP in 2021?", options: ["LeBron James", "Nikola Jokic", "Stephen Curry", "Giannis Antetokounmpo"], answer: 1 },
                { q: "Which tennis tournament is played on clay?", options: ["Wimbledon", "US Open", "French Open", "Australian Open"], answer: 2 }
            ]
        },
        // -------------------- ANIME --------------------
        anime: {
            // Easy
            easy: [
                // Anime - Easy
                { q: "Who is the main character in Naruto?", options: ["Sasuke", "Naruto", "Sakura", "Kakashi"], answer: 1 },
                { q: "What is Pikachu's type?", options: ["Fire", "Water", "Electric", "Grass"], answer: 2 },
                { q: "Which anime features a notebook that kills?", options: ["Death Note", "Bleach", "Naruto", "One Piece"], answer: 0 },
                { q: "Who is the captain of the Straw Hat Pirates?", options: ["Zoro", "Luffy", "Sanji", "Nami"], answer: 1 },
                { q: "What is the name of Goku's son?", options: ["Vegeta", "Gohan", "Trunks", "Krillin"], answer: 1 }
            ],
            // Medium
            medium: [
                // Anime - Medium
                { q: "What is the name of the pirate crew in One Piece?", options: ["Straw Hat", "Blackbeard", "Red Hair", "Heart"], answer: 0 },
                { q: "Who is the main antagonist in Death Note?", options: ["L", "Light", "Ryuk", "Misa"], answer: 1 },
                { q: "Which anime features Titans attacking humanity?", options: ["Attack on Titan", "Bleach", "Naruto", "Fairy Tail"], answer: 0 },
                { q: "Who is the creator of My Hero Academia?", options: ["Horikoshi", "Oda", "Toriyama", "Kishimoto"], answer: 0 },
                { q: "What is the name of the ninja village in Naruto?", options: ["Sand", "Leaf", "Mist", "Cloud"], answer: 1 }
            ],
            // Hard
            hard: [
                // Anime - Hard
                { q: "Who created Dragon Ball?", options: ["Akira Toriyama", "Eiichiro Oda", "Masashi Kishimoto", "Yoshihiro Togashi"], answer: 0 },
                { q: "What is the real name of 'L' in Death Note?", options: ["Light Yagami", "L Lawliet", "Ryuk", "Near"], answer: 1 },
                { q: "Which anime is set in Neo-Tokyo?", options: ["Akira", "Naruto", "Bleach", "One Piece"], answer: 0 },
                { q: "Who is the main character in Code Geass?", options: ["Suzaku", "Lelouch", "C.C.", "Kallen"], answer: 1 },
                { q: "What is the name of the alchemist brothers in Fullmetal Alchemist?", options: ["Elric", "Rockbell", "Armstrong", "Bradley"], answer: 0 }
            ]
        }
    };

    // Ensure all categories exist
    function ensureCategoryQuestions(category, difficulty) {
        if (!questions[category]) {
            questions[category] = {};
        }
        if (!questions[category][difficulty]) {
            // Add a default question if missing
            questions[category][difficulty] = [
                { q: `Default question for ${category} (${difficulty})`, options: ["A", "B", "C", "D"], answer: 0 }
            ];
        }
    }

    // Filter questions by category and difficulty
    function getFilteredQuestions(category, difficulty) {
        ensureCategoryQuestions(category, difficulty);
        return questions[category][difficulty];
    }

    // Track current question index and filtered questions
    let filteredQuestions = [];
    let currentQuestionIndex = 0;

    // Load question and display it
    function loadQuestion(questionNumber, difficulty, category) {
        filteredQuestions = getFilteredQuestions(category, difficulty);
        currentQuestionIndex = questionNumber - 1;
        if (currentQuestionIndex >= filteredQuestions.length) {
            // End game if no more questions
            onGameEnd(
                parseInt(document.getElementById('currentScore').innerText.replace(/[^\d]/g, '')) || 0,
                difficulty,
                category
            );
            return;
        }
        const qObj = filteredQuestions[currentQuestionIndex];
        document.getElementById('questionNumber').innerText = 'Question ' + questionNumber;
        document.getElementById('questionPrize').innerText = '₱' + (questionNumber * 1000);
        document.getElementById('questionCategory').innerText = 'Category: ' + category.charAt(0).toUpperCase() + category.slice(1);
        document.getElementById('questionText').innerText = qObj.q;

        // Render options
        const optionsContainer = document.getElementById('optionsContainer');
        optionsContainer.innerHTML = '';
        qObj.options.forEach((opt, idx) => {
            const btn = document.createElement('button');
            btn.className = 'option-btn';
            btn.innerText = opt;
            btn.onclick = function() { onAnswerSelected(idx); };
            optionsContainer.appendChild(btn);
        });

        // Start timer for achievement
        questionStartTime = Date.now();
    }

    // Handle answer selection
    // Fix: Move to next question if correct, show game over if wrong
    function onAnswerSelected(selectedIdx) {
        const qObj = filteredQuestions[currentQuestionIndex];
        const isCorrect = selectedIdx === qObj.answer;
        const feedbackText = document.getElementById('feedbackText');
        if (isCorrect) {
            feedbackText.innerText = "Correct!";
            // Update score and streak
            let score = parseInt(document.getElementById('currentScore').innerText.replace(/[^\d]/g, '')) || 0;
            score += (currentQuestionIndex + 1) * 1000;
            document.getElementById('currentScore').innerText = '₱' + score;
            let streak = parseInt(document.getElementById('streakValue').innerText) || 0;
            streak += 1;
            document.getElementById('streakValue').innerText = streak + " 🔥";
            // Achievements
            const answerTime = (Date.now() - questionStartTime) / 1000;
            if (answerTime < 1) unlockAchievement('under1Sec');
            if (streak >= 5) unlockAchievement('hotStreak');
            // Move to next question after short delay
            setTimeout(() => {
                feedbackText.innerText = "";
                // FIX: Move to next question (increment by 1)
                loadQuestion(currentQuestionIndex + 2, localStorage.getItem('difficulty') || 'medium', localStorage.getItem('category') || 'general');
            }, 1000);
        } else {
            feedbackText.innerText = "Wrong!";
            // Reset streak
            document.getElementById('streakValue').innerText = "0 🔥";
            // Game over after short delay
            setTimeout(() => {
                feedbackText.innerText = "";
                onGameEnd(
                    parseInt(document.getElementById('currentScore').innerText.replace(/[^\d]/g, '')) || 0,
                    localStorage.getItem('difficulty') || 'medium',
                    localStorage.getItem('category') || 'general'
                );
            }, 1000);
        }
    }

    // End game logic
    function onGameEnd(finalScore, difficulty, category) {
        if (finalScore > 0) unlockAchievement('firstWin');
        if (finalScore >= 1000000) unlockAchievement('millionaire');
        if (difficulty === 'animeEdition' && finalScore > 0) unlockAchievement('animeMaster');
        document.getElementById('finalScoreDisplay').innerText = '₱' + finalScore;
        document.getElementById('finalScore').value = finalScore;
        document.getElementById('finalDifficulty').value = difficulty;
        showModal('gameOverModal');
    }

    // Start game button logic
    document.getElementById('startGameBtn').onclick = function() {
        // Get settings from the settings modal (not just localStorage)
        const playerName = document.getElementById('playerNameInput').value || localStorage.getItem('playerName') || 'Player';
        const difficulty = document.getElementById('difficultySelect').value || localStorage.getItem('difficulty') || 'medium';
        const category = document.getElementById('categorySelect').value || localStorage.getItem('category') || 'general';

        // Save current settings to localStorage for consistency
        localStorage.setItem('playerName', playerName);
        localStorage.setItem('difficulty', difficulty);
        localStorage.setItem('category', category);

        // Update UI
        document.getElementById('playerName').innerText = playerName;
        document.getElementById('difficultySelect').value = difficulty;
        document.getElementById('categorySelect').value = category;
        document.getElementById('currentScore').innerText = '₱0';
        document.getElementById('streakValue').innerText = '0 🔥';

        // Load first question using selected category and difficulty
        loadQuestion(1, difficulty, category);
    };

    // Achievements logic
    const achievements = {
        firstWin: { icon: "🏆", title: "First Win", desc: "Win your first game." },
        hotStreak: { icon: "🔥", title: "Hot Streak", desc: "Answer 5 questions correctly in a row." },
        millionaire: { icon: "💰", title: "Millionaire", desc: "Reach ₱1,000,000." },
        animeMaster: { icon: "🎌", title: "Anime Master", desc: "Win Anime Edition." },
        under1Sec: { icon: "⚡", title: "Finish Under 1 Second", desc: "Answer a question in under 1 second." }
    };

    function getAchievements() {
        return JSON.parse(localStorage.getItem('achievements') || '{}');
    }
    function setAchievements(obj) {
        localStorage.setItem('achievements', JSON.stringify(obj));
    }

    function updateAchievementBar() {
        const unlocked = getAchievements();
        document.querySelectorAll('.achievement-bar-item').forEach(item => {
            const key = item.getAttribute('data-achievement');
            if (unlocked[key]) {
                item.classList.add('unlocked');
                item.style.filter = 'none';
                item.style.opacity = '1';
            } else {
                item.classList.remove('unlocked');
                item.style.filter = 'grayscale(1)';
                item.style.opacity = '0.5';
            }
        });
    }
    function updateAchievementsModal() {
        const unlocked = getAchievements();
        document.querySelectorAll('.achievement-item').forEach(item => {
            const key = item.getAttribute('data-achievement');
            if (unlocked[key]) {
                item.classList.add('unlocked');
                item.style.filter = 'none';
                item.style.opacity = '1';
            } else {
                item.classList.remove('unlocked');
                item.style.filter = 'grayscale(1)';
                item.style.opacity = '0.5';
            }
        });
    }
    function unlockAchievement(key) {
        const unlocked = getAchievements();
        if (!unlocked[key]) {
            unlocked[key] = true;
            setAchievements(unlocked);
            updateAchievementBar();
            updateAchievementsModal();
            showAchievementPopup(key);
        }
    }
    function showAchievementPopup(key) {
        const ach = achievements[key];
        document.getElementById('achievementPopupIcon').innerText = ach.icon;
        document.getElementById('achievementPopupText').innerText = `Achievement Unlocked: ${ach.title}`;
        const popup = document.getElementById('achievementPopup');
        popup.style.display = 'block';
        setTimeout(() => { popup.style.display = 'none'; }, 2500);
    }

    // Call on page load
    updateAchievementBar();
    updateAchievementsModal();

    // Example integration: unlock "Finish Under 1 Second" when answering a question quickly
    // Replace this with your real question timer logic
    let questionStartTime = null;
    function loadQuestion(questionNumber, difficulty, category) {
        // ...existing code...
        questionStartTime = Date.now();
        // ...existing code...
    }
    // Call this when player answers a question
    function onAnswerSelected() {
        // ...existing code...
        const answerTime = (Date.now() - questionStartTime) / 1000;
        if (answerTime < 1) unlockAchievement('under1Sec');
        // Example: unlock hotStreak if streakValue >= 5
        if (parseInt(document.getElementById('streakValue').innerText) >= 5) unlockAchievement('hotStreak');
        // ...existing code...
    }
    // Example: unlock firstWin and millionaire at game end
    function onGameEnd(finalScore, difficulty, category) {
        if (finalScore > 0) unlockAchievement('firstWin');
        if (finalScore >= 1000000) unlockAchievement('millionaire');
        if (difficulty === 'animeEdition' && finalScore > 0) unlockAchievement('animeMaster');
    }

    // Listen for changes to category or difficulty in the settings modal
    document.getElementById('categorySelect').addEventListener('change', function() {
        updatePreviewQuestion();
    });
    document.getElementById('difficultySelect').addEventListener('change', function() {
        updatePreviewQuestion();
    });

    // Preview the first question for the selected category/difficulty in the settings modal (optional UX)
    function updatePreviewQuestion() {
        const category = document.getElementById('categorySelect').value;
        const difficulty = document.getElementById('difficultySelect').value;
        const previewQuestions = getFilteredQuestions(category, difficulty);
        if (previewQuestions.length > 0) {
            document.getElementById('questionText').innerText = previewQuestions[0].q;
            document.getElementById('questionCategory').innerText = 'Category: ' + category.charAt(0).toUpperCase() + category.slice(1);
            document.getElementById('questionNumber').innerText = 'Question 1';
            document.getElementById('questionPrize').innerText = '₱1,000';
            // Optionally show options for preview
            const optionsContainer = document.getElementById('optionsContainer');
            optionsContainer.innerHTML = '';
            previewQuestions[0].options.forEach((opt, idx) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn preview';
                btn.innerText = opt;
                btn.disabled = true;
                optionsContainer.appendChild(btn);
            });
        }
    }

    // When starting a new game, always use the selected category/difficulty from the modal
    document.getElementById('startGameBtn').onclick = function() {
        const playerName = document.getElementById('playerNameInput').value || localStorage.getItem('playerName') || 'Player';
        const difficulty = document.getElementById('difficultySelect').value || localStorage.getItem('difficulty') || 'medium';
        const category = document.getElementById('categorySelect').value || localStorage.getItem('category') || 'general';

        localStorage.setItem('playerName', playerName);
        localStorage.setItem('difficulty', difficulty);
        localStorage.setItem('category', category);

        document.getElementById('playerName').innerText = playerName;
        document.getElementById('difficultySelect').value = difficulty;
        document.getElementById('categorySelect').value = category;
        document.getElementById('currentScore').innerText = '₱0';
        document.getElementById('streakValue').innerText = '0 🔥';

        // Load first question using selected category and difficulty
        loadQuestion(1, difficulty, category);
    };

    // The loadQuestion function already displays only questions for the selected category/difficulty
    // It uses getFilteredQuestions(category, difficulty) which is correct

    </script>
    <style>
    /* Achievement bar styling */
    .achievement-bar {
        margin-top: 24px;
        background: #222;
        border-radius: 8px;
        padding: 12px;
        color: #fff;
    }
    .achievement-bar-item {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        opacity: 0.5;
        filter: grayscale(1);
        transition: opacity 0.3s, filter 0.3s;
    }
    .achievement-bar-item.unlocked {
        opacity: 1;
        filter: none;
    }
    .achievement-bar-item .achievement-icon {
        font-size: 22px;
        margin-right: 8px;
    }
    .achievement-bar-item .achievement-title {
        font-size: 15px;
    }
    /* Achievements modal styling */
    .achievement-item {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
        opacity: 0.5;
        filter: grayscale(1);
        transition: opacity 0.3s, filter 0.3s;
    }
    .achievement-item.unlocked {
        opacity: 1;
        filter: none;
    }
    .achievement-item .achievement-icon {
        font-size: 28px;
        margin-right: 12px;
    }
    .achievement-item .achievement-title {
        font-size: 18px;
        margin-right: 8px;
    }
    .achievement-item .achievement-desc {
        font-size: 14px;
        color: #ccc;
    }
    </style>
</body>
</html>
