<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 20/11/2017
 * Time: 13:17
 */


   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'tinfirstproject');
    //$port = 3306;
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>