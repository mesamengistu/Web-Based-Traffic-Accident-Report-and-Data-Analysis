<?php
$i =0;
include 'guard.php';
  $tra_id_equivalent = $_SESSION['tra_id'];
include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html';
?>
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
        
        <style>
            body{padding-top: 60px;}
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <h3>Serch your previous report using car identity number Targa </h3>
                
           <form  method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal">
                        <div class="col-lg-6"> 
                            <div class ="form-group col-lg-12">
                                 <input class="col-lg-6" type="text"  name ="serch_id" class ="form-control" placeholder ="Search">
                                         <button class="col-lg-2" name ="submit"> 
                                             <span class ="glyphicon glyphicon-search" ><span>
                                         </button>   
                            </div>
                        </div>    
                    
               
               
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>Accident id</th>
                                  <th>Car Targa</th>
                                  <th>number of people die</th>
                                  <th>number severly injured</th>
                                  <th>number slightly</th>
                                  <th>damage in birr</th>
                                  <th>accident date</th>
                                  <th>Place</th>
                                  <th>Road type</th>
                                  <th>Road Separation </th>
                                  <th>Road Alignment</th>
                                  <th>Road Geometry</th>
                                  <th>Road Surface Type </th>
                                  <th>Road Surface Condion</th>
                                  <th>Road Light</th>
                                  <th>Road Weather</th>
                                  <th>DELETE </th>
                                  <th>EDIT</th>
                                  <th>CHEK</th>

                            </thead>
                            <tbody">  
                                   <?php
  if(isset($_POST['submit']))
  {
                                   $i =0;
                                    include 'database.php';
                                    $conn =connect();
                                    $serch_id  =$_POST['serch_id'];
                                     $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE a.tra_id ='$tra_id_equivalent' AND e.car_targa ='$serch_id' ";
                                        $result = $conn->query($sql) or die("query error");
                                    if($result-> num_rows > 0)
                                    {
                                          while ($row = $result-> fetch_assoc() )
                           
                                            {
                          echo"<tr>
                        <td><input type='text' value ='".$row["acci_id"]."' name ='acci_id".$i."' readonly></td>
                        <td><input type='text' value ='".$row["car_targa"]."' name ='car_targa".$i."'readonly></td>
                        <td><input type ='text' value='".$row["acci_no_die"]."' name = 'acci_no_die".$i."'/></td>
                        <td><input type='text' value ='".$row["acci_no_severly"]."' name ='acci_no_severly".$i."'></td>
                        <td><input type ='text' value='".$row["acci_no_slightly"]."' name = 'acci_no_slightly".$i."'/></td>
                        <td><input type ='text' value='".$row["acci_damage_inbirr"]."' name = 'acci_damage_inbirr".$i."'/></td>
                        <td><input type ='text' value='".$row["acci_date"]."' name = 'acci_date".$i."'/></td>
                        <td>
                        <select name ='place_area".$i."'>
                                               <option  value ='".$row["place_area"]."'>".$row["place_area"]."</option>  
                                               <option  value ='rural Town'>Rural Town</option>
                                               <option  value ='outside of Rural Town'>Outside of Rural Town</option>
                                               <option  value ='school area'>School area</option>
                                               <option  value ='factory area'selected>Factory area </option>
                                               <option  value ='worshiping area'>Worshiping area</option>
                                               <option  value ='market area'>Market area</option>
                                               <option  value ='temple area'>Temple area</option>
                                               <option  value ='hospital area'>Hospital area</option>
                                               <option  value ='office area'>Office area</option>
                                               <option  value ='residential area'>Residential area</option>                    
                        </select>
                        </td>
                        <td>
                        <select name ='ro_type".$i."'  id ='ro_type".$i."' >
                                               <option  value ='".$row["ro_type"]."'>".$row["ro_type"]."</option>
                                               <option  value ='country Side Connecting'>Country Side Connecting</option>
                                               <option  value ='province Connecting'>Province Connecting</option>
                                               <option  value ='rural Road'>Rural Road</option>
                                               <option  value ='urban Road'selected>Urban Road </option>
                         </select>
                         </td>
                         <td>
                         <select name ='ro_separation".$i."'  id = 'ro_separation".$i."'>
                                               <option  value ='".$row["ro_separation"]."'>".$row["ro_separation"]."</option> 
                                               <option  value ='One-way'>One-way</option>
                                               <option  value ='Two-way not divided'>Two-way not divided</option>
                                               <option  value =Divided with Island'>Divided with Island</option>
                                               <option  value ='Divided with street painting 'selected>Divided with street painting </option>
                                               <option  value ='Divided with broken painting'>Divided with broken painting</option>      
                         </select>
                         </td>
                         <td>
                         <select name ='ro_alignment".$i."'  id ='ro_alignment".$i."' >
                                               <option  value ='".$row["ro_alignment"]."'>".$row["ro_alignment"]."</option>
                                               <option  value ='Straight & Level'>Straight & Level</option>
                                               <option  value ='Straight & hill crest'>Straight & hill crest</option>
                                               <option  value ='Straight on grade'>Straight on grade</option>
                                               <option  value ='Curve & Level'selected>Curve & Level </option>
                                               <option  value ='Curve on Grade'>Curve on Grade</option>
                                               <option  value ='Hilly'>Hilly</option>
                                               <option  value ='Sloppy'>Sloppy</option>
                         </select>
                         </td>
                         <td>
                         <select name ='ro_geometry".$i."'  id ='ro_geometry".$i."' >
                                               <option  value ='".$row["ro_geometry"]."'>".$row["ro_geometry"]."</option>
                                               <option  value ='Non-Junction'>Non-Junction</option>
                                               <option  value ='Four-way intersection'>Four-way intersection</option>
                                               <option  value ='T-intersection'>T-intersection</option>
                                               <option  value ='Yintersection'selected>Yintersection</option>
                                               <option  value ='Five point or more'>Five point or more</option>
                         </select>
                         </td>
                         <td>
                        <select name ='ro_surface_type".$i."' id = 'ro_surface_type".$i."'>
                        <option  value ='".$row["ro_surface_type"]."'>".$row["ro_surface_type"]."</option> 
                                               <option  value ='Concrete Asphalt'>Concrete Asphalt</option>
                                               <option  value ='Asphalt'>Asphalt</option>
                                               <option  value ='Gravel'>Gravel</option>
                                               <option  value ='Dirt'selected>Dirt</option>                     
                        </select>
                        </td>
                        <td>
                        <select name ='ro_surface_condition".$i."'  id ='ro_surface_condition".$i."' >
                                               <option  value ='".$row["ro_surface_condition"]."'>".$row["ro_surface_condition"]."</option>
                                               <option  value ='Dry'>Dry</option>
                                               <option  value ='Wet'>Wet</option>
                                               <option  value ='Muddy'>Muddy</option>
                                               <option  value ='Other'selected>Other</option>
                        </select>
                         </td>
                         <td>
                         <select name ='ro_light".$i."'>
                         <option  value ='".$row["ro_light"]."'>".$row["ro_light"]."</option>  
                                               <option  value ='clear'>clear</option>
                                               <option  value ='foggy'>foggy</option>
                                               <option  value ='cloudy'>cloudy</option>
                                               <option  value ='sleet or hail'selected>sleet or hail</option>
                                               <option  value ='heavy rain'>heavy rain</option>
                                               <option  value ='blowing sand'>blowing sand</option>
                                               <option  value ='hot'selected>hot</option>
                                               <option  value ='cold'>cold</option>
                                               <option  value ='other'>other</option>     
                         </select>
                         </td>
                         <td>
                         <select name ='ro_weather".$i."'>
                         <option  value ='".$row["ro_weather"]."'>".$row["ro_weather"]."</option>  
                                               <option  value ='clear'>clear</option>
                                               <option  value ='foggy'>foggy</option>
                                               <option  value ='cloudy'>cloudy</option>
                                               <option  value ='sleet or hail'selected>sleet or hail</option>
                                               <option  value ='heavy rain'>heavy rain</option>
                                               <option  value ='blowing sand'>blowing sand</option>
                                               <option  value ='hot'selected>hot</option>
                                               <option  value ='cold'>cold</option>
                                               <option  value ='other'>other</option>     
                         </select>
                         </td>

                         ";
                         echo "<td> <input type = 'submit' value = 'delete' name ='delete".$i."'>";
                                              if(isset($_POST['delete'.$i.'']))
                                              {

                                                    if(isset($_POST['chek'.$i.'']))
                                                    {
                                                       $id = $_POST['acci_id'.$i.''];
                                                       $sqlv ="DELETE FROM road WHERE acci_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM acciplace WHERE acci_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM driver_info WHERE acci_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM car_info WHERE acci_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM accident_info WHERE acci_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       if(!$s){echo "delete problem";}
                                                      } 
                                              }
                                 echo "</td> ";
                                 echo "<td><input type = 'submit' value='Edit' name ='edit".$i."' />";
                                                       if(isset($_POST['edit'.$i.'']))
                                              {
                                                    if(isset($_POST['chek'.$i.'']))
                                                    {
                                                       $id = $_POST['acci_id'.$i.''];
                                                       $acci_no_die = $_POST['acci_no_die'.$i.''];
                                                       $acci_no_severly =$_POST['acci_no_severly'.$i.''];
                                                       $acci_no_slightly =$_POST['acci_no_slightly'.$i.''];
                                                       $acci_damage_inbirr =$_POST['acci_damage_inbirr'.$i.''];
                                                       $acci_date =$_POST['acci_date'.$i.''];
                                                       $car_targa =$_POST['car_targa'.$i.''];
                                                       $place_area =$_POST['place_area'.$i.''];
                                                       $ro_type =$_POST['ro_type'.$i.''];
                                                       $ro_separation =$_POST['ro_separation'.$i.''];
                                                       $ro_alignment =$_POST['ro_alignment'.$i.''];
                                                       $ro_geometry =$_POST['ro_geometry'.$i.''];
                                                       $ro_surface_type =$_POST['ro_surface_type'.$i.''];
                                                       $ro_surface_condition =$_POST['ro_surface_condition'.$i.''];
                                                       $ro_light = $_POST['ro_light'.$i.''];
                                                       $ro_weather =$_POST['ro_weather'.$i.''];
                                                       $sqlv ="UPDATE accident_info SET acci_no_die ='$acci_no_die', acci_no_severly='$acci_no_severly' , acci_no_slightly ='$acci_no_slightly' ,acci_damage_inbirr ='$acci_damage_inbirr' ,acci_date ='$acci_date'  WHERE acci_id ='$id'";
                                                       $s = $conn->query($sqlv);
                                                        $sqlv ="UPDATE acciplace SET place_area ='$place_area'WHERE acci_id ='$id'";
                                                       $s = $conn->query($sqlv);
                                                       

                                                       $sqlv ="UPDATE road SET ro_light ='$ro_light',ro_type ='$ro_type', ro_separation='$ro_separation' , ro_alignment ='$ro_alignment' ,ro_geometry ='$ro_geometry' ,ro_surface_type ='$ro_surface_type',ro_surface_condition ='$ro_surface_condition' ,ro_weather ='$ro_weather'  WHERE acci_id ='$id'";
                                                       $s = $conn->query($sqlv);
                                                       
                                                       $sqlv ="UPDATE  car_info SET car_targa ='$car_targa' WHERE acci_id='$' ";
                                                       $s = $conn->query($sqlv);
                                                       if(!$s){echo "Edited problem";}
                                                        else{/*header("location:admin_edit.php");*/echo"<script>alert('Edited sucssefully')</script>";}
                                                      } 
                                              }
                                           
                                        echo "</td>";
                                        echo" <td><input type = 'checkbox' name ='chek".$i."'/></td></tr>"; 

                                        
                                          $i++;  
                                        }
                                    }
}
                                   ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
                  <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>car id</th>
                                  <th>car targa</th>
                                  <th>car speed</th>
                                  <th>car service age</th>
                                  <th>car damage extent</th>
                                  <th>car contribution</th>
                                  <th>car ownership</th>
                                  <th>car meneuver</th>
                                  <th>collide car number</th>
                                  <th>Driver Licence number</th>
                                  <th>Driver First name</th>
                                  <th>Driver Last name</th>
                                  <th>Driver age</th>
                                  <th>Driver car relation</th>
                                  <th>Driver contribution</th>
                                  <th>Driver Occation</th>
                                  <th>EDIT</th>
                                  <th>CHEK</th>
                            </thead>

                            </thead>
                            <tbody">  
                                   <?php
    if(isset($_POST['submit']))
  {
                                   $i =0;
                                     $sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id WHERE  a.tra_id ='$tra_id_equivalent' AND e.car_targa ='$serch_id' ";
                                        $result = $conn->query($sql) or die("query error");
                                    if($result-> num_rows > 0)
                                    {
                                          while ($row = $result-> fetch_assoc() )
                           
                                            {
                                            
                              echo "<tr>";
                          echo"<tr>
                        <td><input type='text' value ='".$row["car_id"]."' name ='car_id".$i."'></td>
                        <td><input type='text' value ='".$row["car_targa"]."' name ='car_targa".$i."'></td>
                        <td><input type='text' value ='".$row["car_speed"]."' name ='car_speed".$i."'></td>
                        <td><input type ='text' value='".$row["car_service_age"]."' name = 'car_service_age".$i."'/></td>
                        <td>
                        <select name ='car_contribution".$i."'>
                        <option  value ='".$row["car_damage_extent"]."'>".$row["car_damage_extent"]."</option>                      
                        </select>
                        </td>
                        <td>
                        <select name ='car_contribution".$i."'>
                        <option  value ='".$row["car_contribution"]."'>".$row["car_contribution"]."</option>                      
                        </select>
                        </td>
                        <td>
                        <select name ='car_ownership".$i."'  id ='ro_type".$i."' >
                        <option  value ='".$row["car_ownership"]."'>".$row["car_ownership"]."</option>
                         </select>
                         </td>
                         <td>
                         <select name ='car_maneuver".$i."'  >
                         <option  value ='".$row["car_maneuver"]."'>".$row["car_maneuver"]."</option>       
                         </select>
                         </td>
                         <td><input type='text' value ='".$row["acci_num_car"]."' name ='acci_num_car".$i."'></td>

                         <td><input type='text' value ='".$row["driv_licence"]."' name ='driv_licence".$i."'></td>
                         <td><input type='text' value ='".$row["driv_fname"]."' name ='driv_fname".$i."'></td>
                          <td><input type='text' value ='".$row["driv_lname"]."' name ='driv_lname".$i."'></td>
                         <td><input type ='text' value='".$row["driv_age"]."' name = 'driv_age".$i."'/></td>
                         <td>
                         <select name ='driv_car_relation".$i."'  id ='driv_car_relation".$i."' >
                         <option  value ='".$row["driv_car_relation"]."'>".$row["driv_car_relation"]."</option>
                         </select>
                         </td>
                         <td>
                         <select name ='driv_contribution".$i."'  id ='driv_contribution".$i."' >
                         <option  value ='".$row["driv_contribution"]."'>".$row["driv_contribution"]."</option>
                         </select>
                         </td>
                         <td>
                        <select name ='driv_occation".$i."' id = 'driv_occation".$i."'>
                        <option  value ='".$row["driv_occation"]."'>".$row["driv_occation"]."</option>                      
                        </select>
                        </td>
                      

                         ";
                                 echo "<td><input type = 'submit' value='Edit' name ='edit".$i."' />";
                                                       if(isset($_POST['edit'.$i.'']))
                                              {
                                                    if(isset($_POST['chek'.$i.'']))
                                                    {
                                                       $car_id = $_POST['car_id'.$i.''];
                                                       $car_speed = $_POST['car_speed'.$i.''];
                                                       $car_service_age = $_POST['car_service_age'.$i.''];
                                                       $car_contribution =$_POST['car_contribution'.$i.''];
                                                       $car_ownership =$_POST['car_ownership'.$i.''];
                                                       $car_maneuver =$_POST['car_maneuver'.$i.''];
                                                       $acci_num_car =$_POST['acci_num_car'.$i.''];
                                                       $car_targa =$_POST['car_targa'.$i.''];
                                                       $driv_licence = $_POST['driv_licence'.$i.''];
                                                       $driv_fname =$_POST['driv_fname'.$i.''];
                                                       $driv_age =$_POST['driv_age'.$i.''];
                                                       $driv_car_relation =$_POST['driv_car_relation'.$i.''];
                                                       $driv_contribution =$_POST['driv_contribution'.$i.''];
                                                       $driv_occation =$_POST['driv_occation'.$i.''];
                                                       $sqlv ="UPDATE car_info SET car_speed ='$car_speed',car_service_age ='$car_service_age', car_contribution ='$car_contribution' , car_ownership ='$car_ownership' ,car_maneuver ='$car_maneuver',car_targa ='$car_targa'  WHERE car_id ='$car_id'";
                                                       $s = $conn->query($sqlv);
                                                        if(!$s){echo "Edit car problem";}
                                                       $sqlv ="UPDATE driver_info SET driv_licence ='$driv_licence', driv_fname='$driv_fname' , driv_age ='$driv_age' ,driv_car_relation ='$driv_car_relation' ,driv_occation ='$driv_occation'  WHERE car_id ='$car_id'";
                                                       $s = $conn->query($sqlv);
                                                       if(!$s){echo "Edit driver problem";}
                                                       // else{header("location:admin_edit.php");echo"<script>alert('deleted sucssefully')</script>";}
                                                      } 
                                              }
                                           
                                        echo "</td>";
                                        echo" <td><input type = 'checkbox' name ='chek".$i."'/></td></tr>"; 

                                        
                                          $i++;  
                                        }
                                    }
}
                                   ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </form>
            </div>
            <div class="row" style="padding-bottom: 10px;">
          
            </div>
        </div> 
       

    </body>
    <?php
       include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html'; 
     ?>
</html>
