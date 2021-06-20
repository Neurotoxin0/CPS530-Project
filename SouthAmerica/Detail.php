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
	<title>South America - intro</title>
</head>

<body style="background-image: url(./imgs/unnamed.png);">
	<div id="banner">
		<h1 class="page-title">South America</h1>
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
				<h2>Christ the Redeemer</h2>
				<p>Christ the Redeemer, Portuguese Cristo Redentor, colossal statue of Jesus Christ at the summit of Mount Corcovado, Rio de Janeiro, southeastern Brazil. Celebrated in traditional and popular songs, Corcovado towers over Rio de Janeiro, Brazil’s principal port city. The statue of Christ the Redeemer was completed in 1931 and stands 98 feet (30 metres) tall, its horizontally outstretched arms spanning 92 feet (28 metres). The statue has become emblematic of both the city of Rio de Janeiro and the whole nation of Brazil.</p>
				</div><!--https://www.britannica.com/topic/Christ-the-Redeemer-->
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Christ the Redeemer.jpg" alt="Christ the Redeemer"><!--https://cdn.britannica.com/85/61085-050-AB581961/Mount-Corcovado-statue-top-Christ-the-Redeemer.jpg-->
				</div>
		
			<a name="2"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Iguazu Falls</h2>
				<p>Iguazu Falls, series of cataracts on the Iguazu River, 14 miles (23 km) above its confluence with the Alto (Upper) Parana River, at the Argentina-Brazil border. The falls resemble an elongated horseshoe that extends for 1.7 miles (2.7 km)—nearly three times wider than Niagara Falls in North America and significantly greater than the width of Victoria Falls in Africa. Numerous rocky and wooded islands on the edge of the escarpment over which the Iguazu River plunges divide the falls into some 275 separate waterfalls or cataracts, varying between 200 and 269 feet (60 and 82 metres) in height. The name of the falls, like that of the river, is derived from a Guarani word meaning “great water.</p>
				<!--https://www.britannica.com/place/Iguacu-Falls-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Iguazu Falls.jpg" alt="Iguazu Falls">
				<!--https://en.wikipedia.org/wiki/Iguazu_Falls#/media/File:Cataratas.jpg-->
			</div>
			
			<a name="3"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Amazon Rainforest</h2>
				<p>South America’s Amazon contains nearly a third of all the tropical rainforests left on Earth. Despite covering only around 1% of the planet’s surface, the Amazon is home to 10% of all the wildlife species we know about – and probably a lot that we don’t know yet.</p>
				<p>People around the world, as well as locally, depend on the Amazon. Not just for food, water, wood and medicines, but to help stabilise the climate, playing a critical role in global and regional carbon and water cycles.</p>
				<!--https://www.wwf.org.uk/where-we-work/amazon-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Amazon Rainforest.jpg" alt="Amazon Rainforest">
				<!--https://www.wwf.org.uk/sites/default/files/styles/content_slide_image/public/2016-09/Medium_WW220602.jpg?h=10d202d3&itok=kqT-jUm1-->
			</div>
			
			<a name="4"><div class="col-sm-12 col-md-12 col-lg-6 pb-4"></a>
				<h2>Salar de Uyuni</h2>
				<p>Salar de Uyuni is one of South America’s most phenomenal attractions. The vast expanse of white, glistening salt stretches across 10,582 kilometers of the Altiplano and can even be seen from space. Layers of salt are sandwiched between sedimentary deposits that reach a great depth of 10m in the centre of the flat. In total there is an estimated 10 billion tonnes of salt here. However, the real treasure for the locals lies beneath the salt flat, where approximately 70% of the world’s lithium reserves can be found.</p>
				<!--https://www.salardeuyuni.com/info/-->
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<img class="img-responsive" src="imgs/Detail/Salar de Uyuni.jpg" alt="Salar de Uyuni">
				<!--https://www.tangol.com/blog/eng/island-of-incahuasi-in-the-salar-de-uyuni-bolivia_post_499-->
			</div>	
		</div>
	</div>

	<footer>
		<span>Continents Explorer</span>
	</footer>

</body>
</html>