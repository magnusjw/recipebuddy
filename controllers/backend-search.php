<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 05/12/2018
 * Time: 19:23
 */
require_once ('../database/Database_Gateway.php');
if(isset($_GET)){
    if($_GET['func'] == 'get_results'){
        if(isset($_REQUEST["term"])){
            // Set parameters
            $param_term = $_REQUEST["term"] . '%';
            Database_Gateway::getInstance()->searchIngredient($param_term);
        }
    }
    if($_GET['func'] == 'add_ingredient'){
        if(isset($_REQUEST["term"])){
            $result = Database_Gateway::getInstance()->getIngredientByName($_REQUEST["term"]);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(isset($_REQUEST["iduser"])){
                    Database_Gateway::getInstance()->addIngredientToUser($_REQUEST["iduser"],$row["id"],1);
                }
                echo '<div class="ingredient row">';
                echo '<input type="hidden" name="ingredientId[]" value="'.$row["id"].'">';
                echo '<div class="col-md-1">';
                echo '<img name="path[]" src="'.$row["path"].'" alt="..." class="img-thumbnail" width="50" height="50">';
                echo '</div>';
                echo '<div class="col-md-1">';
                echo '<p name="name[]" class="text-center">'.$row["name"].'</p>';
                echo '</div>';
                echo '<div class="col-md-1">';
                echo '<input name="quantity[]" type="number" name="quantity" value="1" min="0" max="100">';
                echo '</div>';
                echo '</div>';
            }
        }
    }
    if($_GET['func'] == 'add_ingredient_to_shoppinglist'){
        if(isset($_REQUEST["term"])){
            $result = Database_Gateway::getInstance()->getIngredientByName($_REQUEST["term"]);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(isset($_REQUEST["iduser"])){
                    Database_Gateway::getInstance()->addIngredientToUserShoppingList($_REQUEST["iduser"],$row["id"],1);
                }
                echo '<div class="ingredient row">';
                echo '<input type="hidden" name="ingredientId[]" value="'.$row["id"].'">';
                echo '<div class="col-md-1">';
                echo '<img name="path[]" src="'.$row["path"].'" alt="..." class="img-thumbnail" width="50" height="50">';
                echo '</div>';
                echo '<div class="col-md-1">';
                echo '<p name="name[]" class="text-center">'.$row["name"].'</p>';
                echo '</div>';
                echo '<div class="col-md-1">';
                echo '<input name="quantity[]" type="number" name="quantity" value="1" min="0" max="100">';
                echo '</div>';
                echo '</div>';
            }
        }
    }

}

