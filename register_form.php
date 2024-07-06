<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
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
        <form action="insert.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" required><br><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select><br><br>

            <input type="submit" value="Register">
        </form>
        <a href="login.php">Already have an account? Login here</a>
    </div>
    <footer>
        <p>&copy; 2024 </p>
    </footer>
</body>
</html>
