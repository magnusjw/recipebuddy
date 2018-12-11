<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:37
 */
$user_id = 1;
echo var_dump($_POST);
if(isset($_POST)){
    if(isset($_POST["saveWish"])){
        $wish = $_POST["wishlist"];
        $title = "wishlist";
        Database_Gateway::getInstance()->addWishlist($user_id,$title,$wish);
    }

}
$wishlist = [];
$db_wishlist = Database_Gateway::getInstance()->getWishlist($user_id);
if($db_wishlist->num_rows > 0){
    while($row = $db_wishlist->fetch_assoc()){
        array_push($wishlist,new Wish($row["title"],$row["description"],$row["idUser"]));
   }
}
/*
foreach ($wishlist as $wish){
 echo $wish;
}*/
require_once ('views/html/wish_list.php');