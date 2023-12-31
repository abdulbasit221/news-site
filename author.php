<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="container">
                    <?php 
                    
                    include "config.php";
                    if(isset($_GET['aid'])){
                        $author_id = $_GET['aid'];
                        
                        $sql1 = "SELECT * FROM category WHERE category_id = {author_id}";
                        $result1 = mysqli_query($conn,$sql1) or die ("Qurey Failed");
                        $row1 = mysqli_fetch_assoc($result1); 
                    }
                    
                    ?>
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="admin-heading">All Categories</h1>
                        </div>
                        <div class="col-md-2">
                            <a class="add-new" href="add-category.php">add category</a>
                        </div>
                        <div class="col-md-12">
                            <table class="content-table">
                                <thead>
                                    <th>S.No.</th>
                                    <th>Category Name</th>
                                    <th>No. of Posts</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    <?php 
                        while($row = mysqli_fetch_assoc($result1)){
                        ?>
                                    <tr>
                                        <td class='id'><?php echo $row['category_id']?></td>
                                        <td><?php echo $row['category_name']?></td>
                                        <td><?php echo $row['post']?></td>
                                        <td class='edit'><a
                                                href='update-category.php?id=<?php echo $row['category_id']?>'><i
                                                    class='fa fa-edit'></i></a></td>
                                        <td class='delete'><a
                                                href='delete-category.php?id=<?php echo $row['category_id']?>'><i
                                                    class='fa fa-trash-o'></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <ul class='pagination admin-pagination'>
                                <?php  
                  if($page > 1){
                  ?>

                                <li class="page-item"><a class="page-link"
                                        href="category.php?page=<?php echo ($page-1)?>">Previous</a>
                                </li>

                                <?php 
                  }
                  $fetch = "SELECT * FROM `category`";
                  $res = mysqli_query($conn,$fetch);
                  $products = mysqli_num_rows($res);
                  $total_pages = ceil($products / $per_page);
                  
                  for ($i=1; $i <= $total_pages; $i++) { 
                    
                  ?>


                                <li class="page-item"><a class="page-link"
                                        href="category.php?page=<?php echo $i?>"><?php echo $i?></a>
                                </li>
                                <?php  
                  }

                  if($page < $total_pages){

               
                  ?>

                                <li class="page-item"><a class="page-link"
                                        href="category.php?page=<?php echo ($page+1)?>">Next</a>
                                </li>

                                <?php }?>
                            </ul>
                            </nav>
                        </div>
                        <?php include 'sidebar.php'; ?>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>