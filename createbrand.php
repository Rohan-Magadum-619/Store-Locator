<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}
?>
<?php 
$brandexists = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $description = $_POST['description'];
    include "config.php";
    $sql = "SELECT * FROM `brands` WHERE name = $name";
    $result = mysqli_query($con,$sql);
    if($result == true)
    {
        $num = mysqli_num_rows($result);
        if($num > 0){
            $brandexists = true;
        }
    }
    else if(!$brandexists && !empty($name) && !empty($description)){
        $sql = "INSERT INTO `brands`(name,description) values('$name','$description')";
        $result = mysqli_query($con,$sql);
        header("location:brands.php");
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

    <title>Createbrand</title>
</head>

<body>
    <div class="container mt-4">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter Description" name="description">
            </div>
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>

</body>

</html>