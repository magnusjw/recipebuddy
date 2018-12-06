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
      <textarea class="form-control" rows="3" id="wishlist"></textarea>
      <button onClick="displaywishlist()"type = "button" class = "btn btn-default">Add</button>
    </div>
  </form>
</div>

<script>

var wishlist_ = []
function displaywishlist() {
    var x = document.getElementById("wishlist").value;
    wishlist_.push(x);

    var ul = document.getElementById("wl");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(x));
    ul.appendChild(li);

}
</script>
</body>