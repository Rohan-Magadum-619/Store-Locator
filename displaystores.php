

<?php
include "config.php";
$admin = false;
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM `user` where email ='$email' and usertype = 'admin'";
$result = mysqli_query($con, $sql);
if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $admin = true;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Stores</title>
    <script>
        function selected(brandselected, cityselected) {
            var headers = document.getElementsByClassName('card-header');
            var cities = document.getElementsByClassName('card-city');
            var cards = document.getElementsByClassName('cardstore');
            for (let index = 0; index < headers.length; index++) {
                const brand = headers[index];
                const city = cities[index];
                const card = cards[index];
                if (brand.innerHTML == brandselected || brandselected == "None") {
                    if (city.innerHTML == cityselected || cityselected == "None") {
                        card.style.display = "inline-flex";
                    } else {
                        card.style.display = "none";
                    }
                } else {
                    card.style.display = "none";
                }
            }
        }
    </script>
</head>

<body>
    <?php include "navbar.php" ?>
    <h1>Stores</h1>
    <?php
    if ($admin && isset($_SESSION['admin'])) {
        if($_SESSION['admin'] == true){
                
            echo "<a href= 'createstore.php' style='margin:30px 50px;'><button type='button' class='btn btn-success cbutton'>Create</button></a>";
        }
    }
    ?>
    <div class="container mt-3">
        <div class="brandsort">
            <div class="dropdown ">
                <select name="dropbrand" id='branddropdown' onchange='selected(this.value,citydropdown.value);' style="margin: 5px 5px;"> Select
                    <?php
                    include "config.php";
                    $sql = "SELECT * FROM `brands`";
                    $result = mysqli_query($con, $sql);
                    echo "<option value='None'>None</option>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $branddrop = $row['name'];
                        echo "<option value='$branddrop'>$branddrop</option>";
                    }
                    ?>
                </select>

            </div>
        </div>

        <div class="citysort">
            <div class="dropdown ">
                <select name="dropcity" id="citydropdown" onchange="selected(branddropdown.value,this.value);" style="padding: 5px;"> Select
                    <?php
                    include "config.php";
                    $sql = "SELECT * FROM `city`";
                    $result = mysqli_query($con, $sql);
                    echo "<option value='None'>None</option>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $citydrop = $row['name'];
                        echo "<option value='$citydrop'>$citydrop</option>";
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="storecards">

            <?php
            echo "<br>";
            include "config.php";
            $storesql = "SELECT s.id,s.name,s.address,s.opening,s.closing,c.name as city,b.name as brand FROM store s INNER JOIN brands b ON s.brand= b.id INNER JOIN city c ON s.city = c.id;";
            $result = mysqli_query($con, $storesql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $brand = $row['brand'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $opening = $row['opening'];
                    $closing = $row['closing'];
                    if ($admin && isset($_SESSION['admin']))
                    {
                        if($_SESSION['admin'] == true){
                
                            echo "<div class=' cardstore card text-white bg-info mb-3 ml-3'>
                                <div class='card-header'>$brand</div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$name</h5>
                                        <h6 class='card-city'>$city</h6>
                                        <p class = 'mt-4'>Address : $address </p>
                                        <p class = 'mt-2'>Opening : $opening </p>
                                        <p class = 'mt-2'>Closing : $closing </p>
                                        <div class='crudbuttons'>  
                                            <a href='updatestore.php?updateid=$id'><button type='submit'  class='btn btn-primary cbutton'>Update</button></a>
                                            <a href='deletestore.php?deleteid=$id'><button type='submit' class='btn btn-danger cbutton'>Delete</button></a>
                                    </div>
                                </div>
                            </div>
                        ";
                        }
                    } else {
                        echo "<div class=' cardstore card text-white bg-info mb-3 ml-3 '>
                    <div class='card-header'>$brand</div>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <h6 class='card-city'>$city</h6>
                            <p class = 'mt-4'>Address : $address </p>
                            <p class = 'mt-2'>Opening : $opening </p>
                            <p class = 'mt-2'>Closing : $closing </p>
                    </div>
                </div>
            ";
                    }
                }
            } else {
                echo mysqli_error($con);
            }
            ?>

        </div>

    </div>
</body>
<!-- <img class='card-img-top' src='...' alt='Card image cap'> -->

</html>