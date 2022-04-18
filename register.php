<?php

$userexits = false;
$empty = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") // To Check if User Already Exists in Database
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $cpassword = $_POST['cpassword'];
    // //$checkuser[] = $_POST['usertype'];
    // if($checkuser) {
    //     $type = 'admin';
    // } else {
    //     $type = 'user';
    // }
    include 'config.php';
    $sql = "SELECT * from `user` where email = '$email' and username = '$username'";
    $result = mysqli_query($con, $sql);
    if ($result == true) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $userexits = true; // User Already Exists  
        }
    }
    if (!empty($email) && !empty($password) &&!empty($username) && $userexits == false)
    {
        if($password == $cpassword){
            $sql = "INSERT INTO `user`(id,email,password,usertype,username) values(NULL,'$email','$password','user','$username')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                session_start();
                $_SESSION['username'] = $username;
                header("location:home.php");
            } /*else {
            //     echo mysqli_error($con);
            // }*/
        }
        else {
            $cpassworderror = true;
        }
      
    } else if (empty($email)) {
        $emailempty = true;
    } else if (empty($password)) {
        $passwordempty = true;
    }
    else if (empty($username)) {
        $usernameempty = true;
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

    <title>Register Here</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container my-5">
        <h1>Register Here</h1>
        <form  method="post" autocomplete="off">
            <div class="my-4 mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                <?php
                if (isset($usernameempty)) { /*Prompt User If password is empty*/
                    echo "Username Cannot Be Empty";
                }
                ?>
            </div>
            <div class="my-4 mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                <?php
                if (isset($emailempty)) { /*Prompt User If password is empty*/
                    echo "Email Cannot Be Empty";
                }
                ?>
            </div>
            <div class="my-4 mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <?php
                if (isset($passwordempty)) {   /*Prompt User If password is empty*/
                    echo "Password Cannot Be Empty";
                }
                ?>
            </div>
            <div class="my-4 mb-3">
                <label  class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
                <?php
                if(isset($cpassworderror)){
                    echo "Passwords Do Not Match";
                }
                ?>
            </div>
            <!-- <div class="my-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="usertype">
                <label class="form-check-label" for="exampleCheck1">Register as Admin</label>
            </div> -->
            <button type="submit" class="btn btn-primary" onclick="SubmitFormData()">Submit</button>
        </form>
    </div>
    <script src="submit.js"></script>
</body>

</html>