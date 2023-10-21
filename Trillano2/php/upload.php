<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('upload_tmp_dir', '/path/to/temporary/directory');



// Database Configuration
$db_host = 'localhost'; // Change this to your database host
$db_username = 'root'; // Change this to your database username
$db_password = ''; // Change this to your database password
$db_name = 'onepiece'; // Change this to your database name

// Create a database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES["file"];

    if ($file["error"] > 0) {
        // Handle file upload errors as before
    } else {
        // Assign the temporary file name to a variable
        $tmp_name = $file["tmp_name"];

        // Prepare and execute an SQL INSERT query to store the uploaded file in the database
        $stmt = $conn->prepare("INSERT INTO uploaded_files (file_name, file_type, file_data) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $file["name"], $file["type"], file_get_contents($tmp_name));

        if ($stmt->execute()) {
            // File uploaded successfully, redirect to index1.php
            header("Location: file.php");
            exit;
        } else {
            echo "Error uploading file to the database: " . $stmt->error;
        }

        $stmt->close();
    }
}


?>