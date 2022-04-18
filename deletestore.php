<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}
?>
<?php
    include "config.php";
    $deleteid = $_GET['deleteid'];
    $sql = "DELETE FROM `store` where id = $deleteid";
    $result = mysqli_query($con,$sql);
    header('location:stores.php');
?>