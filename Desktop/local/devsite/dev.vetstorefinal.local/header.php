<?php include 'signup.php'; ?>
<?php include 'login.php'; ?>


<?php

    //Pet Data Details
    if(isset($_SESSION['UserId'])) {

      $userId = $_SESSION['UserId'];
  
      $sqlPetData = "SELECT * FROM pet_reg WHERE user_id = '$userId'";
      $user = $con->query($sqlPetData) or die ($con->error);
  
        if($user->num_rows > 0) {
    
            $petId_array = array();
            $petnames_array = array();
            $petbreeds_array = array();
            $petbirthday_array = array();
            $specialMarkings = array();
    
            while($rows = $user->fetch_assoc()) {
    
                $petId = $rows["id"];
                $petName = $rows["pet_name"];
                $petBreed = $rows["pet_breed"];
                $petBirthday = $rows["pet_birthday"];
                $specialMarking = $rows["special_marking"];
              
                $petId_array[] = $petId;
                $petnames_array[] = $petName;
                $petbreeds_array[] = $petBreed;
                $petbirthday_array[] = $petBirthday;
                $specialMarkings[] = $specialMarking;
            
            } 
      
        } 

    }

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <title>Homepage</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="appointment.php">Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <?php if(isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "admin")  { ?>
    
      <li class="nav-item">
        <a class="nav-link" href="administrator.php">Administrator</a>
      </li>

      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <?php if(!isset($_SESSION['UserLogin'])){?>

              <li class="nav-item" data-toggle="modal" data-target="#login">
                <span>Login</span> 
              </li>

              <?php } else{ ?>

              <li id="navlogin" class="nav-item" data-toggle="modal" data-target="#profileModal">
                  <span>View your Pet Health card</span>&nbsp;&nbsp;&nbsp;&nbsp;
              </li>
         
                
              <li>
                <span>Welcome: </span>
                <span><?php echo $_SESSION['UserLogin']; ?></span>
                <span><?php echo $_SESSION['Userlname']; ?></span>
              </li>

          <?php } ?>
       
            &nbsp;
                
          <?php if(!isset($_SESSION['UserLogin'])){ ?>

            <li class="nav-item" data-toggle="modal" data-target="#signUp">
               <span>SignUp</span>
            </li>

          <?php } else{ ?>

            <li class="nav-item">
              <span><a href="logout.php"> Logout </a></span>
            </li>
            <li>
              <img src="<?php echo $_SESSION['UserImage']; ?>" alt="">
            </li>

          <?php } ?>
          
        </ul>
    </form>

  </div>

  
  <!-- SignUp Modal -->
  <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="signUpLabel">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="card" style="width: 100%;">

            <div class="card-body">

                <form action="" method="post" >

                    <input name="userimage" type="file">
                    <div class="form-outline mt-3">
                        <input class="form-control" type="text" name="firstname" id="firstname formControlDefault" required>
                        <label class="form-label" for="firstname">First Name</label>
                    </div>

                    <div class="form-outline mt-3">
                        <input class="form-control" type="text" name="lastname" id="lastname formControlDefault" required>
                        <label class="form-label" for="lastname">Last Name</label>
                    </div>

                    <label class="form-label mt-3" for="birthday">Birthday</label>
                    <div class="form-outline">
                        <input class="form-control" type="date" name="birthday" id="birthday formControlDefault" required>
                    </div>

                    <label class="mt-3" for="">Gender</label>
                        <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>

                    <div class="form-outline mt-3">
                        <input class="form-control" type="text" name="address" id="address formControlDefault" required>
                        <label class="form-label" for="address">Address</label>
                    </div>

                    <div class="form-outline mt-3">
                        <input class="form-control" type="number" name="phoneNum" id="phoneNum formControlDefault" required>
                        <label class="form-label" for="phoneNum">Phone Number</label>
                    </div>

                    <div class="form-outline mt-3">
                        <input class="form-control" type="email" name="email" id="signup-email formControlDefault" required>
                        <label class="form-label" for="email">E-mail</label>
                    </div>

                    <div class="form-outline mt-3">
                        <input class="form-control" type="password" name="password" id="signup-password formControlDefault" required>
                        <label class="form-label" for="password">Password</label>
                    </div>
                    
                    <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit Form">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            
            </div>

        </div>

    </div>
  </div>
</div>

<!-- End of SignUp Modal -->

<!-- Login Modal -->

<div class="modal fade login-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="" method="post">
        <div class="modal-body">
            <div class="login_failed"></div>
            <div class="form-outline mt-3">
                <input class="form-control" type="email" name="email" id="login-email formControlDefault" required>
                <label class="form-label" for="email">E-mail</label>
            </div>
            <div class="form-outline mt-3">
                <input class="form-control" type="password" name="password" id="login-password formControlDefault" required>
                <label class="form-label" for="password">Password</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="login" class="btn btn-primary" id="btn-login">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      
    </form>

    </div>
  </div>
</div>

<!-- End of Login Modal -->

<!-- Profile Modal -->

<div class="modal fade petcard-modal" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-x: hidden;">
          <form >
            <div class="container d-flex justify-content-end">
              <div class="row">
                <div class="col-lg-12">
                      <select class="form-select form-select-sm" name="users" onchange="petData(this.value)" aria-label="Default select example">
                    
                          <?php foreach( $petnames_array as $index => $pet_name): ?>
             
                             <option value="<?php echo $petId_array[$index];?>"><?php echo $pet_name ?></option>

                          <?php endforeach ?>
                      </select>
                  </div>
              </div>
            </div>
              <div class='container d-flex justify-content-center'>
                  <div class='row'>
                      <div class="col-lg-12">
                    
                                <!-- Ajax Output Request  -->
                                <div class="row record-details">


                                  <div class='col-lg-2 record-image'>
                                      <img src='https://via.placeholder.com/150' alt=''>
                                  </div>
                                  <div class='col-lg-10 info-record'>
                                      <h2>Name: <?php echo empty($petnames_array) ? : end($petnames_array) ?></h2>
                                      <span>Pet breed: <?php echo empty($petbreeds_array) ? : end($petbreeds_array) ?></span>
                                      <span>Pet birthday: <?php echo empty($petbirthday_array) ? : end($petbirthday_array) ?></span>
                                      <span>Special Marking: <?php echo empty($specialMarkings) ? : end($specialMarkings) ?></span>
                                  </div>

                                  <?php 
                                  
                                  $sql_healthcard = "SELECT * FROM pet_healthcard WHERE pet_id = '$petId'";
                                  $healthcard = $con->query($sql_healthcard) or die ($con->error);
                              
                                  if($healthcard->num_rows > 0){
                                      $i = 0;
                                      while($row_item = $healthcard->fetch_assoc()) {
                              
                                          $d_data1 = $row_item['d_row1_date'];
                                          $d_weight1 = $row_item['d_row1_weight'];
                                          $d_against1 = $row_item['d_row1_against'];
                                          $d_manufacturer1 = $row_item['d_row1_manufacturer'];
                                          $d_dtnumber1 = $row_item['d_row1_ldtnumber'];
                                          $d_vet1 = $row_item['d_row1_vet'];
                              
                                          $d_data2 = $row_item['d_row2_date'];
                                          $d_weight2 = $row_item['d_row2_weight'];
                                          $d_against2 = $row_item['d_row2_against'];
                                          $d_manufacturer2 = $row_item['d_row2_manufacturer'];
                                          $d_dtnumber2 = $row_item['d_row2_ldtnumber'];
                                          $d_vet2 = $row_item['d_row2_vet'];
                              
                                          $d_data3 = $row_item['d_row3_date'];
                                          $d_weight3 = $row_item['d_row3_weight'];
                                          $d_against3 = $row_item['d_row3_against'];
                                          $d_manufacturer3 = $row_item['d_row3_manufacturer'];
                                          $d_dtnumber3 = $row_item['d_row3_ldtnumber'];
                                          $d_vet3 = $row_item['d_row3_vet'];
                              
                                          $d_data4 = $row_item['d_row4_date'];
                                          $d_weight4 = $row_item['d_row4_weight'];
                                          $d_against4 = $row_item['d_row4_against'];
                                          $d_manufacturer4 = $row_item['d_row4_manufacturer'];
                                          $d_dtnumber4 = $row_item['d_row4_ldtnumber'];
                                          $d_vet4 = $row_item['d_row4_vet'];
                              
                                          $d_data5 = $row_item['d_row5_date'];
                                          $d_weight5 = $row_item['d_row5_weight'];
                                          $d_against5 = $row_item['d_row5_against'];
                                          $d_manufacturer5 = $row_item['d_row5_manufacturer'];
                                          $d_dtnumber5 = $row_item['d_row5_ldtnumber'];
                                          $d_vet5 = $row_item['d_row5_vet'];
                              
                                          $d_data6 = $row_item['d_row6_date'];
                                          $d_weight6 = $row_item['d_row6_weight'];
                                          $d_against6 = $row_item['d_row6_against'];
                                          $d_manufacturer6 = $row_item['d_row6_manufacturer'];
                                          $d_dtnumber6 = $row_item['d_row6_ldtnumber'];
                                          $d_vet6 = $row_item['d_row6_vet'];
                              
                                          $v_data1 = $row_item['v_row1_date'];
                                          $v_weight1 = $row_item['v_row1_weight'];
                                          $v_against1 = $row_item['v_row1_against'];
                                          $v_manufacturer1 = $row_item['v_row1_manufacturer'];
                                          $v_dtnumber1 = $row_item['v_row1_ldtnumber'];
                                          $v_vet1 = $row_item['v_row1_vet'];
                              
                                          $v_data2 = $row_item['v_row2_date'];
                                          $v_weight2 = $row_item['v_row2_weight'];
                                          $v_against2 = $row_item['v_row2_against'];
                                          $v_manufacturer2 = $row_item['v_row2_manufacturer'];
                                          $v_dtnumber2 = $row_item['v_row2_ldtnumber'];
                                          $v_vet2 = $row_item['v_row2_vet'];
                              
                                          $v_data3 = $row_item['v_row3_date'];
                                          $v_weight3 = $row_item['v_row3_weight'];
                                          $v_against3 = $row_item['v_row3_against'];
                                          $v_manufacturer3 = $row_item['v_row3_manufacturer'];
                                          $v_dtnumber3 = $row_item['v_row3_ldtnumber'];
                                          $v_vet3 = $row_item['v_row3_vet'];
                              
                                          $v_data4 = $row_item['v_row4_date'];
                                          $v_weight4 = $row_item['v_row4_weight'];
                                          $v_against4 = $row_item['v_row4_against'];
                                          $v_manufacturer4 = $row_item['v_row4_manufacturer'];
                                          $v_dtnumber4 = $row_item['v_row4_ldtnumber'];
                                          $v_vet4 = $row_item['v_row4_vet'];
                              
                                          $v_data5 = $row_item['v_row5_date'];
                                          $v_weight5 = $row_item['v_row5_weight'];
                                          $v_against5 = $row_item['v_row5_against'];
                                          $v_manufacturer5 = $row_item['v_row5_manufacturer'];
                                          $v_dtnumber5 = $row_item['v_row5_ldtnumber'];
                                          $v_vet5 = $row_item['v_row5_vet'];
                              
                                          $v_data6 = $row_item['v_row6_date'];
                                          $v_weight6 = $row_item['v_row6_weight'];
                                          $v_against6 = $row_item['v_row6_against'];
                                          $v_manufacturer6 = $row_item['v_row6_manufacturer'];
                                          $v_dtnumber6 = $row_item['v_row6_ldtnumber'];
                                          $v_vet6 = $row_item['v_row6_vet'];
                              
                                        
                                          echo "<div class='col-lg-12'><div class='table-wrapper'>
                                          <table class='table table-bordered text-center'>
                                          <thead>
                                          <tr>
                                              <th scope='col' colspan='6'>card number: $i<h2>Anti - Parasitics</h2></th>
                                          </tr>
                                      </thead>
                                      <thead class='thead-dark'>
                                          <tr>
                                              <th scope='col'>Date</th>
                                              <th scope='col'>Weight</th>
                                              <th scope='col'>Against</th>
                                              <th scope='col'>Manufacturer</th>
                                              <th scope='col'>LDT Number</th>
                                              <th scope='col'>Veterinarian</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                  
                                              <td><input type='date' name='d_row1_date$i' value='$d_data1';></td>
                                              <td><input type='text' name='d_row1_weight$i' value='$d_weight1'></td>
                                              <td><input type='text' name='d_row1_against$i' value='$d_against1'></td>
                                              <td><input type='text' name='d_row1_manufacturer$i' value='$d_manufacturer1'></td>
                                              <td><input type='text' name='d_row1_ldtnumber$i' value='$d_dtnumber1'></td>
                                              <td><input type='text' name='d_row1_vet$i' value='$d_vet1'></td>
                                          
                                          <tr>
                                          <tr>
                                  
                                          <td><input type='date' name='d_row2_date$i' value='$d_data2';></td>
                                          <td><input type='text' name='d_row2_weight$i' value='$d_weight2'></td>
                                          <td><input type='text' name='d_row2_against$i' value='$d_against2'></td>
                                          <td><input type='text' name='d_row2_manufacturer$i' value='$d_manufacturer2'></td>
                                          <td><input type='text' name='d_row2_ldtnumber$i' value='$d_dtnumber2'></td>
                                          <td><input type='text' name='d_row2_vet$i' value='$d_vet2'></td>
                                          
                                          <tr>
                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='d_row3_date$i' value='$d_data3';></td>
                                          <td><input type='text' name='d_row3_weight$i' value='$d_weight3'></td>
                                          <td><input type='text' name='d_row3_against$i' value='$d_against3'></td>
                                          <td><input type='text' name='d_row3_manufacturer$i' value='$d_manufacturer3'></td>
                                          <td><input type='text' name='d_row3_ldtnumber$i' value='$d_dtnumber3'></td>
                                          <td><input type='text' name='d_row3_vet$i' value='$d_vet3'></td>

                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='d_row4_date$i' value='$d_data4'></td>
                                          <td><input type='text' name='d_row4_weight$i' value='$d_weight4'></td>
                                          <td><input type='text' name='d_row4_against$i' value='$d_against4'></td>
                                          <td><input type='text' name='d_row4_manufacturer$i' value='$d_manufacturer4'></td>
                                          <td><input type='text' name='d_row4_ldtnumber$i'value='$d_dtnumber4'></td>
                                          <td><input type='text' name='d_row4_vet$i' value='$d_vet4'></td>

                                          </tr>
                                          <tr>

                                          <td><input type='date' name='d_row5_date$i' value='$d_data5'></td>
                                          <td><input type='text' name='d_row5_weight$i' value='$d_weight5'></td>
                                          <td><input type='text' name='d_row5_against$i' value='$d_against5'></td>
                                          <td><input type='text' name='d_row5_manufacturer$i' value='$d_manufacturer5'></td>
                                          <td><input type='text' name='d_row5_ldtnumber$i' value='$d_dtnumber5'></td>
                                          <td><input type='text' name='d_row5_vet$i' value='$d_vet5'></td>

                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='d_row6_date$i' value='$d_data6'></td>
                                          <td><input type='text' name='d_row6_weight$i' value='$d_weight6'></td>
                                          <td><input type='text' name='d_row6_against$i' value='$d_against6'></td>
                                          <td><input type='text' name='d_row6_manufacturer$i' value='$d_manufacturer6'></td>
                                          <td><input type='text' name='d_row6_ldtnumber$i'value='$d_dtnumber6'></td>
                                          <td><input type='text' name='d_row6_vet$i' value='$d_vet6'></td>

                                          </tr>
                                      </tbody>
                                  </table>
                                      </div>
                              <div class='table-wrapper'>
                                  <table class='table table-bordered text-center'>
                                      <thead>
                                          <tr>
                                              <th scope='col' colspan='6'><h2>Vaccine</h2></th>
                                          </tr>
                                          </thead>
                                      <thead class='thead-dark'>
                                          <tr>
                                              <th scope='col'>Date</th>
                                              <th scope='col'>Weight</th>
                                              <th scope='col'>Against</th>
                                              <th scope='col'>Manufacturer</th>
                                              <th scope='col'>LDT Number</th>
                                              <th scope='col'>Veterinarian</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                  
                                          <td><input type='date' name='v_row1_date$i' value='$v_data1';></td>
                                          <td><input type='text' name='v_row1_weight$i' value='$v_weight1'></td>
                                          <td><input type='text' name='v_row1_against$i' value='$v_against1'></td>
                                          <td><input type='text' name='v_row1_manufacturer$i' value='$v_manufacturer1'></td>
                                          <td><input type='text' name='v_row1_ldtnumber$i'value='$v_dtnumber1'></td>
                                          <td><input type='text' name='v_row1_vet$i' value='$v_vet1'></td>
                                          
                                          <tr>
                                          <tr>
                                          
                                          <td><input type='date' name='v_row2_date$i' value='$v_data2';></td>
                                          <td><input type='text' name='v_row2_weight$i' value='$v_weight2'></td>
                                          <td><input type='text' name='v_row2_against$i' value='$v_against2'></td>
                                          <td><input type='text' name='v_row2_manufacturer$i' value='$v_manufacturer2'></td>
                                          <td><input type='text' name='v_row2_ldtnumber$i' value='$v_dtnumber2'></td>
                                          <td><input type='text' name='v_row2_vet$i' value='$v_vet2'></td>
                                          
                                          <tr>
                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='v_row3_date$i' value='$v_data3';></td>
                                          <td><input type='text' name='v_row3_weight$i' value='$v_weight3'></td>
                                          <td><input type='text' name='v_row3_against$i' value='$v_against3'></td>
                                          <td><input type='text' name='v_row3_manufacturer$i' value='$v_manufacturer3'></td>
                                          <td><input type='text' name='v_row3_ldtnumber$i' value='$v_dtnumber3'></td>
                                          <td><input type='text' name='v_row3_vet$i' value='$v_vet3'></td>
                                          
                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='v_row4_date$i' value='$v_data4'></td>
                                          <td><input type='text' name='v_row4_weight$i' value='$v_weight4'></td>
                                          <td><input type='text' name='v_row4_against$i' value='$v_against4'></td>
                                          <td><input type='text' name='v_row4_manufacturer$i' value='$v_manufacturer4'></td>
                                          <td><input type='text' name='v_row4_ldtnumber$i' value='$v_dtnumber4'></td>
                                          <td><input type='text' name='v_row4_vet$i' value='$v_vet4'></td>
                                          
                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='v_row5_date$i' value='$v_data5'></td>
                                          <td><input type='text' name='v_row5_weight$i' value='$v_weight5'></td>
                                          <td><input type='text' name='v_row5_against$i' value='$v_against5'></td>
                                          <td><input type='text' name='v_row5_manufacturer$i' value='$v_manufacturer5'></td>
                                          <td><input type='text' name='v_row5_ldtnumber$i' value='$v_dtnumber5'></td>
                                          <td><input type='text' name='v_row5_vet$i' value='$v_vet5'></td>
                                          
                                          </tr>
                                          <tr>
                                          
                                          <td><input type='date' name='v_row6_date$i' value='$v_data6'></td>
                                          <td><input type='text' name='v_row6_weight$i' value='$v_weight6'></td>
                                          <td><input type='text' name='v_row6_against$i' value='$v_against6'></td>
                                          <td><input type='text' name='v_row6_manufacturer$i' value='$v_manufacturer6'></td>
                                          <td><input type='text' name='v_row6_ldtnumber$i' value='$v_dtnumber6'></td>
                                          <td><input type='text' name='v_row6_vet$i' value='$v_vet6'></td>
                                          
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                         ";

                    $i++;                    
                              
                                      }
                              
                                  } else {
                                    echo "<div class='col-lg-12'><div class='table-wrapper'>
                                    <table class='table table-bordered text-center'>
                                    <thead>
                                    <tr>
                                        <th scope='col' colspan='6'>card number: 0<h2>Anti - Parasitics</h2></th>
                                    </tr>
                                </thead>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Date</th>
                                        <th scope='col'>Weight</th>
                                        <th scope='col'>Against</th>
                                        <th scope='col'>Manufacturer</th>
                                        <th scope='col'>LDT Number</th>
                                        <th scope='col'>Veterinarian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                            
                                        <td><input type='date' name='d_row1_date' value='';></td>
                                        <td><input type='text' name='d_row1_weight' value=''></td>
                                        <td><input type='text' name='d_row1_against' value=''></td>
                                        <td><input type='text' name='d_row1_manufacturer' value=''></td>
                                        <td><input type='text' name='d_row1_ldtnumber' value=''></td>
                                        <td><input type='text' name='d_row1_vet' value=''></td>
                                    
                                    <tr>
                                    <tr>
                            
                                    <td><input type='date' name='d_row2_date' value='';></td>
                                    <td><input type='text' name='d_row2_weight' value=''></td>
                                    <td><input type='text' name='d_row2_against' value=''></td>
                                    <td><input type='text' name='d_row2_manufacturer' value=''></td>
                                    <td><input type='text' name='d_row2_ldtnumber' value=''></td>
                                    <td><input type='text' name='d_row2_vet' value=''></td>
                                    
                                    <tr>
                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='d_row3_date' value='';></td>
                                    <td><input type='text' name='d_row3_weight' value=''></td>
                                    <td><input type='text' name='d_row3_against' value=''></td>
                                    <td><input type='text' name='d_row3_manufacturer' value=''></td>
                                    <td><input type='text' name='d_row3_ldtnumber' value=''></td>
                                    <td><input type='text' name='d_row3_vet' value=''></td>

                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='d_row4_date' value=''></td>
                                    <td><input type='text' name='d_row4_weight' value=''></td>
                                    <td><input type='text' name='d_row4_against' value=''></td>
                                    <td><input type='text' name='d_row4_manufacturer' value=''></td>
                                    <td><input type='text' name='d_row4_ldtnumber'value=''></td>
                                    <td><input type='text' name='d_row4_vet' value=''></td>

                                    </tr>
                                    <tr>

                                    <td><input type='date' name='d_row5_date' value=''></td>
                                    <td><input type='text' name='d_row5_weight' value=''></td>
                                    <td><input type='text' name='d_row5_against' value=''></td>
                                    <td><input type='text' name='d_row5_manufacturer' value=''></td>
                                    <td><input type='text' name='d_row5_ldtnumber' value=''></td>
                                    <td><input type='text' name='d_row5_vet' value=''></td>

                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='d_row6_date' value=''></td>
                                    <td><input type='text' name='d_row6_weight' value=''></td>
                                    <td><input type='text' name='d_row6_against' value=''></td>
                                    <td><input type='text' name='d_row6_manufacturer' value=''></td>
                                    <td><input type='text' name='d_row6_ldtnumber'value=''></td>
                                    <td><input type='text' name='d_row6_vet' value=''></td>

                                    </tr>
                                </tbody>
                            </table>
                                </div>
                        <div class='table-wrapper'>
                            <table class='table table-bordered text-center'>
                                <thead>
                                    <tr>
                                        <th scope='col' colspan='6'><h2>Vaccine</h2></th>
                                    </tr>
                                    </thead>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Date</th>
                                        <th scope='col'>Weight</th>
                                        <th scope='col'>Against</th>
                                        <th scope='col'>Manufacturer</th>
                                        <th scope='col'>LDT Number</th>
                                        <th scope='col'>Veterinarian</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                            
                                    <td><input type='date' name='v_row1_date' value='';></td>
                                    <td><input type='text' name='v_row1_weight' value=''></td>
                                    <td><input type='text' name='v_row1_against' value=''></td>
                                    <td><input type='text' name='v_row1_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row1_ldtnumber'value=''></td>
                                    <td><input type='text' name='v_row1_vet' value=''></td>
                                    
                                    <tr>
                                    <tr>
                                    
                                    <td><input type='date' name='v_row2_date' value='';></td>
                                    <td><input type='text' name='v_row2_weight' value=''></td>
                                    <td><input type='text' name='v_row2_against' value=''></td>
                                    <td><input type='text' name='v_row2_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row2_ldtnumber' value=''></td>
                                    <td><input type='text' name='v_row2_vet' value=''></td>
                                    
                                    <tr>
                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='v_row3_date' value='';></td>
                                    <td><input type='text' name='v_row3_weight' value=''></td>
                                    <td><input type='text' name='v_row3_against' value=''></td>
                                    <td><input type='text' name='v_row3_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row3_ldtnumber' value=''></td>
                                    <td><input type='text' name='v_row3_vet' value=''></td>
                                    
                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='v_row4_date' value=''></td>
                                    <td><input type='text' name='v_row4_weight' value=''></td>
                                    <td><input type='text' name='v_row4_against' value=''></td>
                                    <td><input type='text' name='v_row4_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row4_ldtnumber' value=''></td>
                                    <td><input type='text' name='v_row4_vet' value=''></td>
                                    
                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='v_row5_date' value=''></td>
                                    <td><input type='text' name='v_row5_weight' value=''></td>
                                    <td><input type='text' name='v_row5_against' value=''></td>
                                    <td><input type='text' name='v_row5_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row5_ldtnumber' value=''></td>
                                    <td><input type='text' name='v_row5_vet' value=''></td>
                                    
                                    </tr>
                                    <tr>
                                    
                                    <td><input type='date' name='v_row6_date' value=''></td>
                                    <td><input type='text' name='v_row6_weight' value=''></td>
                                    <td><input type='text' name='v_row6_against' value=''></td>
                                    <td><input type='text' name='v_row6_manufacturer' value=''></td>
                                    <td><input type='text' name='v_row6_ldtnumber' value=''></td>
                                    <td><input type='text' name='v_row6_vet' value=''></td>
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>";
                                  }
                                  
                                  ?>


                                </div>
                   
                      </div>
                  </div>  
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</nav>

