<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:32
 */
include_once "headband.html";
?>
<body>
    <link rel="stylesheet" href="views/css/pantry_stylesheet.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h2>My Pantry</h2>
            </div>
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.search-box .input-group input[type="text"]').on("keyup input", function(){
                        /* Get input value on change */
                        var inputVal = $(this).val();
                        var resultDropdown = $('.search-box .result');
                        if(inputVal.length){
                            $.get("controllers/backend-search.php?func=get_results", {term: inputVal}).done(function(data){
                                console.log("searching");
                                resultDropdown.html(data);
                            });
                        } else{
                            resultDropdown.empty();
                        }
                    });

                    // Set search input value on click of result item
                    $(document).on("click", ".search-box .result p", function(){
                        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                        $(this).parent(".result").empty();
                    });

                    $(document).on("click",".search-box .input-group .input-group-append .btn",function () {
                        var inputVal = $('.search-box .input-group input[type="text"]').val();
                        var php_var = "<?php echo $user_id; ?>";
                        var ingredientDisplay = $('[name="ingredient-display"]');
                        $.get("controllers/backend-search.php?func=add_ingredient", {term: inputVal,iduser: php_var}).done(function(data){
                            // Display the returned data in browser
                            ingredientDisplay.append(data);
                        });
                        console.log("click");
                    })
                });
            </script>
            <div class="col-md-6">
                <div class="search-box">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ingredient" aria-describedby="basic-addon">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Add</button>
                        </div>
                    </div>
                    <div class="result"></div>
                </div>
            </div>

            <div class="col-md-3">
                <form class="form-inline form-control-lg">
                    <Button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Ingredient</Button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add a new ingredient</h4>
                </div>
                <form action="index?action=pantry" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ingredientName">Ingredient's Name : </label>
                            <input type="text" class="form-control" id="ingredientName" name="ingredientName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="category">Select a category</label>
                            <select class="form-control" id="category" name="category">
                                <option>Meat</option>
                                <option>Vegetable</option>
                                <option>Fruit</option>
                                <option>Egg</option>
                                <option>Milk</option>
                                <option>Fat</option>
                                <option>Sugar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fileToUpload">Select a picture</label>
                            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" name="add_ingredient">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form action="index?action=pantry"  method="post">
        <div class="container-fluid" name="ingredient-display">
            <?php foreach ($array_ingredient as $ingredient){
                echo '<div class="ingredient row">';
                    echo '<input type="hidden" name="ingredientId[]" value="'.$ingredient->getId().'">';
                    echo '<div class="col-md-1">';
                        echo '<img name="path[]" src="'.$ingredient->getPicture().'" alt="..." class="img-thumbnail" width="50" height="50">';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                        echo '<p name="name[]">'.$ingredient->getName().'</p>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                        echo '<input name="quantity[]" type="number" name="quantity" value="'.$ingredient->getQuantity().'" min="0" max="100">';
                    echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary" name="save_ingredients">Save Pantry</button>
    </form>

</body>