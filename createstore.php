<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}
?>
<?php
include "config.php";
$storeexists = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $openingtime = $_POST['openingtime'];
    $closingtime = $_POST['closingtime'];
    $sql = "SELECT * FROM `store` where name = '$name'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $storeexists = true;
        }
    }
    if (!empty($name) && !$storeexists && !empty($brand) && !empty($address) && !empty($city)) {

        $brandsql = "SELECT * FROM `brands` where name = '$brand'";
        $brandresult = mysqli_query($con, $brandsql);
        if ($brandresult) {
            $row = mysqli_fetch_assoc($brandresult);
            if ($row > 0) {
                $brand = $row['id'];
                echo $brand;
            } else {
                "Not Found";
            }
        }
        else {
            echo mysqli_error($con);
        }


        $citysql = "SELECT * FROM `city` where name = '$city'";
        $cityresult = mysqli_query($con, $citysql);
        if ($cityresult) {
            $row = mysqli_fetch_assoc($cityresult);
            $city = $row['id'];
        }


        $sql = "INSERT INTO `store`
        (name,brand,address,city,opening,closing) values('$name','$brand','$address','$city','$openingtime','$closingtime')";
        $result = mysqli_query($con, $sql);
        if ($result) {
        } else {
            mysqli_error($con);
        }
        header("location:stores.php");
    } else {
        $storerror = true;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <div class="container mt-4 ml-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label>Brand</label>
                <div class="dropdown">
                    <select class="createstore" name="brand" style="padding: 5px; "> Select
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `brands`";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            echo "<option value='$name'>$name</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>City</label>
                <div class="dropdown">
                    <select class="createstore" name="city" style="padding: 5px;"> Select
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `city`";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                            echo "<option value='$name'>$name</option>";
                        }

                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter Addess" name="address">
            </div>
            <div class="form-group">
                <label>Opening Time</label>
                <input type="time" class="form-control" placeholder="Opening Time" name="openingtime">
            </div>
            <div class="form-group">
                <label>Closing TIme</label>
                <input type="time" class="form-control" placeholder="Closing Time" name="closingtime">
                <?php
                if (isset($storerror)) {
                    echo "All Fields Are Mandatory";
                }
                ?>
            </div>
            <input type="submit" class="btn btn-primary my-1">
        </form>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>