<?php 
require_once('../dbcon.php');


if(isset($_GET['bookdelete'])){

 $id= base64_decode($_GET['bookdelete']);

 $query = "DELETE FROM `books` WHERE `id`= '$id'";

 $result = mysqli_query($dbcon, $query);
header("location: managebooks.php");
 
}







?>