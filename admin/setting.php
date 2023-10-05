<?php
include "header.php";

if(isset($_POST['submit'])){
    $web_name = $_POST['name'];
    $footer = $_POST['footer'];
    
    $sql = "UPDATE settings SET `web_name` = '$web_name' , `footer` = '$footer' WHERE "; 
    $result = mysqli_query($conn, $sql);

    if ($result) {
    } else {
      
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Setting</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <?php 
                    $Fetch_data = "SELECT * FROM settings";
                    $result = mysqli_query($conn , $Fetch_data);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Website Name</label>
                        <input type="text" name="name" value="<?php echo $row['web_name']; ?>" class="form-control"
                            autocomplete="off" required>
                    </div>



                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>