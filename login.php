
<?php
session_start();
$_SESSION['admin'] == false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    include "config.php";
    $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            session_start();
            $_SESSION['email'] = $email;
            $sql = "SELECT * FROM `user` where email = '$email'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['username'];
            header("location:home.php");
        }
        else {
            $loginerror = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Here</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container my-5">
        <h1>Please Login</h1>
        <form action="login.php" method="post">
            <div class="my-4 mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            <div class="my-4 mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <?php
                if(isset($loginerror)){
                    echo "Invalid Credentials";
                }
                ?>
            </div>
            
            <!-- <div class="my-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="usertype">
                <label class="form-check-label" for="exampleCheck1">Login as Admin</label>
            </div> -->
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
</body>

</html>