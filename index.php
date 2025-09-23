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

    <script src="questions.js"></script>
</body>
</html>
