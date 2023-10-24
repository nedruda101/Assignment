
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('upload_tmp_dir', '/path/to/temporary/directory');

$db_host = 'localhost'; 
$db_username = 'root'; 
$db_password = ''; 
$db_name = 'onepiece'; 


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $file_id = $_GET["id"];

    $stmt = $conn->prepare("SELECT file_name FROM uploaded_files WHERE id = ?");
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($file_name);
        $stmt->fetch();

        $delete_stmt = $conn->prepare("DELETE FROM uploaded_files WHERE id = ?");
        $delete_stmt->bind_param("i", $file_id);

        if ($delete_stmt->execute()) {
  
            echo '<script>window.location.href = "file.php";</script>';
        } else {
            echo "Error deleting file from the database: " . $delete_stmt->error;
        }

        $delete_stmt->close();
    } else {
        echo "File not found in the database.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
