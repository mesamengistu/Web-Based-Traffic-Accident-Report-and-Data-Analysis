
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Reports</title>
       <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
       
        <style>
             
        </style>

    </head>
    <body>
          <div class ="container">
             <div class="row">
                <h3>Enter car Targa To Search Rpeort</h3>  
                <form  method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal">
                        <div class="col-lg-6"> 
                            <div class ="form-group col-lg-12">
                                 <input class="col-lg-6" type="text" class ="form-control" name="serch" placeholder ="Search">
                                  <button class="col-lg-2" type="submit" name="submit"> 
                                             <span class ="glyphicon glyphicon-search"><span>
                                  </button>   
                            </div>
                        </div> 
                </form>   
            </div>
            <div class="row">
                   <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>car speed</th>
                                  <th>car service age</th>
                                  <th>car damage extent</th>
                                  <th>car contribution</th>
                                  <th>car ownership</th>
                                  <th>car meneuver</th>
                                  <th>collide car number</th>
                            </thead>
                            <tbody">
                            <?php
                             include 'database.php';
                             $conn =connect();
                            if($_SERVER['REQUEST_METHOD'] =="POST")
                            {
                                   if(isset($_POST['submit']))
                                  {
                                    $serch_value = $_POST['serch'];
                                    $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE e.car_targa LIKE '$serch_value%' ";
                                     $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                     {
                                        while ($row = $result-> fetch_assoc())
                                          { 
                                           $car_speed =$row['car_speed'];
                                           $car_service_age =$row['car_service_age'];
                                           $car_damage_extent =$row['car_damage_extent'];
                                           $car_contribution =$row['car_contribution'];
                                           $car_ownership =$row['car_ownership'];
                                           $car_maneuver =$row['car_maneuver'];
                                           $car_num =$row['acci_num_car'];
                              echo "<tr>";
                                 echo "<td> ".$car_speed." </td>";
                                 echo "<td> ".$car_service_age." </td>";
                                 echo "<td> ".$car_damage_extent." </td>";
                                 echo "<td> ".$car_contribution." </td>";
                                 echo "<td> ".$car_ownership." </td>";
                                 echo "<td> ".$car_maneuver." </td>";
                                 echo "<td> ".$car_num." </td>";
                                 
                             echo "</tr>";                                                  
                                           }    
                                      }
                            }
                          }
                            ?>  
                            </tbody">
                        </table>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>number of people die</th>
                                  <th>number severly injured</th>
                                  <th>number slightly</th>
                                  <th>damage in birr</th>
                                  <th>accident date</th>
                            </thead>
                            <tbody">
                            <?php
                            
                            if($_SERVER['REQUEST_METHOD'] =="POST")
                            {
                                   if(isset($_POST['submit']))
                                  {
                                    $serch_value = $_POST['serch'];
                                    $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE e.car_targa LIKE '$serch_value%' ";
                                     $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                     {
                                        while ($row = $result-> fetch_assoc())
                                          { 
                                           $acci_no_die =$row['acci_no_die'];
                                           $acci_no_severly =$row['acci_no_severly'];
                                           $acci_no_slightly =$row['acci_no_slightly'];
                                           $acci_damage_inbirr =$row['acci_damage_inbirr'];
                                           $acci_date =$row['acci_date'];
                              echo "<tr>";
                                 echo "<td> ".$acci_no_die." </td>";
                                 echo "<td> ".$acci_no_severly." </td>";
                                 echo "<td> ".$acci_no_slightly." </td>";
                                 echo "<td> ".$acci_damage_inbirr." </td>";
                                 echo "<td> ".$acci_date." </td>"; 
                             echo "</tr>";                                                  
                                           }    
                                      }
                            }
                          }
                            ?>  
                            </tbody">
                        </table>



                      </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>Driver name</th>
                                  <th>Driver age</th>
                                  <th>Driver car relation</th>
                                  <th>Driver contribution</th>
                                  <th>Driver Occation</th>
                            </thead>
                            <tbody">
                            <?php
                            
                            if($_SERVER['REQUEST_METHOD'] =="POST")
                            {
                                   if(isset($_POST['submit']))
                                  {
                                    $serch_value = $_POST['serch'];
                                    $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE e.car_targa LIKE '$serch_value%' ";
                                     $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                     {
                                        while ($row = $result-> fetch_assoc())
                                          { 
                                           $driv_fname =$row['driv_fname']." ".$row['driv_lname'];
                                           $driv_age =$row['driv_age'];
                                           $driv_car_relation =$row['driv_car_relation'];
                                           $driv_contribution =$row['driv_contribution'];
                                           $driv_occation =$row['driv_occation'];
                              echo "<tr>";
                                 echo "<td> ".$driv_fname." </td>";
                                 echo "<td> ".$driv_age." </td>";
                                 echo "<td> ".$driv_car_relation." </td>";
                                 echo "<td> ".$driv_contribution." </td>";
                                 echo "<td> ".$driv_occation." </td>"; 
                             echo "</tr>";                                                  
                                           }    
                                      }
                            }
                          }
                            ?>  
                            </tbody">
                        </table>



                      </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>Place</th>
                                  <th>Road type</th>
                                  <th>Road Separation </th>
                                  <th>Road Alignment</th>
                                  <th>Road Geometry</th>
                                  <th>Road Surface Type </th>
                                  <th>Road Surface Condion</th>
                                  <th>Road Weather</th>
                            </thead>
                            <tbody">
                            <?php
                            
                            if($_SERVER['REQUEST_METHOD'] =="POST")
                            {
                                   if(isset($_POST['submit']))
                                  {
                                    $serch_value = $_POST['serch'];
                                    $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE e.car_targa LIKE '$serch_value%' ";
                                     $result = $GLOBALS['conn']->query($sql) or die("query error");
                                   if($result-> num_rows > 0)
                                     {
                                        while ($row = $result-> fetch_assoc())
                                          { 
                                           $place_area =$row['place_area'];
                                           $ro_type =$row['ro_type'];
                                           $ro_separation =$row['ro_separation'];
                                           $ro_alignment =$row['ro_alignment'];
                                           $ro_geometry =$row['ro_geometry'];
                                           $ro_surface_type =$row['ro_surface_type'];
                                           $ro_surface_condition =$row['ro_surface_condition'];
                                           $ro_weather =$row['ro_weather'];
                              echo "<tr>";
                                 echo "<td> ".$place_area." </td>";
                                 echo "<td> ".$ro_type." </td>";
                                 echo "<td> ".$ro_separation." </td>";
                                 echo "<td> ".$ro_alignment." </td>";
                                 echo "<td> ".$ro_geometry." </td>"; 
                                echo "<td> ".$ro_surface_type." </td>";
                                 echo "<td> ".$ro_surface_condition." </td>";
                                 echo "<td> ".$ro_weather." </td>"; 
                             echo "</tr>";                                                  
                                           }    
                                      }
                            }
                          }
                            ?>  
                            </tbody">
                        </table>



                      </div>
                    </div>
            </div>
         </div>
    </body>
</html>
