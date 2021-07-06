<?php 

function updatecard() {

//DB Connection
include_once("connections/connection.php");
$con = connection();

$updatesss = $_SESSION['UPDATE_CARD'];

// $updatesss[1];
$arr_num = count($_SESSION['HEALTHCARD_IDs']);

$update_detail = ($_SESSION['HEALTHCARD_IDs']);

for($i = 0; $i < $arr_num; $i++){

  //Deworming Data Table
  $d_row1_date = $_POST["d_row1_date$i"];   
  $d_row1_weight = $_POST["d_row1_weight$i"];   
  $d_row1_against = $_POST["d_row1_against$i"];   
  $d_row1_manufacturer = $_POST["d_row1_manufacturer$i"];   
  $d_row1_ldtnumber = $_POST["d_row1_ldtnumber$i"];   
  $d_row1_vet = $_POST["d_row1_vet$i"];
 
  $d_row2_date = $_POST["d_row2_date$i"];   
  $d_row2_weight = $_POST["d_row2_weight$i"];   
  $d_row2_against = $_POST["d_row2_against$i"];   
  $d_row2_manufacturer = $_POST["d_row2_manufacturer$i"];   
  $d_row2_ldtnumber = $_POST["d_row2_ldtnumber$i"];   
  $d_row2_vet = $_POST["d_row2_vet$i"];  
 
  $d_row3_date = $_POST["d_row3_date$i"];   
  $d_row3_weight = $_POST["d_row3_weight$i"];   
  $d_row3_against = $_POST["d_row3_against$i"];   
  $d_row3_manufacturer = $_POST["d_row3_manufacturer$i"];   
  $d_row3_ldtnumber = $_POST["d_row3_ldtnumber$i"];   
  $d_row3_vet = $_POST["d_row3_vet$i"]; 
 
  $d_row4_date = $_POST["d_row4_date$i"];   
  $d_row4_weight = $_POST["d_row4_weight$i"];   
  $d_row4_against = $_POST["d_row4_against$i"];   
  $d_row4_manufacturer = $_POST["d_row4_manufacturer$i"];   
  $d_row4_ldtnumber = $_POST["d_row4_ldtnumber$i"];   
  $d_row4_vet = $_POST["d_row4_vet$i"]; 
 
  $d_row5_date = $_POST["d_row5_date$i"];   
  $d_row5_weight = $_POST["d_row5_weight$i"];   
  $d_row5_against = $_POST["d_row5_against$i"];   
  $d_row5_manufacturer = $_POST["d_row5_manufacturer$i"];   
  $d_row5_ldtnumber = $_POST["d_row5_ldtnumber$i"];   
  $d_row5_vet = $_POST["d_row5_vet$i"]; 
 
  $d_row6_date = $_POST["d_row6_date$i"];   
  $d_row6_weight = $_POST["d_row6_weight$i"];   
  $d_row6_against = $_POST["d_row6_against$i"];   
  $d_row6_manufacturer = $_POST["d_row6_manufacturer$i"];   
  $d_row6_ldtnumber = $_POST["d_row6_ldtnumber$i"];   
  $d_row6_vet = $_POST["d_row6_vet$i"]; 
 
  //Vaccine Data Table
 
  $v_row1_date = $_POST["v_row1_date$i"];   
  $v_row1_weight = $_POST["v_row1_weight$i"];   
  $v_row1_against = $_POST["v_row1_against$i"];   
  $v_row1_manufacturer = $_POST["v_row1_manufacturer$i"];   
  $v_row1_ldtnumber = $_POST["v_row1_ldtnumber$i"];   
  $v_row1_vet = $_POST["v_row1_vet$i"];
 
  $v_row2_date = $_POST["v_row2_date$i"];   
  $v_row2_weight = $_POST["v_row2_weight$i"];   
  $v_row2_against = $_POST["v_row2_against$i"];   
  $v_row2_manufacturer = $_POST["v_row2_manufacturer$i"];   
  $v_row2_ldtnumber = $_POST["v_row2_ldtnumber$i"];   
  $v_row2_vet = $_POST["v_row2_vet$i"];
 
  $v_row3_date = $_POST["v_row3_date$i"];   
  $v_row3_weight = $_POST["v_row3_weight$i"];   
  $v_row3_against = $_POST["v_row3_against$i"];   
  $v_row3_manufacturer = $_POST["v_row3_manufacturer$i"];   
  $v_row3_ldtnumber = $_POST["v_row3_ldtnumber$i"];   
  $v_row3_vet = $_POST["v_row3_vet$i"];
 
  $v_row4_date = $_POST["v_row4_date$i"];   
  $v_row4_weight = $_POST["v_row4_weight$i"];   
  $v_row4_against = $_POST["v_row4_against$i"];   
  $v_row4_manufacturer = $_POST["v_row4_manufacturer$i"];   
  $v_row4_ldtnumber = $_POST["v_row4_ldtnumber$i"];   
  $v_row4_vet = $_POST["v_row4_vet$i"];
 
  $v_row5_date = $_POST["v_row5_date$i"];   
  $v_row5_weight = $_POST["v_row5_weight$i"];   
  $v_row5_against = $_POST["v_row5_against$i"];   
  $v_row5_manufacturer = $_POST["v_row5_manufacturer$i"];   
  $v_row5_ldtnumber = $_POST["v_row5_ldtnumber$i"];   
  $v_row5_vet = $_POST["v_row5_vet$i"];
 
  $v_row6_date = $_POST["v_row6_date$i"];   
  $v_row6_weight = $_POST["v_row6_weight$i"];   
  $v_row6_against = $_POST["v_row6_against$i"];   
  $v_row6_manufacturer = $_POST["v_row6_manufacturer$i"];   
  $v_row6_ldtnumber = $_POST["v_row6_ldtnumber$i"];   
  $v_row6_vet = $_POST["v_row6_vet$i"];
 
  $healthcard_update = "UPDATE `pet_healthcard` SET `d_row1_date`= '$d_row1_date',`d_row1_weight`= '$d_row1_weight',`d_row1_against`= '$d_row1_against',`d_row1_manufacturer`= '$d_row1_manufacturer',`d_row1_ldtnumber`= '$d_row1_ldtnumber',`d_row1_vet`= '$d_row1_vet',`d_row2_date`= '$d_row2_date',`d_row2_weight`= '$d_row2_weight',`d_row2_against`= '$d_row2_against',`d_row2_manufacturer`= '$d_row2_manufacturer',`d_row2_ldtnumber`= '$d_row2_ldtnumber',`d_row2_vet`= '$d_row2_vet',`d_row3_date`='$d_row3_date',`d_row3_weight`= '$d_row3_weight',`d_row3_against`= '$d_row3_against',`d_row3_manufacturer`='$d_row3_manufacturer',`d_row3_ldtnumber`= '$d_row3_ldtnumber',`d_row3_vet`= '$d_row3_vet',`d_row4_date`= '$d_row4_date',`d_row4_weight`= '$d_row4_weight',`d_row4_against`='$d_row4_against',`d_row4_manufacturer`= '$d_row4_manufacturer',`d_row4_ldtnumber`= '$d_row4_ldtnumber',`d_row4_vet`='$d_row4_vet',`d_row5_date`= '$d_row5_date',`d_row5_weight`= '$d_row5_weight',`d_row5_against`= '$d_row5_against',`d_row5_manufacturer`= '$d_row5_manufacturer',`d_row5_ldtnumber`= '$d_row5_ldtnumber',`d_row5_vet`='$d_row5_vet',`d_row6_date`='$d_row6_date',`d_row6_weight`= '$d_row6_weight',`d_row6_against`= '$d_row6_against',`d_row6_manufacturer`= '$d_row5_manufacturer',`d_row6_ldtnumber`= '$d_row6_ldtnumber',`d_row6_vet`='$d_row6_vet',`v_row1_date`='$v_row1_date',`v_row1_weight`= '$v_row1_weight',`v_row1_against`='$v_row1_against',`v_row1_manufacturer`= '$v_row1_manufacturer',`v_row1_ldtnumber`='$v_row1_ldtnumber',`v_row1_vet`='$v_row1_vet',`v_row2_date`='$v_row2_date',`v_row2_weight`='$v_row2_weight',`v_row2_against`='$v_row2_against',`v_row2_manufacturer`='$v_row2_manufacturer',`v_row2_ldtnumber`='$v_row2_ldtnumber',`v_row2_vet`='$v_row2_vet',`v_row3_date`='$v_row3_date',`v_row3_weight`='$v_row3_weight',`v_row3_against`='$v_row3_against',`v_row3_manufacturer`='$v_row3_manufacturer',`v_row3_ldtnumber`='$v_row3_ldtnumber',`v_row3_vet`='$v_row3_vet',`v_row4_date`='$v_row4_date',`v_row4_weight`='$v_row4_weight',`v_row4_against`='$v_row4_against',`v_row4_manufacturer`='$v_row4_manufacturer',`v_row4_ldtnumber`='$v_row4_ldtnumber',`v_row4_vet`='$v_row4_vet',`v_row5_date`='$v_row5_date',`v_row5_weight`='$v_row5_weight',`v_row5_against`='$v_row5_against',`v_row5_manufacturer`='$v_row5_manufacturer',`v_row5_ldtnumber`='$v_row5_ldtnumber',`v_row5_vet`='$v_row5_vet',`v_row6_date`='$v_row6_date',`v_row6_weight`='$v_row6_weight',`v_row6_against`='$v_row5_against',`v_row6_manufacturer`='$v_row5_manufacturer',`v_row6_ldtnumber`='$v_row6_ldtnumber',`v_row6_vet`='$v_row6_vet' WHERE healthcard_id = '$update_detail[$i]'";

  $con->query($healthcard_update) or die ($con->error);

  $page = $_SERVER['REQUEST_URI'];
  echo '<script type="text/javascript">';
  echo 'window.location.href="'.$page.'";';
  echo '</script>';

}
  



    }


?>