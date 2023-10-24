<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$database = "shinobi_recruitment";
$db = new mysqli($host, $username, $password, $database);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_email = $_POST["email"];
    $submitted_password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $submitted_email, $submitted_password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
   
    
        session_start();
        $_SESSION["user_email"] = $submitted_email;

        header("Location: home.html");
        exit();
    } else {
    
        header("Location: login.html?error=1"); 
        exit();
    }

    $stmt->close();
} else {
    header("Location: login.html"); // Redirect to the login page if the request is not POST
    exit();
}

$db->close();
?>
