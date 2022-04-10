<?php 
$pageTitle = "Blogs";
include "includes/session.php";
include "includes/dbFunctions.php";
include "includes/dbConnection.php";
include "includes/header.php";
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<section id="Blogs" style="box-sizing:border-box; width: 100%; min-height: 100vh; background-color:#cfe9fe";>
    <div style="padding:100px;">

        <div style="background:teal;color:white;width:fit-content; min-width:200px;text-align:center;font-size:30px;padding:5px">
            All Blogs
        </div>
        
        <div class="row" style="margin:auto;padding:10px;background:teal;opacity:0.5;">
            <div class="col-10" >
                <form action="allBlogs.php" method="POST">                    
                    <div class="row">

                        <div class="col-7">
                            <?php include "selectCategoryTag.php"; 
                                $categoryId;
                                $tagId;
                                
                                if(isset($_POST['categoryId'])){
                                    $categoryId =$_POST['categoryId'];
                                }

                                if(isset($_POST['tagId'])){
                                    $tagId =$_POST['tagId'];
                                }

                                $result=allBlogs($conn, $categoryId, $tagId);
                                $countOfBlogs = $result->num_rows;
                                echo "<small>$countOfBlogs blog(s) available</small>";
                            ?>
                        </div>
                        
                        <div class="col-2">   
                            <button type="submit" name="search" style="height:30px;"> Go </button>    
                        </div> 

                        <div class="col-3"></div>
                    </div>   
                    
                </form>
            </div>
            <div class="col-2 text-right">
                <?php if(isset($_SESSION['username'])){?>
                    <a style="color:yellow" href="blogCreate.php">New Blog</a>
                <?php } ?>
            </div>
        </div>

        <div style="border:solid teal 1px; background: white; padding:10px;">
            <?php
                if($countOfBlogs > 0){
                    while ($row = $result->fetch_assoc()){
                        $time=strtotime($row['created_at']);
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['teaser'];
                        $category = $row['category'];
                        $tag = $row['tag'];
                        $content = $row['blog_text'];
            ?> 


            <div style='display:inline-block'>
                <div class='card' style='width: 400px; height: 340px;margin:10px;'>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $title?></h5>
                        <h6 class='card-subtitle mb-2 text-muted'><?php echo date("d-m-Y",$time) ?></h6>
                        <p class='card-text'>
                            Category: <?php echo $category?><br> 
                            Tags: <?php echo $tag ?><br>
                            <?php echo $description?>
                        </p>
                        <a href='blogDetails.php?id=<?php echo $id ?>&imageIndex=0' class='card-link'>View</a>
                        <?php if(isset($_SESSION['username'])){?>
                            <a href='blogEdit.php?id=<?php echo $id ?>&type=blog'>Edit</a>
                            <a href='blogDelete.php?id=<?php echo $id ?>' onclick='return confirm("Are you sure you want to delete?")'>Delete</a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php
                    }
                }
            ?>
        </div>
        
    </div>
</section>

<?php include "includes/footer.php"; ?>



