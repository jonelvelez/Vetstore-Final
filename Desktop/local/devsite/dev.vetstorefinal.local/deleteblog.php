<?php include 'header.php'; ?>

<?php 

include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM blog_post ORDER BY blog_id DESC";
$blog_contents = $con->query($sql) or die ($con->error);
$row = $blog_contents->fetch_assoc();


//Restriction 
$user = $_SESSION['Access'];

if($user != "admin"){
  http_response_code(404);
  echo "Restricted Page";
  // include('my_404.php');
  die();
}


?>


<!-- Loading -->
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

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Client User</h2>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
            <table class="table user-table ">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Blog Conntent</th>
                    <th scope="col">Title</th>
                    <th scope="col">Snippet</th>
                    <th scope="col">Featured Image</th>
                    <th scope="col">Date Published</th>
                    <th scope="col"></th>
           
                    </tr>
                </thead>
                <tbody>
                <?php do { ?>
                    <tr class="users-details">
                    <td><?php echo $row['blog_id'] ?></th>
                    <td><?php echo $row['blog_content'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['snippet'] ?></td>
                    <td><img src="upload/<?php echo $row['featured_image'] ?>" width="50px" alt=""></td>
                    <td><?php echo $row['date_publish'] ?></td>
                    <td><a class="okay" href="delete.php?ID=<?php echo $row['blog_id']; ?>">Delete</a></td>
                    </tr>
                <?php } while($row = $blog_contents->fetch_assoc()) ?> 
                </tbody>
            </table>
        </div>
        
        <div class="form-group col-md-12">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">New !</h4>
            <p>New react pro sidebar library is now available on <a href="https://www.npmjs.com/package/react-pro-sidebar" target="_blank">npm</a> <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank">
                <img alt="GitHub stars" src="https://img.shields.io/github/stars/azouaoui-med/react-pro-sidebar?style=social" />
              </a></p>
            <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank" class="btn btn-sm btn-primary mr-2">
              Github</a>
            <a href="https://azouaoui-med.github.io/react-pro-sidebar" target="_blank" class="btn btn-sm btn-success">
              Demo</a>

          </div>

        </div>
      </div>
      <h5>More templates</h5>
      <hr>



    </div>



  </main>
  <!-- page-content" -->
</div>

<script src='js/loading.js'></script>
<?php include 'footer.php'; ?>