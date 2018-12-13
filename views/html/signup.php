<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 12/13/2018
 * Time: 3:33 PM
 */
?>
<body>
<h1>Sign up</h1>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form>
                <div class="form-group row">
                    <label for="username" class="col-4 col-form-label">User Name</label>
                    <div class="col-8">
                        <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text">
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
                        <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-4 col-form-label">Password</label>
                    <div class="col-8">
                        <input id="pass" name="pass" placeholder="Password" class="form-control here" required="required" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </div>
</body>