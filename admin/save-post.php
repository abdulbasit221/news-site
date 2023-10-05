<?php 

include "config.php";

if($_SESSION['user_role'] == 0){
    header("location: post.php");
  
   
if(empty($_FILES['web_logo'])){
    $file_name = $_POST['old_logo'];
} else{
    $errors = array();
    

    $file_name = $_FILES['web_logo']['name'];
    $file_size = $_FILES['web_logo']['size'];
    $file_tmp = $_FILES['web_logo']['tmp_name'];
    $file_type = $_FILES['web_logo']['type'];
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
}

$tittle = mysqli_escape_string($conn,$_POST['post_tittle']);
$description = mysqli_escape_string($conn,$_POST['postdescription']);
$category = mysqli_escape_string($conn,$_POST['category']);
$date = date ("D M,Y");
$author = $_SESSION['user_id'];

$sql .= "UPDATE settings  SET websitename = '{$_POST["websitename"]}',logo =  '{$file_name}' ,footerdesc = '{$_POST["category"]}'
post + 1 WHERE category_id = {category}";
if(mysqli_query($conn,$sql)){
    header("location:user.php");
}else{
    echo "{<div class = 'alert alert_danger'>Query Failed.</div>}";
}


?>