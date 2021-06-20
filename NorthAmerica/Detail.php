<?php
/* if logged in: show username; show login button otherwise */
session_start();
$usr_msg = "";
if(isset($_SESSION['username'])){
    $usr_msg = "<a class='nav-link' href='#'>".$_SESSION['username']."</a>";
}
else {
    $usr_msg = "<a class='nav-link' id='link' href='https://neurotoxin.synology.me:2666/Home/login.php'>Login</a>";
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
	<link rel="stylesheet" type="text/css" href="css/detail.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title>North America - intro</title>
</head>

<body style="background-image: url(./imgs/unnamed.png);">
	<div id="banner">
		<h1 class="page-title">North America</h1>
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
	<div class="container my-3" id="info">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6 pb-4" name="1">
				<h2>Niagara Falls</h2>
				<p>Niagara Falls, waterfall on the Niagara River in northeastern North America, one of the continent’s most famous spectacles. The falls lie on the border between Ontario, Canada, and New York state, U.S. For many decades the falls were an attraction for honeymooners and for such stunts as walking over the falls on a tightrope or going over them in a barrel. Increasingly, however, the appeal of the site has become its beauty and uniqueness as a physical phenomenon. </p>
				</div><!--https://www.britannica.com/place/Niagara-Falls-waterfall-North-America-->
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Niagara Falls.jpg" alt="Niagara Falls"><!--https://geology.com/world/north-america-satellite-image.shtml-->
				</div>
		
			<a name="2"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Yellowstone National Park</h2>
				<p>Yellowstone National Park, the oldest, one of the largest, and probably the best-known national park in the United States. It is situated principally in northwestern Wyoming and partly in southern Montana and eastern Idaho and includes the greatest concentration of hydrothermal features in the world. The park was established by the U.S. Congress on March 1, 1872, as the country’s first national park. It is also generally considered to have been the first national park in the world</p>
				<!--https://www.britannica.com/place/Yellowstone-National-Park-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/YellowstoneNationalPark.webp" alt="YellowstoneNationalPark">
				<!--https://www.outsideonline.com/sites/default/files/styles/width_1200/public/2019/10/23/geyser-yelowstone-burst_h.jpg?itok=WnDM1Sj3-->
			</div>
			
			<a name="3"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Walt Disney World </h2>
				<p>The Walt Disney World Resort, also called Walt Disney World and Disney World, is an entertainment complex in Bay Lake and Lake Buena Vista, Florida, in the United States, near the cities of Orlando and Kissimmee.he resort comprises four theme parks (consisting of Magic Kingdom, Epcot, Disney's Hollywood Studios, and Disney's Animal Kingdom), two water parks, 27 themed resort hotels, nine non-Disney hotels, several golf courses, a camping resort, and other entertainment venues, including the outdoor shopping center Disney Springs.</p>
				<!--https://en.wikipedia.org/wiki/Walt_Disney_World-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Walt Disney World.jpg" alt="Walt Disney World">
				<!---https://cdn.vox-cdn.com/thumbor/dvJou5b2L39t5FYArXMqjmC6aFY=/0x0:2700x1801/1200x675/filters:focal(1134x685:1566x1117)/cdn.vox-cdn.com/uploads/chorus_image/image/67131483/Mickey_and_Friends_Cavalcade_2.0.jpg-->
			</div>
			
			<a name="4"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Chichen Itza</h2>
				<p>Chichén Itzá, ruined ancient Maya city occupying an area of 4 square miles (10 square km) in south-central Yucatán state, Mexico. It is thought to have been a religious, military, political, and commercial centre that at its peak would have been home to 35,000 people. The site first saw settlers in 550, probably drawn there because of the easy access to water in the region via caves and sinkholes in limestone formations, known as cenotes.</p>
				<!--https://www.britannica.com/place/Chichen-Itza-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Chichen Itza.jpg" alt="Chichen Itza">
			</div>	
		</div>
	</div>

	<footer>
		<span>Continents Explorer</span>
	</footer>

</body>
</html>