<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 20/11/2017
 * Time: 13:20
 */

   session_start();

   if(session_destroy()) {
       header("Location: login.php");
   }
?>