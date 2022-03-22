
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
       <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
    </head>
    <body>
        <?php        $place_area =array();
                     $place_frequency =array();
                     $i =0;
                     $total_accident =0;
                     include 'database.php';
                     $sum_die = $no_severly = $no_slightly = $damage_birr=0;
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
                       $time =$row['acci_date'];
                       $time = substr($time,0, 4);
                       if($time = $today_year)
                       {
                             $sum_die =$sum_die+$row['acci_no_die'];
                             $no_severly =$no_severly+$row['acci_no_severly'];
                             $no_slightly =$no_slightly+$row['acci_no_slightly'];
                             $damage_birr =$damage_birr+$row['acci_damage_inbirr'];
                             $total_accident =$total_accident+1;
                       }
                       
                    }
                         $sql ="SELECT acciplace.place_area ,COUNT(acciplace.place_area) AS MOST_FREQUENT FROM acciplace INNER JOIN accident_info ON acciplace.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  acciplace.place_area ORDER BY COUNT(acciplace.place_area)  DESC   ";
                          $result = $conn->query($sql) or die("query error");
           
                          if($result-> num_rows > 0)
                           {
                              while ($row = $result-> fetch_assoc())
                             {
                                $place_area[$i] =$row['place_area'];
                                $place_frequency[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $area1 = ($place_frequency[0]/$total_accident)*100;
                            $area2 = ($place_frequency[1]/$total_accident)*100;
                            //$area3 = ($place_frequency[2]/$total_accident)*100;
                      
                    





                }


        ?>
     <div class="container-fluid" style="padding-top:70px;padding-bottom: 70px;">
            <div class="row ">
                <div class="col-lg-9"> <h3> <?php echo ($today_year-1);?> ACCIDENT ANNALYSISS   </h3>
                    <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                            <thead>  
                                  <th>Lost People</th>
                                  <th>Severly Injure</th>
                                  <th>Slightly Injure</th>
                                  <th>Lost birr</th>
                                  <th>3 most accident area</th>
                            </thead>
                            <tbody">  
                            <?php
                             echo "<tr>";
                                 echo "<td> ".$sum_die." </td>";
                                 echo "<td> ".$no_severly." </td>";
                                 echo "<td> ".$no_slightly." </td>";
                                 echo "<td> ".$damage_birr." </td>";
                                 echo "<td> ".$area1."%".$place_area[0]."<br>".$area2."%".$place_area[1]." </td>";
                             echo "</tr>";
                            ?>   
                            </tbody"> 
                    </table> 
                    <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                            <thead>  
                                  <th>car speed</th>
                                  <th>car service age</th>
                                  <th>car damage extent</th>
                                  <th>car contribution</th>
                                  <th>car ownership</th>
                                  <th>car type</th>
                                  <th>car meneuver</th>
                            </thead>
                            <tbody">  
                            <?php 
                            $i =0; $damage_extent =array ('','','');$extent_freq =array(0,0,0);
                            $sql ="SELECT car_info.car_damage_extent ,COUNT(car_info.car_damage_extent) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_damage_extent ORDER BY COUNT(car_info.car_damage_extent)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $damage_extent[$i] =$row['car_damage_extent'];
                                $extent_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $damage_ext1 = ($extent_freq[0]/$total_accident)*100;
                            $damage_ext2 = ($extent_freq[1]/$total_accident)*100;
                            //$area3 = ($place_frequency[2]/$total_accident)*100;

                            $i =0; $car_contribution =array ('','','');$contribution_freq =array(0,0,0);
                            $sql ="SELECT car_info.car_contribution ,COUNT(car_info.car_contribution) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_contribution ORDER BY COUNT(car_info.car_contribution)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_contribution[$i] =$row['car_contribution'];
                                $contribution_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $contribution1 = ($contribution_freq[0]/$total_accident)*100;
                            $contribution2 = ($contribution_freq[1]/$total_accident)*100;
                            $contribution3 = ($contribution_freq[2]/$total_accident)*100;
                            $i =0; $car_ownership =array ('','','');$ownership_feq =array(0,0,0);
                            $sql ="SELECT car_info.car_ownership ,COUNT(car_info.car_ownership) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_ownership ORDER BY COUNT(car_info.car_ownership)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_ownership[$i] =$row['car_ownership'];
                                $ownership_feq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $owner1 = ($ownership_feq[0]/$total_accident)*100;
                            $owner2 = ($ownership_feq[1]/$total_accident)*100;
                            $owner3 = ($ownership_feq[2]/$total_accident)*100;

                            $i =0; $car_type =array ('','','');$type_frq =array(0,0,0);
                            $sql ="SELECT car_info.car_type ,COUNT(car_info.car_type) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_type ORDER BY COUNT(car_info.car_type)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_type[$i] =$row['car_type'];
                                $type_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $type1 = ($type_frq[0]/$total_accident)*100;
                            $type2 = ($type_frq[1]/$total_accident)*100;
                            $type3 = ($type_frq[2]/$total_accident)*100;

                            $i =0; $car_maneuver =array ('','','');$maneuver_frq =array(0,0,0);
                            $sql ="SELECT car_info.car_maneuver ,COUNT(car_info.car_maneuver) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_maneuver ORDER BY COUNT(car_info.car_maneuver)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_maneuver[$i] =$row['car_maneuver'];
                                $maneuver_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $manu1 = ($maneuver_frq[0]/$total_accident)*100;
                            $manu2 = ($maneuver_frq[1]/$total_accident)*100;
                            $manu3 = ($maneuver_frq[2]/$total_accident)*100;

                            $i =0; $car_speed =array ('','','');$speed_frq =array(0,0,0);
                            $sql ="SELECT car_info.car_speed ,COUNT(car_info.car_speed) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_speed ORDER BY COUNT(car_info.car_speed)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_speed[$i] =$row['car_speed'];
                                $speed_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $speed1 = ($speed_frq[0]/$total_accident)*100;
                            $spee2 = ($speed_frq[1]/$total_accident)*100;
                            $spee3 = ($speed_frq[2]/$total_accident)*100;

                            $i =0; $car_service =array ('','','');$service_freq =array(0,0,0);
                            $sql ="SELECT car_info.car_service_age ,COUNT(car_info.car_service_age) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  car_info.car_service_age ORDER BY COUNT(car_info.car_service_age)  DESC  ";
                            $result = $conn->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_service[$i] =$row['car_service_age'];
                                $service_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $service1 = ($service_freq[0]/$total_accident)*100;
                            $service2 = ($service_freq[1]/$total_accident)*100;
                            $service3 = ($service_freq[2]/$total_accident)*100;

                             echo "<tr>";
                                  echo "<td>".$speed1." % ".$car_speed[0]."<br>".$spee2." % ".$car_speed[1]."<br>".$spee3." % ".$car_speed[2]." </td>";
                                  echo "<td>".$service1." % ".$car_service[0]."<br>".$service2." % ".$car_service[1]."<br>".$service3." % ".$car_service[2]." </td>";
                                  echo "<td> ".$damage_ext1." % ".$damage_extent[0]."<br>".$damage_ext2." % ".$damage_extent[1]." </td>";
                                  echo "<td>".$contribution1." % ".$car_contribution[0]."<br>".$contribution2." % ".$car_contribution[1]."<br>".$contribution3." % ".$car_contribution[2]." </td>";
                                  echo "<td>".$owner1." % ".$car_ownership[0]."<br>".$owner2." % ".$car_ownership[1]."<br>".$owner3." % ".$car_ownership[2]." </td>";
                                  echo "<td>".$type1." % ".$car_type[0]."<br>".$type2." % ".$car_type[1]."<br>".$type3." % ".$car_type[2]." </td>";
                                  echo "<td>".$manu1." % ".$car_maneuver[0]."<br>".$manu2." % ".$car_maneuver[1]."<br>".$manu3." % ".$maneuver_frq[2]." </td>";
                             echo "</tr>";
                            ?>   
                            </tbody"> 
                            <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                              <thead>  
                                  <th>road type</th>
                                  <th>road separation</th>
                                  <th>road geometry</th>
                                  <th> road surface type</th>
                                  <th>road light</th>
                                  <th>road weather</th>
                            </thead>
                            <tbody">  
                            <?php
                                $i =0; $road_type =array ('','','');$type_frq =array(0,0,0);
                                $sql ="SELECT road.ro_type ,COUNT(road.ro_type) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_type ORDER BY COUNT(road.ro_type)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $road_type[$i] =$row['ro_type'];
                                        $type_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $type1 = ($type_frq[0]/$total_accident)*100;
                            $type2 = ($type_frq[1]/$total_accident)*100;
                            $type3 = ($type_frq[2]/$total_accident)*100;

                            $i =0; $ro_separation =array ('','','');$separation_frq =array(0,0,0);
                                $sql ="SELECT road.ro_separation ,COUNT(road.ro_separation) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_separation ORDER BY COUNT(road.ro_separation)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_separation[$i] =$row['ro_separation'];
                                        $separation_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $separation1 = ($separation_frq[0]/$total_accident)*100;
                            $separation2 = ($separation_frq[1]/$total_accident)*100;
                            $separation3 = ($separation_frq[2]/$total_accident)*100;

                             $i =0; $ro_geometry =array ('','','');$geometry_frq =array(0,0,0);
                                $sql ="SELECT road.ro_geometry ,COUNT(road.ro_geometry) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_geometry ORDER BY COUNT(road.ro_geometry)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_geometry[$i] =$row['ro_geometry'];
                                        $geometry_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $geometry1 = ($geometry_frq[0]/$total_accident)*100;
                            $geometry2 = ($geometry_frq[1]/$total_accident)*100;
                            $geometry3 = ($geometry_frq[2]/$total_accident)*100;

                             $i =0; $ro_surface_condition =array ('','','');$surface_frq =array(0,0,0);
                                $sql ="SELECT road.ro_surface_condition ,COUNT(road.ro_surface_condition) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_surface_condition ORDER BY COUNT(road.ro_surface_condition)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_surface_condition[$i] =$row['ro_surface_condition'];
                                        $surface_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $surface1 = ($surface_frq[0]/$total_accident)*100;
                            $surface2 = ($surface_frq[1]/$total_accident)*100;
                            $surface3 = ($surface_frq[2]/$total_accident)*100;

                            $i =0; $ro_light =array ('','','');$light_frq =array(0,0,0);
                                $sql ="SELECT road.ro_light ,COUNT(road.ro_light) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_light ORDER BY COUNT(road.ro_light)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_light[$i] =$row['ro_light'];
                                        $light_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $light1 = ($light_frq[0]/$total_accident)*100;
                            $light2 = ($light_frq[1]/$total_accident)*100;
                            $light3 = ($light_frq[2]/$total_accident)*100;

                            $i =0; $ro_weather =array ('','','');$weather_frq =array(0,0,0);
                                $sql ="SELECT road.ro_weather ,COUNT(road.ro_weather) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  road.ro_weather ORDER BY COUNT(road.ro_weather)  DESC  ";
                               $result = $conn->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_weather[$i] =$row['ro_weather'];
                                        $weather_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                            $weather1 = ($ [0]/$total_accident)*100;
                            $weather2 = ($weather_frq[1]/$total_accident)*100;
                            $weather3 = ($weather_frq[2]/$total_accident)*100;



                             echo "<tr>";
                                 echo "<td>".$type1." % ".$road_type[0]."<br>".$type2." % ".$road_type[1]."<br>".$type3." % ".$road_type[2]." </td>";
                                 echo "<td>".$separation1." % ".$ro_separation[0]."<br>".$separation2." % ".$ro_separation[1]."<br>".$separation3." % ".$ro_separation[2]." </td>";
                                 echo "<td>".$geometry1." % ".$ro_geometry[0]."<br>".$geometry2." % ".$ro_geometry[1]."<br>".$geometry3." % ".$ro_geometry[2]." </td>";
                                 echo "<td>".$surface1." % ".$ro_surface_condition[0]."<br>".$surface2." % ".$ro_surface_condition[1]."<br>".$surface3." % ".$surface1[2]." </td>";
                                 echo "<td>".$light1." % ".$ro_light[0]."<br>".$light2." % ".$ro_light[1]."<br>".$light3." % ".$ro_light[2]." </td>";
                                 echo "<td>".$weather1." % ".$ro_weather[0]."<br>".$weather2." % ".$ro_weather[1]."<br>".$weather3." % ".$ro_weather[2]." </td>";     
                             echo "</tr>";
                            ?>   
                            </tbody"> 
                            </table> 






                            </table> 
                                <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                                 <thead>  
                                    <th>Drive age</th>
                                    <th>Drive car Relation</th>
                                    <th>Driver Contribution</th>
                                 </thead>
                                 <tbody">  
                                  <?php
                                   /*$i =0; $driv_age =array ('','','');$age_frq =array(0,0,0);
                                   $sql ="SELECT driver_info.driv_age ,COUNT(driver_info.driv_age) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  driver_info.driv_age ORDER BY COUNT(driver_info.driv_age)  DESC  ";
                                   $result = $conn->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_age[$i] =$row['car_age'];
                                                    $age_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }   
                                        }

                                   $age1 = ($age_frq[0]/$total_accident)*100;
                                   $age2 = ($age_frq[1]/$total_accident)*100;
                                   $age3 = ($age_frq[2]/$total_accident)*100;

                                   $i =0; $driv_relation =array ('','','');$relation_frq =array(0,0,0);
                                   $sql ="SELECT driver_info.driv_car_relation ,COUNT(driver_info.driv_car_relation) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  driver_info.driv_car_relation ORDER BY COUNT(driver_info.driv_car_relation)  DESC  ";
                                   $result = $conn->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_relation[$i] =$row['driv_car_relation'];
                                                    $relation_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }   
                                        }

                                   $relation1 = ($relation_frq[0]/$total_accident)*100;
                                   $relation2 = ($relation_frq[1]/$total_accident)*100;
                                   $relation3 = ($relation_frq[2]/$total_accident)*100;

                                   $i =0; $driv_cont =array ('','','');$contr_frq =array(0,0,0);
                                   $sql ="SELECT driver_info.driv_contribution ,COUNT(driver_info.driv_contribution ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  driver_info.driv_contribution  ORDER BY COUNT(driver_info.driv_contribution )  DESC  ";
                                   $result = $conn->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_cont[$i] =$row['driv_contribution'];
                                                    $contr_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }   
                                        }

                                   $cont1 = ($contr_frq[0]/$total_accident)*100;
                                   $cont2 = ($contr_frq[1]/$total_accident)*100;
                                   $cont3 = ($contr_frq[2]/$total_accident)*100;
                                 echo "<tr>";
                                 echo "<td>".$age1." % ".$driv_age[0]."<br>".$age2." % ".$driv_age[1]."<br>".$age2." % ".$driv_age[2]." </td>";
                                 echo "<td>".$relation1." % ".$driv_relation[0]."<br>".$relation2." % ".$driv_relation[1]."<br>".$relation3." % ".$driv_relation[2]." </td>";
                                
                                echo "<td>".$cont1." % ".$driv_cont[0]."<br>".$cont2." % ".$driv_cont[1]."<br>".$cont3." % ".$driv_cont[2]." </td>";
                                 
                             echo "</tr>";
                             */
                            ?>   
                            </tbody"> 
                    </table>       

                </div>
            </div>
        </div>
    </body>
    
</html>
