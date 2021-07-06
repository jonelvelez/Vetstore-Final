
<?php 

if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user_reg WHERE email = '$email' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;   

    $page = $_SERVER['REQUEST_URI'];
    echo '<script type="text/javascript">';
    echo 'window.location.href="'.$page.'";';
    echo '</script>';


    if($total > 0){
        $_SESSION['UserId'] = $row['id'];
        $_SESSION['UserLogin'] = $row['first_name'];
        $_SESSION['Userlname'] = $row['last_name'];
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['UserImage'] = $row['user_image'];
        $_SESSION['Access'] = $row['access'];
  


    } else {

        echo "<div class='alert alert-danger'>
        <strong>email or password is incorrect!</strong>
        </div>";
   
    }

}


?>


