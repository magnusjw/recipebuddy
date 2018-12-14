<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:18
 */
include_once "headband.html";
?>
<body>
<link rel="stylesheet" href="views/css/pantry_stylesheet.css">
<h1>Create a Recipe</h1>
<form action="index?action=display_recipe" method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <label for="inputTitle" class="col-md-2 col-form-label"><h3>Title</h3></label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="inputTitle" placeholder="Enter a title" name="inputTitle">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputDescription" class="col-md-2 col-form-label"><h3>Description</h3></label>
        <div class="col-md-4">
            <textarea class="form-control" rows="4" placeholder="Add a description" name="inputDescription"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputDifficulty" class="col-md-2 col-form-label"><h3>Difficulty</h3></label>
        <div class="col-md-1">
            <select class="form-control" id="inputDifficulty" name="inputDifficulty">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputTime" class="col-md-2 col-form-label"><h3>Time</h3></label>
        <div class="col-md-1">
            <input type="text" class="form-control" id="inputTime" placeholder="Hours" name="inputHour">
        </div>
        <div class="col-md-1">
            <input type="text" class="form-control" id="inputTime" placeholder="Minutes" name="inputMinute">
        </div>
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
                        // Display the returned data in browser
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
                var ingredientDisplay = $('[name="ingredient-display"]');
                $.get("controllers/backend-search.php?func=add_ingredient", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    ingredientDisplay.append(data);
                });

            })
        });
    </script>
    <div class="form-group row">
        <label for="searchIngredient" class="col-md-2 col-form-label"><h3>Ingredients</h3></label>
        <div class="col-md-4">
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
    </div>
    <div class="container-fluid" name="ingredient-display">
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click","#addStep",function () {
                var matched = $(".step");
                var step = "<div class='step'> <h5>Step "+ (matched.length+1)  +"</h5> <div class='col-md-4'>" +
                    "<input type='text' class='form-control' id='inputTitle' placeholder='Enter a title' name='stepTitle[]'>"+
                    "</div> <div class='col-md-6'> <textarea class='form-control' rows='4' placeholder='Add a description' name='stepDescription[]'></textarea>"+
                    "</div> </div>"
                $('[name="steps"]').append(step);
            })
        });
    </script>
    <div class="steps" name="steps">
        <h3>Steps</h3>
        <div class="step">
            <h5>Step 1</h5>
            <div class="col-md-4">
                <input type="text" class="form-control" id="inputTitle" placeholder="Enter a title" name="stepTitle[]">
            </div>
            <div class="col-md-6">
                <textarea class="form-control" rows="4" placeholder="Add a description" name="stepDescription[]"></textarea>
            </div>
        </div>
    </div>
    <br>
    <button type="button" class="btn btn-default" id="addStep">Add Step</button>

    <div class="form-group row">
        <label for="fileToUpload" class="col-md-3 col-form-label"><h3>Select a picture</h3></label>
        <div class="col-md-3">
            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" accept="image/*">
        </div>
    </div>

    <button type="submit" class="btn btn-primary" name="create_recipe">Create Recipe!</button>
    <button type="reset" class="btn btn-primary">Cancel</button>
</form>

</body>
