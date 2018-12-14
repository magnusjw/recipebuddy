<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 12/13/2018
 * Time: 3:33 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>Sign up</h1>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form method="post">
                <div class="form-group row">
                    <label for="username" class="col-4 col-form-label">User Name</label>
                    <div class="col-8">
                        <input id="username" name="username" class="form-control here" type="text" pattern=".{5,12}" required title="5 to 12 characters">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstname" class="col-4 col-form-label">First Name</label>
                    <div class="col-8">
                        <input id="firstname" name="firstname" placeholder="First Name" class="form-control here" required="required" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                    <div class="col-8">
                        <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" required="required" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-4 col-form-label">Password</label>
                    <div class="col-8">
                        <input id="pass" name="pass" placeholder="Password" class="form-control here" type="password" pattern=".{5,12}" required title="5 to 12 characters">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="conpass" class="col-4 col-form-label">Confirm Password</label>
                    <div class="col-8">
                        <input id="conpass" name="conpass" placeholder="Confirm Password" class="form-control here" type="password" pattern=".{5,12}" required title="Must match the previous entry">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="signup" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </div>
</body>
