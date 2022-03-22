
<?php
if($GLOBALS['chek']==1)
{
    if($_SERVER['REQUEST_METHOD'] =="POST")
 {
 	       include 'database.php';
           if(isset($_POST['submit']))
           {
            $conn = connect();
            $sql = "INSERT INTO traffic_info (tra_id,tra_username,tra_password) VALUES('$tra_id','$tra_username','$tra_password')";
           $conn->query($sql) or die("insert problem");

           $sql = "INSERT INTO traffic_phone (tra_id,tra_phone) VALUES('$tra_id','$tra_phone')";
           $conn->query($sql) or die("insert problem");

           $sql = "INSERT INTO traffic_place (tra_id,tra_region,tra_zone,tra_wereda,tra_kebele) VALUES('$tra_id','$tra_region','$tra_zone','$tra_wereda','$tra_kebele')";
           $conn->query($sql) or die("insert problem");
           $conn->close();
           }
  }
}
 
?>