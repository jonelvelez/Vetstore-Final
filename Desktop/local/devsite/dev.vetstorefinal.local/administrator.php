<?php include 'header.php'; ?>

<?php 

include_once("connections/connection.php");
$con = connection();


$sql = "SELECT * FROM pet_reg ORDER BY id DESC";
$pets = $con->query($sql) or die ($con->error);
$row = $pets->fetch_assoc();


//Restriction 
$user = $_SESSION['Access'];

if($user != "admin"){
  http_response_code(404);
  echo "Restricted Page";
  // include('my_404.php');
  die();
}


?>





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
                    <th scope="col">Pet Name</th>
                    <th scope="col">Pet Breed</th>
                    <th scope="col">Pet Birthday</th>
                    <th scope="col">Special Marking</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Owner Email</th>
                    <th scope="col"></th>
           
                    </tr>
                </thead>
                <tbody>
                <?php do { ?>
                    <tr class="users-details">
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['pet_name'] ?></td>
                    <td><?php echo $row['pet_breed'] ?></td>
                    <td><?php echo $row['pet_birthday'] ?></td>
                    <td><?php echo $row['special_marking'] ?></td>
                    <td><?php echo $row['user_fname'] .' '. $row['user_lname'] ?></td>
                    <td><?php echo $row['user_email'] ?></td>
                    <td><a class="okay" href="vetcardUpdate.php?ID=<?php echo $row['id']; ?>">View</a></td>
                    </tr>
                <?php } while($row = $pets->fetch_assoc()) ?> 
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


<?php include 'footer.php'; ?>