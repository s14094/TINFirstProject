<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 12/11/2017
 * Time: 20:20
 */
?>




<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="register.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
</head>

<body>

<?php include 'header.php'; ?>

<form method="post" action="index.html">
	<div class="box">

		<h1>REJESTRACJA</h1>

		<input type="text" placeholder="nickname" class="customInput"/>

		<input type="email" placeholder="email" class="customInput"/>

		<input type="password" placeholder="haslo" class="customInput"/>

		<input type="password" placeholder="powtórz hasło" class="customInput"/>

		<label>
			<div class="customCheckbox"><input type="checkbox" class="checkboxInput"/> Akceptuje regulamin</div>
		</label>

		<a href="register.php">
			<div id="btn2">Zarejestruj</div>
		</a>

	</div>
</form>

</body>
</html>