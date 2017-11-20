<?php
/**
 * Created by IntelliJ IDEA.
 * User: pawellakomiec
 * Date: 20/11/2017
 * Time: 13:37
 */

session_start(); // Right at the top of your script
?>




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
<?php
   if($count==1)
   {
       $_SESSION['logged']=true;
       $_SESSION['username']=$myusername;
       echo "Login worked";
       exit();
   }
   else
   {
       $_SESSION['logged']=false;
       echo "Login failed";
       exit();
   }
?>
</div>
