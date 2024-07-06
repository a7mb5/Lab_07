<?php
include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user->matric = $_POST['matric'];
    $user->name = $_POST['name'];
    $user->password = $_POST['password'];
    $user->role = $_POST['role'];

    if($user->create()){
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">
</head>
<body>
    <div class=\"container\">
        <header>
            <div class=\"logo\">
                <h1>HUSSEIN</h1>
            </div>
            <nav>
                <ul>
                    <li><a href=\"login.php\">Login</a></li>
                    <li><a href=\"register_form.php\">Register</a></li>
                </ul>
            </nav>
        </header>
        <h2>Registration Successful</h2>
        <p>User was created successfully.</p>
        <a href=\"login.php\"><button>Go to Login Page</button></a>
    </div>
    
</body>
</html>";
    } else {
        echo "Unable to create user. Matric number already exists.";
    }
}
?>
