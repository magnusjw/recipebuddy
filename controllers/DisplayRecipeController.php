<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 06/12/2018
 * Time: 19:43
 */
$idUser = 1;

if(isset($_POST["create_recipe"])){
    $time = $_POST["inputHour"].":".$_POST["inputMinute"].":00";
    $rating = [];
    $ingredients = [];
    if(isset($_POST["ingredientId"])){
        for($i=0;$i < count($_POST["ingredientId"]);$i++){
            $result = Database_Gateway::getInstance()->getIngredientById($_POST["ingredientId"][$i]);
            if($result->num_rows > 0){
                $ingredient = $result->fetch_assoc();
                array_push($ingredients,new Ingredient($_POST["ingredientId"][$i],$ingredient["name"],$ingredient["category"],$ingredient["path"],$_POST["quantity"][$i]));
            }
        }
    }

    $steps = [];
    if(isset($_POST["stepTitle"])){
        for($i=0;$i < count($_POST["stepTitle"]);$i++){
            array_push($steps,new Step(NULL,$_POST["stepTitle"][$i],$_POST["stepDescription"][$i]));
        }
    }

    $pictures = [];
    if(isset($_FILES) && $_FILES["fileToUpload"]["name"] != ""){
        $target_dir = "resources/recipes_pictures/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
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
                array_push($pictures,$target_file);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    $recipe = new Recipe(0,$_POST["inputTitle"],$_POST["inputDescription"],$_POST["inputDifficulty"],$time,$rating,$ingredients,$steps,$pictures);
    //echo var_dump($recipe);
    //Insert the recipe into the database
    Database_Gateway::getInstance()->insertNewRecipe($idUser,$recipe);
}
elseif (isset($_GET["idRecipe"])){
    $recipe = Database_Gateway::getInstance()->getRecipe($_GET["idRecipe"]);
}


require_once ('views/html/display_recipe.php');
