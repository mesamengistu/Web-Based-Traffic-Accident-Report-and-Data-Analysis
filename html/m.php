
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>traffic accident report </title>
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css"  type ="text/css" rel ="stylesheet" >     
        <link href ="http://localhost/mengistu/traffic_accident_report/css/shadow.css" rel ="stylesheet" >  
        <link rel="stylesheet" href="../css/style.css">
         <style>
            .color{background-color: rgb(35, 107, 241);
            height: 35px;
            color:white;
                   }
            .a{background: black;padding: 0px 5px; margin: opx;}
            body{padding-top: 60px; padding-bottom: 30px;}
        </style>
        
    </head>
    <body>
     <div class="container-fluid" style="padding-top:70px;padding-bottom: 70px;">
            <div class="row ">
                <div class="col-lg-9"> 
                    <?php
                     include 'database.php';
                     $today_year = date('Y');
                     $today_month =date('m');
                     $today_day = date('d');
                     $today = date('Y-m-d');
                     $conn =connect();
                     $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id   ";

                     $result = $conn->query($sql) or die("query error");
               
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {
                        $time = $row['time_stamp'];
                        $time = substr($time,0, 10);
                        $address = $row['tra_region']."Region".$row['tra_zone']."Zone".$row['tra_wereda']."Wereda".$row['tra_kebele']."Kebele".$row['place_spacif']."Specific";
                        $no_die = $row['acci_no_die'];
                        $no_sever = $row['acci_no_severly'];
                        $no_slightly = $row['acci_no_slightly'];
                        $birr =$row['acci_damage_inbirr'];
                        $acci_date = $row['acci_date'];
                        if($today = $time)
                        {
                             echo '
                                  
                                 <div class =" col-lg-offset-1 col-lg-7">
                                     <img  class ="img-thumbnail img-responsive img-rounded" src ="../images/'.($row['car_img']).'"/>
                                 </div>';

                                 echo ' <div class = "col-lg-4 text-justify"> ADDRESS' ;
                                        echo $address;
                                        echo "<br> number of people die = $no_die";
                                        echo "<br> number of Severly injure = $no_sever";
                                        echo "<br> number of Slightly injure = $no_slightly"; 
                                        echo "<br> birr loss in accident     = $birr Ethiopian birr";  
                                        echo "<br> birr loss in accident     = $birr Ethiopian birr"; 
                                        echo "<br> accident date         = $acci_date EC";
                                 echo'</div> ';
                        }

                    }          
                }
                    ?>  
                </div>
            </div>
        </div>
    </body>  
</html>
