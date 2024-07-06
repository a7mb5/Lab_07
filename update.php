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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->matric = $_POST['matric'];
    $user->name = $_POST['name'];
    $user->role = $_POST['role'];

    if ($user->update()) {
        header("Location: read.php");
        exit();
    } else {
        echo "User could not be updated.";
    }
} else {
    echo "Invalid request.";
}
?>
