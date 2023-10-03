<?php 

include "config.php";

$id= $_GET['id'];

$Dlt_query = "DELETE FROM `user` WHERE user_id = $id";
$Dlt_result = mysqli_query($conn , $Dlt_query);

if($Dlt_result){
    header("location: users.php");
}

?>