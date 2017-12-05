<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP-IMDB-Grabber by Fabian Beiner | Example</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="movies.css">
</head>
<body>


<?php include 'header.php'; ?>

<?php
include_once 'imdb.class.php';
?>

<div id="main">
	<h1>Movies</h1>
	<ul class="listing">
		<li>
			<div class="listinfo">
                <?php
                $oIMDB = new IMDB('New York, I Love You');
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b><a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>year: <b>' . $oIMDB->getYear() . '</b></p>';
                } else {
                    echo '<p>Movie not found!</p>';
                }
                ?>
			</div>
			<div class="clear">&nbsp;</div>
		</li>

		<li>
			<div class="listinfo">
                <?php
                $oIMDB = new IMDB('New Yorkdsadssa');
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b><a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p>';
                    echo '<p>Language: <b>' . $oIMDB->getLanguage() . '</b></p>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>year: <b>' . $oIMDB->getYear() . '</b></p>';
                } else {
                    echo '<p>Movie not found!</p>';
                }
                ?>
			</div>
			<div class="clear">&nbsp;</div>
		</li>


		<li>
			<div class="listinfo">
                <?php
                $oIMDB = new IMDB('The Godfather');
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b><a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p>';
                    echo '<p>Language: <b>' . $oIMDB->getLanguage() . '</b></p>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>rating :<b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>year: <b>' . $oIMDB->getYear() . '</b></p>';
                } else {
                    echo '<p>Movie not found!</p>';
                }
                ?>
			</div>
			<div class="clear">&nbsp;</div>
		</li>
	</ul>
</div>
</body>
</html>

