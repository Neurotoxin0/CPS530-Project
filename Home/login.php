<?php
    // start a session
    session_start();
    $error_msg = ""; // test whether the input of user is correct, if not, use this variable to store error msg
    $home_url = "home.php"; // store the url of home page
    // check whether the user login
    if (!isset($_SESSION['username'])){
        // wait for the user submit the form
        if (isset($_POST['submitLogin'])){
            // get the username and psd from the form
            $user = $_POST['username'];
            $psd = $_POST['password'];
            // get the database user and password from the database.php
            require_once 'database.php';
            // connect the database
            $conn = mysqli_connect(Host, User, Pwd, "Users");
            if (!$conn) {
            	die("Connection failed: " . mysqli_connect_error());
            }
            $exist = FALSE; // a variable to check whether exist the same username
            $check = 'Select * from UserInfo';
            $infos = mysqli_query($conn, $check);
            if (mysqli_num_rows($infos) > 0) {
                while ($infoSet = mysqli_fetch_assoc($infos)) {
                    // if exist the same username and same password, change the exist to TRUE
                    if ($infoSet['Username'] == $user && $infoSet['PSD'] == $psd) {
                        $exist = TRUE;
                    }
                }
            }
            // close the database
            $conn->close();
            // if exist, so login successfully and it jump to the home page
            if ($exist) {
                $_SESSION['username'] = $user;
                header("Location: ".$home_url);
            }
            // else, output the error msg
            else {
                $error_msg = 'Sorry, your username or password is invalid';
            }
        }
    }
    // if login, jump to the home page
    else {
        header('Location: '.$home_url);
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
        integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./css/loginPage.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Login</title>
</head>

<body style="background-image: url(./imgs/bgc/texture.jpg);"> 
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
    <!-- output the error msg -->
    <div class='container'>
    <?php
    echo "<p style='font-size: 150%; color: #343A40; text-align:center;'>" .$error_msg. "</p>";
    ?>
    </div>
    <div class="box">
        <div class="btnBox">
            <!-- a button used to switch the sign and login button -->
            <div id="switch-btn"></div> 
            <button type="button" style="outline: none;" class="changeBtn" onclick="switchLog()">LOG IN</button>
            <button type='button' style="outline: none;" class="changeBtn" onclick="switchSign()">SIGN IN</button>
        </div>
        <!-- in order to call itself, use the $_SERVER-->
        <!-- log form -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="log" class="info">
            <div class="input">
                <input type="text" maxlength="16" id="username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input">
                <input type="password" maxlength="18" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <!-- use this button to submit the sign form -->
            <button type="submit" class="submitBtn" name="submitLogin">LOGIN</button>
        </form>
        <!-- sign form -->
        <form action="https://neurotoxin.synology.me:2666/Home/registry.php" method="post" id="sign" class="info">
            <div class="input">
                <input type="text" maxlength="16" id="re-username" name="re-username" required>
                <label for="re-username">Username</label>
            </div>
            <div class="input">
                <input type="password" maxlength="18" id="re-password" name="re-password" required>
                <label for="re-password">Password</label>
            </div>
            <div class="input">
                <input type="password" maxlength="18" id="check-password" required>
                <label for="check-password">Confirm Password</label>
            </div>
            <!-- use this button to submit the sign form -->
            <button type="button" class="submitBtn" onclick="verify()" name="submitSign">SIGN</button>
        </form>
    </div>
    <script>
        var logForm = document.getElementById('log');
        var signForm = document.getElementById('sign');
        var switchBtn = document.getElementById('switch-btn');
        
        // switch to the sign form
        function switchSign() {
            logForm.style.left = "-340px";
            signForm.style.left = "40px";
            switchBtn.style.left = "117px";
            logForm.reset();
        }
        // switch to the log form
        function switchLog() {
            logForm.style.left = "40px";
            signForm.style.left = "420px";
            switchBtn.style.left = "0px";
            signForm.reset();
        }

        // check whether the user enter the same psd for the confirm password
        function verify() {
            var psd1 = document.getElementById("re-password");
            var psd2 = document.getElementById("check-password");
            if (psd1.value != psd2.value){
                alert('Please enter the same password.');
            }
            else {
                document.getElementById('sign').submit();
            }
        }
    </script>
</body>
</html>