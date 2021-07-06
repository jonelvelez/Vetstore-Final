<?php include 'signup.php'; ?>
<?php include 'login.php'; ?>

<?php 

if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
$con = connection();

    $sqlClientUser = "SELECT * FROM pet_reg WHERE id";
    $client = $con->query($sqlClientUser) or die ($con->error);

    if($client->num_rows > 0){

        while($rows = $client->fetch_assoc()) {

            $petId = $rows["id"];
            $petName = $rows["pet_name"];
            $petBreed = $rows["pet_breed"];
            $petBirthday = $rows["pet_birthday"];
            $specialMarking = $rows["special_marking"];

              

        }

    }


?>