<?php 

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $client = "client";

    $check = mysqli_query($con, "SELECT * FROM user_reg WHERE email = '$email'");
    $checkrows = mysqli_num_rows($check);

    if($checkrows > 0){
        echo "Email enter was already registered";
    } else {
 
        $sql = "INSERT INTO `user_reg`(`first_name`, `last_name`, `birth_day`, `address`, `phone_num`, `gender`, `email`, `password`, `access`) VALUES ('$fname', '$lname', '$birthday', '$address', '$phoneNum', '$gender', '$email', '$password', '$client')";
    
        $con->query($sql) or die ($con->error);

        // echo header("location: index.php");
        header("Location: index.php");
    }
}

?>





