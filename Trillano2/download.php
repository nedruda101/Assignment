<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div>
            <p><?php echo $row["file_name"]; ?></p>
            <a href="download.php?download=<?php echo $row["file_name"]; ?>">
                Download &nbsp;
            </a>
            <a href="delete.php?id=<?php echo $row["id"]; ?>" style="color: red;">Delete</a>
        </div>
        <?php
    }
} else {
    echo "No files uploaded yet.";
}

$conn->close();
?>
