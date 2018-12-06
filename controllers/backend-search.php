<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 05/12/2018
 * Time: 19:23
 */
if(isset($_REQUEST["term"])){
    // Set parameters
    $param_term = $_REQUEST["term"] . '%';
    Database_Gateway::getInstance()->searchIngredient($param_term);
}