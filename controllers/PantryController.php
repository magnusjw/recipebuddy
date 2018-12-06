<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 18/11/2018
 * Time: 16:28
 */
    $user_id = 1;

if(isset($_POST)) {
   //echo var_dump($_POST);
    if(isset($_POST["add_ingredient"])){
        $ingredient_name = $_POST["ingredientName"];
        $ingredient_category = $_POST["category"];
        $target_dir = "resources/ingredients_pictures/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                //Inserting data into the database
                $last_id = Database_Gateway::getInstance()->insertNewIngredient($ingredient_name,$ingredient_category,$target_file);
                Database_Gateway::getInstance()->addIngredientToUser($user_id,$last_id,1);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    if(isset($_POST["save_ingredients"])){
        Database_Gateway::getInstance()->updatePantry($user_id,$_POST["ingredientId"],$_POST["quantity"]);
    }
}

$array_ingredient = [];
$db_ingredients = Database_Gateway::getInstance()->getPantry($user_id);
if($db_ingredients->num_rows > 0){
    while($row = $db_ingredients->fetch_assoc()){
        array_push($array_ingredient,new Ingredient($row["idIngredient"],$row["name"],$row["category"],$row["path"],$row["quantity"]));
    }
}

require_once ('views/html/pantry.php');