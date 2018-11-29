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
        require_once ('controllers/CreateRecipeController.php');
    }
    elseif ($_GET['action'] == 'pantry') {
        require_once ('controllers/PantryController.php');
    }
    elseif ($_GET['action'] == 'shopping_list') {
        require_once ('controllers/ShoppingListController.php');
    }
    elseif ($_GET['action'] == 'wish_list') {
        require_once ('controllers/WishListController.php');
    }
    elseif ($_GET['action'] == 'timer') {
        require_once ('controllers/TimerController.php');
    }
    elseif ($_GET['action'] == 'account') {
        require_once ('controllers/AccountController.php');
    }
}
?>