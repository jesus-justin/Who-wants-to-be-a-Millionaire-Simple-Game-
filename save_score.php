<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player = htmlspecialchars($_POST["player"]);
    $score = intval($_POST["score"]);

    $scores = [];
    if (file_exists("scores.json")) {
        $scores = json_decode(file_get_contents("scores.json"), true);
    }

    // Save only if score is higher
    if (!isset($scores[$player]) || $score > $scores[$player]) {
        $scores[$player] = $score;
    }

    file_put_contents("scores.json", json_encode($scores));
    header("Location: index.php");
    exit();
}
?>
