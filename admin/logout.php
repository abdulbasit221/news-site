<?php 

include "config.php";

if($_SESSION['user_role'] == 0){
    header("location: post.php");
   }

session_start();

session_unset();
 
session_destroy();

header("location:index.php");



?>