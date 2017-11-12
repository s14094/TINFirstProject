<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 12/11/2017
 * Time: 18:50
 */
?>

<!doctype html>

<html>
<head>
    <title>Movies & Series</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Zaloguj</a>
    <a href="#">Zarejestruj</a>
</div>

<div class="header-cont">

    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Home</a>
        <a href="#movies">Filmy</a>
        <a href="#series">Seriale</a>
        <a id="loginButton"  onclick="openNav()"><i class="material-icons" style="font-size:16px">person</i></a>
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
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
</script>

</body>