<?php
// Start a seesion 
session_start();
// Create a variable to store the information about whether login
$usr_msg = "";
if(isset($_SESSION['username'])){
    // if login, the page will display username
    $usr_msg = "<a class='nav-link' href='#'>".$_SESSION['username']."</a>";
}
else {
    // if not, user can go to the login page
    $usr_msg = "<a class='nav-link' id='link' href='https://neurotoxin.synology.me:2666/Home/login.php'>Login</a>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
        integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <title>Question my-3naire</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background: #f9f7f6;
            color: #404d5b;
            font-weight: 500;
            font-size: 1.05em;
            font-family: 'Raleway', Arial, sans-serif;
        }
        
        .header {
            text-align: center;
            padding-bottom: 3vh;
        }

        .header h1 {
            font-weight: 800;
            font-size: 5vw;
            line-height: 1;
            margin-bottom: 0;
            margin-top: 10px;
        }

        .header span {
            display: block;
            font-size: 50%;
            font-weight: 400;
            padding: 0.325em 0 0.5em 0;
            color: #c3c8cd;
            margin-top: 10px;
        }

        .container {
            margin: 0 auto;
            text-align: center;
            overflow: hidden;
        }

        .question {
            background: #f0efee;
            border-radius: 10px;
            margin: 0px 2vw;
            padding: 20px 5px;
            transition: .5s;
        }

        .question p {
            font-size: 120%;
            margin-bottom: 10px;
        }

        .question span {
            margin: 0 4vw;
        }
        
        .question:hover {
            box-shadow: 0 16px 32px 0 rgba(48, 55, 66, 0.15);
            transform: translate(0,-5px);     
        }
    </style>
</head>

<body>
        <!-- check the comments for the navbar in home page -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <!-- create a brand -->
        <a class="navbar-brand" href="../index.html">
            <svg width="1em" height="1em" viewBox="0 5 20 10" class="bi bi-globe2" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539a8.372 8.372 0 0 1-1.198-.49 7.01 7.01 0 0 1 2.276-1.52 6.7 6.7 0 0 0-.597.932 8.854 8.854 0 0 0-.48 1.079zM3.509 7.5H1.017A6.964 6.964 0 0 1 2.38 3.825c.47.258.995.482 1.565.667A13.4 13.4 0 0 0 3.508 7.5zm1.4-2.741c.808.187 1.681.301 2.591.332V7.5H4.51c.035-.987.176-1.914.399-2.741zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5H7.5v2.409c-.91.03-1.783.145-2.591.332a12.343 12.343 0 0 1-.4-2.741zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696A12.63 12.63 0 0 1 7.5 11.91v3.014c-.67-.204-1.335-.82-1.887-1.855a7.776 7.776 0 0 1-.395-.872zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964a9.083 9.083 0 0 0-1.565.667A6.963 6.963 0 0 1 1.018 8.5h2.49a13.36 13.36 0 0 0 .437 3.008zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909c.81.03 1.577.13 2.282.287-.12.312-.252.604-.395.872-.552 1.035-1.218 1.65-1.887 1.855V11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5h-2.49a13.361 13.361 0 0 0-.437-3.008 9.123 9.123 0 0 0 1.565-.667A6.963 6.963 0 0 1 14.982 7.5zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343c-.705.157-1.473.257-2.282.287V1.077c.67.204 1.335.82 1.887 1.855.143.268.276.56.395.872z" />
            </svg>
            Continents Explorer
        </a>
        <!-- When the screen size is less than a certain size, this button appears to help select this hide options. -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/home.php">Home<span class="sr-only">Screen read only.</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/questionnaire.php">Questionnaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/home.php#map">Map</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Continents
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/Asia/Asia.php">Asia</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/Africa/Africa.php">Africa</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/Europe/Europe.php">Europe</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/NorthAmerica/NorthAmerica.php">North America</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/SouthAmerica/SouthAmerica.php">South America</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/Oceania/Oceania.php">Australia/Oceania</a>
                        <a class="dropdown-item" href="https://neurotoxin.synology.me:2666/Antarctica/Antarctica.php">Antarctica</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php
                    echo $usr_msg;
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <!-- header of this page -->
        <header class="header">
            <h1>Find your destination!<span>Help users find the right destination</span></h1>
        </header>
        <form action="./destination.php" method="post" class="form">
            <!-- some question for the user -->
            <div class="question my-3">
                <p>Do you prefer a colder or hotter climate?</p>
                <span class="chocie">
                    <input type="radio" id="cold" name="weather" value="cold" required>
                    <label for="cold">Cold</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="warm" name="weather" value="warm" required>
                    <label for="warm">Warm</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="hot" name="weather" value="hot" required>
                    <label for="hot">Hot</label>
                </span>
            </div>
            <div class="question my-3">
                <p>Which do you prefer over dry or humid climates?</p>
                <span class="chocie">
                    <input type="radio" id="dry" name="humidity" value="dry" required>
                    <label for="dry">Dry</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="mixH" name="humidity" value="mix" required>
                    <label for="mixH">Normal</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="humid" name="humidity" value="humid" required>
                    <label for="humid">Humid</label>
                </span>
            </div>
            <div class="question my-3">
                <p>Northern or Southern hemisphere?</p>
                <span class="chocie">
                    <input type="radio" id="north" name="region" value="north" required>
                    <label for="north">Northern</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="mid" name="region" value="mid" required>
                    <label for="mid">Equatorial</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="south" name="region" value="south" required>
                    <label for="south">Southern</label>
                </span>
            </div>
            <div class="question my-3">
                <p>Do you prefer natural scenery or artificial scenery?</p>
                <span class="chocie">
                    <input type="radio" id="natural" name="scenery" value="natural" required>
                    <label for="natural">Natural</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="mixS" name="scenery" value="mix" required>
                    <label for="mixS">Mix</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="artificial" name="scenery" value="artificial" required>
                    <label for="artificial">Artificial</label>
                </span>
            </div>
            <div class="question my-3">
                <p>Do you prefer slow pace life or a fast rhythm?</p>
                <span class="chocie">
                    <input type="radio" id="slow" name="life-style" value="slow" required>
                    <label for="slow">Slow</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="both" name="life-style" value="both" required>
                    <label for="both">Both are fine</label>
                </span>
                <span class="chocie">
                    <input type="radio" id="fast" name="life-style" value="fast" required>
                    <label for="fast">Fast</label>
                </span>
            </div>
            <!-- a button to submit the form -->
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>