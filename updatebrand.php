
<?php 
$brandexists = false;
include "config.php";
$id = $_GET['updateid'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $result = mysqli_query($con,"UPDATE `brands` SET name = '$name',description = '$description' where id = $id");
    header("location:brands.php");
}
$result = mysqli_query($con,"SELECT * FROM `brands` where id = '$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$description = $row['description'];
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
                <input type="text" class="form-control" placeholder="Enter Name" name="name" <?php echo "value = '$name'"?>>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter Description" name="description" <?php echo "value = '$description'"?>>
            </div>
            <button type="submit" class="btn btn-primary my-1">Update</button>
        </form>
    </div>

</body>
</html>