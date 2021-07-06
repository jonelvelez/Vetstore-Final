

<?php 
// function fetch_healthcard() {

// include_once("connections/connection.php");
// $con = connection();

// $id = $_GET['ID'];

// //Fetch health card Data in screen
// $healthcard_sql = "SELECT * FROM pet_healthcard WHERE pet_id = $id";
// $healthcard_data = $con->query($healthcard_sql) or die ($con->error);

// $pet_IDs = array();
// while($row = $healthcard_data->fetch_assoc()) {

//     $items = $row['healthcard_id'];
  
//     $pet_IDs[] = $items;
  
//   }

//     foreach($pet_IDs as $ids){
//         echo $ids;
//     }

    
// }

include_once("connections/connection.php");
$con = connection();

// include_once("vetcardUpdate.php");
// $value = healthcardID();

  $id = $_SESSION['healthcardID'];

  $healthcard_sql = "SELECT * FROM pet_healthcard WHERE pet_id = $id";
  $healthcard_data = $con->query($healthcard_sql) or die ($con->error);
  $row = $healthcard_data->fetch_assoc();
  $okay = $row['healthcard_id'];
 

echo "<p>". $okay ."</p>";
echo $id;
// echo "okay";

?>



