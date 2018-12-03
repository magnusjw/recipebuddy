<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:32
 */
include_once "headband.html";
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h2>My Pantry</h2>
            </div>
            <div class="col-md-6">
                <form class="form-inline form-control-lg">
                    <input class="form-control w-75" type="text" placeholder="Search" aria-label="Search">
                    <Button type="button" class="btn btn-primary" input="submit">Search</Button>
                </form>
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

</body>