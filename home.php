<?php
$username ="";
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
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

  <title>Home</title>
</head>

<body>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <?php 
    include "navbar.php";
    $email = $_SESSION['email'];
    $sql = "SELECT * from `user` where email = '$email'";
    include "config.php";
    $result = mysqli_query($con,$sql);
    if($result){
      $row = mysqli_fetch_assoc($result);
      $username = $row['username'];
    }
    
  ?>
  <center><h1>Welcome <?php echo $username; ?></h1></center>
</body>

</html>