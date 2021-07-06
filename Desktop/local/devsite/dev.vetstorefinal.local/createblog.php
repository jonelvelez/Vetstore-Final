<?php include 'header.php'; ?>

<?php 

//Database Connection
include_once("connections/connection.php");
$con = connection();

$msg = "";

// If upload button is pressed
if(isset($_POST['blogSubmit'])){

    // The path to store the uploaded image
    $target = "upload/".basename($_FILES['featured_img']['name']);

    // Get all the submitted data from theform
    $blogContent = $_POST['editor1'];
    $title = $_POST['title'];
    $snippet = $_POST['snippet'];
    $featured_img = $_FILES['featured_img']['name'];

    //SQL query
    $sql = "INSERT INTO `blog_post`(`blog_content`, `title`, `snippet`, `featured_image`) VALUES ('$blogContent', '$title', '$snippet', '$featured_img')";

    $con->query($sql) or die ($con->error);

    // Now let's move the uploaded image into the folder: upload
    if(move_uploaded_file($_FILES['featured_img']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "There was a problem uploading image";
    }


    $page = $_SERVER['REQUEST_URI'];
    echo '<script type="text/javascript">';
    echo 'window.location.href="'.$page.'";';
    echo '</script>';



}


?>

<div class="col-lg-12">
  <div class="loading">
    <img src="images/loading.gif" alt="">
  </div>
</div>


<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Create a blog content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" id="create-blog" enctype="multipart/form-data">
                <div class="form-group row">
                <label class="col-md-4" for="">Description</label>
                    <div class="col-lg-12">
                        <textarea class="form-control ckeditor" cols="30" rows="10" id="editor1" name="editor1"></textarea>
                        <label for="">Title</label><br>
                        <input name="title" type="text"><br>
                        <label for="">Snippet</label><br>
                        <input name="snippet" type="text"><br>
                        <label for="">Featured Image</label><br>
                        <input name="featured_img" type="file"><br>
                        <input class="btn btn-primary mt-3" name="blogSubmit" type="submit" method="POST" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script> 
    CKEDITOR.replace( 'editor1', {
        height: 300,
        filebrowserUploadUrl: "upload.php",
        filebrowserUploadMethod: "form"
    }); 
</script>

<script src='js/loading.js'></script>
<?php include 'footer.php'; ?>