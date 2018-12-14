<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 12/13/2018
 * Time: 3:29 PM
 */
?>
<body>
<h1>Login</h1>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form>
                <div class="form-group row">
                    <label for="username" class="col-4 col-form-label">User Name</label>
                    <div class="col-8">
                        <input id="username" name="username" placeholder="Username" class="form-control here" type="text" pattern=".{5,12}" required title="5 to 12 characters">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-4 col-form-label">Password</label>
                    <div class="col-8">
                        <input id="pass" name="pass" placeholder="Password" class="form-control here" type="Password" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                        <button name="signup" href="localhost/recipebuddy/index?action=signup" class="btn btn-secondary">Don't have an account? Sign up!</button>
                    </div>
                </div>
</body>