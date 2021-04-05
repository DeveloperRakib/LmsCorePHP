<?php
 require_once('../dbcon.php');



 $id = base64_decode($_GET['id']);
 echo $id;
$query = mysqli_query($dbcon, "UPDATE `std` SET `status`= '0' WHERE `id`='$id'");

header('location:student.php');
 
?>