<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:34
 */
include_once "headband.html";
?>

<script>
    function showpsw() {
        var x = document.getElementById("newpass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


<body>
<h1>Account</h1>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form>
                <div class="form-group row">
                    <label for="username" class="col-4 col-form-label">User Name</label>
                    <div class="col-8">
                        <input id="username" name="username" placeholder="Username" class="form-control here" max="12" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="firstname" class="col-4 col-form-label">First Name</label>
                    <div class="col-8">
                        <input id="firstname" name="firstname" placeholder="First Name" class="form-control here" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                    <div class="col-8">
                        <input id="lastname" name="lastname" placeholder="Last Name" class="form-control here" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-4 col-form-label">Email</label>
                    <div class="col-8">
                        <input id="email" name="email" placeholder="Email" class="form-control here" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newpass" class="col-4 col-form-label">New Password</label>
                    <div class="col-8">
                        <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="password">
                        <input type="checkbox" onclick="showpsw()">Show Password</input>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                    </div>
                </div>
</body>