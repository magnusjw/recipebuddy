<?php
/**
 * Created by PhpStorm.
 * Date: 10/11/2018
 * Time: 14:19
 */
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'homepage') {
        require_once('controllers/HomePageController.php');
    }
    elseif ($_GET['action'] == 'create_recipe') {

    }
}
?>