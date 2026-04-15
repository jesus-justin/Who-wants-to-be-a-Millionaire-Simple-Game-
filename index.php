<?php
function loadScores(): array
{
    $defaultScores = [
        'easy' => [],
        'medium' => [],
        'hard' => [],
        'animeEdition' => [],
    ];

    if (!file_exists('scores.json')) {
        return $defaultScores;
    }

    $decoded = json_decode(file_get_contents('scores.json'), true);
    if (!is_array($decoded)) {
        return $defaultScores;
    }

    if (!isset($decoded['easy']) && !isset($decoded['medium']) && !isset($decoded['hard']) && !isset($decoded['animeEdition'])) {
        foreach ($decoded as $player => $score) {
            $defaultScores['medium'][$player] = (int) $score;
        }
        return $defaultScores;
    }

    foreach ($defaultScores as $difficulty => $_) {
        if (isset($decoded[$difficulty]) && is_array($decoded[$difficulty])) {
            $defaultScores[$difficulty] = $decoded[$difficulty];
        }
    }

    return $defaultScores;
}

function renderLeaderboardSection(array $scores, string $difficulty, string $title, string $emptyMessage): void
{
    $sectionId = htmlspecialchars($difficulty, ENT_QUOTES, 'UTF-8') . 'Leaderboard';
    echo '<div class="leaderboard-section" id="' . $sectionId . '"' . ($difficulty === 'easy' ? '' : ' style="display: none;"') . '>';
    echo '<h3>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h3>';
    echo '<div class="leaderboard-list">';

    if (!empty($scores[$difficulty])) {
        arsort($scores[$difficulty]);
        $rank = 1;

        foreach ($scores[$difficulty] as $player => $score) {
            $medals = ['🥇', '🥈', '🥉'];
            $rankLabel = $rank <= 3 ? $medals[$rank - 1] : (string) $rank;
            $safePlayer = htmlspecialchars((string) $player, ENT_QUOTES, 'UTF-8');
            $safeScore = number_format((int) $score);

            echo '<div class="leaderboard-item rank-' . $rank . '">';
            echo '<span class="rank">' . $rankLabel . '</span>';
            echo '<span class="player">' . $safePlayer . '</span>';
            echo '<span class="score">₱' . $safeScore . '</span>';
            echo '</div>';
            $rank++;
        }
    } else {
        echo '<div class="no-scores">' . htmlspecialchars($emptyMessage, ENT_QUOTES, 'UTF-8') . '</div>';
    }

    echo '</div></div>';
}

