
<?php
include "config.php";
$id = $_GET['updateid'];
$datasql = "SELECT * FROM `store` WHERE id = '$id'";
$dataresult = mysqli_query($con, $datasql);
if ($dataresult) {
    while ($row = mysqli_fetch_assoc($dataresult)) {
        $name = $row['name'];
        $brand = $row['brand'];
        $brand = $row['brand'];
        $city = $row['city'];
        $address = $row['address'];
        $opening = $row['opening'];
        $closing = $row['closing'];
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $city = $_POST['city'];
    $brand = $_POST["brand"];
    $address = $_POST['address'];
    $opening = $_POST['openingtime'];
    $closing = $_POST['closingtime'];
    include "utilities.php";
    $brand = convertbrandtoid($con,$brand);
    $city = convertcitytoid($con,$city);
    $updatesql = "UPDATE `store` set name = '$name',brand = '$brand',address = '$address',city = '$city',opening = '$opening',closing = '$closing' WHERE id = $id";
    $updateresult = mysqli_query($con,$updatesql);
    if($updateresult){
        header("location:stores.php");
    }
    else{
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

    <title>Update Store</title>
</head>

<body>
    <div class="container mt-4">
        <form action = "" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label>Brand</label>
                <div class="dropdown">
                    <select name="brand" class= "createstore"  required style="padding: 5px;"> Select
                        <?php
                        include "config.php";
                        include "utilities.php";
                        $sql = "SELECT * FROM `brands`";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            $resultsql = mysqli_query($con,"SELECT * FROM `store` where id = $id");
                            $rowbrand = mysqli_fetch_assoc($resultsql);
                            $brandname = convertidintobrand($con,$rowbrand['brand']);
                            if($brandname == $name){
                                echo "<option value='$name' selected= 'selected'>$name</option>";
                            }
                            else {
                                echo "<option value='$name'>$name</option>";
                            }
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>City</label>
                <div class="dropdown">
                    <select name="city" class=  "createstore"  style="padding: 5px;"> Select
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `city`";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            $cityresult = mysqli_query($con,"SELECT * from `store` where id = $id");
                            $cityrow = mysqli_fetch_assoc($cityresult);
                            $cityname = convertidintocity($con,$cityrow['city']);
                            if($cityname == $name){
                                echo "<option value='$name' selected = 'selected'>$name</option>";
                                echo "HI";
                            }
                            else{
                                echo "<option value='$name'>$name</option>";
                            }
                            
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter Addess" name="address" value=<?php echo $address; ?>>
            </div>
            <div class="form-group">
                <label>Opening Time</label>
                <input type="time" class="form-control" placeholder="Opening Time" name="openingtime" value=<?php echo $opening; ?>>
            </div>
            <div class="form-group">
                <label>Closing TIme</label>
                <input type="time" class="form-control" placeholder="Closing Time" name="closingtime" value=<?php echo $closing; ?>>
                <?php
                if (isset($storerror)) {
                    echo "All Fields Are Mandatory";
                }
                ?>
            </div>

            <button type="submit" class="btn btn-primary my-1">Update</button>
        </form>
    </div>
    <!-- // $getcitysql = "SELECT s.id, c.name as cname FROM `store`s INNER JOIN `city`c ON s.city= c.id WHERE
                        // s.id = $id";
                        // $getcityresult = mysqli_query($con,$sql);
                        // $row = mysqli_fetch_assoc($getcityresult);
                        // echo $row;
                        // $city = $row['cname'];
                        // include "utilities.php";
                        // $city = convertcity($con,$city); -->
</body>

</html>
