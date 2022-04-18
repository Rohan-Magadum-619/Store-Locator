
<?php
include "config.php";
$admin = false;
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM `user` where email ='$email' and usertype = 'admin'";
$result = mysqli_query($con,$sql);
if($result){
    $num = mysqli_num_rows($result);
    if($num > 0){
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Brands</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php 
        if($admin && isset($_SESSION['admin'])){
            if($_SESSION['admin'] == true){
                
                echo "<a href= 'createbrand.php' style='margin:30px 50px;'><button type='button' class='btn btn-success cbutton'>Create</button></a>";
            }
        }
    ?>
    <div class="container mt-4">
        <h1>Brands</h1>
        <?php
        include "config.php";
        $sql = "SELECT * FROM `brands` ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $logo = $row['logo'];
                $description = $row['description'];
                if($admin && isset($_SESSION['admin'])){
                    if($_SESSION['admin'] == true){
                        echo"
                        <div class=' cardbrand card text-white bg-info mb-3 ml-3 '>
                            <div class='card-header'>$name</div>
                                <div class='card-body'>
                                    <h5 class='card-title'>$logo</h5>
                                    <p class = 'mt-2'>$description</p>
                                    <div class='crudbuttonsbrand crudbuttons '>  
                                        <a href='updatebrand.php?updateid=$id'><button type='submit'  class='btn btn-primary  cbutton'>Update</button></a>
                                        <a href='deletebrand.php?deleteid=$id'><button type='submit' class=' btn btn-danger  cbutton '>Delete</button></a>
                                    </div>
                            </div>
                                
                        </div>";
                    }
                    
                }
                else{
                    echo"
                    <div class='cardbrand card text-white bg-info mb-3 ml-3 '>
                        <div class='card-header'>$name</div>
                            <div class='card-body'>
                                <h5 class='card-title'>$logo</h5>
                                <p class = 'mt-2'>$description</p>
                            </div>
                    </div>";
                }
                
            }
        } else {
            echo mysqli_error($con);
        }
        ?>
    </div>
    </div>
</body>

</html>