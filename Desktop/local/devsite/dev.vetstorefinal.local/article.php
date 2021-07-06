<?php include 'header.php'; ?>

<?php 

//Db Connection
include_once("connections/connection.php");
$con = connection();

//Page ID
if (isset($_GET['ID'])) {
        $id = $_GET['ID'];

        $sql = "SELECT * FROM `blog_post` WHERE blog_id = $id";
        $blog_post = $con->query($sql ) or die ($con->error);
        $row = $blog_post->fetch_assoc();
} 



?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-lg-8 shadow-lg bg-white rounded">
            <?php
                if (isset($_GET['ID'])) {
                    echo "<img src='upload/$row[featured_image]'>";
                    echo $row['blog_content'];
                } else {
                    echo "<p>Please choose article first</p>";
                }
            ?>
        </div>


        <div class="col-lg-4 pl-5">
             <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>    
            <div class="recentPost-wrapper pt-5">
                <h2>Recent Post</h2>

                <?php
                
                //Print Recent blog Post
                $sql = "SELECT * FROM `blog_post` ORDER BY blog_id DESC";
                $blog_post = $con->query($sql) or die ($con->error);
                // $row = $blog_post->fetch_assoc();

                if($blog_post->num_rows > 0) {

                    $blogstitle = array();
                    $blogid = array();

                    while($row = $blog_post->fetch_assoc()){
                        $blogtitle_container = $row['title'];
                        $blogid_container = $row['blog_id'];

                        $blogstitle[] = $blogtitle_container;
                        $blogid[] = $blogid_container;
                    }
                }

                
                if (!empty($blogstitle)) {
                    //count the number of blog
                    $num_blog = count($blogstitle);

                    if($num_blog <= 10) {
                        //Less than 10 post
                        for($i = 0; $i < $num_blog; $i++) {
                            echo "<p><a href='article.php?ID=".$blogid[$i]."'>".$blogstitle[$i]."</a></p>";
                        }

                    } else {
                        //more than 10 post
                        for($i = 0; $i < 10; $i++) {
                            echo "<p><a href='article.php?ID=".$blogid[$i]."'>".$blogstitle[$i]."</a></p>";
                        }

                    }
                } else {
                    echo "<p> No post right now</p>";
                }

        
                
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>