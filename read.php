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

$stmt = $user->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
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
        <h1>User List</h1>
        <table>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                echo "<tr>";
                echo "<td>{$matric}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$role}</td>";
                echo "<td>";
                echo "<a href='update_form.php?matric={$matric}'>Update</a> | ";
                echo "<a href='delete.php?matric={$matric}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 HUSSEIN</p>
    </footer>
</body>
</html>
