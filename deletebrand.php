<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}
?>
<?php 
    include "config.php";
    $deleteid = $_GET['deleteid'];
    $sql = "DELETE FROM `brands` WHERE id = $deleteid";
    mysqli_query($con,$sql);
    if($sql){
      header("location:brands.php");
    }
    else{
      echo mysqli_error($con);
    }

?>