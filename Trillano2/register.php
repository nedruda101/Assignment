<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "shinobi_recruitment"; 
$db = new mysqli('localhost', 'root', '', 'shinobi_recruitment');

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

 
    $stmt->close();
    $db->close();
}
?>