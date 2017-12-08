<?php

session_start();

if (isset($_POST['email'])) {
    //Udana walidacja? Załóżmy, że tak!
    $wszystko_OK = true;

    //Sprawdź poprawność nickname'a
    $nick = $_POST['nick'];

    //Sprawdzenie długości nicka
    if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($nick) == false) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    // Sprawdź poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
    }

    //Sprawdź poprawność hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1) < 5) || (strlen($haslo1) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 5 do 20 znaków!";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //Czy zaakceptowano regulamin?
    if (!isset($_POST['regulamin'])) {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
    }

    //Bot or not? Oto jest pytanie!
    $sekret = "6Lf5oDkUAAAAAOPVrSyvnxLvjJR9AE_pp6E9U2xv";

    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $sekret . '&response=' . $_POST['g-recaptcha-response']);

    $odpowiedz = json_decode($sprawdz);

    /*
    if ($odpowiedz->success == false) {
        $wszystko_OK = false;
        $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
    }
    */

    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_nick'] = $nick;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "config.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
            }

            $rezultat = $polaczenie->query("SELECT id FROM users WHERE username='$nick'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_nickow = $rezultat->num_rows;
            if ($ile_takich_nickow > 0) {
                $wszystko_OK = false;
                $_SESSION['e_nick'] = "Istnieje już konto o takim nicku! Wybierz inny.";
            }

            if ($wszystko_OK == true) {

                //if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$nick', '$haslo_hash', '$email', 1)")) {
                if ($polaczenie->query("INSERT INTO users (username, password, email, accounttype) VALUES ('$nick', '$haslo_hash', '$email', 1)")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: index.php');
                } else {
                    throw new Exception($polaczenie->error);
                }
            }
            $polaczenie->close();
        }

    } catch (Exception $e) {
        echo '<br />Błąd: ' . $e;
    }

}


?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="register.css" type="text/css"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<style>
		.error {
			color: red;
			margin-top: 5px;
			margin-bottom: 10px;
			font-size: 10px;
		}
	</style>
</head>

<body>

<form method="post">

    <?php include 'header.php'; ?>

	<div class="box">
		<h1>REJESTRACJA</h1>

		Nickname: <br/> <input class="customInput" type="text" value="<?php
        if (isset($_SESSION['fr_nick'])) {
            echo $_SESSION['fr_nick'];
            unset($_SESSION['fr_nick']);
        }
        ?>" name="nick"/><br/>

        <?php
        if (isset($_SESSION['e_nick'])) {
            echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
            unset($_SESSION['e_nick']);
        }
        ?>

		E-mail: <br/> <input class="customInput" type="text" value="<?php
        if (isset($_SESSION['fr_email'])) {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
        ?>" name="email"/><br/>

        <?php
        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
            unset($_SESSION['e_email']);
        }
        ?>

		Twoje hasło: <br/> <input class="customInput" type="password" value="<?php
        if (isset($_SESSION['fr_haslo1'])) {
            echo $_SESSION['fr_haslo1'];
            unset($_SESSION['fr_haslo1']);
        }
        ?>" name="haslo1"/><br/>

        <?php
        if (isset($_SESSION['e_haslo'])) {
            echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>

		Powtórz hasło: <br/> <input class="customInput" type="password" value="<?php
        if (isset($_SESSION['fr_haslo2'])) {
            echo $_SESSION['fr_haslo2'];
            unset($_SESSION['fr_haslo2']);
        }
        ?>" name="haslo2"/><br/>

		<label style="padding-top: 10px;">
			<div class="customCheckbox">
			<input type="checkbox" name="regulamin" <?php
            if (isset($_SESSION['fr_regulamin'])) {
                echo "checked";
                unset($_SESSION['fr_regulamin']);
            }
            ?>/> Akceptuję regulamin
			</div>
		</label>

        <?php
        if (isset($_SESSION['e_regulamin'])) {
            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>

		<label>
			<div class="customCaptcha">
		<div class="g-recaptcha" data-sitekey="6Lf5oDkUAAAAAM99AyvdDS19PLrUYeNcUQcpR9NV"></div>

        <?php
        /*
        if (isset($_SESSION['e_bot'])) {
            echo '<div class="error">' . $_SESSION['e_bot'] . '</div>';
            unset($_SESSION['e_bot']);
        }
        */
        ?>
			</div>
		</label>

		<br/>

		<input type="submit" id="btn2" value="Zarejestruj się"/>
	</div>
</form>

</body>
</html>