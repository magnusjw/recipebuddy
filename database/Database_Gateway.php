<?php

/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 03/12/2018
 * Time: 16:11
 */
class Database_Gateway
{
    private static $_instance = null;

    private function __construct() {

    }

    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new Database_Gateway();
        }

        return self::$_instance;
    }

    private function dbConnection(){
        //Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "recipe_buddy";

        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";

        return $conn;
    }

    public function insertNewIngredient($name,$category,$image_path){
        $conn = self::dbConnection();
        //Insert a new ingredient in the database
        $query = sprintf("INSERT INTO `picture`(`name`,`path`) VALUES('%s','%s')",$name, $image_path);
        mysqli_query($conn, $query);
        $last_id = $conn->insert_id;
        $query = sprintf("INSERT INTO `ingredient`(`name`,`category`,`idPicture`) VALUES('%s','%s','%s')",$name, $category,$last_id);
        mysqli_query($conn, $query);
        $last_id = $conn->insert_id;
        $conn->close();
        return $last_id;
    }

    public function addIngredientToUser($userId,$ingredientId,$quantity){
        //Attach an ingredient to a user with a quantity
        $conn = self::dbConnection();
        //Insert a new ingredient in the database
        $query = sprintf("INSERT INTO `pantry`(`idUser`,`idIngredient`,`quantity`) VALUES('%s','%s','%s')",$userId, $ingredientId,$quantity);
        mysqli_query($conn, $query);
        $conn->close();
    }

    public function getPantry($userId){
        $conn = self::dbConnection();
        $query = sprintf("SELECT * FROM pantry,ingredient,picture WHERE pantry.idUser = %s AND ingredient.idPicture = picture.id AND pantry.idIngredient = ingredient.id;",$userId);
        $results = mysqli_query($conn, $query);
        $conn->close();
        return $results;
    }

    public function updatePantry($userId,$arrayIngredient,$arrayQuantity){
        $conn = self::dbConnection();
        for ($i = 0; $i < count($arrayIngredient); $i++) {
            if($arrayQuantity[$i] > 0){
                $query = sprintf("UPDATE pantry SET quantity= %s WHERE idUser = %s AND idIngredient = %s;",$arrayQuantity[$i],$userId,$arrayIngredient[$i]);
            }
            else{
                $query = sprintf("DELETE FROM pantry WHERE idUser = %s AND idIngredient = %s;",$userId,$arrayIngredient[$i]);
            }
            mysqli_query($conn, $query);
        }
        $conn->close();
    }

    public function searchIngredient($ingredient){
        $conn = self::dbConnection();
        // Prepare a select statement
        $sql = "SELECT * FROM ingredient WHERE LOWER(name) LIKE LOWER(?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $ingredient);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                // Check number of rows in the result set
                if(mysqli_num_rows($result) > 0){
                    // Fetch result rows as an associative array
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo "<p>" . $row["name"] . "</p>";
                    }
                } else{
                    echo "<p>No matches found</p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    public function getIngredientByName($name){
        $conn = self::dbConnection();
        $query = sprintf('SELECT ingredient.id AS id,ingredient.name AS name, ingredient.category AS category, picture.path AS path FROM ingredient,picture WHERE LOWER(ingredient.name) = LOWER("%s") AND ingredient.idPicture = picture.id;',$name);
        $results = mysqli_query($conn, $query);
        $conn->close();
        return $results;
    }

    public function getIngredientById($id){
        $conn = self::dbConnection();
        $query = sprintf('SELECT ingredient.id AS id,ingredient.name AS name, ingredient.category AS category, picture.path AS path FROM ingredient,picture WHERE ingredient.id = %s AND ingredient.idPicture = picture.id;',$id);
        $results = mysqli_query($conn, $query);
        $conn->close();
        return $results;
    }

    public function insertNewRecipe($idUser,$recipe){
        $conn = self::dbConnection();
        $query = sprintf('INSERT INTO recipe(name,description,difficulty,time,idUser) VALUES("%s","%s",%s,"%s",%s);',$recipe->getName(),$recipe->getDescription(),$recipe->getdifficulty(),$recipe->getTime(),$idUser);
        mysqli_query($conn, $query);
        $idRecipe = $conn->insert_id;

        $query = sprintf('INSERT INTO picture(name,path) VALUES("%s","%s");',$recipe->getName(),$recipe->getPictures()[0]);
        mysqli_query($conn, $query);
        $idPicture = $conn->insert_id;

        $query = sprintf('INSERT INTO recipe_pictures(idRecipe,idPicture,date) VALUES(%s,%s,NOW());',$idRecipe,$idPicture);
        echo $query;
        mysqli_query($conn, $query);

        for($i=0;$i<count($recipe->getSteps());$i++){
            $query = sprintf('INSERT INTO step(name,description,idRecipe) VALUES("%s","%s",%s);',$recipe->getSteps()[$i]->getName(),$recipe->getSteps()[$i]->getDescription(),$idRecipe);
            mysqli_query($conn, $query);
        }

        $query = sprintf('INSERT INTO rating(idRecipe,rating) VALUES(%s,%s);',$idRecipe,0);
        mysqli_query($conn, $query);

        for($i=0;$i<count($recipe->getIngredients());$i++){
            $query = sprintf('INSERT INTO recipe_ingredients(idRecipe,idIngredient,quantity) VALUES(%s,%s,%s);',$idRecipe,$recipe->getIngredients()[$i]->getId(),$recipe->getIngredients()[$i]->getQuantity());
            mysqli_query($conn, $query);
        }

        $conn->close();
    }

    public function getRecipe($idRecipe){
        $conn = self::dbConnection();
        $query = sprintf('SELECT * FROM recipe WHERE id = %s;',$idRecipe);
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();

        $id = $row["id"];
        $name = $row["name"];
        $description = $row["description"];
        $difficulty = $row["difficulty"];
        $time = $row["time"];

        $ingredients = [];
        $query = sprintf('SELECT ingredient.id,ingredient.name,ingredient.category,recipe_ingredients.quantity,picture.path FROM recipe_ingredients,ingredient,picture WHERE idRecipe = %s AND recipe_ingredients.idIngredient = ingredient.id AND ingredient.idPicture = picture.id;',$idRecipe);
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            array_push($ingredients,new Ingredient($row["id"],$row["name"],$row["category"],$row["path"],$row["quantity"]));
        }

        $steps = [];
        $query = sprintf('SELECT * FROM step WHERE idRecipe = %s;',$idRecipe);
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            array_push($steps,new Step($row["id"],$row["name"],$row["description"]));
        }

        $rating = [];
        $query = sprintf('SELECT * FROM rating WHERE idRecipe = %s;',$idRecipe);
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            array_push($rating,$row["rating"]);
        }

        $pictures = [];
        $query = sprintf('SELECT * FROM recipe_pictures,picture WHERE recipe_pictures.idRecipe = %s AND recipe_pictures.idPicture = picture.id;',$idRecipe);
        $result = mysqli_query($conn, $query);
        while($row = $result->fetch_assoc()){
            array_push($pictures,$row["path"]);
        }

        $recipe = new Recipe($id,$name,$description,$difficulty,$time,$rating,$ingredients,$steps,$pictures);
        $conn->close();

        return $recipe;
    }

    public function getRecipesList($idUser){
        $conn = self::dbConnection();
        $query = sprintf('SELECT id FROM recipe WHERE idUser = %s;',$idUser);
        $result = mysqli_query($conn, $query);
        $recipesList = [];
        while($row = $result->fetch_assoc()){
            $idRecipe = $row["id"];
            array_push($recipesList,Database_Gateway::getInstance()->getRecipe($idRecipe));
        }
        $conn->close();
        return $recipesList;
    }

    public function addWishlist($idUser,$title,$wish){
        $conn = self::dbConnection();
        $query = sprintf('INSERT INTO wish(title,description,idUser) VALUES("%s","%s",%s);', $title,$wish, $idUser);
        mysqli_query($conn, $query);
        $conn->close();
    }
    public function getWishlist($userId){
        $conn = self::dbConnection();

        $query = sprintf('SELECT * FROM wish WHERE idUser = %s;',$userId);

        $results = mysqli_query($conn, $query);
        $conn->close();

        return $results;
    }
    public function deleteWish($idUser,$id){
        $conn = self::dbConnection();
        print ($idUser);
        print ("and");
        print($id);
        $query = sprintf("DELETE FROM wish WHERE idUser = %s AND idWishlist = %s;",$idUser,$id);
        mysqli_query($conn, $query);
        $conn->close();
    }


}