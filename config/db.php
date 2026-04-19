<?php


try{
    
$conn=mysqli_connect("localhost","root","","blog");
}
catch(Exception $e){

 //  echo "connection failed".$e->getMessage();
   include "mentainance.php";
}





?>