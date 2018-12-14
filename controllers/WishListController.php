<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:37
 */
$user_id = 1;
//echo var_dump($_POST);
//$global_num = 1;
if(isset($_POST)){
    if(isset($_POST["saveWish"])){
        $wish = $_POST["wishlist"];
        $title = "wishlist";
        if($wish != "")
            Database_Gateway::getInstance()->addWishlist($user_id,$title,$wish);
        else
            echo "You  can't add empty wish";
    }
    $tmp_db_wishlist = Database_Gateway::getInstance()->getWishlist($user_id);
    if($tmp_db_wishlist->num_rows > 0) {
        $num = 1;
       while ($row = $tmp_db_wishlist->fetch_assoc()) {


            $newDeleteWish = "deletewish".$num;
            //print($newDeleteWish);
            if (isset($_POST[$newDeleteWish])) {
                $tmp_db_wishlist2 = Database_Gateway::getInstance()->getWishlist($user_id);
                $wishlist_id = 0;
                print ("Wish: ");
                print($_POST["onewish".strval($num)]);
                print (" ");

                if ($tmp_db_wishlist2->num_rows > 0) {
                    while ($row = $tmp_db_wishlist2->fetch_assoc()) {
                        if ($row["description"] == $_POST["onewish" . strval($num)]) {
                            $wishlist_id = $row["id"];
                            break;
                        }
                    }
                }
                //print ($wishlist_id);
                Database_Gateway::getInstance()->deleteWish($user_id, $wishlist_id);

            }
            $num++;
        }
    }

}
$wishlist = [];
$db_wishlist = Database_Gateway::getInstance()->getWishlist($user_id);
if($db_wishlist->num_rows > 0){
    while($row = $db_wishlist->fetch_assoc()){
        array_push($wishlist,new Wish($row["idUser"],$row["title"],$row["description"]));
   }
}

//foreach ($wishlist as $wish){
// echo var_dump($wish);
//}
require_once ('views/html/wish_list.php');