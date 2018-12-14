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

           foreach ($wishlist as $wish){
               echo '<div class = "panel panel-default" >';
               echo '<div class = "panel-body"> ';
               echo '<p type = text name = "onewish">'.$wish->getDescription().'</p>';
               echo '<button type = "submit" class = "btn btn-warning" name = "deleteWish">X</button>';
               echo '</div>';

               echo '</div>';

           }

        ?>

       <label for="wishlist">Add your wish</label>
       <input type="text" class = "form-control" id="wishlist" name="wishlist"></input>
       <!-- <button  onClick="displaywishlist()" type = "button" class = "btn btn-default" >Add</button>-->
       <button type = "submit" class = "btn btn-primary" name = "saveWish">Add</button>
   </div>
</form>

<script>
    function display(){
        var ul = document.getElementById("onewish");
        console.log(ul);
        var li = docuement.createElement("li");
        li.setAttribute('id',ul.value)
        li.appendChild(document.createTextNode(ul.value));
    }
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