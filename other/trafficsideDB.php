<?php
if(isset($_POST['submit']))
{
    include 'database.php';
    $image_name = $_FILES['img']['name'];
    $target = "images/".basename($image_name);
    if(preg_match("/(\.jpg|\.jpeg|\.png|\.gif)$/i",$image_name))
    {
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target))
          {
              echo "file succcesfully saved";
          }   
    }
    $conn = connect();
    $car_id =$_POST['car_id'];
    $car_type =$_POST['car_type'];
    $driver_id =$_POST['driver_id'];
    $driver_fname  =$_POST['driver_fname'];
    $driver_lname  =$_POST['driver_lname'];
    $traffic_id ="mengistu";
    $accident_place = "grand";
    $accident_type=$_POST['accident_type'];
    $accident_couse =$_POST['accident_couse'];
    $num_die =$_POST['no_die'];
    $num_kebad =$_POST['no_kebad'];
    $num_kelal =$_POST['no_kelal'];
    $date =10;
    $about ="noting";
    $img ="gggg";
    $sql = "INSERT INTO accident_info (driver_id,traffic_id,car_id,place,typu,couse,img,about,dat) VALUES('$driver_id','$traffic_id','$car_id','$accident_place','$accident_type','$accident_couse','$image_name','$about','$date')";
    $conn->query($sql) or die("insert problem");
    $conn->close();

    
}



?>