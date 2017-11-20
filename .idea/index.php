<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 08/11/2017
 * Time: 15:31
 */

session_start();
?>


<!doctype html>

<html>
<head>
	<title>Movies & Series</title>
	<meta http-equiv="Location" content="index; text/html; charset=utf-8">

	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<header id="pageHeader"></header>

<?php include 'header.php'; ?>

<article id="mainArticle">Article</article>
<nav id="mainNav">Nav
    <?php

    echo "witaj " . $userNickname . "!"

    ?>
</nav>
<div class="ads" id="siteAds">Ads</div>
<footer id="pageFooter">Footer</footer>
</body>