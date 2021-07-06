<?php 

    function addnewCard() {

        include_once("connections/connection.php");
        $con = connection();

        $id = $_GET['ID'];

        $null = "";

        // Inserting data in health card table
        $new_healthCard = "INSERT INTO `pet_healthcard`(`pet_id`, `d_row1_date`, `d_row1_weight`, `d_row1_against`, `d_row1_manufacturer`, `d_row1_ldtnumber`, `d_row1_vet`, `d_row2_date`, `d_row2_weight`, `d_row2_against`, `d_row2_manufacturer`, `d_row2_ldtnumber`, `d_row2_vet`, `d_row3_date`, `d_row3_weight`, `d_row3_against`, `d_row3_manufacturer`, `d_row3_ldtnumber`, `d_row3_vet`, `d_row4_date`, `d_row4_weight`, `d_row4_against`, `d_row4_manufacturer`, `d_row4_ldtnumber`, `d_row4_vet`, `d_row5_date`, `d_row5_weight`, `d_row5_against`, `d_row5_manufacturer`, `d_row5_ldtnumber`, `d_row5_vet`, `d_row6_date`, `d_row6_weight`, `d_row6_against`, `d_row6_manufacturer`, `d_row6_ldtnumber`, `d_row6_vet`, `v_row1_date`, `v_row1_weight`, `v_row1_against`, `v_row1_manufacturer`, `v_row1_ldtnumber`, `v_row1_vet`, `v_row2_date`, `v_row2_weight`, `v_row2_against`, `v_row2_manufacturer`, `v_row2_ldtnumber`, `v_row2_vet`, `v_row3_date`, `v_row3_weight`, `v_row3_against`, `v_row3_manufacturer`, `v_row3_ldtnumber`, `v_row3_vet`, `v_row4_date`, `v_row4_weight`, `v_row4_against`, `v_row4_manufacturer`, `v_row4_ldtnumber`, `v_row4_vet`, `v_row5_date`, `v_row5_weight`, `v_row5_against`, `v_row5_manufacturer`, `v_row5_ldtnumber`, `v_row5_vet`, `v_row6_date`, `v_row6_weight`, `v_row6_against`, `v_row6_manufacturer`, `v_row6_ldtnumber`, `v_row6_vet`) VALUES ('$id','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null','$null')";

        $con->query($new_healthCard) or die ($con->error);

        $page = $_SERVER['REQUEST_URI'];
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$page.'";';
        echo '</script>';

    }