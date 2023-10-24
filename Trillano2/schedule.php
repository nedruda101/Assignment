<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon.png" type="image/x-icon">
    <title>Legendary Sannin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="app.js" type="text/javascript"></script>
    <style>
        body{
            margin:0;
            padding:0;
            background:url('assets/pattern.webp');
            background-size:200px;
        }
        .gege{
        width: 100%;
        margin: 0 auto;
        height: auto;
        max-height:1000px;
        padding-top: 10px;
        padding-bottom: 167px;
       
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
             
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="gege" style="background-color: rgba(255, 255, 255, 0.9); box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <h1 class="display-4 fw-bold text-center" id="rey">Scheduling Calculator</h1>
    <div class="container">
        
        <div class="row mb-5 pt-3" id="main">
            <div class="col-9 process-list-container">
                <table class="table table-bordered" id="tblProcessList">
                    <thead>
                        <tr>
                            
                            <th scope="col">Process ID</th>
                            <th scope="col">Arrival Time</th>
                            <th scope="col">Burst Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <input class="form-control mb-2" type="number" min="0" id="processID" placeholder="Process ID" required>
                    </div>
                    <div class="col">
                        <input class="form-control mb-2" type="number" min="0" id="arrivalTime" placeholder="Arrival Time">
                    </div>
                    <div class="col">
                        <input class="form-control mb-2" type="number" min="0" id="burstTime" placeholder="Burst Time">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" id="btnAddProcess">Add Process</button>
                    </div>
                </div>
            </div>
            <div class="col-3 border border-primary p-3 mb-2">
                <div class="form">
                    <div class="form-group">
                        <label for="algorithmSelector">Select Scheduling Method</label>
                        <select class="form-control" id="algorithmSelector">
                           
                            <option value="optSJF">Shortest Job First</option>
                           
                          
                        </select>
                    </div>
                    <div class="form-group form-group-time-quantum">
                        <label class="mt-1  ">Time Quantum :</label>
                        <input class="form-control mb-2" type="number" min="0" max="9" id="timeQuantum" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" id="btnCalculate">Calculate</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-primary">
            <div class="col-md-9">
                <table class="table table-bordered" id="tblResults">
                    <thead>
                        <tr>
                            <th scope="col">Process ID</th>
                            <th scope="col">Arrival Time</th>
                            <th scope="col">Burst Time</th>
                            <th scope="col">Completed Time</th>
                            <th scope="col">Waiting Time</th>
                            <th scope="col">Turnaround Time</th>
                        </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 border border-primary p-3 mb-2">
                <div class="form">
                    <div class="form-group">
                        <label for="avgTurnaroundTime">Average Turnaround Time</label>
                        <input class="form-control" id="avgTurnaroundTime" type="number" placeholder="0" disabled>
                    </div>
                    <div class="form-group">
                        <label for="avgTurnaroundTime">Average Waiting Time</label>
                        <input class="form-control" id="avgWaitingTime" type="number" placeholder="0" disabled>
                    </div>
                    <div class="form-group">
                        <label for="avgTurnaroundTime">Throughput</label>
                        <input class="form-control" id="throughput" type="number" placeholder="0" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
