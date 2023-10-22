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

// Define the number of rows per page
$rowsPerPage = 5;

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset to fetch the appropriate rows
$offset = ($currentPage - 1) * $rowsPerPage;

// Fetch the total number of rows
$totalRowsQuery = "SELECT COUNT(*) as total FROM uploaded_files";
$totalRowsResult = $conn->query($totalRowsQuery);
$totalRowsData = $totalRowsResult->fetch_assoc();
$totalRows = $totalRowsData['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRows / $rowsPerPage);

$sql = "SELECT * FROM uploaded_files LIMIT $offset, $rowsPerPage";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Cover Template · Bootstrap v5.0</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-image: url('assets/pattern.webp');
            /* Set your background image */
            background-size: 200px;
        }

        .container {
            padding: 20px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            display: block;
            border-collapse: collapse;
            width: 50%;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.8);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .download-delete-cell {
            width: 5%;
        }

        .download-link {
            background-color: grey;
            color: black;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .download-link:hover {
            background-color: #D3D3D3;
            color:black;
        }

        .delete-link {
            background-color: grey;
            color: black;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-link:hover {
            background-color: #D3D3D3;
            color:black;
        }

        .page-link {
            display: inline-block;
            padding: 5px 10px;
            background-color: grey;
            color: black;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
        }

        .page-link:hover {
            background-color: #D3D3D3;
            color:black;
        }

        .current-page {
            display: inline-block;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border-radius: 5px;
            margin-right: 5px;
        }

        .pagination {
            margin-left: 650px;
            margin-right: auto;
            display: block;
        }

        form {
            text-align: center;
        }
        .gege{
            width: 100%;
        margin: 0 auto;
        height: 758px;
        padding-top: 10px;
       
      }
    </style>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.html" style="font-size: 16px;">The Legendary Sannin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.html">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="aboutus.html">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="calculator.html">CALCULATOR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="file.php">FILE MANAGER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="form.php">FORM</a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Apply ms-auto to this ul for the LOGOUT item -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="gege" style="background-color: rgba(255, 255, 255, 0.9); box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <h1 class="fw-light" style="text-align: center; font-size:60px;">File Manager</h1>
    <div class="container mt-5" style="margin-top: 60px;">
        <form method="post"  action="upload.php" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Upload">
        </form>
        <?php

if ($totalRows > 0) {
    echo '<table>';
    echo '<tr><th>File Name</th><th>Action</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["file_name"] . '</td>';
        echo '<td class="download-delete-cell"><a href="uploads/' . $row["file_name"] . '" download="' . $row["file_name"] . '" class="download-link">Download</a>';
        echo '<a href="delete.php?id=' . $row["id"] . '" style="color: black;" class="delete-link">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No files uploaded yet.";
}
?>

        <!-- Pagination links moved to the bottom of the table -->
        <div class="pagination">
        <?php
        if ($currentPage > 1) {
            $prevPage = $currentPage - 1;
            echo '<a href="?page=' . $prevPage . '" class="page-link">Previous</a> ';
        } else {
            // If it's the first page, you can still display the "Previous" link but make it disabled.
            echo '<a class="page-link disabled">Previous</a> ';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo '<span class="current-page">' . $i . '</span> ';
            } else {
                echo '<a href="?page=' . $i . '" class="page-link">' . $i . '</a> ';
            }
        }

        if ($currentPage < $totalPages) {
            $nextPage = $currentPage + 1;
            echo '<a href="?page=' . $nextPage . '" class="page-link">Next</a>';
        } else {
            // If it's the last page, you can still display the "Next" link but make it disabled.
            echo '<a class="page-link disabled">Next</a>';
        }
        ?>
    </div>
    </div>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>