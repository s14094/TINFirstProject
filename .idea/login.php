<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 12/11/2017
 * Time: 20:10
 */
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

<?php include 'header.php'; ?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<form method="post" action="loginIn.php">
    <div class="box">

        <h1>LOGOWANIE</h1>

        <input type="text" placeholder="nick" name="userNickname" class="email"/>

        <input type="password" placeholder="hasło" name="userPassword" class="email"/>

        <input class="btn" value="Zaloguj" type="submit"></input>

        <a href="register.php">
            <div id="btn2">Rejestracja</div>
        </a>
    </div>

</form>
</body>
</html>


