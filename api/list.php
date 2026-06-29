<?php

header("Content-Type: application/json");

$studyTips = [
    "Study daily for at least 1 hour.",
    "Revise your notes every week.",
    "Practice coding regularly.",
    "Take short breaks while studying.",
    "Stay focused and avoid distractions."
];

echo json_encode([
    "status" => "success",
    "tips" => $studyTips
], JSON_PRETTY_PRINT);

?>