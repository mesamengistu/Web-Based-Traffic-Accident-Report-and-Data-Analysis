
<?php
include 'guard.php';
       // include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html'; 
    $chek = 1;    
$ro_type =$ro_separation =$ro_alignment=$ro_geometry=$ro_surface_type=$ro_surface_condition=$ro_light=$ro_weather="";
     if($_SERVER['REQUEST_METHOD'] =="POST")
{
    if(isset($_POST['submit']))
    {
           $GLOBALS['ro_type']=    ($_POST['ro_type']);
           $GLOBALS['ro_separation'] = ($_POST['ro_separation']);
           $GLOBALS['ro_alignment'] = ($_POST['ro_alignment']);
           $GLOBALS['ro_geometry'] =   ($_POST['ro_geometry']);
           $GLOBALS['ro_surface_type'] = ($_POST['ro_surface_type']);
           $GLOBALS['ro_surface_condition'] = ($_POST['ro_surface_condition']);
           $GLOBALS['ro_light'] =   ($_POST['ro_light']);
           $GLOBALS['ro_weather'] =   ($_POST['ro_weather']);
    }

  if($GLOBALS['chek']  == 1 )
           {    include 'database.php';
                $conn = connect();
                $road =  array();
                $ro_type =   $GLOBALS['ro_type'];
                $ro_separation =   $GLOBALS['ro_separation'];
                $ro_alignment =   $GLOBALS['ro_alignment'];
                $ro_geometry =   $GLOBALS['ro_geometry'];
                $ro_surface_condition =   $GLOBALS['ro_surface_condition'];
                $ro_surface_type =   $GLOBALS['ro_surface_type'];
                $ro_light =   $GLOBALS['ro_light'];
                $ro_weather =   $GLOBALS['ro_weather'];
 
                $tra_id =$_SESSION['tra_id'];
                $adate = $_POST['acci_date'];
                $car_num = $_SESSION['number'];
                $driv_car = array(array());
                
                $accident  = array();
                $accident = $_SESSION['accident'];
                $acci_no_die = $accident["acci_no_die"]; $acci_no_severlyinjure= $accident["acci_no_severlyinjure"];
                $acci_no_slightlyinjure = $accident["acci_no_slightlyinjure"];$acci_damage_inbirr=$accident["acci_damage_inbirr"];$acci_about = $accident["acci_about"];
                $acci_place_altitude = $accident["acci_place_altitude"];
                $acci_place_latitude = $accident["acci_place_latitude"];
                $acci_place_spacif = $accident["acci_place_spacif"];

                  

               $acci_pedestrian_maneuver = $accident["acci_pedestrian_maneuver"];
               $acci_type = $accident["acci_type"];
               $acci_couse = $accident["acci_couse"];



                $acci_place_area =  $accident["acci_place_area"];
                $num_car_aci = $_SESSION['number'];
                $sql = "INSERT INTO accident_info (tra_id,acci_no_die,acci_no_severly,acci_no_slightly,acci_damage_inbirr,acci_num_car,acci_about,acci_date,acci_pedestrian_maneuver,acci_type,acci_couse) VALUES ('$tra_id','$acci_no_die','$acci_no_severlyinjure','$acci_no_slightlyinjure','$acci_damage_inbirr','$num_car_aci','$acci_about','$adate','$acci_pedestrian_maneuver','$acci_type','$acci_couse')";
                $conn->query($sql) or die("insert problem accident");
              // get the las accident id i enter now
                $sql ="SELECT * FROM accident_info ORDER BY acci_id DESC LIMIT 1"; 
                $result =$conn->query($sql);if($result-> num_rows > 0){
                $row = $result-> fetch_assoc();$acci_id = $row['acci_id'];}

                $sql = "INSERT INTO road (acci_id,ro_type,ro_separation,ro_alignment,ro_geometry,ro_surface_type,ro_surface_condition,ro_light,ro_weather) VALUES ('$acci_id','$ro_type','$ro_separation','$ro_alignment','$ro_geometry','$ro_surface_type','$ro_surface_condition','$ro_light','$ro_weather')";
                $conn->query($sql) or die("insert problem road");

                     $place_region =$_SESSION['tra_region'];
                     $place_zone =   $_SESSION['tra_zone'];
                     $place_wereda = $_SESSION['tra_wereda'];
                     $place_kebele  = $_SESSION['tra_kebele'];
                $sql = "INSERT INTO acciplace (acci_id,place_altitude,place_latitude,place_spacif,place_area,place_region,place_zone,place_wereda,place_kebele) VALUES ('$acci_id','$acci_place_altitude','$acci_place_latitude','$acci_place_spacif','$acci_place_area','$place_region','$place_zone','$place_wereda','$place_kebele')";
                $conn->query($sql) or die("insert problem place");
                     
                    








                for($i = 1;$i<=$car_num;$i++)
                {
                  $driv_car = $_SESSION['datas'.$i.''];
                  $car_targa =$driv_car[$i]['targa_num'];
                  $car_model =$driv_car[$i]['car_model'];  
                  $car_name =$driv_car[$i]['car_name'];
                  $car_speed =$driv_car[$i]['car_speed'];
                  $car_service_age =$driv_car[$i]['car_service_age']; 
                  $car_damage_extent =$driv_car[$i]['car_damage_extent']; 
                  $car_contribution =$driv_car[$i]['car_contribution'];  
                  $car_ownership =$driv_car[$i]['car_ownership']; 
                  $car_type =$driv_car[$i]['car_type']; 
                  $car_maneuver =$driv_car[$i]['car_maneuver'];
                  $car_img =$driv_car[$i]['car_img'];
                  $sqlcar = "INSERT INTO car_info (acci_id,car_targa,car_model,car_name,car_speed,car_service_age,car_damage_extent,car_contribution,car_ownership,car_type,car_maneuver,car_img) VALUES ('$acci_id','$car_targa','$car_model','$car_name','$car_speed','$car_service_age','$car_damage_extent','$car_contribution','$car_ownership','$car_type','$car_maneuver','$car_img')";
                   $conn->query($sqlcar) or die("insert problem car");

                   $sqlrow ="SELECT * FROM car_info ORDER BY car_id DESC LIMIT 1"; 
                   $result =$conn->query($sqlrow);if($result-> num_rows > 0){
                   $row = $result-> fetch_assoc();$car_id =$row['car_id'];}
                   
                  $driv_id =$driv_car[$i]['driv_id'];  
                  $driv_fname =$driv_car[$i]['driv_fname']; 
                  $driv_lname =$driv_car[$i]['driv_lname'];
                  $driv_age =$driv_car[$i]['driv_age']; 
                  $driv_car_relation =$driv_car[$i]['driv_car_relation']; 
                  $driv_contribution =$driv_car[$i]['driv_contribution'];  
                  $driv_occation =$driv_car[$i]['driv_occation']; 

                   $driv_expriance =$driv_car[$i]['driv_expriance'];
                   $driv_sex =$driv_car[$i]['driv_sex']; 
                  $sqldriver = "INSERT INTO driver_info (acci_id,car_id,driv_licence,driv_fname,driv_lname,driv_age,driv_car_relation,driv_contribution,driv_occation,driv_expriance,driv_sex) VALUES ('$acci_id','$car_id','$driv_id','$driv_fname','$driv_lname','$driv_age','$driv_car_relation','$driv_contribution','$driv_occation','$driv_expriance','$driv_sex')";
                   $conn->query($sqldriver) or die("insert problem driver");

                }
                echo '<script> alert("Accident succssfully registered")</script> ' ;          
           }
}        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width = device-width , intial-scale=1">
        <title>cars number in accident </title>
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script>
        <link href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css" rel ="stylesheet ">
        <style>
             body{padding-top:60px;}
        </style>
    </head>
    <script type="text/javascript">
      
    </script>
    <body>
 <form  method ="post" action ='<?php $_SERVER["PHP_SELF"] ?>' enctype ="multipart/form-data" class ="form-horizontal">                 <center><h2> About Aciddent Road </h2></center>
        <div class ="container">
            <div class ="row">
                  <div class ="col-lg-6 border">
                            
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-5 ">Road Type</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_type"  id ="region" class ="form-control">
                                               <option  value ="country Side Connecting">Country Side Connecting</option>
                                               <option  value ="province Connecting">Province Connecting</option>
                                               <option  value ="rural Road">Rural Road</option>
                                               <option  value ="urban Road"selected>Urban Road </option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-5 ">Road Separation</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_separation"  id ="region" class ="form-control ">
                                               <option  value ="One-way">One-way</option>
                                               <option  value ="Two-way not divided">Two-way not divided</option>
                                               <option  value ="Divided with Island">Divided with Island</option>
                                               <option  value ="Divided with street painting "selected>Divided with street painting </option>
                                                <option  value ="Divided with broken painting">Divided with broken painting</option>
                                               </select>
                                        </div>      
                                </div>
                               <div class ="form-group">
                                    <label  class ="control-label col-lg-5 "> Roadway Alignment </label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_alignment"  id ="region" class ="form-control ">
                                               <option  value ="Straight & Level">Straight & Level</option>
                                               <option  value ="Straight & hill crest">Straight & hill crest</option>
                                               <option  value ="Straight on grade">Straight on grade</option>
                                               <option  value ="Curve & Level"selected>Curve & Level </option>
                                               <option  value ="Curve on Grade">Curve on Grade</option>
                                               <option  value ="Hilly">Hilly</option>
                                               <option  value ="Sloppy">Sloppy</option>
                                                
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-5 "> Road Geometry Type</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_geometry"  id ="region" class ="form-control ">
                                               <option  value ="Non-Junction">Non-Junction</option>
                                               <option  value ="Four-way intersection">Four-way intersection</option>
                                               <option  value ="T-intersection">T-intersection</option>
                                               <option  value ="Yintersection"selected>Yintersection</option>
                                               <option  value ="Five point or more">Five point or more</option>
                                               </select>
                                        </div>      
                                </div>
                      </div>
                      <div class="col-lg-6">

                        <div class ="form-group">
                                    <label  class ="control-label col-lg-5"> Roadway Surface Type</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_surface_type"  id ="region" class ="form-control " >
                                               <option  value ="Concrete Asphalt">Concrete Asphalt</option>
                                               <option  value ="Asphalt">Asphalt</option>
                                               <option  value ="Gravel">Gravel</option>
                                               <option  value ="Dirt"selected>Dirt</option>
                                               </select>
                                        </div>      
                        </div>
                        <div class ="form-group">
                                    <label  class ="control-label col-lg-5 ">Roadway Surface Condition</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_surface_condition"  id ="region" class ="form-control " >
                                               <option  value ="Dry">Dry</option>
                                               <option  value ="Wet">Wet</option>
                                               <option  value ="Muddy">Muddy</option>
                                               <option  value ="Other"selected>Other</option>
                                               </select>
                                        </div>      
                        </div>
                        <div class ="form-group">
                                    <label  class ="control-label col-lg-5 ">Light Condition</label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_light"  id ="region" class ="form-control ">
                                               <option  value ="Day Light">Day Light</option>
                                               <option  value ="Dusk">Dusk</option>
                                               <option  value ="Down">Down</option>
                                               <option  value ="Dark-Lighted Roadway"selected>Dark-Lighted Roadway</option>
                                               <option  value ="Darkroadway not lighted">Darkroadway not lighted</option>
                                               <option  value ="Dark-Unknown road way lighting">Dark-Unknown road way lighting</option>
                                               </select>
                                        </div>      
                         </div>
                         <div class ="form-group">
                                    <label  class ="control-label col-lg-5 ">Weather Condition </label>
                                        <div class ="col-lg-7">
                                              <select name ="ro_weather"  id ="region" class ="form-control " >
                                               <option  value ="clear">clear</option>
                                               <option  value ="foggy">foggy</option>
                                               <option  value ="cloudy">cloudy</option>
                                               <option  value ="sleet or hail"selected>sleet or hail</option>
                                               <option  value ="heavy rain">heavy rain</option>
                                               <option  value ="blowing sand">blowing sand</option>
                                               <option  value ="hot"selected>hot</option>
                                               <option  value ="cold">cold</option>
                                               <option  value ="other">other</option>
                                               </select>
                                        </div>      
                         </div>
                         <div class ="form-group">
                                    <label class ="control-label col-lg-3">Accident date</label>
                                    <div class ="col-lg-9">
                                       <input type ="date" id =""  name ="acci_date" class ="form-control" >
                                    </div>
                          </div>
                       <div class ="row" style="margin-bottom: 20px;">
                            <div  style =" padding-top:30px;"class ="col-lg-6 col-lg-offset-6">
                               <input type="submit" class =" btn btn-primary col-lg-6 col-lg-offset-3"  value ="Enter" name ="submit">
                           </div>
                      </div>
                        
                 </div>
                 
            </div>
       </div>
   </form>
    </body>

     <?php
       include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html'; 
     ?>
</html>
<?php






















?>