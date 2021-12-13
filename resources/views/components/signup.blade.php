<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="col-md-3 text-end">
        <a href="/" type="button" class="btn btn-primary">Back</a>
    </div>
</header>
<body class="text-center" style="background: #c6d1e3">
<div class="container h-100" style="width: 300px; margin-top: 200px">
    <div class="row h-100 justify-content-center align-items-center">
        <form class="col-12" action="/" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" style="font-weight: bold">Email address</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword" style="font-weight: bold">Password</label>
            </div>
            <div class="form-floating">
                <input name="repeat_password" type="password" class="form-control" id="floatingPassword" placeholder="Repeat password">
                <label for="floatingPassword" style="font-weight: bold">Repeat password</label>
            </div>
            <div class="form-floating">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            </div>
        </form>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
