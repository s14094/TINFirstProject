<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 20/11/2017
 * Time: 13:15
 */
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $var_haslo = $_POST['password'];
    $var_hash = md5($var_haslo);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and (password = '$var_hash') || (password = '$var_haslo')";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $var_userId = $row['id'];
    $get_isAdmin = "SELECT accounttype FROM users WHERE id = '$var_userId'";
    $resultTwo = mysqli_query($db, $get_isAdmin);
    $rowTwo = mysqli_fetch_array($resultTwo, MYSQLI_ASSOC);
    $var_isAdmin = $rowTwo['accounttype'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['logged'] = true;
        $_SESSION['isAdmin'] = $var_isAdmin;
	    $_SESSION['userId'] = $var_userId;

        echo '<script type="text/javascript">
           window.location = "index.php"</script>';

    } else {
        $_SESSION['logged'] = false;
        $error = "Niepoprawny Login lub Hasło. " . $var_haslo . "  xxx   " . $hash_input;
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

	<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

</body>
</html>
