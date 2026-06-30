<!--meghakumariclg98@gmail.com-->

<?php
session_start();
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

<!-- LOGIN SECTION -->
<?php if (!isset($_SESSION['user'])) { ?>

    <h3>🔐 Login Page</h3>

    <form method="POST" action="handler.php">

        <input type="text" name="username" placeholder="Enter Your Username" required>
        <br><br>

        <input type="password" name="password" placeholder="Enter Password" required>
        <br><br>

        <button type="submit">Login</button>

    </form>

<?php } else { ?>

    <p>👋 Welcome, <?php echo $_SESSION['user']; ?></p>
    <p>You are successfully logged in.</p>

    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>

    <h3>Study Tips</h3>

    <input type="text" id="name" placeholder="Enter your name">

    <button type="button" id="greetBtn">Get Greeting</button><br>

    <button type="button" id="apiBtn">Load Study Tips</button>

    <div id="greeting"></div>
    <div id="result"></div>


<?php } ?>


<!-- JS FETCH API -->
<script>
    // Greeting API
document.getElementById("greetBtn").addEventListener("click", function () {

let name = document.getElementById("name").value;
if (name.trim() === ""){
 document.getElementById("greeting").innerHTML = "Please enter your name.";
 return;
} 

    fetch("api/greet.php?name=" + encodeURIComponent(name))
        .then(response => response.json())
        .then(data => {

            document.getElementById("greeting").innerHTML =
            "<h3>" + data.message + "</h3>";

        })
        .catch(error => {
            document.getElementById("greeting").innerHTML =
                "❌ Error loading greeting.";
        });
});
// Study Tips API
document.getElementById("apiBtn").addEventListener("click", function () {

fetch("api/list.php")
        .then(response => response.json())
        .then(data => {

             let output = "<h3>Study Tips</h3><ul>";
             data.tips.forEach(function (tip) {
                output += "<li>" + tip + "</li>";
             });
output += "</ul>";

document.getElementById("result").innerHTML = output;
        })
.catch(error => {
document.getElementById("result").innerHTML =
"❌ Error loading study tips.";
        });
});
</script>

</body>
</html>

