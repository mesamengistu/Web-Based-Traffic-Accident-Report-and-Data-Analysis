
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>traffic accident report </title>
        <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
        <link rel="stylesheet" href="../css/style.css">
     <style>
         .map_container{
            width:100%;
            height:480px;
            background-color: #e8e8e8;
         }
      </style>
        
    </head>
    <body>
     <div class="container-fluid" style="padding-top:70px;padding-bottom: 70px;">
            <div class="row">
                <div class="col-lg-9"> 
                    <?php
                    include 'map_viewer.php';
                     include 'database.php';
                     $today_year = date('Y');
                     $today_month =date('m');
                     $today_day = date('d');
                     $today = date('Y-m-d');
                     $conn =connect();
                     $sql = "SELECT * FROM accident_info d   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id   ";

                     $result = $conn->query($sql) or die("query error");
                     $i=0;
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {
                       
                        $car_num =$row['acci_num_car']-$i;
                        $time = $row['time_stamp'];
                        $time = substr($time,0, 10);
                        $address = " Region:->".$row['place_region']." Zone:->".$row['place_zone']." Wereda:->".$row['place_wereda']."Kebele:->".$row['place_kebele']." Specific:->".$row['place_spacif'];
                        $no_die = $row['acci_no_die'];
                        $no_sever = $row['acci_no_severly'];
                        $no_slightly = $row['acci_no_slightly'];
                        $birr =$row['acci_damage_inbirr'];
                        $acci_date = $row['acci_date'];
                        $car_img =$row['car_img'];
                        $longitude =$row['place_altitude'];
                        $latitude =$row['place_latitude'];
                        if($today = $time)  
                        {
                            if($car_num >= 2){
                              $i =$i+1; 
                                
                            }
                            else{display($car_img,$acci_date,$birr,$no_slightly,$no_sever,$address,$no_die);}
                        }

                    }          
                }
                         function display($car_img,$acci_date,$birr,$no_slightly,$no_sever,$address,$no_die){
                            global $longitude ,$latitude;
                             echo '
                                  
                                 <div class =" col-lg-offset-1 col-lg-7">
                                     <img  class ="img-thumbnail img-responsive img-rounded" src ="../images/'.$car_img.'"/>
                                 </div>';

                                 echo ' <div class = "col-lg-4 text-justify"> ADDRESS:' ;
                                        echo $address;
                                        echo "<br> number of people die = $no_die";
                                        echo "<br> number of Severly injure = $no_sever";
                                        echo "<br> number of Slightly injure = $no_slightly"; 
 
                                        echo "<br> birr loss in accident     = $birr Ethiopian birr"; 
                                        echo "<br> accident date         = $acci_date EC";
                                        
                                        echo' <div id="MapViewer" class="map_container">';
                                          DisplayMap($longitude, $latitude, 'MapViewer');                
                                        echo '</div>'; 
                                          
                                       echo'</div> ';
                                 $GLOBALS['i'] =0;
                         }





                    ?>  
                </div>
            </div>
        </div>
    </body>  
</html>
