<?php

header("Content-Type: application/json");

$name = "";

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = htmlspecialchars(trim($_GET['name']));
} else {
    $name = "Guest";
}

$message = "Hello, $name! Keep studying and never give up.";

echo json_encode([
    "status" => "success",
    "message" => $message
], JSON_PRETTY_PRINT);

?>