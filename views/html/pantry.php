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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</body>