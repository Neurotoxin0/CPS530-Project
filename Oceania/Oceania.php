<?php
/* if logged in: show username; show login button otherwise */
session_start();
$usr_msg = "";
if(isset($_SESSION['username']))
{
    $usr_msg = "<a class='nav-link' href='#'>".$_SESSION['username']."</a>";
}
else 
{
    $usr_msg = "<a class='nav-link' id='link' href='https://neurotoxin.synology.me:2666/Home/login.php'>Login</a>";
}

$loadComment = FALSE;
if(isset($_SESSION['username']))
{
    $loadComment = TRUE;
    // connect the mysql database
    $conn = mysqli_connect("neurotoxin.synology.me", "Kathy", "13087936", "Comments");
    $sql = 'Select * from OceaniaComments';
    $info = mysqli_query($conn, $sql);
    
	if (isset($_POST['submit']))
	{
        $username = $_SESSION['username'];
        $comment = $_POST['com'];
        $addComment = 'Insert into OceaniaComments(username, comment)VALUES("' . $username . '","' . $comment . '")';
        mysqli_query($conn, $addComment);
        header('Location: '.$_SERVER['HTTP_REFERER'].'#post');
    }
}
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
		integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="css/brief.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title>Continents Explorer-Oceania</title>
</head>

<body style="background-image: url(./imgs/unnamed.png);">
	<div id="banner">
		<h1 class="page-title">Oceania</h1>
	</div>

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
                <!-- a link to the home page -->
                <li class="nav-item active">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/home.php">Home<span class="sr-only">Screen read only.</span></a>
                </li>
                <!-- a link to the questionnaire page -->
                <li class="nav-item">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/questionnaire.php">Questionnaire</a>
                </li>
                <!-- a link point to the map -->
                <li class="nav-item">
                    <a class="nav-link" href="https://neurotoxin.synology.me:2666/Home/home.php#map">Map</a>
                </li>
                <!-- a link to those contients -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Continents
                    </a>
                    <!-- use the dropdown menu to hide those contients -->
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
            <!-- a link to the login page or just the username, depend on whether the user is login -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php
                    echo $usr_msg;
                    ?>
                </li>
            </ul>
        </div>
    </nav>
	<!--script used to sort the population table -->
	<!--Ref: https://www.w3schools.com/howto/howto_js_sort_table.asp-->
	<script>
		function sortTableab(n) {
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("Ptable");
			switching = true;
			dir = "asc";
			while (switching) {
				switching = false;
				rows = table.rows;
				for (i = 1; i < (rows.length - 1); i++) {
					shouldSwitch = false;
					x = rows[i].getElementsByTagName("TD")[n];
					y = rows[i + 1].getElementsByTagName("TD")[n];
					if (dir == "asc") {
						if (Number(x.innerHTML) > Number(y.innerHTML)) {
							shouldSwitch = true;
							break;
						}
						else if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
							  shouldSwitch = true;
							  break;
						}
					} else if (dir == "desc") {
						if (Number(x.innerHTML) < Number(y.innerHTML)) {
							shouldSwitch = true;
							break;
						}
						else if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
						  shouldSwitch = true;
						  break;
						}
					}
				}
				if (shouldSwitch) {
					rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					switching = true;
					switchcount++;
				} else {
					if (switchcount == 0 && dir == "asc") {
						dir = "desc";
						switching = true;
					}
				}
			}
		}
		


	</script>
	<div class="container my-3">
		<h2>Brief Introduction</h2>
		<p>	Oceania, collective name for the islands scattered throughout most of the Pacific Ocean. The term, in its widest sense, embraces the entire insular region between Asia and the Americas. Oceania has traditionally been divided into four parts: Australasia (Australia and New Zealand), Melanesia, Micronesia, and Polynesia. As recently as 33,000 years ago no human beings lived in the region, except in Australasia.</p>
		<!--https://www.britannica.com/place/Oceania-region-Pacific-Ocean-->
		<h2>Weather</h2>
		<p>Australia has the most diverse climate on the continent because of its large size and position on the Tropic of Capricorn, which runs through the middle of the country. New Zealand’s isolation from other continents and exposure to cold western winds and ocean currents gives it a much milder climate than Australia.The Pacific Islands lie in a warm equatorial band between the Tropic of Cancer and the Tropic of Capricorn.</p>
		<!---->
	</div>

	<div id="tab" class="container my-3">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6 pb-4">
				<h2><br>Top 5 Most Visited Cities</h2>
				<table class="Populationtable" id="Ptable">
					<!--https://www.travelandleisure.com/worlds-best/cities-in-australia-new-zealand-south-pacific-->
					<tr>
						<th onclick="sortTableab(0)">City</th>
						<th onclick="sortTableab(1)">Country</th>
						<th onclick="sortTableab(3)">Rank</th>
					</tr>
					<tr>
						<td>Sydeny</td>
						<td>Australia</td>
						<td>1</td>
					</tr>
					<tr>
						<td>Melbourne</td>
						<td>Australia</td>
						<td>2</td>
					</tr>
					<tr>
						<td>Perth</td>
						<td>Australia</td>
						<td>3</td>
					</tr>
					<tr>
						<td>Queenstown</td>
						<td>New Zealand</td>
						<td>4</td>
					</tr>
					<tr>
						<td>Wellington</td>
						<td>New Zealand</td>
						<td>5</td>
					</tr>
					
				</table>
				<p></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/OceaniaMap.jpg" alt="Oceania"><!--https://images.mapsofworld.com/answers/2017/04/australia-oceania-answers.jpg-->
			</div>
		</div>
	</div>

	<div class="container my-3" id="features">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#1"><img src="./imgs/Brief/Great Barrier Reef.png" alt="Great Barrier Reef">
						<h2>Great Barrier Reef</h2><!--https://www.sciencemag.org/sites/default/files/styles/article_main_large/public/images/si-GreatBarrierReef.png?itok=Srtx66fg-->
						<p>Australia</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#2"><img src="./imgs/Brief/Sydney Opera House.jpg" alt="Sydney Opera House">
						<!--https://www.tripsavvy.com/sydney-opera-house-complete-guide-4783244-->
						<h2>Sydney Opera House</h2>
						<p>Australia</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#3"><img src="./imgs/Brief/Fiji.jpg" alt="Fiji">
						<!--https://media.cntraveler.com/photos/59eee31c85f4523b0e52769f/master/w_1600%2Cc_limit/Monuriki-Island-GettyImages-150956356.jpg-->
						<h2>Fiji</h2>
						<p>Fiji</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#4"><img src="./imgs/Brief/Hobbito Movie Set.jpg" alt="Hobbito Movie Set">
						<!--https://www.hobbitontours.com/media/1182/hobbiton-movie-set-9.jpg?anchor=center&mode=crop&width=600&heightratio=0.5628930817610063&rnd=131194573500000000-->
						<h2>Hobbito Movie Set</h2>
						<p>New Zealand</p>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="media-block container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-block-1">
					<iframe height="315" src="https://www.youtube.com/embed/na9eBzLMhTg" frameborder="0"
						allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-block-2">
					<iframe height="315" src="https://www.youtube.com/embed/8jypK2U1AM0" frameborder="0"
						allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--Comment Area -->
	<div class='post container' id='post'>
    <?php
        if ($loadComment) 
		{
            /* heading */
			print <<<FIRST
            <div>
            <h3>Want to give advice? </h3>
            <form action="
            FIRST;
            
			echo $_SERVER['PHP_SELF']; /* direct to currrent page */
            
			/* Text Area */
			print <<<SECOND
            " method="post">
                <textarea name = "com" id = "com" maxlength="250"></textarea>
                <span class="count"></span>
                <input type="submit" value="submit" name='submit'>
            </form>
            </div>
            <div class="comments container">
                <h3>Comments</h3>
            SECOND;
            /* fetch all comments from database */
			if (mysqli_num_rows($info) > 0) 
			{
                while ($commentSet = mysqli_fetch_assoc($info)) 
				{
                    echo "<div class='com'>";
                    echo "<p><b>".$commentSet['username'].":</b></p>";
                    echo "<p>".$commentSet['comment']."</p>";
                    echo "</div>";
                }
            }
            echo "</div>";
        }
        
		else /* if not login */
		{
            echo "<p style='text-align:center; color: #F56991; font-size: 200%; font-weight: 700;'>Please login to see and add comments<p>";
        }
    ?>
    </div>
	
	<footer>
		<span>Continents Explorer</span>
	</footer>

</body>
</html>