<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 12/12/2017
 * Time: 21:57
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="moviesDelete.css">
</head>
<body>

<?php

session_start();
include("config.php");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$var_id = $_POST['varid'];

$sql = "DELETE FROM testmovies WHERE movieId = '$var_id'";


if ($db->query($sql) === TRUE) {
    echo "Usunięto film";
    echo "<form action='movies.php'><button class='btn'>ok</button></form>";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$db->close();
header("Location: movies.php")
?>

</body>
</html>
