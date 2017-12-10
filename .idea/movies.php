<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP-IMDB-Grabber by Fabian Beiner | Example</title>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="movies.css">
</head>
<body>


<?php
session_start();
include("config.php");
include 'header.php';
include_once 'imdb.class.php';
?>

<div id="main">
	<h1>FILMY</h1>
	<ul class="listing">


        <?php
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $sql = "SELECT movieid, moviename, userid FROM testmovies";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {


                //echo "id: " . $row["movieid"] . " - Name: " . $row["moviename"] . " " . $row["userid"] . "<br>";

                echo '<li><div class="listinfo">';
                $oIMDB = new IMDB($row["moviename"]);
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b>#' . $row["movieid"] . ' <a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<section class="customInline"><p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p></section>';
                    echo '<section class="customInline customFloat"><p>Rating: <b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>Votes: <b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>Year: <b>' . $oIMDB->getYear() . '</b></p></section>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
                } else {
                    echo '<p>Movie not found!</p>';
                }

                echo '</div><div class="clear">&nbsp;</div></li>';

            }
        } else {
            echo "0 results";
        }
        $db->close();
        ?>


		<li>
			<div class="listinfo">
                <?php
                $oIMDB = new IMDB('New York, I Love You');
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b><a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<section class="customInline"><p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p></section>';
                    echo '<section class="customInline customFloat"><p>Rating: <b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>Votes: <b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>Year: <b>' . $oIMDB->getYear() . '</b></p></section>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
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
                    echo '<section class="customInline"><p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p></section>';
                    echo '<section class="customInline customFloat"><p>Rating: <b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>Votes: <b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>Year: <b>' . $oIMDB->getYear() . '</b></p></section>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
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
                    echo '<section class="customInline"><p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p></section>';
                    echo '<section class="customInline customFloat"><p>Rating: <b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>Votes: <b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>Year: <b>' . $oIMDB->getYear() . '</b></p></section>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
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
                $oIMDB = new IMDB('http://www.imdb.com/title/tt0209144/?ref_=nv_sr_1');
                if ($oIMDB->isReady) {
                    echo '<p><img src="' . $oIMDB->getPoster('small', true) . '" class="listingimage"></p>';
                    echo '<p><h3><b><a href="' . $oIMDB->getUrl() . '">' . $oIMDB->getTitle() . '</a></b></h3></p>';
                    echo '<section class="customInline"><p>Country: <b>' . $oIMDB->getCountry() . '</b></p>';
                    echo '<p>Director: <b>' . $oIMDB->getDirector() . '</b></p>';
                    echo '<p>Genre: <b>' . $oIMDB->getGenre() . '</b></p></section>';
                    echo '<section class="customInline customFloat"><p>Rating: <b>' . $oIMDB->getRating() . '</b></p>';
                    echo '<p>Votes: <b>' . $oIMDB->getVotes() . '</b></p>';
                    echo '<p>Year: <b>' . $oIMDB->getYear() . '</b></p></section>';
                    echo '<p>Plot: <b>' . $oIMDB->getPlot($iLimit = 200) . '</b></p>';
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
