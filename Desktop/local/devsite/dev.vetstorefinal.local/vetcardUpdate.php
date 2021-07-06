<?php include 'header.php'; ?>
<?php 


// echo 'window.location.href="'.$page.'";';
// echo '</script>';

//Functions
include_once("connections/connection.php");
include_once("addnewCard.php");
include_once("updatecard.php");

//Restriction 
$user = $_SESSION['Access'];

if($user != "admin"){
  http_response_code(404);
  echo "Restricted Page";
  // include('my_404.php');
  die();
}

//DB Connection
$con = connection();

//Page ID
$id = $_GET['ID'];

//Query pet information
$pet_sql = "SELECT * FROM pet_reg WHERE id = $id";
$pets = $con->query($pet_sql) or die ($con->error);
$pet = $pets->fetch_assoc();

//Query all health Cards Data 
$healthcard_sql = "SELECT * FROM pet_healthcard WHERE pet_id = $id";
$healthcard_data = $con->query($healthcard_sql) or die ($con->error);


//Update all client healthcard
if(isset($_POST['updateCard'])){

      $healthcards = $_SESSION['HEALTHCARD_IDs'];
  
      //call updatecard.php function
      updatecard();
          
}
      

//Add new health card
if(isset($_POST['addnewcard'])){
  addnewCard();
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

  <!-- Admin Content  -->
      <div class="page-content" oncontextmenu="return false;">
        <div class="card">
              <a href="/administrator.php">
                <div class="arrow previous"><span class="sr-only">Previous</span></div>
              </a>
              <h5 class="card-header text-right">Breeder: <?php echo $pet['user_fname'] ?> <?php echo $pet['user_lname'] ?></h5>
              <div class="card-body">
                  <div class="card_record">
                      <div class="card_record-image">
                        <img src="" alt="">
                      </div>
                      <div class="card_record-details">
                        <h2>Name: <?php echo $pet['pet_name'] ?></h2>
                        <span>Breed: <?php echo $pet['pet_breed'] ?></span><br>
                        <span>Date of Birth: <?php echo $pet['pet_birthday'] ?></span><br>
                        <span>Special Marking: <?php echo $pet['special_marking'] ?></span>
                      </div>
                  </div>
                  <div class="record-vaccination pt-5">
                      <div class="container-fluid p-0">
                          <div class="row">
                              <div class="col-lg-6">
                                  <p>Recommended Vaccination Schedule From the Humane Society</p>
                              </div>
                              <div class="col-lg-6">
                                <form action="" method="post" class="text-right">
                                 
                                  <input class="btn btn-primary" type="submit" name="addnewcard" method="POST" value="create new card">

                                </form>
                              </div>
                            
                              <form action="" method="post">
                                
                                <div class="product-slider">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="healthcard-container">
                                                    <div class="swiper-wrapper">

                                                          <?php 
                                                            
                                                          //Fetch all client healthcard 
                                                          $healthcard_update = array();

                                                          //
                                                          $single_variable = array();
                                                          $i = 0;
                                                          while($row = $healthcard_data->fetch_assoc()) {                                                         

                                                            $healthcard_ID = $row['healthcard_id'];
                                                      
                                                            $healthcard_update[] = $row['pet_id'];

                                                            $single_variable[] = $row['healthcard_id'];

                                                            $fetch_IDs = "SELECT * FROM pet_healthcard WHERE healthcard_id = $healthcard_ID ";
                                                            $IDs = $con->query($fetch_IDs) or die ($con->error);
                                                            $row_item = $IDs->fetch_assoc();

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

                                                            
                                                            echo "<div class='swiper-slide'> 
                                                                    <div class='table-wrapper'>
                                                                      <table class='table table-bordered text-center'>
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope='col' colspan='6'><h2>Anti - Parasitics</h2></th>
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
                                                                  </div>";

                                                          $i++;
                                              }

                                              //GLOBAL Variable for Updatecard.php
                                              $_SESSION['UPDATE_CARD'] = $healthcard_update;
                                              $_SESSION['HEALTHCARD_IDs'] = $single_variable;
                       

                                              // echo $_SESSION['SCHEDULE'];
                                              ?>

                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                  <div class='text-right'>
                                  <input class='btn btn-primary' type='submit' name='updateCard' value='Update'>
                                  </div>

                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <hr>
</div>

  <!-- page-content" -->
<script src='js/loading.js'></script>


<?php include 'footer.php'; ?>