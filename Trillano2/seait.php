<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legendary Sannin</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('assets/pattern.webp');
            background-size: 200px;
        }
      .gege{
        width: 100%;
        margin: 0 auto;
        height:758px;
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
                <a class="navbar-brand" href="home.html" style="font-size: 16px;">The Legendary Sannin</a>
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
                        <li class="nav-item">
                            <a class="nav-link " href="calculator.html">CALCULATOR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="file.php">FILE MANAGER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="form.php">FORM</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="seait.php">SEAIT</a>
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
  
    <h1 class="display-4 fw-bold text-center" id="rey">Sout East Asian Institute</h1>
    <p class="lead text-left" style=" padding-left:100px; padding-right:100px;">
          <?php readfile("assets/aboutseait.txt");?></p>
    
</div>




</body>

</html>