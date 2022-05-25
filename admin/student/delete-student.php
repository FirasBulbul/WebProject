<?php 

require_once('../layout/connection.php');

if(!empty($_GET)){
    $id = $_GET['id'];
    $sql = "delete from student where id = $id";
    $result = mysqli_query($call,$sql);
    if($result){
        header("Location:index.php");
    }else{
        die("Error delete this Student");
    }
}