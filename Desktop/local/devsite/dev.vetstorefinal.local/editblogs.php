<?php 

include_once("connections/connection.php");
$con = connection();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 4;
$start_from = ($page-1)*02;

$sql = "SELECT * FROM blog_post LIMIT $start_from,$num_per_page";
$blog_post = $con->query($sql) or die ($con->error);
$row = $blog_post->fetch_assoc();


?>

<?php include 'header.php'; ?>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">

        <?php if(!empty($row['blog_id'])) { ?>

            <div class="container">
                <div class="row">
                    <?php do { ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 pt-5">
                        <div class="blog-group">
                            <div class="card-deck">
                                <div class="card">
                                    <a href="editblog.php?ID=<?php echo $row['blog_id'] ?>">
                                        <div class="img-wrapper" style="background-image: url('upload/<?php echo $row['featured_image'] ?>');">
                                            <!-- <img class="card-img-top w-50" src="" alt="Card image cap"> -->
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                            <p class="card-text"><?php echo $row['snippet'] ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Published: <?php echo $row['date_publish'] ?></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } while($row = $blog_post->fetch_assoc()) ?>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 text-center">
                    <?php 
                    
                    $pr_query = "SELECT * FROM blog_post";
                    $pr_result = mysqli_query($con,$pr_query);
                    $total_record = mysqli_num_rows($pr_result);

                    $total_page = ceil($total_record/2);


                    if($page>1) {
                        echo "<a href='blog.php?page=".($page-1)."' class='btn btn-light'><i class='fa fa-arrow-left'></i></a>";
                    } else {
                        echo "<button class='btn btn-light disabled' aria-disabled='true'><i class='fa fa-arrow-left'></i></button>";
                    }

                    for($i=1; $i<$total_page; $i++) {
                        echo "<a href='blog.php?page=".$i."' class='btn btn-primary'>$i</a>";
                    }

                    if($i > $page) {
                        echo "<a href='blog.php?page=".($page+1)."' class='btn btn-light'><i class='fa fa-arrow-right'></i></a>";
                    } else {
                        echo "<button class='btn btn-light disabled' aria-disabled='true'><i class='fa fa-arrow-right'></i></button>";
                    }
                    
                ?>
                    </div>
                </div>
            </div>

        <?php } else { ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pt-5">
                        <p>No post right now</p>
                    </div>
                </div>
            </div>

        <?php } ?>
        </div>

        <div class="col-lg-3">
             <div class="input-group rounded pt-5">
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

                if(!empty($blogstitle)) {
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