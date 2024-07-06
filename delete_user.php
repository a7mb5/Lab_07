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

$user->matric = isset($_GET['matric']) ? $_GET['matric'] : die();

if($user->delete()){
    header("Location: read.php");
} else {
    echo "User could not be deleted.";
}
?>
