<?php

$call = mysqli_connect('localhost','root','','project_php');
if( ! $call){
    die("Error : " . mysqli_connect_error());
}

if(! isset($_SESSION['name'])){
    header('location:../../index.php');
}

?>