
<?php include 'header.php'; ?>
<?php 

include_once("connections/connection.php");
$con = connection();



if(isset($_POST['regSubmit'])){

    if(isset($_SESSION['UserLogin'])){

        $pname = $_POST['pet-name'];
        $pbreed = $_POST['pet-breed'];
        $pbirthday = $_POST['pet-birthday'];
        $specialMarking = $_POST['pet-marking'];

        $userId = $_SESSION['UserId'];
        $userFname = $_SESSION['UserLogin'];
        $userLname = $_SESSION['Userlname'];
        $userEmail =  $_SESSION['UserEmail'];

        $sql = "INSERT INTO `pet_reg`(`pet_name`, `pet_breed`, `pet_birthday`, `special_marking`, `user_id`, `user_fname`, `user_lname`, `user_email`) VALUES ('$pname', '$pbreed', '$pbirthday' , '$specialMarking', '$userId', '$userFname', '$userLname', '$userEmail')";

        //Get the last id from last input
        if($con->query($sql) === TRUE ) {
            $last_id = $con->insert_id;

            $null = "";

            // Inserting data in health card table
            $healthcard = "INSERT INTO `pet_healthcard`(`pet_id`, `d_row1_date`, `d_row1_weight`, `d_row1_against`, `d_row1_manufacturer`, `d_row1_ldtnumber`, `d_row1_vet`, `d_row2_date`, `d_row2_weight`, `d_row2_against`, `d_row2_manufacturer`, `d_row2_ldtnumber`, `d_row2_vet`, `d_row3_date`, `d_row3_weight`, `d_row3_against`, `d_row3_manufacturer`, `d_row3_ldtnumber`, `d_row3_vet`, `d_row4_date`, `d_row4_weight`, `d_row4_against`, `d_row4_manufacturer`, `d_row4_ldtnumber`, `d_row4_vet`, `d_row5_date`, `d_row5_weight`, `d_row5_against`, `d_row5_manufacturer`, `d_row5_ldtnumber`, `d_row5_vet`, `d_row6_date`, `d_row6_weight`, `d_row6_against`, `d_row6_manufacturer`, `d_row6_ldtnumber`, `d_row6_vet`, `v_row1_date`, `v_row1_weight`, `v_row1_against`, `v_row1_manufacturer`, `v_row1_ldtnumber`, `v_row1_vet`, `v_row2_date`, `v_row2_weight`, `v_row2_against`, `v_row2_manufacturer`, `v_row2_ldtnumber`, `v_row2_vet`, `v_row3_date`, `v_row3_weight`, `v_row3_against`, `v_row3_manufacturer`, `v_row3_ldtnumber`, `v_row3_vet`, `v_row4_date`, `v_row4_weight`, `v_row4_against`, `v_row4_manufacturer`, `v_row4_ldtnumber`, `v_row4_vet`, `v_row5_date`, `v_row5_weight`, `v_row5_against`, `v_row5_manufacturer`, `v_row5_ldtnumber`, `v_row5_vet`, `v_row6_date`, `v_row6_weight`, `v_row6_against`, `v_row6_manufacturer`, `v_row6_ldtnumber`, `v_row6_vet`) VALUES ('$last_id','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null')";

            $con->query($healthcard) or die ($con->error);
        } else {
            echo $con->error;
        }
        

        $page = $_SERVER['REQUEST_URI'];
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$page.'";';
        echo '</script>';

    } else {

        echo "<div class='alert alert-danger'>
        <strong>You need to login first.</strong>
        </div>";
     
    }
 
}


?>


<div class="banner">
    <div class="container-fluid">
        <div class="row">
            <h1>Header</h1>
        </div>
    </div>
</div>

<div class="appointment-form pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <h2 class="card-header">Appointment Form</h2>
                <div class="card-body">
                  
                    <h5 class="card-title">Pet Registration</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="pet-details">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form action="" method="post" id="reg-form">
                                        <div class="form-outline mt-3">
                                            <input value="" class="form-control" type="text" name="pet-name" id="pet-name formControlDefault" required>
                                            <label class="form-label" for="pet-name">Name</label>
                                        </div>
                                        <div class="form-outline mt-3">
                                            <input value="" class="form-control" type="text" name="pet-breed" id="pet-breed formControlDefault" required>
                                            <label class="form-label" for="pet-breed">Breed</label>
                                        </div>
                                        <label class="form-label mt-3" for="pet-birthday">Birthday</label>
                                        <div class="form-outline">
                                            <input value="" class="form-control" type="date" name="pet-birthday" id="pet-birthday formControlDefault" required>
                                        </div>
                                        <div class="form-outline mt-3">
                                            <input value="" class="form-control" type="text" name="pet-marking" id="pet-marking formControlDefault" required>
                                            <label class="form-label" for="pet-marking">Special Marking</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pet-image">
                                        <img src="images/golden-retriever.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vaccination pt-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Recommended Vaccination Schedule From the Humane Society</p>
                                </div>
                                <!-- <div class="col-lg-6 text-right">
                                    <p>Date: <input type="text" id="datepicker"></p>
                               </div> -->
                                <div style="overflow-x: auto;">
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
                                <div class='table-wrapper' style="overflow-x: auto;">
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
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-btn">
                        <div class="container-fluid">
                     
                            <input class="btn btn-primary mt-3 reg-form" type="submit" name="regSubmit" value="Submit Form" method="POST" form="reg-form">
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>