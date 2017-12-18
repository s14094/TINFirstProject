<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP-IMDB-Grabber by Fabian Beiner | Example</title>
	<link rel="stylesheet" type="text/css" href="movies.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

</head>
<body>


<?php
session_start();
include("config.php");
include 'header.php';
include_once 'imdb.class.php';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {

} else {
    echo "<h2>Zaloguj się aby wyświetlić zawartość.</h2>";
    echo "<a href='login.php' class='btn3' type='submit'/>Logowanie</a>";
    exit;
}

?>

<div id="main">
	<h1>FILMY</h1>
	<div class="btn">
		<a href='#' id="myBtn">+</a>
	</div>

	<div id="myModal" class="modal">

		<!-- dodaj film!-->
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2>DODAJ FILM</h2>

			<form action="moviesAdd.php" method="post">

				<div style="text-align:center;">
				<input type="text" placeholder="Link z IMDb lub poprawna nazwa" name="varname" class="email"/>
				</div>
				<input class="btn3" value="Dodaj" type="submit"/>

			</form>

		</div>
	</div>

	<script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function () {
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }
	</script>

	<div class="btn2">
		<a href='#' id="myBtn2">-</a>
	</div>

	<!-- usun film !-->
	<div id="myModal2" class="modal">
		<div class="modal-content2">
			<span class="close2">&times;</span>
			<h2>USUŃ FILM</h2>

			<form action="moviesDelete.php" method="post">

				<div style="text-align:center;">
					<input type="text" placeholder="ID Filmu" name="varid" class="email"/>
				</div>
				<input class="btn3" value="Usuń" type="submit"/>

			</form>
		</div>
	</div>

	<script>
        var modal2 = document.getElementById('myModal2');
        var btn2 = document.getElementById("myBtn2");
        var span2 = document.getElementsByClassName("close2")[0];

        btn2.onclick = function () {
            modal2.style.display = "block";
        }

        span2.onclick = function () {
            modal2.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal || event.target == modal2) {
                modal.style.display = "none";
                modal2.style.display = "none";
            }
        }
	</script>

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
        //$db->close();
        ?>
	</ul>


</div>
</body>
</html>
