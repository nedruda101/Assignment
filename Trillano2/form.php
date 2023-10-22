<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" href="assets/icon.png" type="image/x-icon">
    <title>Legendary Sannin</title>
    <style>
      body{
        margin:0;
        padding:0;
        background:url('assets/pattern.webp');
        background-size:200px;
      }
        /* Custom styles for elevating the form and shortening text inputs */
        .elevated-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 8px;
           
        }

        /* Adjusting the width of text inputs */
        .form-control-short {
            width: 430px; /* Adjust the width as needed */
        }
        .container{
          width:500px;
        }
        .btn{
          background-color: grey;
            color: black;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            border:none;
            
        }
        .btn:hover{
          background-color: #D3D3D3;
            color:black;
        }
        .gege{
        width: 100%;
        margin: 0 auto;
        height: auto;
        padding-top: 10px;
       
      }
      #rey{
    font-family: 'KaushanScript';
}
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="home2.html" style="font-size: 16px;"><img src="assets/icon.png" style="width: 30px;">The Legendary Sannin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="home.html">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="aboutus.html">ABOUT US</a>
                        </li>
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                FEATURES
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="form.php">FORM</a></li>
                                <li><a class="dropdown-item" href="calculator.html">CALCULATOR</a></li>
                                <li><a class="dropdown-item" href="file.php">FILE MANAGER</a></li>
                                <li><a class="dropdown-item" href="schedule.php">SCHEDULING CALCULATOR</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="seait.php">SEAIT</a>
                        </li>
                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                RESUMES
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="namikaze.html">Jireyya Namikaze</a></li>
                                <li><a class="dropdown-item" href="senju.html">Shanenade Senju</a></li>
                                <li><a class="dropdown-item" href="yakushi.html">Orochijohn Yakushi</a></li>
                            </ul>
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
<?php
// Define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $_POST["name"])) {
        $nameErr = "Name must only contain letters and whitespace";
        $isValid = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate the email
    if (empty($_POST["email"])) {
        $emailErr = "E-mail is required";
        $isValid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    // Validate the website (if present)
    if (!empty($_POST["website"])) {
        if (!filter_var($_POST["website"], FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL format";
            $isValid = false;
        } else {
            $website = test_input($_POST["website"]);
        }
    }

    // Validate the gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $isValid = false;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    $comment = test_input($_POST["comment"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="gege" style="background-color: rgba(255, 255, 255, 0.9); box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
<div class="container mt-5">
<h1 class="display-4 fw-bold text-center" id="rey">Form Validation</h1>
    <div class="card elevated-card">
        
        <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control form-control-short" name="name" id="name">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control form-control-short" name="email" id="email">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website:</label>
                <input type="url" class="form-control form-control-short" name="website" id="website">
                <span class="error"><?php echo $websiteErr;?></span>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment:</label>
                <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div><br>
                <span class="error">* <?php echo $genderErr;?></span>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
            echo "<h2>Welcome</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>E-mail: $email</p>";
            if (!empty($website)) {
                echo "<p>Website: $website</p>";
            }
            echo "<p>Comment: $comment</p>";
            echo "<p>Gender: $gender</p>";
        }
        ?>
    </div>
</div>
</div>
<script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
