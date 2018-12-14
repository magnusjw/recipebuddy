<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 13/12/2018
 * Time: 16:55
 */
if(isset($_POST["login"])){
    //Check if the user is in the database
    $id = Database_Gateway::getInstance()->checkUser($_POST['username'],$_POST['pass']);
    if($id=!-1){
        setcookie("idUser",$id,time() + (1800 * 30), "/");
        //Replace by : https://webspace.clarkson.edu/projects/JTAQ/public_html/index?action=homepage
        header('Location: http://localhost/recipebuddy/index?action=homepage');
        exit();
    }
    else{
        require_once ('views/html/login.php');
    }
}
elseif (isset($_POST["gosignup"])){
    require_once ('views/html/signup.php');
}
elseif (isset($_POST["signup"])){
    //Insert a new user into the database
    Database_Gateway::getInstance()->insertuser($_POST['username'],$_POST['lastname'],$_POST['firstname'],$_POST['pass'],$_POST['email']);
    require_once ('views/html/login.php');
}
else{
    require_once ('views/html/login.php');
}
