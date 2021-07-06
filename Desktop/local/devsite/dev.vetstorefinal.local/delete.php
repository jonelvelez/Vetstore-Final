<?php

include_once("connections/connection.php");
$con = connection();

$id = $_GET['ID'];
$sql = "DELETE FROM blog_post WHERE blog_id = '$id'";
$con->query($sql) or die ($con->error);
echo header("Location: deleteblog.php");



