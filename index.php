<!--meghakumariclg98@gmail-->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";
$tips = [];

try {
    // Greeting API
    if (isset($_GET['name']) && !empty($_GET['name'])) {

        $name = urlencode($_GET['name']);

        $response = file_get_contents("http://localhost/mini-api/api/greet.php?name=$name");

        if ($response === false) {
            throw new Exception("Unable to connect to Greeting API.");
        }

        $data = json_decode($response, true);

        if (!$data) {
            throw new Exception("Invalid JSON received.");
        }

        $message = htmlspecialchars($data['message']);
    }

    // Study Tips API
    if (isset($_GET['showtips'])) {

        $response = file_get_contents("http://localhost/mini-api/api/list.php");

        if ($response === false) {
            throw new Exception("Unable to connect to Study Tips API.");
        }

        $data = json_decode($response, true);

        if (!$data) {
            throw new Exception("Invalid JSON received.");
        }

        $tips = $data['tips'];
    }

} catch (Exception $e) {
    $message = "Error: " . htmlspecialchars($e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Study Tips Mini API</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>📚 Study Tips Mini API</h1>

<form method="GET">

<label>Enter Your Name:</label><br><br>

<input
type="text"
name="name"
placeholder="Enter your name"
required>

<br><br>

<button type="submit">
Get Greeting
</button>

</form>

<br>

<form method="GET">

<button
type="submit"
name="showtips"
value="1">

Show Study Tips

</button>

</form>

<?php
if($message!=""){
    echo "<h2>$message</h2>";
}
?>

<?php
if(!empty($tips)){
    echo "<h3>Study Tips</h3>";
    echo "<ul>";

    foreach($tips as $tip){
        echo "<li>".htmlspecialchars($tip)."</li>";
    }

    echo "</ul>";
}
?>

</div>

</body>
</html>