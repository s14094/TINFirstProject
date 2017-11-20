

<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 20/11/2017
 * Time: 13:15
 */

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {

        $_SESSION['login_user'] = $myusername;

        echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';

    }else {
        $error = "Niepoprawny Login lub Hasło.";
    }
}
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>


<div class="box">
	<form action="" method="post">

        <h1>LOGOWANIE</h1>

        <input type="text" placeholder="nick" name="username" class="email"/>

        <input type="password" placeholder="hasło" name="password" class="email"/>

        <input class="btn" value="Zaloguj" type="submit"/>

	</form>
        <a href="register.php">
            <div id="btn2">Rejestracja</div>
        </a>

	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

</body>
</html>
