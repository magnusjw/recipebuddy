<?php
/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 18/11/2018
 * Time: 16:33
 */
include_once "headband.html";
?>
<body>
   <div class="container">
  <h2>Wishlist</h2>
  <form>
    <div class="form-group">
      <ul id = "wl"></ul>
      <label for="wishlist">Add your wish</label>
      <body>
   <div class="container">
  <h2>Wishlist</h2>
  <form>
    <div class="form-group">
      <ul id = "wl"></ul>
      <label for="wishlist">Add your wish</label>
      <input type=text id="wishlist"></input>
      <button onClick="displaywishlist()"type = "button" class = "btn btn-default">Add</button>
      <button onClick="deletewishlist()"type = "button" class = "btn btn-default">Delete</button>
    </div>
  </form>
</div>

<script>

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
}
</script>
</body>