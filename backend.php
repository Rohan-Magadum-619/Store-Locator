<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Backend</title>
</head>

<body>
    <?php include "navbar.php"?>
    <div class="container">
        <form method="post">
            <!-- <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
            <!-- <a href="create.php"><button type="button" class="btn btn-primary">Create</button></a>
            <button type="submit" class="btn btn-primary">Delete</button>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" class="btn btn-primary">Delete</button> -->

            <a href="stores.php"><button type="button" class="btn btn-primary mx-auto mt-5">Stores</button></a>
            <a href="brands.php"><button type="button" class="btn btn-primary mx-auto mt-5">Brands</button></a>
        </form>
    </div>

</body>

</html>