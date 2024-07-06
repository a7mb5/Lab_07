<?php
session_start();

if (isset($_SESSION['matric'])) {
    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register_form.php">Register</a></li>
                </ul>
            </nav>
        </header>
        <form action="authenticate.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>

        <a href="register_form.php">Register here if you have not.</a>

        <?php
        if (isset($_GET['error'])) {
            echo "<p>Invalid username or password, try <a href='login.php'>login</a> again.</p>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; </p>
    </footer>
</body>
</html>
