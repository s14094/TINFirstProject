
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="moviesAdd.css">
</head>
<body>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 11/12/2017
 * Time: 16:50
 */


session_start();
include("config.php");

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$var_value = $_POST['varname'];
$var_userId = $_SESSION['userId'];

$sql = "INSERT INTO testmovies (moviename, userid) VALUES ('$var_value', '$var_userId')";

if ($db->query($sql) === TRUE) {
    echo "Pomyślnie dodano film";
    echo "<form action='movies.php'><button class='btn'>ok</button></form>";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$db->close();
header("Location: movies.php")
?>

</body>
</html>
