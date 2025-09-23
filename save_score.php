<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player = htmlspecialchars($_POST["player"]);
    $score = intval($_POST["score"]);
    $difficulty = htmlspecialchars($_POST["difficulty"]);

    $scores = [];
    if (file_exists("scores.json")) {
        $scores = json_decode(file_get_contents("scores.json"), true);
    }

    // Handle backward compatibility: if scores is flat (old format), migrate to new structure
    if (isset($scores) && is_array($scores) && !isset($scores['easy']) && !isset($scores['medium']) && !isset($scores['hard'])) {
        // Old flat structure detected, migrate to new nested structure
        $migratedScores = ['easy' => [], 'medium' => [], 'hard' => []];
        foreach ($scores as $oldPlayer => $oldScore) {
            // Since we don't know the original difficulty, we'll put them in medium as default
            $migratedScores['medium'][$oldPlayer] = $oldScore;
        }
        $scores = $migratedScores;
    }

    // Initialize difficulty arrays if they don't exist
    if (!isset($scores['easy'])) $scores['easy'] = [];
    if (!isset($scores['medium'])) $scores['medium'] = [];
    if (!isset($scores['hard'])) $scores['hard'] = [];

    // Save only if score is higher for this difficulty
    if (!isset($scores[$difficulty][$player]) || $score > $scores[$difficulty][$player]) {
        $scores[$difficulty][$player] = $score;
    }

    file_put_contents("scores.json", json_encode($scores));
    header("Location: index.php");
    exit();
}
?>
