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
        echo "Connected successfully";

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
}