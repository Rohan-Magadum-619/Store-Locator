<?php
$adminerror= false;
$_SESSION['admin'] = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    include "config.php";
    $sql = "SELECT * from `user` where email = '$email' and password = '$password' and usertype = 'admin'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            header("location:backend.php");
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['admin'] = true;
        } else if ($num == 0) {
            $adminerror = true;
        }
    } else {
        echo mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <h1 class="mt-5 mx-5">Login To Admin</h1>
    <form class="mx-5 mt-2" method="post">
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
        </div>
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <?php
            if ($adminerror)
            {
                echo "You are not an admin";
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>