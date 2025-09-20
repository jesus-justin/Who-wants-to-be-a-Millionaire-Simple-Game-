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
    <title>💰 Who Wants to Be a Millionaire? (Simple)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="game-container">
        <h1>💰 Who Wants to Be a Millionaire?</h1>
        <p id="level">Prize: ₱1,000</p>
        <p id="question">Loading question...</p>

        <div id="options"></div>
        <p id="feedback"></p>

        <form id="saveScoreForm" method="POST" action="save_score.php" style="display:none;">
            <input type="hidden" name="score" id="finalScore">
            <input type="text" name="player" placeholder="Enter your name" required>
            <button type="submit">Save Score</button>
        </form>

        <h2>🏆 Leaderboard</h2>
        <ol>
            <?php if (!empty($scores)) {
                arsort($scores);
                foreach ($scores as $player => $score) {
                    echo "<li><strong>$player</strong> - ₱$score</li>";
                }
            } else {
                echo "<li>No scores yet. Be the first!</li>";
            } ?>
        </ol>
    </div>

    <script src="questions.js"></script>
</body>
</html>
