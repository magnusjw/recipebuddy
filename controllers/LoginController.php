<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 13/12/2018
 * Time: 16:55
 */
if(isset($_POST["login"])){
    //Check if the user is in the database

    setcookie("idUser",1,time() + (1800 * 30), "/");
    header('Location: http://localhost/recipebuddy/index?action=homepage');
    exit();
}
elseif (isset($_POST["signup"])){
    require_once ('views/html/signup.php');
}
else{
    require_once ('views/html/login.php');
}