$scores = loadScores();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💰 Who Wants to Be a Millionaire? - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
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
        <!-- Sidebar - Contains player info, lifelines, and prize ladder -->
        <aside class="sidebar">
            <!-- Player Information Section -->
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
                <div class="achievements-mini" id="achievementsDisplay">
                    <span class="achievement-badge" data-achievement="firstWin" title="First Win">🏆</span>
                    <span class="achievement-badge" data-achievement="hotStreak" title="Hot Streak">🔥</span>
                    <span class="achievement-badge" data-achievement="millionaire" title="Millionaire">💰</span>
                    <span class="achievement-badge" data-achievement="animeMaster" title="Anime Master">🎌</span>
                    <span class="achievement-badge" data-achievement="under1Sec" title="Under 1 Second">⚡</span>
                </div>
                <div class="statistics-panel">
                    <h4>Statistics</h4>
                    <div class="stat-row">
                        <span>Games Played</span>
                        <span id="statGamesPlayed">0</span>
                    </div>
                    <div class="stat-row">
                        <span>Win Rate</span>
                        <span id="statWinRate">0%</span>
                    </div>
                    <div class="stat-row">
                        <span>Best Streak</span>
                        <span id="statBestStreak">0</span>
                    </div>
                    <div class="stat-row">
                        <span>Accuracy</span>
                        <span id="statAccuracy">0%</span>
                    </div>
                    <div class="stat-row">
                        <span>Avg Time</span>
                        <span id="statAvgTime">0.0s</span>
                    </div>
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
                    <button class="lifeline-btn hint-btn" id="hintLifeline" data-lifeline="hint">
                        <i class="fas fa-lightbulb"></i>
                        <span>Hint</span>
                    </button>
                </div>
            </div>

            <div class="prize-ladder">
                <h4>Prize Ladder</h4>
                <div class="ladder" id="prizeLadder">
                    <!-- Prize levels will be populated by JavaScript -->
                </div>
            </div>

            <!-- Achievement Bar - Displays unlocked and locked achievements -->
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

        <!-- Game Area - Main gameplay section with questions and options -->
        <main class="game-area">
            <div class="game-container">
                <!-- Question Display Container -->
                <div class="question-container">
                    <div class="question-header">
                        <span class="question-number" id="questionNumber">Question 1</span>
                        <span class="question-prize" id="questionPrize">₱1,000</span>
                        <span class="question-timer" id="questionTimer">⏱️ 30</span>
                        <div class="timer-bar-container">
                            <div class="timer-bar" id="timerBar"></div>
                        </div>
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

            <?php
            renderLeaderboardSection($scores, 'easy', 'Easy Difficulty', 'No scores yet for Easy difficulty.');
            renderLeaderboardSection($scores, 'medium', 'Medium Difficulty', 'No scores yet for Medium difficulty.');
            renderLeaderboardSection($scores, 'hard', 'Hard Difficulty', 'No scores yet for Hard difficulty.');
            renderLeaderboardSection($scores, 'animeEdition', 'Anime Edition', 'No scores yet for Anime Edition.');
            ?>
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

    <!-- Add sidebar toggle button for mobile -->
    <button class="sidebar-toggle-btn" id="sidebarToggleBtn" title="Menu">
        <i class="fas fa-bars"></i>
    </button>

    <canvas id="confettiCanvas"></canvas>

    <script src="questions.js"></script>
    <script>
    // NOTE: Remove duplicate/legacy game logic from here. Let questions.js control the game.
    // Keep only UI helpers that don't duplicate game logic.

    // Modal helpers – use questions.js openModal/closeModal to avoid duplicates
    document.getElementById('settingsBtn').onclick = function() {
        openModal('settingsModal');
    };
    document.getElementById('leaderboardBtn').onclick = function() {
        openModal('leaderboardModal');
    };
    document.getElementById('achievementsBtn').onclick = function() {
        openModal('achievementsModal');
    };
    document.getElementById('closeAchievements').onclick = function() {
        closeModal('achievementsModal');
    };

    // Daily Challenge modal logic
    document.getElementById('dailyChallengeBtn').onclick = function() {
        openModal('dailyChallengeModal');
    };
    document.getElementById('closeDailyChallenge').onclick = function() {
        closeModal('dailyChallengeModal');
    };
    document.getElementById('startDailyChallengeBtn').onclick = function() {
        closeModal('dailyChallengeModal');
        // Optional: trigger a special mode in questions.js if desired.
    };

    // Random Event modal logic
    document.getElementById('randomEventBtn').onclick = function() {
        const events = [
            "Double points for the next question!",
            "Lose a lifeline!",
            "Instant bonus: ₱5,000!",
            "Skip the next question for free!",
            "Triple points for the next correct answer!"
        ];
        const eventText = events[Math.floor(Math.random() * events.length)];
        document.getElementById('randomEventText').innerText = eventText;
        openModal('randomEventModal');
    };
    document.getElementById('closeRandomEvent').onclick = function() {
        closeModal('randomEventModal');
    };

    // Sidebar toggle for mobile
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    sidebarToggleBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        sidebar.classList.toggle('open');
    });

    // Close sidebar when clicking outside (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 600 && sidebar.classList.contains('open')) {
            if (!sidebar.contains(e.target) && e.target !== sidebarToggleBtn) {
                sidebar.classList.remove('open');
            }
        }
    });

    // Close modals on ESC using questions.js modal helpers
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            ['settingsModal','leaderboardModal','gameOverModal','achievementsModal','dailyChallengeModal','randomEventModal'].forEach(id => {
                const el = document.getElementById(id);
                if (el && el.classList.contains('show')) closeModal(id);
            });
        }
    });

    // Remove any duplicate legacy listeners that override start button behavior.
    // Start button is managed by questions.js (initGame -> startNewGame).
    </script>

</body>
</html>
