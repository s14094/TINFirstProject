<?php
/**
 * Created by IntelliJ IDEA.
 * User: zielo
 * Date: 2017-11-13
 * Time: 12:27
 */
?>


<?php

require_once "connect.php";

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

$connect = @new mysqli_init($host, $db_user, $db_password, $db_name, $port);

if ($connect->connect_errno != 0) {
    echo "Error" . $connect->connect_errno . "opis:" . $connect->connect_error;
} else {
    $login = $_POST['userNickname'];
    $password = $_POST['userPassword'];

    $connect->close();

}


echo $login;
echo $password;

?>