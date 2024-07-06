<?php
session_start();

include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user->matric = $_POST['matric'];
    $input_password = $_POST['password'];

    $user->readOne();

    if(password_verify($input_password, $user->password)){
        $_SESSION['matric'] = $user->matric;
        $_SESSION['name'] = $user->name;
        $_SESSION['role'] = $user->role;
        header("Location: read.php");
    } else {
        header("Location: login.php?error=1");
    }
}
?>
