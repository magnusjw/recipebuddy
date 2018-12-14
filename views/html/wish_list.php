<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 18/11/2018
 * Time: 16:33
 */
include_once "headband.html";
?>


<link rel="stylesheet" href="views/css/wishlist_stylesheet.css">
<body>
<form action="index?action=wish_list"  method="post">
   <div class="container">
       <h1>Wishlist</h1>

       <?php
            $num = 1;

           foreach ($wishlist as $wish){

               echo '<div class = "panel panel-default" >';
               echo '<div class = "panel-body"> ';
               echo '<input readonly type = text class = "form-control" name = "'."onewish".$num.'" value = "'.$wish->getDescription().'">';
               $delete_wish_num = "deletewish".$num;
               $delete_button = "X";
               echo '<button type = "submit" class = "btn btn-primary" name = "'.$delete_wish_num.'">'.$delete_button.'</button>';
               echo '</div>';
               echo '</div>';
               $num++;
           }

        ?>

       <label for="wishlist">Add Your Wish</label>
       <input type="text" class = "form-control" id="wishlist" name="wishlist"></input>
       <!-- <button  onClick="displaywishlist()" type = "button" class = "btn btn-default" >Add</button>-->
       <button type = "submit" class = "btn btn-primary" name = "saveWish">Add</button>
   </div>
</form>

<script>

/*
var wishlist_ = []
function displaywishlist() {
    var ul = document.getElementById("wl");
    var input = document.getElementById("wishlist");
    var li = document.createElement("li");
    li.setAttribute('id',input.value);
    li.appendChild(document.createTextNode(input.value));
    ul.appendChild(li);


}

function deletewishlist(){
	var ul = document.getElementById("wl");
    var temp = document.getElementById("wishlist");
    var item = document.getElementById(temp.value);
    ul.removeChild(item);
          <button onClick="deletewishlist()"type = "button" class = "btn btn-default">Delete</button>

}*/
</script>
</body>