<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 12/11/2017
 * Time: 18:50
 */
session_start();
?>


<!doctype html>

<html>
<head>
	<title>Movies & Series</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

</head>

<body>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="login.php">Zaloguj</a>
	<a href="register.php">Zarejestruj</a>
	<a href="logout.php">Wyloguj</a>
</div>

<div class="header-cont">

	<div class="topnav" id="myTopnav">
		<a href="index.php" class="active">Home</a>
		<a href="movies.php">Filmy</a>
		<a href="series.php">Seriale</a>
		<a href="login.php">
            <?php
            if ($_SESSION['logged'] == 1) {
                echo "Zalogowano jako: " . $_SESSION['login_user'];

            } elseif ($_SESSION['logged'] == 0)
                echo '<span>Niezalogowano</span>';
            else {
                echo 'error';
            }
            ?>
		</a>
        <?php
        if (($_SESSION['logged'] == 1) && ($_SESSION['isAdmin'] == 2)) {
            echo "<a href='adminPanel.php'><span>Admin panel</span></a>";
        }
        ?>

		<a><?php
            print_r($_SESSION);
            ?>
		</a>
		<a id="loginButton" onclick="openNav()"><i class="material-icons" style="font-size:16px">person</i></a>
		<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>

</div>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "150px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

</body>