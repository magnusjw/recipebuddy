<?php
/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 14:13
 */
$idUser = $_COOKIE['idUser'];

$recipesList = Database_Gateway::getInstance()->getRecipesList($idUser);

require_once('views/html/homepage.php');
