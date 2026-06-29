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

        <input type="text" name="username" placeholder="Username" required>
        <br><br>

        <input type="password" name="password" placeholder="Password" required>
        <br><br>

        <button type="submit">Login</button>

    </form>

<?php } else { ?>

    <p>👋 Welcome, <?php echo $_SESSION['user']; ?></p>

    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>

<?php } ?>

<hr>

<!-- API BUTTON -->
<button type="button" id="apiBtn">📚 Load Study Tips</button>

<!-- OUTPUT -->
<div id="result"></div>

</div>

<!-- JS FETCH API -->
<script>
document.getElementById("apiBtn").addEventListener("click", function () {

    fetch("api/list.php")
        .then(response => response.json())
        .then(data => {

            let output = "<h3>Study Tips</h3><ul>";

            data.tips.forEach(function(tip) {
                output += "<li>" + tip + "</li>";
            });

            output += "</ul>";

            document.getElementById("result").innerHTML = output;

        })
        .catch(error => {
            document.getElementById("result").innerHTML =
                "❌ Error loading API";
        });

});
</script>

</body>
</html>
