<?php    
                     $total_accident =0;
                     include 'database.php';
                     $conn =connect();
                       function accident($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele) 
            {        

                     $arrayName = array();
                     $serch = $accidentyear_analyss;
                     $region = $analysis_tra_region;
                     $zone = $analysis_tra_zone;
                     $wereda = $analysis_tra_wereda;
                     $kebele = $analysis_tra_kebele;
                     $place_area =array();
                     $place_frequency =array();
                     $i =0;
                     $sum_die = $no_severly = $no_slightly = $damage_birr=0;
                     $sql = "SELECT * FROM accident_info d   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id = d.acci_id WHERE d.acci_date LIKE '$serch%' AND h.place_region LIKE '$region%' AND h.place_zone LIKE '$zone%' AND h.place_wereda LIKE '$wereda%' AND h.place_kebele LIKE '$kebele%' ";
                     $result = $GLOBALS['conn']->query($sql) or die("query error");
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {  
                             $sum_die =$sum_die+$row['acci_no_die'];
                             $no_severly =$no_severly+$row['acci_no_severly'];
                             $no_slightly =$no_slightly+$row['acci_no_slightly'];
                             $damage_birr =$damage_birr+$row['acci_damage_inbirr'];
                             $GLOBALS['total_accident'] =$GLOBALS['total_accident']+1;
                             
                       
                    }  
                }  
                     
                         $place_frequency =array(0,0,0); $place_area =array('','','');
                         $sql ="SELECT acciplace.place_area ,COUNT(acciplace.place_area) AS MOST_FREQUENT FROM acciplace INNER JOIN accident_info ON acciplace.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  acciplace.place_area ORDER BY COUNT(acciplace.place_area)  DESC   ";
                          $result = $GLOBALS['conn']->query($sql) or die("query error");
           
                          if($result-> num_rows > 0)
                           {
                              while ($row = $result-> fetch_assoc())
                             {
                                $place_area[$i] =$row['place_area'];
                                $place_frequency[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                                  $i =0; $acci_couse =array ('','','','','','','','');$couse_frequency =array(0,0,0,0,0,0,0,0);
                                   $sql ="SELECT accident_info.acci_couse ,COUNT(accident_info.acci_couse ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%'GROUP BY  accident_info.acci_couse  ORDER BY COUNT(accident_info.acci_couse )  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $acci_couse[$i] =$row['acci_couse'];
                                                    $couse_frequency[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }
                                        }

                                            $arrayName[10] =  $couse_frequency[0];
                                            $arrayName[11] =  $acci_couse[0];

                                            $arrayName[12] =  $couse_frequency[1];
                                            $arrayName[13] =  $acci_couse[1];

                                            $arrayName[14] =  $couse_frequency[2];
                                            $arrayName[15] =  $acci_couse[2];

                                            $arrayName[16] =  $couse_frequency[3];
                                            $arrayName[17] =  $acci_couse[3];

                                            $arrayName[18] =  $couse_frequency[4];
                                            $arrayName[19] =  $acci_couse[4];

                                            $arrayName[20] =  $couse_frequency[5];
                                            $arrayName[21] =  $acci_couse[5];

                                            $arrayName[22] =  $couse_frequency[6];
                                            $arrayName[23] =  $acci_couse[6];

                                            $arrayName[24] =  $couse_frequency[7];
                                            $arrayName[25] =  $acci_couse[7];


                                   $i =0; $acci_type =array ('','','','','','','');$accident_type_frequency =array(0,0,0,0,0,0,0);
                                   $sql ="SELECT accident_info.acci_type ,COUNT(accident_info.acci_type ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%'GROUP BY  accident_info.acci_type  ORDER BY COUNT(accident_info.acci_type )  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $acci_type[$i] =$row['acci_type'];
                                                    $accident_type_frequency[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }
                                        }

                                            $arrayName[26] =  $accident_type_frequency[0];
                                            $arrayName[27] =  $acci_type[0];

                                            $arrayName[28] =  $accident_type_frequency[1];
                                            $arrayName[29] =  $acci_type[1];

                                            $arrayName[30] =  $accident_type_frequency[2];
                                            $arrayName[31] =  $acci_type[2];

                                            $arrayName[32] =  $accident_type_frequency[3];
                                            $arrayName[33] =  $acci_type[3];

                                            $arrayName[34] =  $accident_type_frequency[4];
                                            $arrayName[35] =  $acci_type[4];

                                            $arrayName[36] =  $accident_type_frequency[5];
                                            $arrayName[37] =  $acci_type[5];

                                            $arrayName[38] =  $accident_type_frequency[6];
                                            $arrayName[39] =  $acci_type[6];
                                   
                                    $i =0; $acci_pedestrian_maneuver = array ('','','','','','','','');$pedistra_freq =array(0,0,0,0,0,0,0,0);
                                    $sql ="SELECT accident_info.acci_pedestrian_maneuver ,COUNT(accident_info.acci_pedestrian_maneuver ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  accident_info.acci_pedestrian_maneuver ORDER BY COUNT(accident_info.acci_pedestrian_maneuver )  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $acci_pedestrian_maneuver[$i] =$row['acci_pedestrian_maneuver'];
                                                    $pedistra_freq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }
                                        }

                                            $arrayName[40] =  $pedistra_freq[0];
                                            $arrayName[41] =  $acci_pedestrian_maneuver[0];

                                            $arrayName[42] =  $pedistra_freq[1];
                                            $arrayName[43] =  $acci_pedestrian_maneuver[1];

                                            $arrayName[44] =  $pedistra_freq[2];
                                            $arrayName[45] =  $acci_pedestrian_maneuver[2];

                                            $arrayName[46] =  $pedistra_freq[3];
                                            $arrayName[47] =  $acci_pedestrian_maneuver[3];

                                            $arrayName[48] =  $pedistra_freq[4];
                                            $arrayName[49] =  $acci_pedestrian_maneuver[4];

                                            $arrayName[50] =  $pedistra_freq[5];
                                            $arrayName[51] =  $acci_pedestrian_maneuver[5];

                                            $arrayName[52] =  $pedistra_freq[6];
                                            $arrayName[53] =  $acci_pedestrian_maneuver[6];

                                            $arrayName[54] =  $pedistra_freq[7];
                                            $arrayName[55] =  $acci_pedestrian_maneuver[7];

                                     



                    
                     $arrayName[0] =$sum_die;
                     $arrayName[1] =$no_severly;
                     $arrayName[2] =$no_slightly;
                     $arrayName[3] =$damage_birr;
                     return $arrayName;

          }

          function car($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele)

                       {   

                     $serch = $accidentyear_analyss;
                     $region = $analysis_tra_region;
                     $zone = $analysis_tra_zone;
                     $wereda = $analysis_tra_wereda;
                     $kebele = $analysis_tra_kebele;
                            $carArray = array();
                            $i =0; $damage_extent =array ('','','');$extent_freq =array(0,0,0);
                            $sql ="SELECT car_info.car_damage_extent ,COUNT(car_info.car_damage_extent) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  car_info.car_damage_extent ORDER BY COUNT(car_info.car_damage_extent)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $damage_extent[$i] =$row['car_damage_extent'];
                                $extent_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $carArray[0] = $extent_freq[0];
                            $carArray[1] = $damage_extent[0];
                            $carArray[2] = $extent_freq[1];
                            $carArray[3] = $damage_extent[1];
                            //$area3 = ($place_frequency[2]/$total_accident)*100;

                            $i =0; $car_contribution =array ('','','','','','');$contribution_freq =array(0,0,0,0,0,0);
                            $sql ="SELECT car_info.car_contribution ,COUNT(car_info.car_contribution) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  car_info.car_contribution ORDER BY COUNT(car_info.car_contribution)  DESC ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_contribution[$i] =$row['car_contribution'];
                                $contribution_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }
                            $carArray[10] = $contribution_freq[0];
                            $carArray[11] = $car_contribution[0];

                            $carArray[12] = $contribution_freq[1];
                            $carArray[13] = $car_contribution[1];

                            $carArray[14] = $contribution_freq[2];
                            $carArray[15] = $car_contribution[2];

                            $carArray[16] = $contribution_freq[3];
                            $carArray[17] = $car_contribution[3];

                            $carArray[18] = $contribution_freq[4];
                            $carArray[19] = $car_contribution[4];

                            $carArray[20] = $contribution_freq[5];
                            $carArray[21] = $car_contribution[5];


                            $i =0; $car_ownership =array ('','','');$ownership_feq =array(0,0,0);
                            $sql ="SELECT car_info.car_ownership ,COUNT(car_info.car_ownership) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  car_info.car_ownership ORDER BY COUNT(car_info.car_ownership)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_ownership[$i] =$row['car_ownership'];
                                $ownership_feq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }
                            $carArray[50] = $ownership_feq[0];
                            $carArray[51] = $ownership_feq[1];
                            $carArray[51]= $ownership_feq[2];
                            $i =0; $car_type =array ('','','');$type_frq =array(0,0,0);
                            $sql ="SELECT car_info.car_type ,COUNT(car_info.car_type) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  car_info.car_type ORDER BY COUNT(car_info.car_type)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_type[$i] =$row['car_type'];
                                $type_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }



                            $carArray[90] = $type_frq[0];
                            $carArray[91] = $type_frq[1];
                            $carArray[92] = $type_frq[2];

                            $i =0; $car_maneuver =array ('','','','','','','','','','','','');$maneuver_frq =array(0,0,0,0,0,0,0,0,0,0,0,0);
                            $sql ="SELECT car_info.car_maneuver ,COUNT(car_info.car_maneuver) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id  INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  car_info.car_maneuver ORDER BY COUNT(car_info.car_maneuver)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_maneuver[$i] =$row['car_maneuver'];
                                $maneuver_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $carArray[150] = $maneuver_frq[0];
                            $carArray[151] = $car_maneuver[0];

                            $carArray[152] = $maneuver_frq[1];
                            $carArray[153] = $car_maneuver[1];

                            $carArray[154] = $maneuver_frq[2];
                            $carArray[155] = $car_maneuver[2];

                            $carArray[156] = $maneuver_frq[3];
                            $carArray[157] = $car_maneuver[3];

                            $carArray[158] = $maneuver_frq[4];
                            $carArray[159] = $car_maneuver[4];

                            $carArray[160] = $maneuver_frq[5];
                            $carArray[161] = $car_maneuver[5];

                            $carArray[162] = $maneuver_frq[6];
                            $carArray[163] = $car_maneuver[6];

                            $carArray[164] = $maneuver_frq[7];
                            $carArray[165] = $car_maneuver[7];

                            $carArray[166] = $maneuver_frq[8];
                            $carArray[167] = $car_maneuver[8];

                            $carArray[168] = $maneuver_frq[9];
                            $carArray[169] = $car_maneuver[9];

                            $carArray[170] = $maneuver_frq[10];
                            $carArray[171] = $car_maneuver[10];

                            $carArray[172] = $maneuver_frq[11];
                            $carArray[173] = $car_maneuver[11];


                        

                            $i =0; $car_speed =array ('','','','','','','','','','');$speed_frq =array(0,0,0,0,0,0,0,0,0,0);
                            $sql ="SELECT car_info.car_speed ,COUNT(car_info.car_speed) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  car_info.car_speed ORDER BY COUNT(car_info.car_speed)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_speed[$i] =$row['car_speed'];
                                $speed_frq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $carArray[214] = $speed_frq[0];
                            $carArray[215] = $car_speed[0];

                            $carArray[216] = $speed_frq[1];
                            $carArray[217] = $car_speed[1];

                            $carArray[218] = $speed_frq[2];
                            $carArray[219] = $car_speed[2];

                            $carArray[220] = $speed_frq[3];
                            $carArray[221] = $car_speed[3];

                            $carArray[222] = $speed_frq[4];
                            $carArray[223] = $car_speed[4];

                            $carArray[224] = $speed_frq[5];
                            $carArray[225] = $car_speed[5];

                            $carArray[226] = $speed_frq[6];
                            $carArray[227] = $car_speed[6];

                            $carArray[228] = $speed_frq[7];
                            $carArray[229] = $car_speed[7];

                            $carArray[230] = $speed_frq[8];
                            $carArray[231] = $car_speed[8];

                            $carArray[232] = $speed_frq[9];
                            $carArray[233] = $car_speed[9];

                           

                            $i =0; $car_service =array ('','','');$service_freq =array(0,0,0);
                            $sql ="SELECT car_info.car_service_age ,COUNT(car_info.car_service_age) AS MOST_FREQUENT FROM car_info INNER JOIN accident_info ON car_info.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  car_info.car_service_age ORDER BY COUNT(car_info.car_service_age)  DESC  ";
                            $result = $GLOBALS['conn']->query($sql) or die("query error");
                            if($result-> num_rows > 0)
                            {
                              while ($row = $result-> fetch_assoc())
                             {
                                $car_service[$i] =$row['car_service_age'];
                                $service_freq[$i] =$row['MOST_FREQUENT'];
                                $i =$i+1;
                              }   
                            }

                            $carArray[210] = $service_freq[0];
                            $carArray[211] = $service_freq[1];
                            $carArray[212] = $service_freq[2];





                            /* echo "<tr>";
                                  echo "<td>".$speed1." % ".$car_speed[0]."<br>".$spee2." % ".$car_speed[1]."<br>".$spee3." % ".$car_speed[2]." </td>";
                                  echo "<td>".$service1." % ".$car_service[0]."<br>".$service2." % ".$car_service[1]."<br>".$service3." % ".$car_service[2]." </td>";
                                  echo "<td> ".$damage_ext1." % ".$damage_extent[0]."<br>".$damage_ext2." % ".$damage_extent[1]." </td>";
                                  echo "<td>".$contribution1." % ".$car_contribution[0]."<br>".$contribution2." % ".$car_contribution[1]."<br>".$contribution3." % ".$car_contribution[2]." </td>";
                                  echo "<td>".$owner1." % ".$car_ownership[0]."<br>".$owner2." % ".$car_ownership[1]."<br>".$owner3." % ".$car_ownership[2]." </td>";
                                  echo "<td>".$type1." % ".$car_type[0]."<br>".$type2." % ".$car_type[1]."<br>".$type3." % ".$car_type[2]." </td>";
                                  echo "<td>".$manu1." % ".$car_maneuver[0]."<br>".$manu2." % ".$car_maneuver[1]."<br>".$manu3." % ".$maneuver_frq[2]." </td>";
                             echo "</tr>";*/
                           return $carArray;
                            }


            function road($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele)

                            { 
                     $serch = $accidentyear_analyss;
                     $region = $analysis_tra_region;
                     $zone = $analysis_tra_zone;
                     $wereda = $analysis_tra_wereda;
                     $kebele = $analysis_tra_kebele;
                                $road =array();
                               
                                 $i =0; $road_type =array ('','','');$type_frq =array(0,0,0);
                                $sql ="SELECT road.ro_type ,COUNT(road.ro_type) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  road.ro_type ORDER BY COUNT(road.ro_type)  DESC  ";
                               $result = $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $road_type[$i] =$row['ro_type'];
                                        $type_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }




                               $i =0; $ro_separation =array ('','','','','');$separation_frq =array(0,0,0,0,0);
                                $sql ="SELECT road.ro_separation ,COUNT(road.ro_separation) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  road.ro_separation ORDER BY COUNT(road.ro_separation)  DESC  ";
                               $result =  $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_separation[$i] =$row['ro_separation'];
                                        $separation_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                                  $road[0] = $separation_frq[0];
                                  $road[1] = $ro_separation[0];

                                  $road[2] = $separation_frq[1];
                                  $road[3] = $ro_separation[1];

                                  $road[4] = $separation_frq[2];
                                  $road[5] = $ro_separation[2];

                                  $road[6] = $separation_frq[3];
                                  $road[7] = $ro_separation[3];

                                  $road[8] = $separation_frq[4];
                                  $road[9] = $ro_separation[4];

                             $i =0; $ro_geometry =array ('','','','','');$geometry_frq =array(0,0,0,0,0);
                                $sql ="SELECT road.ro_geometry ,COUNT(road.ro_geometry) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id  INNER JOIN traffic_info ON accident_info.tra_id = traffic_info.tra_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  road.ro_geometry ORDER BY COUNT(road.ro_geometry)  DESC  ";
                               $result =  $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_geometry[$i] =$row['ro_geometry'];
                                        $geometry_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                                  $road[10] = $geometry_frq[0];
                                  $road[11] = $ro_geometry[0];

                                  $road[12] = $geometry_frq[1];
                                  $road[13] = $ro_geometry[1];

                                  $road[14] = $geometry_frq[2];
                                  $road[15] = $ro_geometry[2];

                                  $road[16] = $geometry_frq[3];
                                  $road[17] = $ro_geometry[3];

                                  $road[18] = $geometry_frq[4];
                                  $road[19] = $ro_geometry[4];

                            /*$geometry1 = ($geometry_frq[0]/$GLOBALS['total_accident'])*100;
                            $geometry2 = ($geometry_frq[1]/$GLOBALS['total_accident'])*100;
                            $geometry3 = ($geometry_frq[2]/$GLOBALS['total_accident'])*100;*/

                             $i =0; $ro_surface_type =array ('','','','');$road_surface_freq =array(0,0,0,0);
                                $sql ="SELECT road.ro_surface_type ,COUNT(road.ro_surface_type) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id INNER JOIN traffic_info ON accident_info.tra_id = traffic_info.tra_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  road.ro_surface_type ORDER BY COUNT(road.ro_surface_type)  DESC  ";
                               $result =  $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_surface_type[$i] =$row['ro_surface_type'];
                                        $road_surface_freq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                                  $road[20] = $road_surface_freq[0];
                                  $road[21] = $ro_surface_type[0];

                                  $road[22] = $road_surface_freq[1];
                                  $road[23] = $ro_surface_type[1];

                                  $road[24] = $road_surface_freq[2];
                                  $road[25] = $ro_surface_type[2];

                                  $road[26] = $road_surface_freq[3];
                                  $road[27] = $ro_surface_type[3];


                           /* $surface1 = ($surface_frq[0]/$GLOBALS['total_accident'])*100;
                            $surface2 = ($surface_frq[1]/$GLOBALS['total_accident'])*100;
                            $surface3 = ($surface_frq[2]/$GLOBALS['total_accident'])*100;*/

                            $i =0; $ro_light =array ('','','');$light_frq =array(0,0,0);
                                $sql ="SELECT road.ro_light ,COUNT(road.ro_light) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  road.ro_light ORDER BY COUNT(road.ro_light)  DESC  ";
                               $result =  $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_light[$i] =$row['ro_light'];
                                        $light_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                           /* $light1 = ($light_frq[0]/$GLOBALS['total_accident'])*100;
                            $light2 = ($light_frq[1]/$GLOBALS['total_accident'])*100;
                            $light3 = ($light_frq[2]/$GLOBALS['total_accident'])*100;*/

                            $i =0; $ro_weather =array ('','','');$weather_frq =array(0,0,0);
                                $sql ="SELECT road.ro_weather ,COUNT(road.ro_weather) AS MOST_FREQUENT FROM road INNER JOIN accident_info ON road.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '$serch%' GROUP BY  road.ro_weather ORDER BY COUNT(road.ro_weather)  DESC  ";
                               $result =  $GLOBALS['conn']->query($sql) or die("query error");
                               if($result-> num_rows > 0)
                                 {
                                   while ($row = $result-> fetch_assoc())
                                     {
                                        $ro_weather[$i] =$row['ro_weather'];
                                        $weather_frq[$i] =$row['MOST_FREQUENT'];
                                        $i =$i+1;
                                     }   
                                 }

                           /* $weather1 = ($weather_frq[0]/$GLOBALS['total_accident'])*100;
                            $weather2 = ($weather_frq[1]/$GLOBALS['total_accident'])*100;
                            $weather3 = ($weather_frq[2]/$GLOBALS['total_accident'])*100;
                        echo "<tr>";
                                 echo "<td>".$type1." % ".$road_type[0]."<br>".$type2." % ".$road_type[1]."<br>".$type3." % ".$road_type[2]." </td>";
                                 echo "<td>".$separation1." % ".$ro_separation[0]."<br>".$separation2." % ".$ro_separation[1]."<br>".$separation3." % ".$ro_separation[2]." </td>";
                                 echo "<td>".$geometry1." % ".$ro_geometry[0]."<br>".$geometry2." % ".$ro_geometry[1]."<br>".$geometry3." % ".$ro_geometry[2]." </td>";
                                 echo "<td>".$surface1." % ".$ro_surface_condition[0]."<br>".$surface2." % ".$ro_surface_condition[1]."<br>".$surface3." % ".$surface1[2]." </td>";
                                 echo "<td>".$light1." % ".$ro_light[0]."<br>".$light2." % ".$ro_light[1]."<br>".$light3." % ".$ro_light[2]." </td>";
                                 echo "<td>".$weather1." % ".$ro_weather[0]."<br>".$weather2." % ".$ro_weather[1]."<br>".$weather3." % ".$ro_weather[2]." </td>";     
                             echo "</tr>";*/


                        return $road;
                            }                        
              
               function driver($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele)
                          {
                     $serch = $accidentyear_analyss;
                     $region = $analysis_tra_region;
                     $zone = $analysis_tra_zone;
                     $wereda = $analysis_tra_wereda;
                     $kebele = $analysis_tra_kebele;
                                    $driver =  array();
                                   $i =0; $driv_age =array ('','','','','');$age_frq =array(0,0,0,0,0);
                                   $sql ="SELECT driver_info.driv_age ,COUNT(driver_info.driv_age) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  driver_info.driv_age ORDER BY COUNT(driver_info.driv_age)  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_age[$i] =$row['driv_age'];
                                                    $age_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }   
                                        }

                                                $driver[0] = $age_frq[0];
                                                $driver[1] = $driv_age[0];

                                                $driver[2] = $age_frq[1];
                                                $driver[3] = $driv_age[1];

                                                $driver[4] = $age_frq[2];
                                                $driver[5] = $driv_age[2];

                                                $driver[6] = $age_frq[3];
                                                $driver[7] = $driv_age[3];

                                                $driver[8] = $age_frq[4];
                                                $driver[9] = $driv_age[4];

                                               

                                   $i =0; $driv_relation =array ('','','','','','');$relation_frq =array(0,0,0,0,0,0);
                                   $sql ="SELECT driver_info.driv_car_relation ,COUNT(driver_info.driv_car_relation) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  driver_info.driv_car_relation ORDER BY COUNT(driver_info.driv_car_relation)  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_relation[$i] =$row['driv_car_relation'];
                                                    $relation_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }   
                                        }
                                 
                                   $i =0; $driv_cont =array ('','','','','','','','','','','','','','','','','');$contr_frq =array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
                                   $sql ="SELECT driver_info.driv_contribution ,COUNT(driver_info.driv_contribution ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  driver_info.driv_contribution  ORDER BY COUNT(driver_info.driv_contribution )  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_cont[$i] =$row['driv_contribution'];
                                                    $contr_frq[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }
                                        }

                                            $driver[10] =  $contr_frq[0];
                                            $driver[11] =  $driv_cont[0];

                                            $driver[12] =  $contr_frq[1];
                                            $driver[13] =  $driv_cont[1];

                                            $driver[14] =  $contr_frq[2];
                                            $driver[15] =  $driv_cont[2];

                                            $driver[16] =  $contr_frq[3];
                                            $driver[17] =  $driv_cont[3];

                                            $driver[18] =  $contr_frq[4];
                                            $driver[19] =  $driv_cont[4];

                                            $driver[20] =  $contr_frq[5];
                                            $driver[21] =  $driv_cont[5];

                                            $driver[22] =  $contr_frq[6];
                                            $driver[23] =  $driv_cont[6];

                                            $driver[24] =  $contr_frq[7];
                                            $driver[25] =  $driv_cont[7];

                                            $driver[26] =  $contr_frq[8];
                                            $driver[27] =  $driv_cont[8];

                                            $driver[28] =  $contr_frq[9];
                                            $driver[29] =  $driv_cont[9];

                                            $driver[30] =  $contr_frq[10];
                                            $driver[31] =  $driv_cont[10];

                                            $driver[32] =  $contr_frq[11];
                                            $driver[33] =  $driv_cont[11];

                                            $driver[34] =  $contr_frq[12];
                                            $driver[35] =  $driv_cont[12];

                                            $driver[36] =  $contr_frq[13];
                                            $driver[37] =  $driv_cont[13];

                                            $driver[38] =  $contr_frq[14];
                                            $driver[39] =  $driv_cont[14];

                                            $driver[40] =  $contr_frq[15];
                                            $driver[41] =  $driv_cont[15];

                                            $driver[42] =  $contr_frq[16];
                                            $driver[43] =  $driv_cont[16];

                                          
                                  $i =0; $driv_expriance =array ('','','','','','');$expriance_frequency =array(0,0,0,0,0,0);
                                   $sql ="SELECT driver_info.driv_expriance ,COUNT(driver_info.driv_expriance ) AS MOST_FREQUENT FROM driver_info INNER JOIN accident_info ON driver_info.acci_id = accident_info.acci_id INNER JOIN acciplace ON accident_info.acci_id = acciplace.acci_id WHERE accident_info.acci_date LIKE '$serch%'  AND acciplace.place_region LIKE '$region%' AND acciplace.place_zone LIKE '$zone%' AND acciplace.place_wereda LIKE '$wereda%' AND acciplace.place_kebele LIKE '$kebele%' GROUP BY  driver_info.driv_expriance  ORDER BY COUNT(driver_info.driv_expriance )  DESC  ";
                                   $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                       {
                                          while ($row = $result-> fetch_assoc())
                                               {
                                                    $driv_expriance[$i] =$row['driv_expriance'];
                                                    $expriance_frequency[$i] =$row['MOST_FREQUENT'];
                                                    $i =$i+1;
                                                }
                                        }

                                            $driver[44] =  $expriance_frequency[0];
                                            $driver[45] =  $driv_expriance[0];

                                            $driver[46] =  $expriance_frequency[1];
                                            $driver[47] =  $driv_expriance[1];

                                            $driver[48] =  $expriance_frequency[2];
                                            $driver[49] =  $driv_expriance[2];

                                            $driver[50] =  $expriance_frequency[3];
                                            $driver[51] =  $driv_expriance[3];

                                            $driver[52] =  $expriance_frequency[4];
                                            $driver[53] =  $driv_expriance[4];

                                            $driver[54] =  $expriance_frequency[5];
                                            $driver[55] =  $driv_expriance[5];
                                   

                              return  $driver; 
                          }
 ?>