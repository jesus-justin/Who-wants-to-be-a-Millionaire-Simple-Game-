<?php
/**
 * Score Saving Handler
 * Receives POST requests with player name, score, and difficulty level
 * Saves scores to scores.json with backward compatibility support
 */
function loadScores(): array
{
    $scores = [
        'easy' => [],
        'medium' => [],
        'hard' => [],
        'animeEdition' => [],
    ];

    if (!file_exists('scores.json')) {
        return $scores;
    }

    $decoded = json_decode(file_get_contents('scores.json'), true);
    if (!is_array($decoded)) {
        return $scores;
    }

    if (!isset($decoded['easy']) && !isset($decoded['medium']) && !isset($decoded['hard']) && !isset($decoded['animeEdition'])) {
        foreach ($decoded as $oldPlayer => $oldScore) {
            $scores['medium'][$oldPlayer] = (int) $oldScore;
        }

        return $scores;
    }

    foreach ($scores as $difficulty => $_) {
        if (isset($decoded[$difficulty]) && is_array($decoded[$difficulty])) {
            $scores[$difficulty] = $decoded[$difficulty];
        }
    }

    return $scores;
}

function sanitizePlayerName(string $playerName): string
{
    $playerName = trim(strip_tags($playerName));
    $playerName = preg_replace('/\s+/', ' ', $playerName);

    if ($playerName === '') {
        return 'Player';
    }

    if (function_exists('mb_substr')) {
        return mb_substr($playerName, 0, 32);
    }

    return substr($playerName, 0, 32);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input data
    $player = isset($_POST["player"]) ? sanitizePlayerName((string) $_POST["player"]) : 'Player';
    $score = isset($_POST["score"]) ? intval($_POST["score"]) : 0;
    $difficulty = isset($_POST["difficulty"]) ? (string) $_POST["difficulty"] : 'medium';

    $allowedDifficulties = ['easy', 'medium', 'hard', 'animeEdition'];
    if (!in_array($difficulty, $allowedDifficulties, true)) {
        $difficulty = 'medium';
    }

    $scores = loadScores();

    // Save only if score is higher for this difficulty
    if (!isset($scores[$difficulty][$player]) || $score > $scores[$difficulty][$player]) {
        $scores[$difficulty][$player] = $score;
    }

    file_put_contents('scores.json', json_encode($scores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    header('Location: index.php?saved=1');
    exit();
}
?>
