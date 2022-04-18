<?php
function convertbrandtoid($con,$brand){
    $brandsql = "SELECT * FROM `brands` where name = '$brand'";
        $brandresult = mysqli_query($con, $brandsql);
        if ($brandresult) {
            $row = mysqli_fetch_assoc($brandresult);
            if ($row > 0) {
                $brand = $row['id'];
                return $brand;
            } else {
                "Not Found";
            }
        }
        else {
            echo mysqli_error($con);
        }
}
function convertidintobrand($con,$brandid){
    $brandsql = "SELECT * FROM `brands` where id = '$brandid'";
        $brandresult = mysqli_query($con, $brandsql);
        if ($brandresult) {
            $row = mysqli_fetch_assoc($brandresult);
            if ($row > 0) {
                $brand = $row['name'];
                return $brand;
            } else {
                "Not Found";
            }
        }
        else {
            echo mysqli_error($con);
        }
}
function convertidintocity($con,$cityid){
    $citysql = "SELECT * FROM `city` where id = '$cityid'";
        $cityresult = mysqli_query($con, $citysql);
        if ($cityresult) {
            $row = mysqli_fetch_assoc($cityresult);
            if ($row > 0) {
                $city = $row['name'];
                return $city;
            } else {
                "Not Found";
            }
        }
        else {
            echo mysqli_error($con);
        }
}
function convertcitytoid($con,$city){
    $citysql = "SELECT * FROM `city` where name = '$city'";
    $cityresult = mysqli_query($con, $citysql);
        if ($cityresult) {
            $row = mysqli_fetch_assoc($cityresult);
            if ($row > 0) {
                $city = $row['id'];
                return $city;
            } else {
                "Not Found";
            }
        }
        else {
            echo mysqli_error($con);
        }
}
?>