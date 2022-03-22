<?php
    function connect(){
   $conn = new mysqli("localhost","root","","traffic_accident_report") or die("connection problem".mysqli_error());
   // echo "et is in database connct class";
   return $conn;
    }
?>