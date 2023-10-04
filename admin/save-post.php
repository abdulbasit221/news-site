<?php 

include "config.php";

if(isset($_FILES['fileTouUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    
    $file_ext = strtolower(end($file_name));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
    
    $errors [] =  "This extention file not allowed,Please choose a JPG or PNG file"; 
    
    }
    
    if($file_size > 2097152){
        $errors[] = "file size must me 2mb or lower.";
    }
    if(empty($errors) == true){
        move_uploaded_file($file_tmp, "images/.$file_name");
    }else{
        print_r($errors);
        die();
    }
}

$tittle = mysqli_escape_string($conn,$_POST['post_tittle']);
$description = mysqli_escape_string($conn,$_POST['postdescription']);
$category = mysqli_escape_string($conn,$_POST['category']);
$date = date ("D M,Y");
$author = $_SESSION['user_id'];

$sql = "INSERT INTO post(`tittle`,`description`,`category`,`post_date`,`author`,`post_image`) VALUES ('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}')";
$sql .= "UPDATE category SET post = post + 1 WHERE category_id = {category}";
if(mysqli_query($conn,$sql)){
    header("location:user.php");
}else{
    echo "{<div class = 'alert alert_danger'>Query Failed.</div>}";
}


?>