<?php
session_start();

if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_GET['matric'])) {
    $user->matric = $_GET['matric'];
    $user->readOne();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1>HUSSEIN</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <h2>Update User</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="matric" value="<?php echo $user->matric; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
            <label for="role">Access Level:</label>
            <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
            <input type="submit" value="Update">
            <a href="read.php">Cancel</a>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 HUSSEIN</p>
    </footer>
</body>
</html>
