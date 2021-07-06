<?php include 'signup.php'; ?>
<?php include 'login.php'; ?>

<?php

if(!isset($_SESSION)){
    session_start();
}
//Db Connection
include_once("connections/connection.php");
$con = connection();




//Ajax Data Request
$petId = $_GET['q'];

    $sqlPetData = "SELECT * FROM pet_reg WHERE id = '$petId'";
    $user = $con->query($sqlPetData) or die ($con->error);

    if($user->num_rows > 0) {

            while($rows = $user->fetch_assoc()) {

            $petName = $rows["pet_name"];
            $petBreed = $rows["pet_breed"];
            $petBirthday = $rows["pet_birthday"];
            $specialMarking = $rows["special_marking"];

                echo "<div class='col-lg-2 record-image'>
                            <img src='https://via.placeholder.com/150' alt=''>
                        </div>
                        <div class='col-lg-10 info-record'>
                            <h2> Name: ". $petName ."</h2>
                            <span> Breed: ". $petBreed ."</span>
                            <span> Date of Birth: ". $petBirthday ."</span>
                            <span> Special Marking: ". $specialMarking ."</span>
                        </div>";  
            }
     
     }

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

