<?php
$con = mysqli_connect('localhost','root','','project_php');

if(!$con){
    die('Error : ' . mysqli_connect_error());
}