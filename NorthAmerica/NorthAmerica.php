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
    $sql = 'Select * from NorthAmericaComments';
    $info = mysqli_query($conn, $sql);
    
	if (isset($_POST['submit']))
	{
        $username = $_SESSION['username'];
        $comment = $_POST['com'];
        $addComment = 'Insert into NorthAmericaComments(username, comment)VALUES("' . $username . '","' . $comment . '")';
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
	<title>Continents Explorer-NorthAmerica</title>
</head>

<body style="background-image: url(./imgs/unnamed.png);">
	<div id="banner">
		<h1 class="page-title">NorthAmerica</h1>
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
		<p>		North America, third largest of the world’s continents, lying for the most part between the Arctic Circle and the Tropic of Cancer. It extends for more than 5,000 miles (8,000 km) to within 500 miles (800 km) of both the North Pole and the Equator and has an east-west extent of 5,000 miles. </p>
		<!--https://www.britannica.com/place/North-America-->
		<h2>Weather</h2>
		<p>The enormous width of the continent in the higher latitudes has led to a great extension of Arctic and cool temperate climates, while the tapering south has greatly reduced the land area under tropical climates. Most storms are driven from west to east by a strong mid-continental airflow called the jet stream, and these storms most often converge on the New England region. Thus, the Cordilleras of Canada and the United States have climatically wet, windward slopes facing the Pacific and dry, leeward slopes facing the interior.</p>
		<!--https://www.britannica.com/place/North-America-->
		</div>

	<div id="tab" class="container my-3">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6 pb-4">
				<h2><br>Top 10 Most Visited Cities</h2>
				<table class="Populationtable" id="Ptable">
					<!--https://bigseventravel.com/2019/08/the-10-most-visited-cities-in-north-america/-->
					<tr>
						<th onclick="sortTableab(0)">City</th>
						<th onclick="sortTableab(1)">Country</th>
						<th onclick="sortTableab(3)">Yearly Visitors(Thousand)</th>
					</tr>
					<tr>
						<td>New York City</td>
						<td>US</td>
						<td>13100</td>
					</tr>
					<tr>
						<td>Miami</td>
						<td>US</td>
						<td>8075.8</td>
					</tr>
					<tr>
						<td>Los Angeles</td>
						<td>US</td>
						<td>7165.0</td>
					</tr>
					<tr>
						<td>Las Vegas</td>
						<td>US</td>
						<td>6687.8</td>
					</tr>
					<tr>
						<td>Cancun</td>
						<td>Mexico</td>
						<td>6269</td>
					</tr>
					<tr>
						<td>Orlando</td>
						<td>US</td>
						<td>5269</td>
					</tr>
					<tr>
						<td>Toronto</td>
						<td>Canada</td>
						<td>4600.3</td>
					</tr>
					<tr>
						<td>Punta Cana</td>
						<td>Dominican Republic</td>
						<td>4348.1</td>
					</tr>
					<tr>
						<td>Vancouver</td>
						<td>Canada</td>
						<td>3209.1</td>
					</tr>
					<tr>
						<td>San Francisco</td>
						<td>US</td>
						<td>2958</td>
					</tr>
				</table>
				<p></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/NorthAmericaMap.gif" alt="NorthAmerica"><!--https://geology.com/world/north-america-satellite-image.shtml-->
				</div>
		</div>
	</div>

	<div class="container my-3" id="features">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#1"><img src="./imgs/Brief/Niagara Falls.jpg" alt="Niagara Falls">
						<h2>Niagara Falls</h2><!--https://geology.com/world/north-america-satellite-image.shtml-->
						<p>Canada</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#2"><img src="./imgs/Brief/YellowstoneNationalPark.jpg" alt="YellowstoneNationalPark">
						<!--https://www.nationalgeographic.com/content/dam/ngdotcom/rights-exempt/yellowstone-live/gettyimages-667781269.adapt.1900.1.jpg-->
						<h2>Yellowstone National Park</h2>
						<p>US</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#3"><img src="./imgs/Brief/Walt Disney World.jpg" alt="Walt Disney World">
						<!--https://allears.net/wp-content/uploads/2020/07/2020-wdw-magic-kingdom-reopening-cinderella-castle-35.jpg-->
						<h2>Walt Disney World </h2>
						<p>US</p>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<div class="feature-block">
					<a href="./Detail.php#4"><img src="./imgs/Brief/Chichen Itza.jpg" alt="Chichen Itza">
						<!--https://www.ancient-origins.net/sites/default/files/field/image/Chichen-Itza.jpg-->
						<h2>Chichen Itza</h2>
						<p>Mexico</p>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="media-block container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-block-1">
					<iframe height="315" src="https://www.youtube.com/embed/6TTsxhXo9XM" frameborder="0"
						allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="video-block-2">
					<iframe height="315" src="https://www.youtube.com/embed/L14nXRxJILg" frameborder="0"
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